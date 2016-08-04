
				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - Detil LBPL 1</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="<?= base_url('lbpl1/report/excel/'.$IdLbpl1) ?>" target="_blank" class="btn btn-link btn-float has-text"><i class="icon-file-excel text-primary"></i><span>Excel</span></a>
								<a  href="<?= base_url('lbpl1/report/pdf/'.$IdLbpl1) ?>" target="_blank" class="btn btn-link btn-float has-text"><i class="icon-file-pdf text-primary"></i> <span>PDF</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-printer2 text-primary"></i> <span>Cetak</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-home2 position-left"></i> Halaman Utama</a></li>
							<li><a href="#">LBPL 1</a></li>
							<li class="active"><?= $title ?></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					
					<!-- Fieldset legend -->
					<div class="row">
						

						<div class="col-md-12">

							<!-- Advanced legend -->
							<form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
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

									<div class="panel-body">
										<fieldset>
											<legend class="text-semibold">
												<i class="icon-office position-left"></i>
												Informasi Puskesmas
												<a class="control-arrow" data-toggle="collapse" data-target="#demo1">
													<i class="icon-circle-down2"></i>
												</a>
											</legend>

											<div class="collapse in" id="demo1">
												<div class="form-group">
													<label class="control-label col-lg-3">Puskesmas</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group has-feedback has-feedback-left">
																	<input type="text" class="form-control input-lg" value="<?= $dMaster->NamaPuskesmas ?>" disabled>
																	<div class="form-control-feedback">
																		<i class="icon-office"></i>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-lg-3">Kecamatan</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group has-feedback has-feedback-left">
																	<input type="text" class="form-control input-lg" value="<?= $dMaster->NamaKecamatan ?>" disabled>
																	<div class="form-control-feedback">
																		<i class="icon-city"></i>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-lg-3">Petugas</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group has-feedback has-feedback-left">
																	<input type="text" class="form-control input-lg" value="<?= $_SESSION['NamaPetugas'] ?>" disabled>
																	<div class="form-control-feedback">
																		<i class="icon-vcard"></i>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-lg-3">Bulan</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group has-feedback has-feedback-left">
																	<input type="text" class="form-control input-lg" value="<?= month_indo(date('m', strtotime($dMaster->TglLbpl1))).' '.date('Y', strtotime($dMaster->TglLbpl1)); ?>" disabled>
																	<div class="form-control-feedback">
																		<i class="icon-calendar52"></i>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</fieldset>

										<fieldset>
											<legend class="text-semibold">
												<i class="icon-list position-left"></i>
												Daftar Desa
												<a class="control-arrow" data-toggle="collapse" data-target="#demo3">
													<i class="icon-circle-down2"></i>
												</a>
											</legend>

											<div class="collapse in" id="demo3">
												<table class="table datatable-responsive-row-control">
													<thead>
														<tr>
															<th></th>
															<th>Kelurahan</th>
															<th>Pend.</th>
															<th>KK</th>
															<th>Rumah A</th>
															<th>Rumah B</th>
															<th>Sampah A</th>
															<th>Sampah B</th>
															<th>Sampah C</th>
															<th>Sampah D</th>
															<th>Jaga A</th>
															<th>Jaga B</th>
															<th>SPAL A</th>
															<th>SPAL B</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															if (!empty($dDetil)){
															foreach ($dDetil as $detil) {
																?>
														<tr>
															<td></td>
															<td><?= $detil->NamaDesa ?></td>
															<td><?= $detil->JmlPenduduk ?></td>
															<td><?= $detil->JmlKK ?></td>
															<td><?= $detil->JmlRumahA ?></td>
															<th><?= $detil->JmlRumahMs ?></th>
															<th><?= $detil->SisSampahAngk ?></th>
															<th><?= $detil->SisSampahTim ?></th>
															<th><?= $detil->SisSampahBak ?></th>
															<th><?= $detil->SisSampahSem ?></th>
															<th><?= $detil->JmlJagaA ?></th>
															<th><?= $detil->JmlJagaMs ?></th>
															<th><?= $detil->JmlSpalA ?></th>
															<th><?= $detil->JmlSpalMs ?></th>
														</tr>
														<?php } } ?>
													</tbody>
												</table>
											</div>
										</fieldset>
									</div>
								</div>
							</form>
							<!-- /a legend -->

						</div>
					</div>
					<!-- /fieldset legend -->

					<!-- Footer -->
					<?php $this->view('partial/footer'); ?>
					<!-- /footer -->

				</div>
				<!-- /content area -->
