<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - <?= $title; ?></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="<?= base_url('puskesmas/report/excel') ?>" target="_blank" class="btn btn-link btn-float has-text"><i class="icon-file-excel text-primary"></i><span>Excel</span></a>
								<a  href="<?= base_url('puskesmas/report/pdf') ?>" target="_blank" class="btn btn-link btn-float has-text"><i class="icon-file-pdf text-primary"></i> <span>PDF</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-printer2 text-primary"></i> <span>Cetak</span></a>
							</div>
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
							<h5 class="panel-title">Daftar Puskesmas</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-heading" style="margin-top:-20px;">
							<a href="<?=base_url('puskesmas/tambah')?>"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-add"></i></b> Tambah</button></a>
						</div>
						<table class="table datatable-responsive-row-control">
							<thead>
								<tr>
									<th></th>
									<th>Puskesmas</th>
									<th>Kecamatan</th>
									<th>Alamat</th>
									<th>Kepala</th>
									<th>No Telp</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if (!empty($dPuskesmas)){ 
										foreach ($dPuskesmas as $data) {
										?>
											<tr>
												<td></td>
												<td><?= $data->NamaPuskesmas ?></td>
												<td><?= $data->NamaKecamatan ?></td>
												<td><?= $data->AlamatPuskesmas ?></td>
												<td><?= $data->KepalaPuskesmas ?></td>
												<td><?= $data->NoTelpPuskesmas ?></td>
												<td class="text-center">
													<a href="<?= base_url('puskesmas/rubah/'.$data->IdPuskesmas)?>"><i class="icon-pencil" data-popup="tooltip" title="Rubah"></i></a>  
													<i class="icon-trash text-danger-600" style="cursor:pointer"; data-popup="tooltip" title="Hapus" onclick="konfirmasi(<?= "'Hapus data ?','Hapus puskesmas ".$data->NamaPuskesmas."','".$data->IdPuskesmas."','".base_url('puskesmas/hapus')."'";?>);"></i>
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

					<!-- Footer -->
					<?php $this->view('partial/footer'); ?>
					<!-- /footer -->

				</div>
				<!-- /content area -->