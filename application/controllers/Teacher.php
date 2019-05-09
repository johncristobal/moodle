<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teacher
 *
 * @author john.cristobal
 */
class Teacher extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Profesormodel');
        $this->load->model("Alumnomodel");
        $this->load->model("Chatmodel");
    }
    
    public function index(){
        if($this->sesionActiva()){
            $id = $this->session->userdata("id");
            $idprofesor = $this->Profesormodel->getIdProfesor($id);
            $this->session->set_userdata("idprofesor",$idprofesor["id"]);
            $this->session->set_userdata("tempName",$idprofesor["nombre"]);

            $this->load->view("teacher/home");
        }else{
            redirect("/");
        }
    }
    
    public function messages(){
        if($this->sesionActiva()){
            /*
             * recuperar lista de chat disponibles
             * empezando con las materias del profe
             * el solo podra INICIAR mensajes a las materias 
             * 
             * NOTA => para alumnos sera lo mismo, pero si no hay datos en chats, no agregamos 
             * solo cuando el profe haya enviado mensaje, los alumnos podran enviar
             * 
             * Despues, a esta lista agregaremos los chat de mainchat 
             * like users '%P_901%'
            */
            
            //Agrego materias del profesor para mensajes masivos
            $chats = array();
            $idprofesor = $this->session->userdata("idprofesor"); //901
            $tempName = $this->session->userdata("tempName");

            $materias = $this->Profesormodel->getMateriasProfesor($idprofesor);
            if($materias != "-1"){
                //de la lista de materias del profesor son las que se veran en chatlist
                foreach ($materias as $value) {
                    
                    //recuperamos solo cantidad de mensjaes si hay
                    $numMessages = $this->Chatmodel->lastMessages($idprofesor,"PM_".$value["id_pm"]);
                    
                    //recuperamos tareas con id_PM
                    $tempArray = array(
                        "user" => $value["materia"],
                        "id" => "PM_".$value["id_pm"],
                        "userchat" => "PM_".$value["id_pm"],
                        "materia" => "",
                        "numMessages" => $numMessages
                    );                    
                    
                    //$materia["nombre"] = $value["materia"];
                    array_push($chats, $tempArray);                    
                }
                
                /*
                * Ahora agrego posibles alumnos a los cuales les puedo enviar mensajes
                * los busco en alumno_profesor_materia
                * en $materias ya tngo las materias, ahora busco alumnos
                */
                foreach ($materias as $value) {
                    //recuperamos lumnos con id_PM
                    $alumnos = $this->Profesormodel->getAlumnosMateriasProfesor($value["id_pm"]);
                    if($alumnos != "-1"){
                        foreach ($alumnos as $alumno) {
                            $datosUser = $this->Alumnomodel->getInfoAlumno($alumno["id_alumno"]);

                            $numMessages = $this->Chatmodel->lastMessages($idprofesor,"A_".$datosUser["id"].";P_".$idprofesor);

                            $tempArray = array(
                                "user" => $datosUser["nombre"],
                                "id" => "A_".$datosUser["id"],
                                "userchat" => "A_".$datosUser["id"].";P_".$idprofesor,
                                "materia" => $value["materia"],
                                "numMessages" => $numMessages
                            );
                            array_push($chats, $tempArray);
                        }
                    }
                }
                
            }else{
                //$data["tareas"] = "-1";
            }
                        
            /*
             * ahora con la lista de chat, vamos a recuperar los mensjaes 
             * que no se han leido aun...en tabla chat_user
             */
            
            //mandamos lista de chat a vista
            $price = array();
            foreach ($chats as $key => $row)
            {
                $price[$key] = $row['numMessages'];
            }
            array_multisort($price, SORT_DESC, $chats);

            $data["chats"] = $chats;
            $data["me"] = $idprofesor;
            $data["tempName"] = $tempName;
            
            //cargar vista de chat general
            $this->load->view("chat/home",$data);
        }else{
            redirect("/");
        }
    }
    
    public function asignatures(){
        
        if($this->sesionActiva()){
            //recupero id profesor
            $idprofesor = $this->session->userdata("idprofesor");

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
            $materias = $this->Profesormodel->getMateriasProfesor($idprofesor);
            if($materias != "-1"){
                foreach ($materias as $value) {
                    //recuperamos tareas con id_PM
                    $materia = $value["materia"];
                    $tareas_materia = $this->Profesormodel->getTareasMateriaProfesor($value["id_pm"]);            
                    //materian => tareas
                    $tareas[$materia] = $tareas_materia;
                }
                $data["tareas"] = $tareas;
            }else{
                $data["tareas"] = "-1";
            }

            $this->load->view("teacher/homeworks",$data);
        }else{
             redirect('/');
        }
    }
    
    public function homework_alumno($id){

        /*
         * leer de alumno_tarea donde idtarea = id
         * recupero alumno que ya subieron tarea
         * bajo archivos para revisar y asignar calificacion
         */
    }
    
    public function sesionActiva(){
        $sesion = $this->session->userdata("session");
        if($sesion === "1"){
            return true;
        }else{
            return false; 
        }
    }
}
