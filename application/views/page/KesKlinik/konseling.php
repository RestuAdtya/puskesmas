				
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
												Klien Klinik Sanitasi
												<a class="control-arrow" id="togPuskesmas" name="togPuskesmas" data-toggle="collapse" data-target="#registrasi">
													<i class="icon-circle-down2"></i>
												</a>
											</legend>

											<div class="collapse in" id="registrasi">
												<div class="row">
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Nama Klien</label>
														<div class="col-md-9">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-profile"></i>
																</span>
																<select class="select" data-placeholder="Pilih klien klinik sanitasi" name="NoIndeksKlien" id="NoIndeksKlien" title="Pilih klien klinik sanitasi" required>
																	<option value="<?= set_value('NoIndeksKlien', isset($dMaster->NoIndeksKlien) ?$dMaster->NoIndeksKlien : ''); ?>" readonly ><?= set_value('NamaKlien', isset($dMaster->NamaKlien) ? $dMaster->NamaKlien." (".$dMaster->NamaKK.")" : ''); ?></option>
																	<?php
																		foreach ($dKlien as $data) {
																		 	echo "<option value='$data->NoIndeksKlien'>$data->NamaKlien ($data->NamaKK)</option>";
																		 } 
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Nama KK</label>
														<div class="col-md-9">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-profile"></i>
																</span>
																<input type="text" name="NamaKK" class="form-control" id="NamaKK" value="<?= set_value('NamaKK', isset($dMaster->NamaKK) ? $dMaster->NamaKK : '') ?>" readonly>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Umur Klien</label>
														<div class="col-md-9">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-height"></i>
																</span>
																<input type="text" name="UmurKlien" class="form-control" id="UmurKlien" value="<?= set_value('UmurKlien', isset($dMaster->UmurKlien) ? $dMaster->UmurKlien." ".$dMaster->KategoriUmur : '') ?>" readonly>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Jenis Kelamin</label>
														<div class="col-md-9">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-man-woman"></i>
																</span>
																<input type="text" name="JenisKelamin" class="form-control" id="JenisKelamin" value="<?= set_value('JenisKelamin', isset($dMaster->JenisKelamin) ? $dMaster->JenisKelamin." ".$dMaster->JenisKelamin : '') ?>" readonly>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Agama</label>
														<div class="col-md-9">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-law"></i>
																</span>
																<input type="text" name="AgamaKlien" class="form-control" value="<?= set_value('AgamaKlien', isset($dMaster->AgamaKlien) ? $dMaster->AgamaKlien." ".$dMaster->AgamaKlien : '') ?>" id="AgamaKlien" readonly>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Pekerjaan</label>
														<div class="col-md-9">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-hammer-wrench"></i>
																</span>
																<input type="text" name="PekerjaanKlien" class="form-control" value="<?= set_value('PekerjaanKlien', isset($dMaster->PekerjaanKlien) ? $dMaster->PekerjaanKlien." ".$dMaster->PekerjaanKlien : '') ?>" id="PekerjaanKlien" readonly>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Golongan</label>
														<div class="col-md-9">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-aid-kit"></i>
																</span>
																<input type="text" name="GolonganKlien" class="form-control" value="<?= set_value('GolonganKlien', isset($dMaster->GolonganKlien) ? $dMaster->GolonganKlien." ".$dMaster->GolonganKlien : '') ?>" id="GolonganKlien" readonly>														
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="col-md-3 control-label" style="padding-left:30px;">Alamat</label>
														<div class="col-md-9">
															<div class="form-group input-group">
																<span class="input-group-addon">
																	<i class="icon-direction"></i>
																</span>
																<textarea name="AlamatKlien" id="AlamatKlien" class="form-control"  readonly><?= set_value('AlamatKlien', isset($dMaster->AlamatKlien) ? $dMaster->AlamatKlien." RT/RW. ".$dMaster->RtRwKlien.", Dusun ".$dMaster->DusunKlien.", Desa ".$dMaster->NamaKelurahan : '') ?></textarea>
															</div>
														</div>
													</div>
												</div>

												<hr />
												<div class="text-right">
													<a href="<?= base_url('kesklinik') ?>"><button type="button" class="btn btn-success" id="kembali" name="kembali">Kembali <i class="icon-arrow-left13 position-right"></i></button></a>
													<button type="submit" id="buatRegister" name="buatRegister" class="btn btn-info"><span id='textBtn' name='textBtn'>Rubah Register</span><i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</div>
				                		</fieldset>
			                		</form>
			                		<br />
			                										
			                		<fieldset id="dataKonseling" name="dataKonseling">
			                			<legend class="text-semibold">
											<i class="icon-magazine position-left"></i>
											Data Konseling
											<a class="control-arrow" data-toggle="collapse" data-target="#detilKonseling">
												<i class="icon-circle-down2"></i>
											</a>
										</legend>
										<form action="#" method="POST" id="tmbhKonseling" name="tmbhKonseling" accept-charset="utf-8">
										<input type="hidden" name="NIK" id="NIK" value="<?= set_value('NIK', isset($dMaster->NoIndeksKlien) ? $dMaster->NoIndeksKlien : '') ?>">
										<div class="collapse in" id="detilKonseling">
											<div class="tabbable">
												<ul class="nav nav-tabs nav-tabs-highlight">
													<li class="active"><a href="#Konseling" data-toggle="tab"><i class="icon-city position-left"></i> Tambah Konseling</a></li>
													<li><a href="#riwayatKonseling" data-toggle="tab"><i class="icon-list position-left"></i> Riwayat Konseling</a></li>
												</ul>
												<div class="tab-content">
													<div class="tab-pane active" id="Konseling">
														<div class="row">
															<div class="col-md-12">
																<label class="col-md-2 control-label" style="padding-left:30px;">Anamnesa / Masalah</label>
																<div class="col-md-10">
																	<div class="form-group input-group">
																		<span class="input-group-addon">
																			<i class="icon-quill4"></i>
																		</span>
																		<textarea name="AnamnesaKonseling" id="AnamnesaKonseling" class="form-control" placeholder="Diisi dengan anamnesa / masalah klien" title="Diisi dengan anamnesa / masalah klien" required></textarea>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<label class="col-md-2 control-label" style="padding-left:30px;">Terapi / Saran</label>
																<div class="col-md-10">
																	<div class="form-group input-group">
																		<span class="input-group-addon">
																			<i class="icon-file-text"></i>
																		</span>
																		<textarea name="SaranKonseling" id="SaranKonseling" class="form-control" placeholder="Diisi dengan terapi / saran untuk masalah klien" title="Diisi dengan terapi / saran untuk masalah klien" required></textarea>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<label class="col-md-2 control-label" style="padding-left:30px;">Janji Kunjungan</label>
																<div class="col-md-5">
																	<div class="form-group input-group">
																		<span class="input-group-addon">
																			<i class="icon-home2"></i>
																		</span>
																		<select name="KeteranganKunjungan" id="KeteranganKunjungan" class="select" data-placeholder="Pilih tempat kunjungan"  title="Pilih tempat kunjungan" required>
																			<option value=""></option>
																			<option value="Rumah">Rumah</option>
																			<option value="Lokasi Lain">Lokasi Lain</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group input-group">
																		<span class="input-group-addon">
																			<i class="icon-calendar52"></i>
																		</span>
																		<input type="text" name="KeteranganTanggal" class="form-control" value="<?= date('d F Y') ?>" id="KeteranganTanggal" readonly>
																	</div>
																</div>
																<div class="col-md-2">
																	<div class="form-group input-group">
																		<span class="input-group-addon">
																			<i class="icon-watch"></i>
																		</span>
																		<input type="text" name="KeteranganJam" value="<?= date("H:i") ?>" class="form-control watch" id="KeteranganJam" readonly>
																	</div>
																</div>
															</div>
														</div>
														<div class="row" id="lokasi" name="lokasi" style="display: none">
															<div class="col-md-12">
																<label class="col-md-2 control-label" style="padding-left:30px;"> </label>
																<div class="col-md-10">
																	<div class="form-group input-group">
																		<span class="input-group-addon">
																			<i class="icon-map"></i>
																		</span>
																		<textarea name="KeteranganLokasi" id="KeteranganLokasi" class="form-control" placeholder="Diisi dengan lokasi tempat kunjungan" title="Diisi dengan lokasi tempat kunjungan" required></textarea>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<label class="col-md-2 control-label" style="padding-left:30px;">Lama Konseling</label>
																<div class="col-md-10">
																	<div class="form-group input-group">
																		<span class="input-group-addon">
																			<i class="icon-watch2"></i>
																		</span>
																		<input type="text" name="LamaKonseling" value="<?= date("H:i") ?>" class="form-control watch" id="LamaKonseling" readonly>
																	</div>
																</div>
															</div>
														</div>
														<div class="text-right" style="padding-top:2%;padding-bottom:2%;">
															<button type="submit" id="tambahKonseling" name="tambahKonseling" class="btn btn-primary" >Tambah Konseling <i class="icon-pen-plus position-right"></i></button>
														</div>
													</div>
													<div class="tab-pane" id="riwayatKonseling">
														<table class="table datatable-responsive-row-control">
															<thead>
																<tr>
																	<th></th>
																	<th width="5%"  class="text-center">No</th>
																	<th width="13%" class="text-center">Tanggal</th>
																	<th width="30%" class="text-center">Anamnesa / Masalah</th>
																	<th width="30%" class="text-center">Terapi / Saran</th>
																	<th width="10%"  class="text-center">Lama</th>
																	<th width="2%"  class="text-center">Aksi</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	if (!empty($dKonseling)) {
																	foreach ($dKonseling as $data) {
																?>
																<tr style="font-size:10px;">
																	<td></td>
																	<td>No</td>
																	<td class="text-left"><?= date_format(date_create($data->TglKonseling), 'd F Y') ?></td>
																	<td class="text-left"><?= $data->AnamnesaKonseling ?></td>
																	<td class="text-left"><?= $data->SaranKonseling ?></td>
																	<td class="text-left"><?= $data->LamaKonseling ?></td>
																	<td class="text-center" style="position:absolute" >
																		<ul class="icons-list">
																			<li class="dropdown">
																				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																					<i class="icon-menu9"></i>
																				</a>
																				<ul class="dropdown-menu dropdown-menu-right">
																					<li><a href="#" data-toggle="modal" onclick="showModal('<?=$data->IdKonselingKlinik ?>')" data-id="<?= $data->IdKonselingKlinik ;?>" ><i class="icon-profile text-primary-600"></i> Lihat detil</a></li>
																					<li><a href="#" onclick="konfirmasi(<?= "'Hapus Konseling ?','Per Tanggal ".date_format(date_create($data->TglKonseling), 'd F Y')."','".$data->IdKonselingKlinik."','".base_url('kesklinik/hapusKonseling')."'";?>);"><i class="icon-trash text-danger-600"  ></i> Hapus</a></li>
																				</ul>
																			</li>
																		</ul>
																	</td>
																</tr>
																<?php } } ?>
															</tbody>
														</table>
													</div>
													<hr style="margin-bottom:5px;"/>
													<div class="text-right" style="padding-top:2%;padding-bottom:2%;">
														<button type="button" id="simpanDetil" name="simpanDetil" onclick="window.location = '<?= base_url('kesklinik')?>';" class="btn bg-teal-600" >Tutup Konseling <i class="icon-checkmark4 position-right"></i></button>
													</div>
												</div>
												</form>
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
	                	$("#dataKonseling").css({ display: "none" });
	                	$('#textBtn').text('Buat Konseling');
	                }else{
	                	$("#registrasi").removeClass( "in" );
	                	$("#kembali").css({ display: "none" });
	                	$("#buatRegister").css({ display: "none" });
	                	$('#NoIndeksKlien').prop("readonly", true);
	                }

	                $('#NoIndeksKlien').change(function() {
					  $.post('getKlienKonseling', {NoIndeks:$(this).val()}, function(resp){
				        		var data = JSON.parse(resp);
				        		$('#NamaKK').val(data.NamaKK);
				        		$('#UmurKlien').val(data.UmurKlien+" "+data.KategoriUmur);
				        		$('#JenisKelamin').val(data.JenisKelamin);
				        		$('#AgamaKlien').val(data.AgamaKlien);
				        		$('#PekerjaanKlien').val(data.PekerjaanKlien);
				        		$('#GolonganKlien').val(data.GolonganKlien);
				        		$('#AlamatKlien').val(data.AlamatKlien+" RT/RW. "+data.RtRwKlien+", Dusun "+data.DusunKlien+", Desa "+data.NamaKelurahan);
				        });
					});

					$('#KeteranganKunjungan').change(function() {
						var ket = $(this).val();
						if (ket == 'Rumah'){
							$("#lokasi").hide("fast");
							$("#KeteranganLokasi").val('Rumah');
						}else{
							$("#lokasi").show("fast");
							$("#KeteranganLokasi").val('');
						}
					});

					function showModal(index){
	                	$.post('<?= base_url('kesklinik/lihatDetilKonseling'); ?>', {id:index} , function(mod) {
	                		$('#modal_target').html(mod);
	                		$('#modalForm').modal({show: true , backdrop : true , keyboard: true});
	                	});
	                }

	                $( document ).ready(function() {
	                	$('#tmbhKonseling').validate({
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
				        	console.log($('#tmbhKonseling').serialize());
				        	$.post('<?=base_url('kesklinik/simpanKonseling')?>', $('#tmbhKonseling').serialize(), function(resp){
				        		 window.location.href = '<?=base_url('kesklinik/konseling')?>/'+resp;
				        	});
				        },
			           }); 
	                });

	               
				</script>
				<!-- /content area -->
