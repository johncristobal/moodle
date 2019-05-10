<?php

class Homeworkmodel extends CI_Model {
    
    public function saveHomework($data,$archivo){
        $description = $data["description"];
        $dateUp =  date('Y-m-d', strtotime($data["dateUp"]));
        $dateDown = date('Y-m-d', strtotime($data["dateDown"]));
        $points = $data["points"];
        $idpm = $data["idpm"];
        
        $datos = array(
            'tarea' => $description,
            'fecha_alta' => $dateUp,
            'fecha_fin' => $dateDown,
            'estatus' => '1',// Personalizar esto cuando esté la tabla estatus @cmaya
            'puntos' => $points,
            'archivo' => $archivo,
            'id_pm' => $idpm
        );
        
        $result=$this->db->insert('tareas', $datos); 
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function getIdProfesor($id){
        $query = $this->db->select('id,nombre')->from('profesores')->where('Fk_usuario',$id)->get();
        
        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array()[0];
        }
    }
    
    //recupermos materias
    public function getMateriasProfesor($id){
        $query = $this->db->select('profesor_materia.id_pm, materias.materia')
            ->from('materias')
            ->join("profesor_materia","profesor_materia.materia = materias.id")
            ->where('profesor',$id)->get();

        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array();
        }
    }
    
    //recuperamos tareas
    public function getTareasMateriaProfesor($idpm){
        $query = $this->db->select('*')
            ->from('tareas')
            ->where('id_pm',$idpm)->get();

        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array();
        }
    }
    
    public function getAlumnosMateriasProfesor($idpm){
        $query = $this->db->select('*')
            ->from('alumno_profesor_materia')
            ->where('id_pm',$idpm)
            ->get();

        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array();
        } 
    }


    public function validateLogin($data){

        $datos = $this->db->select('id,rol')
            ->from('usuarios')
            ->where('correo',$data['correo'])
            ->where('password',$data['pass'])
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
