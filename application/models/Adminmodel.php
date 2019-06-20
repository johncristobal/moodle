<?php

class Adminmodel extends CI_Model {
        
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
        $datos = $this->db->select('profesor_materia.id_pm,profesor_materia.grupo,profesores.nombre,materias.materia')
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
    
    public function saveRelationProfesorMateria($idmateria,$idprofesor,$grupo){
        
        //la insertare por si acaso
        $temp = array(
            "profesor" => $idprofesor,
             "materia" => $idmateria,
            "grupo" => $grupo,
            "estatus" => 1
        );
        
        $result=$this->db->insert('profesor_materia', $temp); 
            
        return $result;
        
        /*$datos = $this->db->select('*')
            ->from('profesor_materia')
            ->where('profesor',$idprofesor)
            ->where('materia',$idmateria)
            ->where('estatus',"1")
            ->get();
        
        //checo si existe, si no para crearla
        if($datos->num_rows() == 0){
            //no existe, guardo
            $temp = array(
                "profesor" => $idprofesor,
                "materia" => $idmateria,
                "grupo" => $grupo,
                "estatus" => 1
            );
            $result=$this->db->insert('profesor_materia', $temp); 
        }else{
            return "-1";
        }*/ 
    }
    
    /*
     * Grupos
     */
    
    public function getDataGrupo($idpm){
        $datos = $this->db->select('profesor_materia.grupo,profesor_materia.id_pm,profesores.nombre,materias.materia')
            ->from('profesor_materia')
            ->join("profesores","profesores.id = profesor_materia.profesor")
            ->join("materias","materias.id = profesor_materia.materia")
            ->where('profesor_materia.id_pm',$idpm)
            ->where('profesor_materia.estatus',"1")
            ->get();
        
        //checo si existe, si no para crearla
        if($datos->num_rows() == 0){
            return "-1";            
        }else{
            return $datos->result_array()[0];
        }
    }
    
    public function getAlumnosMateria($idpm){
        $datos = $this->db->select('alumno_profesor_materia.id,alumno_profesor_materia.id_alumno,alumnos.nombre')
            ->from('alumno_profesor_materia')
            ->join("alumnos","alumnos.id = alumno_profesor_materia.id_alumno")
            ->where('alumno_profesor_materia.id_pm',$idpm)
            ->where('alumno_profesor_materia.estatus',"1")
            ->get();
        
        //checo si existe, si no para crearla
        if($datos->num_rows() == 0){

            return "-1";
        }else{
            return $datos->result_array();
        }
    }
    
    public function saveRelationAlumnoGrupo($idpm,$idalumno){
        
        $datos = $this->db->select('*')
            ->from('alumno_profesor_materia')
            ->where('id_alumno',$idalumno)
            ->where('id_pm',$idpm)
            ->where('estatus',"1")
            ->get();
        
        //checo si existe, si no para crearla
        if($datos->num_rows() == 0){

            //la insertare por si acaso
            $temp = array(
                "id_alumno" => $idalumno,
                "id_pm" => $idpm,
                "estatus" => 1
            );

            $result=$this->db->insert('alumno_profesor_materia', $temp); 

            return $result;
        }else{
            return "-1";
        }
    }
    
    public function eliminarRelationAlumnoGrupo($idpm,$alumnos){
        $this->db->where('id_pm', $idpm); 
        $this->db->where('id_alumno', $alumnos); 
        $num = $this->db->delete("alumno_profesor_materia");

        return $num;
    }
    
/*
    CHAT
 *  */
    
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
