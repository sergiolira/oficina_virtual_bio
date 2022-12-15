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

  
function list_registros_ventas(){

    var slt_estado_pedido_c=$("#slt_estado_pedido_c").val();
    var slt_tipo_venta_c=$("#slt_tipo_venta_c").val();
    var txt_nro_sol_c=$("#txt_nro_sol_c").val();
    var txt_nro_doc_c=$("#txt_nro_doc_c").val();
    var fecha_ped_ini="";
    var fecha_ped_fin="";
    var fecha_entrega_ini="";
    var fecha_entrega_fin="";

    if($('#fecha_pedido_c').val()==""){
        fecha_ped_ini="";
        fecha_ped_fin="";
      }else{
        fecha_ped_ini=$('#fecha_pedido_c').data('daterangepicker').startDate.format('YYYY-MM-DD');
        fecha_ped_fin=$('#fecha_pedido_c').data('daterangepicker').endDate.format('YYYY-MM-DD');
      }
      
      if($('#check_fec_ent').is(':checked')) {
        fecha_entrega_ini=$('#fecha_entrega_c').data('daterangepicker').startDate.format('YYYY-MM-DD');
        fecha_entrega_fin=$('#fecha_entrega_c').data('daterangepicker').endDate.format('YYYY-MM-DD');
      }else{
        fecha_entrega_ini="";
        fecha_entrega_fin="";
      }      
  
      var dataString = {
        "fecha_ped_ini":fecha_ped_ini,
        "fecha_ped_fin":fecha_ped_fin,
        "fecha_entrega_ini":fecha_entrega_ini,
        "fecha_entrega_fin":fecha_entrega_fin,
        "slt_estado_pedido_c":slt_estado_pedido_c.toString(),
        "slt_tipo_venta_c":slt_tipo_venta_c.toString(),
        "txt_nro_sol_c":txt_nro_sol_c,
        "txt_nro_doc_c":txt_nro_doc_c
      }

    $.ajax({
        type: 'POST',
        url:"controller_func/cabecera_registro_venta/list_sale.php",
        data: dataString,
        beforeSend:function(){
        cargar_data();
        },
        complete:function(){
        Swal.close();
        },
    }).done(function(data){
        $('.tbl_reg_ventas').empty();
        $('.tbl_reg_ventas').append(data);        
    })
}

$(document).on('click', '.nuevo_detalle_venta_modal',function(){
    var id=$(this).data("id");
    var url="controller_func/cabecera_registro_venta/create_sale.php?id="+id;
    $.get(url, function(data){
        $("#form_detalle_venta").empty();
        $("#form_detalle_venta").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar Registro Venta Cabecera");
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nuevo Registro Venta Cabecera");
        }
        $("#modal-form-detalle-venta").modal("show");
    })
});

$(document).on('click', '.nuevo_detalle_venta_modal_asesor',function(){
  var id=$(this).data("id");
  var url="controller_func/cabecera_registro_venta/create_sale_asesor.php?id="+id;
  $.get(url, function(data){
      $("#form_detalle_venta").empty();
      $("#form_detalle_venta").append(data);
      if(id>0){
          $(".title_marca").empty();
          $(".title_marca").append("Modificar Registro Venta Cabecera");
      }else{
          $(".title_marca").empty();
          $(".title_marca").append("Nuevo Registro Venta Cabecera");
      }
      $("#modal-form-detalle-venta").modal("show");
  })
});

$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/cabecera_registro_venta/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_marca"+id).removeClass('btn btn-sm btn-success activar-item').addClass('btn btn-sm btn-danger desactivar-item');
                $("#icon_marca"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/cabecera_registro_venta/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_marca"+id).removeClass('btn btn-sm btn-danger desactivar-item').addClass('btn btn-sm btn-success activar-item');
                $("#icon_marca"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});


$(document).on('click', '#btn_save', function() {
    var data=$('#form_detalle_venta').serialize();
    if($("#slt_tipo_venta").val()=="2" && $("#slt_paquete").val()=="0"){
        toastr.error("Seleccione un paquete");
        return false;
    }
    if($("#txt_cantidad").val()=="" || $("#txt_cantidad").val()=="0" || $("#txt_cantidad").val()<0){
        toastr.error("Ingrese una cantidad válida");
        return false;
    }
    if($("#slt_tipo_cliente").val()=="0"){
        toastr.error("Seleccione un tipo de cliente");
        return false;
    }
    if($("#slt_pais_seleccionado").val()=="0"){
        toastr.error("Seleccione un país");
        return false;
    }
    if($("#slt_pais_seleccionado").val()=="1" && $("#slt_departamento_seleccionado").val()=="0"){
        toastr.error("Seleccione un departamento");
        return false;
    }
    if($("#slt_pais_seleccionado").val()=="1" && $("#slt_provincia_seleccionado").val()=="0"){
        toastr.error("Seleccione un provincia");
        return false;
    }
    if($("#slt_pais_seleccionado").val()=="1" && $("#slt_distrito_seleccionado").val()=="0"){
        toastr.error("Seleccione un distrito");
        return false;
    }
    if($("#txt_direccion").val()==""){
        toastr.error("Complete la dirección");
        return false;
    }
    if($("#txt_referencia").val()==0){
        toastr.error("Complete la referencia");
        return false;
    }  

    if($("#txt_total_descuento").val()==""){
        toastr.error("Complete el campo total descuento");
        return false;
    }
    
    if($("#txt_total").val()==""){
        toastr.error("Complete el campo total");
        return false;
    }

    let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) { 
            if(elementsValid[i].classList.contains('is-invalid')) { 
                toastr.error("Atencion Por favor verifique los campos esten llenos.");                
                return false;
            } 
        } 
     $.ajax({
        type:'POST',
        url:'controller_func/cabecera_registro_venta/accion_sale.php',
        data:data,
        success:function(data){     
            console.log(data);
            if(data.trim()=="true_create"){               
                $("#form_detalle_venta").empty();
                $("#modal-form-detalle-venta").modal("hide");
                toastr.success("Se creó la venta correctamente");
                list_registros_ventas();
            }else if(data.trim()=="true_update"){
                $("#form_detalle_venta").empty();
                $("#modal-form-detalle-venta").modal("hide");
                toastr.success("Se actualizó la venta correctamente");
                list_registros_ventas();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});


$(document).on('click', '.show_detalle_venta_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/cabecera_registro_venta/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_detalle_venta").empty();
        $("#form_show_detalle_venta").append(data);
        $("#form_show_detalle_venta :input").prop('disabled',true);
        $("#modal-show-detalle-venta").modal("show");
    })
});


$(document).on('change', '#slt_tipo_venta', function() {   
    var selected = $("#slt_tipo_venta").val();
    var slt_producto = $("#slt_producto").val();
    var subtotal = 0

    if(selected=="1"){
        $(".div_paquete").hide();
        $(".div_producto").show();        
        document.getElementById("txt_cantidad").removeAttribute("readonly");
        var dataString = {"id":slt_producto}
        $.ajax({
        type: 'POST',
        url:"controller_func/producto/consult_precio.php",
        data: dataString,
        }).done(function(info){    
            var content = JSON.parse(info);          
            $('#txt_precio_unitario').val(content[0].precio_venta);   
            var input = document.getElementById("txt_cantidad");
            
            input.setAttribute("max",content[0].stock_actual);
            $('#txt_cantidad').val(1);     
            
            subtotal=parseFloat($("#txt_precio_unitario").val())*parseFloat($("#txt_cantidad").val());
            $("#txt_sub_total").val(subtotal.toFixed(2));
            $("#slt_producto").change();
            $("#txt_numero_documento").keyup();
            
        });         

      }
      if(selected=="2"){
        $(".div_paquete").show();
        $(".div_producto").hide();
        $("#slt_paquete").change();
        
      }

      calcular_total();
   
});


$(document).on('change', '#slt_producto', function() {
    var slt_producto = $("#slt_producto").val();
    var dataString = {"id":slt_producto}

      $.ajax({
        type: 'POST',
        url:"controller_func/producto/consult_precio.php",
        data: dataString,
        }).done(function(info){    
          var content = JSON.parse(info);          
          $('#txt_precio_unitario').val(content[0].precio_venta);          
          document.getElementById("txt_cantidad").removeAttribute("readonly");
          calcular_total();
        })    
        
});


$(document).on('change', '#slt_paquete', function() {
    var slt_paquete = $("#slt_paquete").val();
    var subtotal = 0;
    var txt_numero_documento=$("#txt_numero_documento").val();
    if(txt_numero_documento!=""){
        $("#txt_numero_documento").keyup();
    }

    if (slt_paquete==0){
        $('#txt_precio_unitario').val(0);
        $('#txt_cantidad').val(1);
        document.getElementById("txt_cantidad").setAttribute("readonly", "readonly");
        $("#txt_sub_total").val(0);
        calcular_total();        
    }else{
    var dataString = {"id":slt_paquete}
      $.ajax({
        type: 'POST',
        url:"controller_func/paquete_detalle_producto/consult_precio.php",
        data: dataString,
        }).done(function(info){    
          var content = JSON.parse(info);          
          $('#txt_precio_unitario').val(content[0].precio_venta);
          $('#txt_cantidad').val(content[0].cantidad);
          var input = document.getElementById("txt_cantidad");
          input.setAttribute("max",content[0].stock_actual);   
          $('.lbl_cant').empty();
          $(".lbl_cant").append("Cantidad de productos");
          subtotal=parseFloat($("#txt_precio_unitario").val());
          $("#txt_sub_total").val(subtotal.toFixed(2));
          document.getElementById("txt_cantidad").setAttribute("readonly", "readonly");
          calcular_total();
        })    
    }

    
});

$(document).on('keyup mouseleave', '#txt_cantidad', function() {

    var cantidad = $("#txt_cantidad").val();
    var slt_tipo_venta = $("#slt_tipo_venta").val();
    var subtotal=0;
    if(cantidad>99 && slt_tipo_venta==1){
        $("#txt_desc_x_vol").val("2.00");
        subtotal=parseFloat($("#txt_precio_unitario").val())*parseFloat($("#txt_cantidad").val());
        $("#txt_sub_total").val(subtotal.toFixed(2));
    }

    if(slt_tipo_venta==2){
        $("#txt_desc_x_vol").val("0.00");
        subtotal=parseFloat($("#txt_precio_unitario").val());
        $("#txt_sub_total").val(subtotal.toFixed(2));
    }

    if(cantidad<=99 && slt_tipo_venta==1){
        $("#txt_desc_x_vol").val("0.00");
        subtotal=parseFloat($("#txt_precio_unitario").val())*parseFloat($("#txt_cantidad").val());
        $("#txt_sub_total").val(subtotal.toFixed(2));
    }

    calcular_total();


});


$(document).on('keyup mouseleave', '#txt_numero_documento', function() {
    var numero_documento = $("#txt_numero_documento").val();
    var slt_tipo_cliente = $("#slt_tipo_cliente").val();
    var slt_tipo_venta = $("#slt_tipo_venta").val();

    if(slt_tipo_cliente==0){
        $('.msj_slt_tipo_cliente').empty();
        $('.msj_slt_tipo_cliente').append("- seleccione un tipo de cliente");
        $('#txt_des_x_cli').val(0.00); 
        $('#txt_total_descuento').val(0.00);
        window.setTimeout(function() { $('.msj_slt_tipo_cliente').html("");}, 3000);
        return false;
    }

    if(numero_documento.length<8){
        $('#txt_numero_documento').attr('class','form-control is-invalid');
        $('.msj_txt_num_documento').empty();
        $('.msj_txt_num_documento').append("- Ingrese un número de documento válido");
        $('#txt_des_x_cli').val(0.00); 
        $('#txt_total_descuento').val(0.00);
        window.setTimeout(function() { $('.msj_txt_num_documento').html("");$('#txt_numero_documento').attr('class','form-control');}, 3000);
        return false;
    }

    if(slt_tipo_cliente=="ASESOR"){

        var dataString = {"numero_documento":numero_documento}
      $.ajax({
        type: 'POST',
        url:"controller_func/representante/consult_datos.php",
        data: dataString,
        }).done(function(info){    
          var content = JSON.parse(info);  
          $('#txt_correo_cli').val(content[0].correo);
          $('#txt_datos_cli').val(content[0].datos);
          $('#txt_celular_cli').val(content[0].celular);
          $('#txt_patrocinador').val(content[0].patrocinador);
          $('#txt_patrocinador_directo').val(content[0].patrocinador_directo);
          if(slt_tipo_venta==2){
            $('#txt_des_x_cli').val(0.00);
            calcular_total();  
          }else{
            $('#txt_des_x_cli').val(content[0].descuento);  
            calcular_total();
            }           
          if(content[0].correo==""){
            $('#txt_des_x_cli').val(0.00); 
            $('#txt_numero_documento').attr('class','form-control is-invalid');
            $('.msj_txt_num_documento').empty();
            $('.msj_txt_num_documento').append("- Ingrese un número de documento válido");
            window.setTimeout(function() { $('.msj_txt_num_documento').html("");$('#txt_numero_documento').attr('class','form-control');}, 3000);
            calcular_total();
          }
               
        });
        
    }

    if(slt_tipo_cliente=="CLIENTE"){

        var dataString = {"numero_documento":numero_documento}
      $.ajax({
        type: 'POST',
        url:"controller_func/candidato/consult_datos.php",
        data: dataString,
        }).done(function(info){    
          var content = JSON.parse(info);          
          $('#txt_correo_cli').val(content[0].correo);
          $('#txt_datos_cli').val(content[0].datos);
          $('#txt_celular_cli').val(content[0].celular);         
          $('#txt_patrocinador').val(content[0].patrocinador);
          $('#txt_patrocinador_directo').val(content[0].patrocinador_directo);
          if(slt_tipo_venta==2){
            $('#txt_des_x_cli').val(0.00);  
            calcular_total();
          }else{
            $('#txt_des_x_cli').val(content[0].descuento);  
            calcular_total();
            }  
          if(content[0].correo==""){
            $('#txt_des_x_cli').val(0.00); 
            $('#txt_numero_documento').attr('class','form-control is-invalid');
            $('.msj_txt_num_documento').empty();
            $('.msj_txt_num_documento').append("- Ingrese un número de documento válido");
            window.setTimeout(function() { $('.msj_txt_num_documento').html("");$('#txt_numero_documento').attr('class','form-control');}, 3000);
            calcular_total();
          }
        });        
    }
    
    
});


$(document).on('change', '#slt_tipo_cliente', function() {
    $('#txt_correo_cli').val("");
    $('#txt_datos_cli').val("");
    $('#txt_celular_cli').val("");        
    $('#txt_des_x_cli').val("0.00");    
    $('#txt_numero_documento').val("");
    calcular_total();
});



$(document).on('change', '#slt_pais_seleccionado', function() {

    var sltpais=$("#slt_pais_seleccionado").val();
    var sltdep=$("#slt_departamento_seleccionado").val();
    var sltpro=$("#slt_provincia_seleccionado").val();
    var sltdis=$("#slt_distrito_seleccionado").val();

    var dataString = {"id_pais":sltpais,"id_dep":sltdep,"id_pro":sltpro,"id_dis":sltdis}
      $.ajax({
        type: 'POST',
        url:"controller_func/costo_envio/hallar_costo.php",
        data: dataString,
        }).done(function(info){    
            var content = JSON.parse(info);          
            if(content[0].costo_envio==""){
                $('#txt_costo_envio').val(0.00);
                calcular_total();
            }else{
                $('#txt_costo_envio').val(content[0].costo_envio);
                calcular_total();
            }           
            

        }); 
        if(sltpais=="1"){
          $(".div_departamento").show();
          $(".div_provincia").show();
          $(".div_distrito").show();    
        }else{
          $(".div_departamento").hide();
          $(".div_provincia").hide();
          $(".div_distrito").hide();
        }
});


$(document).on('change', '#slt_departamento_seleccionado', function() {
    var selected=$("#slt_departamento_seleccionado").val()

    $("#slt_distrito_selecionado").find('option').remove().end().append('<option value="0">SELECCIONAR DISTRITO</option>').val('0');
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_provinces/combo_x_dep.php',
        data:{'id_departamento_seleccionado': selected} ,
        success:function(data){  
            $('#slt_provincia_seleccionado').empty();
            $('#slt_provincia_seleccionado').html(data);
            $("#slt_provincia_seleccionado").change();
        }
    })


    var sltpais=$("#slt_pais_seleccionado").val();
    var sltdep=$("#slt_departamento_seleccionado").val();
    var sltpro=$("#slt_provincia_seleccionado").val();
    var sltdis=$("#slt_distrito_seleccionado").val();


    var dataString = {"id_pais":sltpais,"id_dep":sltdep,"id_pro":sltpro,"id_dis":sltdis}
    $.ajax({
    type: 'POST',
    url:"controller_func/costo_envio/hallar_costo.php",
    data: dataString,
    }).done(function(info){    
        var content = JSON.parse(info);          
        if(content[0].costo_envio==""){
            $('#txt_costo_envio').val(0.00);
            calcular_total();
        }else{
            $('#txt_costo_envio').val(content[0].costo_envio);
            calcular_total();
        }     
    });   


  });
  
  $(document).on('change', '#slt_provincia_seleccionado', function() {  

    var selected = $("#slt_provincia_seleccionado").val();
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_districts/combo_x_prov.php',
        data:{'id_provincia_seleccionado': selected} ,
        success:function(data){
            $('#slt_distrito_seleccionado').empty();
            $('#slt_distrito_seleccionado').html(data);
        }
    })

    var sltpais=$("#slt_pais_seleccionado").val();
    var sltdep=$("#slt_departamento_seleccionado").val();
    var sltpro=$("#slt_provincia_seleccionado").val();
    var sltdis=$("#slt_distrito_seleccionado").val();

    var dataString = {"id_pais":sltpais,"id_dep":sltdep,"id_pro":sltpro,"id_dis":sltdis}
      $.ajax({
        type: 'POST',
        url:"controller_func/costo_envio/hallar_costo.php",
        data: dataString,
        }).done(function(info){    
          var content = JSON.parse(info);          
          if(content[0].costo_envio==""){
            $('#txt_costo_envio').val(0.00);
            calcular_total();
        }else{
            $('#txt_costo_envio').val(content[0].costo_envio);
            calcular_total();
        }     
        
        });    

        


  });
  

  $(document).on('change', '#slt_distrito_seleccionado', function() {  

    var sltpais=$("#slt_pais_seleccionado").val();
    var sltdep=$("#slt_departamento_seleccionado").val();
    var sltpro=$("#slt_provincia_seleccionado").val();
    var sltdis=$("#slt_distrito_seleccionado").val();



    var dataString = {"id_pais":sltpais,"id_dep":sltdep,"id_pro":sltpro,"id_dis":sltdis}
      $.ajax({
        type: 'POST',
        url:"controller_func/costo_envio/hallar_costo.php",
        data: dataString,
        }).done(function(info){    
          var content = JSON.parse(info);          
          if(content[0].costo_envio==""){
            $('#txt_costo_envio').val(0.00);
            calcular_total();
        }else{
            $('#txt_costo_envio').val(content[0].costo_envio);
            calcular_total();
        }   
        
        });    



  });  

  function calcular_total(){
    var txt_sub_total= $("#txt_sub_total").val();
    var txt_desc_x_vol = $("#txt_desc_x_vol").val();
    var txt_des_x_cli = $("#txt_des_x_cli").val();
    var txt_costo_envio = $("#txt_costo_envio").val();
    var txt_total_descuento=0.00;
    var txt_monto_total_descuento=0.00;
    var total=0.00;
    if(txt_sub_total==""){
        txt_sub_total=0.00;
    }    
    if(txt_desc_x_vol==""){
        txt_desc_x_vol=0.00;
    }
    if(txt_des_x_cli==""){
        txt_des_x_cli=0.00;
    }
    if(txt_costo_envio==""){
        txt_costo_envio=0.00;
    }


    txt_total_descuento=parseFloat(txt_desc_x_vol)+parseFloat(txt_des_x_cli);
    txt_monto_total_descuento=parseFloat(txt_sub_total)*parseFloat(txt_total_descuento/100);    
    total=(parseFloat(txt_sub_total)-(parseFloat(txt_sub_total)*parseFloat(txt_total_descuento/100)))+parseFloat(txt_costo_envio);
    $('#txt_total_descuento').val(txt_total_descuento.toFixed(2));
    $('#txt_monto_total_descuento').val(txt_monto_total_descuento.toFixed(2));
    $('#txt_total').val(total.toFixed(2));
  }

function combo_estado_pedido(){
$.ajax({
url:"controller_func/estado_registro_venta/combo.php"
}).done(function(info){      
    $('#slt_estado_pedido_c').empty();
    $("#slt_estado_pedido_c").append(info);
});
}

function combo_tipo_venta(){
$.ajax({
url:"controller_func/tipo_venta/combo.php"
}).done(function(info){      
    $('#slt_tipo_venta_c').empty();
    $("#slt_tipo_venta_c").append(info);
});
}

$('#check_fec_ent').change(function(){
if($(this).is(':checked')) {
    $('#fecha_entrega_c').prop('disabled', false);
} else {    
    $('#fecha_entrega_c').prop('disabled', true);
}
});

$(document).on('click', '.consult_resgistro_ventas', function() {
    list_registros_ventas();
});

function list_registros_ventas_completadas(){

    var txt_nro_sol_c=$("#txt_nro_sol_c").val();
    var txt_nro_doc_c=$("#txt_nro_doc_c").val();
    var fecha_ped_ini="";
    var fecha_ped_fin="";
    var fecha_entrega_ini="";
    var fecha_entrega_fin="";

    if($('#fecha_pedido_c').val()==""){
        fecha_ped_ini="";
        fecha_ped_fin="";
      }else{
        fecha_ped_ini=$('#fecha_pedido_c').data('daterangepicker').startDate.format('YYYY-MM-DD');
        fecha_ped_fin=$('#fecha_pedido_c').data('daterangepicker').endDate.format('YYYY-MM-DD');
      }
      
      if($('#check_fec_ent').is(':checked')) {
        fecha_entrega_ini=$('#fecha_entrega_c').data('daterangepicker').startDate.format('YYYY-MM-DD');
        fecha_entrega_fin=$('#fecha_entrega_c').data('daterangepicker').endDate.format('YYYY-MM-DD');
      }else{
        fecha_entrega_ini="";
        fecha_entrega_fin="";
      }      
  
      var dataString = {
        "fecha_ped_ini":fecha_ped_ini,
        "fecha_ped_fin":fecha_ped_fin,
        "fecha_entrega_ini":fecha_entrega_ini,
        "fecha_entrega_fin":fecha_entrega_fin,
        "txt_nro_sol_c":txt_nro_sol_c,
        "txt_nro_doc_c":txt_nro_doc_c
      }

    $.ajax({
        type: 'POST',
        url:"controller_func/cabecera_registro_venta/list_completadas.php",
        data: dataString,
        beforeSend:function(){
        cargar_data();
        },
        complete:function(){
        Swal.close();
        },
    }).done(function(data){
        $('.tbl_reg_ventas').empty();
        $('.tbl_reg_ventas').append(data);        
    })
}

$(document).on('click', '.consult_resgistro_ventas_completadas', function() {
    list_registros_ventas_completadas();
});


function list_trama_temporal(){

  $.ajax({
    url: 'controller_func/trama_registro_ventas_temporal/list.php',
    beforeSend:function(){
      cargar_data();
      },
    complete:function(){
      Swal.close();
      },
    success: function(data) {
        if(data=="session_expired"){
          ses_exp_modal_iniciar_sesion();
          return false;
        }
        $('.tbody_list_trama_temporal').empty();
        $(".tbody_list_trama_temporal").append(data);
      }
    });
}

$(document).on('click', '.add-solicitud-tem-trama', function() {

  var id = $(this).data('id');
  var solicitud = $(this).data('solicitud');
  var dataString = {
    "id":id,
    "solicitud":solicitud,
    "tipo":"1"
  }

$.ajax({
  type: 'POST',
  url: 'controller_func/trama_registro_ventas_temporal/accion.php',
  data: dataString,
  
  success: function(data) {
      if(data=="session_expired"){
        ses_exp_modal_iniciar_sesion();
        return false;
      }
      if(data.trim()=="true"){
        toastr.success('Agregado correctamente');
        list_trama_temporal();
      }else if(data.trim()=="true_doble"){
        toastr.success('Nro de solicitud ya se encuentra agregado');
        list_trama_temporal();
      }else{
        toastr.error('Error- Comuniquese con el area de sistema');
      }
    }
  });

});


$(document).on('click', '.add-solicitud-list-trama', function() {

  var txt_nro_sol_c=$("#txt_nro_sol_c").val();
  var txt_nro_doc_c=$("#txt_nro_doc_c").val();
  var fecha_ped_ini="";
  var fecha_ped_fin="";
  var fecha_entrega_ini="";
  var fecha_entrega_fin="";

  if($('#fecha_pedido_c').val()==""){
      fecha_ped_ini="";
      fecha_ped_fin="";
    }else{
      fecha_ped_ini=$('#fecha_pedido_c').data('daterangepicker').startDate.format('YYYY-MM-DD');
      fecha_ped_fin=$('#fecha_pedido_c').data('daterangepicker').endDate.format('YYYY-MM-DD');
    }
    
    if($('#check_fec_ent').is(':checked')) {
      fecha_entrega_ini=$('#fecha_entrega_c').data('daterangepicker').startDate.format('YYYY-MM-DD');
      fecha_entrega_fin=$('#fecha_entrega_c').data('daterangepicker').endDate.format('YYYY-MM-DD');
    }else{
      fecha_entrega_ini="";
      fecha_entrega_fin="";
    }      

  var dataString = {
    "fecha_ped_ini":fecha_ped_ini,
    "fecha_ped_fin":fecha_ped_fin,
    "fecha_entrega_ini":fecha_entrega_ini,
    "fecha_entrega_fin":fecha_entrega_fin,
    "txt_nro_sol_c":txt_nro_sol_c,
    "txt_nro_doc_c":txt_nro_doc_c,
    "tipo":"4"
  }


  $.ajax({
    type: 'POST',
    url: 'controller_func/trama_registro_ventas_temporal/accion.php',
    data: dataString,
    beforeSend:function(){
      cargar_data();
      },
    complete:function(){
      Swal.close();
      },
    success: function(data) {
        if(data=="session_expired"){
          ses_exp_modal_iniciar_sesion();
          return false;
        }
        if(data=="true"){
          toastr.success('Lista de solicitudes agregados correctamente');
          list_trama_temporal();
        }else{
          toastr.error('Error- Comuniquese con el area de sistema');
        }
      }
    });

});

$(document).on('click', '.delete-solicitud-item-trama', function() {

  var id = $(this).data('id');
  var solicitud = $(this).data('solicitud');
  var dataString = {
    "id":id,
    "solicitud":solicitud,
    "tipo":"2"
  }

  $.ajax({
    type: 'POST',
    url: 'controller_func/trama_registro_ventas_temporal/accion.php',
    data: dataString,
    beforeSend:function(){
      cargar_data();
      },
    complete:function(){
      Swal.close();
      },
    success: function(data) {
        if(data=="session_expired"){
          ses_exp_modal_iniciar_sesion();
          return false;
        }
        if(data=="delete_true"){
          toastr.success('Nro de solicitud eliminado de trama');
          list_trama_temporal();
        }else{
          toastr.error('Error- Comuniquese con el area de sistema');
        }
      }
    });

});

//Crea a new registro de ventas
$(document).on('click', '.generar_trama_ventas_comisiones', function() {

  var solicitud = $(this).data('solicitud');
  var hdn_fecha_rango=$("#hdn_fecha_rango").val();
  if(hdn_fecha_rango=="1"){
    var fecha_ini="1";
    var fecha_fin="1";
    var anio_detalle=$('#anio_detalle').val();
    var mes_detalle=$('#mes_detalle').val();
    var semana_detalle=$('#semana_detalle').val();
  }else{
    var fecha_ini=$('#rango_fecha').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var fecha_fin=$('#rango_fecha').data('daterangepicker').endDate.format('YYYY-MM-DD');
    var anio_detalle=$('#anio_detalle').val();
    var mes_detalle=$('#mes_detalle').val();
    var semana_detalle=$('#semana_detalle').val();
    if(fecha_ini.trim()==fecha_fin.trim()){
      $('#rango_fecha').attr('class','form-control is-invalid');
      $('.msj_rango_fecha').empty();
      $('.msj_rango_fecha').append("- Ingrese un rango de fechas por favor");  
      window.setTimeout(function() { $('.msj_rango_fecha').html("");$('#rango_fecha').attr('class','form-control');}, 3000);
      return false;
    }
  }
  

  var dataString = {
    "solicitud":solicitud,
    "fecha_ini":fecha_ini,
    "fecha_fin":fecha_fin,
    "anio_detalle":anio_detalle,
    "mes_detalle":mes_detalle,
    "semana_detalle":semana_detalle
   }

  $.ajax({
    type: 'POST',
    url: 'controller_func/trama_registro_ventas_temporal/importar_list.php',
    data: dataString,
    beforeSend:function(){
      cargar_data();
      },
    complete:function(){
      Swal.close();
      },
    success: function(data) {
        if(data=="session_expired"){
          ses_exp_modal_iniciar_sesion();
          return false;
        }
        if(data=="true"){
          toastr.success('Se envio la trama de ventas');
          list_trama_temporal();
          list_registros_ventas_completadas();
        }else{
          toastr.error('Error- Comuniquese con el area de sistema');
        }
      }
    });

});