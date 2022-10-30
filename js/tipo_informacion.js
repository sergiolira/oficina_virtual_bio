$(document).on('click', '#btn_save', function() {
    var data=$('#form_informacion').serialize();
    var strinfo = document.querySelector('#txt_inf').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strinfo == '' || strobservacion == '' ) 
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
        url:'controller_func/tipo_informacion/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_informacion").empty();
                $("#modal-form-informacion").modal("hide");
                toastr.success("Se agrego un nuevo tipo de informacion");
                list_tipoinfo();
                
            }else if(data.trim()=="true_update"){
                $("#form_informacion").empty();
                $("#modal-form-informacion").modal("hide");
                toastr.success("Se actualizo el tipo de informacion");
                list_tipoinfo();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ data table Mostrar Lista ------*/
function list_tipoinfo()
{
    $.ajax({
        url:"controller_func/tipo_informacion/list.php"
    }).done(function(data){
        $('.table-tipo-infor').empty();
        $('.table-tipo-infor').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-infor', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_informacion/create.php?id="+id;
    $.get(url, function(data){
        $("#form_informacion").empty();
        $("#form_informacion").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar tipo información");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo tipo información");
        }
        $("#modal-form-informacion").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-infor', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_informacion/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_informacion").empty();
        $("#form_show_informacion").append(data);
        $("#form_show_informacion :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles tipo información");
        $("#modal-form-show-informacion").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_informacion/accion.php',
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
        url:'controller_func/tipo_informacion/accion.php',
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