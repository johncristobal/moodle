<?php

class Alumnomodel extends CI_Model {
    
    public function getIdAlumno($id){
        $query = $this->db->select('id')->from('alumnos')->where('Fk_usuario',$id)->get();
        
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
            ->get();
        
        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array()[0];
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
        $query = $this->db->select('materias.materia,profesores.nombre')
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
