/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save_cat', function() {
    var data=$('#form_categoria_preguntas').serialize();
    var strcategoria = document.querySelector('#txt_cat').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strcategoria == '' || strobservacion == '' ) 
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
        url:'controller_func/categoria_preguntas_frecuente/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_categoria_preguntas").empty();
                $("#modal-form-categoria").modal("hide");
                toastr.success("Se agrego nueva categoria");
                list_preguntas_frecuente();
                
            }else if(data.trim()=="true_update"){
                $("#form_categoria_preguntas").empty();
                $("#modal-form-categoria").modal("hide");
                toastr.success("Se actualizo la categoria");
                list_preguntas_frecuente();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});
/* ------ data table Mostrar Lista ------*/
function list_categoria_preguntas_frecuente()
{
    $.ajax({
        url:"controller_func/categoria_preguntas_frecuente/list.php"
    }).done(function(data){
        $('.table-categoria-preguntas').empty();
        $('.table-categoria-preguntas').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-categoria-preguntas', function() {
    document.getElementById('btn_save').disabled = true;
    var id=$(this).data("id");
    var url="controller_func/categoria_preguntas_frecuente/create.php?id="+id;
    $.get(url, function(data){
        $("#form_categoria_preguntas").empty();
        $("#form_categoria_preguntas").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar categoria");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nueva categoria");
        }
        $("#modal-form-categoria-preguntas").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/categoria_preguntas_frecuente/accion.php',
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
        url:'controller_func/categoria_preguntas_frecuente/accion.php',
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