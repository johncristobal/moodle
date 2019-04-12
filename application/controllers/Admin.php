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
             // Se crea al estudiante
             $result=$this->Adminmodel->crearAlumno($info,$result,$edad);
             if($result){
                $this->load->view('admin/admin');
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
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'xlsx';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload');

        if ( ! $this->upload->do_upload('excelFile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        else
        {
            $fileTemp = $this->upload->data();

            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }
                
        $data = $this->input->post('excelFile');
        $file = './libro.xlsx';
 
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
                $arr_data[$row][$column] = $data_value;
            }
        }

        //send the data in an array format
        $data['header'] = $header;
        $data['values'] = $arr_data;
    }
    
    public function cerrar(){
        $this->session->sess_destroy();
        
        redirect('/');
    }
}
