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
    }
    
    public function index(){
        $this->load->view("teacher/home");
    }
    
    public function messages(){
        //cargar vista de chat general
        $this->load->view("chat/home");
    }
    
    public function homework(){
        //recupero id profesor
        $idprofesor = 1;
        
        /*
         * con idprofesor recuperas materias de tabla profesor_materia
         * lista con idprofesor_materia (idPM)
         * recuperas tareas con la lista de materias tabla tareas (donde idPM)
         * materia1 => array(tareas)
         * materia2 => array(tareas)
         * formar json
         */
        
        $this->load->view("teacher/homeworks");
    }
}
