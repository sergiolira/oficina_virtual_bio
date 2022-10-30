/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_estilo').serialize();
    var strstyle_col_md = document.querySelector('#txt_style').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strstyle_col_md == '' || strobservacion == '' ) 
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
        url:'controller_func/style_col_md/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_estilo").empty();
                $("#modal-form-estilo").modal("hide");
                toastr.success("Se agrego un nuevo Estilo");
                list_style_col_md();
                
            }else if(data.trim()=="true_update"){
                $("#form_estilo").empty();
                $("#modal-form-estilo").modal("hide");
                toastr.success("Se actualizo el Estilo");
                list_style_col_md();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ data table Mostrar Lista ------*/
function list_style_col_md()
{
    $.ajax({
        url:"controller_func/style_col_md/list.php"
    }).done(function(data){
        $('.table-estilo').empty();
        $('.table-estilo').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-estilo', function() {
    var id=$(this).data("id");
    var url="controller_func/style_col_md/create.php?id="+id;
    $.get(url, function(data){
        $("#form_estilo").empty();
        $("#form_estilo").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar estilo");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo estilo");
        }
        $("#modal-form-estilo").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-estilo', function() {
    var id=$(this).data("id");
    var url="controller_func/style_col_md/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_estilo").empty();
        $("#form_show_estilo").append(data);
        $("#form_show_estilo :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles style_col_md");
        $("#modal-form-show-estilo").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/style_col_md/accion.php',
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
        url:'controller_func/style_col_md/accion.php',
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