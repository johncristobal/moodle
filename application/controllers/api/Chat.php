<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Homework
 *
 * @author john.cristobal
 */
class Chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Chatmodel");

    }
    
    public function getMessages(){
     
        /*
         * 
         * en el input vendra el idchat
         * recupera idmainchat donde users = input post
         * recupera mensajes de chats: 
         * mandamos mensajes json
         * 
         */
        
        //recuperamos idusers
        $users = $this->input->post("idchat");
        $idusers = $this->Chatmodel->getIdUsers($users);
        
        if($idusers == "-1"){
            //no hay chat ebtre ambos, crea elemento
            $idusers = $this->Chatmodel->addMainChat($users);
            echo $idusers;
        }else{
            //recuperamos mensajes
            $messages = $this->Chatmodel->getMessages($idusers["id"]);            
            echo json_encode($messages);        
        }
    }    
    
    public function saveMessage(){
        
        //salvar mensaje en la tabla con id...
        $idchats = $this->input->post("where");
        $envia = $this->input->post("envia");
        $idusers = $this->Chatmodel->getIdUsers($idchats);
        $mensaje = $this->input->post("message");
        //$envia = $this->session->userdata("envia");
        $num = $this->Chatmodel->savemessage($idusers["id"],$mensaje,$envia);
        
        echo $num;
    }
    
    public function getLastMessages(){
     
        /*
         * 
         * en el input vendra el idchat
         * recupera idmainchat donde users = input post
         * recupera mensajes de chats: 
         * mandamos mensajes json
         * 
         */
        
        //recuperamos idusers
        $users = $this->input->post("idchat");
        $time = $this->input->post("lasttime");
        $int = (int)$time;
        $idusers = $this->Chatmodel->getIdUsers($users);

        //recuperamos mensajes
        $messages = $this->Chatmodel->getLastMessages($idusers["id"],$int);

        if($messages != "-1"){
            echo json_encode($messages);                    
        }else{
            echo "-1";
        }
    } 
}
