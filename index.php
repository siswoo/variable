<?php 
session_start();
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

		.titulo1{

			font-size: 2rem;

			font-weight: bold;

			text-transform: capitalize;

		}

		body{
			background-color: #121646;
			color: white;
		}

	</style>



<body>



    <div class="seccion1">

	    <div class="row">

		    <div class="container">

			    <form action="#" method="POST" id="formulario1" style="margin-left: 30%; margin-right: 30%; margin-top: 2rem;">

				    <div class="col-12" class="text-center">

				    	<p class="text-center titulo1">ERROR 404</p>

				    </div>
				    <!--
				    <div class="form-group form-check">

					    <label for="usuario">User</label>

					    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="" value="" autocomplete="off">

				    </div>

				    <div class="form-group form-check">

					    <label for="clave">Password</label>

					    <input type="password" class="form-control" name="clave" id="clave" placeholder="" value="">

				    </div>

					<div class="row">

						<div class="col-md-12 form-group form-check text-center">

							<button type="submit" id="submit" class="btn btn-success">Acceder</button>

						</div>
					-->
					</div>

			    </form>

		    </div>

	    </div>

    </div>

    <a href="login.php">
    	<button class="btn btn-info" style="margin-top: 600px;"></button> 
    </a>



  </body>

</html>



<script src="js/jquery-3.5.1.min.js"></script>

<script src="js/bootstrap.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



<script>

$("#formulario1").on("submit", function(e){

	e.preventDefault();

    $.ajax({

		type: 'POST',

		url: 'login.php',

		data: $('#formulario1').serialize(),

		dataType: "JSON",

		success: function(respuesta) {

			if(respuesta['estatus']=='error'){

				Swal.fire({

					position: 'center',

					icon: 'error',

					title: 'Usuario incorrecto...!',

					showConfirmButton: true,

					timer: 3000

				})

				$('#usuario').val('');

				$('#clave').val('');

				return false;

			}



			Swal.fire({

 				title: 'Ingresando al sistema',

 				text: "Redirigiendo...!",

 				icon: 'success',

 				position: 'center',

 				showConfirmButton: true,

 				confirmButtonColor: '#3085d6',

 				confirmButtonText: 'No esperar!',

 				timer: 3000

			}).then((result) => {

 				if (result.value) {

   					window.location.href = "index2.php";

 				}

			})

			setTimeout(function() {

		    	window.location.href = "index2.php";

			},3500);

		},



		error: function(respuesta) {

			console.log(respuesta['responseText']);

		}

	});



});



</script>