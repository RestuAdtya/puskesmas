				
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
							<li><a href="#">Register Inspeksi Kesehatan Lingkungan</a></li>
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
									<h6 class="panel-title">Data Dasar Penyehatan Lingkungan Rumah</h6>
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
															<span class="input-group-addon"><i class="icon-user"></i></span>
															<select class="select" data-placeholder="Pilih desa / kelurahan..." name="IdKecamatan" id="IdKecamatan"  required>
																<option value="<?= set_value('IdKecamatan', isset($dMasterInspeksi->IdKelurahan) ?$dMasterInspeksi->IdKelurahan : ''); ?>" readonly ><?= set_value('NamaKecamatan', isset($dMasterInspeksi->NamaKelurahan) ? $dMasterInspeksi->NamaKelurahan : 'Pilih Kecamatan'); ?></option>
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
															<input type="text" id="bulanInspeksi" name="bulanInspeksi" placeholder="Pilih bulan inspeksi" class="form-control input-lg" value="<?= set_value('bulanInspeksi', isset($dMasterInspeksi->NamaKelurahan) ? DateTime::createFromFormat('!m Y', $dMasterInspeksi->BulanKesRumah.' '.$dMasterInspeksi->TahunKesRumah)->format('F Y') : date('F Y')); ?>" required>
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

			                		<fieldset id="dataRumah" name="dataRumah">
			                			<legend class="text-semibold">
											<i class="icon-magazine position-left"></i>
											Inspeksi Rumah
											<a class="control-arrow" data-toggle="collapse" data-target="#inspeksiRumah">
												<i class="icon-circle-down2"></i>
											</a>
										</legend>
										<div class="collapse in" id="inspeksiRumah">
											<div class="tabbable">
												<ul class="nav nav-tabs nav-tabs-highlight">
													<li class="active"><a href="#detail" data-toggle="tab"><i class="icon-city position-left"></i> Data Rumah Inspeksi</a></li>
													<li><a href="#daftar" data-toggle="tab"><i class="icon-list position-left"></i> Daftar Rumah Inspeksi</a></li>
												</ul>

												<form action="../tambahRumahInspeksi" method="POST" id="dataInspeksi" name="dataInspeksi" accept-charset="utf-8" enctype="multipart/form-data">
													
												<input type="hidden" name="IdKesRumah" name="IdKesRumah" value="<?= set_value('IdKesRumah', isset($dMasterInspeksi->IdKesRumah) ? $dMasterInspeksi->IdKesRumah : ''); ?>" placeholder="">
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

															<label class="control-label col-lg-3">Alamat</label>
															<div class="col-lg-9">
																<div class="row">
																	<div class="col-md-12">
																		<div class="form-group input-group">
																			<span class="input-group-addon">
																				<i class="icon-users4"></i>
																			</span>
																			<textarea name="AlamatRumah" id="AlamatRumah" class="form-control input-lg" placeholder="Masukan alamat inspeksi rumah" required></textarea>
																			
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="col-md-6">
															<label class="control-label col-lg-3">Parameter</label>
															<div class="col-lg-9">
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group input-group">
																			<span class="input-group-addon">
																				<i class="icon-bucket"></i>
																			</span>
																			<input type="number" min="0" class="form-control input-lg" placeholder="E Coli" name="ParamEcoli" id="ParamEcoli" value="" required="required">
																			
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-group input-group">
																			<span class="input-group-addon">
																				<i class="icon-bucket"></i>
																			</span>
																			<input type="number" min="0" class="form-control input-lg" placeholder="pH" name="ParamPh" id="ParamPh" value="" required="required">
																			
																		</div>
																	</div>
																</div>
															</div>

															<label class="control-label col-lg-3"></label>
															<div class="col-lg-9">
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group input-group">
																			<span class="input-group-addon">
																				<i class="icon-fire"></i>
																			</span>
																			<input type="number" min="0" class="form-control input-lg" placeholder="Chlor" name="ParamChlor" id="ParamChlor" value="" required="required">
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-group input-group">
																			<span class="input-group-addon">
																				<i class="icon-wall"></i>
																			</span>
																			<input type="number" min="0" class="form-control input-lg" placeholder="DTS" name="ParamTDS" id="ParamTDS" value="" required>
																		</div>
																	</div>
																</div>
															</div>

															<label class="control-label col-lg-3">Hasil</label>
															<div class="col-lg-9">
																<div class="row">
																	<div class="col-md-12">
																		<label class="radio-inline">
																			<input type="radio" name="Hasil" id="Hasil" value="1"  class="styled">
																			Memenuhi Syarat
																		</label>

																		<label class="radio-inline">
																			<input type="radio" name="Hasil" id="Hasil" value="0" class="styled" checked="checked" required>
																			Tidak Memenuhi Syarat
																		</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="clearfix">
														</div>
														<br />
														<div class="text-right">
															<button type="submit" name="tambah" value="tdesa" class="btn btn-success">Tambah Rumah <i class="icon-arrow-right14 position-right"></i></button>
														</div>
														<br />
													</div>
													</form>
													<div class="tab-pane" id="daftar">
														<table class="table datatable-responsive-row-control">
															<thead>
																<tr>
																	<th></th>
																	<th>Kepala Keluarga</th>
																	<th>Alamat</th>
																	<th>Par (E. Coli)</th>
																	<th>Par (pH)</th>
																	<th>Par (Chlor)</th>
																	<th>Par (TDS)</th>
																	<th>Hasil</th>
																	<th>Aksi</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																	if (!empty($dDetilInspeksi)){
																		$idx = 0;
																	foreach ($dDetilInspeksi as $detil) {
																			$idx += 1;
																		?>
																<tr>
																	<td></td>
																	<td><?= $detil->KepalaKeluarga ?></td>
																	<td><?= $detil->AlamatRumah ?></td>
																	<td><?= $detil->ParamEcoli ?></td>
																	<td><?= $detil->ParamPh ?></td>
																	<td><?= $detil->ParamChlor ?></td>
																	<td><?= $detil->ParamTDS ?></td>
																	<td><?= $detil->StatusRumah ?></td>
																	<td class="text-center">
																		<ul class="icons-list">
																			<li class="dropdown">
																				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																					<i class="icon-menu9"></i>
																				</a>

																				<ul class="dropdown-menu dropdown-menu-right">
																					<li><a href="#" data-toggle="modal" id="rubahDetilIns<?=$detil->IdDetilKesRumah ?>" name="rubahDetilIns<?=$detil->IdDetilKesRumah ?>" onclick="showModal(<?=$detil->IdDetilKesRumah ?>)" data-id="<?= $detil->IdDetilKesRumah ;?>" ><i class="icon-pencil text-primary-600"></i> Rubah data</a></li>
																					<li><a href="#" onclick="konfirmasi(<?= "'Hapus detil inspeksi ?','Hapus detil inspeksi, atas nama ".$detil->KepalaKeluarga."','".$detil->IdDetilKesRumah."','".base_url('KesRumah/hapusRumah')."'";?>);"><i class="icon-trash text-danger-600"  ></i> Hapus data</a></li>
																				</ul>
																			</li>
																		</ul>
																	</td>
																</tr>
																<?php } } ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>

										<div class="panel-footer">
											<div class="text-right" style="padding-top:2%;padding-bottom:2%;">
												<button type="button" name="batal" value="batal" class="btn btn-danger" onclick="konfirmasi(<?= "'Batalkan ?','".$title."','".$dMasterInspeksi->IdKesRumah."','".base_url('KesRumah/batalKeslingRumah')."'";?>);">Batal <i class="icon-arrow-right14 position-right"></i></button>
												<button type="button" name="simpan" value="tdesa" class="btn btn-primary" onclick="konfirmasi(<?= "'Simpan ?','".$title."','".$dMasterInspeksi->IdKesRumah."','".base_url('KesRumah/simpanKeslingRumah')."'";?>);">Simpan Inspeksi <i class="icon-arrow-right14 position-right"></i></button>
											</div>
										</div>
			                		</fieldset>
								</div>
				            </div>
							<!-- /a legend -->

						</div>
					</div>
					<!-- /fieldset legend -->
					<div id="modal_target"></div>
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
	                	$('#IdKecamatan').prop("readonly", true);
	                }

	                function showModal(index){
	                	$.post('<?= base_url(); ?>KesRumah/get_modal', {id:index} , function(mod) {
	                		$('#modal_target').html(mod);
	                		$('#modalForm').modal({show: true , backdrop : true , keyboard: true});
	                	});
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
			        		 var kecamatan = $('#IdKecamatan').val();
	               			 var bulan = $('#bulanInspeksi').val();
	               			 $.post('cekInspeksi', {IdKecamatan:kecamatan, bulan:bulan}, function(rest){
		                        var result = JSON.parse(rest);
		                        window.location.href = 'InspeksiRumah/'+result.IdKesRumah;
		                    });
				        },
				        rules: {
				            bulanInspeksi :{
				            	required: true,
				            	date: true
				            }
				        },
				        messages:{
				        	IdKecamatan: {
				                required: "Lokasi inspeksi belum dipilih"
				              },
				            bulanInspeksi: {
				            	required: "Bulan inspeksi belum dipilih",
				            	date: "pemilihan bulan salah"
				            }
				        }
			           });        
			        });

			        $('#dataInspeksi').validate({
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
				        rules:{
				        	NamaKepalaKeluarga: {
				        		required: true,
				        		maxlength: 20
				        	},
				        	AlamatRumah: {
				        		required: true,
				        		maxlength: 160
				        	}
				        },
				        messages:{
				        	NamaKepalaKeluarga: {
				                required: "Nama kepala keluarga belum diisi",
				                maxlength: "Maksimal karakter 20"
				              },
				            AlamatRumah: {
				            	required: "Alamat rumah inspeksi belum diisi",
				            	maxlength: "Maksimal katakter 160"
				            },
				            ParamEcoli: {
				            	required: "Nilai parameter E. Coli belum diisi"
				            },
				            ParamPh: {
				            	required: "Nilai parameter pH belum diisi"
				            },
				            ParamChlor: {
				            	required: "Nilai parameter Chlor belum diisi"
				            },
				            ParamTDS: {
				            	required: "Nilai parameter TDS belum diisi"
				            },
				            Hasil:{
				            	required: "Hasil inspeksi belum dipilih"
				            }
				        }
			          }); 

			        $(document).on("click", "#modalRubahInspeksi", function () {
			          $('#modalDataInspeksi').validate({
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
				        rules:{
				        	NamaKepalaKeluarga: {
				        		required: true,
				        		maxlength: 20
				        	},
				        	AlamatRumah: {
				        		required: true,
				        		maxlength: 160
				        	}
				        },
				        messages:{
				        	NamaKepalaKeluarga: {
				                required: "Nama kepala keluarga belum diisi",
				                maxlength: "Maksimal karakter 20"
				              },
				           AlamatRumah: {
				            	required: "Alamat rumah inspeksi belum diisi",
				            	maxlength: "Maksimal katakter 160"
				            },
				            ParamEcoli: {
				            	required: "Nilai parameter E. Coli belum diisi"
				            },
				            ParamPh: {
				            	required: "Nilai parameter pH belum diisi"
				            },
				            ParamChlor: {
				            	required: "Nilai parameter Chlor belum diisi"
				            },
				            ParamTDS: {
				            	required: "Nilai parameter TDS belum diisi"
				            },
				            Hasil:{
				            	required: "Hasil inspeksi belum dipilih"
				            }
				        },
				        submitHandler: function () {
				        	$.post('../rubahDetilInsR', $('#modalDataInspeksi').serialize(), function(resp){
				        		if (resp == 'sama'){
				        			$("#alertModal").removeClass( "hide" );
				        			$("#textModalError").text("Maaf, Nama kepala keluarga yg anda masukan sudah terdaftar di inspeksi ini !");
				        		}else{
				        			$('#modalForm').modal('toggle');
				        			window.location.reload();
				        		}
				        	});
				        }

			          });
			        });  
				</script>
				<!-- /content area -->
