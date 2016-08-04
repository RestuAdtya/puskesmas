
				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - LBPL 1</h4>
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
																	<input type="text" class="form-control input-lg" value="<?= $dPuskesmas->NamaPuskesmas ?>" disabled>
																	<input type="hidden" class="form-control input-lg" name="IdPuskesmas" value="<?= $dPuskesmas->IdPuskesmas ?>" disabled>
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
																	<input type="text" class="form-control input-lg" value="<?= $dPuskesmas->NamaKecamatan ?>" disabled>
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
																	<input type="text" class="form-control input-lg" value="<?= month_indo(date('m')).' '.date('Y') ?>" disabled>
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
												<i class="icon-magazine position-left"></i>
												Data Penyehatan Lingkungan
												<a class="control-arrow" data-toggle="collapse" data-target="#demo2">
													<i class="icon-circle-down2"></i>
												</a>
											</legend>

											<div class="collapse in" id="demo2">
												
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-lg-3">Kelurahan / Desa</label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="text" class="form-control input-lg" placeholder="Masukan data kelurahan / desa" name="NamaDesa" id="NamaDesa" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-library2"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-3">Jml Penduduk</label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah penduduk" name="JmlPenduduk" id="JmlPenduduk" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-users4"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

						                			<div class="form-group">
														<label class="control-label col-lg-3">Jumlah KK</label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah KK yang ada" name="JmlKK" id="JmlKK" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-collaboration"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-3">Jumlah Rumah</label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data rumah yang ada" name="JmlRumahA" id="JmlRumahA" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-home"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

						                			<div class="form-group">
														<label class="control-label col-lg-3"> </label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah rumah MS" name="JmlRumahMs" id="JmlRumahMs" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-home7"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-3">Jumlah Jaga</label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah jaga yang ada" name="JmlJagaA" id="JmlJagaA" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-enter2"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

						                			<div class="form-group">
														<label class="control-label col-lg-3"> </label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0"" class="form-control input-lg" placeholder="Masukan data jumlah jaga MS" name="JmlJagaMs" id="JmlJagaMs" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-enter3"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-lg-3">Sistem Sampah</label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah diangkut ke TPS" name="SisSampahAngk" id="SisSampahAngk" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-bucket"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-3"></label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah yang ditimbun" name="SisSampahTim" id="SisSampahTim" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-stack3"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

						                			<div class="form-group">
														<label class="control-label col-lg-3"></label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah yang dibakar" name="SisSampahBak" id="SisSampahBak" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-fire"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-3"></label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah yang sembarangan" name="SisSampahSem" id="SisSampahSem" value="">
																		<div class="form-control-feedback" required="required">
																			<i class="icon-wall"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

						                			<div class="form-group">
														<label class="control-label col-lg-3">Jumlah SPAL</label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah SPAL yang ada" name="JmlSpalA" id="JmlSpalA" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-home7"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-3"></label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group has-feedback has-feedback-left">
																		<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah SPAL MS" name="JmlSpalMs" id="JmlSpalMs" value="" required="required">
																		<div class="form-control-feedback">
																			<i class="icon-enter2"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

						                			<div class="form-group">
														<label class="control-label col-lg-3">Bukti Photo</label>
														<div class="col-lg-9">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<input type="file" class="file-input" data-main-class="input-group-lg" placeholder="Pilih bukti photo" name="BuktiPhoto" id="BuktiPhoto" value="" required="required">
																		<span class="help-block">Pilih lokasi bukti photo</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
				                			</div>

				                			<div class="text-right">
												<button type="submit" name="tambah" value="tdesa" class="btn btn-success">Tambah Desa <i class="icon-arrow-right14 position-right"></i></button>
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
															<th>Aksi</th>
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
															<td class="text-center">
																<i class="icon-trash text-danger-600" data-popup="tooltip" title="Hapus Desa" onclick="konfirmasi(<?= "'Hapus data ?','Hapus desa ".$detil->NamaDesa."','".$detil->IdDetilLbpl1."','".base_url('lbpl1/hapusdesa')."'";?>);"></i>
															</td>
														</tr>
														<?php } } ?>
													</tbody>
												</table>
											</div>
										</fieldset>

										<div class="text-right">
												<button type="button" name="batal" value="batal" class="btn btn-danger" onclick="konfirmasi(<?= "'Batalkan ?','Pembuatan laporan penyehatan lingkungan','".$IdLbpl1."','".base_url('lbpl1/batalkan')."'";?>);">Batal <i class="icon-arrow-right14 position-right"></i></button>
												<button type="button" name="simpan" value="tdesa" class="btn btn-primary" onclick="konfirmasi(<?= "'Simpan ?','Simpan laporan penyehatan lingkungan','".$IdLbpl1."','".base_url('lbpl1/simpan')."'";?>);">Simpan Laporan <i class="icon-arrow-right14 position-right"></i></button>
										</div>
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
