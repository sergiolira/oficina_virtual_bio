/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_divisa').serialize();
    var strdivisa = document.querySelector('#txt_divisa').value;
    
    if (strdivisa == '' ) 
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
        url:'controller_func/divisa/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_divisa").empty();
                $("#modal-form-divisa").modal("hide");
                toastr.success("Se agrego una divisa");
                list_divisa();
                
            }else if(data.trim()=="true_update"){
                $("#form_divisa").empty();
                $("#modal-form-divisa").modal("hide");
                toastr.success("Se actualizo divisa");
                list_divisa();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ list vista------*/
function list_divisa()
{
    $.ajax({
        url:"controller_func/divisa/list.php"
    }).done(function(data){
        $('.table-divisa').empty();
        $('.table-divisa').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-divisa', function() {
    var id=$(this).data("id");
    var url="controller_func/divisa/create.php?id="+id;
    $.get(url, function(data){
        $("#form_divisa").empty();
        $("#form_divisa").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar divisa");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo divisa");
        }
        $("#modal-form-divisa").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-divisa', function() {
    var id=$(this).data("id");
    var url="controller_func/divisa/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_divisa").empty();
        $("#form_show_divisa").append(data);
        $("#form_show_divisa :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles divisa");
        $("#modal-form-show-divisa").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/divisa/accion.php',
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
        url:'controller_func/divisa/accion.php',
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