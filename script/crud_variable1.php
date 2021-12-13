<?php
//@session_start();
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
	
	ini_set('allow_url_fopen',1);

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
			$html1.= "window.open('http://chaturbate.com/".$div1->getAttribute('data-room')."');";
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
			$html2.= "window.open('http://chaturbate.com/".$div2->getAttribute('data-room')."');";
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
			$html3.= "window.open('http://chaturbate.com/".$div3->getAttribute('data-room')."');";
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
	
	ini_set('allow_url_fopen',1);

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
				//$html.= "<option>".$div->getAttribute('data-room')."</option>;";
				$contador1=$contador1+1;
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

?>