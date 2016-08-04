<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - <?= $title; ?></h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Halaman Utama</a></li>
							<li class="active"><?= $title; ?></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Whole row as a control -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><?= $title ?></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-heading" style="margin-top:-20px;">
							<a href="<?=base_url('kesttu/register')?>"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-add"></i></b> Buat Inspeksi</button></a>
						</div>
						<table class="table datatable-responsive-row-control">
							<thead>
								<tr>
									<th></th>
									<th  class="text-center">No</th>
									<th  class="text-center">Inspeksi</th>
									<th  class="text-center">Kelurahan</th>
									<th  class="text-center">Kategori TTU</th>
									<th  class="text-center">Tempat</th>
									<th  class="text-center">Diperiksa</th>
									<th  class="text-center">Petugas</th>
									<th  class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									if (!empty($dInspeksi)){
										$no = 0;
										foreach ($dInspeksi as $data) {
										$no ++;
										?>
											<tr style="font-size:10px;">
												<td></td>
												<td width="2%" class="text-center" title="<?= $data->IdKesTtu ?>"><?= $no?></td>
												<td width="15%"><?= date_format(date_create($data->TglKesTtu), 'd F Y') ?></td>
												<td width="10%"><?= $data->NamaKelurahan ?></td>
												<td width="20%"><?= substr($data->KategoriTtu,0,25) ?></td>
												<td width="25%"><?= substr($data->NamaTempatUmum,0,25) ?></td>
												<td width="10%"><?= $data->JumlahDiperiksa." dari ".$data->JumlahTtu ?></td>
												<td width="16%"><?= $data->NamaPetugas ?></td>
												<td width="2%" class="text-center" style="position:absolute" >
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>

															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#" data-toggle="modal" onclick="showModal('<?=$data->IdKesTtu ?>')" data-id="<?= $data->IdKesTtu ;?>" ><i class="icon-profile text-primary-600"></i> Lihat detil</a></li>
																<li><a href="#" onclick="konfirmasi(<?= "'Hapus Inspeksi ?','Hapus inspeksi, atas nama ".$data->NamaTempatUmum."','".$data->IdKesTtu."','".base_url('kesttu/hapusRegister')."'";?>);"><i class="icon-trash text-danger-600"  ></i> Hapus data</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
								<?php
										}
									}
								?>
							</tbody>
						</table>
					</div>
					<!-- /whole row as a control -->
					<div id="modal_target"></div>
					<!-- Footer -->
					<?php $this->view('partial/footer'); ?>
					<!-- /footer -->

				</div>

				<script type="text/javascript">
					function showModal(index){

	                	$.post('<?= base_url(); ?>kessam/lihatDetil', {id:index} , function(mod) {
	                		$('#modal_target').html(mod);
	                		$('#modalForm').modal({show: true , backdrop : true , keyboard: true});
	                	});
	                }
				</script>
				<!-- /content area -->