/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_forma_pago').serialize();
    var strFormaPago = document.querySelector('#txt_fp').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strFormaPago == '' || strobservacion == '' ) 
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
        url:'controller_func/forma_pago/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_forma_pago").empty();
                $("#modal-form-forma-pago").modal("hide");
                toastr.success("Se agrego una forma de pago");
                list_forma_pago();
            }else if(data.trim()=="true_update"){
                $("#form_forma_pago").empty();
                $("#modal-form-forma-pago").modal("hide");
                toastr.success("Se actualizo la forma de pago");
                list_forma_pago();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ data table Mostrar Lista ------*/
function list_forma_pago()
{
    $.ajax({
        url:"controller_func/forma_pago/list.php"
    }).done(function(data){
        $('.table-forma-pago').empty();
        $('.table-forma-pago').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-forma-pago', function() {
    var id=$(this).data("id");
    var url="controller_func/forma_pago/create.php?id="+id;
    $.get(url, function(data){
        $("#form_forma_pago").empty();
        $("#form_forma_pago").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar forma de pago");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo forma de pago");
        }
        $("#modal-form-forma-pago").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-forma-pago', function() {
    var id=$(this).data("id");
    var url="controller_func/forma_pago/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_forma_pago").empty();
        $("#form_show_forma_pago").append(data);
        $("#form_show_forma_pago :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles forma de pago");
        $("#modal-form-show-forma-pago").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/forma_pago/accion.php',
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
        url:'controller_func/forma_pago/accion.php',
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