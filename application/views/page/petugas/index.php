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
							<a href="<?=base_url('petugas/tambah')?>"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-add"></i></b> Tambah</button></a>
						</div>
						<table class="table datatable-responsive-row-control">
							<thead>
								<tr>
									<th></th>
									<th width="5%" align="center">No</th>
									<th>Petugas</th>
									<th>Puskesmas</th>
									<th>Kontak</th>
									<th width="5%" align="center">Status</th>
									<th width="10%" align="center">Aktif</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if (!empty($dPetugas)){ 
										$no = 1;
										foreach ($dPetugas as $data) {
											
										?>
											<tr>
												<td></td>
												<td><?= $no ?></td>
												<td><?= $data->NamaPetugas ?></td>
												<td><?= $data->NamaPuskesmas ?></td>
												<td><?= $data->NoTelpPetugas ?></td>
												<td><?= ($data->StatusPetugas == 1) ? 'Aktif' : 'Suspend';  ?></td>
												<td style="width:auto;font-size:9px;"><?= date_format(date_create($data->TglBuat), 'd, F Y') ?></td>
												<td class="text-center">
													<a href="<?= base_url('petugas/rubah/'.$data->NIPPetugas)?>"><i class="icon-pencil text-primary-600" data-popup="tooltip" title="Rubah"></i></a>  
													<i class="icon-trash text-danger-600" data-popup="tooltip" title="Hapus" style="cursor:pointer" onclick="konfirmasi(<?= "'Hapus data ?','Hapus petugas ".$data->NamaPetugas."','".$data->NIPPetugas."','".base_url('petugas/hapus')."'"; ?>);" ></i>
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