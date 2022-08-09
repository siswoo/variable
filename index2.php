<?php
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
<?php } ?>
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
<?php include('script/conexion.php'); ?>
	<div class="container">
	    <div class="row">
		    <div class="col-12 text-center">
		    	<p style="font-weight: bold;font-size: 50px; margin-bottom: 2rem;">VARIABLE 2.0</p>
		    </div>
		    <div class="col-4">
		    	<label>Categorias Disponibles</label>
		    	<select class="form-control" id="categorias" name="categorias">
		    		<option value="">Seleccione</option>
		    		<?php
		    			$sql1 = "SELECT * FROM categorias WHERE estatus = 1";
		    			$proceso1 = mysqli_query($conexion,$sql1);
		    			while($row1=mysqli_fetch_array($proceso1)){
		    				$categorias_id = $row1["id"];
		    				$categorias_nombre = $row1["nombre"];
		    				echo '<option value="'.$categorias_id.'">'.$categorias_nombre.'</option>';
		    			}
		    		?>
		    	</select>
		    </div>
		    <div class="col-4">
		    	<label>Paginas Disponibles</label>
		    	<select class="form-control" id="paginas" name="paginas">
		    		<option value="">Seleccione</option>
		    		<?php
			    		for($i=1;$i<=20;$i++){ 
			    			echo '<option value="'.$i.'">'.$i.'</option>';
			    		}
		    		?>
		    	</select>
		    </div>
		    <div class="col-4" style="margin-top:2rem;">
		    	<button class="btn btn-primary" id="submit1" onclick="proceso1();">PROCESAR</button>
		    </div>
		</div>
		<div class="row" style="font-size: 20px; margin-top: 3rem;" id="respuesta1"></div>
		<div class="col-12 text-center" id="aviso1" style="font-size: 20px;"></div>
		<div class="col-12 text-center" style="display: none;" id="cerrar1">
			<button class="btn btn-danger" onclick="cerraraqui();" id="cerrartodo">Cerrar Todo</button>
		</div>
	</div>

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
    function cerraraqui(){
        $.ajax({
            type: 'POST',
            dataType: "JSON",
            url: 'cerrartodo.php',
            data: {},
            beforeSend: function(respuesta){},
            success: function(respuesta){},
            error: function(respuesta){
                console.log('Error');
            }
        });
    }

	function proceso1(){
		var categorias = $('#categorias').val();
		var paginas = $('#paginas').val();

		if(categorias=='' || paginas==''){
			Swal.fire({
				title: 'error',
				text: "Verifique los campos solicitados!",
				icon: 'error',
				position: 'center',
				timer: 2000,
			});
			return false;
		}

    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'script/crud_variable1.php',
			data: {
				"categorias": categorias,
				"paginas": paginas,
				"condicion": "ejecutar_paginas1",
			},
			beforeSend: function(respuesta) {
				$('#submit1').attr('disabled','true');
			},
			success: function(respuesta) {
				//$('#respuesta1').html(respuesta['html1']+respuesta['html2']+respuesta['html3']);
				//console.log(respuesta);
				$('#submit1').removeAttr('disabled');
				$('#cerrar1').show('slow');
                setTimeout(function() {
                	$('#respuesta1').html(respuesta['html1']);
                    $("#button1").trigger("click");
                    $('#aviso1').html(respuesta["html1_msg"]);
                },3000);
                setTimeout(function() {
                	$('#respuesta1').html(respuesta['html2']);
                    $("#button2").trigger("click");
                    $('#aviso1').html(respuesta["html2_msg"]);
                },45000);
                setTimeout(function() {
                	$('#respuesta1').html(respuesta['html3']);
                    $("#button3").trigger("click");
                    $('#aviso1').html(respuesta["html3_msg"]);
                },90000);
			},
			error: function(respuesta) {
				console.log(respuesta['responseText']);
			}
		});
	}
</script>