/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gfinanciado', function() {
    var data=$('#form_financiado').serialize();

    var strfinanciado = document.querySelector('#txt_finan').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strfinanciado == '' ) 
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
        url:'controller_func/financiado/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_financiado").empty();
                $("#modal-form-financiado").modal("hide");
                toastr.success("Se creó el financiado");
                list_financiado();
                
            }else if(data.trim()=="true_update"){
                $("#form_financiado").empty();
                $("#modal-form-financiado").modal("hide");
                toastr.success("Se actualizó el financiado");
                list_financiado();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

/* ------ data table Mostrar Lista ------*/
function list_financiado()
{
    $.ajax({
        url:"controller_func/financiado/listar.php"
    }).done(function(data){
        $('.table_financiado').empty();
        $('.table_financiado').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_financiado_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/financiado/create.php?id="+id;
    $.get(url, function(data){
        $("#form_financiado").empty();
        $("#form_financiado").append(data);
        if(id>0){
            $(".title_financiado").empty();
            $(".title_financiado").append("Modificar financiado");
        }else{
            $(".title_financiado").empty();
            $(".title_financiado").append("Nuevo financiado");
        }
        $("#modal-form-financiado").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_financiado_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/financiado/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_financiado").empty();
        $("#form_show_financiado").append(data);
        $("#form_show_financiado :input").prop('disabled',true);
        $("#modal-show-financiado").modal("show");
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
$(document).on('click', '.activar-financiado', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/financiado/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_financiado"+id).removeClass('btn btn-sm btn-success activar-financiado').addClass('btn btn-sm btn-danger desactivar-financiado');
                $("#icon_financiado"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-financiado', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/financiado/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_financiado"+id).removeClass('btn btn-sm btn-danger desactivar-financiado').addClass('btn btn-sm btn-success activar-financiado');
                $("#icon_financiado"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});