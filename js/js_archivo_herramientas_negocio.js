/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_guardar', function() {
    var data=$('#form_hneg').serialize();

    var strtitulo = document.querySelector('#txt_titulo').value;
    var strsubtitulo = document.querySelector('#txt_subtitulo').value;
    var strcarpeta = document.querySelector('#txt_cub').value;
    var strnarchivo = document.querySelector('#txt_nar').value;
    var strtamanio = document.querySelector('#txt_tar').value;
    var strmarca = document.querySelector('#slt_mco').value;
    var strtipoinf = document.querySelector('#slt_tinf').value;
    var strtipoarch = document.querySelector('#slt_tiar').value;
    var strestilo = document.querySelector('#slt_scol').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strtitulo == '' ) { toastr.error("Todos los campos son obligatorios."); return false;}
    if (strtitulo == '')  { toastr.error("Todos los campos son obligatorios."); return false;}
    if (strsubtitulo == ''){ toastr.error("Todos los campos son obligatorios."); return false;}
    if (strcarpeta == ''){ toastr.error("Todos los campos son obligatorios."); return false;}
    if (strnarchivo == ''){ toastr.error("Todos los campos son obligatorios."); return false;}
    if (strtamanio == ''){ toastr.error("Todos los campos son obligatorios."); return false;}
    if (strmarca == '0'){ toastr.error("Todos los campos son obligatorios."); return false;}
    if (strtipoinf == '0'){ toastr.error("Todos los campos son obligatorios."); return false;}
    if (strtipoarch == '0'){ toastr.error("Todos los campos son obligatorios."); return false;}
    if (strestilo == '0'){ toastr.error("Todos los campos son obligatorios."); return false;}


    let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) { 
            if(elementsValid[i].classList.contains('is-invalid')) { 
                toastr.error("Atención Por favor verifique los campos en rojo.");                
                return false;
            } 
        }
    $.ajax({
        type:'POST',
        url:'controller_func/archivo_herramientas_negocio/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_hneg").empty();
                $("#modal-form-hneg").modal("hide");
                toastr.success("Se creó el archivo herramienta de negocio");
                list_archivo_herramientas_negocios();
                
            }else if(data.trim()=="true_update"){
                $("#form_hneg").empty();
                $("#modal-form-hneg").modal("hide");
                toastr.success("Se actualizó el archivo herramienta de negocio");
                list_archivo_herramientas_negocios();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

/* ------ data table Mostrar Lista ------*/
function list_archivo_herramientas_negocios()
{
    $.ajax({
        url:"controller_func/archivo_herramientas_negocio/listar.php"
    }).done(function(data){
        $('.table_hnegocios').empty();
        $('.table_hnegocios').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_hneg_modal', function() {
   
    var id=$(this).data("id");
    var url="controller_func/archivo_herramientas_negocio/create.php?id="+id;
    $.get(url, function(data){
        $("#form_hneg").empty();
        $("#form_hneg").append(data);
        if(id>0){
            $(".title_hneg").empty();
            $(".title_hneg").append("Modificar archivo herramientas de negocio");
        }else{
            $(".title_hneg").empty();
            $(".title_hneg").append("Nuevo archivo herramientas de negocio");
        }
        $("#modal-form-hneg").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_hneg_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/archivo_herramientas_negocio/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_hneg").empty();
        $("#form_show_hneg").append(data);
        $("#form_show_hneg :input").prop('disabled',true);
        $("#modal-show-hneg").modal("show");
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
$(document).on('click', '.activar-hneg', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/archivo_herramientas_negocio/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_hneg"+id).removeClass('btn btn-sm btn-success activar-hneg').addClass('btn btn-sm btn-danger desactivar-hneg');
                $("#icon_hneg"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-hneg', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/archivo_herramientas_negocio/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_hneg"+id).removeClass('btn btn-sm btn-danger desactivar-hneg').addClass('btn btn-sm btn-success activar-hneg');
                $("#icon_hneg"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});

