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
class Contacto extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        
    }

    public function index(){
        $this->load->view("contactohome");
    }

    public function enviarCorreo(){
    $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

    $userIp=$this->input->ip_address();
 
    $secret = $this->config->item('google_secret');

    $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
     
    $status= json_decode($output, true);    
    
    if ($status['success']) {	
	    if($this->input->post()){	
		    $data = array(
		       		 'nombre'=>$this->input->post('name'),
					 'mensaje'=>$this->input->post('message'),
					 'numero'=>$this->input->post('phone'),
					 'correo'=>$this->input->post('email')
		       );	
	 		$this->load->library('email');
	        $config = Array(
	                        'protocol' => 'pop3',
	                        'smtp_host' => 'dot1n2002.servwingu.mx',
	                        'smtp_port' => 995,
	                        'smtp_user' => 'contacto@educacion-idea.com.mx',
	                        'smtp_pass' => 'P{gE~hti7lj_',//my valid email password
	                        'mailtype' => 'html',
	                        'charset' => 'UTF-8',
	                        'wordwrap' => TRUE
	                        );	   
	         $this->email->initialize($config);
	         $this->email->from('contacto@educacion-idea.com.mx', 'Educacion - IDEA');
			 $this->email->to("carlosmayarodriguez@gmail.com");
			 $this->email->subject('Informes o dudas -IDEA');
		  	 $html=$this->load->view("email", $data,TRUE);   
		  	 $this->email->message($html);	
	     	 $this->email->send(); 	
	     	 $this->session->set_flashdata('correo', 'Se ha enviado el correo exitosamente');
	     	 redirect("/");
	    }else{
	    	redirect("/");
	    }
	}else{
		echo "error de autenticación";
	}
    }
    
}
