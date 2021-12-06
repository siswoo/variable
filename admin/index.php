<?php
@session_start();
if(@$_SESSION['variable1_id']==''){?>
	<script type="text/javascript">
		window.location.href = "../index.php";
	</script>
<?php }

if(@$_SESSION['variable1_permisos']!='1'){?>
	<script type="text/javascript">
		window.location.href = "../index.php";
	</script>
<?php } ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard Crack</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<body>
	<?php
	$location = "index";
	include("navbar.php");
	include("lateral.php");
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Bienvenido</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bienvenido</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Versión 0.1 BETA
						<span class="pull-right clickable panel-toggle panel-button-tab-left">
							<em class="fa fa-toggle-up"></em>
						</span>
					</div>
					<div class="panel-body">
						<div class="container">
							<div class="row">
								<div class="col-12">1._ Creación de entorno web</div>
								<div class="col-12">2._ Creación de administrador</div>
								<div class="col-12">3._ Creación de modulos usuarios</div>
								<div class="col-12">4._ Creación de bases de datos</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
		
</body>
</html>