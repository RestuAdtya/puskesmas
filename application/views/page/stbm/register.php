				
				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - Bina Desa</h4>
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
			                		<form action="<?= $aksi ?>" method="POST" accept-charset="utf-8" id="registerStbm" name="registerStbm">
			                		
			                		<fieldset>
			                			<legend class="text-semibold">
											<i class="icon-office position-left"></i>
											Formulir Register
											<a class="control-arrow" id="togPuskesmas" name="togPuskesmas" data-toggle="collapse" data-target="#infoPuskesmas">
												<i class="icon-circle-down2"></i>
											</a>
										</legend>

										<div class="collapse in" id="infoPuskesmas">
											<div class="row">
												<div class="col-md-12">
													<label class="col-md-2 control-label" style="padding-left:30px;">Desa / Kelurahan</label>
													<div class="col-md-10" style="margin-bottom:5px;">
														<div class="form-group input-group">
															<span class="input-group-addon">
																<i class="icon-library2"></i>
															</span>
															<select class="select" data-placeholder="Pilih desa / kelurahan..." name="IdKelurahan" id="IdKelurahan"  required>
																<option value="<?= set_value('IdKecamatan', isset($master->IdKelurahan) ?$master->IdKelurahan : ''); ?>" readonly ><?= set_value('NamaKecamatan', isset($master->NamaKelurahan) ? $master->NamaKelurahan : 'Pilih Kecamatan'); ?></option>
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
												<div class="col-md-12">
													<label class="col-md-2 control-label" style="padding-left:30px;">Jumlah SD</label>
													<div class="col-md-8" style="margin-bottom:5px;">
														<div class="form-group input-group">
															<span class="input-group-addon">
																<i class="icon-office"></i>
															</span>
															<input type="number" name="JumlahSD" id="JumlahSD" value="<?= set_value('JumlahSD', isset($master->JumlahSD) ? $master->JumlahSD : ''); ?>" placeholder="Diisi dengan Jumlah SD yang terdapat di Wilayah Kelurahan/Desa" class="form-control" required>
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<label class="col-md-2 control-label" style="padding-left:30px;">Jumlah Dusun</label>
													<div class="col-md-8" style="margin-bottom:5px;">
														<div class="form-group input-group">
															<span class="input-group-addon">
																<i class="icon-cabinet"></i>
															</span>
															<input type="number" name="JumlahDusun" id="JumlahDusun" value="<?= set_value('JumlahDusun', isset($master->JumlahDusun) ? $master->JumlahDusun : ''); ?>" placeholder="Diisi dengan jumlah dusun yang terdapat di wilayah kelurahan/desa" class="form-control">
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<label class="col-md-2 control-label" style="padding-left:30px;">Tanggal Pemicuan</label>
													<div class="col-md-8" style="margin-bottom:5px;">
														<div class="form-group input-group">
															<span class="input-group-addon">
																<i class="icon-calendar2"></i>
															</span>
															<input type="text" name="TanggalPemicuan" id="TanggalPemicuan" value="<?= set_value('TanggalPemicuan', isset($master->TglPemicuan) ? date_format(date_create($master->TglPemicuan), 'd F Y') : date('d F Y')); ?>" placeholder="Diisi dengan tanggal dilakukannya pemicuan" class="form-control pickadate" required>
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<label class="col-md-2 control-label" style="padding-left:30px;">Jumlah KK</label>
													<div class="col-md-8" style="margin-bottom:5px;">
														<div class="form-group input-group">
															<span class="input-group-addon">
																<i class="icon-collaboration"></i>
															</span>
															<input type="number" name="JumlahKK" id="JumlahKK" value="<?= set_value('JumlahKK', isset($master->JumlahKK) ? $master->JumlahKK : ''); ?>" placeholder="Diisi dengan jumlah kepala keluarga yang terdapat di wilayah kelurahan/desa" class="form-control" required>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<fieldset>
														<legend class="text-semibold" style="padding-left:30px;"> Baseline</legend>
														<div class="form-group" style="padding-bottom:25px;">
															<label class="col-md-4 control-label" style="padding-left:35px;">JSP</label>
															<div class="col-md-8">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-wall"></i>
																	</span>
																	<input type="number" name="BaselineJSP" id="BaselineJSP" value="<?= set_value('BaselineJSP', isset($master->BaselineJSP) ? $master->BaselineJSP : ''); ?>" title="Jumlah KK yang sudah akses ke Jamban Sehat Permanen (JSP) di desa dimaksud" placeholder="akses ke Jamban Sehat Permanen (JSP)" class="form-control" required>
																</div>
															</div>
														</div>
														<div class="form-group" style="padding-bottom:25px;">
															<label class="col-md-4 control-label" style="padding-left:35px;">JSSP</label>
															<div class="col-md-8">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-fence"></i>
																	</span>
																	<input type="number" name="BaselineJSSP" id="BaselineJSSP" value="<?= set_value('BaselineJSSP', isset($master->BaselineJSSP) ? $master->BaselineJSSP : ''); ?>" title="Jumlah KK yang sudah akses ke Jamban Sehat Semi Permanen (JSSP) di desa dimaksud" placeholder="akses ke Jamban Sehat Semi Permanen (JSSP)" class="form-control" required>
																</div>
															</div>
														</div>
														<div class="form-group" style="padding-bottom:25px;">
															<label class="col-md-4 control-label" style="padding-left:35px;">Sharing</label>
															<div class="col-md-8">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-toggle"></i>
																	</span>
																	<input type="number" name="BaselineSharing" id="BaselineSharing" value="<?= set_value('BaselineSharing', isset($master->BaselineSharing) ? $master->BaselineSharing : ''); ?>" title="Diisi dengan Jumlah KK yang masih akses ke Jamban Sehat orang lain/tettangga atau masih menumpang " placeholder="akses ke Jamban Sehat orang lain/tettangga atau masih menumpang" class="form-control" required>
																</div>
															</div>
														</div>
														<div class="form-group" style="padding-bottom:25px;">
															<label class="col-md-4 control-label" style="padding-left:35px;">OD</label>
															<div class="col-md-8">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-weather-windy"></i>
																	</span>
																	<input type="number" name="BaselineOD" id="BaselineOD" value="<?= set_value('BaselineOD', isset($master->BaselineOD) ? $master->BaselineOD : ''); ?>" title="Diisi dengan Jumlah KK yang masih melakukan praktek buang air besar sembarangan " placeholder="praktek buang air besar sembarangan" class="form-control" required>
																</div>
															</div>
														</div>
													</fieldset>
												</div>
												<div class="col-md-6">
													<fieldset>
														<legend class="text-semibold" style="padding-left:30px;"> Progress</legend>
														<div class="form-group" style="padding-bottom:25px;">
															<label class="col-md-4 control-label" style="padding-left:35px;">JSP</label>
															<div class="col-md-8">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-wall"></i>
																	</span>
																	<input type="number" name="ProgressJSP" id="ProgressJSP" value="<?= set_value('ProgressJSP', isset($master->ProgressJSP) ? $master->ProgressJSP : ''); ?>" title="Jumlah KK yang sudah akses ke Jamban Sehat Permanen (JSP) di desa dimaksud" placeholder="akses ke Jamban Sehat Permanen (JSP)" class="form-control" required>
																</div>
															</div>
														</div>
														<div class="form-group" style="padding-bottom:25px;">
															<label class="col-md-4 control-label" style="padding-left:35px;">JSSP</label>
															<div class="col-md-8">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-fence"></i>
																	</span>
																	<input type="number" name="ProgressJSSP" id="ProgressJSSP" value="<?= set_value('ProgressJSSP', isset($master->ProgressJSSP) ? $master->ProgressJSSP : ''); ?>" title="Jumlah KK yang sudah akses ke Jamban Sehat Semi Permanen (JSSP) di desa dimaksud" placeholder="akses ke Jamban Sehat Semi Permanen (JSSP)" class="form-control" required>
																</div>
															</div>
														</div>
														<div class="form-group" style="padding-bottom:25px;">
															<label class="col-md-4 control-label" style="padding-left:35px;">Sharing</label>
															<div class="col-md-8">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-toggle"></i>
																	</span>
																	<input type="number" name="ProgressSharing" id="ProgressSharing" value="<?= set_value('ProgressSharing', isset($master->ProgressSharing) ? $master->ProgressSharing : ''); ?>" title="Diisi dengan Jumlah KK yang masih akses ke Jamban Sehat orang lain/tettangga atau masih menumpang " placeholder="akses ke Jamban Sehat orang lain/tettangga atau masih menumpang" class="form-control" required>
																</div>
															</div>
														</div>
														<div class="form-group" style="padding-bottom:25px;">
															<label class="col-md-4 control-label" style="padding-left:35px;">OD</label>
															<div class="col-md-8">
																<div class="form-group input-group">
																	<span class="input-group-addon">
																		<i class="icon-weather-windy"></i>
																	</span>
																	<input type="number" name="ProgressOD" id="ProgressOD" value="<?= set_value('ProgressOD', isset($master->ProgressOD) ? $master->ProgressOD : ''); ?>" title="Diisi dengan Jumlah KK yang masih melakukan praktek buang air besar sembarangan " placeholder="praktek buang air besar sembarangan" class="form-control" required>
																</div>
															</div>
														</div>
													</fieldset>
												</div>												
											</div>
										</div>
										<hr />
										<div class="text-right">
											<a href="<?= base_url('stbm') ?>"><button type="button" class="btn btn-success" id="kembali" name="kembali">Kembali <i class="icon-arrow-left13 position-right"></i></button></a>
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
				        },
				        rules: {
				            IdKelurahan: {
				            	required: true
				            },
				            JumlahDusun: {
				            	required: true,
				            	min: 1
				            },
				            JumlahSD: {
				            	required: true,
				            	min: 1
				            },
				            TanggalPemicuan: {
				            	required: true,
				            	date:true
				            }
				        },
				        messages:{
				        	IdKelurahan: {
				                required: "Desa bina sanitasi belum dipilih"
				              },
				            JumlahDusun: {
				            	required: "Jumlah dusun belum diisi",
				            	min: "Minimal pengisian jumlah dusun 1"
				            },
				            JumlahSD: {
				            	required: "Jumlah SD belum diisi",
				            	min: "Minimal pengisian jumlah sd 1"
				            },
				            TanggalPemicuan: {
				            	required: "Tanggal pemicuan belum dipilih",
				            	date: "Format tanggal salah"
				            }
				        }
			           }); 
	                });

	               
				</script>
				<!-- /content area -->
