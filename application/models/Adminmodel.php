<?php

class Adminmodel extends CI_Model {
    
    public function getUsers(){

        $datos = $this->db->select('*')
            ->from('usuarios')
            ->where('estatus',"1")
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
            ->get();
        
        if($datos->num_rows() == 0){
            return "";
        }else{        
            return $datos->result_array();
        }
    }
    
    public function crearProfesor($info,$idUser,$edad){

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

    public function crearAlumno($info,$idUser,$edad){

        $datos = [
            'id' => '',
            'nombre' => $info["nombre"],
            'matricula' => $info["matricula"],
            'edad' => $edad,
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
         */       
        if($result){
            $insertId = $this->db->insert_id();
            return [$insertId,$tabla];
        }else{
            return null;
        }

        /*if($result){
        $idUser=$this->db->select('id')
            ->from('usuarios')
            ->where('correo',$info["correo"])
            ->get()->row();
            if(isset($idUser)){
                return $idUser->id;  
            }else{
                return null;
            }
        }*/
    }

/* =============================================================================
 * Modulo para materias
 =============================================================================*/    

    public function getAsignatures(){

        $datos = $this->db->select('*')
            ->from('materias')
            ->where('estatus',"1")
            ->get();
        
        if($datos->num_rows() == 0){
            return "";
        }else{        
            return $datos->result_array();
        }
    }
    
    public function getAsignaturesTeacher(){
        $datos = $this->db->select('profesor_materia.id_pm,profesores.nombre,materias.materia')
            ->from('profesor_materia')
            ->join("profesores","profesores.id = profesor_materia.profesor")
            ->join("materias","materias.id = profesor_materia.materia")
            ->where('profesor_materia.estatus',"1")
            ->get();
        
        if($datos->num_rows() == 0){
            return "";
        }else{        
            return $datos->result_array();
        } 
    }
    
    public function saveRelationProfesorMateria($idmateria,$idprofesor){
        $datos = $this->db->select('*')
            ->from('profesor_materia')
            ->where('profesor',$idprofesor)
            ->where('materia',$idmateria)
            ->where('estatus',"1")
            ->get();
        
        if($datos->num_rows() == 0){
            //no existe, guardo
            $temp = array(
                "profesor" => $idprofesor,
                "materia" => $idmateria,
                "estatus" => 1
            );
            $result=$this->db->insert('profesor_materia', $temp); 
        }else{
            return "-1";
        } 
    }
    
    public function deleteProfesorMateria($idpm){
        $data = array(
            "estatus" => 2
        );

        $this->db->where('id_pm', $idpm); 
        $num = $this->db->update("profesor_materia",$data);

        return $num;
    }
    
    public function deleteAlumnosProfesorMateria($idpm){
        $data = array(
            "estatus" => 2
        );

        $this->db->where('id_pm', $idpm); 
        $num = $this->db->update("alumno_profesor_materia",$data);

        return $num;
    }
    
    public function deleteTareasProfesorMateria($idpm){
        $data = array(
            "estatus" => 2
        );

        $this->db->where('id_pm', $idpm); 
        $num = $this->db->update("tareas",$data);

        //recupero idtareas 
        $datos = $this->db->select('id')
            ->from('tareas')
            ->where('id_pm',$idpm)
            ->get();
        
        if($datos->num_rows() == 0){
            //no existe, guardo
            return "-1";
        }else{
            //iteramos sobre los id y vamos poniendo estatus 2 en alumnos_tareas
            foreach ($datos->result_array() as $value) {
                
                $id = $value["id"];
                $this->db->where('id_tarea', $id); 
                $num = $this->db->update("alumno_tareas",$data);
            }
        } 
        
        return $num;
    }
    
    public function deleteChatProfesorMateria($idpm){
        $data = array(
            "estatus" => 2
        );

        $this->db->where('users', "PM_".$idpm); 
        $num = $this->db->update("mainchat",$data);
        
        $idchat = $this->getIdUsers("PM_".$idpm)["id"];

        $this->db->where('id_users', $idchat); 
        $this->db->update("chats",$data);
        //chatuser
        $this->db->where('id_users', $idchat); 
        $this->db->update("chat_user",$data);
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
}
