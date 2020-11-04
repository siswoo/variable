<?php
$pagina = $_POST['pagina'];
ini_set('allow_url_fopen',1);
//$url = file_get_contents('https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page='.$pagina);
//$url = file_get_contents('https://es.chaturbate.com/exhibitionist-cams/');
/**********PAGINAS***********/
/*
https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=3
https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=4
https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=5
https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=6
https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=7
https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=8
https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page=9
*/
/****************************/

$url = 'https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page='.$pagina;
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
$html = '
	<button class="btn btn-success" onclick="
';
foreach($divs as $div){
	if($repetidor>=2){
		$repetidor=0;
		if( $div->getAttribute( 'data-room' ) != '' ){
	        //echo $div->getAttribute('data-room');
	        //echo '<br>';
	        $html.= "window.open('http://chaturbate.com/".$div->getAttribute('data-room')."');";
    	}
	}
	$repetidor=$repetidor+1;
  }

  $html.= '
 	">Abrir Enlaces (Pagina '.$pagina.')</button>
  ';
 echo $html;
?>