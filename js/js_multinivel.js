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
//Combo Representante Lider
  function combo_representante_lider(){
      $.ajax({
      url:"controller_func/multinivel/combo_representante_lider.php"
      }).done(function(info){
        $('#sltruc_buscar').empty();
        $("#sltruc_buscar").append(info);
      })

  }

//Combo Representante Lider para niveles infinitos
  function combo_representante_lider_infinito(){
      $.ajax({
      url:"controller_func/multinivel/combo_representante_lider_infinito.php"
      }).done(function(info){
        $('#sltruc_buscar_i').empty();
        $("#sltruc_buscar_i").append(info);
      })

  }

 /*Datos  RUC */
$(document).on('keyup', '#txtruc_buscar', function() {
  var sltruc=$("#sltruc_buscar").val();
  $("#sltruc_buscar").select2("val", "0");
  this.value = this.value.replace(/[^0-9]/g,'');
      var ruc=$("#txtruc_buscar").val();
      var dataString = {"ruc":ruc}
      $.ajax({
      type: 'POST',
      url:"controller_func/representante/datos_sponsor.php",
      data: dataString,
      }).done(function(info){
      	if(info!="false"){
          if(sltruc=="0"){            
            $('#lbldr').empty();
        	  $("#lbldr").append(info);          
            $("#hnombres").val(info);
            hallar_tipo_mlm();
          }      		
      	}else{
      		$('#lbldr').empty();
        	$("#lbldr").append(" --- --- --- ");
        	$("#hnombres").val("");
          $("#sltruc_buscar").select2("val", "0");
          hallar_tipo_mlm();
      	}

      })

  });


   /*Datos  RUC */
$(document).on('change', '#sltruc_buscar', function() {
  this.value = this.value.replace(/[^0-9]/g,'');
  var ruc=$("#sltruc_buscar").val();
  var dataString = {"ruc":ruc}
  $.ajax({
  type: 'POST',
  url:"controller_func/representante/datos_sponsor.php",
  data: dataString,
  }).done(function(info){
    if(info!="false"){
      $('#lbldr').empty();
      $("#lbldr").append("--- --- ---");
      $("#hnombres").val(info);
      hallar_tipo_mlm();
    }

  })

});
function hallar_tipo_mlm(){
  //this.value = this.value.replace(/[^0-9]/g,'');
  var sltruc=$("#sltruc_buscar").val();
  if(sltruc=="0"){
    var ruc=$("#txtruc_buscar").val();
  }else{
    var ruc=$("#sltruc_buscar").val();
  }  

  var dataString = {"ruc":ruc}
  $.ajax({
  type: 'POST',
  url:"controller_func/representante/hallar_tipo_mlm.php",
  data: dataString,
  }).done(function(info){
    if(info!="false"){
      $("#dibujo_red_mlm").val(info);
    }else{
      $("#dibujo_red_mlm").val("0");
    }

  })
}

//Consultar Multinivel
$(document).on('click', '.consultar-multinivel', function() {

  var sltruc_buscar=$("#sltruc_buscar").val();
  var txtruc_buscar=$("#txtruc_buscar").val();
  var dataString = {"sltruc_buscar":sltruc_buscar,"txtruc_buscar":txtruc_buscar}

 $.ajax({
      type: 'POST',
      url:"controller_func/multinivel/consultamultinivel.php",
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

//Consultar Multinivel
$(document).on('click', '.consultar-multinivel-infinito', function() {

  var sltruc_buscar_i = $("#sltruc_buscar_i").val();
  var dataString = {"sltruc_buscar_i":sltruc_buscar_i}

 $.ajax({
      type: 'POST',
      url:"controller_func/multinivel/consultamultinivelinfinito.php",
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

//Consultar Multinivel
$(document).on('click', '.consultar-hc-onco-rep-x-niveles', function() {

  var sltruc_buscar_i = $("#sltruc_buscar_i").val();
  var dataString = {"sltruc_buscar_i":sltruc_buscar_i}

 $.ajax({
      type: 'POST',
      url:"controller_func/multinivel/consultar_hc_oncosalud_rep_x_niveles.php",
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



$(document).on('click','.limpiar-multinivel',function(){
  $("#sltruc_buscar").select2("val", "0");
  $("#txtruc_buscar").val("");
  $("#slt_anio").select2("val", "0");
  $("#slt_mes").select2("val", "0");
  $("#slt_semana").select2("val", "0");
});


$('#sltruc_buscar').change(function() {
    var sltruc_buscar=$("#sltruc_buscar").val();
    if(sltruc_buscar!=0){
      $("#txtruc_buscar").val("");
      $('#lbldr').empty();
      $("#lbldr").append(" --- --- --- ");
    }
});

//Cargar afiliados de representantes
function multinivel_afiliados(){
 $.ajax({
      url:"controller_func/multinivel/afiliados.php",
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
}

$(document).on('click','#load-afiliados',function(){
  multinivel_afiliados();
});


//Exportar  Representante
 $(document).on('click', '.report-excel-consultar-multinivel', function() {
        var sltruc_buscar=$("#sltruc_buscar").val();
        var txtruc_buscar=$("#txtruc_buscar").val();
        var txtruc_b="";

        if(sltruc_buscar==0){
          txtruc_b=txtruc_buscar;
        }else{
          txtruc_b=sltruc_buscar;
        }

        if(sltruc_buscar==0 && txtruc_b==""){
         toastr.error('Seleccione o ingrese un Patrocinador(RUC) para exportar datos');
        }else{
        //alert("controller_func/multinivel/consultarmultinivel_excel.php?txtruc_b="+txtruc_b);
        window.location.href="controller_func/multinivel/consultarmultinivel_excel.php?txtruc_b="+txtruc_b;
        }

  });

/*INICIO ONCOSALUD*/

$(document).on('click', '.consultar-comisiones-oncosalud-multinivel', function() {

  var sltruc_buscar=$("#sltruc_buscar").val();
  var txtruc_buscar=$("#txtruc_buscar").val();
  var slt_anio=$("#slt_anio").val();
  var slt_mes=$("#slt_mes").val();
  var slt_semana=$("#slt_semana").val();
  var dataString = {"sltruc_buscar":sltruc_buscar,"txtruc_buscar":txtruc_buscar,
  "slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud/multinivelcomisional.php",
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


$(document).on('click', '.comisiones-oncosalud', function() {

  var slt_anio=$("#slt_anio_c").val();
  var slt_mes=$("#slt_mes_c").val();
  var slt_semana=$("#slt_semana_c").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud/comisiones.php",
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


$(document).on('click', '.comisiones-dinersclub', function() {

  var slt_anio=$("#slt_anio_dinersclub_c").val();
  var slt_mes=$("#slt_mes_dinersclub_c").val();
  var slt_semana=$("#slt_semana_dinersclub_c").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_dinersclub_ventas/comisiones.php",
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

function combo_anio_ventas_oncosalud(){
      $.ajax({
      url:"controller_func/trama_oncosalud/combo_anio.php"
      }).done(function(info){
        $('#slt_anio').empty();
        $("#slt_anio").append(info);
      })
  }


  function combo_anio_ventas_dinersclub(){
    $.ajax({
    url:"controller_func/trama_dinersclub_ventas/combo_anio.php"
    }).done(function(info){
      $('#slt_anio_dinersclub').empty();
      $("#slt_anio_dinersclub").append(info);
    })
}

function combo_anio_comisiones_oncosalud(){
      $.ajax({
      url:"controller_func/trama_oncosalud/combo_anio_comisiones.php"
      }).done(function(info){
        $('#slt_anio_c').empty();
        $("#slt_anio_c").append(info);
      })

  }

  function combo_anio_comisiones_dinersclub(){
    $.ajax({
    url:"controller_func/trama_dinersclub_ventas/combo_anio_comisiones.php"
    }).done(function(info){
      $('#slt_anio_dinersclub_c').empty();
      $("#slt_anio_dinersclub_c").append(info);
    })

}


$(document).on('change', '#slt_anio', function() {

  var slt_anio=$("#slt_anio").val();
  var dataString = {"slt_anio":slt_anio}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud/combo_mes.php",
      data: dataString
      }).done(function(info){
        $('#slt_mes').empty();
        $("#slt_mes").append(info);
      });
});


$(document).on('change', '#slt_anio_dinersclub', function() {

  var slt_anio=$("#slt_anio_dinersclub").val();
  var dataString = {"slt_anio":slt_anio}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_dinersclub_ventas/combo_mes.php",
      data: dataString
      }).done(function(info){
        $('#slt_mes_dinersclub').empty();
        $("#slt_mes_dinersclub").append(info);
      });
});

$(document).on('change', '#slt_anio_c', function() {

  var slt_anio_c=$("#slt_anio_c").val();
  var dataString = {"slt_anio_c":slt_anio_c}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud/combo_mes_comisiones.php",
      data: dataString
      }).done(function(info){
        $('#slt_mes_c').empty();
        $("#slt_mes_c").append(info);
      });
});


$(document).on('change', '#slt_anio_dinersclub_c', function() {

  var slt_anio=$("#slt_anio_dinersclub_c").val();
  var dataString = {"slt_anio":slt_anio}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_dinersclub_ventas/combo_mes_comisiones.php",
      data: dataString
      }).done(function(info){
        $('#slt_mes_dinersclub_c').empty();
        $("#slt_mes_dinersclub_c").append(info);
      });
});



$(document).on('change', '#slt_mes', function() {

  var slt_anio=$("#slt_anio").val();
  var slt_mes=$("#slt_mes").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud/combo_semana.php",
      data: dataString
      }).done(function(info){
        $('#slt_semana').empty();
        $("#slt_semana").append(info);
      });
});


$(document).on('change', '#slt_mes_dinersclub', function() {

  var slt_anio=$("#slt_anio_dinersclub").val();
  var slt_mes=$("#slt_mes_dinersclub").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_dinersclub_ventas/combo_semana.php",
      data: dataString
      }).done(function(info){
        $('#slt_semana_dinersclub').empty();
        $("#slt_semana_dinersclub").append(info);
      });
});

$(document).on('change', '#slt_mes_c', function() {

  var slt_anio_c=$("#slt_anio_c").val();
  var slt_mes_c=$("#slt_mes_c").val();
  var dataString = {"slt_anio_c":slt_anio_c,"slt_mes_c":slt_mes_c}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud/combo_semana_comisiones.php",
      data: dataString
      }).done(function(info){
        $('#slt_semana_c').empty();
        $("#slt_semana_c").append(info);
      });
});


$(document).on('change', '#slt_mes_dinersclub_c', function() {

  var slt_anio_c=$("#slt_anio_dinersclub_c").val();
  var slt_mes_c=$("#slt_mes_dinersclub_c").val();
  var dataString = {"slt_anio":slt_anio_c,"slt_mes":slt_mes_c}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_dinersclub_ventas/combo_semana_comisiones.php",
      data: dataString
      }).done(function(info){
        $('#slt_semana_dinersclub_c').empty();
        $("#slt_semana_dinersclub_c").append(info);
      });
});

function combo_anio_comisiones_nogenerados_oncosalud(){
  $.ajax({
  url:"controller_func/trama_oncosalud/combo_anio_comisiones_nogenerados.php"
  }).done(function(info){
    $('#slt_anio_oncosalud_nogenerados').empty();
    $("#slt_anio_oncosalud_nogenerados").append(info);
  })

}


$(document).on('change', '#slt_anio_oncosalud_nogenerados', function() {

var slt_anio=$("#slt_anio_oncosalud_nogenerados").val();
var dataString = {"slt_anio":slt_anio}

$.ajax({
  type: 'POST',
  url:"controller_func/trama_oncosalud/combo_mes_comisiones_nogenerados.php",
  data: dataString
  }).done(function(info){
    $('#slt_mes_oncosalud_nogenerados').empty();
    $("#slt_mes_oncosalud_nogenerados").append(info);
  });
});

$(document).on('change', '#slt_mes_oncosalud_nogenerados', function() {

  var slt_anio=$("#slt_anio_oncosalud_nogenerados").val();
  var slt_mes=$("#slt_mes_oncosalud_nogenerados").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes}
  
  $.ajax({
    type: 'POST',
    url:"controller_func/trama_oncosalud/combo_semana_comisiones_nogenerados.php",
    data: dataString
    }).done(function(info){
      $('#slt_semana_oncosalud_nogenerados').empty();
      $("#slt_semana_oncosalud_nogenerados").append(info);
    });
  });


$(document).on('click', '.ventas-oncosalud', function() {

  var slt_anio=$("#slt_anio").val();
  var slt_mes=$("#slt_mes").val();
  var slt_semana=$("#slt_semana").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud/ventas.php",
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


$(document).on('click', '.ventas-dinersclub', function() {

  var slt_anio=$("#slt_anio_dinersclub").val();
  var slt_mes=$("#slt_mes_dinersclub").val();
  var slt_semana=$("#slt_semana_dinersclub").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_dinersclub_ventas/ventas.php",
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



$(document).on('click', '.generar-comisiones-oncosalud', function() {

  var slt_anio=$("#slt_anio_oncosalud_nogenerados").val();
  var slt_mes=$("#slt_mes_oncosalud_nogenerados").val();
  var slt_semana=$("#slt_semana_oncosalud_nogenerados").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud/generar_comisiones.php",
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


$(document).on('click', '.show-modal-comisiones-nivel-oncosalud', function() {
    var id = $(this).data('id');
    var slt_anio = $(this).data('anio');
    var slt_mes = $(this).data('mes');
    var slt_semana = $(this).data('semana');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    
    var dataString = {"id":id,"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana,"ruc":ruc}

   $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud/showcomisionesxnivel.php",
      data: dataString,
      beforeSend:function(){
        cargar_data();
        },
      complete:function(){
        Swal.close();
        },
      }).done(function(info){
        $('#itemrow_h_b'+id).removeClass('btn btn-warning btn-xs').addClass('btn btn-success btn-xs');
        $('#itemrow_h_b'+id).attr('title', 'Ver Detalle');
        $('#itemrow_h_b'+id).html('Ver Detalle <i class="far fa-eye"></i>');
        $('.show-comisiones-nivel').empty();
        $('.show-comisiones-nivel').append(info);
        $('.title_u').empty();
        $('.title_u').append("<i class='far fa-newspaper'></i> Comisiones por nivel  de "+name+"/ RUC : "+ruc);
        $('#showModal').modal('show');
      });

  });



  $(document).on('click', '.show-modal-comisiones-nivel-dinersclub', function() {
    var id = $(this).data('id');
    var slt_anio = $(this).data('anio');
    var slt_mes = $(this).data('mes');
    var slt_semana = $(this).data('semana');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    
    var dataString = {"id":id,"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana,"ruc":ruc}

   $.ajax({
      type: 'POST',
      url:"controller_func/trama_dinersclub_ventas/showcomisionesxnivel.php",
      data: dataString,
      beforeSend:function(){
        cargar_data();
        },
      complete:function(){
        Swal.close();
        },
      }).done(function(info){
        $('#itemrow_h_b'+id).removeClass('btn btn-warning btn-xs').addClass('btn btn-success btn-xs');
        $('#itemrow_h_b'+id).attr('title', 'Ver Detalle');
        $('#itemrow_h_b'+id).html('Ver Detalle <i class="far fa-eye"></i>');
        $('.show-comisiones-nivel').empty();
        $('.show-comisiones-nivel').append(info);
        $('.title_u').empty();
        $('.title_u').append("<i class='far fa-newspaper'></i> Comisiones por nivel  de "+name+"/ RUC : "+ruc);
        $('#showModal').modal('show');
      });

  });


  $(document).on('click', '.generar-comisiones-detalles-oncosalud', function() {

    var slt_anio=$("#slt_anio_oncosalud_nogenerados").val();
    var slt_mes=$("#slt_mes_oncosalud_nogenerados").val();
    var slt_semana=$("#slt_semana_oncosalud_nogenerados").val();
    var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}
  
  $.ajax({
        type: 'POST',
        url:"controller_func/trama_oncosalud/generar_detalles_comisiones.php",
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
  

  
$(document).on('click', '.show-modal-documentos-comisiones', function() {
  var id = $(this).data('id');
  var slt_anio = $(this).data('anio');
  var slt_mes = $(this).data('mes');
  var slt_semana = $(this).data('semana');
  var name = $(this).data('name');
  var ruc = $(this).data('ruc');
  var programa = $(this).data('programa');
  var url = "controller_func/trama_oncosalud/showdocumentos.php?id="+id+"&slt_anio="+slt_anio+"&slt_mes="+slt_mes+"&slt_semana="+slt_semana+"&ruc="+ruc+"&programa="+programa+"&name="+name;
  $.get(url, function (data) {
    $('.show-documentos').empty();
    $('.show-documentos').append(data);
    $('.title_u_documentos').empty();
    $('.title_u_documentos').append("<i class='far fa-newspaper'></i> Solicitudes de "+name+"/ RUC : "+ruc);
    $('#showModal-documentos').modal('show');
  });
});


$(document).on('click','.show-modal-venta-detalle-oncosalud',function(){
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var semana = $(this).data('semana');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var url = "controller_func/trama_oncosalud/showventadetalle.php?id="+id+"&anio="+anio+"&mes="+mes+"&semana="+semana+"&ruc="+ruc;
    $.get(url, function (data) {
      $('.formshow').empty();
      $('.formshow').append(data);
      $('.stitle_u').empty();
      $('.stitle_u').append("<i class='far fa-newspaper'></i> Detalle de venta de "+name+"/ RUC : "+ruc);
      $('#showModal').modal('show');
    });
});


$(document).on('click','.show-modal-venta-detalle-dinersclub',function(){
  var id = $(this).data('id');
  var anio = $(this).data('anio');
  var mes = $(this).data('mes');
  var semana = $(this).data('semana');
  var name = $(this).data('name');
  var ruc = $(this).data('ruc');
  var url = "controller_func/trama_dinersclub_ventas/showventadetalle.php?id="+id+"&anio="+anio+"&mes="+mes+"&semana="+semana+"&ruc="+ruc;
  $.get(url, function (data) {
    $('.formshow').empty();
    $('.formshow').append(data);
    $('.stitle_u').empty();
    $('.stitle_u').append("<i class='far fa-newspaper'></i> Detalle de venta de "+name+"/ RUC : "+ruc);
    $('#showModal').modal('show');
  });
});





$(document).on('click', '.show-ventas-oncosalud', function() {
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var semana = $(this).data('semana');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var programa = $(this).data('programa');
    var url = "controller_func/trama_oncosalud/showventas.php?id="+id+"&anio="+anio+"&mes="+mes+"&semana="+semana+"&ruc="+ruc+"&programa="+programa;
    $.get(url, function (data) {
      $('.show-ventas').empty();
      $('.show-ventas').append(data);
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-newspaper'></i> Ventas de "+name+"/ RUC : "+ruc);
      $('#showModal').modal('show');
    });
  });

$(document).on('click', '.report-excel-comisiones-oncosalud', function() {
    var slt_anio=$("#slt_anio_c").val();
    var slt_mes=$("#slt_mes_c").val();
    var slt_semana=$("#slt_semana_c").val();

    if(slt_anio==0){
     toastr.error('Seleccione año para exportar datos');
     }else{
      window.location.href="controller_func/trama_oncosalud/exportarexcelcomisiones.php?slt_anio="+slt_anio+"&slt_mes="+slt_mes+"&slt_semana="+slt_semana;
     }
});

$(document).on('click', '.report-excel-ventas-total-comisiones-por-nivel', function() {
  var slt_anio=$("#slt_anio_c").val();
  var slt_mes=$("#slt_mes_c").val();
  var slt_semana=$("#slt_semana_c").val();

  if(slt_anio==0){
   toastr.error('Seleccione año para exportar datos');
   }else{
    window.location.href="controller_func/trama_oncosalud/exportarexcelventas_total_comisiones_por_nivel.php?slt_anio="+slt_anio+"&slt_mes="+slt_mes+"&slt_semana="+slt_semana;
   }
});

$(document).on('click', '.report-excel-ventas-oncosalud', function() {
    var slt_anio=$("#slt_anio").val();
    var slt_mes=$("#slt_mes").val();
    var slt_semana=$("#slt_semana").val();

    if(slt_anio==0){
      toastr.error('Seleccione año para exportar datos');
      }else{
      window.location.href="controller_func/trama_oncosalud/exportarexcelventas.php?slt_anio="+slt_anio+"&slt_mes="+slt_mes+"&slt_semana="+slt_semana;
      }
});


$(document).on('click', '.report-excel-ventas-dinersclub', function() {
  var slt_anio=$("#slt_anio_dinersclub").val();
  var slt_mes=$("#slt_mes_dinersclub").val();
  var slt_semana=$("#slt_semana_dinersclub").val();

  if(slt_anio==0){
    toastr.error('Seleccione año para exportar datos');
    }else{
    window.location.href="controller_func/trama_dinersclub_ventas/exportarexcelventas.php?slt_anio="+slt_anio+"&slt_mes="+slt_mes+"&slt_semana="+slt_semana;
    }
});


$(document).on('click', '.report-excel-comisiones-multinivel-onsosalud', function() {
        var slt_anio=$("#slt_anio").val();
        var slt_mes=$("#slt_mes").val();
        var slt_semana=$("#slt_semana").val();
        var sltruc_buscar=$("#sltruc_buscar").val();
        var txtruc_buscar=$("#txtruc_buscar").val();

        if(slt_anio==0){
         toastr.error('Seleccione año para exportar datos');
        }else if(slt_mes==0){
          toastr.error('Seleccione mes para exportar datos');
        }else if(slt_semana==0){
          toastr.error('Seleccione semana para exportar datos');
        }else if(sltruc_buscar=="0" && txtruc_buscar==""){
          toastr.error('Ingrese o seleccione un representante');
        }else{
        window.location.href="controller_func/trama_oncosalud/exportarexcelmultinivelcomisiones.php?slt_anio="+slt_anio+"&slt_mes="+slt_mes+"&slt_semana="+slt_semana+"&sltruc_buscar="+sltruc_buscar+"&txtruc_buscar="+txtruc_buscar;
        }
  });


/*FIN ONCOSALUD*/


/*INICIO ONCOSALUD RECAUDO*/

//Consultar Multinivel Comisional
$(document).on('click', '.comisiones-oncosalud-multinivel-r', function() {

  var sltruc_buscar=$("#sltruc_buscar").val();
  var txtruc_buscar=$("#txtruc_buscar").val();
  var slt_anio_recaudo=$("#slt_anio_recaudo").val();
  var slt_mes_recaudo=$("#slt_mes_recaudo").val();
  var dataString = {"sltruc_buscar":sltruc_buscar,"txtruc_buscar":txtruc_buscar,
  "slt_anio_recaudo":slt_anio_recaudo,"slt_mes_recaudo":slt_mes_recaudo}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud_r/multinivelcomisional.php",
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

//Comisiones  Oncosalud Generar
$(document).on('click', '.comisiones-oncosalud-r', function() {

  var slt_anio_recaudo=$("#slt_anio_recaudo").val();
  var slt_mes_recaudo=$("#slt_mes_recaudo").val();
  var dataString = {"slt_anio_recaudo":slt_anio_recaudo,"slt_mes_recaudo":slt_mes_recaudo}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud_r/generar_comisiones.php",
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


//Comisiones  Oncosalud Generar
$(document).on('click', '.generar-comisiones-detalles-oncosalud-r', function() {

  var slt_anio_recaudo=$("#slt_anio_recaudo").val();
  var slt_mes_recaudo=$("#slt_mes_recaudo").val();
  var dataString = {"slt_anio_recaudo":slt_anio_recaudo,"slt_mes_recaudo":slt_mes_recaudo}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud_r/generar_detalles_comisiones.php",
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


//Ver Comisiones  Oncosalud
$(document).on('click', '.ver-comisiones-oncosalud-r', function() {

  var slt_anio_recaudo=$("#slt_anio_recaudo_generados").val();
  var slt_mes_recaudo=$("#slt_mes_recaudo").val();
  var dataString = {"slt_anio_recaudo":slt_anio_recaudo,"slt_mes_recaudo":slt_mes_recaudo}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud_r/comisiones.php",
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

function combo_anio_comisiones_oncosalud_r(){
      $.ajax({
      url:"controller_func/trama_oncosalud_r/combo_anio.php"
      }).done(function(info){
        $('#slt_anio_recaudo').empty();
        $("#slt_anio_recaudo").append(info);
      })

  }

function combo_anio_comisiones_oncosalud_r_generados(){
      $.ajax({
      url:"controller_func/trama_oncosalud_r/combo_anio_comisiones.php"
      }).done(function(info){
        $('#slt_anio_recaudo_generados').empty();
        $("#slt_anio_recaudo_generados").append(info);
      })
  }

//Mes de Comisiones oncosalud ventas
$(document).on('change', '#slt_anio_recaudo', function() {

  var slt_anio_recaudo=$("#slt_anio_recaudo").val();
  var dataString = {"slt_anio_recaudo":slt_anio_recaudo}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud_r/combo_mes.php",
      data: dataString
      }).done(function(info){
        $('#slt_mes_recaudo').empty();
        $("#slt_mes_recaudo").append(info);
      });
});


//Mes de Comisiones oncosalud recaudos generados
$(document).on('change', '#slt_anio_recaudo_generados', function() {

  var slt_anio_recaudo_generados=$("#slt_anio_recaudo_generados").val();
  var dataString = {"slt_anio_recaudo":slt_anio_recaudo_generados}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud_r/combo_mes_comisiones.php",
      data: dataString
      }).done(function(info){
        $('#slt_mes_recaudo').empty();
        $("#slt_mes_recaudo").append(info);
      });
});


//Ventas Oncosalud
$(document).on('click', '.recaudos-oncosalud', function() {

  var slt_anio_recaudo=$("#slt_anio_recaudo").val();
  var slt_mes_recaudo=$("#slt_mes_recaudo").val();
  var dataString = {"slt_anio_recaudo":slt_anio_recaudo,"slt_mes_recaudo":slt_mes_recaudo}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_oncosalud_r/recaudos.php",
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


$(document).on('click', '.show-modal-comisiones-nivel-oncosalud-r', function() {
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var url = "controller_func/trama_oncosalud_r/showcomisionesxnivel.php?id="+id+"&anio="+anio+"&mes="+mes+"&ruc="+ruc;
    $.get(url, function (data) {
      $('#itemrow_h_b'+id).removeClass('btn btn-warning btn-xs').addClass('btn btn-success btn-xs');
      $('#itemrow_h_b'+id).attr('title', 'Ver Detalle');
      $('#itemrow_h_b'+id).html('Ver Detalle <i class="far fa-eye"></i>');
      $('.show-comisiones-nivel').empty();
      $('.show-comisiones-nivel').append(data);
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-newspaper'></i> Comisiones por nivel  de "+name+" / RUC : "+ruc);
      $('#showModal').modal('show');
    });
  });

$(document).on('click', '.show-recaudo-detalle-oncosalud', function() {
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var url = "controller_func/trama_oncosalud_r/showrecaudodetalle.php?id="+id+"&anio="+anio+"&mes="+mes+"&ruc="+ruc;
    $.get(url, function (data) {
      $('.formshow').empty();
      $('.formshow').append(data);
      $('.stitle_u').empty();
      $('.stitle_u').append("<i class='far fa-newspaper'></i> Detalle de recaudo de "+name+"/ RUC : "+ruc);
      $('#showModal').modal('show');
    });
  });

$(document).on('click', '.show-recaudo-oncosalud', function() {
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var url = "controller_func/trama_oncosalud_r/showrecaudos.php?id="+id+"&anio="+anio+"&mes="+mes+"&ruc="+ruc;
    $.get(url, function (data) {
      $('.show-recaudos').empty();
      $('.show-recaudos').append(data);
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-newspaper'></i> Recaudos de "+name+"/ RUC : "+ruc);
      $('#showModal').modal('show');
    });
  });


$(document).on('click', '.report-excel-comisiones-oncosalud-r', function() {
    var slt_anio_recaudo=$("#slt_anio_recaudo_generados").val();
    var slt_mes_recaudo=$("#slt_mes_recaudo").val();

    if(slt_anio_recaudo==0){
     toastr.error('Seleccione año para exportar datos');
     }else if(slt_mes_recaudo==0){
      toastr.error('Seleccione mes para exportar datos');
     }else{
      window.location.href="controller_func/trama_oncosalud_r/exportarexcelcomisiones.php?slt_anio_recaudo="+slt_anio_recaudo+"&slt_mes_recaudo="+slt_mes_recaudo;
     }
});

$(document).on('click', '.report-excel-recaudos-oncosalud', function() {
    var slt_anio_recaudo=$("#slt_anio_recaudo").val();
    var slt_mes_recaudo=$("#slt_mes_recaudo").val();

    if(slt_anio_recaudo==0){
     toastr.error('Seleccione año para exportar datos');
     }else if(slt_mes_recaudo==0){
      toastr.error('Seleccione mes para exportar datos');
     }else{
      window.location.href="controller_func/trama_oncosalud_r/exportarexcelrecaudos.php?slt_anio_recaudo="+slt_anio_recaudo+"&slt_mes_recaudo="+slt_mes_recaudo;
      }
});

$(document).on('click', '.report-excel-comisiones-multinivel-onsosalud-r', function() {
        var slt_anio_recaudo=$("#slt_anio_recaudo").val();
        var slt_mes_recaudo=$("#slt_mes_recaudo").val();
        var sltruc_buscar=$("#sltruc_buscar").val();
        var txtruc_buscar=$("#txtruc_buscar").val();

        if(slt_anio_recaudo==0){
         toastr.error('Seleccione año para exportar datos');
         }else if(slt_mes_recaudo==0){
          toastr.error('Seleccione mes para exportar datos');
        }else if(sltruc_buscar=="0" && txtruc_buscar==""){
          toastr.error('Ingrese o seleccione un representante');
        }else{
        window.location.href="controller_func/trama_oncosalud_r/exportarexcelmultinivelcomisiones.php?slt_anio_recaudo="+slt_anio_recaudo+"&slt_mes_recaudo="+slt_mes_recaudo+"&sltruc_buscar="+sltruc_buscar+"&txtruc_buscar="+txtruc_buscar;
        }
  });


/*FIN ONCOSALUD RECAUDO*/


/*INICIO MAPFRE RECAUDO*/

$(document).on('click', '.comisiones-mapfre-multinivel-r', function() {

  var sltruc_buscar=$("#sltruc_buscar").val();
  var txtruc_buscar=$("#txtruc_buscar").val();
  var slt_anio_recaudo_mapfre=$("#slt_anio_recaudo_mapfre").val();
  var slt_mes_recaudo_mapfre=$("#slt_mes_recaudo_mapfre").val();
  var dataString = {"sltruc_buscar":sltruc_buscar,"txtruc_buscar":txtruc_buscar,
  "slt_anio_recaudo_mapfre":slt_anio_recaudo_mapfre,"slt_mes_recaudo_mapfre":slt_mes_recaudo_mapfre}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_mapfre_r/multinivelcomisional.php",
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


$(document).on('click', '.generar-comisiones-mapfre-r', function() {

  var slt_anio_recaudo_mapfre=$("#slt_anio_recaudo_mapfre").val();
  var slt_mes_recaudo_mapfre=$("#slt_mes_recaudo_mapfre").val();
  var dataString = {"slt_anio_recaudo_mapfre":slt_anio_recaudo_mapfre,"slt_mes_recaudo_mapfre":slt_mes_recaudo_mapfre}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_mapfre_r/generar_comisiones.php",
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

$(document).on('click', '.comisiones-mapfre-r', function() {

  var slt_anio_recaudo_mapfre=$("#slt_anio_recaudo_mapfre").val();
  var slt_mes_recaudo_mapfre=$("#slt_mes_recaudo_mapfre").val();
  var dataString = {"slt_anio_recaudo_mapfre":slt_anio_recaudo_mapfre,"slt_mes_recaudo_mapfre":slt_mes_recaudo_mapfre}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_mapfre_r/comisiones.php",
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


function combo_anio_comisiones_mapfre_r(){
      $.ajax({
      url:"controller_func/trama_mapfre_r/combo_anio.php"
      }).done(function(info){
        $('#slt_anio_recaudo_mapfre').empty();
        $("#slt_anio_recaudo_mapfre").append(info);
      })

  }


$(document).on('change', '#slt_anio_recaudo_mapfre', function() {

  var slt_anio_recaudo_mapfre=$("#slt_anio_recaudo_mapfre").val();
  var dataString = {"slt_anio_recaudo_mapfre":slt_anio_recaudo_mapfre}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_mapfre_r/combo_mes.php",
      data: dataString
      }).done(function(info){
        $('#slt_mes_recaudo_mapfre').empty();
        $("#slt_mes_recaudo_mapfre").append(info);
      });
});



$(document).on('click', '.recaudos-mapfre', function() {


  var slt_anio_recaudo_mapfre=$("#slt_anio_recaudo_mapfre").val();
  var slt_mes_recaudo_mapfre=$("#slt_mes_recaudo_mapfre").val();
  var dataString = {"slt_anio_recaudo_mapfre":slt_anio_recaudo_mapfre,"slt_mes_recaudo_mapfre":slt_mes_recaudo_mapfre}

 $.ajax({
      type: 'POST',
      url:"controller_func/trama_mapfre_r/recaudos.php",
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


$(document).on('click', '.show-modal-comisiones-nivel-mapfre-r', function() {
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var url = "controller_func/trama_mapfre_r/showcomisionesxnivel.php?id="+id+"&anio="+anio+"&mes="+mes+"&ruc="+ruc;
    $.get(url, function (data) {
      $('.show-comisiones-nivel').empty();
      $('.show-comisiones-nivel').append(data);
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-newspaper'></i> Comisiones por nivel  de "+name+"/ RUC : "+ruc);
      $('#showModal').modal('show');
    });
  });

$(document).on('click', '.show-recaudo-detalle-mapfre', function() {
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var url = "controller_func/trama_mapfre_r/showrecaudodetalle.php?id="+id+"&anio="+anio+"&mes="+mes+"&ruc="+ruc;
    $.get(url, function (data) {
      $('.formshow').empty();
      $('.formshow').append(data);
      $('.stitle_u').empty();
      $('.stitle_u').append("<i class='far fa-newspaper'></i> Detalle de recaudo de "+name+"/ RUC : "+ruc);
      $('#showModal').modal('show');
    });
  });

$(document).on('click', '.show-recaudo-mapfre', function() {
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var url = "controller_func/trama_mapfre_r/showrecaudos.php?id="+id+"&anio="+anio+"&mes="+mes+"&ruc="+ruc;
    $.get(url, function (data) {
      $('.show-recaudos').empty();
      $('.show-recaudos').append(data);
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-newspaper'></i> Recaudos de "+name+"/ RUC : "+ruc);
      $('#showModal').modal('show');
    });
  });


$(document).on('click', '.report-excel-comisiones-mapfre', function() {
        var slt_anio_recaudo_mapfre=$("#slt_anio_recaudo_mapfre").val();
        var slt_mes_recaudo_mapfre=$("#slt_mes_recaudo_mapfre").val();
        if(slt_anio_recaudo_mapfre==0){
         toastr.error('Seleccione año para exportar datos');
         }else if(slt_mes_recaudo_mapfre==0){
          toastr.error('Seleccione mes para exportar datos');
        }else{
        window.location.href="controller_func/trama_mapfre_r/exportarexcelcomisiones.php?slt_anio_recaudo_mapfre="+slt_anio_recaudo_mapfre+"&slt_mes_recaudo_mapfre="+slt_mes_recaudo_mapfre;
        }
  });

$(document).on('click', '.report-excel-recaudos-mapfre', function() {
        var slt_anio_recaudo_mapfre=$("#slt_anio_recaudo_mapfre").val();
        var slt_mes_recaudo_mapfre=$("#slt_mes_recaudo_mapfre").val();
        if(slt_anio_recaudo_mapfre==0){
         toastr.error('Seleccione año para exportar datos');
         }else if(slt_mes_recaudo_mapfre==0){
          toastr.error('Seleccione mes para exportar datos');
        }else{
        window.location.href="controller_func/trama_mapfre_r/exportarexcelrecaudos.php?slt_anio_recaudo_mapfre="+slt_anio_recaudo_mapfre+"&slt_mes_recaudo_mapfre="+slt_mes_recaudo_mapfre;
        }
  });

$(document).on('click', '.report-excel-comisiones-multinivel-mapfre', function() {
        var slt_anio_recaudo_mapfre=$("#slt_anio_recaudo_mapfre").val();
        var slt_mes_recaudo_mapfre=$("#slt_mes_recaudo_mapfre").val();
        var sltruc_buscar=$("#sltruc_buscar").val();
        var txtruc_buscar=$("#txtruc_buscar").val();

        if(slt_anio_recaudo_mapfre==0){
         toastr.error('Seleccione año para exportar datos');
         }else if(slt_mes_recaudo_mapfre==0){
          toastr.error('Seleccione mes para exportar datos');
        }else if(sltruc_buscar=="0" && txtruc_buscar==""){
          toastr.error('Ingrese o seleccione un representante');
        }else{
        window.location.href="controller_func/trama_mapfre_r/exportarexcelmultinivelcomisiones.php?slt_anio_recaudo_mapfre="+slt_anio_recaudo_mapfre+"&slt_mes_recaudo_mapfre="+slt_mes_recaudo_mapfre+"&sltruc_buscar="+sltruc_buscar+"&txtruc_buscar="+txtruc_buscar;
        }
  });

/*FIN MAPFRE RECAUDO*/

/**INICIO A365 VENTAS*/

  $(document).on('click', '.comisiones-a365', function() {

    var slt_anio_a365=$("#slt_anio_a365_comisiones").val();
    var slt_mes_a365=$("#slt_mes_a365_comisiones").val();
    var dataString = {"slt_anio_a365":slt_anio_a365,"slt_mes_a365":slt_mes_a365}

    $.ajax({
          type: 'POST',
          url:"controller_func/trama_a365/comisiones.php",
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


  $(document).on('click', '.generar-comisiones-a365', function() {

    var slt_anio_a365=$("#slt_anio_a365_nogenerados").val();
    var slt_mes_a365=$("#slt_mes_a365").val();
    var dataString = {"slt_anio_a365":slt_anio_a365,"slt_mes_a365":slt_mes_a365}

  $.ajax({
        type: 'POST',
        url:"controller_func/trama_a365/generar_comisiones.php",
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

  $(document).on('click', '.generar-comisiones-detalles-a365', function() {

    var slt_anio_a365=$("#slt_anio_a365_nogenerados").val();
    var slt_mes_a365=$("#slt_mes_a365").val();
    var dataString = {"slt_anio_a365":slt_anio_a365,"slt_mes_a365":slt_mes_a365}

  $.ajax({
        type: 'POST',
        url:"controller_func/trama_a365/generar_detalles_comisiones.php",
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


  function combo_anio_ventas_a365(){
        $.ajax({
        url:"controller_func/trama_a365/combo_anio.php"
        }).done(function(info){
          $('#slt_anio_a365').empty();
          $("#slt_anio_a365").append(info);
        })

    }


  $(document).on('change', '#slt_anio_a365', function() {

    var slt_anio_a365=$("#slt_anio_a365").val();
    var dataString = {"slt_anio_a365":slt_anio_a365}

  $.ajax({
        type: 'POST',
        url:"controller_func/trama_a365/combo_mes.php",
        data: dataString
        }).done(function(info){
          $('#slt_mes_a365').empty();
          $("#slt_mes_a365").append(info);
        });
  });


  function combo_anio_comisiones_a365(){
    $.ajax({
      url:"controller_func/trama_a365/combo_anio_comisiones.php"
      }).done(function(info){
        $('#slt_anio_a365_comisiones').empty();
        $("#slt_anio_a365_comisiones").append(info);
      })
  }


  $(document).on('change', '#slt_anio_a365_comisiones', function() {

    var slt_anio_a365=$("#slt_anio_a365_comisiones").val();
    var dataString = {"slt_anio_a365":slt_anio_a365}

  $.ajax({
        type: 'POST',
        url:"controller_func/trama_a365/combo_mes_comisiones.php",
        data: dataString
        }).done(function(info){
          $('#slt_mes_a365_comisiones').empty();
          $("#slt_mes_a365_comisiones").append(info);
        });
  });


  function combo_anio_comisiones_a365_nogenerados(){
    $.ajax({
    url:"controller_func/trama_a365/combo_anio_comisiones_nogenerados.php"
    }).done(function(info){
      $('#slt_anio_a365_nogenerados').empty();
      $("#slt_anio_a365_nogenerados").append(info);
    })

  }


  $(document).on('change', '#slt_anio_a365_nogenerados', function() {

  var slt_anio_a365=$("#slt_anio_a365_nogenerados").val();
  var dataString = {"slt_anio_a365":slt_anio_a365}

  $.ajax({
    type: 'POST',
    url:"controller_func/trama_a365/combo_mes_comisiones_nogenerados.php",
    data: dataString
    }).done(function(info){
      $('#slt_mes_a365').empty();
      $("#slt_mes_a365").append(info);
    });
  });



  $(document).on('click', '.ventas-a365', function() {


    var slt_anio_a365=$("#slt_anio_a365").val();
    var slt_mes_a365=$("#slt_mes_a365").val();
    var dataString = {"slt_anio_a365":slt_anio_a365,"slt_mes_a365":slt_mes_a365}

  $.ajax({
        type: 'POST',
        url:"controller_func/trama_a365/ventas.php",
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


  $(document).on('click', '.show-modal-comisiones-nivel-a365', function() {
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var url = "controller_func/trama_a365/showcomisionesxnivel.php?id="+id+"&anio="+anio+"&mes="+mes+"&ruc="+ruc;
    $.get(url, function (data) {
      $('.show-detallecomision').empty();
      $('.show-detallecomision').append(data);
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-newspaper'></i> Detalles de Comision -  "+name+"/ RUC : "+ruc);
      $('#showModal').modal('show');
    });
  });

  $(document).on('click', '.show-modal-venta-detalle-a365', function() {
      var id = $(this).data('id');
      var anio = $(this).data('anio');
      var mes = $(this).data('mes');
      var name = $(this).data('name');
      var ruc = $(this).data('ruc');
      var url = "controller_func/trama_a365/showventadetalle.php?id="+id+"&anio="+anio+"&mes="+mes+"&ruc="+ruc;
      $.get(url, function (data) {
        $('.formshow').empty();
        $('.formshow').append(data);
        $('.stitle_u').empty();
        $('.stitle_u').append("<i class='far fa-newspaper'></i> Detalle de venta de "+name+"/ RUC : "+ruc);
        $('#showModal').modal('show');
      });
    });


  $(document).on('click', '.report-excel-comisiones-a365', function() {
          var slt_anio_a365=$("#slt_anio_a365_comisiones").val();
          var slt_mes_a365=$("#slt_mes_a365_comisiones").val();
          if(slt_anio_a365==0){
          toastr.error('Seleccione año para exportar datos');
          }else{
          window.location.href="controller_func/trama_a365/exportarexcelcomisiones.php?slt_anio_a365="+slt_anio_a365+"&slt_mes_a365="+slt_mes_a365;
          }
    });

  $(document).on('click', '.report-excel-ventas-a365', function() {
          var slt_anio=$("#slt_anio_a365").val();
          var slt_mes=$("#slt_mes_a365").val();
          if(slt_anio==0){
          toastr.error('Seleccione año para exportar datos');
          }else{
          window.location.href="controller_func/trama_a365/exportarexcelventas.php?slt_anio="+slt_anio+"&slt_mes="+slt_mes;
          }
    });

/**FIN A365 VENTAS */


/**INICIO AUNASALUD VENTAS*/

$(document).on('click', '.comisiones-aunasalud', function() {

  var slt_anio=$("#slt_anio_aunasalud_generados").val();
  var slt_mes=$("#slt_mes_aunasalud_generados").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes}

  $.ajax({
        type: 'POST',
        url:"controller_func/trama_aunasalud/comisiones.php",
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


$(document).on('click', '.generar-comisiones-aunasalud', function() {

  var slt_anio=$("#slt_anio_aunasalud_nogenerados").val();
  var slt_mes=$("#slt_mes_aunasalud_nogenerados").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes}

$.ajax({
      type: 'POST',
      url:"controller_func/trama_aunasalud/generar_comisiones.php",
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

$(document).on('click', '.generar-comisiones-detalles-aunasalud', function() {

  var slt_anio=$("#slt_anio_aunasalud_nogenerados").val();
  var slt_mes=$("#slt_mes_aunasalud_nogenerados").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes}

$.ajax({
      type: 'POST',
      url:"controller_func/trama_aunasalud/generar_detalles_comisiones.php",
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


function combo_anio_aunasalud(){
      $.ajax({
      url:"controller_func/trama_aunasalud/combo_anio.php"
      }).done(function(info){
        $('#slt_anio_aunasalud').empty();
        $("#slt_anio_aunasalud").append(info);
      })

  }


$(document).on('change', '#slt_anio_aunasalud', function() {

  var slt_anio=$("#slt_anio_aunasalud").val();
  var dataString = {"slt_anio":slt_anio}

$.ajax({
      type: 'POST',
      url:"controller_func/trama_aunasalud/combo_mes.php",
      data: dataString
      }).done(function(info){
        $('#slt_mes_aunasalud').empty();
        $("#slt_mes_aunasalud").append(info);
      });
});


function combo_anio_comisiones_aunasalud(){
  $.ajax({
    url:"controller_func/trama_aunasalud/combo_anio_comisiones.php"
    }).done(function(info){
      $('#slt_anio_aunasalud_generados').empty();
      $("#slt_anio_aunasalud_generados").append(info);
    })
}


$(document).on('change', '#slt_anio_aunasalud_generados', function() {

  var slt_anio=$("#slt_anio_aunasalud_generados").val();
  var dataString = {"slt_anio":slt_anio}

$.ajax({
      type: 'POST',
      url:"controller_func/trama_aunasalud/combo_mes_comisiones.php",
      data: dataString
      }).done(function(info){
        $('#slt_mes_aunasalud_generados').empty();
        $("#slt_mes_aunasalud_generados").append(info);
      });
});


function combo_anio_comisiones_nogenerados_aunasalud(){
  $.ajax({
  url:"controller_func/trama_aunasalud/combo_anio_comisiones_nogenerados.php"
  }).done(function(info){
    $('#slt_anio_aunasalud_nogenerados').empty();
    $("#slt_anio_aunasalud_nogenerados").append(info);
  })

}


$(document).on('change', '#slt_anio_aunasalud_nogenerados', function() {

var slt_anio=$("#slt_anio_aunasalud_nogenerados").val();
var dataString = {"slt_anio":slt_anio}

$.ajax({
  type: 'POST',
  url:"controller_func/trama_aunasalud/combo_mes_comisiones_nogenerados.php",
  data: dataString
  }).done(function(info){
    $('#slt_mes_aunasalud_nogenerados').empty();
    $("#slt_mes_aunasalud_nogenerados").append(info);
  });
});



$(document).on('click', '.ventas-aunasalud', function() {
  var slt_anio=$("#slt_anio_aunasalud").val();
  var slt_mes=$("#slt_mes_aunasalud").val();
  var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes}

$.ajax({
      type: 'POST',
      url:"controller_func/trama_aunasalud/ventas.php",
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




  $(document).on('click', '.show-modal-comisiones-nivel-aunasalud', function() {
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var url = "controller_func/trama_aunasalud/showcomisionesxnivel.php?id="+id+"&anio="+anio+"&mes="+mes+"&ruc="+ruc;
    $.get(url, function (data) {
      $('.show-detallecomision').empty();
      $('.show-detallecomision').append(data);
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-newspaper'></i> Detalles de Comision - "+name+"/ RUC : "+ruc);
      $('#showModal').modal('show');
    });
  });


$(document).on('click', '.show-modal-venta-detalle-aunasalud', function() {
    var id = $(this).data('id');
    var anio = $(this).data('anio');
    var mes = $(this).data('mes');
    var name = $(this).data('name');
    var ruc = $(this).data('ruc');
    var url = "controller_func/trama_aunasalud/showventadetalle.php?id="+id+"&anio="+anio+"&mes="+mes+"&ruc="+ruc;
    $.get(url, function (data) {
      $('.formshow').empty();
      $('.formshow').append(data);
      $('.stitle_u').empty();
      $('.stitle_u').append("<i class='far fa-newspaper'></i> Detalle de venta de "+name+"/ RUC : "+ruc);
      $('#showModal').modal('show');
    });
  });

  


$(document).on('click', '.report-excel-comisiones-aunasalud', function() {
        var slt_anio=$("#slt_anio_aunasalud_generados").val();
        var slt_mes=$("#slt_mes_aunasalud_generados").val();
        if(slt_anio==0){
        toastr.error('Seleccione año para exportar datos');
        }else{
        window.location.href="controller_func/trama_aunasalud/exportarexcelcomisiones.php?slt_anio="+slt_anio+"&slt_mes="+slt_mes;
        }
  });

$(document).on('click', '.report-excel-ventas-aunasalud', function() {
        var slt_anio=$("#slt_anio_aunasalud").val();
        var slt_mes=$("#slt_mes_aunasalud").val();
        if(slt_anio==0){
        toastr.error('Seleccione año para exportar datos');
        }else{
        window.location.href="controller_func/trama_aunasalud/exportarexcelventas.php?slt_anio="+slt_anio+"&slt_mes="+slt_mes;
        }
  });

  

/**FIN AUNASALUD VENTAS */

/*Arbol Multinivel*/

$(document).on('click', '.arbol-virtual', function() {

  var sltruc_buscar=$("#sltruc_buscar").val();
  var txtruc_buscar=$("#txtruc_buscar").val();
  var dataString = {"sltruc_buscar":sltruc_buscar,"txtruc_buscar":txtruc_buscar}

 $.ajax({
      type: 'POST',
      url:"controller_func/multinivel/arbolvirtual.php",
      data: dataString,
      beforeSend:function(){
        cargar_data();
        },
      complete:function(){
        Swal.close();
        },
      }).done(function(info){
        $('.table-tree').empty();
        $(".table-tree").append(info);
      });
});


$(document).on('click', '.arbol-virtual_', function() {

  var sltruc_buscar=$("#sltruc_buscar").val();
  var txtruc_buscar=$("#txtruc_buscar").val();
  var hnombres=$("#hnombres").val();

  if(sltruc_buscar=="0" && txtruc_buscar==""){
    toastr.error('Seleccione un representante o escriba un RUC');
    return false;
  }else if(hnombres==""){
    toastr.error('Seleccione un representante o escriba un RUC');
    return false;
  }else{
    if(sltruc_buscar!="0"){
      txtruc_buscar=sltruc_buscar;
    }else{
      txtruc_buscar=txtruc_buscar;
    }
  var dataString = {"txtruc_buscar":txtruc_buscar}
  var webcallMeIcon = '<svg width="24" height="24"  id="Capa_1" enable-background="new 0 0 511.178 511.178" height="512" viewBox="0 0 511.178 511.178" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m473.26 143.801c43.414-55.435 8.633-143.801-57.714-143.801-66.361 0-101.305 88.645-57.48 144.098-19.43 2.717-34.436 19.437-34.436 39.604v58.942c-34.791-47.293-99.226-49.033-136.082-3.924v-55.018c0-20.181-15.026-36.909-34.475-39.609 43.687-55.285 9.158-144.093-57.484-144.093-66.056 0-101.272 88.187-57.712 143.804-20.795 1.4-37.288 18.754-37.288 39.898v85.979h78.479v200h72.398v41.497h205.204v-41.498h78.467v-200h75.451v-85.979c.001-21.157-16.514-38.519-37.328-39.9zm-12.033-70.155c-34.645 6.793-67.171-6.185-80.839-24.483 25.24-34.431 72.147-20.086 80.839 24.483zm-92.332 6.782c24.056 20.406 58.877 28.267 91.249 23.785-6.156 22.611-23.816 38.99-44.598 38.99-26.973.001-49.78-28.191-46.651-62.775zm-114.827 293.193c-27.624 0-50.912-21.841-57.616-51.358 41.01 6.76 86.84-3.184 116.103-30.427 7.111 42.861-21.542 81.785-58.487 81.785zm45.92-112.59c-17.958 25.238-61.592 39.766-104.363 30.529 9.633-56.807 72.34-75.277 104.363-30.529zm-204.399-117.827c-20.783 0-38.443-16.379-44.598-38.99 36.073 4.995 69.653-5.465 91.25-23.785 3.16 34.927-19.935 62.775-46.652 62.775zm35.159-94.042c-13.714 18.36-46.3 31.257-80.84 24.483 8.685-44.534 55.575-58.944 80.84-24.483zm-100.159 190.519v-55.979c0-5.514 4.486-10 10-10h106.959c5.514 0 10 4.486 10 10v55.979zm120.878 174.361v25.638h-42.398v-170h61.292c-12.128 35.058-5.387 76.042 19.9 104.393-21.499.642-38.794 18.318-38.794 39.969zm175.204 67.136h-145.204v-67.135c0-5.514 4.486-10 10-10h125.204c5.514 0 10 4.486 10 10zm78.467-41.498h-48.467v-25.638c0-21.651-17.295-39.328-38.793-39.969 25.289-28.353 32.027-69.337 19.9-104.392h67.36zm75.451-199.999h-126.959v-55.979c0-5.514 4.486-10 10-10h106.959c5.514 0 10 4.486 10 10z"/></svg>';

  
  var chart = new OrgChart(document.getElementById("tree"), {
            
               
                nodeBinding: {
                    field_0: "Nombres",
                    field_1: "RUC",
                    img_0: "img"

                },
                nodeMenu: {
                  call: {
                    icon: webcallMeIcon,
                    text: "Consultar Arbol",
                    onClick: callHandler
                }
              },
                scaleInitial: OrgChart.match.boundary                
            });
      $.get({url:"controller_func/solicitud_arbol_virtual/consultar_edit.php",data: dataString,type: 'POST'}).done(function (response) {
            var JSONObject = JSON.parse(response);
            console.log(JSONObject);
            

            for (var i = 0; i < JSONObject.length; i++) {
              var node = JSONObject[i];
              //console.log(node.Datos);
              switch (node.Datos) {
                  case "Pendiente":
                      node.tags = ["Pendiente"];
                      break;
              }
            }

            chart.load(JSONObject);
        });


      /*$.get({url:"bd.php"}).done(function (response) {
        var JSONObject = JSON.parse(response);
        console.log(JSONObject);
            chart.load(JSONObject);
        });*/

        function callHandler(nodeId) {
          var nodeData = chart.get(nodeId);
          var employeeName = nodeData["RUC"];
          switch (employeeName) {
            case "Pendiente":                
                toastr.error('Error : No hay un "RUC" en esta Posición');                
                break;
            default:
              consultar_arbol(employeeName);
                break;
          }
        }
  }

});


/**Edicion de Arbol Virtual*/

$(document).on('click', '.editar-arbol-virtual', function() {
 
  var txtruc_buscar=$("#txtruc_buscar").val();
  var dataString = {"txtruc_buscar":txtruc_buscar}; 

  $.get({url:"controller_func/solicitud_arbol_virtual/consultar_edit.php",data: dataString,type: 'POST'}).done(function (response) {

    var nodes = JSON.parse(response);
    OrgChart.templates.diva.field_number_children = '<circle cx="60" cy="80" r="15" fill="#F57C00"></circle><text fill="#ffffff" x="60" y="85" text-anchor="middle">{val}</text>';
    OrgChart.templates.diva.button = '<button id="undo">Deshacer</button>';
    OrgChart.slinkTemplates.blue.link = '<path class="path1"  stroke-dasharray="4, 2" marker-start="url(#dotSlinkBlue)" marker-end="url(#arrowSlinkBlue)" stroke-linejoin="round" stroke="#039BE5" stroke-width="2" fill="none" d="{d}" />';
    OrgChart.templates.diva.link = '<path stroke-linejoin="round" stroke="#28a745" stroke-width="10" fill="none" d="M{xa},{ya} {xb},{yb} {xc},{yc} L{xd},{yd}"/>' +
    '<path class="path" stroke-width="4" fill="none" stroke="#ffffff" stroke-dasharray="10"  d="M{xa},{ya} {xb},{yb} {xc},{yc} L{xd},{yd}"/>';
    var array = [];
    var movingNode = {};  

    //console.log(nodes);
    for (var i = 0; i < nodes.length; i++){
      var node = nodes[i];
      switch (node.id) {
          case "1":
              node.tags = ["Lider"];
              break;
          default:
              node.tags = ["Mired"];
              break;
          }
    }

    var iterate = function (c, n, args){
      args.count += n.childrenIds.length;
      for(var i = 0; i < n.childrenIds.length; i++){    
          var node = c.getNode(n.childrenIds[i]);
          iterate(c, node, args);  
      }
    }   
       
    var chart = new OrgChart(document.getElementById("tree"), {
      
      template: "diva",
      toolbar: {
        layout: true,
        zoom: true,
        fit: true,
        expandAll: false,
        fullScreen:true
      },
      menu: {
        JSONexport: {                
            text: 'Guardar Cambios',
            icon: '<img src="https://easypdf.com/images/easypdf-logo-256.png" height="15" width="20">',
            onClick:JSONexport
        },
        pdfPreview: { 
            text: "PDF Preview", 
            icon: OrgChart.icon.pdf(24,24, '#7A7A7A'),
            onClick: preview
        },
        export_pdf: {
          text: "Export PDF",
          icon: OrgChart.icon.pdf(24, 24, "#7A7A7A"),
          onClick: pdf_lider
        }        
        
      },
      layout: OrgChart.normal,        
      align: OrgChart.ORIENTATION,
      scaleInitial: OrgChart.match.boundary,
      enableDragDrop: true,                
      nodeBinding: {
          field_0: "Nombres",
          field_1: "RUC",
          img_0: "img",
          field_number_children:  function (sender, node) {	
            var args = {count: 0 };
          iterate(sender, node, args);
          return args.count + 1;
          }
        },
      nodeMenu: {
        remove: { text: "Eliminar Representante"},
        export_pdf: {
          text: "Export PDF",
          icon: OrgChart.icon.pdf(24, 24, "#7A7A7A"),
          onClick: pdf_redes
        }         
      },
      nodes: nodes,
      slinks: [{from: 0, to: 1, template: 'blue'}, {from: 5, to: 7, template: 'blue'}]      
    });


    

    chart.on('exportstart', function(sender, args){         
      args.styles += '<link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">';
      args.styles += document.getElementById('myStyles').outerHTML;
    });
    
    chart.on('remove', function (sender, nodeId, newPidsAndStpidsForIds) {
      // your code goes here 
      // return false; to cancel the operation;
      var nodeData = chart.get(nodeId);
      
      var RUC = nodeData["RUC"];
      var Nombres = nodeData["Nombres"];
      var Posicion = nodeData["Posicion"];
      var pat = nodeData["pid"];
      console.log(nodeData);
      if(sender.nodes[nodeId]["children"].length>=2){
        toastr.error(Nombres+' tiene una red mayor a 2, elimine o mueva sus otros referidos ');
        return false;
      }else{
         delete_ruc_arbol_virtual(Nombres,RUC,Posicion,pat);        
          return true;        
      }
    
    }); 

    /**Esto elimina el texto de  field_number_children*/
    chart.editUI.on('field', function(sender, args){
      if (String(args.name).includes('args.count + 1')){
                  return false;
      }
    });

    chart.on('drag', function (sender, draggedNodeId) {                      
      var node = chart.get(draggedNodeId);
      draggedNodePid = node.pid;
      draggedNombres = node.Nombres;
      draggedRUC = node.RUC;
      draggedCorreo = node.Correo;
      draggedCelular = node.Celular;
      draggedPosicion = node.Posicion;
      draggedCategoria = node.Categoria;
      draggedimg = node.img;
      draggedtags = node.tags;
      
      movingNode = {draggedNodeId, draggedNodePid, draggedNombres, draggedRUC, draggedCorreo, draggedCelular, draggedPosicion, draggedCategoria, draggedimg, draggedtags};
    });

    chart.on('drop', function (sender, draggedNodeId, droppedNodeId) {  
      var node = chart.get(droppedNodeId);
      if(node.Categoria!="Diamante" && sender.nodes[droppedNodeId]["children"].length<=1){
        array.push(movingNode);
      }else if(node.Categoria=="Diamante" && sender.nodes[droppedNodeId]["children"].length<=2){
        array.push(movingNode);
      }else{
        toastr.error('Representante es '+node.Categoria+', y tiene sus '+sender.nodes[droppedNodeId]["children"].length+' afiliados, mueva sus afiliados o proceda a eliminar');
        return false;
      }     
      //console.log(sender);
    });

    function JSONexport(){      
      //console.log(JSON.stringify(chart.config.nodes));
      save_arbol_edit(chart.config.nodes);
      
    }

    function pdf_redes(nodeId) {
      var hoy = new Date();
      var fecha = hoy.getDate() + '' + ( hoy.getMonth() + 1 ) + '' + hoy.getFullYear();
      var hora = hoy.getHours() + '_' + hoy.getMinutes() + '_' + hoy.getSeconds();
      var nodeData = chart.get(nodeId);
      var Nombres = nodeData["Nombres"];
      var filename='Red-'+Nombres+'_'+fecha+'_'+hora+'.pdf';
      chart.exportPDF({
        format:'fit',
        header:'<img  src="https://prolife.pe/logo/logo.png" width="150px" height="100px" />',
        footer:'Pagina {current-page} de {total-pages}',
        filename:filename, 
        margin:[90, 20, 60, 20],
        expandChildren: true,
        nodeId: nodeId
      });
    }

    function pdf_lider() {
      var hoy = new Date();
      var fecha = hoy.getDate() + '' + ( hoy.getMonth() + 1 ) + '' + hoy.getFullYear();
      var hora = hoy.getHours() + '_' + hoy.getMinutes() + '_' + hoy.getSeconds();
      
      console.log(nodes[0]["Nombres"]);
      var filename='Red-'+nodes[0]["Nombres"]+'_'+fecha+'_'+hora+'.pdf';
      chart.exportPDF({
        format:'fit',
        header:'<img  src="https://prolife.pe/logo/logo.png" width="150px" height="100px" />',
        footer:'Pagina {current-page} de {total-pages}',
        filename:filename, 
        margin:[90, 20, 60, 20],
        expandChildren: true
      });
    }

    function preview(){
      var hoy = new Date();
      var fecha = hoy.getDate() + '' + ( hoy.getMonth() + 1 ) + '' + hoy.getFullYear();
      var hora = hoy.getHours() + '_' + hoy.getMinutes() + '_' + hoy.getSeconds();
      var filename='Red-'+nodes[0]["Nombres"]+'_'+fecha+'_'+hora+'.pdf';         

      OrgChart.pdfPrevUI.show(chart, {
          format: 'A4',
          header: '<img  src="https://prolife.pe/logo/logo.png" width="150px" height="100px" />',
          margin: [90, 20, 60, 20],
          footer: 'Pagina {current-page} de {total-pages}',
          expandChildren: true,
          filename:filename
      });
    }
    
    
    var title = document.createElement("Button");
    //title.appendTo='#undo';      
    title.setAttribute("id", "undo");     
    title.style.position = 'absolute';
    title.style.top = '95.1%';
    title.style.right = '1%';
    title.style.width = '6%';
    title.style.height = '5%';
    title.style.textAlign = 'center';
    title.style.color = '#757575';
    title.innerHTML = 'Deshacer';          
    chart.element.appendChild(title);
              
    /**Deshacer Cambios */
    document.querySelector('#undo').addEventListener('click', function(){
      if (array.length > 0) {
        var undoNode = array.pop();
        //console.log(undoNode);
        var id = undoNode.draggedNodeId;
        var pid = undoNode.draggedNodePid;
        var Nombres = undoNode.draggedNombres;
        var RUC = undoNode.draggedRUC;
        var Correo = undoNode.draggedCorreo;
        var Celular = undoNode.draggedCelular;
        var Posicion = undoNode.draggedPosicion;
        var Categoria = undoNode.draggedCategoria;
        var img = undoNode.draggedimg;
        var tags = undoNode.draggedtags;
        chart.updateNode({id, pid, Nombres, RUC, Correo, Celular, Posicion, Categoria, img, tags});
        }
    });   
    
  });   

});


/**Lista Eliminados Solicitud arbol virtual  */
function delete_ruc_arbol_virtual(Nombres,ruc,posicion,pat){
  var ruc=ruc;
  var posicion=posicion;
  var Nombres=Nombres;
  var pat=pat;  
  var txtruc_buscar=$("#txtruc_buscar").val();
  var txtnrosoli=$("#txtnrosoli").val();  
  var dataString = {"usuario":ruc,
                    "patrocinador":pat,
                    "posicion":posicion,
                    "nrosolicitud":txtnrosoli,
                    "txtruc_buscar":txtruc_buscar}

 $.ajax({
      type: 'POST',
      url:"controller_func/solicitud_arbol_virtual/delete_ruc.php",
      data: dataString
      }).done(function(info){
        if(info.trim()=="true"){
          list_eliminados();          
          toastr.success('Se elimino a '+ Nombres +' de  Ruc '+ ruc);          
        }else if(info.trim()=="auto"){     
          toastr.error('Accion no validada, comuniquese con el soporte Prolife');  
        }else{
          toastr.error('Error comuniquese con el soporte Prolife');
        }
      });
    
}

/**Lista Eliminados Solicitud arbol virtual  */
function list_eliminados(){
  var txtruc_buscar=$("#txtruc_buscar").val();
  var txtnrosoli=$("#txtnrosoli").val();  
  var dataString = {"txtruc_buscar":txtruc_buscar,"txtnrosoli":txtnrosoli}

 $.ajax({
      type: 'POST',
      url:"controller_func/solicitud_arbol_virtual/list_eliminados.php",
      data: dataString
      }).done(function(info){
        $('.tbody_list_elim').empty();
        $(".tbody_list_elim").append(info);
      });
}

/**Sabe Arbol Edit */
function save_arbol_edit(datos_json){
  var txtruc_buscar=$("#txtruc_buscar").val();
  var txtnrosoli=$("#txtnrosoli").val();  
 $.ajax({
  type: 'POST',
  dataType: 'json',
  url:"controller_func/solicitud_arbol_virtual/save.php",
  data:{'datos':JSON.stringify(datos_json),"txtruc_buscar":txtruc_buscar,"txtnrosoli":txtnrosoli},
  beforeSend:function(){
    cargar_data();
    },
  complete:function(){
    Swal.close();
    },
  }).done(function(info){
    //console.log(info)
    if(info==true){           
      toastr.success('Se envio la solicitud correctamente, los datos saran a validación');
      window.location.replace('solicitudes-arbol-virtual-administrativos.php');      
    }else{
      toastr.error('Error comuniquese con el soporte Prolife');
    }
  });
}

/**Lista solitudes  arbol virtual Adminiatrativos */
function list_solicitudes_arbolvirtual_admin(){
  $.ajax({
      type: 'POST',
      url:"controller_func/solicitud_arbol_virtual/list_administrativos.php"
      }).done(function(info){
        $('.tbody_list').empty();
        $(".tbody_list").append(info);
      });
}

function list_solicitudes_arbolvirtual_repre(){
  $.ajax({
    type: 'POST',
    url:"controller_func/solicitud_arbol_virtual/list_representantes.php"
    }).done(function(info){
      $('.tbody_list').empty();
      $(".tbody_list").append(info);
    });
}


function consultar_arbol(ruc){

  var sltruc_buscar=ruc;
  var txtruc_buscar=ruc;
  var dataString = {"sltruc_buscar":ruc,"txtruc_buscar":ruc}
  var webcallMeIcon = '<svg width="24" height="24" viewBox="0 0 300 400" id="Capa_1" enable-background="new 0 0 511.178 511.178" height="512" viewBox="0 0 511.178 511.178" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m473.26 143.801c43.414-55.435 8.633-143.801-57.714-143.801-66.361 0-101.305 88.645-57.48 144.098-19.43 2.717-34.436 19.437-34.436 39.604v58.942c-34.791-47.293-99.226-49.033-136.082-3.924v-55.018c0-20.181-15.026-36.909-34.475-39.609 43.687-55.285 9.158-144.093-57.484-144.093-66.056 0-101.272 88.187-57.712 143.804-20.795 1.4-37.288 18.754-37.288 39.898v85.979h78.479v200h72.398v41.497h205.204v-41.498h78.467v-200h75.451v-85.979c.001-21.157-16.514-38.519-37.328-39.9zm-12.033-70.155c-34.645 6.793-67.171-6.185-80.839-24.483 25.24-34.431 72.147-20.086 80.839 24.483zm-92.332 6.782c24.056 20.406 58.877 28.267 91.249 23.785-6.156 22.611-23.816 38.99-44.598 38.99-26.973.001-49.78-28.191-46.651-62.775zm-114.827 293.193c-27.624 0-50.912-21.841-57.616-51.358 41.01 6.76 86.84-3.184 116.103-30.427 7.111 42.861-21.542 81.785-58.487 81.785zm45.92-112.59c-17.958 25.238-61.592 39.766-104.363 30.529 9.633-56.807 72.34-75.277 104.363-30.529zm-204.399-117.827c-20.783 0-38.443-16.379-44.598-38.99 36.073 4.995 69.653-5.465 91.25-23.785 3.16 34.927-19.935 62.775-46.652 62.775zm35.159-94.042c-13.714 18.36-46.3 31.257-80.84 24.483 8.685-44.534 55.575-58.944 80.84-24.483zm-100.159 190.519v-55.979c0-5.514 4.486-10 10-10h106.959c5.514 0 10 4.486 10 10v55.979zm120.878 174.361v25.638h-42.398v-170h61.292c-12.128 35.058-5.387 76.042 19.9 104.393-21.499.642-38.794 18.318-38.794 39.969zm175.204 67.136h-145.204v-67.135c0-5.514 4.486-10 10-10h125.204c5.514 0 10 4.486 10 10zm78.467-41.498h-48.467v-25.638c0-21.651-17.295-39.328-38.793-39.969 25.289-28.353 32.027-69.337 19.9-104.392h67.36zm75.451-199.999h-126.959v-55.979c0-5.514 4.486-10 10-10h106.959c5.514 0 10 4.486 10 10z"/></svg>';

  

  $('.backarbol').prop('disabled', false);

          var chart = new OrgChart(document.getElementById("tree"), {
            
               
                nodeBinding: {
                    field_0: "Datos",
                    field_1: "RUC",
                    img_0: "img"

                },
                nodeMenu: {
                  call: {
                    icon: webcallMeIcon,
                    text: "Consultar Arbol",
                    onClick: callHandler
                }
              },
                scaleInitial: OrgChart.match.boundary
                
            });
      $.get({url:"controller_func/multinivel/arbolvirtual_.php",data: dataString,type: 'POST'}).done(function (response) {
            var JSONObject = JSON.parse(response);
            console.log(JSONObject);
            

            for (var i = 0; i < JSONObject.length; i++) {
              var node = JSONObject[i];
              console.log(node.Datos);
              switch (node.Datos) {
                  case "Pendiente":
                      node.tags = ["Pendiente"];
                      break;
              }
            }

            chart.load(JSONObject);
        });


      /*$.get({url:"bd.php"}).done(function (response) {
        var JSONObject = JSON.parse(response);
        console.log(JSONObject);
            chart.load(JSONObject);
        });*/

        function callHandler(nodeId) {
          var nodeData = chart.get(nodeId);
          var employeeName = nodeData["RUC"];
          switch (employeeName) {
            case "Pendiente":                
                toastr.error('Error : No hay un "RUC" en esta Posición');                
                break;
            default:
                consultar_arbol(employeeName);
                break;
          }
        }


          
}





/*Consultar arbol al hacer click*/

$(document).on('click', '.consultar-arbol', function() {
  var sltruc_buscar = $(this).data('id');
  var txtruc_buscar = $(this).data('id');
  var dataString = {"sltruc_buscar":sltruc_buscar,"txtruc_buscar":txtruc_buscar}
 $.ajax({
      type: 'POST',
      url:"controller_func/multinivel/arbolvirtual.php",
      data: dataString,
      beforeSend:function(){
        cargar_data();
        },
      complete:function(){
        Swal.close();
        },
      }).done(function(info){
        $('.table-tree').empty();
        $(".table-tree").append(info);
      });
});

//Cargar afiliados de representantes
function miarbol_virtual(){
 $.ajax({
      url:"controller_func/multinivel/miarbolvirtual.php",
      beforeSend:function(){
        cargar_data();
        },
      complete:function(){
        Swal.close();
        },
      }).done(function(info){
        $('.table-tree').empty();
        $(".table-tree").append(info);
      });
}

$(document).on('click','#load-table-tree',function(){
  miarbol_virtual3();
});

$(document).on('click','#load-table-tree-lideres',function(){
  miarbol_virtual_lideres();
});

//Consultar Multinivel reestructurar
$(document).on('click', '.consultar-multinivel-reestructurar', function() {

  var sltruc_buscar=$("#sltruc_buscar").val();
  var txtruc_buscar=$("#txtruc_buscar").val();
  var dataString = {"sltruc_buscar":sltruc_buscar,"txtruc_buscar":txtruc_buscar}

 $.ajax({
      type: 'POST',
      url:"controller_func/multinivel/reestructurar_red.php",
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

//Eliminar Representante Reestructurar
$(document).on('click', '#delete-representante', function() {
  var id = $(this).data('id');
  var content = $(this).data('content');
  var url = "controller_func/representante/accion.php?id="+id+"&es=3&content="+content;
  $.get(url, function (data) {
    $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
    $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
    $('.itemrow_jbtn'+id).attr('id','activate-representante');
    $('.itemrow_jbtn'+id).attr('class','btn btn-success disabled btn-sm itemrow_jbtn'+id);
    $('.itemrow_jbtn'+id).attr('title', 'Activar');

  });
});

//Lista de Backups redes
function list_backups_redes(){
  $.ajax({
  url:"controller_func/backups_redes/list.php"
  }).done(function(info){
    $('.tbody_list').empty();
    $(".tbody_list").append(info);
  })

}

/*Generate  backups de redes */
$(document).on('click', '.generate-backups-redes', function() {
            $.ajax({
            url:"controller_func/backups_redes/generate.php"
            }).done(function(info){
              switch (info) {
                case "generate_true":
                    toastr.success('Se genero el backup correctamente');
                    list_backups_redes();
                    break;
                default:
                    toastr.success('Error 505');
                    break;
              }
            })
  });

 /*Restaurar red */
$(document).on('click', '.restaurar-backups-redes', function() {

  var nrosolicitud = $(this).data('id');
  var dataString = {"nrosolicitud":nrosolicitud};
  $.ajax({
  type: 'POST',
  url:"controller_func/backups_redes/restaurar_redes.php",
  data: dataString
  }).done(function(info){
    switch (info) {
      case "generate_true":
          toastr.success('Se restauro la red correctamente');
          break;
      default:
          toastr.success('Error 505');
          break;
    }
  })
});



//Lista de Categorias Representantes
function list_gencatrep(){
  $.ajax({
  url:"controller_func/representante_nivel_categoria/list.php",
  beforeSend:function(){
    cargar_data();
    },
  complete:function(){
    Swal.close();
    },
  }).done(function(info){
    $('.tbody_list').empty();
    $(".tbody_list").append(info);
  })

}



  /*Generate  backups de redes */
$(document).on('click', '.generate-cat-rep', function() {
  $.ajax({
  url:"controller_func/representante_nivel_categoria/accion.php",
  beforeSend:function(){
    cargar_data();
    },
  complete:function(){
    Swal.close();
    },
  }).done(function(info){
    switch (info) {
      case "generate_true":
          toastr.success('Se genero la categorización correctamente');
          list_gencatrep();
          break;
      default:
          toastr.success('Error 505');
          break;
    }
  })
});

$(document).on('click', '.show-modal-detalles-repnivcat', function() {
    var id = $(this).data('id');
    var url = "controller_func/representante_nivel_categoria/show.php?id="+id;
    $.get(url, function (data) {
      $('.show-rep-niv-cat').empty();
      $('.show-rep-niv-cat').append(data);
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-newspaper'></i> Detalles");
      $('#showModal').modal('show');
    });
  });


  $(document).on('click', '.aplicar-cat-rep', function() {
  
  var nro_doc_generado=$("#btn_nro_doc_generado").val();
  var dataString = {"nro_doc_generado":nro_doc_generado}
   $.ajax({
        type: 'POST',
        url:"controller_func/representante_nivel_categoria/aplicarcategoria.php",
        data: dataString,
        beforeSend:function(){
          cargar_data();
          },
        complete:function(){
          Swal.close();
          },
        }).done(function(info){
          switch (info) {
            case "true":
                toastr.success('Se aplico la categorización correctamente');
                break;
            default:
                toastr.error('Error 505');
                break;
          }
        });
  });

  $(document).on('keyup mouseleave','.backarbol',function(){
    var ruc=$("#hdnruc").val();
    if(ruc=="0"){
      $('.backarbol').prop('disabled', true);
    }
  });

  $(document).on('click','.backarbol',function(){
    var ruc=$("#hdnruc").val();
    consultar_arbol(ruc);
    $("#hdnruc").val("0");
  });


  //Cargar afiliados de representantes
function miarbol_virtual3(){
 
  var sltruc_buscar=$("#sltruc_buscar").val();
  var txtruc_buscar=$("#txtruc_buscar").val();
  var dataString = {"sltruc_buscar":sltruc_buscar,"txtruc_buscar":txtruc_buscar}
  //var webcallMeIcon = '<svg width="24" height="24"  id="Capa_1" enable-background="new 0 0 511.178 511.178" height="512" viewBox="0 0 511.178 511.178" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m473.26 143.801c43.414-55.435 8.633-143.801-57.714-143.801-66.361 0-101.305 88.645-57.48 144.098-19.43 2.717-34.436 19.437-34.436 39.604v58.942c-34.791-47.293-99.226-49.033-136.082-3.924v-55.018c0-20.181-15.026-36.909-34.475-39.609 43.687-55.285 9.158-144.093-57.484-144.093-66.056 0-101.272 88.187-57.712 143.804-20.795 1.4-37.288 18.754-37.288 39.898v85.979h78.479v200h72.398v41.497h205.204v-41.498h78.467v-200h75.451v-85.979c.001-21.157-16.514-38.519-37.328-39.9zm-12.033-70.155c-34.645 6.793-67.171-6.185-80.839-24.483 25.24-34.431 72.147-20.086 80.839 24.483zm-92.332 6.782c24.056 20.406 58.877 28.267 91.249 23.785-6.156 22.611-23.816 38.99-44.598 38.99-26.973.001-49.78-28.191-46.651-62.775zm-114.827 293.193c-27.624 0-50.912-21.841-57.616-51.358 41.01 6.76 86.84-3.184 116.103-30.427 7.111 42.861-21.542 81.785-58.487 81.785zm45.92-112.59c-17.958 25.238-61.592 39.766-104.363 30.529 9.633-56.807 72.34-75.277 104.363-30.529zm-204.399-117.827c-20.783 0-38.443-16.379-44.598-38.99 36.073 4.995 69.653-5.465 91.25-23.785 3.16 34.927-19.935 62.775-46.652 62.775zm35.159-94.042c-13.714 18.36-46.3 31.257-80.84 24.483 8.685-44.534 55.575-58.944 80.84-24.483zm-100.159 190.519v-55.979c0-5.514 4.486-10 10-10h106.959c5.514 0 10 4.486 10 10v55.979zm120.878 174.361v25.638h-42.398v-170h61.292c-12.128 35.058-5.387 76.042 19.9 104.393-21.499.642-38.794 18.318-38.794 39.969zm175.204 67.136h-145.204v-67.135c0-5.514 4.486-10 10-10h125.204c5.514 0 10 4.486 10 10zm78.467-41.498h-48.467v-25.638c0-21.651-17.295-39.328-38.793-39.969 25.289-28.353 32.027-69.337 19.9-104.392h67.36zm75.451-199.999h-126.959v-55.979c0-5.514 4.486-10 10-10h106.959c5.514 0 10 4.486 10 10z"/></svg>';

 
  var chart = new OrgChart(document.getElementById("tree"), {
            
               
                nodeBinding: {
                    field_0: "Nombres",
                    field_1: "RUC",
                    img_0: "img"

                },
                scaleInitial: OrgChart.match.boundary                
            });
      $.get({url:"controller_func/solicitud_arbol_virtual/consultar_edit.php",data: dataString,type: 'POST'}).done(function (response) {
            var JSONObject = JSON.parse(response);
            //console.log(JSONObject);
            

            for (var i = 0; i < JSONObject.length; i++) {
              var node = JSONObject[i];
              console.log(node.Datos);
              switch (node.Datos) {
                  case "Pendiente":
                      node.tags = ["Pendiente"];
                      break;
              }
            }

            chart.load(JSONObject);
        });


      /*$.get({url:"bd.php"}).done(function (response) {
        var JSONObject = JSON.parse(response);
        console.log(JSONObject);
            chart.load(JSONObject);
        });*/

        /*function callHandler(nodeId) {
          var nodeData = chart.get(nodeId);
          var employeeName = nodeData["RUC"];
          switch (employeeName) {
            case "Pendiente":                
                toastr.error('Error : No hay un "RUC" en esta Posición');                
                break;
            default:
              consultar_arbol(employeeName);
                break;
          }
        }*/





 }


   //Cargar afiliados de representantes
function miarbol_virtual_lideres(){
 
  var sltruc_buscar=$("#sltruc_buscar").val();
  var txtruc_buscar=$("#txtruc_buscar").val();
  var dataString = {"sltruc_buscar":sltruc_buscar,"txtruc_buscar":txtruc_buscar}
  var webcallMeIcon = '<svg width="24" height="24"  id="Capa_1" enable-background="new 0 0 511.178 511.178" height="512" viewBox="0 0 511.178 511.178" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m473.26 143.801c43.414-55.435 8.633-143.801-57.714-143.801-66.361 0-101.305 88.645-57.48 144.098-19.43 2.717-34.436 19.437-34.436 39.604v58.942c-34.791-47.293-99.226-49.033-136.082-3.924v-55.018c0-20.181-15.026-36.909-34.475-39.609 43.687-55.285 9.158-144.093-57.484-144.093-66.056 0-101.272 88.187-57.712 143.804-20.795 1.4-37.288 18.754-37.288 39.898v85.979h78.479v200h72.398v41.497h205.204v-41.498h78.467v-200h75.451v-85.979c.001-21.157-16.514-38.519-37.328-39.9zm-12.033-70.155c-34.645 6.793-67.171-6.185-80.839-24.483 25.24-34.431 72.147-20.086 80.839 24.483zm-92.332 6.782c24.056 20.406 58.877 28.267 91.249 23.785-6.156 22.611-23.816 38.99-44.598 38.99-26.973.001-49.78-28.191-46.651-62.775zm-114.827 293.193c-27.624 0-50.912-21.841-57.616-51.358 41.01 6.76 86.84-3.184 116.103-30.427 7.111 42.861-21.542 81.785-58.487 81.785zm45.92-112.59c-17.958 25.238-61.592 39.766-104.363 30.529 9.633-56.807 72.34-75.277 104.363-30.529zm-204.399-117.827c-20.783 0-38.443-16.379-44.598-38.99 36.073 4.995 69.653-5.465 91.25-23.785 3.16 34.927-19.935 62.775-46.652 62.775zm35.159-94.042c-13.714 18.36-46.3 31.257-80.84 24.483 8.685-44.534 55.575-58.944 80.84-24.483zm-100.159 190.519v-55.979c0-5.514 4.486-10 10-10h106.959c5.514 0 10 4.486 10 10v55.979zm120.878 174.361v25.638h-42.398v-170h61.292c-12.128 35.058-5.387 76.042 19.9 104.393-21.499.642-38.794 18.318-38.794 39.969zm175.204 67.136h-145.204v-67.135c0-5.514 4.486-10 10-10h125.204c5.514 0 10 4.486 10 10zm78.467-41.498h-48.467v-25.638c0-21.651-17.295-39.328-38.793-39.969 25.289-28.353 32.027-69.337 19.9-104.392h67.36zm75.451-199.999h-126.959v-55.979c0-5.514 4.486-10 10-10h106.959c5.514 0 10 4.486 10 10z"/></svg>';

  
 

  var chart = new OrgChart(document.getElementById("tree"), {
            
               
                nodeBinding: {
                    field_0: "Nombres",
                    field_1: "RUC",
                    img_0: "img"

                },
                nodeMenu: {
                  call: {
                    icon: webcallMeIcon,
                    text: "Consultar Arbol",
                    onClick: callHandler
                }
              },
                scaleInitial: OrgChart.match.boundary                
            });
      $.get({url:"controller_func/solicitud_arbol_virtual/consultar_edit.php",data: dataString,type: 'POST'}).done(function (response) {
            var JSONObject = JSON.parse(response);
            //console.log(JSONObject);
            

            for (var i = 0; i < JSONObject.length; i++) {
              var node = JSONObject[i];
              console.log(node.Datos);
              switch (node.Datos) {
                  case "Pendiente":
                      node.tags = ["Pendiente"];
                      break;
              }
            }

            chart.load(JSONObject);
        });


      /*$.get({url:"bd.php"}).done(function (response) {
        var JSONObject = JSON.parse(response);
        console.log(JSONObject);
            chart.load(JSONObject);
        });*/

        function callHandler(nodeId) {
          var nodeData = chart.get(nodeId);
          var employeeName = nodeData["RUC"];
          switch (employeeName) {
            case "Pendiente":                
                toastr.error('Error : No hay un "RUC" en esta Posición');                
                break;
            default:
              consultar_arbol(employeeName);
                break;
          }
        }

 }

 /**Inicio - cargar ventas Oncosalud */
 let peticion = new XMLHttpRequest();
/**Oncosalud */
 $(document).on('click', '.show-modal-cargar-ventas-oncosalud', function() {
  var url = "controller_func/trama_oncosalud/form_cargar_ventas.php";
  $.get(url, function (data) {
    $('#form_cargar_ventas').empty();
    $('#form_cargar_ventas').append(data);
    $('#modal-cargar-ventas').modal('show');
  });
});

/**AunaSalud */

$(document).on('click', '.show-modal-cargar-ventas-aunasalud', function() {
  var url = "controller_func/trama_aunasalud/form_cargar_ventas.php";
  $.get(url, function (data) {
    $('#form_cargar_ventas').empty();
    $('#form_cargar_ventas').append(data);
    $('#modal-cargar-ventas').modal('show');
  });
});


/**A365 */

$(document).on('click', '.show-modal-cargar-ventas-a365', function() {
  var url = "controller_func/trama_a365/form_cargar_ventas.php";
  $.get(url, function (data) {
    $('#form_cargar_ventas').empty();
    $('#form_cargar_ventas').append(data);
    $('#modal-cargar-ventas').modal('show');
  });
});



/*Oncosalud guardar archivo*/
$(document).on('click', '.btn-cargar-ventas-oncosalud', function() {
  var paqueteDeDatos = new FormData();
  var fecha_ini=$('#rango_fecha').data('daterangepicker').startDate.format('YYYY-MM-DD');
  var fecha_fin=$('#rango_fecha').data('daterangepicker').endDate.format('YYYY-MM-DD');

  var file_=paqueteDeDatos.append('archivo', $('#archivo_subir')[0].files[0]);
  var archivo = document.forms['form_cargar_ventas']['archivo_subir'].files[0];
  paqueteDeDatos.append('txtobser', $('#txtobser').val());
  paqueteDeDatos.append('fecha_ini', fecha_ini);
  paqueteDeDatos.append('fecha_fin', fecha_fin);
  
  if(fecha_ini.trim()==fecha_fin.trim()){
    $('#span_rango_fecha').attr('class','input-group-text text-danger');
    $('.msj_rango_fecha').empty();
    $('.msj_rango_fecha').append("-  seleccione un rango de fechas");
    window.setTimeout(function() { $('.msj_rango_fecha').html("");$('#span_rango_fecha').attr('class','input-group-text text-info');}, 3000);
  }else if(archivo=="undefined" || archivo=="" || archivo==undefined){
    $('#span_subir_archivo').attr('class','input-group-text text-danger');
    $('.msj_archivo_subir').empty();
    $('.msj_archivo_subir').append("-  seleccione un archivo Excel de ventas");
    window.setTimeout(function() { $('.msj_archivo_subir').html("");$('#span_subir_archivo').attr('class','input-group-text text-success');}, 3000);
    $("#barra_estado").removeClass("bg-danger");
    $("#barra_estado").removeClass("bg-success");
    $("#barra_estado").width('0%');
    $("#span_barra").html('0%');      
  }else{
     
      $("#barra_estado").removeClass("bg-danger");
      $("#barra_estado").removeClass("bg-success");
      
        peticion.upload.addEventListener("progress", (event) => {
        let porcentaje = Math.round((event.loaded / event.total) * 100);
        
      
        $("#barra_estado").width(porcentaje+'%');
        $("#span_barra").html(porcentaje+'%');
      });
      
        peticion.addEventListener("load", () => {

          $("#barra_estado").addClass("bg-success");
          $("#span_barra").html("Proceso Completado");
      
        });
        //Enviamos los datos
        peticion.open('post', 'controller_func/trama_oncosalud/cargar_importar_ventas.php');
        peticion.send(paqueteDeDatos);
        //console.log(peticion.response);
        peticion.onloadend = function () {
          console.log(peticion.responseText);
          $datos=peticion.responseText;
          if(peticion.responseText=="true"){
            $('#form_cargar_ventas').empty();
            $('#modal-cargar-ventas').modal('hide');
            toastr.success('Se realizo la carga e importaron de ventas correctamente');
          }else{

            peticion.abort();
            $('#form_cargar_ventas').empty();
            $('#modal-cargar-ventas').modal('hide');
            $('#form_errores').empty();
            $('#form_errores').append($datos);
            $('#modal-errores').modal('show');

          }
          
        }       
  }

 });

/**Oncosalud cancelar archivo */

 $(document).on('click', '.cancel-cargaeimportacion-ventas-oncosalud', function() {
  peticion.abort();
  
  $("#form_cargar_ventas")[0].reset();
  $("#label_subir_archivo").html("Subir Archivo");

  $("#span_barra").html("...0%");
  $("#barra_estado").css("width", "0%");

  $('#rango_fecha').daterangepicker(

    {
       maxDate: moment().add(1, 'month'),
       minDate: moment().startOf('month'),
       changeMonth: false,
       changeYear: false,
       stepMonths: 0,
       autoUpdateInput: false,
       autoApply: true,
       
    },
   
   );

   $('#rango_fecha').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' al ' + picker.endDate.format('DD/MM/YYYY'));
  });

});


/*aunasalud guardar archivo*/
$(document).on('click', '.btn-cargar-ventas-aunasalud', function() {
  var paqueteDeDatos = new FormData();
  var fecha_ini=$('#rango_fecha').data('daterangepicker').startDate.format('YYYY-MM-DD');
  var fecha_fin=$('#rango_fecha').data('daterangepicker').endDate.format('YYYY-MM-DD');

  var file_=paqueteDeDatos.append('archivo', $('#archivo_subir')[0].files[0]);
  var archivo = document.forms['form_cargar_ventas']['archivo_subir'].files[0];
  paqueteDeDatos.append('txtobser', $('#txtobser').val());
  paqueteDeDatos.append('fecha_ini', fecha_ini);
  paqueteDeDatos.append('fecha_fin', fecha_fin);
  
  if(fecha_ini.trim()==fecha_fin.trim()){
    $('#span_rango_fecha').attr('class','input-group-text text-danger');
    $('.msj_rango_fecha').empty();
    $('.msj_rango_fecha').append("-  seleccione un rango de fechas");
    window.setTimeout(function() { $('.msj_rango_fecha').html("");$('#span_rango_fecha').attr('class','input-group-text text-info');}, 3000);
  }else if(archivo=="undefined" || archivo=="" || archivo==undefined){
    $('#span_subir_archivo').attr('class','input-group-text text-danger');
    $('.msj_archivo_subir').empty();
    $('.msj_archivo_subir').append("-  seleccione un archivo Excel de ventas");
    window.setTimeout(function() { $('.msj_archivo_subir').html("");$('#span_subir_archivo').attr('class','input-group-text text-success');}, 3000);
    $("#barra_estado").removeClass("bg-danger");
    $("#barra_estado").removeClass("bg-success");
    $("#barra_estado").width('0%');
    $("#span_barra").html('0%');      
  }else{
     
      $("#barra_estado").removeClass("bg-danger");
      $("#barra_estado").removeClass("bg-success");
      
        peticion.upload.addEventListener("progress", (event) => {
        let porcentaje = Math.round((event.loaded / event.total) * 100);
        
      
        $("#barra_estado").width(porcentaje+'%');
        $("#span_barra").html(porcentaje+'%');
      });
      
        peticion.addEventListener("load", () => {

          $("#barra_estado").addClass("bg-success");
          $("#span_barra").html("Proceso Completado");
      
        });
        //Enviamos los datos
        peticion.open('post', 'controller_func/trama_aunasalud/cargar_importar_ventas.php');
        peticion.send(paqueteDeDatos);
        //console.log(peticion.response);
        peticion.onloadend = function () {
          console.log(peticion.responseText);
          $datos=peticion.responseText;
          if(peticion.responseText=="true"){
            $('#form_cargar_ventas').empty();
            $('#modal-cargar-ventas').modal('hide');
            toastr.success('Se realizo la carga e importaron de ventas correctamente');
          }else{

            peticion.abort();
            $('#form_cargar_ventas').empty();
            $('#modal-cargar-ventas').modal('hide');
            $('#form_errores').empty();
            $('#form_errores').append($datos);
            $('#modal-errores').modal('show');

          }
          
        }       
  }

 });

/**aunasalud cancelar archivo */

 $(document).on('click', '.cancel-cargaeimportacion-ventas-aunasalud', function() {
  peticion.abort();
  
  $("#form_cargar_ventas")[0].reset();
  $("#label_subir_archivo").html("Subir Archivo");

  $("#span_barra").html("...0%");
  $("#barra_estado").css("width", "0%");

  $('#rango_fecha').daterangepicker(

    {
       maxDate: moment().add(1, 'month'),
       minDate: moment().startOf('month'),
       changeMonth: false,
       changeYear: false,
       stepMonths: 0,
       autoUpdateInput: false,
       autoApply: true,
       
    },
   
   );

   $('#rango_fecha').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' al ' + picker.endDate.format('DD/MM/YYYY'));
  });

});


/*a365 guardar archivo*/
$(document).on('click', '.btn-cargar-ventas-a365', function() {
  var paqueteDeDatos = new FormData();
  var sltanio=$('#sltanio').val();
  var sltmes=$('#sltmes').val();

  var file_=paqueteDeDatos.append('archivo', $('#archivo_subir')[0].files[0]);
  var archivo = document.forms['form_cargar_ventas']['archivo_subir'].files[0];
  paqueteDeDatos.append('txtobser', $('#txtobser').val());
  paqueteDeDatos.append('sltanio', sltanio);
  paqueteDeDatos.append('sltmes', sltmes);
  
  if(sltanio.trim()=="0"){
    $('#span_sltanio').attr('class','input-group-text text-danger');
    $('.msj_sltanio').empty();
    $('.msj_sltanio').append("-  seleccione un año");
    window.setTimeout(function() { $('.msj_sltanio').html("");$('#span_sltanio').attr('class','input-group-text text-info');}, 3000);
  }else if(sltmes.trim()=="0"){
    $('#span_sltmes').attr('class','input-group-text text-danger');
    $('.msj_sltmes').empty();
    $('.msj_sltmes').append("-  seleccione un mes");
    window.setTimeout(function() { $('.msj_sltmes').html("");$('#span_sltmes').attr('class','input-group-text text-info');}, 3000);
  }else if(archivo=="undefined" || archivo=="" || archivo==undefined){
    $('#span_subir_archivo').attr('class','input-group-text text-danger');
    $('.msj_archivo_subir').empty();
    $('.msj_archivo_subir').append("-  seleccione un archivo Excel de ventas");
    window.setTimeout(function() { $('.msj_archivo_subir').html("");$('#span_subir_archivo').attr('class','input-group-text text-success');}, 3000);
    $("#barra_estado").removeClass("bg-danger");
    $("#barra_estado").removeClass("bg-success");
    $("#barra_estado").width('0%');
    $("#span_barra").html('0%');      
  }else{
     
      $("#barra_estado").removeClass("bg-danger");
      $("#barra_estado").removeClass("bg-success");
      
        peticion.upload.addEventListener("progress", (event) => {
        let porcentaje = Math.round((event.loaded / event.total) * 100);
        
      
        $("#barra_estado").width(porcentaje+'%');
        $("#span_barra").html(porcentaje+'%');
      });
      
        peticion.addEventListener("load", () => {

          $("#barra_estado").addClass("bg-success");
          $("#span_barra").html("Proceso Completado");
      
        });
        //Enviamos los datos
        peticion.open('post', 'controller_func/trama_a365/cargar_importar_ventas.php');
        peticion.send(paqueteDeDatos);
        //console.log(peticion.response);
        peticion.onloadend = function () {
          console.log(peticion.responseText);
          $datos=peticion.responseText;
          if(peticion.responseText=="true"){
            $('#form_cargar_ventas').empty();
            $('#modal-cargar-ventas').modal('hide');
            toastr.success('Se realizo la carga e importaron de ventas correctamente');
          }else{

            peticion.abort();
            $('#form_cargar_ventas').empty();
            $('#modal-cargar-ventas').modal('hide');
            $('#form_errores').empty();
            $('#form_errores').append($datos);
            $('#modal-errores').modal('show');

          }
          
        }       
  }

 });

/**a365 cancelar archivo */

$(document).on('click', '.cancel-cargaeimportacion-ventas-a365', function() {
  peticion.abort();
  
  $("#form_cargar_ventas")[0].reset();
  $("#label_subir_archivo").html("Subir Archivo");

  $("#span_barra").html("...0%");
  $("#barra_estado").css("width", "0%");

});

$(document).on('click', '.consultar-editar-arbol-virtual', function() {
  var sltruc=$("#sltruc_buscar").val();
  var ruc=$("#txtruc_buscar").val();
  var hnombres=$("#hnombres").val();
  if(sltruc=="0" && ruc==""){
    toastr.error('Seleccione un representante o escriba un RUC');
  }else if(hnombres==""){
    toastr.error('Seleccione un representante o escriba un RUC');
  }else{
    $("#frmedit_con_arbol_virtual").submit();
  }
  
});

$(document).on('click', '.show-solicitud-arbol-virtual-repre', function() {
  var id = $(this).data('id');    
  $("#frmshowsoliarbolvirtual"+id).submit();
})   

$(document).on('click', '.show-solicitud-arbol-virtual-admin', function() {
  var id = $(this).data('id');    
  $("#frmshowsoliarbolvirtual"+id).submit();
}) 


/**Validacion de DNI Diners Club */
$(document).on('click', '.consult-dni-contratante-gestion', function() {
  var txtdni=$("#txtdni_gestion").val();
  var url='controller_func/validar/validar_dni_dinersclub.php';
  var dataString = {"txtdni":txtdni}  
  
  if(txtdni.trim()=="" || txtdni.length!=8){
        $('#txtdni_gestion').attr('class','form-control is-invalid');
        $('.msj-txtdni_gestion').empty();
        $('.msj-txtdni_gestion').append("- N° DNI debe ser de 8 numeros");
        window.setTimeout(function() { $('.msj-txtdni_gestion').html("");$('#txtdni_gestion').attr('class','form-control');}, 3000);
        return false;
  }else{
    $.ajax({
    type: 'POST',
    url: url,
    data: dataString,
    beforeSend:function(){     
      $('.consult-dni-contratante-gestion').html("Validando...");
      $('.consult-dni-contratante-gestion').prop('disabled', true);
      },
    complete:function(){
      $('.consult-dni-contratante-gestion').html("Consultar y validar");
      $('.consult-dni-contratante-gestion').prop('disabled', false);
      },
    }).promise().done(function(data) {      
        var content = JSON.parse(data);      
        if(content[0].en_sistema=="true"){
          $('#txtdni_gestion').attr('class','form-control is-valid');
          $('#lblestado_dni').attr('class','form-control is-valid');
          $('#lblestado_dni').empty();
          $('#lblestado_dni').append("Aprobado");
          $('#lblproducto_dni').empty();          
          $('#lblproducto_dni').append(content[0].producto);
          $('#lbltasa_dni').empty();
          $('#lbltasa_dni').append(content[0].tasapor);
        }else if(content[0].en_sistema=="false"){
          $('#txtdni_gestion').attr('class','form-control is-invalid');
          $('#lblestado_dni').attr('class','form-control is-invalid');
          $('#lblestado_dni').empty();
          $('#lblestado_dni').append("No incluido en campaña");
          $('#lblproducto_dni').empty();
          $('#lblproducto_dni').append("---");          
          $('#lbltasa_dni').empty();
          $('#lbltasa_dni').append("---");
        }
      })
  }
});