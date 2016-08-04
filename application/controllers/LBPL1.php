<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LBPL1 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['LevelPetugas'])){
			redirect('auth/login');
		}
		$this->load->model('m_puskesmas');
		$this->load->model('m_lbpl1');
	}

	public function getpost(){
		$config['upload_path']   = './uploads/'; 
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
        $config['max_size']      = 2000; 
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('BuktiPhoto')) {
            $this->alert->set('bg-warning', $this->upload->display_errors());
			echo "<script>history.go(-1);</script>";
			return false;
        }
			
        else {
        	$dt = $this->uri->segment(3);
        	if ($dt <> ''){
        		$IdLbpl1 = $dt;
        		
        	}else{
        		$IdLbpl1 = $this->m_lbpl1->getkodeunik($_SESSION['IdPuskesmas']);
        	}
            $post = array(
            	'IdLbpl1' => $IdLbpl1,
				'NamaDesa' => $this->input->post('NamaDesa'),
				'JmlPenduduk' => $this->input->post('JmlPenduduk'),
				'JmlKK' => $this->input->post('JmlKK'),
				'JmlRumahA' => $this->input->post('JmlRumahA'),
				'JmlRumahMs' => $this->input->post('JmlRumahMs'),
				'SisSampahAngk' => $this->input->post('SisSampahAngk'),
				'SisSampahTim' => $this->input->post('SisSampahTim'),
				'SisSampahBak' => $this->input->post('SisSampahBak'),
				'SisSampahSem' => $this->input->post('SisSampahSem'),
				'JmlJagaA' => $this->input->post('JmlJagaA'),
				'JmlJagaMs' => $this->input->post('JmlJagaMs'),
				'JmlSpalA' => $this->input->post('JmlSpalA'),
				'JmlSpalMs' => $this->input->post('JmlSpalMs'),
				'BuktiPhoto' => $this->upload->data('file_name'),
			);
			return $post;
        } 

		
	}


	private function tambahdesa()
	{
			$post = $this->getpost();
			$simpan = $this->m_lbpl1->tambahdesa($this->getpost());
			if ($simpan == 1){
				$this->alert->set('bg-success', 'Data Desa berhasil Tambahkan!');
				redirect(base_url('lbpl1/tambah/'.$post['IdLbpl1']));
			}elseif ($simpan == 2){
				$this->alert->set('bg-warning', 'Input Data Laporan Gagal !');
				echo "<script>history.go(-1);</script>";
			}else{
				$this->alert->set('bg-warning', 'Nama desa yang anda masukan sudah terdaftar !');
				echo "<script>history.go(-1);</script>";
			}
	}


	public function tambah()
	{
		if ($this->input->post('tambah')){
			$this->tambahdesa();
		}else{
			$dt = $this->uri->segment(3);
			if ($dt <> ''){
				$cek = $this->m_lbpl1->ceklaporan($dt);
				if ($cek){
					$data = array(
					    'title' => 'Laporan Data Dasar Penyehatan Lingkungan',
					    'dPuskesmas' => $this->m_puskesmas->getCurrentData(''),
					    'dDetil' => $this->m_lbpl1->getDesaLbpl1($dt),
					    'IdLbpl1' => $dt,
					);
					$this->template->load('default', 'page/lbpl1/form', $data);
				}else{
					$this->alert->set('bg-warning', 'No Laporan '.$dt.' tidak terdaftar !');
					redirect(base_url('lbpl1/tambah'));
				}
			}else{
				$cek = $this->m_lbpl1->cekpembuatan();
				if ($cek){
					$data = array(
					    'title' => 'Laporan Data Dasar Penyehatan Lingkungan',
					    'dPuskesmas' => $this->m_puskesmas->getCurrentData(''),
					    'dDetil' => array(),
					    'IdLbpl1' => '',
					);
					$this->template->load('default', 'page/lbpl1/form', $data);
				}else{
					$this->alert->set('bg-warning', 'Pembuatan laporan data penyehatan lingkungan untuk bulan ini, sudah di buat !');
					redirect(base_url('lbpl1'));
				}
				
			}
		}
	}

	public function hapusdesa()
	{
		$id = $this->input->post('id');

		$qry = $this->m_lbpl1->deletedetil($id);
		if ($qry) {
			$data = array(
					'pesan' => 'Data desa berhasil dihapus !',
					'aksi' => 'setTimeout("location.reload(true);",2000)'
              	);
			echo json_encode($data);
		}
	}

	public function batalkan()
	{
		$id = $this->input->post('id');
		if ($id <> ''){
			$qry = $this->m_lbpl1->batallaporan($id);
		}

		$lokasi = "window.location.href = '".base_url('lbpl1')."'";
		$data = array(
					'pesan' => "Pembuatan laporan berhasil di batalkan $id",
					'aksi' => 'setTimeout("'.$lokasi.';",2000)'
              	);
		echo json_encode($data);
	}

	public function hapus()
	{
		$qry = $this->m_lbpl1->batallaporan($this->input->post('id'));
		if ($qry){
			$lokasi = "window.location.href = '".base_url('lbpl1')."'";
			$data = array(
						'pesan' => "Laporan penyehatan berhasil di hapus",
						'aksi' => 'setTimeout("'.$lokasi.';",2000)'
	              	);
		}
		echo json_encode($data);
	}

	public function simpan()
	{
		$id = $this->input->post('id');
		if ($id <> ''){
			$lokasi = "window.location.href = '".base_url('lbpl1')."'";
			$data = array(
						'pesan' => "Laporan berhasil disimpan",
						'aksi' => 'setTimeout("'.$lokasi.';",2000)'
	              	);
			echo json_encode($data);
		}else{
			echo "";
		}
	}

	public function index()
	{
		$data = array(
		    'title' => 'Data Laporan Dasar Penyehatan Lingkungan',
		    'dLaporan' => $this->m_lbpl1->getList(),
		);
		$this->template->load('default', 'page/lbpl1/index', $data);
	}

	public function detil(){
		$dt = $this->uri->segment(3);
		$data = array(
				'title' => 'Detil Laporan Dasar Penyehatan Lingkungan #'.$dt,
				'dMaster' => $this->m_lbpl1->getMaster($dt),
				'dDetil' => $this->m_lbpl1->getDesaLbpl1($dt),
				'IdLbpl1' => $dt,
			);
		$this->template->load('default', 'page/lbpl1/detil', $data);
	}

	public function report($action)
	{
		$this->load->helper('url');
		$dt = $this->uri->segment(4);
		$data = $this->m_lbpl1->getDesaLbpl1($dt);
		$master = $this->m_lbpl1->getMaster($dt);
		$title = 'Laporan Data Dasar Penyehatan Lingkungan';
		

		if($action === 'excel'){
			return $this->excel($title, $data, $master);
		}
		
		if($action === 'pdf'){
			return $this->pdf($title, $data, $master, $dt);
		}
		
	}

	private function excel($title,$data,$master){

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
		$this->excel->getActiveSheet()->mergeCells('A1:N1');
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$this->excel->getActiveSheet()->setCellValue('A2', 'Puskesmas');
		$this->excel->getActiveSheet()->mergeCells('A2:B2');
		$this->excel->getActiveSheet()->setCellValue('C2', ':'.$master->NamaPuskesmas);

		$this->excel->getActiveSheet()->setCellValue('A3', 'Bulan');
		$this->excel->getActiveSheet()->mergeCells('A3:B3');
		$this->excel->getActiveSheet()->setCellValue('C3', ':'.month_indo(date('m', strtotime($master->TglLbpl1))).' '.date('Y', strtotime($master->TglLbpl1)));
		

		$this->excel->getActiveSheet()->setCellValue('A5', 'No');
		$this->excel->getActiveSheet()->mergeCells('A5:A6');
		$this->excel->getActiveSheet()->setCellValue('B5', 'Kelurahan / Desa');
		$this->excel->getActiveSheet()->mergeCells('B5:B6');
		$this->excel->getActiveSheet()->setCellValue('C5', 'Jumlah Penduduk');
		$this->excel->getActiveSheet()->mergeCells('C5:C6');
		$this->excel->getActiveSheet()->setCellValue('D5', 'Jumlah KK Yang Ada');
		$this->excel->getActiveSheet()->mergeCells('D5:D6');
		$this->excel->getActiveSheet()->setCellValue('E5', 'Jumlah Rumah');
		$this->excel->getActiveSheet()->mergeCells('E5:F5');
		$this->excel->getActiveSheet()->setCellValue('E6', 'Yang Ada');
		$this->excel->getActiveSheet()->setCellValue('F6', 'MS');
		$this->excel->getActiveSheet()->setCellValue('G5', 'Sistem Pembuangan Sampah');
		$this->excel->getActiveSheet()->mergeCells('G5:J5');
		$this->excel->getActiveSheet()->setCellValue('G6', 'Diangkut Ke TPS');
		$this->excel->getActiveSheet()->setCellValue('H6', 'Di Timbun');
		$this->excel->getActiveSheet()->setCellValue('I6', 'Di Bakar');
		$this->excel->getActiveSheet()->setCellValue('J6', 'Sembarangan');
		$this->excel->getActiveSheet()->setCellValue('K5', 'Jumlah Jaga');
		$this->excel->getActiveSheet()->mergeCells('K5:L5');
		$this->excel->getActiveSheet()->setCellValue('K6', 'Yang Ada');
		$this->excel->getActiveSheet()->setCellValue('L6', 'MS');
		$this->excel->getActiveSheet()->setCellValue('M5', 'Jumlah SPAL');
		$this->excel->getActiveSheet()->mergeCells('M5:N5');
		$this->excel->getActiveSheet()->setCellValue('M6', 'Yang Ada');
		$this->excel->getActiveSheet()->setCellValue('N6', 'MS');
		$this->excel->getActiveSheet()->getStyle('A2:N6')->getFont()->setSize(12);
		$this->excel->getActiveSheet()->getStyle('A2:N6')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A5:N6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('A5:N6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
		$i=7;
		$no=1;
		foreach($data as $d){
			
			$this->excel->getActiveSheet()->setCellValue('A'.$i, $no);
			$this->excel->getActiveSheet()->setCellValue('B'.$i, $d->NamaDesa);
			$this->excel->getActiveSheet()->setCellValue('C'.$i, $d->JmlPenduduk);
			$this->excel->getActiveSheet()->setCellValue('D'.$i, $d->JmlKK);
			$this->excel->getActiveSheet()->setCellValue('E'.$i, $d->JmlRumahA);
			$this->excel->getActiveSheet()->setCellValue('F'.$i, $d->JmlRumahMs);
			$this->excel->getActiveSheet()->setCellValue('G'.$i, $d->SisSampahAngk);
			$this->excel->getActiveSheet()->setCellValue('H'.$i, $d->SisSampahTim);
			$this->excel->getActiveSheet()->setCellValue('I'.$i, $d->SisSampahBak);
			$this->excel->getActiveSheet()->setCellValue('J'.$i, $d->SisSampahSem);
			$this->excel->getActiveSheet()->setCellValue('K'.$i, $d->JmlJagaA);
			$this->excel->getActiveSheet()->setCellValue('L'.$i, $d->JmlJagaMs);
			$this->excel->getActiveSheet()->setCellValue('M'.$i, $d->JmlSpalA);
			$this->excel->getActiveSheet()->setCellValue('N'.$i, $d->JmlSpalMs);
			$i++;
			$no++;
		}
		$this->excel->getActiveSheet()->getStyle('A5:N'.$i)->applyFromArray($styleArray);
		unset($styleArray);
		for($col = 'A'; $col !== 'N'; $col++) {
			$this->excel->getActiveSheet()
				->getColumnDimension($col)
				->setAutoSize(true);
		}
		
		$filename = url_title($title.month_indo(date('m', strtotime($master->TglLbpl1))).' '.date('Y', strtotime($master->TglLbpl1)), '_', true).'.xls';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age:0');
		
		$writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		$writer->save('php://output');
	}

	private function pdf($t, $d, $m, $i){
		$pdata = array(
				'title' => $t,
				'dMaster' => $m,
				'dDetil' => $d,
				'IdLbpl1' => $i,
			);
		$data = array(
			'body' =>  $this->load->view('page/lbpl1/detil', $pdata, true),
			);
		
		$html = $this->load->view('templates/blank', $data, true);
		pdf_create($html, url_title($t, '_', true));
	}

	public function coba(){
		$data = array(
			'title' => 'Laporan Data Dasar Penyehatan Lingkungan',
			'dPuskesmas' => $this->m_puskesmas->getCurrentData(''),
			'dDetil' => array(),
			'IdLbpl1' => '',
		);
		$this->template->load('default', 'page/lbpl1/coba', $data);
	}
}

/* End of file LBPL1.php */
/* Location: ./application/controllers/LBPL1.php */