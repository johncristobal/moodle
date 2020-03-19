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
class OfertaEducativa extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        
    }

    public function index(){
        $this->load->view("ofertaeducativa");
    }
    
    public function derecho(){
    	$this->load->view("derecho");
    }

    public function contaduria(){
    	$this->load->view("contaduria");
    }  

    public function psicologia(){
    	$this->load->view("psicologia");
    }     

    public function pedagogia(){
    	$this->load->view("pedagogia");
    } 

	public function admempresas(){
    	$this->load->view("admempresas");
    } 

    public function computacion(){
    	$this->load->view("computacion");
    } 

    public function bachillerato(){
         $this->load->view("bachillerato");  
    }
}
