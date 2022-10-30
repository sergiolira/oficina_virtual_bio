/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_estado_solicitud_dinersclub').serialize();
    var strSolicitudDinerclud = document.querySelector('#txt_sd').value;
    var strEstyleColor = document.querySelector('#txt_stc').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strSolicitudDinerclud == '' || strEstyleColor == '') 
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
        url:'controller_func/estado_solicitud_dinersclub/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_estado_solicitud_dinersclub").empty();
                $("#modal-form-estado_solicitud_dinersclub").modal("hide");
                toastr.success("Se agrego una nueva solicitud dinersclub");
                list_estado_solicitud_dinersclub();
            }else if(data.trim()=="true_update"){
                $("#form_estado_solicitud_dinersclub").empty();
                $("#modal-form-estado_solicitud_dinersclub").modal("hide");
                toastr.success("Se actualizo solicitud dinersclub");
                list_estado_solicitud_dinersclub();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ data table Mostrar Lista ------*/
function list_estado_solicitud_dinersclub()
{
    $.ajax({
        url:"controller_func/estado_solicitud_dinersclub/list.php"
    }).done(function(data){
        $('.table-estado_solicitud_dinersclub').empty();
        $('.table-estado_solicitud_dinersclub').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-estado_solicitud_dinersclub', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_solicitud_dinersclub/create.php?id="+id;
    $.get(url, function(data){
        $("#form_estado_solicitud_dinersclub").empty();
        $("#form_estado_solicitud_dinersclub").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar estado de solicitud dinersclub");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo estado de solicitud dinersclub");
        }
        $("#modal-form-estado_solicitud_dinersclub").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-estado_solicitud_dinersclub', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_solicitud_dinersclub/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_estado_solicitud_dinersclub").empty();
        $("#form_show_estado_solicitud_dinersclub").append(data);
        $("#form_show_estado_solicitud_dinersclub :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles de solicitud dinersclub");
        $("#modal-form-show-estado_solicitud_dinersclub").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_solicitud_dinersclub/accion.php',
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
        url:'controller_func/estado_solicitud_dinersclub/accion.php',
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