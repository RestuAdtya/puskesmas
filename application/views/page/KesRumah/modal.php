<div id="modalForm" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true"> 
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-teal-300">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Rubah Detil Inspeksi</h5>
			</div>

			<form action="#" method="POST" id="modalDataInspeksi" name="modalDataInspeksi">
				<div class="modal-body">
					<div class="alert bg-warning alert-styled-left hide" id="alertModal" name="alertModal">
						<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
						<span class="text-semibold" id="textModalError" name="textModalError">Oh snap!</span>
				    </div>
					<div class="form-group">
						<div class="row">
							<label class="col-lg-3">Kepala Keluarga</label>
							<div class="col-lg-9">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group input-group">
											<span class="input-group-addon">
												<i class="icon-library2"></i>
											</span>
											<input type="text" class="form-control input-lg" placeholder="Masukan nama kepala keluarga" name="NamaKepalaKeluarga" id="NamaKepalaKeluarga" value="<?= $DetilKesRumah->KepalaKeluarga ?>" required="required">
											<input type="hidden" class="form-control input-lg" name="IdKesRumah" id="IdKesRumah" value="<?= $DetilKesRumah->IdKesRumah ?>">
											<input type="hidden" class="form-control input-lg" name="IdDetilKesRumah" id="IdDetilKesRumah" value="<?= $DetilKesRumah->IdDetilKesRumah ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="control-label col-lg-3">Alamat Rumah</label>
							<div class="col-lg-9">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group input-group">
											<span class="input-group-addon">
												<i class="icon-users4"></i>
											</span>
											<textarea name="AlamatRumah" id="AlamatRumah" class="form-control input-lg" placeholder="Masukan alamat inspeksi rumah" required><?= $DetilKesRumah->AlamatRumah ?></textarea>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="control-label col-lg-3">Parameter</label>
							<div class="col-lg-9">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group input-group">
											<span class="input-group-addon">
												<i class="icon-bucket"></i>
											</span>
											<input type="number" min="0" class="form-control input-lg" placeholder="E Coli" name="ParamEcoli" id="ParamEcoli" value="<?= $DetilKesRumah->ParamEcoli ?>" required="required">
											
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group input-group">
											<span class="input-group-addon">
												<i class="icon-bucket"></i>
											</span>
											<input type="number" min="0" class="form-control input-lg" placeholder="pH" name="ParamPh" id="ParamPh" value="<?= $DetilKesRumah->ParamPh ?>" required="required">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="control-label col-lg-3"></label>
							<div class="col-lg-9">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group input-group">
											<span class="input-group-addon">
												<i class="icon-fire"></i>
											</span>
											<input type="number" min="0" class="form-control input-lg" placeholder="Chlor" name="ParamChlor" id="ParamChlor" value="<?= $DetilKesRumah->ParamChlor ?>" required="required">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group input-group">
											<span class="input-group-addon">
												<i class="icon-wall"></i>
											</span>
											<input type="number" min="0" class="form-control input-lg" placeholder="DTS" name="ParamTDS" id="ParamTDS" value="<?= $DetilKesRumah->ParamTDS ?>" required>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
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
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit" id="modalRubahInspeksi" name="modalRubahInspeksi" class="btn btn-primary">Rubah Data</button>
				</div>
			</form>
		</div>
	</div>
</div>