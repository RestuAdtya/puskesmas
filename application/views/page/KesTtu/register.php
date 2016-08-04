				
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
			                		<form action="simpanRegister" id="registerTtu" name="registerTtu" method="POST" accept-charset="utf-8">
			                			
				                		<div class="row">
											<div class="col-md-6">
												<fieldset>
													<legend class="text-semibold"><i class="icon-switch22 position-left"></i> Tempat Inspeksi</legend>

													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Kelurahan</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-library2"></i>
																</span>
																<select class="select" data-placeholder="Pilih desa / kelurahan..." title="pilih desa / kelurahan" name="IdKelurahan" id="IdKelurahan"  required>
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

													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Kategori TTU</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-files-empty"></i>
																</span>
																<select class="select" data-placeholder="Pilih kategori tempat umum" title="Pilih kategori tempat umum" name="IdKategoriTtu" id="IdKategoriTtu"  required>
																	<option value="<?= set_value('IdKategoriTtu', isset($master->IdKategoriTtu) ?$master->IdKategoriTtu : ''); ?>" readonly ><?= set_value('KategoriTtu', isset($master->KategoriTtu) ? $master->KategoriTtu : ''); ?></option>
																	<?php
																		foreach ($dKategori as $katTtu) {
																		 	echo "<option value='$katTtu->IdKategoriTtu'>$katTtu->KategoriTtu</option>";
																		 } 
																	?>
																</select>															
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Nama Tempat</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-store2"></i>
																</span>
																<input type="text" name="NamaTempatUmum" id="NamaTempatUmum" value="<?= set_value('NamaTempatUmum', isset($master->NamaTempatUmum) ? $master->NamaTempatUmum : ''); ?>" placeholder="Masukan nama tempat pemeriksaan" title="Masukan nama tempat pemeriksaan" class="form-control" required>												
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
																<input type="text" name="TglKesTtu" id="TglKesTtu" value="<?= set_value('TglKesTtu', isset($master->TglKesTtu) ? date_format(date_create($master->TglKesTtu), 'd F Y') : date('d F Y')); ?>" placeholder="Pilih Tanggal pemeriksaan" title="Pilih Tanggal pemeriksaan" class="form-control pickadate" readonly required>												
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Jumlah</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-color-sampler"></i>
																</span>
																<input type="number" name="JumlahTtu" id="JumlahTtu" value="<?= set_value('JumlahTtu', isset($master->JumlahTtu) ? $master->JumlahTtu : ''); ?>" placeholder="Masukan jumlah tempat yang berada di lokasi" title="Masukan jumlah tempat yang berada di lokasi" class="form-control" required>			
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Diperksa</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-file-check2"></i>
																</span>
																<input type="number" name="JumlahDiperiksa" id="JumlahDiperiksa" value="<?= set_value('JumlahDiperiksa', isset($master->JumlahDiperiksa) ? $master->JumlahDiperiksa : ''); ?>" placeholder="Masukan jumlah tempat yang diperiksa" title="Masukan jumlah tempat yang berada diperiksa" class="form-control" required>			
															</div>
														</div>
													</div>

													<div class="col-md-12">
														<label class="col-md-3 control-label" style="padding-left:20px;" >Hasil</label>
														<div class="col-md-9" style="margin-bottom:5px;">
															<div class="col-md-12">
																<label class="radio-inline">
																	<input type="radio" name="HasilPemeriksaan" id="HasilPemeriksaan" value="1"  class="styled">
																	Memenuhi Syarat
																</label>

																<label class="radio-inline">
																	<input type="radio" name="HasilPemeriksaan" id="HasilPemeriksaan" value="0" class="styled" checked="checked" required>
																	Tidak Memenuhi Syarat
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
																	<input type="number" name="Parameter[<?=$param->IdParameter?>]" id="Parameter[<?=$param->IdParameter?>]" value="" placeholder="Masukan nilai parameter <?= $param->ParameterInspeksi ?> hasil inspeksi" title="Masukan nilai parameter <?= $param->ParameterInspeksi ?> hasil inspeksi" class="form-control" required>			
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
											<a href="<?= base_url('stbm') ?>"><button type="button" class="btn btn-success" id="kembali" name="kembali">Kembali <i class="icon-arrow-left13 position-right"></i></button></a>
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
				<script type="text/javascript" charset="utf-8" async defer>

					var url = window.location.pathname;
	                    url = url.split("/");
	                if ((url[4] === undefined)){
	                	$("#kembali").css({ display: "none" });
	                	$('#textBtn').text('Buat Register');
	                }

	                $( document ).ready(function() {
	                	$('#registerTtu').validate({
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
