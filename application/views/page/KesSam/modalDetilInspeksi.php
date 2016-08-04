<div id="modalForm" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true"> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-teal-300">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Data Kartu Inspeksi Sarana Air Minum #</h5>
			</div>

			<div class="modal-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-highlight">
						<li class="active"><a href="#dataInspeksi" data-toggle="tab"><i class="icon-city position-left"></i> Data Inspeksi</a></li>
						<li><a href="#hasilInspeksi" data-toggle="tab"><i class="icon-list position-left"></i> Hasil Inspeksi</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="dataInspeksi">

						</div>
						<div class="tab-pane" id="hasilInspeksi">
							<legend class="text-semibold" style="padding-left:5%;font-size:11px;">Kualitas Fisik Air</legend>
							<?php
								$no = 0;
								foreach ($dKualitas as $data) {
									$no++;
							?>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-lg-1 text-right"><?= $no?>).</label>
									<label class="control-label col-lg-9"><?= $data->KualitasAir ?></label>
									<label class="control-label col-lg-2"><?= ($data->HasilPenilaian == 1) ? 'Ya' : 'Tidak' ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<?php } ?>
							<br />
							<legend class="text-semibold" style="padding-left:5%;font-size:11px;">Data Khusus Penilaian Resiko</legend>
							<?php
								$no = 0;
								foreach ($dPenilaian as $data) {
									$no++;
							?>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-lg-1 text-right"><?= $no?>).</label>
									<label class="control-label col-lg-9"><?= $data->PenilaianResikoSam ?></label>
									<label class="control-label col-lg-2"><?= ($data->HasilPenilaian == 1) ? 'Ya' : 'Tidak' ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>