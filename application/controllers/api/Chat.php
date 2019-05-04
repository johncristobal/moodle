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
         * A2;901 ; 901
         */
        
        //recuperamos idusers
        $users = $this->input->post("idchat"); //A2901
        $idme = $this->input->post("idme"); // 901
        
        $idusers = $this->Chatmodel->getIdUsers($users);
        
        if($idusers == "-1"){
            //no hay chat ebtre ambos, crea elemento
            $idusers = $this->Chatmodel->addMainChat($users);
            echo $idusers;
        }else{
            //recuperamos mensajes
            $messages = $this->Chatmodel->getMessages($idusers["id"]);
            $lasttime = 0;
            if(count($messages) > 0){
                $lasttime = $messages[count($messages)-1]["timestamp"];                
            }else{
                $lasttime = 0;            
            }
            
            $this->Chatmodel->updateLastTime($idusers["id"],$lasttime,$idme);
            
            echo json_encode($messages);        
        }
    }    
    
    public function saveMessage(){
        
        //salvar mensaje en la tabla con id...
        $tempName = $this->input->post("tempNameS");        
        $idchats = $this->input->post("where");
        $envia = $this->input->post("envia");
        $mensaje = $this->input->post("message");
        $time = time();

        $id_users = $this->Chatmodel->getIdUsers($idchats);
        $last = $this->Chatmodel->saveLastMessageUser($id_users["id"],$envia,$time);
        $num = $this->Chatmodel->savemessage($id_users["id"],$mensaje,$envia,$tempName,$time);
        
        echo $num;
    }
    
    public function getMessagesNotRead(){
        $idusers = $this->input->post("idchat");
        $idme = $this->input->post("iduser");
        
        $numMessages = $this->Chatmodel->lastMessages($idme,$idusers);

        echo "".$numMessages."";
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
