<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Al requerir el autoload, cargamos todo lo necesario para trabajar

require_once APPPATH."/third_party/dompdf/autoload.inc.php";
//require APPPATH.'/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator {
    
    public function __construct() {
        // include autoloader
        //require_once dirname(__FILE__).'/third_party/dompdf/autoload.inc.php';
        require_once APPPATH."/third_party/dompdf/autoload.inc.php";
        // instantiate and use the dompdf class
        $pdf = new DOMPDF();
        
        $CI =& get_instance();
        $CI->dompdf = $pdf;
    }
    
    // por defecto, usaremos papel A4 en vertical, salvo que digamos otra cosa al momento de generar un PDF
    /*public function generate($html, $filename, $stream=TRUE, $paper = 'A4', $orientation = "portrait")
    {
        $temp_dir = APPPATH.'/pdfFolder/';
        if(!is_dir($temp_dir)){
            mkdir($temp_dir, 0777, true);
        }
        $options = new Options();
        $options->set('tempDir', $temp_dir);
        
        //$dompdf = new DOMPDF();
        
        $dompdf = new DOMPDF($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if ($stream) {
            // "Attachment" => 1 hará que por defecto los PDF se descarguen en lugar de presentarse en pantalla.
            $dompdf->stream($filename.".pdf", array("Attachment" => 1));
        }
        else 
        {
          return $dompdf->output();
        }
    }*/
}
?>