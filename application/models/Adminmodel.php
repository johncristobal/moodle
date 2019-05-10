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

    public function getInfoSubject($idSubject){

        $datos = $this->db->select('*')
            ->from('materias')
            ->where('id',$idSubject)
            ->get();
        
        if($datos->num_rows() == 0){
            return "";
        }else{        
            return $datos->row();
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
        $num = $this->db->delete("profesor_materia");

        return $num;
    }
    
    public function deleteAlumnosProfesorMateria($idpm){
        $data = array(
            "estatus" => 2
        );

        $this->db->where('id_pm', $idpm); 
        $num = $this->db->delete("alumno_profesor_materia");

        return $num;
    }
    
    public function deleteTareasProfesorMateria($idpm){
        $data = array(
            "estatus" => 2
        );

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
                $num = $this->db->delete("alumno_tareas");
            }
        }        
        
        $this->db->where('id_pm', $idpm); 
        $num = $this->db->delete("tareas");
        
        return $num;
    }
    
    public function deleteChatProfesorMateria($idpm){
        $data = array(
            "estatus" => 2
        );
        
        $idchat = $this->getIdUsers("PM_".$idpm);
        if($idchat != "-1"){
            $this->db->where('id_users', $idchat["id"]); 
            $this->db->delete("chats");
            //chatuser
            $this->db->where('id_users', $idchat["id"]); 
            $this->db->delete("chat_user");

            $this->db->where('users', "PM_".$idpm); 
            $this->db->delete("mainchat");
        }        
        return "1";
    }
    
    public function createSubject($info){
        $datos = [
            'id' => '',
            'materia' => $info["nombreMateria"],
            'estatus' => $info["estatusMateria"],
            'fecha_alta' => date("Y-m-d")
        ];
        
        $result=$this->db->insert('materias', $datos); 
         
        if($result){
            $insertId = $this->db->insert_id();
            return [$insertId,$tabla];
        }else{
            return null;
        }
    }

    public function editSubject($idSubject,$info){
        $datos = [
            'materia' => $info["nombreMateria"],
            'estatus' => $info["estatusMateria"],
            'fecha_alta' => date("Y-m-d")//Considerar guardar el cambio de la última edición
        ]; 
        $this->db->where('id', $idSubject);
        $result=$this->db->update('materias', $datos);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function deleteSubject($idSubject){

       $this->db->where('id', $idSubject);
       $result=$this->db->delete('materias');  
         
        if($result){
            return true;
        }else{
            return false;
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
}
