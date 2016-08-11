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
							<a href="<?=base_url('kesklinik/registrasi')?>"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-add"></i></b> Registrasi Klien</button></a>
						</div>
						<table class="table datatable-responsive-row-control">
							<thead>
								<tr>
									<th></th>
									<th width="2%" class="text-center">No</th>
									<th width="15%" class="text-center">Klien</th>
									<th width="20%" class="text-center">Nama KK</th>
									<th width="10%" class="text-center">JK</th>
									<th width="35%" class="text-center">Alamat</th>
									<th width="10%" class="text-center">Golongan</th>
									<th class="text-center" width="2%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no = 0;
									if (!empty($dKlinik)){
										foreach ($dKlinik as $data) {
											$no ++;
										?>
											<tr>
												<td></td>
												<td class="text-center" title="<?= $data->NoIndeksKlien ?>"> <?= $no ?></td>
												<td class="text-left"><?= $data->NamaKlien ?></td>
												<td class="text-left"><?= $data->NamaKK ?></td>
												<td><?= $data->JenisKelamin ?></td>
												<td class="text-left" style="font-size:10px"><?= $data->AlamatKlien." Rt/Rw. ".$data->RtRwKlien.", ".$data->DusunKlien." Desa ".$data->NamaKelurahan ?></td>
												<td class="text-left"><?= $data->GolonganKlien ?></td>
												<td class="text-center" style="position:absolute" >
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#" data-toggle="modal" onclick="showModal('<?=$data->NoIndeksKlien ?>')" data-id="<?= $data->NoIndeksKlien ;?>" ><i class="icon-profile text-primary-600"></i> Lihat detil</a></li>
																<li><a href="<?= base_url('kesklinik/konseling').'/'.$data->NoIndeksKlien ?>" ><i class="icon-quill4 text-primary-600"></i> Tambah Konseling</a></li>
																<li><a href="<?= base_url('kesklinik/registrasi').'/'.$data->NoIndeksKlien ?>" ><i class="icon-pencil text-primary-600"></i> Rubah data</a></li>
																<li><a href="#" onclick="konfirmasi(<?= "'Hapus Klien Klinik ?','Atas nama ".$data->NamaKlien."','".$data->NoIndeksKlien."','".base_url('kesklinik/hapusKlien')."'";?>);"><i class="icon-trash text-danger-600"  ></i> Hapus data</a></li>
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
	                	$.post('<?= base_url('kesklinik/lihatDetil'); ?>', {id:index} , function(mod) {
	                		$('#modal_target').html(mod);
	                		$('#modalForm').modal({show: true , backdrop : true , keyboard: true});
	                	});
	                }
				</script>
				<!-- /content area -->