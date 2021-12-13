<?php
@session_start();
include('conexion.php');
$condicion = $_POST["condicion"];
$datetime = date('Y-m-d H:i:s');
$fecha_creacion = date('Y-m-d');
$fecha_modificacion = date('Y-m-d');

if($condicion=='table1'){
	$pagina = $_POST["pagina"];
	$consultasporpagina = $_POST["consultasporpagina"];
	$filtrado = $_POST["filtrado"];
	$sede = $_POST["sede"];
	$link1 = $_POST["link1"];
	$link1 = explode("/",$link1);
	$link1 = $link1[3];

	if($pagina==0 or $pagina==''){
		$pagina = 1;
	}

	if($consultasporpagina==0 or $consultasporpagina==''){
		$consultasporpagina = 10;
	}

	if($filtrado!=''){
		$filtrado = ' and (nombre LIKE "%'.$filtrado.'%" or url LIKE "%'.$filtrado.'%")';
	}

	if($sede!=''){
		$sede = '';
	}

	$limit = $consultasporpagina;
	$offset = ($pagina - 1) * $consultasporpagina;

	$sql1 = "SELECT * FROM categorias 
		".$filtrado." 
		".$sede."
	";
	
	$sql2 = "SELECT * FROM categorias WHERE id != 0
		".$filtrado." 
		".$sede."
		ORDER BY id ASC LIMIT ".$limit." OFFSET ".$offset."
	";

	$proceso1 = mysqli_query($conexion,$sql1);
	$proceso2 = mysqli_query($conexion,$sql2);
	$conteo1 = mysqli_num_rows($proceso1);
	$paginas = ceil($conteo1 / $consultasporpagina);

	$html = '';

	$html .= '
		<div class="col-12">
	        <table class="table table-bordered">
	            <thead>
	            <tr>
	                <th class="text-center">Nombre</th>
	                <th class="text-center">URL</th>
	                <th class="text-center">Estatus</th>
	                <th class="text-center">Opciones</th>
	            </tr>
	            </thead>
	            <tbody>
	';
	if($conteo1>=1){
		while($row2 = mysqli_fetch_array($proceso2)) {

			if($row2["estatus"]==1){
				$estatus = "Activo";
			}else{
				$estatus = "Inactivo";
			}

			$html .= '
		                <tr id="tr_'.$row2["id"].'">
		                    <td style="text-align:center;">'.$row2["nombre"].'</td>
		                    <td style="text-align:center;">'.$row2["url"].'</td>
		                    <td style="text-align:center;">'.$estatus.'</td>
		                    <td class="text-center" nowrap="nowrap">
		                    	<button type="button" class="btn btn-primary" style="cursor:pointer;" data-toggle="modal" data-target="#modal_editar" onclick="editar1('.$row2["id"].');">Editar</button>
			';

			if($row2["estatus"]==1){
				$html .= '
								<button type="button" class="btn btn-danger" style="cursor:pointer;" onclick="desactivar1('.$row2["id"].');">Desactivar</button>
				';
			}else{
				$html .= '
								<button type="button" class="btn btn-success" style="cursor:pointer;" onclick="activar1('.$row2["id"].');">Activar</button>
				';
			}
		    
		    $html .= '		</td>
		    			</tr>
		    ';
		}
	}else{
		$html .= '<tr><td colspan="10" class="text-center" style="font-weight:bold;font-size:20px;">Sin Resultados</td></tr>';
	}

	$html .= '
	            </tbody>
	        </table>
	        <nav>
	            <div class="row">
	                <div class="col-xs-12 col-sm-4 text-center">
	                    <p>Mostrando '.$consultasporpagina.' de '.$conteo1.' Datos disponibles</p>
	                </div>
	                <div class="col-xs-12 col-sm-4 text-center">
	                    <p>Página '.$pagina.' de '.$paginas.' </p>
	                </div> 
	                <div class="col-xs-12 col-sm-4">
			            <nav aria-label="Page navigation" style="float:right; padding-right:2rem;">
							<ul class="pagination">
	';
	
	if ($pagina > 1) {
		$html .= '
								<li class="page-item">
									<a class="page-link" onclick="paginacion1('.($pagina-1).');" href="#">
										<span aria-hidden="true">Anterior</span>
									</a>
								</li>
		';
	}

	$diferenciapagina = 3;
	
	/*********MENOS********/
	if($pagina==2){
		$html .= '
		                		<li class="page-item">
			                        <a class="page-link" onclick="paginacion1('.($pagina-1).');" href="#">
			                            '.($pagina-1).'
			                        </a>
			                    </li>
		';
	}else if($pagina==3){
		$html .= '
			                    <li class="page-item">
			                        <a class="page-link" onclick="paginacion1('.($pagina-2).');" href="#"">
			                            '.($pagina-2).'
			                        </a>
			                    </li>
			                    <li class="page-item">
			                        <a class="page-link" onclick="paginacion1('.($pagina-1).');" href="#"">
			                            '.($pagina-1).'
			                        </a>
			                    </li>
	';
	}else if($pagina>=4){
		$html .= '
		                		<li class="page-item">
			                        <a class="page-link" onclick="paginacion1('.($pagina-3).');" href="#"">
			                            '.($pagina-3).'
			                        </a>
			                    </li>
			                    <li class="page-item">
			                        <a class="page-link" onclick="paginacion1('.($pagina-2).');" href="#"">
			                            '.($pagina-2).'
			                        </a>
			                    </li>
			                    <li class="page-item">
			                        <a class="page-link" onclick="paginacion1('.($pagina-1).');" href="#"">
			                            '.($pagina-1).'
			                        </a>
			                    </li>
		';
	} 

	/*********MAS********/
	$opcionmas = $pagina+3;
	if($paginas==0){
		$opcionmas = $paginas;
	}else if($paginas>=1 and $paginas<=4){
		$opcionmas = $paginas;
	}
	
	for ($x=$pagina;$x<=$opcionmas;$x++) {
		$html .= '
			                    <li class="page-item 
		';

		if ($x == $pagina){ 
			$html .= '"active"';
		}

		$html .= '">';

		$html .= '
			                        <a class="page-link" onclick="paginacion1('.($x).');" href="#"">'.$x.'</a>
			                    </li>
		';
	}

	if ($pagina < $paginas) {
		$html .= '
			                    <li class="page-item">
			                        <a class="page-link" onclick="paginacion1('.($pagina+1).');" href="#"">
			                            <span aria-hidden="true">Siguiente</span>
			                        </a>
			                    </li>
		';
	}

	$html .= '

						</ul>
					</nav>
				</div>
	        </nav>
	    </div>
	';

	$datos = [
		"estatus"	=> "ok",
		"html"	=> $html,
		"sql2"	=> $sql2,
	];
	echo json_encode($datos);
}

if($condicion=="agregar1"){
	$nombre = $_POST["nombre"];
	$url = $_POST["url"];
	$estatus = $_POST["estatus"];
		
	$sql1 = "INSERT INTO categorias (nombre,url,estatus) VALUES ('$nombre','$url',$estatus)";
	$proceso1 = mysqli_query($conexion,$sql1);
	$datos = [
		"estatus"	=> "ok",
		"sql1" 		=> $sql1,
		"msg"		=> "Categoria agregada exitosamente!",
	];
	echo json_encode($datos);
}

if($condicion=='consultar1'){
	$categoria_id = $_POST['categoria_id'];
	$sql1 = "SELECT * FROM categorias WHERE id = ".$categoria_id;
	$proceso1 = mysqli_query($conexion,$sql1);
	$contador1 = mysqli_num_rows($proceso1);
	
	if($contador1>=1){
		while($row1 = mysqli_fetch_array($proceso1)) {
			$nombre = $row1["nombre"];
			$url = $row1["url"];
			$estatus = $row1["estatus"];
		}

		$datos = [
			"estatus"			=> "ok",
			"sql1" 				=> $sql1,
			"nombre" 			=> $nombre,
			"url" 				=> $url,
			"estatus2" 			=> $estatus,
		];
		echo json_encode($datos);

	}else{
		$datos = [
			"estatus"	=> "error",
			"sql1" 		=> $sql1,
			"msg"		=> "Categoria no existente!",
		];
		echo json_encode($datos);
	}
}

if($condicion=='editar1'){
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$url = $_POST['url'];
	$estatus = $_POST['estatus'];

	$sql1 = "UPDATE categorias SET nombre = '$nombre', url = '$url', estatus = $estatus WHERE id = ".$id;
	$proceso1 = mysqli_query($conexion,$sql1);

	$datos = [
		"estatus"	=> "ok",
		"sql1" 		=> $sql1,
		"msg"		=> "Usuario modificado exitosamente!",
	];
	echo json_encode($datos);
}

if($condicion=='activar1'){
	$id = $_POST["categoria_id"];
	$sql1 = "UPDATE categorias SET estatus = 1 WHERE id = ".$id;
	$proceso1 = mysqli_query($conexion,$sql1);
	
	$datos = [
		"estatus"	=> "ok",
		"sql1" 		=> $sql1,
		"msg"		=> "Estatus Cambiado!",
	];
	echo json_encode($datos);
}

if($condicion=='inactivar1'){
	$id = $_POST["categoria_id"];
	$sql1 = "UPDATE categorias SET estatus = 0 WHERE id = ".$id;
	$proceso1 = mysqli_query($conexion,$sql1);
	
	$datos = [
		"estatus"	=> "ok",
		"sql1" 		=> $sql1,
		"msg"		=> "Estatus Cambiado!",
	];
	echo json_encode($datos);
}

?>