<div id="modalForm" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true"> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-teal-300">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title"><?= $title ?></h5>
			</div>
			<form action="#" method="POST" id="modalKategori" name="modalKategori">
					
				<div class="modal-body">
					<div class="alert bg-warning alert-styled-left fade in hide" id="alertModal" name="alertModal">
						<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Tutup</span></button>
						<span class="text-semibold" id="textModalError" name="textModalError">Oh snap!</span>
				    </div>
					<div class="row">
						<div class="col-md-12">
							<label class="col-md-3 control-label" style="padding-left:20px;" >Kategori TPM</label>
							<div class="col-md-9" style="margin-bottom:5px;">
								<div class="form-group input-group">
									<span class="input-group-addon">
										<i class="icon-eyedropper3"></i>
									</span>
									<input type="hidden" name="IdKategoriTpm" id="IdKategoriTpm" value="<?= set_value('IdKategoriTpm', isset($master->IdKategoriTpm) ? $master->IdKategoriTpm : ''); ?>">
									<input type="text" name="KategoriTpm" id="KategoriTpm" value="<?= set_value('KategoriTpm', isset($master->KategoriTpm) ? $master->KategoriTpm : ''); ?>" placeholder="Masukan nama kategori TPM" title="Masukan nama kategori TPM" class="form-control" required>												
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn bg-teal-400" id="btnKategori" name="btnKategori" ><?= $button ?></button>
				</div>
			</form>
		</div>
	</div>
</div>