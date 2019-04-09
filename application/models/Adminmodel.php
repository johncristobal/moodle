<?php

class Adminmodel extends CI_Model {
    
    public function getUsers(){

        $datos = $this->db->select('*')
            ->from('alumnos')
            ->where('estatus',"1")
            ->get();
        
        if($datos->num_rows() == 0){
            return "";
        }else{        
            return $datos->result_array();
        }
    }
}
