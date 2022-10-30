function list_web_home_pricing(){
    $.ajax({
        url:"controller_func/web_home_pricing/list.php"
    }).done(function(data){
        $('.table_home_pricing').empty();
        $('.table_home_pricing').append(data);        
    })
}

$(document).on('click', '.nuevo_home_pricing_modal',function(){
    var id=$(this).data("id");
    var url="controller_func/web_home_pricing/create.php?id="+id;
    $.get(url, function(data){
        $("#form_home_pricing").empty();
        $("#form_home_pricing").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar");
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nuevo");
        }
        $("#modal-form-home-pricing").modal("show");
    })
});

$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_home_pricing/accion.php',
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
        url:'controller_func/web_home_pricing/accion.php',
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
    var data=$('#form_home_pricing').serialize();
    let elementsValid = document.getElementsByClassName("valid");

    if($("#txt_titulo_h3").val()==""){
        toastr.error("Complete el campo Título.");
        return false;
    }
    if($("#txt_span").val()==""){
        toastr.error("Complete el campo Span.");
        return false;
    }
    if($("#txt_icono").val()==""){
        toastr.error("Complete el campo Icono.");
        return false;
    }
    if($("#txt_enlace").val()==""){
        toastr.error("Complete el campo Enlace.");
        return false;
    }
    for (let i = 0; i < elementsValid.length; i++) { 
        if(elementsValid[i].classList.contains('is-invalid')) { 
            toastr.error("Atencion Por favor verifique los campos en rojo.");                
            return false;
        } 
    } 
    $.ajax({
        type:'POST',
        url:'controller_func/web_home_pricing/accion.php',
        data:data,
        success:function(data){  
            console.log(data);
            if(data.trim()=="true_create"){               
                $("#form_home_pricing").empty();
                $("#modal-form-home-pricing").modal("hide");
                toastr.success("Creado");
                list_web_home_pricing();
            }else if(data.trim()=="true_update"){
                $("#form_home_pricing").empty();
                $("#modal-form-home-pricing").modal("hide");
                toastr.success("Actualizado");
                list_web_home_pricing();                
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
    var url="controller_func/web_home_pricing/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_home_pricing").empty();
        $("#form_show_home_pricing").append(data);
        $("#form_show_home_pricing :input").prop('disabled',true);
        $("#modal-show-home-pricing").modal("show");
    })
});