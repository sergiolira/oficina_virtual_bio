/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_tipo_producto').serialize();

    var strcTipoproducto = document.querySelector('#txt_tipo').value;
    
    if (strcTipoproducto == '' ) 
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
        url:'controller_func/tipo_producto/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_tipo_producto").empty();
                $("#modal-form-tipo_producto").modal("hide");
                toastr.success("Se agrego nuevo tipo producto"); 
                list_tipo_producto();
                
            }else if(data.trim()=="true_update"){
                $("#form_tipo_producto").empty();
                $("#modal-form-tipo_producto").modal("hide");
                toastr.success("Se actualizo tipo producto");
                list_tipo_producto();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------Modal lista------*/
function list_tipo_producto()
{
    $.ajax({
        url:"controller_func/tipo_producto/list.php"
    }).done(function(data){
        $('.table-tipo_producto').empty();
        $('.table-tipo_producto').append(data);        
    })
} 


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-tipo_producto', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_producto/create.php?id="+id;
    $.get(url, function(data){
        $("#form_tipo_producto").empty();
        $("#form_tipo_producto").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar tipo producto");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo tipo producto");
        }
        $("#modal-form-tipo_producto").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-tipo-producto', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_producto/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_tipo_producto").empty();
        $("#form_show_tipo_producto").append(data);
        $("#form_show_tipo_producto :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles tipo producto");
        $("#modal-form-show-tipo_producto").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_producto/accion.php',
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
        url:'controller_func/tipo_producto/accion.php',
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