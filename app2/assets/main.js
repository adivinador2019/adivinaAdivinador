function registro(){

        var parametros = {
                "nombre" : $("#nombre").val(),
                "apellido" : $("#apellido").val(),
                "email" : $("#email").val(),
                "usuario" : $("#usuario").val(),
                "clave" : $("#clave").val(),
                "clave2" : $("#clave2").val(),
                "iniciar" : $("#iniciar").val()
        };
        $.ajax({
                data:  parametros, 
                url:   'config/configRegistro.php',
                type:  'POST', 
                success:  function (response) { 
                        $("#response").html(response);
                }
        });
}


