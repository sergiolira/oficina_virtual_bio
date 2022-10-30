/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_campania').serialize();
    var strCampana = document.querySelector('#txt_can').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strCampana == '' || strobservacion == '' ) 
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
        url:'controller_func/campania/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_campania").empty();
                $("#modal-form-campania").modal("hide");
                toastr.success("Se agrego una campaña");
                list_campania();
                
            }else if(data.trim()=="true_update"){
                $("#form_campania").empty();
                $("#modal-form-campania").modal("hide");
                toastr.success("Se actualizo campaña");
                list_campania();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------Modal SHOW vista------*/
function list_campania()
{
    $.ajax({
        url:"controller_func/campania/list.php"
    }).done(function(data){
        $('.table-campania').empty();
        $('.table-campania').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-campania', function() {
    var id=$(this).data("id");
    var url="controller_func/campania/create.php?id="+id;
    $.get(url, function(data){
        $("#form_campania").empty();
        $("#form_campania").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar campaña");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo campaña");
        }
        $("#modal-form-campania").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-campania', function() {
    var id=$(this).data("id");
    var url="controller_func/campania/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_campania").empty();
        $("#form_show_campania").append(data);
        $("#form_show_campania :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles campaña");
        $("#modal-form-show-campania").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/campania/accion.php',
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
        url:'controller_func/campania/accion.php',
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