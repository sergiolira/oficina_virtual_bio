/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_beneficio_producto').serialize();
    var strTitulo = document.querySelector('#txt_titulo').value;
    var strDescripcion = document.querySelector('#txt_descripcion').value;
    var strId_producto= document.querySelector('#slt_producto').value;
    
    if (strTitulo == '' || strDescripcion == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    if (strId_producto == 0 ) 
    {
        toastr.error("Seleccione un producto.");
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
        url:'controller_func/beneficio_producto/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_beneficio_producto").empty();
                $("#modal-form-beneficio_producto").modal("hide");
                toastr.success("Se agrego un beneficio producto");
                list_beneficio_producto();
                
            }else if(data.trim()=="true_update"){
                $("#form_beneficio_producto").empty();
                $("#modal-form-beneficio_producto").modal("hide");
                toastr.success("Se actualizo beneficio producto");
                list_beneficio_producto();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ list vista------*/
function list_beneficio_producto()
{
    $.ajax({
        url:"controller_func/beneficio_producto/list.php"
    }).done(function(data){
        $('.table-beneficio_producto').empty();
        $('.table-beneficio_producto').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-beneficio_producto', function() {
    var id=$(this).data("id");
    var url="controller_func/beneficio_producto/create.php?id="+id;
    $.get(url, function(data){
        $("#form_beneficio_producto").empty();
        $("#form_beneficio_producto").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar beneficio producto");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo beneficio producto");
        }
        $("#modal-form-beneficio_producto").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-beneficio_producto', function() {
    var id=$(this).data("id");
    var url="controller_func/beneficio_producto/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_beneficio_producto").empty();
        $("#form_show_beneficio_producto").append(data);
        $("#form_show_beneficio_producto :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles beneficio producto");
        $("#modal-form-show-beneficio_producto").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/beneficio_producto/accion.php',
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
        url:'controller_func/beneficio_producto/accion.php',
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