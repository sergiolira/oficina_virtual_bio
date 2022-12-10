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


function combo_anio_no_generados(){
    $.ajax({
    url:"controller_func/cabecera_comisiones_venta/combo_anio_no_generados.php"
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
        url:"controller_func/cabecera_comisiones_venta/combo_mes_no_generados.php",
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
        url:"controller_func/cabecera_comisiones_venta/combo_semana_no_generados.php",
        data: dataString
        }).done(function(info){
          $('#slt_semana_c').empty();
          $("#slt_semana_c").append(info);
        });
});


$(document).on('click', '.generar-comisiones-oncosalud', function() {

    var slt_anio=$("#slt_anio_c").val();
    var slt_mes=$("#slt_mes_c").val();
    var slt_semana=$("#slt_semana_c").val();
    var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}
  
   $.ajax({
        type: 'POST',
        url:"controller_func/cabecera_comisiones_venta/generar_comisiones.php",
        data: dataString,
        beforeSend:function(){
          cargar_data();
          },
        complete:function(){
          Swal.close();
          },
        }).done(function(info){
          $('.tbody_list').empty();
          $(".tbody_list").append(info);
        });
});


  
$(document).on('click', '.generar_comisiones_detalles', function() {

  var slt_anio=$("#slt_anio_c").val();
  var slt_mes=$("#slt_mes_c").val();
  var slt_semana=$("#slt_semana_c").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}

$.ajax({
      type: 'POST',
      url:"controller_func/detalle_comisiones_venta/generar_comisiones.php",
      data: dataString,
      beforeSend:function(){
        cargar_data();
        },
      complete:function(){
        Swal.close();
        },
      }).done(function(info){
        if(info=="true"){
          toastr.success('Detalles de comisiones generadas correctamente');
        }
      });
});

$(document).on('click', '.show-modal-detalles-comisiones-x-nivel', function() {
  var id = $(this).data('id');
  var anio = $(this).data('anio');
  var mes = $(this).data('mes');
  var semana = $(this).data('semana');
  var nro_doc = $(this).data('nro_doc');
  var name = $(this).data('name');
  
  var dataString = {"id":id,"anio":anio,"mes":mes,"semana":semana,"nro_doc":nro_doc,"name":name}

  $.ajax({
      type: 'POST',
      url:"controller_func/detalle_comisiones_venta/show_comisiones_x_nivel.php",
      data: dataString,
      beforeSend:function(){
        cargar_data();
        },
      complete:function(){
        Swal.close();
        },
      }).done(function(info){
        $(".body_modal_tablas").removeAttr("style");
        $('.show_comisiones_x_nivel').empty();
        $('.show_comisiones_x_nivel').append(info);
        $('.title_com_x_nivel').empty();
        $('.title_com_x_nivel').append("<i class='far fa-newspaper'></i> Comisiones por nivel  de "+name+" / "+nro_doc);
        $('#show_modal_comisiones_x_nivel').modal('show');
        
    });
});



