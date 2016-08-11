				
				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - Kesehatan Lingkungan Klinik Sanitasi</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-home2 position-left"></i> Halaman Utama</a></li>
							<li><a href="#">Klinik Sanitasi</a></li>
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

			                	<div class="panel-body">
			                		<form action="<?= $aksi ?>" method="POST" accept-charset="utf-8" id="registerStbm" name="registerStbm">
			                		
				                		<fieldset>
				                			<legend class="text-semibold">
												<i class="icon-office position-left"></i>
												Formulir Registrasi
												<a class="control-arrow" id="togPuskesmas" name="togPuskesmas" data-toggle="collapse" data-target="#registrasi">
													<i class="icon-circle-down2"></i>
												</a>
											</legend>

											<div class="collapse in" id="registrasi">
												<div class="row">
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Nama Klien</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-profile"></i>
																</span>
																<input type="text" name="NamaKlien" id="NamaKlien" value="<?= set_value('NamaKlien', isset($master->NamaKlien) ? $master->NamaKlien : ''); ?>" placeholder="Diisi dengan nama klien klinik sanitasi" class="form-control" title="Diisi dengan nama klien klinik sanitasi" required>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Nama KK</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-profile"></i>
																</span>
																<input type="text" name="NamaKK" id="NamaKK" value="<?= set_value('NamaKK', isset($master->NamaKK) ? $master->NamaKK : ''); ?>" placeholder="Diisi dengan nama KK klien klinik sanitasi" class="form-control" title="Diisi dengan nama KK klien klinik sanitasi" required>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Umur Klien</label>
														<div class="col-md-6" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-height"></i>
																</span>
																<input type="number" name="UmurKlien" id="UmurKlien" value="<?= set_value('UmurKlien', isset($master->UmurKlien) ? $master->UmurKlien : ''); ?>" placeholder="Umur klien klinik sanitasi" class="form-control" title="Diisi dengan umur klien klinik sanitasi" required>
															</div>
														</div>
														<div class="col-md-3" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<select name="kategoriUmur" class="form-control">
																	<option value="<?= set_value('kategoriUmur', isset($master->KategoriUmur) ?$master->KategoriUmur : ''); ?>" ><?= set_value('kategoriUmur', isset($master->KategoriUmur) ? $master->KategoriUmur : ''); ?></option>
																	<option value="Hari">Hari</option>
																	<option value="Bulan">Bulan</option>
																	<option value="Tahun">Tahun</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Jenis Kelamin</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-man-woman"></i>
																</span>
																<select name="JenisKelamin" id="JenisKelamin" class="select" data-placeholder="Pilih jenis kelamin"  title="Pilih jenis kelamin" required>
																	<option value="<?= set_value('JenisKelamin', isset($master->JenisKelamin) ?$master->JenisKelamin : ''); ?>" ><?= set_value('JenisKelamin', isset($master->JenisKelamin) ? $master->JenisKelamin : ''); ?></option>
																	<option value="Laki-laki">Laki-laki</option>
																	<option value="Perempuan">Perempuan</option>
																</select>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Agama</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-law"></i>
																</span>
																<select name="AgamaKlien" id="AgamaKlien" class="select" data-placeholder="Pilih agama klien"  title="Pilih agama klien" required>
																	<option value="<?= set_value('AgamaKlien', isset($master->AgamaKlien) ?$master->AgamaKlien : ''); ?>" ><?= set_value('AgamaKlien', isset($master->AgamaKlien) ? $master->AgamaKlien : ''); ?></option>
																	<option value="Budha">Budha</option>
																	<option value="Hindu">Hindu</option>
																	<option value="Islam">Islam</option>
																	<option value="Katolik">Katolik</option>
																	<option value="Kong Hu Cu">Kong Hu Cu</option>
																	<option value="Protestan">Protestan</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Pekerjaan</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-hammer-wrench"></i>
																</span>
																<input type="text" name="PekerjaanKlien" id="PekerjaanKlien" value="<?= set_value('PekerjaanKlien', isset($master->PekerjaanKlien) ? $master->PekerjaanKlien : ''); ?>" placeholder="Diisi dengan jenis pekerjaan klien klinik sanitasi" class="form-control" title="Diisi dengan jenis pekerjaan klien klinik sanitasi" required>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Golongan</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-aid-kit"></i>
																</span>
																<select class="select" data-placeholder="Golongan klien sanitasi" name="GolonganKlien" id="GolonganKlien" title="Pilih golongan klien sanitasi" required>
																	<option value="<?= set_value('GolonganKlien', isset($master->GolonganKlien) ?$master->GolonganKlien : ''); ?>" readonly ><?= set_value('GolonganKlien', isset($master->GolonganKlien) ? $master->GolonganKlien : ''); ?></option>
																	<option value="Umum">Umum</option>
																	<option value="ASKES">ASKES</option>
																</select>															
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Desa</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-city"></i>
																</span>
																<select class="select" data-placeholder="Pilih desa / kelurahan..." name="IdKelurahan" id="IdKelurahan" title="Pilih desa tinggal klien sanitasi" required>
																	<option value="<?= set_value('IdKecamatan', isset($master->IdKelurahan) ?$master->IdKelurahan : ''); ?>" readonly ><?= set_value('NamaKecamatan', isset($master->NamaKelurahan) ? $master->NamaKelurahan : ''); ?></option>
																	<?php
																		foreach ($dDesa as $desa) {
																		 	echo "<option value='$desa->IdKelurahan'>$desa->NamaKelurahan</option>";
																		 } 
																	?>
																</select>															
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Alamat</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-direction"></i>
																</span>
																<textarea name="AlamatKlien" id="AlamatKlien" class="form-control" placeholder="Diisi dengan alamat tinggal klien klinik sanitasi" title="Diisi dengan alamat tinggal klien klinik sanitasi" required><?= set_value('AlamatKlien', isset($master->AlamatKlien) ?$master->AlamatKlien : ''); ?></textarea>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Dusun</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-cabinet"></i>
																</span>
																<input type="text" name="DusunKlien" id="DusunKlien" value="<?= set_value('DusunKlien', isset($master->DusunKlien) ? $master->DusunKlien : ''); ?>" placeholder="Nama dusun klien tinggal" class="form-control" title="Diisi dengan nama dusun klien" required>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">RT / RW</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	RT
																</span>
																<input type="text" name="RtRwKlien" id="RtRwKlien" value="<?= set_value('RtRwKlien', isset($master->RtRwKlien) ? $master->RtRwKlien : ''); ?>" placeholder="Nomor rt / rw tempat tinggal" class="form-control" title="Diisi dengan nomor rt / rw tempat tinggal" required>
															</div>
														</div>
													</div>
												</div>
											</div>
											<hr />
											<div class="text-right">
												<a href="<?= base_url('kesklinik') ?>"><button type="button" class="btn btn-success" id="kembali" name="kembali">Kembali <i class="icon-arrow-left13 position-right"></i></button></a>
												<button type="submit" id="buatRegister" name="buatRegister" class="btn btn-info"><span id='textBtn' name='textBtn'>Rubah Register</span><i class="icon-arrow-right14 position-right"></i></button>
											</div>
				                		</fieldset>
			                		</form>
								</div>
				            </div>
							<!-- /a legend -->

						</div>
					</div>
					<!-- /fieldset legend -->
					<!-- Footer -->
					<?php $this->view('partial/footer'); ?>

					
					<!-- /footer -->

				</div>
				<script type="text/javascript" charset="utf-8" async defer>

					var url = window.location.pathname;
	                    url = url.split("/");
	                if ((url[4] === undefined)){
	                	$("#kembali").css({ display: "none" });
	                	$('#textBtn').text('Buat Register');
	                }

	                $( document ).ready(function() {
	                	$('#registerStbm').validate({
			            ignore: 'input[type=hidden], .select2-input',
				        errorClass: 'validation-error-label',
				        successClass: 'validation-valid-label',
				        highlight: function(element, errorClass) {
				            $(element).removeClass(errorClass);
				        },
				        unhighlight: function(element, errorClass) {
				            $(element).removeClass(errorClass);
				        },
				        errorPlacement: function(error, element) {
				            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
				                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
				                    error.appendTo( element.parent().parent().parent().parent() );
				                }
				                 else {
				                    error.appendTo( element.parent().parent().parent().parent().parent() );
				                }
				            }
				            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
				                error.appendTo( element.parent().parent().parent() );
				            }
				            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
				                error.appendTo( element.parent().parent() );
				            }
				            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
				                error.appendTo( element.parent().parent() );
				            }
				            else {
				                error.insertAfter(element);
				            }
				        }
			           }); 
	                });

	               
				</script>
				<!-- /content area -->
