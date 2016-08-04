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
							<li>Kelurahan</li>
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
			                		<li><a href="<?= base_url('kelurahan') ?>"><i class="icon-list2 small"></i></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						
						<div class="panel-body">
							
							<form class="form-horizontal" action="" method="POST">
								<fieldset class="content-group">
									<legend class="text-bold"></legend>
									<div class="form-group">
										<label class="control-label col-lg-2">Kecamatan</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="input-group">
														<span class="input-group-addon"><i class="icon-city"></i></span>
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
										<label class="control-label col-lg-2">Kelurahan</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="input-group">
														<span class="input-group-addon"><i class="icon-library2"></i></span>
														<input type="text" class="form-control input-lg" name="NamaKelurahan" id="NamaKelurahan" value="<?= set_value('NamaKelurahan', isset($data->NamaKelurahan) ? $data->NamaKelurahan : ''); ?>" placeholder="Masukan nama kelurahan" required>
													</div>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
								<input type="hidden" name="save" value="just_save">
								<div class="text-right">
									<a href="<?= base_url('kelurahan') ?>"><button type="button" class="btn btn-success">Kembali <i class="icon-arrow-left13 position-right"></i></button></a>
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