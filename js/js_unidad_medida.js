/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_medida').serialize();

    var strUnidad = document.querySelector('#txt_unidad').value;
    
    if (strUnidad == '' ) 
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
        url:'controller_func/unidad_medida/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_medida").empty();
                $("#modal-form-medida").modal("hide");
                toastr.success("Se agrego la unidad"); 
                list_unidad_medida();
                
            }else if(data.trim()=="true_update"){
                $("#form_medida").empty();
                $("#modal-form-medida").modal("hide");
                toastr.success("Se actualizo la unidad");
                list_unidad_medida();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------Modal lista------*/
function list_unidad_medida()
{
    $.ajax({
        url:"controller_func/unidad_medida/list.php"
    }).done(function(data){
        $('.table-medida').empty();
        $('.table-medida').append(data);        
    })
} 


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-medida', function() {
    var id=$(this).data("id");
    var url="controller_func/unidad_medida/create.php?id="+id;
    $.get(url, function(data){
        $("#form_medida").empty();
        $("#form_medida").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar unidad de medida");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo unidad de medida");
        }
        $("#modal-form-medida").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-medida', function() {
    var id=$(this).data("id");
    var url="controller_func/unidad_medida/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_unidad").empty();
        $("#form_show_unidad").append(data);
        $("#form_show_unidad :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles unidad medida");
        $("#modal-form-show-unidad").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/unidad_medida/accion.php',
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
        url:'controller_func/unidad_medida/accion.php',
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