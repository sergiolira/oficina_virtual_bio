/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gtipo_origen_oncosalud', function() {
    var data=$('#form_tipo_origen_oncosalud').serialize();
    
    var strtipo = document.querySelector('#txt_toon').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strtipo == ''  ) 
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
        url:'controller_func/tipo_origen_oncosalud/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_tipo_origen_oncosalud").empty();
                $("#modal-form-tipo_origen_oncosalud").modal("hide");
                toastr.success("Se creó Tipo de origen oncosalud");
                list_tipo_origen_oncosalud();
                
            }else if(data.trim()=="true_update"){
                $("#form_tipo_origen_oncosalud").empty();
                $("#modal-form-tipo_origen_oncosalud").modal("hide");
                toastr.success("Se actualizó Tipo de origen oncosalud");
                list_tipo_origen_oncosalud();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

/* ------ data table Mostrar Lista ------*/
function list_tipo_origen_oncosalud()
{
    $.ajax({
        url:"controller_func/tipo_origen_oncosalud/listar.php"
    }).done(function(data){
        $('.table_tipo_origen_oncosalud').empty();
        $('.table_tipo_origen_oncosalud').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_tipo_origen_oncosalud_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_origen_oncosalud/create.php?id="+id;
    $.get(url, function(data){
        $("#form_tipo_origen_oncosalud").empty();
        $("#form_tipo_origen_oncosalud").append(data);
        if(id>0){
            $(".title_tipo_origen_oncosalud").empty();
            $(".title_tipo_origen_oncosalud").append("Modificar Tipo de origen oncosalud");
        }else{
            $(".title_tipo_origen_oncosalud").empty();
            $(".title_tipo_origen_oncosalud").append("Nuevo Tipo de origen oncosalud");
        }
        $("#modal-form-tipo_origen_oncosalud").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_tipo_origen_oncosalud_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_origen_oncosalud/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_tipo_origen_oncosalud").empty();
        $("#form_show_tipo_origen_oncosalud").append(data);
        $("#form_show_tipo_origen_oncosalud :input").prop('disabled',true);
        $("#modal-show-tipo_origen_oncosalud").modal("show");
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
$(document).on('click', '.activar-tipo_origen_oncosalud', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_origen_oncosalud/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_tipo_origen_oncosalud"+id).removeClass('btn btn-sm btn-success activar-tipo_origen_oncosalud').addClass('btn btn-sm btn-danger desactivar-tipo_origen_oncosalud');
                $("#icon_tipo_origen_oncosalud"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-tipo_origen_oncosalud', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_origen_oncosalud/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_tipo_origen_oncosalud"+id).removeClass('btn btn-sm btn-danger desactivar-tipo_origen_oncosalud').addClass('btn btn-sm btn-success activar-tipo_origen_oncosalud');
                $("#icon_tipo_origen_oncosalud"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});
