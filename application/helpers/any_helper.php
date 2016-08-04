<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('month_indo'))
{
	function month_indo($num)
	{
		$month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		
		return $month[$num-1];
	}
}

function pdf_create($html, $filename='', $stream = TRUE, $size = array(), $orientation = 'landscape') 
{
   
    require_once APPPATH.'/third_party/dompdf/dompdf_config.inc.php';
	
	$paper = 'A4';
	if(!empty($size)){
		$paper = $size;
	}
	
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
	$dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}