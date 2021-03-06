<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."/third_party/PHPExcel.php";

/*
    NOTA 1
 * En todos los metodos validaremos sesionAction para seguir a cualquier accion
 * 
 
    NOTA 2
 * agregamos requiere para excel
 *  */

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Adminmodel');
        $this->load->model('Usermodel');
        $this->load->library('encrypt');
    }
    
    public function index(){
        if($this->sesionActiva() && $this->validaUser()){
            $this->load->view('admin/admin');
        }else{
            redirect('/');
        }
    }

/* =============================================================================
 * Modulo para usuarios
 =============================================================================*/    
        
    public function users(){
        if($this->sesionActiva() && $this->validaUser()){
            $data["usuarios"] = $this->Usermodel->getUsers();
            $this->load->view('admin/users',$data);
        }else{
            redirect('/');            
        }
    }
    
    public function register(){
        if($this->sesionActiva() && $this->validaUser()){
            $data["usuarios"] = $this->Usermodel->getUsers();
            $this->load->view('admin/register',$data);
        }else{
            redirect('/');            
        }
    }
     
    public function nuevoUsuario(){
        if($this->sesionActiva() && $this->validaUser()){
            if($this->input->post()){
                $info=$this->input->post(); 
                //$edad=$this->calcularEdad($info["fecha_nacim"]);
                //Se crea primero al usuario
                $info["password"]= password_hash($info["password"], PASSWORD_DEFAULT);
                $result=$this->Usermodel->crearUsuario($info); 
                
                switch($result[1]){
                    case "profesores":
                        // Se crea al profesor
                        $resultU=$this->Usermodel->crearProfesor($info,$result[0]);
                        break;
                    case "alumnos":
                        // Se crea al estudiante
                        $resultU=$this->Usermodel->crearAlumno($info,$result[0]);
                        break;
                    case "directores":
                        // Se crea al director
                        $resultU=$this->Usermodel->crearDirector($info,$result[0]);
                        break;
                    default: 
                        break;
                }
                
                if($resultU){
                    $data["usuarios"] = $this->Usermodel->getUsers();
                    $this->load->view('admin/users',$data);
                }
            }
        }else{
            redirect('/');            
        }
    }  
    
    public function editarUsuario($id){
        if($this->sesionActiva() && $this->validaUser()){
            $result=$this->Usermodel->getRol($id); 
            if($result){
                switch ($result["rol"]) {
                    case '1':
                        $tabla="adm"; //Habrá que definir si se pueden eliminar entre admins
                        break;
                     case '2':
                        $tabla="profesores"; 
                        break;
                    case '3':
                        $tabla="alumnos"; 
                        break; 
                    case '4':
                        $tabla="directores"; 
                        break; 
                    default:
                        break;
                }
                
                $data["info"]=$this->Usermodel->getInfoUser($id,$tabla);
                $data["idUser"]=$id;
                if($data){
                    $this->load->view('admin/editUser',$data);
                } 
            }
        }else{
            redirect('/');            
        }
    }
    
    public function eliminarUsuario($id){
        if($this->sesionActiva() && $this->validaUser()){
             $result=$this->Usermodel->getRol($id); 
             if($result){
                switch ($result["rol"]) {
                    case '1':
                        $tabla="adm"; //Habrá que definir si se pueden eliminar entre admins
                        break;
                     case '2':
                        $tabla="profesores"; 
                        $idpm=$this->Usermodel->getIdPmProfesor($id);
                        //en caso de ser profesores se debe elimnar la relación de la tabla profesor alumno materia
                        $this->Adminmodel->deleteChatProfesorMateria($idpm["id_pm"]);
                        $this->Adminmodel->deleteTareasProfesorMateria($idpm["id_pm"]);

                        //primero set estatus 2 en tabla profesor_materia
                        $this->Adminmodel->deleteAlumnosProfesorMateria($idpm["id_pm"]);

                        //primero set estatus 2 en tabla profesor_materia
                        $this->Adminmodel->deleteProfesorMateria($idpm["id_pm"]);
                        break;
                    case '3':
                        $tabla="alumnos"; 
                        //obtenemos id de la tabla alumnos
                        $result=$this->Usermodel->getAlumno($id);
                        //en caso de ser alumnos se debe elimnar la relación de la tabla profesor alumno materia
                        $this->Usermodel->eliminarProfAlum($result["id"]);
                        break; 
                    case '4':
                        $tabla="directores"; 
                        break; 
                    default:
                        break;
                }

               $result=$this->Usermodel->eliminarUser($id,$tabla);
               if($result){
                redirect('admin/users');
               }
             }
        }else{
            redirect('/');            
        }
    }
    
    public function guardarCambios(){
        if($this->sesionActiva() && $this->validaUser()){
            if($this->input->post()){
                $info=$this->input->post();
                $info["password"]= password_hash($info["password"], PASSWORD_DEFAULT);
                $result=$this->Usermodel->editarUser($info);  
                redirect('admin/users');              
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
   
    public function blockUser($id){
          if($this->sesionActiva() && $this->validaUser()){
            /* Primero se cambia el estatus del ususario a bloqueado, Estatus de bloqueo =2 */
            $result=$this->Usermodel->changeStatus($id,2);
            if($result){
              redirect('admin/users');   
            }
          }else{
                redirect('/');   
         }
    }
    public function unBlockUser($id){
          if($this->sesionActiva() && $this->validaUser()){
            $result=$this->Usermodel->changeStatus($id,1);
            if($result){
              redirect('admin/users');   
            }
          }else{
                redirect('/');   
         }
    }
    public function validateStatus($idUser){
        if($this->sesionActiva() && $this->validaUser()){
           $status= $this->Usermodel->getStatus($idUser);
            return($status);
        }else{
            redirect('/');            
        }
    }
/* =============================================================================
 * Modulo para materias
 =============================================================================*/    
    
    public function asignatures(){
        if($this->sesionActiva() && $this->validaUser()){
            $data["materias"] = $this->Adminmodel->getAsignatures();
            $this->load->view('admin/asignatures',$data);
        }else{
            redirect('/');            
        }
    }


    public function registerAsignatures(){
        if($this->sesionActiva() && $this->validaUser()){
            $data["materias"] = $this->Adminmodel->getAsignatures();
            $this->load->view('admin/asignatures',$data);
        }else{
            redirect('/');            
        }
    }
    
    public function deleteProfesorMateria(){
        if($this->sesionActiva() && $this->validaUser()){
            //rewcupero json con datos de select's
            $idpm = $this->input->post("idpm"); 
            
            //ahora chat / mainchar / chatuset
            $this->Adminmodel->deleteChatProfesorMateria($idpm);

            //ahora tearas / alumno_tarea
            $this->Adminmodel->deleteTareasProfesorMateria($idpm);

            //primero set estatus 2 en tabla profesor_materia
            $this->Adminmodel->deleteAlumnosProfesorMateria($idpm);

            //primero set estatus 2 en tabla profesor_materia
            $this->Adminmodel->deleteProfesorMateria($idpm);
            
            echo "listo";
        }else{
            redirect('/');            
        }
    }
    
    public function createSubject(){
        if($this->sesionActiva() && $this->validaUser()){
            if($this->input->post()){
                $info=$this->input->post();
               $idSubject=$this->Adminmodel->createSubject($info);
               if($idSubject){
                redirect('admin/asignatures');  
               }else{
                /* Llamar a página de error*/
                echo "error";
               }
            }else{
            $this->load->view('admin/createSubject');
            }  

        }else{
             redirect('/'); 
        }
    }
    public function editSubject($id){
        if($this->sesionActiva() && $this->validaUser()){
            if($this->input->post()){
            $info=$this->input->post();
            $result=$this->Adminmodel->editSubject($id,$info);
            if($result){
               redirect('admin/asignatures'); 
            }else{
               /* Llamar a página de error*/
                echo "error";  
            }
        }else{
            $data["info"]=$this->Adminmodel->getInfoSubject($id);
            $data["idSubject"]=$id;
            if($data){

                $this->load->view('admin/editSubject',$data);
            }
            
        }
        }else{
            redirect('/');   
        }

    }
    public function deleteSubject($id){
        if($this->sesionActiva() && $this->validaUser()){
            //validamos que no exista alguna dependencia en profesor materia
            $rel=$this->Adminmodel->getProfesorMateria($id);
            if($rel!="-1"){
                $this->session->set_flashdata('msg', 'No se puede elimar al usuario - considerar eliminar primero grupos relacionados');
                redirect('admin/asignatures');
            }else{
                $result=$this->Adminmodel->deleteSubject($id);
                if($result){
                   redirect('admin/asignatures'); 
                }else{
                   /* Llamar a página de error*/
                    echo "error - eliminar usuario";  
                } 
            }

        }else{
            redirect('/');   
        }

    }

/* =============================================================================
 * Modulo para grupos
 =============================================================================*/    
    
    public function groups(){
        if($this->sesionActiva() && $this->validaUser()){
            
            $alumnosMateriaArray = array();
            
            //materias ya asignadas
            $data["materias_profesor"] = $this->Adminmodel->getAsignaturesTeacher();
            //materias
            $data["materias"] = $this->Adminmodel->getAsignatures();
            //profesores
            $data["profesores"] = $this->Adminmodel->getProfesores();
            //allumno
            $data["alumnos"] = $this->Adminmodel->getAlumnos();
            
            //alumnos en grupos
            if ($data["materias_profesor"] != ""){
                foreach ($data["materias_profesor"] as $value) {
                    $idpm = $value["id_pm"];
                    $grupo = $value["grupo"];
                    $alumnosMateria = $this->Adminmodel->getAlumnosMateria($idpm);

                    $alumnosMateriaArray[$grupo] = $alumnosMateria;                
                }

                $data["alumnosMateriaArray"] = $alumnosMateriaArray;
            }
            
            $this->load->view('admin/groups',$data);
        }else{
            redirect('/');            
        }
    }
    
    public function studentsGroups($idpm){
        if($this->sesionActiva() && $this->validaUser()){
        $alumnosMateria = $this->Adminmodel->getAlumnosMateria($idpm);

        $data["grupo"] = $this->Adminmodel->getDataGrupo($idpm);
        $data["alumnosMateriaArray"] = $alumnosMateria;
        //allumno
        $data["alumnos"] = $this->Adminmodel->getAlumnos();

        $this->load->view("admin/studentsGroup",$data);
    }else{
        redirect("/");
    }
    }
    
    public function getAlumnosGrupo(){
        $idpm = $this->input->post("data"); 
        $alumnosMateria = $this->Adminmodel->getAlumnosMateria($idpm);        
        echo json_encode($alumnosMateria);//$alumnosMateria;
    }
    
    public function saveProfesroMateria(){
        if($this->sesionActiva() && $this->validaUser()){
            //rewcupero json con datos de select's
            $datos = $this->input->post("data"); 
            $json = json_decode($datos);
            //itero
            foreach ($json as $value) {
                
                $idmateria = $value->idmateria;
                $idprofe = $value->idprofe;
                $grupo = $value->grupo;
                //ahora, verifico si existe primero, si no, guardo
                $this->Adminmodel->saveRelationProfesorMateria($idmateria,$idprofe,$grupo);
            }
            
            echo "listo";
        }else{
            redirect('/');            
        }
    }
    
    public function saveAlumnoGrupo(){
        $alumnos = $this->input->post("alumnos"); 
        $idpm = $this->input->post("idpm"); 
        
        $todos = explode(",", $alumnos);
        foreach ($todos as $value) {
            if($value != ""){
                
                $this->Adminmodel->saveRelationAlumnoGrupo($idpm,$value); 
                //Inicializamos las calificaciones en 0 de los alumnos que se registraron
                $this->Adminmodel->inicializarCalificaciones($idpm,$value);               
            }
        }
        
        echo "listo";
    }
    
    public function eliminarAlumnoMateria(){
        $alumnos = $this->input->post("alumno"); 
        $idpm = $this->input->post("idpm"); 
        //Primero eliminamos la relación en calificaciones
         $this->Adminmodel->eliminarCalificaciones($idpm,$alumnos);
        $this->Adminmodel->eliminarRelationAlumnoGrupo($idpm,$alumnos);
        
        echo "listo";
    }

/* =============================================================================
 * Modulo para anuncios
 =============================================================================*/   
    
    public function banners(){
        //parametro
        $key = "banner";
        //$back = $this->AdminModel->getParametro($key);
        $back = "banners";
        
        $map = $this->Adminmodel->getBanners();
        
        $data["banners"] = $map;
        $data["urlfolder"] = $back;
        //vista con banners
        $this->load->view("admin/bannersList",$data);
    }
    
    public function createBanner(){
        if($this->sesionActiva() && $this->validaUser()){
        $this->load->view("admin/bannerNew");  
        }else{
            redirect('/');
        }      
    }

    public function deleteBanner(){
        $post = $this->input->post("id");
        $this->Adminmodel->deleteBanners($post);
    }
    
    public function saveBanner(){
        $datos = $this->db->select('orden')
            ->from('banners')
            ->where('estatus',"1")
            ->order_by('orden', 'DESC')
            ->get();
        
        $orden = 0;
        if($datos->num_rows() == 0){
            $orden = 1;
        }else{        
            $orden = $datos->result_array()[0]["orden"] + 1;
        }
        
        $post = $this->input->post("fototext");
        $sourcePath = $_FILES;
        //$back = $this->AdminModel->getParametro($key);
        $back = "banners";

        foreach ($sourcePath as $value) {
            if($value["name"] != "")
            {
                $sourcePath = $value["tmp_name"]; // Storing source path of the file in a variable
                $targetPath = $back."/".$value["name"];//banner".$indice.".png";//.$_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath); // Moving Uploaded file
                
                $this->Adminmodel->saveBanners($post,$value["name"],$orden);
            }
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
    public function validaUser(){
        $rol=$this->session->userdata("rol");
        if($rol=="1"){ //caso de adm
            return true;
        }else{
            return false;
        }
    }
 /* =============================================================================
 * Modulo para excel
 =============================================================================*/       
    public function openExcel(){
        $this->load->view("admin/excel");
    }
    
    public function readExcelUsuarios(){     
    if($this->sesionActiva()){   
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
                    $info["password"]= password_hash($datosUsuario["B"], PASSWORD_DEFAULT);
                    $info["nombre"] = $datosUsuario["D"];
                    $info["matricula"] = $datosUsuario["E"];
                    $info["fecha_nacim"] = $datosUsuario["F"];
                    $result=$this->Usermodel->crearUsuario($info); 
                    // Se crea al estudiante
                    $resultAlumno=$this->Usermodel->crearAlumno($info,$result[0],0);
                    if($resultAlumno){
                        continue;
                    }else{
                        echo "error";
                    }                
                }
            }
            
            
        }

        //$users["usuarios"] = $this->Usermodel->getUsers();
        //$this->load->view('admin/users',$users);
        if($this->session->userdata("rol")=="1"){
        redirect('admin/users');
        }else{
        redirect('director/users');    
        }
    }else{
        redirect('/');
    }
        
        //send the data in an array format
        //$data['header'] = $header;
        //$data['values'] = $arr_data;
    }
    
    public function cerrar(){
        $this->session->sess_destroy();
        
        redirect('/');
    }
}
