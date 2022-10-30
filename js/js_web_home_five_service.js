function list_web_home_five_service(){
    $.ajax({
        url:"controller_func/web_home_five_service/list.php"
    }).done(function(data){
        $('.table_five_service').empty();
        $('.table_five_service').append(data);        
    })
}
 
$(document).on('click', '.nuevo_detalle_five_service',function(){
    var id=$(this).data("id");
    var url="controller_func/web_home_five_service/create.php?id="+id;
    $.get(url, function(data){
        $("#form_five_service").empty();
        $("#form_five_service").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar");
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nuevo");
        }
        $("#modal-form-five_service").modal("show");
    })
});

$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_home_five_service/accion.php',
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
        url:'controller_func/web_home_five_service/accion.php',
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
    var formulario = document.getElementById("form_five_service");
    var formData = new FormData(formulario);
    if($("#txt_titulo_h3").val()==""){
        toastr.error("Complete el campo Título.");
        return false;
    }
    if($("#txt_parrafo").val()==""){
        toastr.error("Complete el campo Párrafo.");
        return false;
    }
    if($("#txt_desc_boton").val()==""){
        toastr.error("Complete el campo Desc boton.");
        return false;
    }
    if($("#txt_enlace").val()==""){
        toastr.error("Complete el campo Enlace.");
        return false;
    }
    if($("#txt_tipo").val()==''){
        toastr.error("Complete el campo Tipo.");
        return false;
    }
    if(formData.get("id")<=0){
        if(!$('#input_archivo')[0].files[0]){
                toastr.error("Seleccione un archivo (Imagen)");
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
        url:'controller_func/web_home_five_service/accion.php',
        data:formData,
        contentType: false,
        cache: false,
        processData:false,
        success:function(data){
            console.log(data);
            if(data.trim()=="true_create"){               
                $("#form_five_service").empty();
                $("#modal-form-five_service").modal("hide");
                toastr.success("Creado");
                list_web_home_five_service();
            }else if(data.trim()=="true_update"){
                $("#form_five_service").empty();
                $("#modal-form-five_service").modal("hide");
                toastr.success("Actualizado");
                list_web_home_five_service();                
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
    var url="controller_func/web_home_five_service/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_five_service").empty();
        $("#form_show_five_service").append(data);
        $("#form_show_five_service :input").prop('disabled',true);
        $("#modal-show-five-service").modal("show");
    })
});