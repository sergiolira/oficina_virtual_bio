function list_estado_registro_venta(){
    $.ajax({
        url:"controller_func/estado_registro_venta/list.php"
    }).done(function(data){
        $('.table_estado_venta').empty();
        $('.table_estado_venta').append(data);        
    })
}

$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_registro_venta/accion.php',
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
        url:'controller_func/estado_registro_venta/accion.php',
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

$(document).on('click', '.nuevo_agente_categoria_modal',function(){
    var id=$(this).data("id");
    var url="controller_func/estado_registro_venta/create.php?id="+id;
    $.get(url, function(data){
        $("#form_estado_venta").empty();
        $("#form_estado_venta").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar Estado de Venta");
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nuevo Estado de venta");
        }
        $("#modal-form-estado-venta").modal("show");
    })
});


$(document).on('click', '#btn_save', function() {
    var data=$('#form_estado_venta').serialize();
    var strTipoVenta = $("#txt_tipo_venta").val();
    
    if (strTipoVenta == '') {
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
        type:'POST',
        url:'controller_func/estado_registro_venta/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_estado_venta").empty();
                $("#modal-form-estado-venta").modal("hide");
                toastr.success("Se creó el Estado de Venta");
                list_estado_registro_venta();
            }else if(data.trim()=="true_update"){
                $("#form_estado_venta").empty();
                $("#modal-form-estado-venta").modal("hide");
                toastr.success("Se actualizó el Estado de Venta");
                list_estado_registro_venta();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});


$(document).on('click', '.show_estado_venta_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_registro_venta/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_estado_venta").empty();
        $("#form_show_estado_venta").append(data);
        $("#form_show_estado_venta :input").prop('disabled',true);
        $("#modal-show-estado-venta").modal("show");
    })
});