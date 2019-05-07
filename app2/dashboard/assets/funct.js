$(document).ready(function(){
  $("#info").click(function(){
    Swal.fire({
        type: 'info',
        title: 'Informacion',
        text: 'Dar un salto te costara 2 corazones, pero si te equipocas la panalizacion aumenta dependiendo tu rando de Sabiduria. NOVATO = -1 corazón, APRENDIZ = -2 corazones, MAESTRO = -3 corazones , EXPERTO & SUPERIOR = -4 corazones ',
        animation: false,
        customClass: {
           popup: 'animated rollIn'
        }
    });
  });

  $("#recargar").click(function(){
     document.location.reload();
  });

});
function verificar(respuesta, adivinanza){

        var parametros = {
                "respuesta" : respuesta,
                "adivinanza" : adivinanza
        };
        $.ajax({
                data:  parametros, 
                url:   'verificar.php',
                type:  'POST', 
                success:  function (response) { 
                        $("#response").html(response);
                }
        });
}
