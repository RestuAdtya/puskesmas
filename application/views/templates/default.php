<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>APLIKASI SMART SANITASI</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/icons/icomoon/styles.css')?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/minified/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/minified/core.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/minified/components.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/minified/colors.min.css')?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/loaders/pace.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/core/libraries/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/core/libraries/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/loaders/blockui.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/notifications/jgrowl.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/notifications/sweet_alert.min.js')?>"></script>
	
	
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url('assets/js/core/libraries/jquery_ui/datepicker.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/styling/switchery.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/styling/uniform.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/ui/moment/moment.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/ui/nicescroll.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/uploaders/fileinput.min.js')?>"></script>
	
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/tables/datatables/datatables.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/tables/datatables/extensions/responsive.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/wizards/stepy.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/selects/select2.min.js')?>"></script>


	<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/validation/validate.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/plugins/pickers/anytime.min.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/core/app.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/pages/layout_fixed_custom.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/pages/datatables_responsive.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/pages/form_layouts.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/pages/picker_date.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/pages/uploader_bootstrap.js')?>"></script>

	
	

	<!-- /theme JS files -->

</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php $this->view('partial/navbar'); ?>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
				 <?php $this->view('partial/sidebar'); ?>

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<?= $body; ?>

				
			</div>
		

		</div>
	

	</div>
	
	<?php if(has_alert()):?>
	<?php foreach(has_alert() as $key => $message):
		if ($key == 'bg-danger') { $head = 'Kesalahan'; } elseif ($key == 'bg-info') { $head = 'Informasi'; } elseif ($key == 'bg-success') { $head = 'Berhasil'; } else { $head = 'Peringatan'; }
	?>
		<script>
			$.jGrowl('<?= $message ?>', {
			    header: '<?= $head ?>',
			    theme: 'alert-styled-right <?= $key ?>'
			});
		</script>
	<?php endforeach; ?>
	<?php endif; ?>
	
	<script>
		function konfirmasi(head,pesan,val,aksi){
			swal({
	            title: head,
	            text: pesan,
	            type: "warning",
	            showCancelButton: true,
	            confirmButtonColor: "#EF5350",
	            confirmButtonText: head,
	            cancelButtonText: "Batal",
	            closeOnConfirm: false,
	            closeOnCancel: false
	        },
	        function(isConfirm){
	            if (isConfirm) {
	            	//alert(val + ' ' + aksi);
	            	$.post(aksi, {id:val}, function(result){
	            	  
	            	  if (result != ''){
	            	  	var res = JSON.parse(result);
	            	  	swal({
		                    title: "Berhasil !",
		                    text: res.pesan,
		                    confirmButtonColor: "#66BB6A",
		                    type: "success"
		                });
		                eval(res.aksi);
	            	  }else{
	            	  	 swal({
		                    title: "Gagal !",
		                    text: "Proses gagal !",
		                    confirmButtonColor: "#66BB6A",
		                    type: "error"
		                 });
		                setTimeout("location.reload(true);",2000);
	            	  }
		            });
	            }
	            else {
	                swal({
	                    title: "Batal!",
	                    text: "Proses data dibatalkan",
	                    confirmButtonColor: "#2196F3",
	                    type: "error"
	                });
	            }
	        });
		}
	</script>
	
</body>
</html>
