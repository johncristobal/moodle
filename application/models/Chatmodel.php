<?php

class Chatmodel extends CI_Model {
    
    public function getMessages($idusers){
     
        $datos = $this->db->select('*')
            ->from('chats')
            ->where('id_users',$idusers)
            ->where('estatus',1)  
            ->get();
        
        if($datos->num_rows() == 0){
            return array();
        }else{
            return $datos->result_array();
        }
    }
    
    public function updateLastTime($idusers,$time,$idme){
        $data = array(
            "last_time" => $time
        );

        $this->db->where('id_users', $idusers); 
        $this->db->where('id_user', $idme); 
        $num = $this->db->update("chat_user",$data);

        return $num;
    }
    
    public function getLastMessages($idusers,$time){
     
        $datos = $this->db->select('*')
            ->from('chats')
            ->where('id_users',$idusers)
            ->where('timestamp >',$time)    
            ->where('estatus',1)                  
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
            ->where('estatus',1)              
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
            ->where('estatus',1)  
            ->get();
        
        if($datos->num_rows() == 0){
            return "-1";
        }else{        
            return $datos->result_array();
        }
    }
    
    public function lastMessages($idwho,$idchat){
        
        $idusers = $this->getIdUsers($idchat);
        
        if($idusers != -1){
            $datos = $this->db->select('last_time')
                ->from('chat_user')
                ->where('id_users',$idusers["id"])
                ->where('id_user',$idwho)
                ->where('estatus',1)  
                ->get();

            if($datos->num_rows() == 0){
                $lasttime = 0;
                //ahora recupero los mensajes despeus de lastt
                $data = $this->getLastMessages($idusers["id"],$lasttime);
                if($data == "-1"){
                    return 0;
                }else{
                    return count($data);
                }
            }else{
                //si tengo dato, entonces recupero lastime
                $lasttime = $datos->result_array()[0]["last_time"];

                //ahora recupero los mensajes despeus de lastt
                $datos = $this->getLastMessages($idusers["id"],$lasttime);
                if($datos == "-1"){
                    return 0;
                }else{
                    return count($datos);
                }
            }
        }else{
            return 0;
        }
    }
    
    public function saveLastMessageUser($id_chat,$d_user,$time){
                
         $datos = $this->db->select('*')
            ->from('chat_user')
            ->where('id_users',$id_chat)
            ->where('id_user',$d_user)
            ->where('estatus',1)       
            ->get();
        
        if($datos->num_rows() == 0){
            //no existe tregistrp, agrega
            $data = array(
                "id_users" => $id_chat,
                "id_user" => $d_user,
                "estatus" => 1,
                "last_time" => $time
            );

            $num = $this->db->insert("chat_user",$data);

            return $num;
        }else{        
            //si existe registro, actualiza lasttime
            $iduserchat = $datos->result_array()[0]["id"];
            
            $data = array(
                "last_time" => $time
            );
            
            $this->db->where('id', $iduserchat); 
            $num = $this->db->update("chat_user",$data);

            return $num;
        }
    }
    
    public function savemessage($id,$message,$idprofesor,$temp,$time){
                
        $data = array(
            "id_users" => $id,
            "message" => $message,
            "envia" => $idprofesor,
            "tempName" => $temp,
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
