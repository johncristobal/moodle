<?php

class Profesormodel extends CI_Model {
    
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
        $query = $this->db->select('profesor_materia.id_pm,profesor_materia.grupo, materias.materia')
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
    
    public function getTareasAlumno($idtarea){
        $query = $this->db->select('alumno_tareas.id,alumno_tareas.archivo,alumno_tareas.calificacion,tareas.puntos,tareas.tarea,tareas.id_pm,alumnos.nombre,alumno_tareas.estatus,alumno_tareas.id_tarea')
            ->from('alumno_tareas')
            ->join("tareas","tareas.id = alumno_tareas.id_tarea")
            ->join("alumnos","alumnos.id = alumno_tareas.id_alumno")
            ->where('alumno_tareas.id_tarea',$idtarea)
            ->get();

        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array();
        } 
    }
    
    public function getInfoTarea($id){
        $query = $this->db->select('id,nombre')->from('profesores')->where('Fk_usuario',$id)->get();
        
        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array()[0];
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
