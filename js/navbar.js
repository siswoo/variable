$(document).ready(function(){
    var hidden_ubicacion = $('#hidden_ubicacion').val();
    var hidden_modelo_view = $('#hidden_modelo_view').val();
    var hidden_modelo_edit = $('#hidden_modelo_edit').val();
    var hidden_modelo_delete = $('#hidden_modelo_delete').val();
    //console.log(hidden_modelo_view);

    if(hidden_modelo_view==0){
        $('#a-modelo').addClass('disabled');
    }

    
    if(hidden_ubicacion=='modelo'){
        $('#navbar-home').attr('href','../welcome.php');
        $('#a-modelo').attr('href','index.php');
        $('#a-roles').attr('href','../roles/index.php');
        $('#li-modelo').addClass('navbar-active');
    }  

    if(hidden_ubicacion=='roles'){
        $('#navbar-home').attr('href','../welcome.php');
        $('#a-modelo').attr('href','../modelo/index.php');
        $('#a-roles').attr('href','../roles/index.php');
        $('#li-roles').addClass('navbar-active');
    }  

    /*
	$("#nombre").keyup(function(){
		var variable = $("#nombre").val();
    	var size = variable.length;
    	
    	if(size >= 4){
    		$('#nombre').removeClass('error1');
			$('#error_texto1').addClass('d-none');
    	}

    	if(size <= 3 && size != 0){
    		$('#nombre').removeClass('error1');
			$('#error_texto1').removeClass('d-none');
			$('#error_texto1').html('El campo debe contener al menos 4 caracteres.');
    	}

    	if(size == 0){
    		$('#nombre').addClass('error1');
			$('#error_texto1').removeClass('d-none');
			$('#error_texto1').html('Este campo no debe estar vacio.');
    	}
	});

	$("#clave").keyup(function(){
		var variable = $("#clave").val();
    	var size = variable.length;
    	
    	if(size >= 4){
    		$('#clave').removeClass('error1');
			$('#error_texto2').addClass('d-none');
    	}

    	if(size <= 3 && size != 0){
    		$('#clave').removeClass('error1');
			$('#error_texto2').removeClass('d-none');
			$('#error_texto2').html('El campo debe contener al menos 4 caracteres.');
    	}

    	if(size == 0){
    		$('#clave').addClass('error1');
			$('#error_texto2').removeClass('d-none');
			$('#error_texto2').html('Este campo no debe estar vacio.');
    	}
	});
    */
});