<?php
ini_set('allow_url_fopen',1);

$html = '';

/*************PAGINA 2****************/
//$url = 'https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=2';
$url = 'https://es.chaturbate.com/male-cams/?page=13';
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$contents = curl_exec($ch);

//creamos nuevo DOMDocument y cargamos la url
$dom = new DOMDocument();
@$dom->loadHTML($contents);
 
//obtenemos todos los div de la url
$divs = $dom->getElementsByTagName( 'a' );
 
//recorremos los divs
$repetidor = 0;
$html .= '
	<button style="display:none;" id="buttonsolo_hombres_1" class="btn btn-success" onclick="
';

foreach($divs as $div){
	if($repetidor>=2){
		$repetidor=0;
		if( $div->getAttribute( 'data-room' ) != '' ){
	        $html.= "window.open('http://chaturbate.com/".$div->getAttribute('data-room')."');";
    	}
	}
	$repetidor=$repetidor+1;
}
  $html.= '
 	">Abrir Enlaces (Pagina test)</button>
  ';
/*********************************************/


/*************PAGINA 4****************/
$url = 'https://es.chaturbate.com/male-cams/?page=14';
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$contents = curl_exec($ch);

//creamos nuevo DOMDocument y cargamos la url
$dom = new DOMDocument();
@$dom->loadHTML($contents);
 
//obtenemos todos los div de la url
$divs = $dom->getElementsByTagName( 'a' );
 
//recorremos los divs
$repetidor = 0;
$html .= '
	<button style="display:none;" id="buttonsolo_hombres_2" class="btn btn-success" onclick="
';

foreach($divs as $div){
	if($repetidor>=2){
		$repetidor=0;
		if( $div->getAttribute( 'data-room' ) != '' ){
	        $html.= "window.open('http://chaturbate.com/".$div->getAttribute('data-room')."');";
    	}
	}
	$repetidor=$repetidor+1;
}
  $html.= '
 	">Abrir Enlaces (Pagina test)</button>
  ';
/*********************************************/


/*************PAGINA 6****************/
$url = 'https://es.chaturbate.com/male-cams/?page=16';
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$contents = curl_exec($ch);

//creamos nuevo DOMDocument y cargamos la url
$dom = new DOMDocument();
@$dom->loadHTML($contents);
 
//obtenemos todos los div de la url
$divs = $dom->getElementsByTagName( 'a' );
 
//recorremos los divs
$repetidor = 0;
$html .= '
	<button style="display:none;" id="buttonsolo_hombres_3" class="btn btn-success" onclick="
';

foreach($divs as $div){
	if($repetidor>=2){
		$repetidor=0;
		if( $div->getAttribute( 'data-room' ) != '' ){
	        $html.= "window.open('http://chaturbate.com/embed/".$div->getAttribute('data-room')."');";
    	}
	}
	$repetidor=$repetidor+1;
}
  $html.= '
 	">Abrir Enlaces (Pagina test)</button>
  ';
/*********************************************/

$html .= '
	<p id="botonesaviso1">Se esta Ejecutando la función de Hombres!</p>
';

$html .= '<button onclick="cerraraqui();" style="" id="cerrartodo">Cerrar Todo</button>';

 //echo $html;

$datos = [
	"html"		=> $html,
];

echo json_encode($datos);

?>