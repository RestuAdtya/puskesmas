<div id="modalForm" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true"> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-teal-300">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Detil Register Inspeksi Kesehatan Lingkungan Tempat Pengelolaan Makanan # <?= $dMaster->IdKesTpm ?></h5>
			</div>

			<div class="modal-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-highlight">
						<li class="active"><a href="#dataInspeksi" data-toggle="tab"><i class="icon-city position-left"></i> Data Inspeksi</a></li>
						<li><a href="#hasilInspeksi" data-toggle="tab"><i class="icon-list position-left"></i> Hasil Inspeksi</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="dataInspeksi">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Tanggal Diperiksa</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= date_format(date_create($dMaster->TglKesTpm), 'd F Y') ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Puskesmas</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $_SESSION['NamaPuskesmas'] ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Kelurahan / Desa</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->NamaKelurahan ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Kategori Tempat Pengelolaan</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->KategoriTpm ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Nama Tempat Pengelolaan</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->NamaTpm ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Pengelola Tempat Makanan</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->NamaPengelolaTpm ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Hasil Pemeriksaan</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= ($dMaster->HasilPemeriksaan == 1) ? 'Memenuhi Syarat' : 'Tidak Memenuhi Syarat'  ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Sertifikat</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= ($dMaster->SertifikatTpm == 1) ? 'Ada' : ($dMaster->SertifikatTpm == 2) ? 'Expired' : 'Tidak Ada'  ?></label>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="hasilInspeksi">
							<legend class="text-semibold" style="padding-left:5%;font-size:11px;">Parameter Inspeksi</legend>
							<?php
								$no = 0;
								foreach ($dParameter as $data) {
									$no++;
							?>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-lg-1 text-right"><?= $no?>).</label>
									<label class="control-label col-lg-9"><?= $data->ParameterInspeksi ?></label>
									<label class="control-label col-lg-2"><?= $data->NilaiParameter ?></label>
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