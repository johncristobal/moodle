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
 * Director puede cambiar calificaciones de las treas
 * CRUD elumnos, profesores, clificaicones 
 * nada de materias
 * segundo en jerarquia
 */

class Director extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        
        $this->load->model("Directormodel");
    }
    
    public function index(){
        
    }
}
