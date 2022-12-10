function cargar_data(){
    let timerInterval
    Swal.fire({
      title: 'Creando Tabla de datos',
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

function combo_anio(){
    $.ajax({
    url:"controller_func/trama_registro_ventas/combo_anio.php"
    }).done(function(info){
      $('#slt_anio_c').empty();
      $("#slt_anio_c").append(info);
    })
}

$(document).on('change', '#slt_anio_c', function() {

    var slt_anio_c=$("#slt_anio_c").val();
    var dataString = {"slt_anio_c":slt_anio_c}
  
   $.ajax({
        type: 'POST',
        url:"controller_func/trama_registro_ventas/combo_mes.php",
        data: dataString
        }).done(function(info){
          $('#slt_mes_c').empty();
          $("#slt_mes_c").append(info);
        });
});


$(document).on('change', '#slt_mes_c', function() {

    var slt_anio_c=$("#slt_anio_c").val();
    var slt_mes_c=$("#slt_mes_c").val();
    var dataString = {"slt_anio_c":slt_anio_c,"slt_mes_c":slt_mes_c}
  
   $.ajax({
        type: 'POST',
        url:"controller_func/trama_registro_ventas/combo_semana.php",
        data: dataString
        }).done(function(info){
          $('#slt_semana_c').empty();
          $("#slt_semana_c").append(info);
        });
});

$(document).on('click', '.consult_trama_ventas', function() {
    var slt_anio=$("#slt_anio_c").val();
    var slt_mes=$("#slt_mes_c").val();
    var slt_semana=$("#slt_semana_c").val();
    var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}
  
   $.ajax({
        type: 'POST',
        url:"controller_func/trama_registro_ventas/list.php",
        data: dataString,
        beforeSend:function(){
          cargar_data();
          },
        complete:function(){
          Swal.close();
          },
        }).done(function(info){
          $('.tbl_trama_ventas').empty();
          $(".tbl_trama_ventas").append(info);
        });
});
  