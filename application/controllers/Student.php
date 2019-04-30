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
    }
    
    public function index(){

        if($this->sesionActiva()){
        $id = $this->session->userdata("id");
        $idalumno = $this->Alumnomodel->getIdAlumno($id);
        $data["infoAlumno"]=$this->Alumnomodel->getInfoAlumno($id);
        $this->session->set_userdata("idalumno",$idalumno["id"]);  
        $data["materias"] = $this->Alumnomodel->getMateriasAlumno($idalumno["id"]);
        $this->load->view("student/home",$data);  
        }else{
            redirect('/');
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
            $chats = array();
            $idalumno = $this->session->userdata("idalumno"); //1
            $materias = $this->Alumnomodel->getMateriasAlumno($idalumno);
            if($materias != "-1"){
                //de la lista de materias del profesor son las que se veran en chatlist
                foreach ($materias as $value) {
                    //recuperamos tareas con id_PM
                    $tempArray = array(
                        "user" => $value["materia"],
                        "id" => "PM_".$value["id_pm"],
                        "userchat" => "PM_".$value["id_pm"]
                    );
                    
                    //$materia["nombre"] = $value["materia"];
                    array_push($chats, $tempArray);
                }
                //$data["tareas"] = $tareas;
            }else{
                //$data["tareas"] = "-1";
            }
            
            //ya tengo materias, ahora logica para recuperar chat de mainchat
            $mainchats = $this->Chatmodel->getChats($idalumno);
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
            }
            
            //mandamos lista de chat a vista
            $data["chats"] = $chats;
            $data["me"] = $idalumno;
            //cargar vista de chat general
            $this->load->view("chat/home",$data);
        }else{
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
}
