				
				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - Inspeksi Sarana Air Minum</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-home2 position-left"></i> Halaman Utama</a></li>
							<li><a href="#">Inspeksi Sarana Air Minum</a></li>
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
			                		<form action="#" method="POST" accept-charset="utf-8" id="infoInspeksi">
			                		
			                		<fieldset>
			                			<legend class="text-semibold">
											<i class="icon-office position-left"></i>
											Informasi Puskesmas
											<a class="control-arrow" id="togPuskesmas" name="togPuskesmas" data-toggle="collapse" data-target="#infoPuskesmas">
												<i class="icon-circle-down2"></i>
											</a>
										</legend>

										<div class="collapse in" id="infoPuskesmas">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Desa :</label>
														<div class="input-group">
															<span class="input-group-addon"><i class="icon-city"></i></span>
															<select class="select" data-placeholder="Pilih desa / kelurahan..." name="IdKelurahan" id="IdKelurahan"  required>
																<option value="<?= set_value('IdKelurahan', isset($dMasterInspeksi->IdKelurahan) ?$dMasterInspeksi->IdKelurahan : ''); ?>" readonly ><?= set_value('NamaKelurahan', isset($dMasterInspeksi->NamaKelurahan) ? $dMasterInspeksi->NamaKelurahan : ''); ?></option>
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
															<input type="text" class="form-control input-lg" value="<?= $_SESSION['NamaPuskesmas'] ?>" readonly>
															<input type="hidden" class="form-control input-lg" name="IdPuskesmas" value="<?= $_SESSION['IdPuskesmas'] ?>" readonly>
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
															<input type="text" class="form-control input-lg" value="<?= set_value('NamaPetugas', isset($dMasterInspeksi->NamaPetugas) ? $dMasterInspeksi->NamaPetugas : $_SESSION['NamaPetugas']); ?>" readonly>
														</div>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label>Bulan :</label>
														<div class="input-group">
															<span class="input-group-addon"><i class="icon-calendar52"></i></span>
															<input type="text" id="bulanInspeksi" name="bulanInspeksi" placeholder="Pilih bulan inspeksi" class="form-control input-lg" value="<?= set_value('bulanInspeksi', isset($dMasterInspeksi->NamaKelurahan) ? DateTime::createFromFormat('!m Y', $dMasterInspeksi->BulanKesSam.' '.$dMasterInspeksi->TahunKesSam)->format('F Y') : date('F Y')); ?>" required>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Sarana :</label>
														<div class="input-group">
															<span class="input-group-addon"><i class="icon-droplet2"></i></span>
															<select class="select" data-placeholder="Pilih sarana tersedia." name="KodeSarana" id="KodeSarana"  required>
																<option value="<?= set_value('KodeSarana', isset($dMasterInspeksi->IdKategoriSam) ?$dMasterInspeksi->IdKategoriSam : ''); ?>" readonly ><?= set_value('KategoriSam', isset($dMasterInspeksi->KategoriSam) ? $dMasterInspeksi->KategoriSam : ''); ?></option>
																<?php
																	foreach ($dSarana as $sarana) {
																	 	echo "<option value='$sarana->IdKategoriSam'>$sarana->KategoriSam</option>";
																	 } 
																?>
															</select>
														</div>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label>Pemilik Sarana :</label>
														<div class="input-group">
															<span class="input-group-addon"><i class="icon-user-tie"></i></span>
															<input type="text" id="PemilikSam" name="PemilikSam" placeholder="Masukan nama pemilik sarana" class="form-control input-lg" value="<?= set_value('PemilikSam', isset($dMasterInspeksi->PemilikSam) ? $dMasterInspeksi->PemilikSam : ''); ?>" required>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Alamat Pemilik :</label>
														<div class="input-group">
															<span class="input-group-addon"><i class="icon-store"></i></span>
															<textarea name="AlamatPemilik" placeholder="Masukan alamat pemilik sarana" id="AlamatPemilik" class="form-control input-lg" required><?= set_value('AlamatPemilik', isset($dMasterInspeksi->AlamatPemilik) ? $dMasterInspeksi->AlamatPemilik : ''); ?></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-right">
											<button type="submit" id="buatInspeksi" name="buatInspeksi" class="btn btn-info">Buat Inspeksi <i class="icon-arrow-right14 position-right"></i></button>
										</div>
			                		</fieldset>
			                		</form>
									<form action="../saveInspeksiSam" method="POST" id="detilInspeksi" name="detilInspeksi" accept-charset="utf-8">
									
			                		<fieldset id="dataRumah" name="dataRumah">
			                			<legend class="text-semibold">
											<i class="icon-magazine position-left"></i>
											Inspeksi Sarana Air Minum
											<a class="control-arrow" data-toggle="collapse" data-target="#inspeksiRumah">
												<i class="icon-circle-down2"></i>
											</a>
										</legend>
										<input type="hidden" name="IdKesSam" value="<?= set_value('IdKesSam', isset($dMasterInspeksi->IdKesSam) ? $dMasterInspeksi->IdKesSam : ''); ?>">
										<div class="collapse in" id="inspeksiRumah">
											<div class="tabbable">
												<ul class="nav nav-tabs nav-tabs-highlight">
													<li class="active"><a href="#dataInspeksi" data-toggle="tab"><i class="icon-city position-left"></i> Data Inspeksi</a></li>
													<li><a href="#hasilInspeksi" data-toggle="tab"><i class="icon-list position-left"></i> Hasil Inspeksi</a></li>
												</ul>

												<div class="tab-content">
													<div class="tab-pane active" id="dataInspeksi">
														<legend class="text-semibold" style="padding-left:5%;font-size:11px;">Kualitas Fisik Air</legend>
														<?php
															$no = 1;
															if (!empty($dKualitasair)) {
															foreach ($dKualitasair as $data) {
														?>	
														<div class="row">
															<div class="col-md-12">
																<label class="control-label col-lg-1 text-right"><?= $no?>).</label>
																<label class="control-label col-lg-9"><?= $data->KualitasAir ?></label>
																<div class="col-lg-2">
																	<div class="row">
																		<div class="col-md-12">
																			<label class="radio-inline">
																				<input type="radio" name="Kualitas[<?= $data->IdKualitasAir; ?>]" id="<?= $data->IdKualitasAir; ?>" value="1"  class="styled">
																				Ya
																			</label>

																			<label class="radio-inline">
																				<input type="radio" name="Kualitas[<?= $data->IdKualitasAir; ?>]" id="<?= $data->IdKualitasAir; ?>" value="0" class="styled" checked="checked" required>
																				Tidak
																			</label>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<hr style="margin-top:5px;margin-bottom:5px;" />
														<?php $no++; } } ?>
														<legend class="text-semibold" style="padding-left:5%;font-size:11px;">Data Khusus Penilaian Resiko</legend>
														<?php
															$no = 0;
															if (!empty($dPenilaian)) {
															foreach ($dPenilaian as $penilaian) {
																$no++;
														?>	
														<div class="row">
															<div class="col-md-12">
																<label class="control-label col-lg-1 text-right"><?= $no?>).</label>
																<label class="control-label col-lg-9"><?= $penilaian->PenilaianResikoSam ?></label>
																<div class="col-lg-2">
																	<div class="row">
																		<div class="col-md-12">
																			<label class="radio-inline">
																				<input type="radio" name="Penilaian[<?= $penilaian->IdPenilaian; ?>]" id="<?= $penilaian->IdPenilaian; ?>" value="1"  class="styled" onclick ="resiko(1)";>
																				Ya
																			</label>

																			<label class="radio-inline">
																				<input type="radio" name="Penilaian[<?= $penilaian->IdPenilaian; ?>]" id="<?= $penilaian->IdPenilaian; ?>" value="0" class="styled" checked="checked" onclick ="resiko(-1)"; required>
																				Tidak
																			</label>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<hr style="margin-top:5px;margin-bottom:5px;" />
														<?php  } } ?>
														<input type="hidden" name="totalPenilaian" id="totalPenilaian" value="<?= $no ?>">
													</div>
													<div class="tab-pane" id="hasilInspeksi">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Jumlah resiko :</label>
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-file-check"></i></span>
																		<input type="text" id="jmlResiko" name="jmlResiko" class="form-control input-lg"  readonly="readonly" value="0">
																	</div>
																</div>
															</div>

															<div class="col-md-3">
																<div class="form-group">
																	<label >Resiko Kontaminasi :</label>
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-percent"></i></span>
																		<input type="text" class="form-control input-lg" id="persenKontaminasi" name="persenKontaminasi" value="0" readonly="readonly">
																	</div>
																</div>
															</div>
															<div class="col-md-3">
																<div class="form-group">
																	<label > - </label>
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-eyedropper2"></i></span>
																		<input type="text" class="form-control input-lg" id="resikoKontaminasi" name="resikoKontaminasi" value="R" readonly="readonly">
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label>Hasil Rekomendasi :</label>
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-file-text"></i></span>
																		<textarea class="form-control" name="hasilRekomendasi" id="hasilRekomendasi" required placeholder="Masukan hasil rekomendasi inspeksi"></textarea>
																	</div>
																</div>
															</div>
														</div>
														<hr style="margin-bottom:5px;"/>
														<div class="text-right" style="padding-top:2%;padding-bottom:2%;">
															<button type="button" name="batal" value="batal" class="btn btn-danger" onclick="konfirmasi(<?= "'Batalkan ?','".$title."','".$dMasterInspeksi->IdKesSam."','".base_url('kessam/delInspeksi')."'";?>);">Batal <i class="icon-arrow-right14 position-right"></i></button>
															<button type="submit" id="simpanDetil" name="simpanDetil" value="tdesa" class="btn btn-primary" >Simpan Inspeksi <i class="icon-arrow-right14 position-right"></i></button>
														</div>
													</div>
												</div>
											</div>
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
	                	$("#dataRumah").css({ display: "none" });
	                }else{
	                	$("#infoPuskesmas").removeClass( "in" );
	                	$("#buatInspeksi").css({ display: "none" });
	                	$('#bulanInspeksi').prop("disabled", true);
	                	$('#IdKelurahan').prop("readonly", true);
	                	$('#PemilikSam').prop("readonly", true);
	                	$('#AlamatPemilik').prop("readonly", true);
	                	$('#KodeSarana').prop("readonly", true);
	                }


	                $(document).on("click", "#buatInspeksi", function () {
			          $('#infoInspeksi').validate({
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
				        submitHandler: function () {
				        	console.log($('#infoInspeksi').serialize());
				        	$.post('buatInspeksi', $('#infoInspeksi').serialize(), function(resp){
				        		var respone = JSON.parse(resp);
				        		window.location.href = 'inspeksisam/'+respone.IdKesSam;
				        	});
				        },
				        rules: {
				            IdKelurahan: {
				            	required: true
				            },
				            PemilikSam: {
				            	required: true,
				            	maxlength: 20
				            },
				            AlamatPemilik: {
				            	required: true,
				            	maxlength: 160
				            }
				        },
				        messages:{
				        	IdKelurahan: {
				                required: "Desa inspeksi belum dipilih"
				              },
				            bulanInspeksi: {
				            	required: "Bulan inspeksi belum dipilih",
				            	date: "pemilihan bulan salah"
				            },
				            KodeSarana: {
				            	required: "Sarana air minum belum dipilih"
				            },
				            PemilikSam: {
				            	required: "Pemilik sarana belum di isi",
				            	maxlength: "Karakter maksimal 20"
				            },
				            AlamatPemilik: {
				            	required: "Alamat pemilik sarana belum di isi",
				            	maxlength: "Karakter maksimal 160"
				            }
				        }
			           });        
			        });

			        $(document).on("click", "#simpanDetil", function () {
			          $('#detilInspeksi').validate({
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
				            hasilRekomendasi: {
				            	required: true,
				            	maxlength: 160
				            }
				        },
				        messages:{
				            hasilRekomendasi: {
				            	required: "Hasil rekomendasi inpeksi belum di isi",
				            	maxlength: "Karakter maksimal 160"
				            }
				        }
			           });        
			        });

			        var total = 0;
			        var persen = 0;
			        var resko = '';
			        function resiko(val){
			        	var jmlPenilaian = $("#totalPenilaian").val();
			        	total = total + parseInt(val);
			        	persen = (total / jmlPenilaian) * 100;
			        	$("#jmlResiko").val(total);
			        	$("#persenKontaminasi").val(persen.toFixed(2)+'%');
			        	if (persen > 75){
			        		resko = 'AT';
			        	}else if (persen > 50){
			        		resko = "T";
			        	}else if(persen > 25){
			        		resko = "S";
			        	}else{
			        		resko = "R";
			        	}
			        	$("#resikoKontaminasi").val(resko);
			        } 
				</script>
				<!-- /content area -->
