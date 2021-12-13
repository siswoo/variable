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
	<link href="css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<body>
	<?php
	$location = "categorias";
	$ubicacion_url = $_SERVER["PHP_SELF"];
	include("navbar.php");
	include("lateral.php");
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"md->
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
		
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-md-12 text-right">
                	<button class="btn btn-success" data-toggle="modal" data-target="#modal_nuevo">Nuevo Registro</button>
                </div>
            </div>

			<div class="row">
				<input type="hidden" name="datatables" id="datatables" data-pagina="1" data-consultasporpagina="10" data-filtrado="" data-sede="">
				<div class="col-md-3 form-group form-check">
					<label for="consultasporpagina" style="color:black; font-weight: bold;">Consultas por Página</label>
					<select class="form-control" id="consultasporpagina" name="consultasporpagina">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="30">30</option>
						<option value="40">40</option>
						<option value="50">50</option>
						<option value="100">100</option>
                    </select>
                </div>
                <div class="col-md-4 form-group form-check">
					<label for="buscarfiltro" style="color:black; font-weight: bold;">Buscar</label>
					<input type="text" class="form-control" id="buscarfiltro" name="buscarfiltro" style="height: 33px !important;">
                </div>
                <input type="hidden" name="consultaporsede" id="consultaporsede" value="">
                <div class="col-2">
                    <br>
                    <button type="button" class="btn btn-info mt-2" onclick="filtrar1();">Filtrar</button>
                </div>
                <div class="col-md-12" style="background-color: white; border-radius: 1rem; padding: 20px 1px 1px 1px;" id="resultado_table1">Aqui!</div>
            </div>
        </div>

	</div>

	<!-- Modal Nuevo -->
    <div class="modal fade" id="modal_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="#" method="POST" id="nuevo_form" style="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 form-group form-check">
                                <label for="nuevo_nombre" style="font-weight: bold;">Nombre</label>
                                <input type="text" name="nuevo_nombre" id="nuevo_nombre" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="col-md-12 form-group form-check">
                                <label for="nuevo_url" style="font-weight: bold;">URL (etiqueta)</label>
                                <input type="text" name="nuevo_url" id="nuevo_url" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="col-md-12 form-group form-check">
                                <label for="nuevo_estatus" style="font-weight: bold;">Estatus</label>
                                <select class="form-control" id="nuevo_estatus" name="nuevo_estatus" required>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success" id="submit_nuevo">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!----------------->

    <!-- Modal Editar -->
    <div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="#" method="POST" id="editar_form" style="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 form-group form-check">
                                <label for="editar_nombre" style="font-weight: bold;">Nombre</label>
                                <input type="text" name="editar_nombre" id="editar_nombre" class="form-control" required>
                            </div>
                            <div class="col-md-12 form-group form-check">
                                <label for="editar_url" style="font-weight: bold;">URL</label>
                                <input type="text" name="editar_url" id="editar_url" class="form-control" required>
                            </div>
                            <div class="col-md-12 form-group form-check">
                                <label for="editar_estatus" style="font-weight: bold;">Estatus</label>
                                <select class="form-control" id="editar_estatus" name="editar_estatus" required>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success" id="submit_editar">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!----------------->

    <!---HIDDENS--->
    <input type="hidden" id="categoria_id" name="categoria_id" value="">
    <!------------->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		
</body>
</html>

<script type="text/javascript">
	 $(document).ready(function() {
        filtrar1();
        setInterval('filtrar1()',1000);
    } );

    function filtrar1(){
        var input_consultasporpagina = $('#consultasporpagina').val();
        var input_buscarfiltro = $('#buscarfiltro').val();
        var input_consultaporsede = $('#consultaporsede').val();
        
        $('#datatables').attr({'data-consultasporpagina':input_consultasporpagina})
        $('#datatables').attr({'data-filtrado':input_buscarfiltro})
        $('#datatables').attr({'data-sede':input_consultaporsede})

        var pagina = $('#datatables').attr('data-pagina');
        var consultasporpagina = $('#datatables').attr('data-consultasporpagina');
        var sede = $('#datatables').attr('data-sede');
        var filtrado = $('#datatables').attr('data-filtrado');
        var ubicacion_url = '<?php echo $ubicacion_url; ?>';

        $.ajax({
            type: 'POST',
            url: '../script/crud_categorias.php',
            dataType: "JSON",
            data: {
                "pagina": pagina,
                "consultasporpagina": consultasporpagina,
                "sede": sede,
                "filtrado": filtrado,
                "link1": ubicacion_url,
                "condicion": "table1",
            },

            success: function(respuesta) {
               	//console.log(respuesta);
                if(respuesta["estatus"]=="ok"){
                    $('#resultado_table1').html(respuesta["html"]);
                }
            },

            error: function(respuesta) {
                console.log(respuesta['responseText']);
            }
        });
    }

    function paginacion1(value){
        $('#datatables').attr({'data-pagina':value})
        filtrar1();
    }

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    $("#nuevo_form").on("submit", function(e){
        e.preventDefault();
        var nuevo_nombre = $('#nuevo_nombre').val();
        var nuevo_url = $('#nuevo_url').val();
        var nuevo_estatus = $('#nuevo_estatus').val();

        $.ajax({
            type: 'POST',
            url: '../script/crud_categorias.php',
            dataType: "JSON",
            data: {
                "nombre": nuevo_nombre,
                "url": nuevo_url,
                "estatus": nuevo_estatus,
                "condicion": "agregar1",
            },

            success: function(respuesta) {
                console.log(respuesta);
                $('#nuevo_nombre').val("");
                $('#nuevo_url').val("");
                $('#nuevo_estatus').val("");

                if(respuesta["estatus"]=="ok"){
                    Swal.fire({
                        title: 'Correcto!',
                        text: respuesta["msg"],
                        icon: 'success',
                    })
                }else if(respuesta["estatus"]=="error"){
                    Swal.fire({
                        title: 'Error',
                        text: respuesta["msg"],
                        icon: 'error',
                    })
                }

            },

            error: function(respuesta) {
                console.log(respuesta["responseText"]);
            }
        });
    });

    function editar1(categoria_id){
        $('#categoria_id').val(categoria_id);
        $.ajax({
            type: 'POST',
            url: '../script/crud_categorias.php',
            dataType: "JSON",
            data: {
                "categoria_id": categoria_id,
                "condicion": "consultar1",
            },

            success: function(respuesta) {
                console.log(respuesta);

                if(respuesta["estatus"]=="ok"){
                    $('#editar_nombre').val(respuesta["nombre"]);
                    $('#editar_url').val(respuesta["url"]);
                    $('#editar_estatus').val(respuesta["estatus2"]);
                }else if(respuesta["estatus"]=="error"){
                    Swal.fire({
                        title: 'Error',
                        text: respuesta["msg"],
                        icon: 'error',
                    })
                }

            },

            error: function(respuesta) {
                console.log(respuesta["responseText"]);
            }
        });
    }

    $("#editar_form").on("submit", function(e){
        e.preventDefault();
        var id = $('#categoria_id').val();
        var nombre = $('#editar_nombre').val();
        var url = $('#editar_url').val();
        var estatus = $('#editar_estatus').val();

        $.ajax({
            type: 'POST',
            url: '../script/crud_categorias.php',
            dataType: "JSON",
            data: {
                "id": id,
                "nombre": nombre,
                "url": url,
                "estatus": estatus,
                "condicion": "editar1",
            },

            success: function(respuesta) {
                console.log(respuesta);

                if(respuesta["estatus"]=="ok"){
                    Swal.fire({
                        title: 'Correcto!',
                        text: respuesta["msg"],
                        icon: 'success',
                    })
                }else if(respuesta["estatus"]=="error"){
                    Swal.fire({
                        title: 'Error',
                        text: respuesta["msg"],
                        icon: 'error',
                    })
                }

            },

            error: function(respuesta) {
                console.log(respuesta["responseText"]);
            }
        });
    });

    function activar1(categoria_id){
        $.ajax({
            type: 'POST',
            url: '../script/crud_categorias.php',
            dataType: "JSON",
            data: {
                "categoria_id": categoria_id,
                "condicion": "activar1",
            },

            success: function(respuesta) {
                console.log(respuesta);

                if(respuesta["estatus"]=="ok"){
                    Swal.fire({
                        title: 'Correcto',
                        text: respuesta["msg"],
                        icon: 'success',
                    })
                }else if(respuesta["estatus"]=="error"){
                    Swal.fire({
                        title: 'Error',
                        text: respuesta["msg"],
                        icon: 'error',
                    })
                }

            },

            error: function(respuesta) {
                console.log(respuesta["responseText"]);
            }
        });
    }

    function desactivar1(categoria_id){
        $.ajax({
            type: 'POST',
            url: '../script/crud_categorias.php',
            dataType: "JSON",
            data: {
                "categoria_id": categoria_id,
                "condicion": "inactivar1",
            },

            success: function(respuesta) {
                console.log(respuesta);

                if(respuesta["estatus"]=="ok"){
                    Swal.fire({
                        title: 'Correcto',
                        text: respuesta["msg"],
                        icon: 'success',
                    })
                }else if(respuesta["estatus"]=="error"){
                    Swal.fire({
                        title: 'Error',
                        text: respuesta["msg"],
                        icon: 'error',
                    })
                }

            },

            error: function(respuesta) {
                console.log(respuesta["responseText"]);
            }
        });
    }
</script>