<?php     session_start();
if(empty($_SESSION)){
	header("Location: index.php");
} ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Admin DK</title>
		<meta name="description" content="description">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="plugins/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
		<link href="plugins/select2/select2.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>

	<?php include("header.php") 
			?>


<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a href="ajax/dashboard.php" class="active ajax-link">
						<i class="fa fa-dashboard"></i>
						<span class="hidden-xs">Dashboard</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="ajax/cek_transaksi.php" class="ajax-link" >
						<i class="fa fa-bar-chart-o"></i>
						<span class="hidden-xs">Cek Transaksi</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="ajax/transaksi_sukses.php" class="ajax-link" >
						<i class="fa fa-bar-chart-o"></i>
						<span class="hidden-xs">Transaksi Sukses</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="ajax/fortopolio.php" class="ajax-link" >
						<i class="fa fa-bar-chart-o"></i>
						<span class="hidden-xs">Portofolio</span>
					</a>
					
				</li>
				<li class="dropdown">
					<a href="ajax/konsultasi.php" class="ajax-link">
						<i class="fa fa-pencil-square-o"></i>
						 <span class="hidden-xs">Konsultasi </span>
					</a>
	
				</li>
					<li class="dropdown">
					<a href="ajax/paket_pesta.php" class="ajax-link">
						<i class="fa fa-pencil-square-o"></i>
						 <span class="hidden-xs">Paket Pembelian</span>
					</a>

					<li class="dropdown">
    <a href="ajax/contact.php" class="ajax-link" data-toggle="tooltip" data-placement="top" title="Manage Contact">
        <i class="fa fa-pencil-square-o"></i>
        <span class="hidden-xs">Contact</span>
    </a>
</li>

	
				</li>
					</li>
					<li class="dropdown">
					<a href="ajax/data_admin.php" class="ajax-link">
						<i class="fa fa-pencil-square-o"></i>
						 <span class="hidden-xs">Data Admin</span>
					</a>
	
				</li>
				<li class="dropdown">
					<a class="ajax-link"  href="ajax/data_member.php" >
						<i class="fa fa-map-marker"></i>
						<span class="hidden-xs">Data Member</span>
					</a>
					
				</li>
				
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div class="preloader">
				<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div>
			<div id="ajax-content"></div>
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/justified-gallery/jquery.justifiedgallery.min.js"></script>
<script src="plugins/tinymce/tinymce.min.js"></script>
<script src="plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="js/devoops.js"></script>
</body>
</html>
