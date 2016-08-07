<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Halaman Utama</span> - <?= $title; ?></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="<?= base_url('puskesmas/report/excel') ?>" target="_blank" class="btn btn-link btn-float has-text"><i class="icon-file-excel text-primary"></i><span>Excel</span></a>
								<a  href="<?= base_url('puskesmas/report/pdf') ?>" target="_blank" class="btn btn-link btn-float has-text"><i class="icon-file-pdf text-primary"></i> <span>PDF</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-printer2 text-primary"></i> <span>Cetak</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Halaman Utama</a></li>
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
							<h5 class="panel-title"><?= $title ?></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-heading" style="margin-top:-20px;">
							<button type="button" class="btn bg-teal-400 btn-labeled" onclick="modalTambah()" style="pointer:hand;"><b><i class="icon-add"></i></b> Tambah</button>
						</div>
						<table class="table datatable-responsive-row-control">
							<thead>
								<tr>
									<th></th>
									<th>No</th>
									<th>Kategori SAM</th>
									<th>Penilaian Resiko</th>
									<th>Tgl Buat</th>
									<th>Petugas</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if (!empty($dPenilaian)){ 
										$no = 1;
										foreach ($dPenilaian as $data) {
											
										?>
											<tr>
												<td></td>
												<td width="5%"><?= $no ?></td>
												<td width="15%"><?= $data->KategoriSam ?></td>
												<td width="40%"><?= $data->PenilaianResikoSam ?></td>
												<td width="15%"><?= date_format(date_create($data->TglBuat), 'd F Y') ?></td>
												<td width="15%"><?= $data->NamaPetugas ?></td>
												<td width="10%" class="text-center" style="position:absolute" >
													<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>

															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href="#" onclick="modalRubah('<?= $data->IdPenilaian ?>');" ><i class="icon-pencil text-primary-600"></i> Rubah data</a></li>
																<li><a href="#" onclick="konfirmasi(<?= "'Hapus Penilaian Resiko ?','".$data->PenilaianResikoSam."','".$data->IdPenilaian."','".base_url('penilaianresiko/hapus')."'"; ?>);"><i class="icon-trash text-danger-600"  ></i> Hapus data</a></li>
															</ul>
														</li>
													</ul>
												</td>
											</tr>
								<?php
											$no++;
										}
									}
								?>
							</tbody>
						</table>
					</div>
					<!-- /whole row as a control -->
					<div id="tampilModal"></div>
					<!-- Footer -->
					<?php $this->view('partial/footer'); ?>
					<!-- /footer -->

				</div>
				<!-- /content area -->

				<script type="text/javascript">

					function modalTambah(){
	                	$.post('<?= base_url('penilaianresiko/tambah'); ?>', {} , function(mod) {
	                		$('#tampilModal').html(mod);
	                		$('#modalForm').modal({show: true , backdrop : true , keyboard: true});
	                		$("#KodeSarana").select2();
	                	});
	                }

	                function modalRubah(index){
	                	$.post('<?= base_url('penilaianresiko/rubah'); ?>', {id:index} , function(mod) {
	                		$('#tampilModal').html(mod);
	                		$('#modalForm').modal({show: true , backdrop : true , keyboard: true});
	                		$("#KodeSarana").select2();
	                	});
	                }

	                $(document).on("click", "#btnPenilaian", function () {
	                	$('#modalPenilaian').validate({
			            ignore: 'input[type=hidden], .select2-input',
				        errorClass: 'validation-error-label',
				        successClass: 'validation-valid-label',
				        highlight: function(element, errorClass) {
				            $(element).removeClass(errorClass);
				        },
				        unhighlight: function(element, errorClass) {
				            $(element).removeClass(errorClass);
				        },
				        errorPlacement: function(error, element) {
				            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
				                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
				                    error.appendTo( element.parent().parent().parent().parent() );
				                }
				                 else {
				                    error.appendTo( element.parent().parent().parent().parent().parent() );
				                }
				            }
				            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
				                error.appendTo( element.parent().parent().parent() );
				            }
				            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
				                error.appendTo( element.parent().parent() );
				            }
				            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
				                error.appendTo( element.parent().parent() );
				            }
				            else {
				                error.insertAfter(element);
				            }
				        },
				        submitHandler: function () {
				        	$.post('<?= base_url('penilaianresiko/simpan') ?>', $('#modalPenilaian').serialize(), function(resp){
				        		if (resp == 'sama'){
				        			$("#textModalError").text("Maaf, Nama penilaian resiko sarana air minum yang anda input sudah terdaftar !");
				        			$("#alertModal").removeClass('hide');
				        			$("#alertModal").alert();
				        		}else{
				        			$('#modalForm').modal('toggle');
				        			window.location.reload();
				        		}
				        	});
				        }
			           }); 
	                });
				</script>