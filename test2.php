<button onclick="window.open('https://www.google.com/', '_blank');">Aqui</button>
<a href="javascript:cerrar();">Cerrar</a>

<!--<button id="boton1" onclick="var ventana = window.open('https://www.google.com/');">Ok</button>-->


<script src="js/jquery-3.5.1.min.js"></script>


<script type="text/javascript">
	
	var miVentana;
	var ventana;
	function abrir() {
	     //miVentana = window.open( "", "ventana1", "height=200,width=700,left=300,location=yes,menubar=no,resizable=no,scrollbars=yes,status=no,titlebar=yes,top=300" );
	     //window.open( "https://www.google.com/" );
	     //$("#boton1").trigger("click");
	}
/*
	function cerrar() {
	     miVentana.close();
	}

	var miVentana = window.open( "", "ventana1", "height=200,width=700,left=100,top=300" );
	function abrir() {
		miVentana.blur();
	}
	
	function otra() {
		miVentana.focus();
	}
*/

function cerrar() {
	//var customWindow = window.open('', '_blank', '');
    window.close();
}

</script>