<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Director
 *
 * @author i7
 * Admin de alta nuevo director  => OK
 * 
 * Director puede cambiar calificaciones de las tareas
 * CRUD elumnos, profesores, clificaicones 
 * nada de materias
 * segundo en jerarquia
 */

class Director extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        
        $this->load->model("Directormodel");
        $this->load->model('Usermodel');
    }
    
    public function index(){
        if($this->sesionActiva() && $this->validaUser()){
            $id = $this->session->userdata("id");
            $iddirector = $this->Directormodel->getIdDirector($id);
            $this->session->set_userdata("iddirector",$iddirector["id"]);
            $this->session->set_userdata("tempName",$iddirector["nombre"]);

            $this->load->view("director/home");
        }else{
            redirect("/");
        }
    }
    
// =============================================================================
// Usuarios
// =============================================================================
    public function users(){
        if($this->sesionActiva() && $this->validaUser()){
            $data["usuarios"] = $this->Usermodel->getUsers();
            $this->load->view('director/users',$data);
        }else{
            redirect('/');            
        }
    }
    
    public function register(){
        if($this->sesionActiva() && $this->validaUser()){
            $data["usuarios"] = $this->Usermodel->getUsers();
            $this->load->view('director/register',$data);
        }else{
            redirect('/');            
        }
    }
    
    public function nuevoUsuario(){
        if($this->sesionActiva() && $this->validaUser()){
            if($this->input->post()){
                $info=$this->input->post(); 
                //$edad=$this->calcularEdad($info["fecha_nacim"]);
                //Se crea primero al usuario
                $result=$this->Usermodel->crearUsuario($info); 
                
                switch($result[1]){
                    case "profesores":
                        // Se crea al estudiante
                        $resultU=$this->Usermodel->crearProfesor($info,$result[0]);
                        break;
                    case "alumnos":
                        // Se crea al estudiante
                        $resultU=$this->Usermodel->crearAlumno($info,$result[0]);
                        break;
                    case "directores":
                        // Se crea al estudiante
                        $resultU=$this->Usermodel->crearDirector($info,$result[0]);
                        break;
                    default: 
                        break;
                }
                
                if($resultU){
                    $data["usuarios"] = $this->Usermodel->getUsers();
                    $this->load->view('director/users',$data);
                }
            }
        }else{
            redirect('/');            
        }
    }  

    public function editarUsuario($id){
        if($this->sesionActiva() && $this->validaUser()){
            $result=$this->Usermodel->getRol($id); 
            if($result){
                switch ($result["rol"]) {
                    case '1':
                        $tabla="adm"; //Habrá que definir si se pueden eliminar entre admins
                        break;
                     case '2':
                        $tabla="profesores"; 
                        break;
                    case '3':
                        $tabla="alumnos"; 
                        break; 
                    case '4':
                        $tabla="directores"; 
                        break; 
                    default:
                        break;
                }
                
                $data["info"]=$this->Usermodel->getInfoUser($id,$tabla);
                $data["idUser"]=$id;
                if($data){
                    $this->load->view('director/editUser',$data);
                } 
            }
        }else{
            redirect('/');            
        }
    }
    
    public function guardarCambios(){
        if($this->sesionActiva() && $this->validaUser()){
            if($this->input->post()){
                $info=$this->input->post();
                $info["password"]= password_hash($info["password"], PASSWORD_DEFAULT);
                $result=$this->Usermodel->editarUser($info);  
                redirect('director/users');              
             }
        }else{
            redirect('/');            
        }
    }
    
    public function eliminarUsuario($id){
        if($this->sesionActiva() && $this->validaUser()){
             $result=$this->Usermodel->getRol($id); 
             if($result){
                switch ($result["rol"]) {
                    case '1':
                        $tabla="adm"; //Habrá que definir si se pueden eliminar entre admins
                        break;
                     case '2':
                        $tabla="profesores"; 
                        break;
                    case '3':
                        $tabla="alumnos"; 
                        break; 
                    case '4':
                        $tabla="directores"; 
                        break; 
                    default:
                        break;
                }
               $result=$this->Usermodel->eliminarUser($id,$tabla);
               if($result){
                redirect('director/users');
               }
             }
        }else{
            redirect('/');            
        }
    }
    
// =============================================================================
// Calificaciones
// =============================================================================
    public function califications(){
        //el director puede ver y editar calificaciones
        //leemos grupos con sus datos
        //de cada grupo, recuperamos las tareas
        //al dar clic en tarea, visualizar calificaciones de quien ha subido tarea
        if($this->sesionActiva() && $this->validaUser()){
            //recupero id profesor
            $iddirector = $this->session->userdata("iddirector");

            /*
             * con idprofesor recuperas materias de tabla profesor_materia
             * lista con idprofesor_materia (idPM)
             * recuperas tareas con la lista de materias tabla tareas (donde idPM)
             * materia1 => array(tareas)
             * materia2 => array(tareas)
             * formar json
             */

            //materias
            $tareas = array();
            $idpm = array();
            $materias = $this->Directormodel->getMateriasDirector($iddirector);
            if($materias != "-1"){
                foreach ($materias as $value) {
                    //recuperamos tareas con id_PM
                    $materia = $value["materia"];
                    $grupo = $value["grupo"];
                    $tareas_materia = $this->Directormodel->getTareasMateriaDirector($value["id_pm"]);      
                    
                    //materian => tareas
                    $tareas[$materia." - ".$grupo] = $tareas_materia;
                    $idpm[$materia." - ".$grupo] = $value["id_pm"];
                }
                $data["tareas"] = $tareas;
                $data["idpm"] = $idpm;
            }else{
                $data["tareas"] = "-1";
                $data["idpm"] = "-1";
            }

            $this->load->view("director/asignatures",$data);
        }else{
             redirect('/');
        }
    }
    
/* ////////////////////////////////////////////////////////////////////////////
 * Modulo tareas
 */////////////////////////////////////////////////////////////////////////////
    public function homework_alumno($idtarea){
        //select from alumno_tarea donde idtarea = idtarea
        if($this->sesionActiva() && $this->validaUser()){
            $tareas = $this->Directormodel->getTareasAlumno($idtarea);
            $data["tareas"] = $tareas;
            $data["infotarea"] = $this->Directormodel->getInfoTarea($idtarea);
            $this->load->view("director/homeworks_alumno",$data);
        }
        else{
            redirect('/');
        }
    }
    
    public function sesionActiva(){
        $sesion = $this->session->userdata("session");
        if($sesion === "1"){
            return true;
        }else{
            return false; 
        }
    }
        public function validaUser(){
        $rol=$this->session->userdata("rol");
        if($rol=="4"){ //caso de director
            return true;
        }else{
            return false;
        }
    }

}
