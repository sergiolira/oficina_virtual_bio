function list_web_testimonio(){
    $.ajax({
        url:"controller_func/web_testimonio/list.php"
    }).done(function(data){
        $('.table_web_testimonio').empty();
        $('.table_web_testimonio').append(data);        
    })
}

$(document).on('click', '.nuevo_web_testimonio_modal',function(){
    var id=$(this).data("id");
    var url="controller_func/web_testimonio/create.php?id="+id;
    $.get(url, function(data){
        $("#form_web_testimonio").empty();
        $("#form_web_testimonio").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar");
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nuevo");
        }
        $("#modal-form-web-testimonio").modal("show");
    })
});

$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_testimonio/accion.php',
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
        url:'controller_func/web_testimonio/accion.php',
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
    var formulario = document.getElementById("form_web_testimonio");
    var formData = new FormData(formulario);
    if($("#txt_testimonio").val()==""){
        toastr.error("Complete el campo Testimonio.");
        return false;
    }
    if($("#txt_nombre").val()==""){
        toastr.error("Complete el campo Nombre.");
        return false;
    }
    if($("#txt_ape_paterno").val()==""){
        toastr.error("Complete el campo Apellido parterno.");
        return false;
    }
    if($("#txt_ape_materno").val()==""){
        toastr.error("Complete el campo Apellido marterno.");
        return false;
    }
    if($("#txt_cargo").val()==""){
        toastr.error("Complete el campo Cargo.");
        return false;
    }
    if(formData.get("id")<=0){ //si es id es menor a 0 , se pedirá obligatoriamente las imagenes, caso contrario al editar el id es mayor a 0 , entonces no entra en el if
        if(!$('#file_perfil')[0].files[0]){
                toastr.error("Seleccione un archivo (Imagen Perfil)");
                return false;
        }
        if(!$('#file_img_poster')[0].files[0]){
            toastr.error("Seleccione un archivo (Imagen Poster)");
            return false;
        }
        if(!$('#file_video')[0].files[0]){
            toastr.error("Seleccione un archivo (Video)");
            return false;
        }

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
        url:'controller_func/web_testimonio/accion.php',
        data:formData,
        contentType: false,
        cache: false,
        processData:false,
        success:function(data){  
            if(data.trim()=="true_create"){               
                $("#form_web_testimonio").empty();
                $("#modal-form-web-testimonio").modal("hide");
                toastr.success("Creado");
                list_web_testimonio();
            }else if(data.trim()=="true_update"){
                $("#form_web_testimonio").empty();
                $("#modal-form-web-testimonio").modal("hide");
                toastr.success("Actualizado");
                list_web_testimonio();                
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
    var url="controller_func/web_testimonio/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_web_testimonio").empty();
        $("#form_show_web_testimonio").append(data);
        $("#form_show_web_testimonio :input").prop('disabled',true);
        $("#modal-show-web-testimonio").modal("show");
    })
});