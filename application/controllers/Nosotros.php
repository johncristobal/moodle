<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nosotros
 *
 * @author john.cristobal
 */
class Nosotros extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        
    }

    public function index(){
        $this->load->view("nosotros");
    }
    
}
