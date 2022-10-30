function list_cabecera_registro_venta(){
    $.ajax({
        url:"controller_func/cabecera_registro_venta/list.php"
    }).done(function(data){
        $('.table_detalle_venta').empty();
        $('.table_detalle_venta').append(data);        
    })
}

$(document).on('click', '.nuevo_detalle_venta_modal',function(){
    var id=$(this).data("id");
    var url="controller_func/cabecera_registro_venta/create.php?id="+id;
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
    if($("#txt_fecha_pedido").val()==""){
        toastr.error("Complete el campo fecha pedido");
        return false;
    }
    if($("#txt_fecha_entrega").val()==""){
        toastr.error("Complete el campo fecha entrega");
        return false;
    }
    if($("#txt_correo").val()==""){
        toastr.error("Complete el campo correo");
        return false;
    }
    if($("#txt_numero_documento").val()==""){
        toastr.error("Complete el campo número de documento");
        return false;
    }
    if($("#txt_tipo_cliente").val()==""){
        toastr.error("Complete el campo tipo cliente");
        return false;
    }
    if($("#slt_pais_seleccionado").val()==0){
        toastr.error("Seleccione un País");
        return false;
    }
    if($("#slt_departamento_seleccionado").val()==0){
        toastr.error("Seleccione un Departamento");
        return false;
    }
    if($("#slt_provincia_seleccionado").val()==0){
        toastr.error("Seleccione una Provincia");
        return false;
    }
    if($("#slt_distrito_seleccionado").val()==0){
        toastr.error("Seleccione un Distrito");
        return false;
    }
    if($("#txt_direccion").val()==""){
        toastr.error("Complete el campo Dirección");
        return false;
    }
    if($("#txt_referencia").val()==""){
        toastr.error("Complete el campo referencia");
        return false;
    }
    if($("#txt_enlace_ubigeo").val()==""){
        toastr.error("Complete el campo enlace ubigeo");
        return false;
    }
    if($("#slt_estado_registro_venta").val()==0){
        toastr.error("Seleccione un estado de venta");
        return false;
    }

    if($("#txt_total_descuento").val()==""){
        toastr.error("Complete el campo total descuento");
        return false;
    }
    if($("#txt_impuesto").val()==""){
        toastr.error("Complete el campo impuesto");
        return false;
    }
    if($("#txt_costo_envio").val()==""){
        toastr.error("Complete el campo costo envio");
        return false;
    }
    if($("#txt_total").val()==""){
        toastr.error("Complete el campo total");
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
        type:'POST',
        url:'controller_func/cabecera_registro_venta/accion.php',
        data:data,
        success:function(data){     
            console.log(data);
            if(data.trim()=="true_create"){               
                $("#form_detalle_venta").empty();
                $("#modal-form-detalle-venta").modal("hide");
                toastr.success("Se creó Venta Cabecera");
                list_cabecera_registro_venta();
            }else if(data.trim()=="true_update"){
                $("#form_detalle_venta").empty();
                $("#modal-form-detalle-venta").modal("hide");
                toastr.success("Se actualizó la Venta Cabecera");
                list_cabecera_registro_venta();                
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


//option event change value 
$(document).on('change', '#slt_departamento_seleccionado', function() {
    var selected=$("#slt_departamento_seleccionado").val()
    $("#slt_distrito_selecionado").find('option').remove().end().append('<option value="0">SELECCIONAR DISTRITO</option>').val('0');
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_provinces/combo_x_dep.php',
        data:{'id_departamento_seleccionado': selected} ,
        success:function(data){  
            $('#slt_provincia_seleccionado').html(data);
        }
    })
});
//obtener "value"
$(document).on('change', '#slt_provincia_seleccionado', function() {    
    var selected = $("#slt_provincia_seleccionado").val();
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_districts/combo_x_prov.php',
        data:{'id_provincia_seleccionado': selected} ,
        success:function(data){
            $('#slt_distrito_seleccionado').html(data);
        }
    })
});