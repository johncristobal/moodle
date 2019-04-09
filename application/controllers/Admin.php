<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    NOTA 1
 * En todos los metodos validaremos sesionAction para seguir a cualquier accion
 * 
    NOTA 2
 * puto el que lo lea
 *  */

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Adminmodel');
    }
    
    public function index(){
        if($this->sesionActiva()){
            $this->load->view('admin/admin');
        }else{
            redirect('/');
        }
    }
    
    public function users(){
        if($this->sesionActiva()){
            $data["usuarios"] = $this->Adminmodel->getUsers();
            $this->load->view('admin/users',$data);
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
    
    public function cerrar(){
        $this->session->sess_destroy();
        
        redirect('/');
    }
}
