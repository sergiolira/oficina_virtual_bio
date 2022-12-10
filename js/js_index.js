/*Tiempo Carga de Datos*/
function cargar_data(){
  let timerInterval
  Swal.fire({
    title: 'Creando Tabla de Datos',
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

function cant_ventas(){
    $.ajax({
    url:"controller_func/cabecera_registro_venta/cant_ventas.php"
    }).done(function(info){
        $(".h_cant_compras").empty();
        $(".h_cant_compras").append(info);
    })
}

function total_comisiones(){
    $.ajax({
    url:"controller_func/cabecera_comisiones_venta/total_comisiones.php"
    }).done(function(info){
        $(".h_total_com").empty();
        $(".h_total_com").append("$ "+info);
    })
}

function cant_asesores(){
    $.ajax({
    url:"controller_func/representante/cant_rep.php"
    }).done(function(info){
        $(".h_cant_rep").empty();
        $(".h_cant_rep").append(info);
    })
}