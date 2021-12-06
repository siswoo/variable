<?php 
session_start();
session_destroy();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>Variable System</title>
</head>

<style type="text/css">
	#container1{
  	display: flex;
  	align-items: center;
  	justify-content: center;
  	min-height: 100vh;
	}
	
	body{
		background-color: #121646;
		color: white;
	}
</style>

<body>

	<div class="container" id="container1">
		<form action="#" method="POST" id="formulario1">
			<div class="row">
				<div class="col-12 text-center mb-3" style="font-size: 30px; font-weight: bold;">ACCESO A VARIABLE</div>
				<div class="col-6 text-right" style="font-size: 22px; font-weight: bold;">USUARIO:</div>
				<div class="col-4">
					<input type="text" class="form-control" name="usuario" id="usuario" autocomplete="off">
				</div>
				<div class="col-12">&nbsp;</div>
				<div class="col-6 text-right" style="font-size: 22px; font-weight: bold;">CLAVE:</div>
				<div class="col-4">
					<input type="password" class="form-control" name="clave" id="clave">
				</div>
				<div class="col-12">&nbsp;</div>
				<div class="col-12 text-center">
					<button type="submit" id="submit" class="btn btn-success" style="font-size: 22px; font-weight: bold;">Acceder</button>
				</div>
			</div>
		</form>
	</div>

</body>
</html>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>

$("#formulario1").on("submit", function(e){
		e.preventDefault();
		var f = $(this);
		var usuario = $('#usuario').val();
		var clave = $('#clave').val();

		$.ajax({
			type: 'POST',
			url: 'script/crud_usuarios.php',
			data: {
				"usuario": usuario,
				"clave": clave,
				"condicion": "login1",
      },
			dataType: "JSON",

			success: function(respuesta) {
				console.log(respuesta);

				if(respuesta["estatus"]=="error"){
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: respuesta["msg"],
						showConfirmButton: true,
						timer: 3000
					})
					return false;
				}

				if(respuesta["estatus"]=="ok"){
					if(respuesta["permisos"]==1){
						window.location.href = "admin/index.php";
					}else{
						window.location.href = "index2.php";
					}
				}

			},

			error: function(respuesta) {
				console.log(respuesta['responseText']);
			}
		});
	});

</script>