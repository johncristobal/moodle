<?php

class Loginmodel extends CI_Model {
    
    public function validateLogin($data){

        $datos = $this->db->select('id,rol,password')
            ->from('usuarios')
            ->where('correo',$data['correo'])
            ->get();
        
        if($datos->num_rows() == 0){
            return array(
                "id" => "-1",
                "rol" => "-1"
            );
        }else{        
            return $datos->result_array()[0];
        }
    }
}
