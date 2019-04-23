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
    }
    
    public function index(){
        $id = $this->session->userdata("id");
        $idprofesor = $this->Profesormodel->getIdProfesor($id);
        $this->session->set_userdata("idprofesor",$idprofesor["id"]);

        $this->load->view("teacher/home");
    }
    
    public function messages(){
        //cargar vista de chat general
        $this->load->view("chat/home");
    }
    
    public function homework(){
        
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
        foreach ($materias as $value) {
            //recuperamos tareas con id_PM
            $materia = $value["materia"];
            $tareas_materia = $this->Profesormodel->getTareasMateriaProfesor($value["id_pm"]);            
            //materian => tareas
            $tareas[$materia] = $tareas_materia;
        }
        $data["tareas"] = $tareas;
        $this->load->view("teacher/homeworks",$data);
    }
    
    public function homework_alumno($id){

        /*
         * leer de alumno_tarea donde idtarea = id
         * recupero alumno que ya subieron tarea
         * bajo archivos para revisar y asignar calificacion
         */

    }
}
