/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_archivo').serialize();


    var strArchivo = document.querySelector('#txt_arch').value;
    //var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strArchivo == '' ) 
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
        url:'controller_func/tipo_archivo/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_archivo").empty();
                $("#modal-form-archivo").modal("hide");
                toastr.success("Se agrego un nuevo tipo de archivo");
                list_tipoarchivo();
                
            }else if(data.trim()=="true_update"){
                $("#form_archivo").empty();
                $("#modal-form-archivo").modal("hide");
                toastr.success("Se actualizo el tipo de archivo");
                list_tipoarchivo();                

            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");


            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ data table Mostrar Lista ------*/
function list_tipoarchivo()
{
    $.ajax({
        url:"controller_func/tipo_archivo/list.php"
    }).done(function(data){
        $('.table-tipo-Archivo').empty();
        $('.table-tipo-Archivo').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-archivo', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_archivo/create.php?id="+id;
    $.get(url, function(data){
        $("#form_archivo").empty();
        $("#form_archivo").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar archivo");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo archivo");
        }
        $("#modal-form-archivo").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-archivo', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_archivo/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_archivo").empty();
        $("#form_show_archivo").append(data);
        $("#form_show_archivo :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles tipo archivo");
        $("#modal-form-show-archivo").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_archivo/accion.php',
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

/* ------ Desactiar Estado------*/
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_archivo/accion.php',
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