function list_tipo_venta(){
    $.ajax({
        url:"controller_func/tipo_venta/list.php"
    }).done(function(data){
        $('.table_tipo_venta').empty();
        $('.table_tipo_venta').append(data);        
    })
}

$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_venta/accion.php',
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
        url:'controller_func/tipo_venta/accion.php',
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

$(document).on('click', '.nuevo_tipo_venta_modal',function(){
    var id=$(this).data("id");
    var url="controller_func/tipo_venta/create.php?id="+id;
    $.get(url, function(data){
        $("#form_tipo_venta").empty();
        $("#form_tipo_venta").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar tipo de Venta");
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nuevo tipo de venta");
        }
        $("#modal-form-tipo-venta").modal("show");
    })
});


$(document).on('click', '#btn_save', function() {
    var data=$('#form_tipo_venta').serialize();
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
        url:'controller_func/tipo_venta/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_tipo_venta").empty();
                $("#modal-form-tipo-venta").modal("hide");
                toastr.success("Se creó el tipo de Venta");
                list_tipo_venta();
            }else if(data.trim()=="true_update"){
                $("#form_tipo_venta").empty();
                $("#modal-form-tipo-venta").modal("hide");
                toastr.success("Se actualizó el tipo de Venta");
                list_tipo_venta();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});


$(document).on('click', '.show_tipo_venta_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_venta/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_tipo_venta").empty();
        $("#form_show_tipo_venta").append(data);
        $("#form_show_tipo_venta :input").prop('disabled',true);
        $("#modal-show-tipo-venta").modal("show");
    })
});