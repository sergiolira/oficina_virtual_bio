/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_paquete_producto_cabecera').serialize();
    var strPaq_producto = document.querySelector('#txt_paquete_producto').value;
    
    if (strPaq_producto == '' ) 
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
        url:'controller_func/paquete_producto_cabecera/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_paquete_producto_cabecera").empty();
                $("#modal-form-paquete_producto_cabecera").modal("hide");
                toastr.success("Se agrego un tipo descuento");
                list_paquete_producto_cabecera();
                
            }else if(data.trim()=="true_update"){
                $("#form_paquete_producto_cabecera").empty();
                $("#modal-form-paquete_producto_cabecera").modal("hide");
                toastr.success("Se actualizo tipo descuento");
                list_paquete_producto_cabecera();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ list vista------*/
function list_paquete_producto_cabecera()
{
    $.ajax({
        url:"controller_func/paquete_producto_cabecera/list.php"
    }).done(function(data){
        $('.table-paquete_producto_cabecera').empty();
        $('.table-paquete_producto_cabecera').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-paquete_producto_cabecera', function() {
    var id=$(this).data("id");
    var url="controller_func/paquete_producto_cabecera/create.php?id="+id;
    $.get(url, function(data){
        $("#form_paquete_producto_cabecera").empty();
        $("#form_paquete_producto_cabecera").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar paquete producto");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo paquete producto");
        }
        $("#modal-form-paquete_producto_cabecera").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-paquete_producto_cabecera', function() {
    var id=$(this).data("id");
    var url="controller_func/paquete_producto_cabecera/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_paquete_producto_cabecera").empty();
        $("#form_show_paquete_producto_cabecera").append(data);
        $("#form_show_paquete_producto_cabecera :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles paquete producto");
        $("#modal-form-show-paquete_producto_cabecera").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/paquete_producto_cabecera/accion.php',
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
        url:'controller_func/paquete_producto_cabecera/accion.php',
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