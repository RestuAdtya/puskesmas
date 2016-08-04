<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - <?= $title; ?></h4>
						</div>

						
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?= base_url() ?>"><i class="icon-home2 position-left"></i> Halaman Utama</a></li>
							<li>Petugas</li>
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
			                		<li><a href="<?= base_url('petugas') ?>"><i class="icon-list2 small"></i></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						
						<div class="panel-body">
							
							<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
								<fieldset class="content-group">
									<legend class="text-bold"></legend>
									<div class="form-group">
										<label class="control-label col-lg-2">NIP Petugas</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<input type="text" class="form-control input-lg" name="NIPPetugas" id="NIPPetugas" placeholder="Masukan NIP petugas" value="<?= set_value('NIPPetugas', isset($data->NIPPetugas) ? $data->NIPPetugas : ''); ?>" required>
														<div class="form-control-feedback">
															<i class="icon-vcard"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Nama Petugas</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<input type="text" class="form-control input-lg" name="NamaPetugas" id="NamaPetugas" placeholder="Masukan nama petugas" value="<?= set_value('NamaPetugas', isset($data->NamaPetugas) ? $data->NamaPetugas : ''); ?>" required>
														<div class="form-control-feedback">
															<i class="icon-accessibility"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Puskesmas</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<input type="text" class="form-control input-lg" name="Puskesmas" id="Puskesmas" value="<?= $_SESSION['NamaPuskesmas']; ?>" disabled>
														
														<input type="hidden" class="form-control input-lg" name="IdPuskesmas" id="IdPuskesmas" placeholder="Masukan kontak petugas" value="<?= $_SESSION['IdPuskesmas']; ?>">
														<div class="form-control-feedback">
															<i class="icon-office"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Kontak Petugas</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<input type="text" class="form-control input-lg" name="NoTelpPetugas" id="NoTelpPetugas" placeholder="Masukan kontak petugas" value="<?= set_value('NoTelpPetugas', isset($data->NoTelpPetugas) ? $data->NoTelpPetugas : ''); ?>" required>
														<div class="form-control-feedback">
															<i class="icon-phone"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Foto Petugas</label>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group has-feedback has-feedback-left">
														<input type="file" class="file-input" data-main-class="input-group-lg" placeholder="Pilih photo petugas" name="FotoPetugas" id="FotoPetugas" value="" required="required">
														<div class="form-control-feedback">
															<i class="icon-stack-picture"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
								<input type="hidden" name="save" value="just_save">
								<div class="text-right">
									<a href="<?= base_url('petugas') ?>"><button type="button" class="btn btn-success">Kembali <i class="icon-arrow-left13 position-right"></i></button></a>
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