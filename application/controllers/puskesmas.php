<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puskesmas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_puskesmas');
		$this->load->model('m_kecamatan');
	}

	public function index()
	{
		$data = array(
 
		    'title' => 'Data Puskesmas',
		    'dPuskesmas' => $this->m_puskesmas->getAll()
		);
		$this->template->load('default', 'page/puskesmas/index', $data);
	}


	public function getpost()
	{
		$post = array(
				'NamaPuskesmas' => $this->input->post('NamaPuskesmas'),
				'IdKecamatan' => $this->input->post('IdKecamatan'),
				'AlamatPuskesmas' => $this->input->post('AlamatPuskesmas'),
				'NoTelpPuskesmas' => $this->input->post('NoTelpPuskesmas'),
				'KepalaPuskesmas' => $this->input->post('KepalaPuskesmas'),
				'NIPKepala' => $this->input->post('NIPKepala')
			);
		return $post;
	}

	public function tambah(){
		if ($this->input->post('save')){
			$res = $this->m_puskesmas->insert($this->getpost());
			echo $res;
			if ($res == 1){
				$this->alert->set('bg-success', 'Data Puskesmas berhasil disimpan!');
				redirect(base_url('puskesmas'));
			}
				$this->alert->set('bg-warning', 'Nama Puskesmas yang Anda Masukan Sudah Terdaftar !');
				echo "<script>history.go(-1);</script>";
		}else
		{
			$data = array(
				    'title' => 'Tambah Data Puskesmas',
				    'dKecamatan' => $this->m_kecamatan->getAll(),
				    'aksi' => 'insert'
				);
				$this->template->load('default', 'page/puskesmas/form', $data);
		}
	}

	public function rubah(){
		$dt = $this->uri->segment(3);
		if ($this->input->post('save')){
			$res = $this->m_puskesmas->update($this->getpost(), $dt);
			if ($res == 1){
				$this->alert->set('bg-success', 'Data Puskesmas berhasil dirubah!');
				redirect(base_url('puskesmas'));
			}
				$this->alert->set('bg-warning', 'Nama Puskesmas yang Anda Masukan Sudah Terdaftar !');
				echo "<script>history.go(-1);</script>";
		}else{
				$data = array(
						    'title' => 'Rubah Data Puskesmas',
						    'dKecamatan' => $this->m_kecamatan->getAll(),
						    'data' => $this->m_puskesmas->getCurrentData($dt),
						    'aksi' => 'insert'
						);
				$this->template->load('default', 'page/puskesmas/form', $data);
		}
	}

	public function hapus(){
		$id = $this->input->post('id');
		$qry = $this->m_puskesmas->delete($id);
		if ($qry) {
			$data = array(
					'pesan' => "Data puskesmas berhasil di hapus",
					'aksi' => 'setTimeout("location.reload(true);",2000)'
              	);
			echo json_encode($data);
		}
	}

	public function report($action)
	{
		$this->load->helper('url');
		$data = $this->m_puskesmas->getAll();
		$title = 'Data Puskesmas '.month_indo(date('m')).' '.date('Y');

		if($action === 'excel'){
			return $this->excel($title, $data);
		}
		
		if($action === 'pdf'){
			return $this->pdf($title, $data);
		}
		
	}

	private function excel($title,$data){

		$styleArray = array(
		  'borders' => array(
		    'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		    )
		  )
		);

		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setCellValue('A1', $title);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A1:F1');
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$this->excel->getActiveSheet()->setCellValue('A2', 'No');
		$this->excel->getActiveSheet()->setCellValue('B2', 'Nama Puskesmas');
		$this->excel->getActiveSheet()->setCellValue('C2', 'Nama Kecamatan');
		$this->excel->getActiveSheet()->setCellValue('D2', 'Alamat');
		$this->excel->getActiveSheet()->setCellValue('E2', 'No Telp');
		$this->excel->getActiveSheet()->setCellValue('F2', 'Kepala Puskesmas');
		$this->excel->getActiveSheet()->setCellValue('G2', 'NIP Kepala');
		$this->excel->getActiveSheet()->getStyle('A2:G2')->getFont()->setSize(12);
		$this->excel->getActiveSheet()->getStyle('A2:G2')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A2:G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$i=3;
		$no=1;
		foreach($data as $d){
			$this->excel->getActiveSheet()->setCellValue('A'.$i, $no);
			$this->excel->getActiveSheet()->setCellValue('B'.$i, $d->NamaPuskesmas);
			$this->excel->getActiveSheet()->setCellValue('C'.$i, $d->NamaKecamatan);
			$this->excel->getActiveSheet()->setCellValue('D'.$i, $d->AlamatPuskesmas);
			$this->excel->getActiveSheet()->setCellValue('E'.$i, $d->NoTelpPuskesmas);
			$this->excel->getActiveSheet()->setCellValue('F'.$i, $d->KepalaPuskesmas);
			$this->excel->getActiveSheet()->setCellValue('G'.$i, $d->NIPKepala);
			$i++;
			$no++;
		}
		$this->excel->getActiveSheet()->getStyle('A2:G'.$i)->applyFromArray($styleArray);
		unset($styleArray);
		for($col = 'A'; $col !== 'K'; $col++) {
			$this->excel->getActiveSheet()
				->getColumnDimension($col)
				->setAutoSize(true);
		}
		
		$filename = url_title($title, '_', true).'.xls';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age:0');
		
		$writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$writer->save('php://output');
	}

	private function pdf($t, $d){
		$pdata = array(
			'data' => $d,
			'title' => $t,
		);
		$data = array(
			'body' =>  $this->load->view('page/puskesmas/report', $pdata, true),
			);
		//$html =  $this->load->view('page/puskesmas/report', $pdata, true);
		$html = $this->load->view('templates/blank', $data, true);
		pdf_create($html, url_title($t, '_', true));
	}

}

/* End of file puskesmas.php */
/* Location: ./application/controllers/puskesmas.php */