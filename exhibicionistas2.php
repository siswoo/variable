<?php
ini_set('allow_url_fopen',1);

$html = '';

/*************PAGINA 2****************/
$url = 'https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=2';
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
	<button style="display:none;" id="buttonsolo1" class="btn btn-success" onclick="
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
$url = 'https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=4';
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
	<button style="display:none;" id="buttonsolo2" class="btn btn-success" onclick="
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
$url = 'https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=6';
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
	<button style="display:none;" id="buttonsolo3" class="btn btn-success" onclick="
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

$html .= '
	<p id="botonesaviso1">Se esta Ejecutando la función!</p>
';


 echo $html;
?>