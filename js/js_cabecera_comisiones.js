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

$(document).on("click", ".new_cabecera_comision", function () {
    var id = $(this).data('id');
    var url = "controller_func/cabecera_comisiones_venta/Create.php?id=" + id;

    $.get(url, function (data) {
        $('#form_comision').empty();
        $('#form_comision').append(data);

    })
    $("#modal_form-cabecera").modal("show");
})
function list_cab_com() {
    $.ajax({
        url: 'controller_func/cabecera_comisiones_venta/list.php',

    }).done(function (data) {
        $('.table_cabecera_comisiones').html(data);
    });
}
$(document).on("click", "#btn_save", function () {
    var data = $("#form_comision").serialize();
    var txt_representante = document.querySelector('#txt_representante').value;
    var text_correo = document.querySelector('#text_correo').value;
    var txt_num_document = document.querySelector('#txt_num_document').value;
    var txt_comision = document.querySelector('#txt_comision').value;
    var txt_anio = document.querySelector('#txt_anio').value;
    var txt_mes = document.querySelector('#txt_mes').value;
    var txt_sem_inicio = document.querySelector('#txt_sem_inicio').value;
    var txt_sem_fin = document.querySelector('#txt_sem_fin').value;
    var txt_sem_det = document.querySelector('#txt_sem_det').value;
    if(txt_representante==""||
        text_correo==""||
        txt_num_document==""||
        txt_comision==""||
        txt_anio==""||
        txt_mes==""||
        txt_sem_inicio==""||
        txt_sem_fin==""||
        txt_sem_det==""){
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    let elementsValid = document.getElementsByClassName("valid");
    for (let i = 0; i < elementsValid.length; i++) { 
        if(elementsValid[i].classList.contains('is-invalid')) { 
            toastr.error("Atencion Por favor verifique los campos en rojo.");                
            return false;
        } 
    }
    $.ajax({
        url: 'controller_func/cabecera_comisiones_venta/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            if (data == 'true') {
                list_cab_com();
                $('#modal_form-cabecera').modal('hide');
                toastr.success("Datos guardados correctamente");
            } else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
                return false;
            }
        }
    });
});
$(document).on("click", ".activar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "desactivar";
    var url = "controller_func/cabecera_comisiones_venta/accion.php?id="+id+ "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se activo correctamente");
            list_cab_com();
        } else {
            alert("Error al desactivar"+data);
        }
    })
})
$(document).on("click", ".desactivar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "activar";
    var url = "controller_func/cabecera_comisiones_venta/accion.php?id=" + id + "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se desactivo correctamente");
            list_cab_com();
        } else {
            alert("Error al desactivar"+data);
        }
    })
});
$(document).on("click",".new-modal-show-cabecera",function(){
    var id = $(this).data('id');
    var url = "controller_func/cabecera_comisiones_venta/show.php?id=" + id;
    $.get(url, function (data) {
        $('#form_cab_comisiones').empty();
        $('#form_cab_comisiones').append(data);
        $('#form_cab_comisiones :input').prop('disabled',true);

    })
    $("#modal-form-show-cabecera").modal("show");
})

function combo_anio_generados(){
    $.ajax({
    url:"controller_func/cabecera_comisiones_venta/combo_anio.php"
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
        url:"controller_func/cabecera_comisiones_venta/combo_mes.php",
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
        url:"controller_func/cabecera_comisiones_venta/combo_semana.php",
        data: dataString
        }).done(function(info){
          $('#slt_semana_c').empty();
          $("#slt_semana_c").append(info);
        });
});


$(document).on('click', '.consultar_comisiones', function() {
    var slt_anio=$("#slt_anio_c").val();
    var slt_mes=$("#slt_mes_c").val();
    var slt_semana=$("#slt_semana_c").val();
    var dataString = {"slt_anio":slt_anio,"slt_mes":slt_mes,"slt_semana":slt_semana}
  
    $.ajax({
        type: 'POST',
        url:"controller_func/cabecera_comisiones_venta/consult.php",
        data: dataString,
        beforeSend:function(){
          cargar_data();
          },
        complete:function(){
          Swal.close();
          },
        }).done(function(info){
          $('.table_cabecera_comisiones').empty();
          $(".table_cabecera_comisiones").append(info);
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


  $(document).on('click', '.exportar_excel_comisiones', function() {
    var slt_anio=$("#slt_anio_c").val();
    var slt_mes=$("#slt_mes_c").val();
    var slt_semana=$("#slt_semana_c").val();

  
    var dataString = {      
      "slt_anio":slt_anio,
      "slt_mes":slt_mes,
      "slt_semana":slt_semana
    }
  
      $.ajax({
        type:'POST',
        url:"controller_func/cabecera_comisiones_venta/exportar_excel_comisiones.php",
        data: dataString,      
        dataType:'json',
        beforeSend:function(){
          cargar_data();
          },
        complete:function(){
          Swal.close();
          },
        }).done(function(data){
            var $a = $("<a>");
            $a.attr("href",data.file);
            $("body").append($a);
            $a.attr("download",data.namearchivo+".xlsx");
            $a[0].click();
            $a.remove();
        });
    });