
				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - Inspeksi Kesehatan Lingkungan</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-home2 position-left"></i> Halaman Utama</a></li>
							<li><a href="#">Inspeksi Kesehatan Lingkungan</a></li>
							<li class="active"><?= $title ?></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title"><?= $title ?></h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						
	                	<form class="stepy-validation" action="#">
							<fieldset title="1" id="headInspeksi">
								<legend class="text-semibold">Informasi Puskesmas</legend>
								

								<hr />
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Desa :</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-user"></i></span>
												<select class="select" data-placeholder="Pilih desa / kelurahan..." name="IdKecamatan" id="IdKecamatan"  required>
													<option value="" readonly ></option>
													<?php
														foreach ($dDesa as $desa) {
														 	echo "<option value='$desa->IdKelurahan'>$desa->NamaKelurahan</option>";
														 } 
													?>
												</select>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label >Puskesmas :</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-office"></i></span>
												<input type="text" class="form-control input-lg" value="<?= $_SESSION['NamaPuskesmas'] ?>" disabled>
												<input type="hidden" class="form-control input-lg" name="IdPuskesmas" value="<?= $_SESSION['IdPuskesmas'] ?>" disabled>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Petugas :</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-vcard"></i></span>
												<input type="text" class="form-control input-lg" value="<?= $_SESSION['NamaPetugas'] ?>" disabled>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Bulan :</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar52"></i></span>
												<input type="text" id="bulancatat" class="form-control pickadate-strings input-lg" placeholder="Silahkan pilih bulan pencatatan" required>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
							
							<fieldset title="2">
								<legend class="text-semibold">Detil Registrasi</legend>

								<hr />
								<div class="panel-body">
									<div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-highlight">
											<li class="active"><a href="#detail" data-toggle="tab"><i class="icon-city position-left"></i> Data Desa Penyehatan</a></li>
											<li><a href="#daftar" data-toggle="tab"><i class="icon-list position-left"></i> Daftar Desa</a></li>
										</ul>
										
										<div class="tab-content">
											<div class="tab-pane active" id="detail">
												<div class="col-md-6">
													<label class="col-lg-3">Kepala Keluarga</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-library2"></i>
																	</span>
																	<input type="text" class="form-control input-lg" placeholder="Masukan nama kepala keluarga" name="NamaKepalaKeluarga" id="NamaKepalaKeluarga" value="" required="required">
																	
																</div>
															</div>
														</div>
													</div>

													<label class="control-label col-lg-3">Jml Penduduk</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-users4"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah penduduk" name="JmlPenduduk" id="JmlPenduduk" value="" required="required">
																	
																</div>
															</div>
														</div>
													</div>

													<label class="control-label col-lg-3">Jumlah KK</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-collaboration"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah KK yang ada" name="JmlKK" id="JmlKK" value="" required="required">
																</div>
															</div>
														</div>
													</div>

													<label class="control-label col-lg-3">Jumlah Rumah</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-home"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data rumah yang ada" name="JmlRumahA" id="JmlRumahA" value="" required="required">
																</div>
															</div>
														</div>
													</div>

													<label class="control-label col-lg-3"> </label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-home7"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah rumah MS" name="JmlRumahMs" id="JmlRumahMs" value="" required="required">
																</div>
															</div>
														</div>
													</div>

												
													<label class="control-label col-lg-3">Jumlah Jaga</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-enter2"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah jaga yang ada" name="JmlJagaA" id="JmlJagaA" value="" required="required">
																</div>
															</div>
														</div>
													</div>

					              
													<label class="control-label col-lg-3"> </label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-enter3"></i>
																	</span>
																	<input type="number" min="0"" class="form-control input-lg" placeholder="Masukan data jumlah jaga MS" name="JmlJagaMs" id="JmlJagaMs" value="" required="required">
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="col-md-6">
													<label class="control-label col-lg-3">Sistem Sampah</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-bucket"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah diangkut ke TPS" name="SisSampahAngk" id="SisSampahAngk" value="" required="required">
																	
																</div>
															</div>
														</div>
													</div>

													<label class="control-label col-lg-3"></label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-stack3"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah yang ditimbun" name="SisSampahTim" id="SisSampahTim" value="" required="required">
																</div>
															</div>
														</div>
													</div>

													<label class="control-label col-lg-3"></label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-fire"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah yang dibakar" name="SisSampahBak" id="SisSampahBak" value="" required="required">
																</div>
															</div>
														</div>
													</div>

													<label class="control-label col-lg-3"></label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-wall"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah yang sembarangan" name="SisSampahSem" id="SisSampahSem" value="">
																</div>
															</div>
														</div>
													</div>

													<label class="control-label col-lg-3">Jumlah SPAL</label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-home7"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah SPAL yang ada" name="JmlSpalA" id="JmlSpalA" value="" required="required">
																</div>
															</div>
														</div>
													</div>

													<label class="control-label col-lg-3"></label>
													<div class="col-lg-9">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-enter2"></i>
																	</span>
																	<input type="number" min="0" class="form-control input-lg" placeholder="Masukan data jumlah SPAL MS" name="JmlSpalMs" id="JmlSpalMs" value="" required="required">
																</div>
															</div>
														</div>
													</div>

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
												<div class="text-right">
													<button type="submit" name="tambah" value="tdesa" class="btn btn-success">Tambah Desa <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</div>
											<div class="tab-pane" id="daftar">
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
										</div>
									</div>
							</fieldset>
							

							<button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button>
						</form>
		            </div>

					<!-- Footer -->
					<?php $this->view('partial/footer'); ?>
					<!-- /footer -->

				</div>
				<!-- /content area -->
				<script type="text/javascript" src="<?= base_url('assets/js/pages/wizard_stepy.js')?>"></script>
