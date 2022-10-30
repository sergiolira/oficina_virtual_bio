/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_categoria').serialize();

    var strcategoria = document.querySelector('#txt_cat').value;
    
    if (strcategoria == '' ) 
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
        url:'controller_func/categoria_producto/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_categoria").empty();
                $("#modal-form-categoria").modal("hide");
                toastr.success("Se agrego categoria"); 
                list_categoria_producto();
                
            }else if(data.trim()=="true_update"){
                $("#form_categoria").empty();
                $("#modal-form-categoria").modal("hide");
                toastr.success("Se actualizo categoria");
                list_categoria_producto();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------Modal lista------*/
function list_categoria_producto()
{
    $.ajax({
        url:"controller_func/categoria_producto/list.php"
    }).done(function(data){
        $('.table-categoria').empty();
        $('.table-categoria').append(data);        
    })
} 


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-categoria', function() {
    var id=$(this).data("id");
    var url="controller_func/categoria_producto/create.php?id="+id;
    $.get(url, function(data){
        $("#form_categoria").empty();
        $("#form_categoria").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar categoria");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo categoria");
        }
        $("#modal-form-categoria").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-categoria', function() {
    var id=$(this).data("id");
    var url="controller_func/categoria_producto/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_categoria").empty();
        $("#form_show_categoria").append(data);
        $("#form_show_categoria :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles categoria producto");
        $("#modal-form-show-categoria").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/categoria_producto/accion.php',
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
        url:'controller_func/categoria_producto/accion.php',
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