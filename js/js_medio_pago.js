/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gmedio', function() {
    var data=$('#form_medio').serialize();
    
    var strmedio = document.querySelector('#txt_mpago').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strmedio == '') 
    {
        toastr.error("Algunos campos son obligatorios.");
        return false;
    }

    let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) { 
            if(elementsValid[i].classList.contains('is-invalid')) { 
                toastr.error("Atención Por favor verifique los campos en rojo.");                
                return false;
            } 
        }
    
     $.ajax({
        type:'POST',
        url:'controller_func/medio_pago/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_medio").empty();
                $("#modal-form-medio").modal("hide");
                toastr.success("Se creó el medio de pago");
                list_medio_pago();
                
            }else if(data.trim()=="true_update"){
                $("#form_medio").empty();
                $("#modal-form-medio").modal("hide");
                toastr.success("Se actualizó el medio de pago");
                list_medio_pago();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

/* ------ data table Mostrar Lista ------*/
function list_medio_pago()
{
    $.ajax({
        url:"controller_func/medio_pago/listar.php"
    }).done(function(data){
        $('.table_medio').empty();
        $('.table_medio').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_medio_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/medio_pago/create.php?id="+id;
    $.get(url, function(data){
        $("#form_medio").empty();
        $("#form_medio").append(data);
        if(id>0){
            $(".title_medio").empty();
            $(".title_medio").append("Modificar medio de pago");
        }else{
            $(".title_medio").empty();
            $(".title_medio").append("Nuevo medio de pago");
        }
        $("#modal-form-medio").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_medio_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/medio_pago/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_medio").empty();
        $("#form_show_medio").append(data);
        $("#form_show_medio :input").prop('disabled',true);
        $("#modal-show-medio").modal("show");
    })
});

$(document).on('click', '.delete-can', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"delete"};
    $.ajax({
        type:'POST',
        url:'controller_func/candidato/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_delete"){
                toastr.success("Se elimino el item correctamente");
                list_candidatos();
            }
        }
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-medio', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/medio_pago/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_medio"+id).removeClass('btn btn-sm btn-success activar-medio').addClass('btn btn-sm btn-danger desactivar-medio');
                $("#icon_medio"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-medio', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/medio_pago/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_medio"+id).removeClass('btn btn-sm btn-danger desactivar-medio').addClass('btn btn-sm btn-success activar-medio');
                $("#icon_medio"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});

