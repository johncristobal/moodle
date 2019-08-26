<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Homework
 *
 * @author john.cristobal
 */
class Homework extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model("Homeworkmodel");
        $this->load->model("Profesormodel");
    }
    
    public function saveHW(){

        $data = $this->input->post();
        $idpm = $data["idpm"];
        $archivo = "";
        if(isset($_FILES["archivo"]["name"])){
            $archivo = $_FILES["archivo"]["name"];
        }else{
            $archivo = "";
        }
        $this->Homeworkmodel->saveHomework($data,$archivo);
                
        if(isset($_FILES["archivo"]["name"])){
            $tempfile = $_FILES["archivo"]["tmp_name"];
            $archivo = $_FILES["archivo"]["name"];
            
            if (!file_exists('tareas/')) {
                mkdir('tareas/', 0777, true);
            }
            //ahora debemos mover el archivo a la carpeta del idpm
            if (!file_exists('tareas/'.$idpm)) {
                mkdir('tareas/'.$idpm, 0777, true);
            }

            //remember  chmod -R 777 .
            //$sourcePath = $_FILES['foto']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = 'tareas/'.$idpm."/".$archivo;//.$_FILES['file']['name']; // Target path where file is to be stored
            move_uploaded_file($tempfile,$targetPath) ; // Moving Uploaded file
        }

        echo "listo";
    }
    
    public function saveHWStudent(){
        $data = $this->input->post();
        $idtarea = $data["id"];
        $idpm = $data["idpm"];
        
        $archivo = "";
        if(isset($_FILES["archivo"]["name"])){
            $archivo = $_FILES["archivo"]["name"];
        }else{
            $archivo = "";
        }
        $this->Homeworkmodel->saveHomeworkStudent($idtarea,$archivo);
                
        if(isset($_FILES["archivo"]["name"])){
            $tempfile = $_FILES["archivo"]["tmp_name"];
            $archivo = $_FILES["archivo"]["name"];
            
            if (!file_exists('tareas/'.$idpm)) {
                mkdir('tareas/'.$idpm, 0777, true);
            }
            //ahora debemos mover el archivo a la carpeta del idpm
            if (!file_exists('tareas/'.$idpm."/".$idtarea)) {
                mkdir('tareas/'.$idpm."/".$idtarea, 0777, true);
            }

            //remember  chmod -R 777 .
            //$sourcePath = $_FILES['foto']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = 'tareas/'.$idpm."/".$idtarea."/".$archivo;//.$_FILES['file']['name']; // Target path where file is to be stored
            move_uploaded_file($tempfile,$targetPath) ; // Moving Uploaded file
        }

        echo "listo";
    }
    
    public function saveStudentCalif(){
        $data = $this->input->post();
        $idtarea = $data["idtarea"];
        $cali= $data["cali"];
        $materia=$data["materia"];
        //actualiza calificacion en tarea y listo 
        $this->Homeworkmodel->updateHomeworkStudent($idtarea,$cali);
       //obtenermos el id del alumno
        $alumno=$this->Homeworkmodel->getIdAlumnoTarea($idtarea);
        // Se llama a este método para calcular el porcentaje del alumno de tareas moodle
        $this->updatePorcentajeAlumno($materia,$alumno[0]["id_alumno"]);
        echo "listo";
    }
    public function savePorcentajeTarea (){
        $data= $this->input->post();
        $porcentaje=$data["porcentaje"];
        $idMateria=$data["idpm"];
        $this->Homeworkmodel->updatePorcentajeTareas($idMateria,$porcentaje);
        //Se llama a la función updatePorcentajeAlumno para actualizar porcentaje moodle y posteriormente la calificación final de todos los alumnos
        $alumnos=$this->Profesormodel->getAlumnosMateriaProfesor($idMateria); 
        foreach ($alumnos as $key => $value) {
          $this->updatePorcentajeAlumno($idMateria,$value["id_alumno"]); 
          $this->Profesormodel->updateCaliFinal($value["id_alumno"],$idMateria);
       }
            
        echo "listo";
    }
    //método para actualizar y calcular el porcentaje que lleva el alumno en las tareas moodle
    public function updatePorcentajeAlumno($materia,$idAlumno){
        //Sumamos las calificaciones para obtener la parte proporcional
      
       $sumaCal= $this->Homeworkmodel->sumGrades($materia,$idAlumno);
       $totalTareas = $this->Profesormodel->getTotalMaterias($materia); 
       $total=$totalTareas[0]["totalTareas"]*10;
       $porcentaje= $this->Homeworkmodel->getPorcentajeTareas($materia);
       $califParcial= number_format(($sumaCal[0]["totalCalif"]*$porcentaje[0]["porcentaje"])/$total, 2, '.', '') ;
       //Actualizamos la calificación parcial del alumno
       $this->Homeworkmodel->updatePorcentajeTarea($califParcial,$idAlumno,$materia);
        //Actualizamos calificacion final
        $this->Profesormodel->updateCaliFinal($idAlumno,$materia);
    }
    
}
