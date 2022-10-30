function list_web_home_video(){
    $.ajax({
        url:"controller_func/web_home_video/list.php"
    }).done(function(data){
        $('.table_home_video').empty();
        $('.table_home_video').append(data);        
    })
}

$(document).on('click', '.nuevo_detalle_home_video',function(){
    var id=$(this).data("id");
    var url="controller_func/web_home_video/create.php?id="+id;
    $.get(url, function(data){
        $("#form_home_video").empty();
        $("#form_home_video").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar");
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nuevo");
        }
        $("#modal-form-home-video").modal("show");
    })
});

$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_home_video/accion.php',
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
        url:'controller_func/web_home_video/accion.php',
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
    var formulario = document.getElementById("form_home_video");
    var formData = new FormData(formulario);
    if($("#txt_titulo_h2").val()==""){
        toastr.error("Complete el campo Título.");
        return false;
    }
    if($("#txt_parrafo").val()==""){
        toastr.error("Complete el campo Párrafo.");
        return false;
    }
    if(formData.get("id")<=0){
        if(!$('#input_imagen_poster')[0].files[0]){
                toastr.error("Seleccione un archivo (Imagen Poster)");
                return false;
        }
        if(!$('#input_imagen_fondo')[0].files[0]){
            toastr.error("Seleccione un archivo (Imagen Fondo)");
            return false;
        }
        if(!$('#input_video')[0].files[0]){
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
        url:'controller_func/web_home_video/accion.php',
        data:formData,
        contentType: false,
        cache: false,
        processData:false,
        success:function(data){ 
            console.log(data);
            if(data.trim()=="true_create"){               
                $("#form_home_video").empty();
                $("#modal-form-home-video").modal("hide");
                toastr.success("Creado");
                list_web_home_video();
            }else if(data.trim()=="true_update"){
                $("#form_home_video").empty();
                $("#modal-form-home-video").modal("hide");
                toastr.success("Actualizado");
                list_web_home_video();                
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
    var url="controller_func/web_home_video/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_home_video").empty();
        $("#form_show_home_video").append(data);
        $("#form_show_home_video :input").prop('disabled',true);
        $("#modal-show-home-video").modal("show");
    })
});