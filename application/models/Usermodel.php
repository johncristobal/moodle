<?php

class Usermodel extends CI_Model {
    
    public function getUsers(){

        $datos = $this->db->select('*')
            ->from('usuarios')
            ->where('estatus',"1")
            ->or_where('estatus',"2") //Agregué esta condición para que se muestren los usuarios bloqueados
            ->get();
        
        if($datos->num_rows() == 0){
            return "";
        }else{        
            return $datos->result_array();
        }
    }
        
    public function getProfesores(){

        $datos = $this->db->select('*')
            ->from('profesores')
            ->where('estatus',"1")
            ->or_where('estatus',"2")
            ->get();
        
        if($datos->num_rows() == 0){
            return "";
        }else{        
            return $datos->result_array();
        }
    }
    
    public function getAlumnos(){

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
    
    public function crearDirector($info,$idUser){

        $datos = [
            'id' => '',
            'nombre' => $info["nombre"],
            'matricula' => $info["matricula"],
            'fecha_nac' => $info["fecha_nacim"],
            'estatus' => '1',// Personalizar esto cuando esté la tabla estatus @cmaya
            'fecha_alta' => date("Y-m-d"),
            'Fk_usuario' => $idUser
        ];
        $result=$this->db->insert('directores', $datos); 
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function crearProfesor($info,$idUser){

        $datos = [
            'id' => '',
            'nombre' => $info["nombre"],
            'matricula' => $info["matricula"],
            'fecha_nac' => $info["fecha_nacim"],
            'estatus' => '1',// Personalizar esto cuando esté la tabla estatus @cmaya
            'fecha_alta' => date("Y-m-d"),
            'Fk_usuario' => $idUser
        ];
        $result=$this->db->insert('profesores', $datos); 
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function crearAlumno($info,$idUser){

        $datos = [
            'id' => '',
            'nombre' => $info["nombre"],
            'matricula' => $info["matricula"],
            'fecha_nac' => $info["fecha_nacim"],
            'estatus' => '1',// Personalizar esto cuando esté la tabla estatus @cmaya
            'fecha_alta' => date("Y-m-d"),
            'Fk_usuario' => $idUser
        ];
         $result=$this->db->insert('alumnos', $datos); 
          if($result){
            return true;
          }else{
            return false;
          }
    }

    public function crearUsuario($info){
        //Definimos el tipo de rol
        switch ($info["tipoUser"]) {
            case 'Admin':
                $tipoUser=1;
                $tabla="";
                break;
             case 'Maestro':
                $tipoUser=2;
                $tabla="profesores";
                break;
            case 'Alumno':
                $tipoUser=3;
                $tabla="alumnos";
                break;
            case 'Director':
                $tipoUser=4;
                $tabla="directores";
                break;
            default:
                $tipoUser=null;
                break;
        }
        $datos = [
            'id' => '',
            'correo' => $info["correo"],
            'password' => $info["password"],
            'estatus' => '1',// Personalizar esto cuando esté la tabla estatus @cmaya
            'rol' =>$tipoUser,
            'fecha_alta' => date("Y-m-d")
        ];
        
        $result=$this->db->insert('usuarios', $datos); 
        
        /*
         * Cambio forma de recuperar id, usando insert_id
         Súper!
         */       
        if($result){
            $insertId = $this->db->insert_id();
            return [$insertId,$tabla];
        }else{
            return null;
        }
    }
    
    //Editar usuario
    public function editarUser($info){
        //Se edita primero al usuario
        switch ($info["tipoUser"]) {
            case 'Admin':
                $tipoUser=1;
                $tabla="";
                break;
             case 'Maestro':
                $tipoUser=2;
                $tabla="profesores";
                break;
            case 'Alumno':
                $tipoUser=3;
                $tabla="alumnos";
                break;                           
            case 'Director':
                $tipoUser=4;
                $tabla="directores";
                break;                           
            default:
                $tipoUser=null;
                break;
        }
        
        $datos = [
            'correo' => $info["correo"],
            //'password' => $info["password"],//
            'estatus' => '1',// Personalizar esto cuando esté la tabla estatus @cmaya
            'rol' =>$tipoUser,
            'fecha_alta' => date("Y-m-d")
        ];
        
        $this->db->where('id', $info["idUser"]);
        $this->db->update('usuarios', $datos);
        
        //Actualizamos ahora a la tabla del rol de usuario
        $datosRol = [
            'nombre' => $info["nombre"],
            'matricula' => $info["matricula"],
            'fecha_nac' => $info["fecha_nacim"],
            'estatus' => '1',// Personalizar esto cuando esté la tabla estatus @cmaya
            'fecha_alta' => date("Y-m-d"),
        ]; 
        
        $this->db->where('Fk_usuario', $info["idUser"]);
        $this->db->update($tabla, $datosRol);
        return true;
    }
    
    public function eliminarUser($id,$table){
       $this->db->where('Fk_usuario', $id);
       $result=$this->db->delete($table);  
       if($result){
       $this->db->where('id', $id);
       $result2=$this->db->delete("usuarios"); 
           if ($result2){
            return true;  
           } else{
            return false;
           }
       }else{
        return false;
       }    
    }
    
    public function getRol($id){
        $query = $this->db->select('rol')
            ->from('usuarios')
            ->where('id',$id)
            ->get();
        
        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array()[0];
        } 
    }

    public function getInfoUser($id,$tabla){
        $query = $this->db->select('usuarios.*, '.$tabla.'.*')
            ->from('usuarios')
            ->join($tabla,"usuarios.id = ".$tabla.".Fk_usuario")
            ->where('usuarios.id',$id)
            ->get();
        
        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->row();
        } 
    }

    public function changeStatus($id,$Status){
        //Creamos una función de cambio de estatus 
             $datos = [
            'estatus' => $Status,
        ]; 
        $this->db->where('id', $id);
        $result=$this->db->update('usuarios', $datos);
        if($result){
            return true;
        }else{
            return false;
        }   

    } 

     public function getStatus($id){

        $datos = $this->db->select('*')
            ->from('usuarios')
            ->where('id',$id)
            ->get();
        
        if($datos->num_rows() == 0){
            return "";
        }else{        
            return $datos->row();
        }
    }

}
