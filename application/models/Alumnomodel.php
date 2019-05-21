<?php

class Alumnomodel extends CI_Model {
    
    public function getIdAlumno($id){
        $query = $this->db->select('id,nombre')->from('alumnos')->where('Fk_usuario',$id)->get();
        
        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array()[0];
        }
    }
    
    // obtenemos la información del alumno
    public function getInfoGrupo($idpm){
        $query = $this->db->select('profesor_materia.id_pm,profesor_materia.grupo,profesores.nombre,materias.materia')
            ->from('profesor_materia')
            ->join("profesores","profesor_materia.profesor = profesores.id")
            ->join("materias","profesor_materia.materia = materias.id")
            ->where('profesor_materia.id_pm',$idpm)
            ->get();
        
        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array()[0];
        }
    }  
    
    // obtenemos la información del alumno
    public function getInfoAlumno($id){
        $query = $this->db->select('usuarios.*, alumnos.*')
            ->from('usuarios')
            ->join("alumnos","usuarios.id = alumnos.Fk_usuario")
            ->where('alumnos.id',$id)
            ->get();
        
        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array()[0];
        }
    }   
    
    public function getProfesoresMateriasAlumno($idalumno){
        $query = $this->db->select('*')
            ->from('alumno_profesor_materia')
            ->where('id_alumno',$idalumno)
            ->get();

        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array();
        } 
    }
    
    //recupermos materias
    /*
     * select materias.materia from materias
inner join profesor_materia on materias.id = profesor_materia.materia
inner join alumno_profesor_materia on profesor_materia.id_pm = alumno_profesor_materia.id_pm
where alumno_profesor_materia.id_alumno = 1
     */
    public function getMateriasAlumno($id){
        $query = $this->db->select('materias.materia,profesores.nombre,profesor_materia.id_pm,profesor_materia.grupo,profesores.id')
                ->from('materias')
                ->join("profesor_materia","materias.id = profesor_materia.materia")
                ->join("profesores","profesores.id = profesor_materia.profesor")
                ->join("alumno_profesor_materia","profesor_materia.id_pm = alumno_profesor_materia.id_pm")
                ->where('alumno_profesor_materia.id_alumno',$id)->get();
        
        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array();
        }
    }

/************************
 *  Tareas
 ***********************/  
    
    //recuperamos tareas
    public function getTareasMateriaAlumno($idpm){
        $query = $this->db->select('*')
            ->from('tareas')
            ->where('id_pm',$idpm)->get();

        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array();
        }
    }
    
    public function getTareasAlumno($idtarea,$idalumno){
        $query = $this->db->select('alumno_tareas.id,alumno_tareas.estatus,alumno_tareas.calificacion,tareas.archivo,tareas.tarea,tareas.fecha_fin,tareas.puntos')
            ->from('alumno_tareas')
            ->join("tareas","tareas.id = alumno_tareas.id_tarea")
            ->where('alumno_tareas.id_tarea',$idtarea)
            ->where('alumno_tareas.id_alumno',$idalumno)->get();

        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array()[0];
        }
    }

/************************
 *  Login
 ***********************/    

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
