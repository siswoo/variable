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
<?php

@$condicional1 = $_GET['cond1'];

$pase = 0;

if(isset($condicional1)){

	if($condicional1==100 or $condicional1==1000 or $condicional1>=1){

		$pase=1;

	}else if($condicional1=='m' or $condicional1=='s'){

		$pase=2;

	}else if($condicional1=='todos'){

		$pase=3;

	}else if($condicional1=='private'){

		$pase=4;

	}else{

		$condicional1 = 100;

	}

}else{

	$condicional1 = 100;

}

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

<style type="text/css">
	body{
		background-color: #121646;
		color: white;
	}
</style>

<body>

	<div class="seccion1">

	    <div class="row">

		    <div class="container_consulta1">



		    	<div class="row" style="margin-bottom: 2rem;">

		    		<div class="col-12 text-center">

		    			<p style="font-weight: bold;font-size: 50px; margin-bottom: 2rem;">Variable</p>

		    		</div>

			    	<div class="col-12">

			    		<div class="text-center">

			    			<input type="button" class="btn btn-success" style="float: left;" value="Refrescar" onclick="refrescar();">

			    			<!--<input type="button" class="btn btn-danger mr-2" name="Nuevo_rol" id="Nuevo_rol" value="Cargar 100" onclick="consultar(100);">-->

			    			<input type="button" class="btn btn-primary ml-3 mr-2" name="Nuevo_rol" id="Nuevo_rol" value="Cargar Todos" onclick="consultar('todos');">
			    			<!--<input type="button" class="btn btn-danger" name="exhibicionistas" id="exhibicionistas" value="Exhibicionistas" onclick="mostrar_exhibicionistas();">-->
			    			<input type="button" class="btn btn-danger" name="exhibicionistas" id="exhibicionistas" value="Exhibicionistas" onclick="mostrar_exhibicionistas2();">

			    			<!--

			    			<input type="button" class="btn btn-primary ml-3 mr-2" name="Nuevo_rol" id="Nuevo_rol" value="Cargar 1000" onclick="consultar(1000);">


			    			-->

			    			
							
							<!--<input type="button" class="btn btn-danger ml-3 mr-2" name="Nuevo_rol" id="Nuevo_rol" value="Cargar Hombres" onclick="consultar('m');">-->
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="hombres 1" onclick="mostrar_hombres1();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Prueba 1" onclick="prueba1();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 16" onclick="page16();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 15" onclick="page15();">
			    			<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 14" onclick="page14();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 13" onclick="page13();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 12" onclick="page12();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 11" onclick="page11();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 10" onclick="page10();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 9" onclick="page9();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 8" onclick="page8();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 7" onclick="page7();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 6" onclick="page6();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 5" onclick="page5();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 4" onclick="page4();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 3" onclick="page3();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 2" onclick="page2();">
							<input type="button" class="btn btn-danger" name="hombres" id="hombres" value="Page 1" onclick="page1();">
							


			    			<input type="button" class="btn btn-danger ml-3 mr-2" name="Nuevo_rol" id="Nuevo_rol" value="Cargar TransGeneros" onclick="consultar('s');">

			    			<input type="button" class="btn btn-success ml-3 mr-2" name="Mostrar" id="Mostrar" value="Mostrar Registros" onclick="mostrar();">

			    			<input type="hidden" name="switch" id="switch" value="no">

			    			<br>
			    			<!--
			    			<div style="margin-top: 3rem;">
				    			<input type="button" class="btn btn-danger" value="Biografía" disabled>
				    			<input type="button" class="btn btn-danger" value="Contabilidad" disabled>
				    			<input type="button" class="btn btn-danger" value="Descuento" disabled>
				    			<input type="button" class="btn btn-danger" value="Contrato y Cédula" disabled>
			    			</div>
			    			-->

			    		</div>

			    	</div>

			    	<!--

			    	<div class="col-3">

					  	<div class="input-group">

					    	<input type="text" class="form-control" id="search" autocomplete="off" placeholder="Cantidad específica">

					    	<div class="input-group-append">

					      		<button class="btn btn-secondary" type="button" onclick="consultar_search();">

					        		<i>Consultar</i>

					      		</button>

					    	</div>

					  	</div>

					</div>

					-->

			    </div>



		    	<table id="example" class="table row-border hover table-bordered d-none" style="font-size: 14px; color: white;">

			        <thead>

			            <tr>

			                <th class="text-center">Links</th>

			                <th class="text-center">Username</th>

			                <th class="text-center">Followers</th>

			                <th class="text-center">Birthday</th>

			                <th class="text-center">HD</th>

			                <!--<th class="text-center">Display Name</th>-->

			                <th class="text-center">Seconds Online</th>

			                <th class="text-center">Gender</th>

			                <th class="text-center">Age</th>

			                <th class="text-center">Users</th>

			                <th class="text-center">Location</th>

			                <!--<th class="text-center">Block States</th>-->

			                <th class="text-center">Room Subject</th>

			                <th class="text-center">Tags</th>

			            </tr>

			        </thead>

			        <tbody id="resultados">

			        	<?php

			        		$data2 = file_get_contents("json.js");

							$products = json_decode($data2, true);

							/****************CUANDO SE COLOCA UN DATO EXTRAÑO***********************/

							if($pase==0){

								for($a=0;$a<=100;$a++){

									if($products[$a]['current_show']=='public'){

										if($products[$a]["is_hd"]==1){

											$is_hd='<img src="img/icons/check_ok1.png" width="20px">';

										}else{

											$is_hd='<img src="img/icons/no1.png" width="20px">';

										}

									    echo '

									    <tr>

									    	<td class="text-center"><a target="_blank" href="https://chaturbate.com/'.$products[$a]["username"].'">LINK</a></td>

									    	<td class="text-center">'.$products[$a]["username"].'</td>

									    	<td class="text-center">'.$products[$a]["num_followers"].'</td>

									    	<td class="text-center">'.$products[$a]["birthday"].'</td>

									    	<td class="text-center" data-order="'.$products[$a]["is_hd"].'">'.$is_hd.'</td>

									    	<!--<td class="text-center">'.$products[$a]["display_name"].'</td>-->

									    	<td class="text-center">'.$products[$a]["seconds_online"].'</td>

									    	<td class="text-center">'.$products[$a]["gender"].'</td>

									    	<td class="text-center">'.$products[$a]["age"].'</td>

									    	<td class="text-center">'.$products[$a]["num_users"].'</td>

									    	<td class="text-center">'.$products[$a]["location"].'</td>

									    	<!--<td class="text-center">'.$products[$a]["block_from_states"].'</td>-->

									    	<td class="text-center">'.$products[$a]["room_subject"].'</td>

									    	<td class="text-center">'.implode(' | ',$products[$a]["tags"]).'</td>

									    </tr>

									    ';

									}

								}

							}

							/***************************************************************************/





							/********************CUANDO ES UN NUMERICO MAYOR A 1 < 20000******************/

							if($pase==1){

								if($condicional1>=20001){$condicional1=20000;}

								for($a=0;$a<=$condicional1;$a++){

									if($products[$a]['current_show']=='public'){

										if($products[$a]["is_hd"]==1){

											$is_hd='<img src="img/icons/check_ok1.png" width="20px">';

										}else{

											$is_hd='<img src="img/icons/no1.png" width="20px">';

										}

									    echo '

									    <tr>

									    	<td class="text-center"><a target="_blank" href="https://chaturbate.com/'.$products[$a]["username"].'">LINK</a></td>

									    	<td class="text-center">'.$products[$a]["username"].'</td>

									    	<td class="text-center">'.$products[$a]["num_followers"].'</td>

									    	<td class="text-center">'.$products[$a]["birthday"].'</td>

									    	<td class="text-center" data-order="'.$products[$a]["is_hd"].'">'.$is_hd.'</td>

									    	<!--<td class="text-center">'.$products[$a]["display_name"].'</td>-->

									    	<td class="text-center">'.$products[$a]["seconds_online"].'</td>

									    	<td class="text-center">'.$products[$a]["gender"].'</td>

									    	<td class="text-center">'.$products[$a]["age"].'</td>

									    	<td class="text-center">'.$products[$a]["num_users"].'</td>

									    	<td class="text-center">'.$products[$a]["location"].'</td>

									    	<!--<td class="text-center">'.$products[$a]["block_from_states"].'</td>-->

									    	<td class="text-center">'.$products[$a]["room_subject"].'</td>

									    	<td class="text-center">'.implode(' | ',$products[$a]["tags"]).'</td>

									    </tr>

									    ';

									}

								}

							}

							/*******************************************************************************/







							/**************************CASO DE COMBINACIONES ACEPTADAS*************************/

							/**********************CASOS: F (Female) - M (Male) - C (Pareja) - S (Trans)****************/

							if($pase==2){

								if($condicional1=='m' or $condicional1=='s'){

									/*******************************************************/

						    		/******ORDENAR NUM-USUARIOS DE MENOR A MAYOR************/

						    		/*

									function sort_by_orden ($a, $b) {

	    								return $a['num_users'] - $b['num_users'];

									}

						    		usort($products, 'sort_by_orden');

						    		*/

						    		/********************************************************/

						    		/********************************************************/
						    		
									foreach ($products as $product){

										if($product['current_show']=='public' and $product['num_users']>=1){

											if($product['gender']==$condicional1){

												if($product["is_hd"]==1){

													$is_hd='<img src="img/icons/check_ok1.png" width="20px">';

												}else{

													$is_hd='<img src="img/icons/no1.png" width="20px">';

												}



												echo '

												    <tr>

												    	<td class="text-center"><a target="_blank" href="https://chaturbate.com/'.$product["username"].'">LINK</a></td>

												    	<td class="text-center">'.$product["username"].'</td>

												    	<td class="text-center">'.$product["num_followers"].'</td>

												    	<td class="text-center">'.$product["birthday"].'</td>

												    	<td class="text-center" data-order="'.$product["is_hd"].'">'.$is_hd.'</td>

												    	<!--<td class="text-center">'.$product['display_name'].'</td>-->

												    	<td class="text-center">'.$product["seconds_online"].'</td>

												    	<td class="text-center">'.$product["gender"].'</td>

														<td class="text-center">'.$product["age"].'</td>

														<td class="text-center">'.$product["num_users"].'</td>

														<td class="text-center">'.$product["location"].'</td>

														<!--<td class="text-center">'.$product["block_from_states"].'</td>-->

														<td class="text-center">'.$product["room_subject"].'</td>

														<td class="text-center">'.implode(' | ',$product["tags"]).'</td>

												    </tr>

												';

											}

										}

									}
									

								}

							}

							/**********************************************************************************/





							/*********************************TODOS LOS RESULTADOS*****************************/

							if($pase==3){

								foreach ($products as $product){

									if($product['current_show']=='public'){

										if($product["is_hd"]==1){

											$is_hd='<img src="img/icons/check_ok1.png" width="20px">';

										}else{

											$is_hd='<img src="img/icons/no1.png" width="20px">';

										}

										echo '

										    <tr>

												<td class="text-center"><a target="_blank" href="https://chaturbate.com/'.$product["username"].'">LINK</a></td>

										    	<td class="text-center">'.$product["username"].'</td>

												<td class="text-center">'.$product["num_followers"].'</td>

												<td class="text-center">'.$product["birthday"].'</td>

												<td class="text-center" data-order="'.$product["is_hd"].'">'.$is_hd.'</td>

												<!--<td class="text-center">'.$product["display_name"].'</td>-->

												<td class="text-center">'.$product["seconds_online"].'</td>

												<td class="text-center">'.$product["gender"].'</td>

												<td class="text-center">'.$product["age"].'</td>

												<td class="text-center">'.$product["num_users"].'</td>

												<td class="text-center">'.$product["location"].'</td>

												<!--<td class="text-center">'.$product["block_from_states"].'</td>-->

												<td class="text-center">'.$product["room_subject"].'</td>

												<td class="text-center">'.implode(' | ',$product["tags"]).'</td>

											</tr>

										';

									}

								}

							}

							/**********************************************************************************/

						?>

			        </tbody>

			    </table>



				<?php if($condicional1=='m' or $condicional1=='s'){ ?>

			    <hr style="margin-top: 2rem;">



			    <div class="row">

			    	<div class="col-12" style="font-weight: bold; font-size: 20px;">Apartado de Links Generados (90 Resultados por Vuelta)</div>

			    	<div class="col-12 mt-3">

			    		<?php

			    		if($pase==2){

					    		$fila = 1;

					    		$vuelta = 90;

					    		$indicador = 1;

					    		$paradigma="";

					    		echo '<div class="row">';

						    	foreach ($products as $product){

									if($product['gender']==$condicional1 and $product['current_show']=='public' and $product['num_users']>=1){

							    		if($fila==1){

							    			echo '<div class="col-3 mb-2 text-center">';

							    			echo '<strong>Pagina '.$indicador.'</strong>';

							    		}

										if($product['current_show']=='public'){

											$paradigma .= "window.open('http://chaturbate.com/".$product['username']."' );";

											//$paradigma .= "window.open('https://es.chaturbate.com/embed/".$product['username']."/?bgcolor=none&tour=SHBY&room=".$product['username']."&campaign=rrAyT&disable_sound=0');";

										}

										$fila=$fila+1;

										if($fila==$vuelta){

											echo ' <button class="btn btn-primary" onclick="'.$paradigma.'">Tocar Boton!</button>';

											echo '</div>';

											$fila=1;

											$indicador=$indicador+1;

											$paradigma='';

										}

									}

								}

								echo ' <button class="btn btn-primary" onclick="'.$paradigma.'">Tocar Boton!</button>';

								echo '</div>';

						} 

						echo '</div>';

						?>

					</div>

			    </div>

				<?php } ?>



			    <hr style="margin-top: 2rem;">



		    </div>

		</div>

	</div>





	<div id="div_exhibicionistas" class="text-center col-12" style="display: none;">
		<!--
		<button class="btn btn-danger" id="button1_exhibicionistas" onclick="exhibicionistas1(1);">Página 1</button>

		<button class="btn btn-danger" id="button2_exhibicionistas" onclick="exhibicionistas1(2);">Página 2</button>

		<button class="btn btn-danger" id="button3_exhibicionistas" onclick="exhibicionistas1(3);">Página 3</button>

		<button class="btn btn-danger" id="button4_exhibicionistas" onclick="exhibicionistas1(4);">Página 4</button>

		<button class="btn btn-danger" id="button5_exhibicionistas" onclick="exhibicionistas1(5);">Página 5</button>

		<button class="btn btn-danger" id="button6_exhibicionistas" onclick="exhibicionistas1(6);">Página 6</button>

		<button class="btn btn-danger" id="button7_exhibicionistas" onclick="exhibicionistas1(7);">Página 7</button>

		<button class="btn btn-danger" id="button8_exhibicionistas" onclick="exhibicionistas1(8);">Página 8</button>

		<button class="btn btn-danger" id="button9_exhibicionistas" onclick="exhibicionistas1(9);">Página 9</button>

		<button class="btn btn-danger" id="button10_exhibicionistas" onclick="exhibicionistas1(10);">Página 10</button>

		<button class="btn btn-danger" id="button11_exhibicionistas" onclick="exhibicionistas1(11);">Página 11</button>
		-->

		<button onclick="exhibicionistas2();">test</button>

	</div>


	<div class="text-center" style="margin-top: 3rem;" id="respuesta_hombres1"></div>



	<div class="text-center" style="margin-top: 3rem;" id="respuesta_exhibicionistas"></div>





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

    	var table = $('#example').DataTable( {

        	"lengthMenu": [[10, 50, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 100], [10, 50, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 100]],



        	"language": {

	            "lengthMenu": "Mostrar _MENU_ Registros por página",

	            "zeroRecords": "No se ha encontrado resultados",

	            "info": "Ubicado en la página <strong>_PAGE_</strong> de <strong>_PAGES_</strong>",

	            "infoEmpty": "Sin registros actualmente",

	            "infoFiltered": "(Filtrado de <strong>_MAX_</strong> total registros)",

	            "paginate": {

			        "first":      "Primero",

			        "last":       "Última",

			        "next":       "Siguiente",

			        "previous":   "Anterior"

			    },

			    "search": "Buscar",

        	},



        	"paging": true



    	} );



    	/**********PARA REPETIR CONSULTA*************/

    	/*

    	$(document).ready(function() {

		  setInterval(function() {

		    repetidor();

		  }, 30000); //300000

		});

    	/********************************************/

	

	} );



	function consultar(cantidad){

		location.href = 'index2.php?cond1='+cantidad;

	};



	function consultar_search(){

		var search = $('#search').val();

		console.log(search);

		location.href = 'index2.php?cond1='+search;

	}



	function refrescar(){

		$.ajax({

			type: 'POST',

			url: 'proceso1.php',



			success: function(respuesta) {

				//console.log(respuesta);

				location.href = 'index2.php';

			},



			error: function(respuesta) {

				//console.log(respuesta);

			}

		});

	}

	



	function repetidor(){

		$.ajax({

			type: 'POST',

			url: 'proceso1.php',



			success: function(respuesta) {

				console.log('Se ha refrescado la consulta!');

			},



			error: function(respuesta) {

				console.log('Error al refrescar consulta..');

			}

		});

	}



	function mostrar(){

		var variable = $('#switch').val();

		if(variable=='no'){

			$('#example').removeClass('d-none');

			$('#switch').val('si');

		}else{

			$('#example').addClass('d-none');

			$('#switch').val('no');

		}

	}



	function mostrar_exhibicionistas(){

		console.log('Mostrando...');

		$('#div_exhibicionistas').show();

		$('#example_wrapper').addClass('d-none');

	}



	function exhibicionistas1(variable){

		var cambiar = $('#button'+variable+'_exhibicionistas');

		for(var i=1;i<=11;i++){

			//var button+i = $('#button'+i+'_exhibicionistas');

			$('#button'+i+'_exhibicionistas').css('background-color','');

			if(i == variable){

				$('#button'+i+'_exhibicionistas').css('background-color','darkblue');

			}

		}

		//var  $('#button'+variable+'_exhibicionistas');

		//console.log('#button'+variable+'_exhibicionistas');

		//.css('background-color','darkblue');

		$.ajax({

			type: 'POST',

			url: 'exhibicionistas1.php',

			data: {

				"pagina": variable,

			},



			beforeSend: function(respuesta) {

				$('#respuesta_exhibicionistas').html('Cargando...');

			},



			success: function(respuesta) {

				//console.log(respuesta);

				$('#respuesta_exhibicionistas').html(respuesta);

				$('#respuesta_exhibicionistas').show();

			},



			error: function(respuesta) {

				console.log('Error');

			}

		});

	}




	function mostrar_exhibicionistas2(){
		console.log('ok...');
		$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'exhibicionistas2.php',
			data: {
				//"pagina": variable,
			},

			beforeSend: function(respuesta) {
				$('#respuesta_exhibicionistas').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_exhibicionistas').html(respuesta['html']);
				$('#respuesta_exhibicionistas').show();

                setTimeout(function() {
                    $("#buttonsolo1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1');
                },3000);

				/*
                setTimeout(function() {
                    $("#buttonsolo2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final!');
                },120000);
                */
                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}

    function cerraraqui(){
        $.ajax({
            type: 'POST',
            dataType: "JSON",
            url: 'cerrartodo.php',
            data: {
                //"pagina": variable,
            },

            beforeSend: function(respuesta) {},

            success: function(respuesta) {},

            error: function(respuesta) {
                console.log('Error');
            }
        });
    }

	function mostrar_hombres1(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'hombres1.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page20(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page20.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
    }
	function page19(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page19.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
    }
	function page18(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page18.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
    }
	function page17(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page17.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
    }
	function page16(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page16.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
    }
	function page15(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page15.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
    }
    function page14(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page14.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
    }

	function page13(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page13.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page12(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page12.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page11(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page11.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page10(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page10.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page9(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page9.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page8(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page8.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page7(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page7.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page6(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page6.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page5(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page5.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page4(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page4.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page3(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page3.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page2(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page2.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}
	function page1(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'page1.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}

	function prueba1(){
    	$.ajax({
			type: 'POST',
            dataType: "JSON",
			url: 'prueba1.php',
			data: {},

			beforeSend: function(respuesta) {
				$('#respuesta_hombres1').html('Cargando...');
			},

			success: function(respuesta) {
				console.log(respuesta);
				$('#respuesta_hombres1').html(respuesta['html']);
				$('#respuesta_hombres1').show();

                setTimeout(function() {
                    $("#buttonsolo_hombres_1").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 1 de hombres');
                },3000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_2").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton 2 de hombres');
                },60000);

                setTimeout(function() {
                    $("#buttonsolo_hombres_3").trigger("click");
                    $('#botonesaviso1').html('Se ha ejecutado el Boton Final! de hombres');
                },120000);

                /*
                setTimeout(function() {
                    $('#cerrartodo').trigger("click");
                },900000);
                */
			},

			error: function(respuesta) {
				console.log('Error');
			}

		});
	}


	


</script>

