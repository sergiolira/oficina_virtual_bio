/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_ubigeo_peru_provinces').serialize();
    var strTitulo = document.querySelector('#txt_title').value;
    
    if (strTitulo == '') 
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
        url:'controller_func/ubigeo_peru_provinces/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_ubigeo_peru_provinces").empty();
                $("#modal-form-ubigeo-peru-provinces").modal("hide");
                toastr.success("Se agrego un nuevo ubigeo-peru-provinces");
                list_ubigeo_peru_provinces();
                
            }else if(data.trim()=="true_update"){
                $("#form_ubigeo_peru_provinces").empty();
                $("#modal-form-ubigeo-peru-provinces").modal("hide");
                toastr.success("Se actualizo ubigeo-peru-provinces");
                list_ubigeo_peru_provinces();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------Modal SHOW vista------*/
function list_ubigeo_peru_provinces()
{
    $.ajax({
        url:"controller_func/ubigeo_peru_provinces/list.php"
    }).done(function(data){
        $('.table-ubigeo-peru-provinces').empty();
        $('.table-ubigeo-peru-provinces').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-ubigeo-peru-provinces', function() {
    var id=$(this).data("id");
    var url="controller_func/ubigeo_peru_provinces/create.php?id="+id;
    $.get(url, function(data){
        $("#form_ubigeo_peru_provinces").empty();
        $("#form_ubigeo_peru_provinces").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar ubigeo-peru-provinces.");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo ubigeo-peru-provinces.");
        }
        $("#modal-form-ubigeo-peru-provinces").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-ubigeo-peru-provinces', function() {
    var id=$(this).data("id");
    var url="controller_func/ubigeo_peru_provinces/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_ubigeo_peru_provinces").empty();
        $("#form_show_ubigeo_peru_provinces").append(data);
        $("#form_show_ubigeo_peru_provinces :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles tipo de documento");
        $("#modal-form-show-ubigeo-peru-provinces").modal("show");
    })
});

/* ------ Activar Estado------
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_provinces/accion.php',
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
});*/

/* ------ Desactivar Estado------
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_provinces/accion.php',
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
});*/
