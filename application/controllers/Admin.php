<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."/third_party/PHPExcel.php";

/*
    NOTA 1
 * En todos los metodos validaremos sesionAction para seguir a cualquier accion
 * 
    NOTA 2
 * puto el que lo lea
 
    NOTA 3
 * agregamos requiere para excel
 * puto el que lo lea -> hahahahahahah cabrón! 
 * Pense que no lo leerias jajaja
 *  */

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Adminmodel');
    }
    
    public function index(){
        if($this->sesionActiva()){
            $this->load->view('admin/admin');
        }else{
            redirect('/');
        }
    }

/* =============================================================================
 * Modulo para usuarios
 =============================================================================*/    
        
    public function users(){
        if($this->sesionActiva()){
            $data["usuarios"] = $this->Adminmodel->getUsers();
            $this->load->view('admin/users',$data);
        }else{
            redirect('/');            
        }
    }
    
    public function register(){
        if($this->sesionActiva()){
            $data["usuarios"] = $this->Adminmodel->getUsers();
            $this->load->view('admin/register',$data);
        }else{
            redirect('/');            
        }
    }
     
    public function nuevoUsuario(){
        if($this->sesionActiva()){
            if($this->input->post()){
                $info=$this->input->post(); 
                $edad=$this->calcularEdad($info["fecha_nacim"]);
                //Se crea primero al usuario
                $result=$this->Adminmodel->crearUsuario($info); 
                
                switch($result[1]){
                    case "profesores":
                        // Se crea al estudiante
                        $resultU=$this->Adminmodel->crearProfesor($info,$result[0],$edad);
                        break;
                    case "alumnos":
                        // Se crea al estudiante
                        $resultU=$this->Adminmodel->crearAlumno($info,$result[0],$edad);
                        break;
                    default: 
                        break;
                }
                
                if($resultU){
                    $data["usuarios"] = $this->Adminmodel->getUsers();
                    $this->load->view('admin/users',$data);
                }
            }
        }else{
            redirect('/');            
        }
    }  
    
    public function calcularEdad($fecha_nacim){
        $fechaHoy = new DateTime();
        $fechaNacim = new DateTime($fecha_nacim);
        $dif = $fechaHoy->diff($fechaNacim);
        return $dif->y;
    }
    
/* =============================================================================
 * Modulo para materias
 =============================================================================*/    
    
    public function asignatures(){
        if($this->sesionActiva()){
            $data["materias"] = $this->Adminmodel->getAsignatures();
            $this->load->view('admin/asignatures',$data);
        }else{
            redirect('/');            
        }
    }

    public function asignaturesTeacher(){
        if($this->sesionActiva()){
            $data["materias_profesor"] = $this->Adminmodel->getAsignaturesTeacher();
            $this->load->view('admin/asignatures_teacher',$data);
        }else{
            redirect('/');            
        }
    }

    public function registerAsignatures(){
        if($this->sesionActiva()){
            $data["materias"] = $this->Adminmodel->getAsignatures();
            $this->load->view('admin/asignatures',$data);
        }else{
            redirect('/');            
        }
    }


/* =============================================================================
 * Modulo para sesion
 =============================================================================*/    
    
    
    public function sesionActiva(){
        $sesion = $this->session->userdata("session");
        if($sesion === "1"){
            return true;
        }else{
            return false; 
        }
    }
    
    public function openExcel(){
        $this->load->view("admin/excel");
    }
    
    public function readExcelUsuarios(){        
        if ($_FILES['excelFile']) {
            $data = $_FILES['excelFile']["tmp_name"];
        }
        
        //$data = $this->input->post('excelFile');
        $file = $data;//'./libro.xlsx';
 
        //load the excel library
        $this->load->library('excel');

        //read file from path
        $objPHPExcel = PHPExcel_IOFactory::load($file);

        //get only the Cell Collection
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

        //extract to a PHP readable array format
        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

            if ($data_value == ""){
                break;
            }
            
            //The header will/should be in row 1 only. of course, this can be modified to suit your need.
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
                $datosUsuario[$column] =  $data_value;   
                if($column == "F"){
                    //guardas datos usuaruio y alumno
                    $info["tipoUser"] = $datosUsuario["C"];
                    $info["correo"] = $datosUsuario["A"];
                    $info["password"] = $datosUsuario["B"];
                    $info["nombre"] = $datosUsuario["D"];
                    $info["matricula"] = $datosUsuario["E"];

                    $result=$this->Adminmodel->crearUsuario($info); 

                    // Se crea al estudiante
                    $resultAlumno=$this->Adminmodel->crearAlumno($info,$result,0);
                    if($resultAlumno){
                        continue;
                    }else{
                        echo "error";
                    }                
                }
            }
            
            
        }

        //$users["usuarios"] = $this->Adminmodel->getUsers();
        //$this->load->view('admin/users',$users);
        redirect('admin/users');
        //send the data in an array format
        //$data['header'] = $header;
        //$data['values'] = $arr_data;
    }
    
    public function cerrar(){
        $this->session->sess_destroy();
        
        redirect('/');
    }
}
