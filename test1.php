<?php
$pagina = $_POST['pagina'];
$url = file_get_contents('https://es.chaturbate.com/exhibitionist-cams/?keywords=&keywords=&page='.$pagina);
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

//creamos nuevo DOMDocument y cargamos la url
$dom = new DOMDocument();
@$dom->loadHTML($url);
 
//obtenemos todos los div de la url
$divs = $dom->getElementsByTagName( 'a' );
 
//recorremos los divs
$repetidor = 0;
foreach($divs as $div){
	if($repetidor>=2){
		$repetidor=0;
		if( $div->getAttribute( 'data-room' ) != '' ){
	        echo $div->getAttribute('data-room');
	        echo '<br>';
    	}
	}
	$repetidor=$repetidor+1;
  }
 

?>