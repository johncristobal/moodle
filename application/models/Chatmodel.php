<?php

class Chatmodel extends CI_Model {
    
    public function getMessages($idfrom,$idfrom2){
     
        $datos = $this->db->select('*')
            ->from('chat')
            ->where('id_user',$idfrom)
            ->or_where('id_user',$idfrom2)
            ->get();
        
        if($datos->num_rows() == 0){
            return array();
        }else{        
            return $datos->result_array();
        }
    }    
}
