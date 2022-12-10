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

