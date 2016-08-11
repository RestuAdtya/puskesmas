				
				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - Register Inspeksi Kesehatan Lingkungan</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-home2 position-left"></i> Halaman Utama</a></li>
							<li><a href="#">Bina Desa</a></li>
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
			                		<form action="<?= $aksi ?>" id="registerTpm" name="registerTpm" method="POST" accept-charset="utf-8">
			                			
				                		<div class="row">
											<div class="col-md-6">
												<fieldset>
													<legend class="text-semibold"><i class="icon-switch22 position-left"></i> Tempat Inspeksi</legend>
													<input type="hidden" name="IdKesTpm" id="IdKesTpm" value="<?= set_value('IdKesTpm', isset($master->IdKesTpm) ? $master->IdKesTpm : ''); ?>">
													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Kelurahan</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-library2"></i>
																</span>
																<select class="select" data-placeholder="Pilih desa / kelurahan..." title="pilih desa / kelurahan" name="IdKelurahan" id="IdKelurahan"  required>
																	<option value="<?= set_value('IdKelurahan', isset($master->IdKelurahan) ?$master->IdKelurahan : ''); ?>" readonly ><?= set_value('NamaKecamatan', isset($master->NamaKelurahan) ? $master->NamaKelurahan : ''); ?></option>
																	<?php
																		foreach ($dDesa as $desa) {
																		 	echo "<option value='$desa->IdKelurahan'>$desa->NamaKelurahan</option>";
																		 } 
																	?>
																</select>															
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Nama TPM</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-store2"></i>
																</span>
																<input type="text" name="NamaTpm" id="NamaTpm" value="<?= set_value('NamaTpm', isset($master->NamaTpm) ? $master->NamaTpm : ''); ?>" placeholder="Masukan nama tempat pemeriksaan" title="Masukan nama tempat pemeriksaan" class="form-control" required>												
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Pengelola TPM</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-accessibility"></i>
																</span>
																<input type="text" name="NamaPengelolaTpm" id="NamaPengelolaTpm" value="<?= set_value('NamaPengelolaTpm', isset($master->NamaPengelolaTpm) ? $master->NamaPengelolaTpm : ''); ?>" placeholder="Masukan nama pengelola TPM" title="Masukan nama pengelola TPM" class="form-control" required>												
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Kategori TPM</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-files-empty"></i>
																</span>
																<select class="select" data-placeholder="Pilih kategori tempat pengelolaan makanan" title="Pilih kategori tempat umum" name="IdKategoriTpm" id="IdKategoriTpm"  required>
																	<option value="<?= set_value('IdKategoriTpm', isset($master->IdKategoriTpm) ?$master->IdKategoriTpm : ''); ?>" readonly ><?= set_value('KategoriTpm', isset($master->KategoriTpm) ? $master->KategoriTpm : ''); ?></option>
																	<?php
																		foreach ($dKategori as $katTpm) {
																		 	echo "<option value='$katTpm->IdKategoriTpm'>$katTpm->KategoriTpm</option>";
																		 } 
																	?>
																</select>															
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Pemeriksaan</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-calendar52"></i>
																</span>
																<input type="text" name="TglKesTpm" id="TglKesTpm" value="<?= set_value('TglKesTpm', isset($master->TglKesTpm) ? date_format(date_create($master->TglKesTpm), 'd F Y') : date('d F Y')); ?>" placeholder="Pilih Tanggal pemeriksaan" title="Pilih Tanggal pemeriksaan" class="form-control pickadate" readonly required>												
															</div>
														</div>
													</div>
													
													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Hasil</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="col-md-12">
																<label class="radio-inline">
																	<input type="radio" title="Pilih hasil pemeriksaan" name="HasilPemeriksaan" id="HasilPemeriksaan" value="1"  class="styled" required>
																	Memenuhi Syarat
																</label>

																<label class="radio-inline">
																	<input type="radio" title="Pilih hasil pemeriksaan" name="HasilPemeriksaan" id="HasilPemeriksaan" value="0" class="styled" required>
																	Tidak Memenuhi Syarat
																</label>
															</div>
														</div>
													</div>

													<div class="col-md-12" style="padding-top:15px;">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Sertifikat</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="col-md-12">
																<label class="radio-inline">
																	<input type="radio" title="Pilih ketersediaan sertifikat" name="SertifikatTpm" id="SertifikatTpm" value="1"  class="styled" required>
																	Ada
																</label>

																<label class="radio-inline">
																	<input type="radio" title="Pilih ketersediaan sertifikat" name="SertifikatTpm" id="SertifikatTpm" value="0" class="styled" required >
																	Tidak
																</label>

																<label class="radio-inline">
																	<input type="radio" title="Pilih ketersediaan sertifikat" name="SertifikatTpm" id="SertifikatTpm" value="2" class="styled" required>
																	Expired
																</label>
															</div>
														</div>
													</div>
												</fieldset>
											</div>

											<div class="col-md-6">
												<fieldset>
								                	<legend class="text-semibold"><i class="icon-clipboard2 position-left"></i> Parameter Inspeksi</legend>
													<?php 
														foreach ($dParameter as $param) {
													?>
														<div class="col-md-12">
															<label class="col-md-3 control-label" style="padding-left:20px;" ><?= $param->ParameterInspeksi ?></label>
															<div class="col-md-9" style="margin-bottom:5px;">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-eyedropper3"></i>
																	</span>
																	<input type="number" name="Parameter[<?=$param->IdParameter?>]" id="Parameter[<?=$param->IdParameter?>]" value="<?= isset($param->NilaiParameter) ? $param->NilaiParameter : ''; ?>" placeholder="Masukan nilai parameter <?= $param->ParameterInspeksi ?> hasil inspeksi" title="Masukan nilai parameter <?= $param->ParameterInspeksi ?> hasil inspeksi" class="form-control" required>			
																</div>
															</div>
														</div>
													<?php
														}
													?>
												</fieldset>
											</div>
										</div>
										<br />
										<div class="text-right">
											<a href="<?= base_url('kestpm') ?>"><button type="button" class="btn btn-success" id="kembali" name="kembali">Kembali <i class="icon-arrow-left13 position-right"></i></button></a>
											<button type="submit" id="buatRegister" name="buatRegister" class="btn btn-info"><span id='textBtn' name='textBtn'>Rubah Register</span><i class="icon-arrow-right14 position-right"></i></button>
										</div>
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
				<script type="text/javascript" charset="utf-8">

					var url = window.location.pathname;
	                    url = url.split("/");
	                if ((url[4] === undefined)){
	                	$("#kembali").css({ display: "none" });
	                	$('#textBtn').text('Buat Register');
	                }

	                $( document ).ready(function() {
	                	$('#registerTpm').validate({
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
