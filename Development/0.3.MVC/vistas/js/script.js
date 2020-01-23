//captura el id email cada vez que halla un cambio en el input
$("#email").change(function (){
    $(".alert").remove();
    var email = $(this).val();
    var datos = new FormData();
    datos.append("validarEmail", email);
    $.ajax({

		url: "ajax/formularios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
        processData: false,
        //no se usa datatype cuando se imprime una cadena string
		dataType: "json",
		success:function(respuesta){
            if(respuesta){
                $("#email").val("");  
                $("#email").parent().after(`
                <div class = "alert alert-warning">
                    <b>ERROR:</b>
                    El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente
                </div>
                    
                `);  
            }
        }
    });
})