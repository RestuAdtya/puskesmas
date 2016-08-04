					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title" align="center"><?= $title ?></h5>
						</div>

						<div class="table-responsive">
							<table class="table table-bordered" border="1" style="">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Puskesmas</th>
										<th>Nama Kecamatan</th>
										<th>Alamat Puskesmas</th>
										<th>No Telpon</th>
										<th>Kepala Puskesmas</th>
										<th>NIP Kepala</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1;
										foreach ($data as $data) {
											echo "<tr>
												<td>$no</td>
												<td>$data->NamaPuskesmas</td>
												<td>$data->NamaKecamatan</td>
												<td>$data->AlamatPuskesmas</td>
												<td>$data->NoTelpPuskesmas</td>
												<td>$data->KepalaPuskesmas</td>
												<td>$data->NIPKepala</td>
											</tr>";
											$no ++;
										}
									?>
								</tbody>
							</table>
						</div>
					</div>