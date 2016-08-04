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
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url('assets/js/core/app.js')?>"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="">APLIKASI SMART SANITASI</a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="icon-calendar"></i>   <?= date('F, m Y')?> <span class="visible-xs-inline-block position-right"> DJ</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="page-container login-container">

	
		<div class="page-content">

		
			<div class="content-wrapper">

			
				<div class="content">

				
					<?= $body ?>
					

					<div class="footer text-muted">
						&copy; 2016. <a href="#">APLIKASI SMART SANITASI</a> by <a href="" target="_blank">DJ</a>
					</div>
			

				</div>
			

			</div>
		

		</div>
	

	</div>

	<?php if(has_alert()):?>
			<?php foreach(has_alert() as $key => $message):
				$head = '';
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
</body>
</html>
