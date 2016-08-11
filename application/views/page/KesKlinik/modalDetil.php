<div id="modalForm" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true"> 
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-teal-300">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Detil Data Klien Klinik Sanitasi # <?= $dMaster->NoIndeksKlien ?></h5>
			</div>

			<div class="modal-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-highlight">
						<li class="active"><a href="#dataInspeksi" data-toggle="tab"><i class="icon-city position-left"></i> Data Klien</a></li>
						<li><a href="#hasilInspeksi" data-toggle="tab"><i class="icon-list position-left"></i> Data Konseling</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="dataInspeksi">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Nama Klien</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->NamaKlien ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Nama KK</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->NamaKK ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Jenis Kelamin</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->JenisKelamin ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Agama</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->AgamaKlien ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Alamat</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->AlamatKlien." Rt/Rw. ".$dMaster->RtRwKlien.", ".$dMaster->DusunKlien." Desa ".$dMaster->NamaKelurahan ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Golongan</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->GolonganKlien ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Aktif</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= date_format(date_create($dMaster->TglBuat), 'd F Y') ?></label>
								</div>
							</div>
							<hr style="margin-top:5px;margin-bottom:5px;" />
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Petugas</label>
									<label class="control-label col-md-1">:</label>
									<label class="control-label col-md-7"><?= $dMaster->NamaPetugas  ?></label>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="hasilInspeksi">
							<table class="table table-togglable table-hover">
								<thead>
									<tr>
										<th width="15%" class="text-center">Tanggal</th>
										<th width="25%" class="text-center">Anamnesa / Masalah</th>
										<th width="25%" class="text-center">Terapi / Saran</th>
										<th width="25%" class="text-center">Kunjungan</th>
										<th width="5%"  class="text-center">Lama</th>
										<th width="5%"  class="text-center">Petugas</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if (!empty($dKonseling)) {
										foreach ($dKonseling as $data) {
									?>
									<tr style="font-size:10px;">
										<td class="text-left"><?= date_format(date_create($data->TglKonseling), 'd F Y') ?></td>
										<td class="text-left"><?= $data->AnamnesaKonseling ?></td>
										<td class="text-left"><?= $data->SaranKonseling ?></td>
										<td class="text-left"><?= $data->KeteranganKunjungan." (".$data->KeteranganLokasi.")<br/>#".$data->KeteranganTgl."@".$data->KeteranganWaktu ?></td>
										<td class="text-left"><?= $data->LamaKonseling ?></td>
										<td class="text-left"><?= $data->NamaPetugas ?></td>
									</tr>
									<?php } } ?>
								</tbody>
							</table>
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