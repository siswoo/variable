<?php
//@session_start();
//ini_set('allow_url_fopen',1);
include('conexion.php');
$condicion = $_POST["condicion"];
$fecha_creacion = date('Y-m-d');
$fecha_modificacion = date('Y-m-d');

if($condicion=='proceso1'){
	$categorias = $_POST["categorias"];
	$paginas1 = $_POST["paginas1"];
	$paginas2 = $_POST["paginas2"];
	$paginas3 = $_POST["paginas3"];
	$html1 = '<button style="/*display:none;*/" id="button1" class="btn btn-primary mt-3" onclick="';
	$html2 = '<button style="/*display:none;*/" id="button2" class="btn btn-primary mt-3" onclick="';
	$html3 = '<button style="/*display:none;*/" id="button3" class="btn btn-primary mt-3" onclick="';
	$array[] = '';
	$contador2 = 0;
	$contador3 = 0;
	$contador4 = 0;

	$url1 = 'https://chaturbate.com/'.$categorias.'/?page='.$paginas1;
	$ch1 = curl_init();
	curl_setopt ($ch1, CURLOPT_URL, $url1);
	curl_setopt ($ch1, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, true);
	$contents1 = curl_exec($ch1);

	$dom1 = new DOMDocument();
	@$dom1->loadHTML($contents1);
	$divs1 = $dom1->getElementsByTagName('a');

	foreach($divs1 as $div1){
		if($div1->getAttribute('data-room')!=''){

			if(in_array($div1->getAttribute('data-room'),$array)){}else{
				$array[$contador2]=$div1->getAttribute('data-room');
				$contador2=$contador2+1;
				$html1.= "window.open('http://chaturbate.com/".$div1->getAttribute('data-room')."');";
			}
		}
	}

	$url2 = 'https://chaturbate.com/'.$categorias.'/?page='.$paginas2;
	$ch2 = curl_init();
	curl_setopt ($ch2, CURLOPT_URL, $url2);
	curl_setopt ($ch2, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt ($ch2, CURLOPT_RETURNTRANSFER, true);
	$contents2 = curl_exec($ch2);

	$dom2 = new DOMDocument();
	@$dom2->loadHTML($contents2);
	$divs2 = $dom2->getElementsByTagName('a');

	foreach($divs2 as $div2){
		if($div2->getAttribute('data-room')!=''){
			if(in_array($div2->getAttribute('data-room'),$array)){}else{
				$array[$contador2]=$div2->getAttribute('data-room');
				$contador3=$contador3+1;
				$html2.= "window.open('http://chaturbate.com/".$div2->getAttribute('data-room')."');";
			}
		}
	}

	$url3 = 'https://chaturbate.com/'.$categorias.'/?page='.$paginas3;
	$ch3 = curl_init();
	curl_setopt ($ch3, CURLOPT_URL, $url3);
	curl_setopt ($ch3, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt ($ch3, CURLOPT_RETURNTRANSFER, true);
	$contents3 = curl_exec($ch3);

	$dom3 = new DOMDocument();
	@$dom3->loadHTML($contents3);
	$divs3 = $dom3->getElementsByTagName('a');

	foreach($divs3 as $div3){
		if($div3->getAttribute('data-room')!=''){
			if(in_array($div3->getAttribute('data-room'),$array)){}else{
				$array[$contador2]=$div3->getAttribute('data-room');
				$contador4=$contador4+1;
				$html3.= "window.open('http://chaturbate.com/".$div3->getAttribute('data-room')."');";
			}
		}
	}

	$html1.= '">PACK 1</button>';
	$html2.= '">PACK 2</button>';
	$html3.= '">PACK 3</button>';

	$datos = [
		"estatus"	=> "ok",
		"html1"	=> $html1,
		"html2"	=> $html2,
		"html3"	=> $html3,
	];
	echo json_encode($datos);
}

if($condicion=='paginas1'){
	$value = $_POST["value"];
	$limite = 30;
	$html = '';
	$array[] = '';
	$contador2 = 0;

	for($i=1;$i<=$limite;$i++){
		$contador1=0;
		$url = 'https://chaturbate.com/'.$value.'/?page='.$i;
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		$contents = curl_exec($ch);

		$dom = new DOMDocument();
		@$dom->loadHTML($contents);
		$divs = $dom->getElementsByTagName('a');

		foreach($divs as $div){
			if($div->getAttribute('data-room')!=''){
				if(in_array($div->getAttribute('data-room'),$array)){}else{
					$array[$contador2]=$div->getAttribute('data-room');
					$contador1=$contador1+1;
					$contador2=$contador2+1;
				}
			}
		}

		if($contador1>=1){
			$html.= "<option value=".$i.">Pagina #".$i." (".$contador1.")</option>;";
		}
	}

	$datos = [
		"estatus"	=> "ok",
		"value"	=> $value,
		"html"	=> $html,
		"url"	=> $url,
	];
	echo json_encode($datos);
}

if($condicion=='ejecutar_paginas1'){
	$categorias = $_POST["categorias"];
	$paginas = $_POST["paginas"];
	ini_set('allow_url_fopen',1);

	$sql1 = "SELECT * FROM categorias WHERE id = ".$categorias;
	$proceso1 = mysqli_query($conexion,$sql1);
	$contador1 = mysqli_num_rows($proceso1);
	if($contador1==0){
		$datos = [
			"estatus" => "error",
			"msg" => "Categoria no Existente",
		];
		echo json_encode($datos);
		exit;
	}else{
		while($row1=mysqli_fetch_array($proceso1)){
			$url = $row1["url"];
		}
	}

	$html1 = '';
	$html2 = '';
	$html3 = '';

	//$url = 'https://chaturbate.com/male-cams/?page='.$paginas;
	$url = 'https://chaturbate.com/'.$url.'/?page='.$paginas;
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$contents = curl_exec($ch);

	$dom = new DOMDocument();
	@$dom->loadHTML($contents);
	 
	$divs = $dom->getElementsByTagName('a');
	
	$contador_global = 0;

	foreach($divs as $div){
		if($div->getAttribute('data-room')!=''){
			$contador_global = $contador_global+1;
	    }
	}

	//$contador_global = $contador_global/2;
	$vueltas = round($contador_global/3);

	if(($vueltas%2)==0){
		$determinacion = 2;
	}else{
		$determinacion = 3;
	}

	$repetidor_inicial1 = 0;
	$repetidor_inicial2 = 0;
	$repetidor_inicial3 = 0;

	$repetidor1 = $vueltas;
	$repetidor2 = $repetidor1+$vueltas;
	$repetidor3 = $repetidor2+$vueltas;

	$html1 .= '
		<div class="col-12 text-center mt-3">
			<button style="display:none;" id="button1" class="btn btn-success" onclick="
	';
	
	foreach($divs as $div){
		if($repetidor_inicial1<=$repetidor1){
			if($div->getAttribute('data-room')!=''){
				if(($repetidor_inicial1%$determinacion)==0){
					$html1.= "window.open('http://chaturbate.com/embed/".$div->getAttribute('data-room')."');";
				}
				$repetidor_inicial1 = $repetidor_inicial1+1;
			}
		}
	}
	
	$html1.= '">Abrir Enlaces</button></div>';

	$html1_msg = '
		<div class="col-12 text-center mt-3">Se esta Ejecutando la pagina '.$paginas.' Vuelta 1</div>
	';

	$html2 .= '
		<div class="col-12 text-center mt-3">
			<button style="display:none;" id="button2" class="btn btn-success" onclick="
	';

	foreach($divs as $div){
		if($div->getAttribute('data-room')!=''){
			if($repetidor_inicial2>$repetidor1){
				if($repetidor_inicial2<$repetidor2){
					if(($repetidor_inicial2%$determinacion)==0){
						$html2.= "window.open('http://chaturbate.com/embed/".$div->getAttribute('data-room')."');";
					}
					$repetidor_inicial2 = $repetidor_inicial2+1;
				}
			}else{
				$repetidor_inicial2 = $repetidor_inicial2+1;
			}
		}
	}

	$html2.= '">Abrir Enlaces</button></div>';

	$html2_msg = '
		<div class="col-12 text-center mt-3">Se esta Ejecutando la pagina '.$paginas.' Vuelta 2</div>
	';


	$html3 .= '
		<div class="col-12 text-center mt-3">
			<button style="display:none;" id="button3" class="btn btn-success" onclick="
	';

	foreach($divs as $div){
		if($div->getAttribute('data-room')!=''){
			if($repetidor_inicial3>$repetidor2){
				if($repetidor_inicial3<$repetidor3){
					if(($repetidor_inicial3%$determinacion)==0){
						$html3.= "window.open('http://chaturbate.com/embed/".$div->getAttribute('data-room')."');";
					}
					$repetidor_inicial3 = $repetidor_inicial3+1;
				}
			}else{
				$repetidor_inicial3 = $repetidor_inicial3+1;
			}
		}
	}

	$html3.= '">Abrir Enlaces</button></div>';


	$html3_msg = '
		<div class="col-12 text-center mt-3">Se esta Ejecutando la pagina '.$paginas.' Vuelta 3</div>
	';

	$datos = [
		"estatus" => "ok",
		"html1"	=> $html1,
		"html2"	=> $html2,
		"html3"	=> $html3,
		"html1_msg"	=> $html1_msg,
		"html2_msg"	=> $html2_msg,
		"html3_msg"	=> $html3_msg,
	];

	echo json_encode($datos);
}


?>