<div id="modalForm" class="modal fade in" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true"> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-teal-300">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title"><?= $title ?></h5>
			</div>
			<form action="#" method="POST" id="modalPenilaian" name="modalPenilaian">
				<div class="modal-body">
					<div class="alert bg-warning alert-styled-left fade in hide" id="alertModal" name="alertModal">
						<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Tutup</span></button>
						<span class="text-semibold" id="textModalError" name="textModalError">Oh snap!</span>
				    </div>
				    <div class="row">
						<div class="col-md-12">
							<label class="col-md-3 control-label" style="padding-left:20px;" >Kategori SAM</label>
							<div class="col-md-9" style="margin-bottom:5px;">
								<div class="form-group input-group">
									<span class="input-group-addon">
										<i class="icon-eyedropper3"></i>
									</span>
									<select class="select" data-placeholder="Pilih Kategori SAM." name="KodeSarana" id="KodeSarana"  required>
										<option value="<?= set_value('KodeSarana', isset($master->IdKategoriSam) ?$master->IdKategoriSam : ''); ?>" readonly ><?= set_value('KategoriSam', isset($master->KategoriSam) ? $master->KategoriSam : ''); ?></option>
										<?php
											foreach ($dKategori as $kategori) {
											 	?>
											 		<option value="<?= $kategori->IdKategoriSam ?>"><?= $kategori->KategoriSam ?></option>
										<?php
											 } 
										?>
									</select>											
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="col-md-3 control-label" style="padding-left:20px;" >Penilaian Resiko</label>
							<div class="col-md-9" style="margin-bottom:5px;">
								<div class="form-group input-group">
									<span class="input-group-addon">
										<i class="icon-eyedropper3"></i>
									</span>
									<input type="hidden" name="IdPenilaian" id="IdPenilaian" value="<?= set_value('IdPenilaian', isset($master->IdPenilaian) ? $master->IdPenilaian : ''); ?>">
									<input type="text" name="PenilaianResikoSam" id="PenilaianResikoSam" value="<?= set_value('PenilaianResikoSam', isset($master->PenilaianResikoSam) ? $master->PenilaianResikoSam : ''); ?>" placeholder="Masukan nama penilaian resiko kesehatan lingkungan SAM" title="Masukan nama penilaian resiko kesehatan lingkungan SAM" class="form-control" required>												
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn bg-teal-400" id="btnPenilaian" name="btnPenilaian" ><?= $button ?></button>
				</div>
			</form>
		</div>
	</div>
</div>