<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - <?= $title; ?></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="<?= base_url('kelurahan/report/excel') ?>" target="_blank" class="btn btn-link btn-float has-text"><i class="icon-file-excel text-primary"></i><span>Excel</span></a>
								<a  href="<?= base_url('kelurahan/report/pdf') ?>" target="_blank" class="btn btn-link btn-float has-text"><i class="icon-file-pdf text-primary"></i> <span>PDF</span></a>
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
							<a href="<?=base_url('kelurahan/tambah')?>"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-add"></i></b> Tambah</button></a>
						</div>
						<table class="table datatable-responsive-row-control">
							<thead>
								<tr>
									<th></th>
									<th>No</th>
									<th>Kecamatan</th>
									<th>Kelurahan</th>
									<th>Tgl Buat</th>
									<th>Petugas</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if (!empty($dKelurahan)){ 
										$no = 1;
										foreach ($dKelurahan as $data) {
											
										?>
											<tr>
												<td></td>
												<td><?= $no ?></td>
												<td><?= $data->NamaKecamatan ?></td>
												<td><?= $data->NamaKelurahan ?></td>
												<td><?= date_format(date_create($data->TglBuat), 'd, F Y') ?></td>
												<td><?= $data->IdUser ?></td>
												<td class="text-center">
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>

															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="<?= base_url('kelurahan/rubah/'.$data->IdKelurahan)?>"><i class="icon-pencil text-primary-600"></i> Rubah data</a></li>
																<li><a href="#" onclick="konfirmasi(<?= "'Hapus data ?','Hapus kelurahan ".$data->NamaKelurahan."','".$data->IdKelurahan."','".base_url('kelurahan/hapus')."'"; ?>);"><i class="icon-trash text-danger-600"  ></i> Hapus data</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
								<?php
											$no++;
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