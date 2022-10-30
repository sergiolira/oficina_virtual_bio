
/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_estado_segmento_mkf').serialize();
    var strMkf = document.querySelector('#txt_mkf').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strMkf == '' || strobservacion == '' ) 
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
        url:'controller_func/estado_segmento_mkf/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_estado_segmento_mkf").empty();
                $("#modal-form-estado-segmento-mkf").modal("hide");
                toastr.success("Se agrego un nuevo estado de segmento mkf");
                list_estado_segmento_mkf();
            }else if(data.trim()=="true_update"){
                $("#form_estado_segmento_mkf").empty();
                $("#modal-form-estado-segmento-mkf").modal("hide");
                toastr.success("Se actualizo estado de segmento mkf");
                list_estado_segmento_mkf();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ data table Mostrar Lista ------*/
function list_estado_segmento_mkf()
{
    $.ajax({
        url:"controller_func/estado_segmento_mkf/list.php"
    }).done(function(data){
        $('.table-estado-segmento-mkf').empty();
        $('.table-estado-segmento-mkf').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-estado-segmento-mkf', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_segmento_mkf/create.php?id="+id;
    $.get(url, function(data){
        $("#form_estado_segmento_mkf").empty();
        $("#form_estado_segmento_mkf").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar estado segmento mkf");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo estado segmento mkf");
        }
        $("#modal-form-estado-segmento-mkf").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-estado-segmento-mkf', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_segmento_mkf/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_estado_segmento_mkf").empty();
        $("#form_show_estado_segmento_mkf").append(data);
        $("#form_show_estado_segmento_mkf :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles estado de segmento mkf");
        $("#modal-form-show-estado-segmento-mkf").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_segmento_mkf/accion.php',
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
        url:'controller_func/estado_segmento_mkf/accion.php',
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