/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gestpro', function() {
    var data=$('#form_estpro').serialize();

    var strestpro = document.querySelector('#txt_estpro').value;
    var strestcol = document.querySelector('#txt_estcol').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strestpro == '' || strestcol == '' ) 
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
        url:'controller_func/estado_solicitud_prolife/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_estpro").empty();
                $("#modal-form-estpro").modal("hide");
                toastr.success("Se creó el estado sol.prolife");
                list_estado_solicitud_prolife();
                
            }else if(data.trim()=="true_update"){
                $("#form_estpro").empty();
                $("#modal-form-estpro").modal("hide");
                toastr.success("Se actualizó el estado sol. prolife");
                list_estado_solicitud_prolife();                
            }else{
                toastr.error("No se grabó los datos correctamente");
            }
        }
    })
});

/* ------ data table Mostrar Lista ------*/
function list_estado_solicitud_prolife()
{
    $.ajax({
        url:"controller_func/estado_solicitud_prolife/listar.php"
    }).done(function(data){
        $('.table_estpro').empty();
        $('.table_estpro').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_estpro_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_solicitud_prolife/create.php?id="+id;
    $.get(url, function(data){
        $("#form_estpro").empty();
        $("#form_estpro").append(data);
        if(id>0){
            $(".title_estpro").empty();
            $(".title_estpro").append("Modificar estado solicitud prolife");
        }else{
            $(".title_estpro").empty();
            $(".title_estpro").append("Nuevo estado solicitud prolife");
        }
        $("#modal-form-estpro").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_estpro_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_solicitud_prolife/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_estpro").empty();
        $("#form_show_estpro").append(data);
        $("#form_show_estpro :input").prop('disabled',true);
        $("#modal-show-estpro").modal("show");
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
$(document).on('click', '.activar-estpro', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_solicitud_prolife/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_estpro"+id).removeClass('btn btn-sm btn-success activar-estpro').addClass('btn btn-sm btn-danger desactivar-estpro');
                $("#icon_estpro"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-estpro', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_solicitud_prolife/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_estpro"+id).removeClass('btn btn-sm btn-danger desactivar-estpro').addClass('btn btn-sm btn-success activar-estpro');
                $("#icon_estpro"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});