/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gfrecuencia', function() {
    var data=$('#form_frecuencia').serialize();

    var strfrecuencia = document.querySelector('#txt_frec').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strfrecuencia == '' ) 
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
        url:'controller_func/frecuencia/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_frecuencia").empty();
                $("#modal-form-frecuencia").modal("hide");
                toastr.success("Se creó la frecuencia");
                list_frecuencia();
                
            }else if(data.trim()=="true_update"){
                $("#form_frecuencia").empty();
                $("#modal-form-frecuencia").modal("hide");
                toastr.success("Se actualizó la frecuencia");
                list_frecuencia();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

/* ------ data table Mostrar Lista ------*/
function list_frecuencia()
{
    $.ajax({
        url:"controller_func/frecuencia/listar.php"
    }).done(function(data){
        $('.table_frecuencia').empty();
        $('.table_frecuencia').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_frecuencia_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/frecuencia/create.php?id="+id;
    $.get(url, function(data){
        $("#form_frecuencia").empty();
        $("#form_frecuencia").append(data);
        if(id>0){
            $(".title_frecuencia").empty();
            $(".title_frecuencia").append("Modificar frecuencia");
        }else{
            $(".title_frecuencia").empty();
            $(".title_frecuencia").append("Nueva frecuencia");
        }
        $("#modal-form-frecuencia").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_frecuencia_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/frecuencia/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_frecuencia").empty();
        $("#form_show_frecuencia").append(data);
        $("#form_show_frecuencia :input").prop('disabled',true);
        $("#modal-show-frecuencia").modal("show");
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
$(document).on('click', '.activar-frecuencia', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/frecuencia/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_frecuencia"+id).removeClass('btn btn-sm btn-success activar-frecuencia').addClass('btn btn-sm btn-danger desactivar-frecuencia');
                $("#icon_frecuencia"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-frecuencia', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/frecuencia/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_frecuencia"+id).removeClass('btn btn-sm btn-danger desactivar-frecuencia').addClass('btn btn-sm btn-success activar-frecuencia');
                $("#icon_frecuencia"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});