<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - <?= $title; ?></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Halaman Utama</a></li>
							<li>Puskesmas</li>
							<li class="active"><?= $title; ?></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Whole row as a control -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><?= $title; ?></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload" onclick="location.reload()"></a></li>
			                		<li><a href="<?= base_url('puskesmas') ?>"><i class="icon-list2 small"></i></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						
						<div class="panel-body">
							
							<form class="form-horizontal" action="" method="POST">
								<fieldset class="content-group">
									<legend class="text-bold"></legend>
									<div class="form-group">
										<label class="control-label col-lg-2">Nama Puskesmas</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<input type="text" class="form-control input-lg" name="NamaPuskesmas" id="NamaPuskesmas" placeholder="Masukan nama puskesmas" value="<?= set_value('NamaPuskesmas', isset($data->NamaPuskesmas) ? $data->NamaPuskesmas : ''); ?>" required>
														<div class="form-control-feedback">
															<i class="icon-office"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Kecamatan</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<select class="select" name="IdKecamatan" id="IdKecamatan"  required>
															<option value="<?= set_value('IdKecamatan', isset($data->IdKecamatan) ? $data->IdKecamatan : ''); ?>" readonly ><?= set_value('NamaKecamatan', isset($data->NamaKecamatan) ? $data->NamaKecamatan : 'Pilih Kecamatan'); ?></option>
															<?php
																foreach ($dKecamatan as $kec) {
																 	echo "<option value='$kec->IdKecamatan'>$kec->NamaKecamatan</option>";
																 } 
															?>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Alamat Puskesmas</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<textarea name="AlamatPuskesmas" id="AlamatPuskesmas" class="form-control input-lg" placeholder="Masukan alamat puskesmas" required><?= set_value('AlamatPuskesmas', isset($data->AlamatPuskesmas) ? $data->AlamatPuskesmas : ''); ?></textarea>
														<div class="form-control-feedback">
															<i class="icon-city"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">No Telp Puskesmas</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<input type="text" name="NoTelpPuskesmas" id="NoTelpPuskesmas" class="form-control input-lg" placeholder="Masukan no telpon puskesmas" value="<?= set_value('NoTelpPuskesmas', isset($data->NoTelpPuskesmas) ? $data->NoTelpPuskesmas : ''); ?>" required>
														<div class="form-control-feedback">
															<i class="icon-phone"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Kepala Puskesmas</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<input type="text" name="KepalaPuskesmas" id="KepalaPuskesmas" class="form-control input-lg" placeholder="Masukan nama kepala puskesmas" value="<?= set_value('KepalaPuskesmas', isset($data->KepalaPuskesmas) ? $data->KepalaPuskesmas : ''); ?>"  required>
														<div class="form-control-feedback">
															<i class="icon-user-tie"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">NIP Kepala</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<input type="text" class="form-control input-lg" name="NIPKepala" id="NIPKepala" placeholder="Masukan NIP kepala puskesmas" value="<?= set_value('NIPKepala', isset($data->NIPKepala) ? $data->NIPKepala : ''); ?>" required>
														<div class="form-control-feedback">
															<i class="icon-certificate"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
								<input type="hidden" name="save" value="just_save">
								<div class="text-right">
									<button type="reset" class="btn btn-danger">Batal <i class="icon-reset position-right"></i></button>
									<button type="submit" name="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>
						</div>
					</div>
					<!-- /whole row as a control -->


					<!-- Footer -->
					<?php $this->view('partial/footer'); ?>
					<!-- /footer -->

				</div>
				<!-- /content area -->
<script>
	
	$('#tambah_puskesmas').submit(function(e) {

		e.preventDefault();
		
		$.post('puskesmas/insert', {NamaPuskesmas:$('#NamaPuskesmas').val(),IdKecamatan:$('#IdKecamatan').val(),AlamatPuskesmas:$('#AlamatPuskesmas').val(),NoTelpPuskesmas:$('#NoTelpPuskesmas').val(),KepalaPuskesmas:$('#KepalaPuskesmas').val(),NIPKepala:$('#NIPKepala').val()}, function(data){
			alert(data);
			$( '#AlamatPuskesmas' ).addClass( "border-danger" );
		});
	});
</script>