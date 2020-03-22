<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Loginmodel');
    }
    
    public function index()
    {
        $this->load->view('user/login');
    }
    
    public function validate(){
        
        $data = $this->input->post();        
        $res = $this->Loginmodel->validateLogin($data); 
        //$passInput=password_hash($data["pass"], PASSWORD_DEFAULT);
        if($res['id'] != "-1"){
            if (password_verify($data["pass"],$res['password'])) {
             $this->session->set_userdata("id",$res['id']);
            $this->session->set_userdata("rol",$res['rol']);
            $this->session->set_userdata("session","1");

            echo $res['rol'];               
            }
            else{
            echo "Verifica datos";
        }


        }else{
            echo "Verifica datos";
        }
    }
}
