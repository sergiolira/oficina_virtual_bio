//function list_agente_bmi
function list_detalle_venta(){
    $.ajax({
        url:"controller_func/registro_detalle_venta_bmi/list.php"
    }).done(function(data){
        $('.table-registro-venta').empty();
        $('.table-registro-venta').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-registro-venta', function() {
    document.getElementById('btn_save').disabled = true;
    var id=$(this).data("id");
    var url="controller_func/registro_detalle_venta_bmi/create.php?id="+id;
    $.get(url, function(data){
        $("#form_registro_venta").empty();
        $("#form_registro_venta").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar Registro de Venta");
            document.getElementById('btn_save').disabled = false;
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo Registro de Venta");
        }
        $("#modal-form-registro-venta").modal("show");
    })
});

$(document).on('click','.consult-registroventabmi', function(){
    var rango_fecha = $("#reservation").val();
    let fecha = rango_fecha.split(' - ');
    $.ajax({
        url: "controller_func/registro_detalle_venta_bmi/obtener_datos_x_fecha.php",
        type: "post",
        data: {"primera_fecha":fecha[0],"segunda_fecha":fecha[1]},
        success: function(responde){
            $('.table-registro-venta').empty();
            $('.table-registro-venta').append(responde); 
        }
    });
    
})

function limpiar_caja_cliente(){
        $("#id_cliente").val("");
        $("#id_categoria_agente_bmi").val("");
        $("#txt_nombre_cliente").val("");
        $("#txt_apellido_paterno_cliente").val("");
        $("#txt_apellido_materno_cliente").val("");
        $("#txt_edad_cliente").val("");
}
//OBTENEMOS EL nombre,apellido_paterno,apellido_materno,fecha_nac DE LA TABLA CLIENTE:
$(document).on('keyup', '#txt_numero_documento_cliente', function() {
    var num_documento = $("#txt_numero_documento_cliente").val();
    if (num_documento.length == 0 || num_documento.length >7) {
        limpiar_caja_cliente();$('#div_mostrar_boton_registrar_cliente').hide(); //para registrar nuevo cliente
    }
    if (num_documento.length >7) {
        $.ajax({
            url: "controller_func/cliente_bmi/obtener_datos.php",
            type: "post",
            data: { "num_documento": num_documento },
            success: function(data){
                var datos = JSON.parse(data);
                if(datos==null){
                    $('#txt_numero_documento_cliente').attr('class','form-control is-invalid');
                    $('.msj-txt_numero_documento_cliente').empty();
                    $('.msj-txt_numero_documento_cliente').append("-Registre a su nuevo cliente en sistema");
                    limpiar_caja_cliente();
                    $('#btn_registrar_nuevo_usuario').prop('disabled', false); //muestra el boton para registrar nuevo cliente
                }else{
                    $('#txt_numero_documento_cliente').attr('class','form-control is-valid');
                    $('.msj-txt_numero_documento_cliente').empty();
                    $('#btn_registrar_nuevo_usuario').prop('disabled', true);
                    $("#id_cliente").val(datos.id_cliente_bmi);
                    $("#id_categoria_agente_bmi").val(datos.id_categoria_agente_bmi);
                    $("#txt_nombre_cliente").val(datos.nombre);
                    $("#txt_apellido_paterno_cliente").val(datos.apellido_paterno);
                    $("#txt_apellido_materno_cliente").val(datos.apellido_materno);
                    var edad = calcular_edad(datos.fecha_nac);
                    $("#txt_edad_cliente").val(edad);
                }
            }
        });
    }
});

//funcion para obtener la edad
const calcular_edad =(fechaNacimiento)=>{
    const fechaActual = new Date();
    const anoActual = parseInt(fechaActual.getFullYear());
    const mesActual = parseInt(fechaActual.getMonth())+1;
    const diasActual = parseInt(fechaActual.getDate());
    //2016-07-11
    const anoNacimiento=parseInt(String(fechaNacimiento).substring(0,4));
    const mesNacimiento=parseInt(String(fechaNacimiento).substring(5,7));
    const diaNacimiento=parseInt(String(fechaNacimiento).substring(8,10));
    let edad = anoActual - anoNacimiento;
    if(mesActual< mesNacimiento){
        edad--;
    }else if(mesActual == mesNacimiento){
        if(diasActual < diaNacimiento){
            edad--;
        }
    }
    return edad;
}
//select anidado 
$(document).on('change', '#stl_ramo_seleccionado', function() {
    $("#txt_precio_prima").val(""); //limpia
    $("#txt_sub_precio_prima").val(""); //limpia
    var option = $("#stl_ramo_seleccionado").val();
    $("#slt_plazo_selecionado").find('option').remove().end().append('<option value="0">SELECCIONAR PLAZO</option>').val('0');
    $("#txt_derecho_emision").val("");
    $.ajax({
        type:'POST',
        url:'controller_func/producto_bmi/combo_x_producto.php',
        data:{'id_ramo_seleccionado': option} ,
        success:function(data){  
            $('#slt_producto_selecionado').html(data);
        }
    })
});
$(document).on('change', '#slt_producto_selecionado', function() {
    var option = $("#slt_producto_selecionado").val();
    $.ajax({
        type:'POST',
        url:'controller_func/plazo_anio_bmi/combo_x_plazo.php',
        data:{'id_producto_seleccionado': option} ,
        success:function(data){  
            $('#slt_plazo_selecionado').html(data);
        }
    })
});
//----------------------producto -> derecho emision -> tabla producto
$(document).on('change', '#slt_producto_selecionado', function() {
    var option = $("#slt_producto_selecionado").val();
    $("#txt_precio_prima").val(""); //limpia
    $("#txt_sub_precio_prima").val(""); //limpia
    if(option==0){
        $("#txt_derecho_emision").val(""); //limpia
    }else{
    $.ajax({
        url: "controller_func/producto_bmi/obtener_datos.php",
        type: "post",
        data: { "id_producto": option },
        success: function(data){
            var datos = JSON.parse(data);
            $("#txt_derecho_emision").val(datos.derecho_emision);
        }
    });
    }
});
function hallar_sub_precio_prima(){
    var precio_prima=$("#txt_precio_prima").val();
    var derecho_emision=$("#txt_derecho_emision").val();
    var precioFinal = precio_prima-derecho_emision;
    $("#txt_sub_precio_prima").val(precioFinal.toFixed(2));
    if ($('#txt_precio_prima').val()<=0 || $("#txt_derecho_emision").val()=="") {
        $("#txt_sub_precio_prima").val(""); //limpia
    }
}

//obtener numero de documento del agente
$(document).on('change', '#slt_agente_seleccionado', function() {
    var id_agente_seleccionado = $("#slt_agente_seleccionado").val();
    if(id_agente_seleccionado == 0){
        $("#id_agente_bmi").val("");
        $("#agente_num_documento").val("");
    }else{
    $.ajax({
        type:'POST',
        url:'controller_func/agente_bmi/obtener_datos.php',
        data:{'id_agente_seleccionado': id_agente_seleccionado} ,
        success:function(data){
            var datos = JSON.parse(data);
            $("#id_agente_bmi").val(datos.id_agente_bmi);
            $("#agente_num_documento").val(datos.num_documento);
        }
    })
    }
});
//guarda los datos de todo el modal
$(document).on('click', '#btn_save', function() {
    var data=$('#form_registro_venta').serialize();
     $.ajax({
        type:'POST',
        url:'controller_func/registro_detalle_venta_bmi/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_registro_venta").empty();
                $("#modal-form-registro-venta").modal("hide");
                toastr.success("Se creó un Registro de Venta");
                list_detalle_venta();
            }else if(data.trim()=="true_update"){
                $("#form_registro_venta").empty();
                $("#modal-form-registro-venta   ").modal("hide");
                toastr.success("Se actualizo el Registro");
                list_detalle_venta();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos. Complete todos los campos");
            }
        } 
    })
});

$(document).on('click', '.new-modal-show-registro-venta', function() {
    var id=$(this).data("id");
    var url="controller_func/registro_detalle_venta_bmi/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_registro_venta").empty();
        $("#form_show_registro_venta").append(data);
        $("#form_show_registro_venta :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles Registro Venta");
        $("#modal-form-show-registro-venta").modal("show");
    })
});
/****************ACTIVAR ESTADO*****************/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/registro_detalle_venta_bmi/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_activado"){
                toastr.success("Se activo el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_item"+id).removeClass('btn btn-sm btn-success activar-item').addClass('btn btn-sm btn-danger desactivar-item');
                $("#icon_item"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactiar Estado------*/
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/registro_detalle_venta_bmi/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_desactivado"){
                toastr.success("Se desactivo el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_item"+id).removeClass('btn btn-sm btn-danger desactivar-item').addClass('btn btn-sm btn-success activar-item');
                $("#icon_item"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});
//---------------------------------------------------------------USUARIO_BMI----------------------------------------------------------------
//metodo abre modal para registrar nuevo cliente
$(document).on('click', '#btn_registrar_nuevo_usuario' , function (){
   window.open('cliente_bmi.php', '_blank');
});

//metodo-> una vez abierto el modal- se registran los datos y se guardan en la tabla CLIENTE_BMI;
$(document).on('click', '#btn_save_nuevo_usuario', function() {
    var data=$('#form_usuario_nuevo').serializeArray();
    $.ajax({
        type:'POST',
        url:'controller_func/cliente_bmi/accion.php',
        data:data,
        beforeSend: function(){
            $("#txt_numero_documento_cliente").val(data[9].value);
        },
        success:function(data){
            if(data.trim()=="true_create"){               
                //obtener_datos_cliente();
                $("#form_usuario_nuevo").empty();
                $("#modal-form-nuevo-usuario").modal("hide");
                toastr.success("Se registró un nuevo Cliente");
            }else{
                $("#txt_numero_documento_cliente").val("");
                toastr.error("No se guardaron correctamente los datos. Complete todos los campos");
            }
        }
    })
});
//llamar metodos del js  https://www.delftstack.com/es/howto/javascript/javascript-call-function-from-another-js-file/
//obtener "value"----------------------------------------
$(document).on('change', '#slt_departamendto_selecionado', function() {
    var selected=$("#slt_departamendto_selecionado").val()
    $("#slt_distrito_selecionado").find('option').remove().end().append('<option value="0">SELECCIONAR DISTRITO</option>').val('0');
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_provinces/combo_x_dep.php',
        data:{'id_departamento_seleccionado': selected} ,
        success:function(data){  
            $('#slt_provincia_selecionado').html(data);
        }
    })
});
//obtener "value"
$(document).on('change', '#slt_provincia_selecionado', function() {    
    var selected = $("#slt_provincia_selecionado").val();
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_districts/combo_x_prov.php',
        data:{'id_provincia_seleccionado': selected} ,
        success:function(data){
            $('#slt_distrito_selecionado').html(data);
        }
    })
});
