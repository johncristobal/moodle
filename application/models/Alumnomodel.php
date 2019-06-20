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
    
    public function updateProfileAlumno($data,$archivo,$idalumno){
        
        if($archivo == ""){
            $datos = array(
                "nombre" => $data["nombre"],
                "fecha_nac" => date('Y-m-d', strtotime($data["dateDown"])),
                "matricula" => $data["matricula"]
            );
        }else{
            $datos = array(
                "nombre" => $data["nombre"],
                "fecha_nac" => date('Y-m-d', strtotime($data["dateDown"])),
                "matricula" => $data["matricula"],
                "imagen_perfil" => $archivo            
            );
        }
                
        $this->db->where("id",$idalumno);
        $this->db->update("alumnos",$datos);
        
        $datosUser = array(
            "correo" => $data["correo"]
        );
        
        $this->db->where("id",$data["idusuario"]);
        $this->db->update("usuarios",$datosUser);
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
        $query = $this->db->select('materias.materia,profesores.nombre,profesores.imagen_perfil,profesor_materia.id_pm,profesor_materia.grupo,profesores.id')
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
 *  Calificaciones
 ***********************/  
//SELECT * FROM `calificaciones`t1 JOIN profesor_materia t2 ON t2.id_pm=t1.id_pm JOIN materias t3 ON t3.id=t2.materia WHERE t1.fk_student=2
    public function getGrades($idalumno){
        $query = $this->db->select('calificaciones.examen,calificaciones.tareas,calificaciones.calificacion,profesor_materia.grupo,materias.materia')
            ->from('calificaciones')
            ->join("profesor_materia","profesor_materia.id_pm = calificaciones.id_pm")
            ->join("materias","materias.id = profesor_materia.materia")
            ->where('fk_student',$idalumno)->get();

        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array();
        }

    }
    //obtener el nombre de la materia y grupo
//SELECT * from profesor_materia t1 JOIN materias t2 ON t1.materia=t2.id WHERE t1.id_pm=100001
 /*   public function getRestInfo($id_pm){
          $query = $this->db->select('
            profesor_materia.grupo, materias.materia
            ')
            ->from('profesor_materia')
            ->join("materias","materias.id = profesor_materia.materia")
            ->where('profesor_materia.id_pm',$id_pm)->get();

        if($query->num_rows() == 0){
            return "-1";
        }else{
            return $query->result_array()[0];
        }
    }*/
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
