/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_paquete_detalle_producto').serialize();
    var strPproducto = document.querySelector('#slt_paquete_producto').value;
    var strProducto = document.querySelector('#slt_producto').value;
    var strCantidad = document.querySelector('#txt_cantidad').value;
    var strPventa = document.querySelector('#txt_precio_venta').value;
    
    if (strPproducto == '' ) 
    {
        toastr.error("Seleccione un paquete producto.");
        return false;
    }
    if (strProducto == '' ) 
    {
        toastr.error("Seleccione un producto.");
        return false;
    }
    if (strCantidad == '' ) 
    {
        toastr.error("Ingrese una cantidad.");
        return false;
    }
    if (strPventa == '' ) 
    {
        toastr.error("Ingrese una precio de venta.");
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
        url:'controller_func/paquete_detalle_producto/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_paquete_detalle_producto").empty();
                $("#modal-form-paquete_detalle_producto").modal("hide");
                toastr.success("Se agrego un detalle paquete");
                list_paquete_detalle_producto();
                
            }else if(data.trim()=="true_update"){
                $("#form_paquete_detalle_producto").empty();
                $("#modal-form-paquete_detalle_producto").modal("hide");
                toastr.success("Se actualizo un detalle paquete");
                list_paquete_detalle_producto();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ list vista------*/
function list_paquete_detalle_producto()
{
    $.ajax({
        url:"controller_func/paquete_detalle_producto/list.php"
    }).done(function(data){
        $('.table-paquete_detalle_producto').empty();
        $('.table-paquete_detalle_producto').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-paquete_detalle_producto', function() {
    var id=$(this).data("id");
    var url="controller_func/paquete_detalle_producto/create.php?id="+id;
    $.get(url, function(data){
        $("#form_paquete_detalle_producto").empty();
        $("#form_paquete_detalle_producto").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar detalle paquete");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo detalle paquete");
        }
        $("#modal-form-paquete_detalle_producto").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-paquete_detalle_producto', function() {
    var id=$(this).data("id");
    var url="controller_func/paquete_detalle_producto/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_paquete_detalle_producto").empty();
        $("#form_show_paquete_detalle_producto").append(data);
        $("#form_show_paquete_detalle_producto :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles paquete producto");
        $("#modal-form-show-paquete_detalle_producto").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/paquete_detalle_producto/accion.php',
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
        url:'controller_func/paquete_detalle_producto/accion.php',
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