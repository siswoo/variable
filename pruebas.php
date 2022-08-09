<?php
/*
@session_start();
if(@$_SESSION['variable1_id']==''){?>
	<script type="text/javascript">
		window.location.href = "index.php";
	</script>
<?php }

if(@$_SESSION['variable1_permisos']!='0'){?>
	<script type="text/javascript">
		window.location.href = "index.php";
	</script>
<?php }
*/
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	<title>Variable System</title>
</head>
<body>
	<?php
	include("script/conexion.php");
	?>
	<div class="seccion1">
	    <div class="row">
		    <div class="container">
		    	<div class="row" style="margin-bottom: 2rem;">
		    		<div class="col-12 text-center">
		    			<p style="font-weight: bold;font-size: 50px; margin-bottom: 2rem;">VARIABLE 2.0</p>
		    		</div>
			    </div>
			    <div class="row">
			    	<div class="col-12 text-center">
			    		<label for="categorias" style="font-size: 25px; font-weight: bold;">CATEGORIAS</label>
			    		<select class="form-control" id="categorias" name="categorias" onchange="cambio1(value,this.id);">
			    			<option value="">Seleccione</option>
			    			<?php
			    			$sql1 = "SELECT * FROM categorias WHERE estatus = 1 ORDER BY id ASC";
			    			$proceso1 = mysqli_query($conexion,$sql1);
			    			while($row1=mysqli_fetch_array($proceso1)){
			    				$nombre = $row1["nombre"];
			    				$url = $row1["url"];
			    				echo '<option value="'.$url.'">'.$nombre.'</option>';
			    			}
			    			?>
			    		</select>
			    	</div>
			    	<div class="col-4 mt-3">
			    		<label for="paginas1">PAGINA 1</label>
			    		<select class="form-control" id="paginas1" name="paginas1" onchange="cambio1(value,this.id);">
			    			<option value="">Seleccione</option>
			    			<option value="female-cams">Mujeres</option>
			    		</select>
			    	</div>
			    	<div class="col-4 mt-3">
			    		<label for="paginas2">PAGINA 2</label>
			    		<select class="form-control" id="paginas2" name="paginas2" onchange="cambio1(value,this.id);">
			    			<option value="">Seleccione</option>
			    			<option value="female-cams">Mujeres</option>
			    		</select>
			    	</div>
			    	<div class="col-4 mt-3">
			    		<label for="paginas3">PAGINA 3</label>
			    		<select class="form-control" id="paginas3" name="paginas3" onchange="cambio1(value,this.id);">
			    			<option value="">Seleccione</option>
			    			<option value="female-cams">Mujeres</option>
			    		</select>
			    	</div>
			    	<div class="col-12 text-center">
			    		<button value="button" class="btn btn-info" id="seleccionar1" style="margin-top:2rem;" onclick="filtrar1();">SELECCIONAR</button>
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-4 text-center" id="respuesta_html1"></div>
					<div class="col-4 text-center" id="respuesta_html2"></div>
					<div class="col-4 text-center" id="respuesta_html3"></div>
			    </div>
		    </div>
		</div>

	</div>


<input type="hidden" name="datatables" id="datatables" data-categorias="" data-paginas1="" data-paginas2="" data-paginas3="">
</body>
</html>
<script src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/navbar.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		//
	} );

	function cambio1(value,id){
		if(value==''){
			$('#paginas1').attr("disabled","true");
			$('#paginas2').attr("disabled","true");
			$('#paginas3').attr("disabled","true");
			$('#seleccionar1').attr("disabled","true");
			return false;
		}
		if(id=='categorias'){
			$('#datatables').attr({'data-categorias':value});
			$.ajax({
				type: 'POST',
				dataType: "JSON",
				url: 'script/crud_variable1.php',
				data: {
					"value": value,
					"condicion": "paginas1",
				},

				beforeSend: function(respuesta) {
					$('#categorias').attr("disabled","true");
					$('#paginas1').attr("disabled","true");
					$('#paginas2').attr("disabled","true");
					$('#paginas3').attr("disabled","true");
					$('#seleccionar1').attr("disabled","true");
				},

				success: function(respuesta) {
					console.log(respuesta);
					$('#paginas1').html(respuesta["html"]);
					$('#paginas2').html(respuesta["html"]);
					$('#paginas3').html(respuesta["html"]);

					$('#categorias').removeAttr("disabled");
					$('#paginas1').removeAttr("disabled");
					$('#paginas2').removeAttr("disabled");
					$('#paginas3').removeAttr("disabled");
					$('#seleccionar1').removeAttr("disabled");
				},

				error: function(respuesta) {
					console.log(respuesta["responseText"]);
				}
			});
		}else if(id=='paginas1'){
			$('#datatables').attr({'data-paginas1':value});
		}else if(id=='paginas2'){
			$('#datatables').attr({'data-paginas2':value});
		}else if(id=='paginas3'){
			$('#datatables').attr({'data-paginas3':value});
		}else if(id=='otros'){
			$('#datatables').attr({'data-otros':value});
		}
	}

	function filtrar1(){
		var categorias = $('#datatables').attr('data-categorias');
        var paginas1 = $('#datatables').attr('data-paginas1');
        var paginas2 = $('#datatables').attr('data-paginas2');
        var paginas3 = $('#datatables').attr('data-paginas3');

		$.ajax({
			type: 'POST',
			dataType: "JSON",
			url: 'script/crud_variable1.php',
			data: {
				"categorias": categorias,
				"paginas1": paginas1,
				"paginas2": paginas2,
				"paginas3": paginas3,
				"condicion": "proceso1",
			},

			beforeSend: function(respuesta) {},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_html1').html(respuesta["html1"]);
				$('#respuesta_html2').html(respuesta["html2"]);
				$('#respuesta_html3').html(respuesta["html3"]);
			},

			error: function(respuesta) {
				console.log(respuesta["responseText"]);
			}
		});
	}
</script>

