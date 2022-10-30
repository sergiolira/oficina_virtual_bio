/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_marca').serialize();

    var strcMarca = document.querySelector('#txt_marca').value;
    
    if (strcMarca == '' ) 
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
        url:'controller_func/marca_producto/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_marca").empty();
                $("#modal-form-marca").modal("hide");
                toastr.success("Se agrego una marca"); 
                list_marca_producto();
                
            }else if(data.trim()=="true_update"){
                $("#form_marca").empty();
                $("#modal-form-marca").modal("hide");
                toastr.success("Se actualizo marca");
                list_marca_producto();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------Modal lista------*/
function list_marca_producto()
{
    $.ajax({
        url:"controller_func/marca_producto/list.php"
    }).done(function(data){
        $('.table-marca').empty();
        $('.table-marca').append(data);        
    })
} 


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-marca', function() {
    var id=$(this).data("id");
    var url="controller_func/marca_producto/create.php?id="+id;
    $.get(url, function(data){
        $("#form_marca").empty();
        $("#form_marca").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar marca");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo marca");
        }
        $("#modal-form-marca").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-marca', function() {
    var id=$(this).data("id");
    var url="controller_func/marca_producto/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_marca").empty();
        $("#form_show_marca").append(data);
        $("#form_show_marca :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles de marca");
        $("#modal-form-show-marca").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/marca_producto/accion.php',
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
        url:'controller_func/marca_producto/accion.php',
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