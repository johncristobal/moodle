<?php

class Chatmodel extends CI_Model {
    
    public function getMessages($idusers){
     
        $datos = $this->db->select('*')
            ->from('chats')
            ->where('id_users',$idusers)
            ->get();
        
        if($datos->num_rows() == 0){
            return array();
        }else{
            return $datos->result_array();
        }
    }  
    
    public function getLastMessages($idusers,$time){
     
        $datos = $this->db->select('*')
            ->from('chats')
            ->where('id_users',$idusers)
            ->where('timestamp >',$time)    
            ->get();
        
        if($datos->num_rows() == 0){
            return "-1";
        }else{
            return $datos->result_array();
        }
    } 
    
    public function getIdUsers($iduses){
        $datos = $this->db->select('id')
            ->from('mainchat')
            ->where('users',$iduses)
            ->get();
        
        if($datos->num_rows() == 0){
            return "-1";
        }else{        
            return $datos->result_array()[0];
        }
    }
    
    public function getChats($idfrom){
     
        $datos = $this->db->select('*')
            ->from('mainchat')
            ->like('users',$idfrom)
            ->get();
        
        if($datos->num_rows() == 0){
            return "-1";
        }else{        
            return $datos->result_array();
        }
    }
    
    public function savemessage($id,$message,$idprofesor){
        
        $time = time();
        
        $data = array(
            "id_users" => $id,
            "message" => $message,
            "envia" => $idprofesor,
            "estatus" => 1,
            "timestamp" => $time
        );
        
        $num = $this->db->insert("chats",$data);
        
        return $time;
    }
    
    public function addMainChat($users){        
        $data = array(
            "users" => $users,
            "fecha_alta" => Date(),
            "estatus" => 1,
        );
        
        $num = $this->db->insert("mainchat",$data);
        
        return  $this->db->insert_id();
    }
}
