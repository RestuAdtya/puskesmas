<div id="modalForm" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true"> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-teal-300">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Detil Data Konseling Per Tanggal <?= date_format(date_create($TglKonseling), 'd F Y') ?></h5>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<label class="control-label col-md-3">Tanggal Konseling</label>
						<label class="control-label col-md-1">:</label>
						<label class="control-label col-md-7"><?= date_format(date_create($TglKonseling), 'd F Y') ?></label>
					</div>
				</div>
				<hr style="margin-top:5px;margin-bottom:5px;" />
				<div class="row">
					<div class="col-md-12">
						<label class="control-label col-md-3">Anamnesa / Masalah</label>
						<label class="control-label col-md-1">:</label>
						<label class="control-label col-md-7"><?= $AnamnesaKonseling ?></label>
					</div>
				</div>
				<hr style="margin-top:5px;margin-bottom:5px;" />
				<div class="row">
					<div class="col-md-12">
						<label class="control-label col-md-3">Terapi / Saran</label>
						<label class="control-label col-md-1">:</label>
						<label class="control-label col-md-7"><?= $SaranKonseling ?></label>
					</div>
				</div>
				<hr style="margin-top:5px;margin-bottom:5px;" />
				<div class="row">
					<div class="col-md-12">
						<label class="control-label col-md-3">Lama Konseling</label>
						<label class="control-label col-md-1">:</label>
						<label class="control-label col-md-7"><?= $LamaKonseling ?></label>
					</div>
				</div>
				<hr style="margin-top:5px;margin-bottom:5px;" />
				<div class="row">
					<div class="col-md-12">
						<label class="control-label col-md-3">Janji Kunjungan</label>
						<label class="control-label col-md-1">:</label>
						<label class="control-label col-md-7"><?= $KeteranganKunjungan." (".$KeteranganLokasi.")" ?></label>
					</div>
				</div>
				<hr style="margin-top:5px;margin-bottom:5px;" />
				<div class="row">
					<div class="col-md-12">
						<label class="control-label col-md-3"> </label>
						<label class="control-label col-md-1">:</label>
						<label class="control-label col-md-7">@ <?= date_format(date_create($KeteranganTgl), 'd F Y').", Pukul ".$KeteranganWaktu ?></label>
					</div>
				</div>
				<hr style="margin-top:5px;margin-bottom:5px;" />
				<div class="row">
					<div class="col-md-12">
						<label class="control-label col-md-3">Petugas</label>
						<label class="control-label col-md-1">:</label>
						<label class="control-label col-md-7"><?= $NamaPetugas ?></label>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>