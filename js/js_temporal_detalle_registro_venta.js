function list_temporal_detalle_registro_venta(){
    $.ajax({
        url:"controller_func/temporal_detalle_registro_venta/list.php"
    }).done(function(data){
        $('.table_detalle_venta_temporal').empty();
        $('.table_detalle_venta_temporal').append(data);        
    })
}

$(document).on('click', '.nuevo_detalle_venta_modal_temporal',function(){
    var id=$(this).data("id");
    var url="controller_func/temporal_detalle_registro_venta/create.php?id="+id;
    $.get(url, function(data){
        $("#form_detalle_venta_temporal").empty();
        $("#form_detalle_venta_temporal").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar Detalle Registro Venta Temporal");
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nuevo Detalle Registro Venta Temporal");
        }
        $("#modal-form-detalle-venta-temporal").modal("show");
    })
});

$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/temporal_detalle_registro_venta/accion.php',
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
        url:'controller_func/temporal_detalle_registro_venta/accion.php',
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
    var data=$('#form_detalle_venta_temporal').serialize();
    if($("#slt_tipo_venta").val()==0){
        toastr.error("Seleccione un tipo de venta");
        return false;
    }
    if($("#txt_cantidad").val()==""){
        toastr.error("Complete el campo cantidad");
        return false;
    }
    if($("#slt_producto").val()==0){
        toastr.error("Seleccione un producto");
        return false;
    }
    if($("#slt_paquete").val()==0){
        toastr.error("Seleccione un paquete");
        return false;
    }
    if($("#slt_descuento").val()==0){
        toastr.error("Seleccione un descuento");
        return false;
    }
    if($("#txt_precio_unitario").val()==""){
        toastr.error("Complete el campo precio unitario");
        return false;
    }
    if($("#txt_sub_total").val()==""){
        toastr.error("Complete el campo sub total");
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
        url:'controller_func/temporal_detalle_registro_venta/accion.php',
        data:data,
        success:function(data){     
            if(data.trim()=="true_create"){               
                $("#form_detalle_venta_temporal").empty();
                $("#modal-form-detalle-venta-temporal").modal("hide");
                toastr.success("Se creó Detalle venta Temporal");
                list_temporal_detalle_registro_venta();
            }else if(data.trim()=="true_update"){
                $("#form_detalle_venta_temporal").empty();
                $("#modal-form-detalle-venta-temporal").modal("hide");
                toastr.success("Se actualizó el Detalle venta Temporal");
                list_temporal_detalle_registro_venta();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});


$(document).on('click', '.show_detalle_venta_modal_temporal', function() {
    var id=$(this).data("id");
    var url="controller_func/temporal_detalle_registro_venta/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_detalle_venta_temporal").empty();
        $("#form_show_detalle_venta_temporal").append(data);
        $("#form_show_detalle_venta_temporal :input").prop('disabled',true);
        $("#modal-show-detalle-venta-temporal").modal("show");
    })
});