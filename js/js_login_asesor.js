/*Tiempo Carga de Datos*/
function cargar_data(){
  
    let timerInterval
    Swal.fire({
      title: 'Procesando Datos',
      html: 'Cargando... <b></b>',
      timer: timerInterval,
      onBeforeOpen: () => {
        Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer

      ) {
        console.log('Estaba cerrado por el temporizador')
      }
    })
}
var regexemail= /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

$(document).on('click', '#btn_login_asesor', function() {
var user=$("#user").val();
var clave=$("#clave").val();
var params = {
    "user":user,
    "clave":clave
}
$.ajax({
    type: "POST",
    url:"controller_func/representante/login.php",
    data:params
    }).done(function(info){
    if(info=='true'){
        window.location.replace('index.php');
        }else{
            $('#modal-mensaje').modal('show');
            $("#user").val("");
            $("#clave").val("");
            }
    });
})

$('#clave').on('keydown', function(e) {

    if (e.which == 13) {
   var user=$("#user").val();
    var clave=$("#clave").val();
    var params = {
        "user":user,
        "clave":clave
    }
    $.ajax({
        type: "POST",
        url:"controller_func/representante/login.php",
        data:params
        }).done(function(info){
        if(info=='true'){
            window.location.replace('index.php');
            }else{
                $('#modal-mensaje').modal('show');
                $("#user").val("");
                $("#clave").val("");
                }
        });
    }
});

$(document).on('click', '#cancel-recover-account-rep', function() {
  window.location.replace('login.php');              
})

$(document).on('click', '#recover-account', function() {
  var user=$("#user").val();
  var params = {
      "user":user
  }
$.ajax({
    type: "POST",
    url:"controller_func/representante/restablecer_clave.php",
    data:params,
    beforeSend:function(){
      cargar_data();
      },
    
    complete:function(){
      Swal.close();
      }
    }).promise().done(function(info){
        if(info=='true'){
            $('#modal-mensaje-check').modal('show');
            $("#user").val("");
        }else if(info=="false"){
            toastr.error('Alerta - El Correo no existe en nuestros registros, Ingresa a la web y registrate');
            $("#user").val("");
        }else{
            toastr.error('Alerta - Error al enviar el correo, intenta mas tarde');
        }
      });
})   


