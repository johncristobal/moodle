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
class Student extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        
        $this->load->model("Chatmodel");
        $this->load->model("Alumnomodel");
        $this->load->model('Usermodel');
    }
    
    public function index(){

        if($this->sesionActiva()){
            $id = $this->session->userdata("id");
            $status=$this->validateStatus($id);
            //Hago una validación exclusiva para validar si el usuario está bloqueado
            if($status==2){
               $this->load->view("blocked");
            }else{
            $idalumnoSesion = $this->session->userdata("idalumno");
            $idalumno = $this->Alumnomodel->getIdAlumno($id);
            $this->session->set_userdata("idalumno",$idalumno["id"]);  
            $this->session->set_userdata("tempName",$idalumno["nombre"]);

            $data["infoAlumno"]=$this->Alumnomodel->getInfoAlumno($idalumno["id"]);
            $data["materias"] = $this->Alumnomodel->getMateriasAlumno($idalumno["id"]);
            $data["idalumno"] = $idalumnoSesion;
            $this->load->view("student/home",$data);  
        }
        }else{
            redirect('/');
        }
    }
    public function validateStatus($idUser){
        if($this->sesionActiva()){
           $data["info"]= $this->Usermodel->getStatus($idUser);
            return($data["info"]->estatus);
        }else{
            redirect('/');            
        }
    }
/* ////////////////////////////////////////////////////////////////////////////
 * Modulo chat
 */////////////////////////////////////////////////////////////////////////////
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
            
            //Recupero materias para mensajes masivos
            $chats = array();
            $idalumno = $this->session->userdata("idalumno");
            $tempName = $this->session->userdata("tempName");
            
            $materias = $this->Alumnomodel->getMateriasAlumno($idalumno);
            if($materias != "-1"){
                //de la lista de materias del allumno son las que se veran en chatlist
                foreach ($materias as $value) {
                    //recuperamos solo cantidad de mensjaes si hay
                    $numMessages = $this->Chatmodel->lastMessages($idalumno,"PM_".$value["id_pm"]);

                    //recuperamos tareas con id_PM
                    $tempArray = array(
                        "user" => $value["materia"],
                        "id" => "PM_".$value["id_pm"],
                        "userchat" => "PM_".$value["id_pm"],
                        "materia" => $value["materia"],
                        "imagen" => "",
                        "perfil" => "perfilMateria",
                        "idimagen" => $value["id_pm"],                        
                        "numMessages" => $numMessages
                    );
                    
                    //$materia["nombre"] = $value["materia"];
                    array_push($chats, $tempArray);
                }
                
                /*
                 * Ahora agrego posibles profesores a los cuales les puedo enviar mensajes
                 * los busco en alumno_profesor_materia
                 * en $materias ya tngo las materias, ahora busco profesores
                 */
                foreach ($materias as $value) {
                    $numMessages = $this->Chatmodel->lastMessages($idalumno,"A_".$idalumno.";P_".$value["id"]);
                    
                    //recuperamos lumnos con id_PM
                    $tempArray = array(
                        "user" => $value["nombre"],
                        "id" => "P_".$value["id"],
                        "userchat" => "A_".$idalumno.";P_".$value["id"],
                        "materia" => $value["materia"],
                        "imagen" => $value["imagen_perfil"],
                        "perfil" => "perfilProfesor",
                        "idimagen" => $value["id"], 
                        "numMessages" => $numMessages
                    );
                    array_push($chats, $tempArray);
                    
                }
            }else{
                //$data["tareas"] = "-1";
            }
            
            //ya tengo materias, ahora logica para recuperar chat de mainchat
            /*$mainchats = $this->Chatmodel->getChats($idalumno);
            if($mainchats != "-1"){
                foreach ($mainchats as $value) {
                    $personas = explode(";",$value["users"]);
                    //el profesor siempre estara del lado derecho 
                    $userTemp = explode("_", $personas[0]);
                    if($userTemp[0] == "A"){
                        $datosUser = $this->Alumnomodel->getInfoAlumno($userTemp[1]);
                        $tempArray = array(
                            "user" => $datosUser["nombre"],
                            "id" => "A_".$datosUser["id"],
                            "userchat" => $value["users"]
                        );
                        array_push($chats, $tempArray);
                    }
                }
            }*/
            
            //mandamos lista de chat a vista
            $price = array();
            foreach ($chats as $key => $row)
            {
                $price[$key] = $row['numMessages'];
            }
            array_multisort($price, SORT_DESC, $chats);

            $data["chats"] = $chats;
            $data["me"] = $idalumno;
            $data["tempName"] = $tempName;
            //cargar vista de chat general
            $this->load->view("chat/home",$data);
        }else{
            redirect('/');
        }
    }
    
/* ////////////////////////////////////////////////////////////////////////////
 * Modulo tareas / materias
 */////////////////////////////////////////////////////////////////////////////
    
    public function asignature($idpm){
        
        $idalumno = $this->session->userdata("idalumno");
        //recuperar tareas que ha subido profe a idpm
        $tareas = $this->Alumnomodel->getTareasMateriaAlumno($idpm);

        $tareasAlumno = array();
        if($tareas != "-1"){
            foreach ($tareas as $value) {
                $tareaTemp = $this->Alumnomodel->getTareasAlumno($value["id"],$idalumno);
                array_push($tareasAlumno, $tareaTemp);
            }
            $data["tareasAlumno"] = $tareasAlumno;
        }else{
            $data["tareasAlumno"] = "-1";
        }
        
        $data["grupo"] = $this->Alumnomodel->getInfoGrupo($idpm);
       
        $this->load->view("student/homeworks",$data);
    }

/* ////////////////////////////////////////////////////////////////////////////
 * Modulo perfil
 */////////////////////////////////////////////////////////////////////////////
     
    public function profile(){
        if($this->sesionActiva()){
            $idalumno = $this->session->userdata("idalumno");

            //select from alumno_tarea donde idtarea = idtarea
            $datos = $this->Alumnomodel->getInfoAlumno($idalumno);
            $data["data"] = $datos;
            $data["idalumno"] = $idalumno;
            $this->load->view("student/perfil",$data);
        }else{
            redirect('/');
        }
    }    
    
    public function saveDataProfile(){
        
        if($this->sesionActiva()){
            
            $idalumno = $this->session->userdata("idalumno");
             
            $data = $this->input->post();

            $archivo = "";
            if(isset($_FILES["archivo"]["name"])){
                $archivo = $_FILES["archivo"]["name"];
            }else{
                $archivo = "";
            }
            $this->Alumnomodel->updateProfileAlumno($data,$archivo,$idalumno);

            if(isset($_FILES["archivo"]["name"])){
                $tempfile = $_FILES["archivo"]["tmp_name"];
                $archivo = $_FILES["archivo"]["name"];

                if (!file_exists('perfilAlumno/'.$idalumno)) {
                    mkdir('perfilAlumno/'.$idalumno, 0777, true);
                }

                //remember  chmod -R 777 .
                //$sourcePath = $_FILES['foto']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = 'perfilAlumno/'.$idalumno."/".$archivo;//.$_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($tempfile,$targetPath) ; // Moving Uploaded file
            }

            echo "listo";
        }else{
            redirect("/");
        }
    }
 /* ////////////////////////////////////////////////////////////////////////////
 * Modulo calificaciones
 */////////////////////////////////////////////////////////////////////////////
    public function grades(){
        if($this->sesionActiva()){
            $idalumno = $this->session->userdata("idalumno");
            $data["calificaciones"]=$this->Alumnomodel->getGrades($idalumno);
            if($data["calificaciones"]!="-1"){
              $totalMaterias=count($data["calificaciones"]);
            foreach ($data["calificaciones"] as $key) {
               @$sumCalif+= $key["calificacion"];
            }
            $promedio=$sumCalif/ $totalMaterias;
             $data["promedio"]=number_format($promedio, 2, '.', '');              
         }else{
            $data["promedio"]=0;
            $data["calificaciones"]=0;
         }

            $this->load->view("student/grades",$data);
        }else{
            redirect("/");
        }
    }   
    
    public function exportPDF(){
        if($this->sesionActiva()){
            $idalumno = $this->session->userdata("idalumno");
            $data["alumnoData"] = $this->Alumnomodel->getInfoAlumno($idalumno);
            $data["calificaciones"]=$this->Alumnomodel->getGrades($idalumno);
            $totalMaterias=count($data["calificaciones"]);
            foreach ($data["calificaciones"] as $key) {
               @$sumCalif+= $key["calificacion"];
            }
            $promedio=$sumCalif/ $totalMaterias;
            $data["promedio"]=number_format($promedio, 2, '.', '');
                     
            $html = $this->load->view('student/pdf', $data, TRUE);
            
            // Load pdf library
            $this->load->library('pdfgenerator');

            // Load HTML content
            $this->dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            $this->dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $this->dompdf->render();

            // Output the generated PDF (1 = download and 0 = preview)
            $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
            
            //$this->load->library('pdfgenerator');
            // definamos un nombre para el archivo. No es necesario agregar la extension .pdf
            //$filename = 'comprobante_pago';
            // generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
            //$pdffile = $this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');

            $this->load->view("student/pdf",$data);
                        
        }else{
            redirect("/");
        }
    }
/* ////////////////////////////////////////////////////////////////////////////
 * Modulo sesionj
 */////////////////////////////////////////////////////////////////////////////

    public function sesionActiva(){
        $sesion = $this->session->userdata("session");
        if($sesion === "1"){
            return true;
        }else{
            return false; 
        }
    }
    
    public function pdf(){
        if($this->sesionActiva()){
            $idalumno = $this->session->userdata("idalumno");
            $data["alumnoData"] = $this->Alumnomodel->getInfoAlumno($idalumno);
            $data["calificaciones"]=$this->Alumnomodel->getGrades($idalumno);
            $totalMaterias=count($data["calificaciones"]);
            foreach ($data["calificaciones"] as $key) {
               @$sumCalif+= $key["calificacion"];
            }
            $promedio=$sumCalif/ $totalMaterias;
            $data["promedio"]=number_format($promedio, 2, '.', '');
                     

            $this->load->view("student/pdf",$data);
            
            
        }else{
            redirect("/");
        }
    }
}
