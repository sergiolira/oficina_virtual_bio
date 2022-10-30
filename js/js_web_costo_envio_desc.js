/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_web_costo_envio_desc').serialize();
    var strWebCosto = document.querySelector('#txt_web_costo').value;
    
    if (strWebCosto == '' ) 
    {
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
        url:'controller_func/web_costo_envio_desc/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_web_costo_envio_desc").empty();
                $("#modal-form-web_costo_envio_desc").modal("hide");
                toastr.success("Se agrego un web costo envio desc");
                list_web_costo_envio_desc();
                
            }else if(data.trim()=="true_update"){
                $("#form_web_costo_envio_desc").empty();
                $("#modal-form-web_costo_envio_desc").modal("hide");
                toastr.success("Se actualizo web costo envio desc");
                list_web_costo_envio_desc();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ list vista------*/
function list_web_costo_envio_desc()
{
    $.ajax({
        url:"controller_func/web_costo_envio_desc/list.php"
    }).done(function(data){
        $('.table-web_costo_envio_desc').empty();
        $('.table-web_costo_envio_desc').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-web_costo_envio_desc', function() {
    var id=$(this).data("id");
    var url="controller_func/web_costo_envio_desc/create.php?id="+id;
    $.get(url, function(data){
        $("#form_web_costo_envio_desc").empty();
        $("#form_web_costo_envio_desc").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar web costo envio desc");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo web costo envio desc");
        }
        $("#modal-form-web_costo_envio_desc").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-web_costo_envio_desc', function() {
    var id=$(this).data("id");
    var url="controller_func/web_costo_envio_desc/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_web_costo_envio_desc").empty();
        $("#form_show_web_costo_envio_desc").append(data);
        $("#form_show_web_costo_envio_desc :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles web costo envio desc");
        $("#modal-form-show-web_costo_envio_desc").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_costo_envio_desc/accion.php',
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

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_costo_envio_desc/accion.php',
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