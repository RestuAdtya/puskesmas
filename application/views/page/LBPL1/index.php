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
							<a href="<?=base_url('lbpl1/tambah')?>"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-add"></i></b> Tambah</button></a>
						</div>
						<table class="table datatable-responsive-row-control">
							<thead>
								<tr>
									<th></th>
									<th>No</th>
									<th>Puskesmas</th>
									<th>Bulan</th>
									<th>Petugas</th>
									<th>Dibuat</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									if (!empty($dDetil)){
										foreach ($dLaporan as $data) {
										?>
											<tr>
												<td></td>
												<td><?= $data->IdLbpl1 ?></td>
												<td><?= $data->NamaPuskesmas ?></td>
												<td><?= month_indo(date('m', strtotime($data->TglLbpl1))).' '.date('Y', strtotime($data->TglLbpl1)); ?></td>
												<td><?= $data->NamaPetugas ?></td>
												<td><?= $data->TglLbpl1 ?></td>
												<td class="text-center">
													<a href="<?= base_url('lbpl1/detil/'.$data->IdLbpl1) ?>"><i class="icon-file-eye2" data-popup="tooltip" style="cursor: pointer;" title="Lihat Detil"></i></a>
													<a href="<?= base_url('lbpl1/report/pdf/'.$data->IdLbpl1) ?>"><i class="icon-file-pdf text-info-700" data-popup="tooltip" style="cursor: pointer;" title="PDF"></i></a>
													<a href="<?= base_url('lbpl1/report/excel/'.$data->IdLbpl1) ?>"><i class="icon-file-excel text-success-700" data-popup="tooltip" style="cursor: pointer;" title="Excel"></i></a>
													<i class="icon-trash text-danger-600" data-popup="tooltip" style="cursor: pointer;" title="Hapus" onclick="konfirmasi(<?= "'Hapus ?','Pembuatan laporan penyehatan lingkungan ".$data->IdLbpl1."','".$data->IdLbpl1."','".base_url('lbpl1/hapus')."'";?>);" ></i>
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