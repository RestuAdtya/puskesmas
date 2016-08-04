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
							<a href="<?=base_url('kesrumah/inspeksirumah')?>"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-add"></i></b> Buat Inspeksi</button></a>
						</div>
						<table class="table datatable-responsive-row-control">
							<thead>
								<tr>
									<th></th>
									<th width="15%" class="text-center">No</th>
									<th width="15%" class="text-center">Tanggal</th>
									<th width="15%" class="text-center">Bulan</th>
									<th width="25%" class="text-center">Kelurahan</th>
									<th width="25%" class="text-center">Petugas</th>
									<th class="text-center" width="5%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									if (!empty($dInspeksi)){
										foreach ($dInspeksi as $data) {
										?>
											<tr>
												<td></td>
												<td class="text-center"><?= $data->IdKesRumah ?></td>
												<td><?= date_format(date_create($data->TglKesRumah), 'd, F Y') ?></td>
												<td><?= month_indo(date('m', strtotime($data->BulanKesRumah))).' '.date('Y', strtotime($data->TahunKesRumah)); ?></td>
												<td><?= $data->NamaKelurahan ?></td>
												<td><?= $data->NamaPetugas ?></td>
												<td class="text-center" style="position:absolute" >
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>

															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#" data-toggle="modal" id="rubahDetilIns<?=$data->IdKesRumah ?>" name="rubahDetilIns<?=$data->IdKesRumah ?>" onclick="showModal(<?=$data->IdKesRumah ?>)" data-id="<?= $data->IdKesRumah ;?>" ><i class="icon-pencil text-primary-600"></i> Rubah data</a></li>
																<li><a href="#" onclick="konfirmasi(<?= "'Hapus detil inspeksi ?','Hapus detil inspeksi, atas nama ".$data->NamaKelurahan."','".$data->IdKesRumah."','".base_url('KesRumah/hapusRumah')."'";?>);"><i class="icon-trash text-danger-600"  ></i> Hapus data</a></li>
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

					<!-- Footer -->
					<?php $this->view('partial/footer'); ?>
					<!-- /footer -->

				</div>
				<!-- /content area -->