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
    }
    
    public function index(){
        $this->load->view("student/home");
    }
    
    public function messages(){
        //cargar vista de chat general
        //selecciona a quien va char
        $idcon = 5;
        $myid = $this->session->userdata("id"); //6
        
        $buscarid = $idcon.";".$myid;
        $buscaridrev = $myid.";".$idcon;
        
        $chats["chats"] = $this->Chatmodel->getMessages($buscarid,$buscaridrev);
        $chats["me"] = $myid;
        $chats["from"] = 5;
        
        $this->load->view("chat/home",$chats);
    }
}
