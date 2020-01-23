$("#email").change(function(){

	$(".alert").remove();

	var email = $(this).val();
	
	var datos = new FormData(); //formatode formularios
	datos.append("validarEmail", email);   //asigna variables de tipo post 
	// Parametros: nombre y luego valor

	$.ajax({

		url: "ajax/formularios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			
			if(respuesta){

				$("#email").val("");

				$("#email").parent().after(`
					
					<div class="alert alert-warning">

							<b>ERROR:</b>

							El correo electrónico ya existe en la base de datos,  por favor ingrese otro diferente
					</div>


				`);

			}

		}

	});


})