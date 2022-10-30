/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gworkflow', function() {
    var data=$('#form_workflow').serialize();

    var strworkflow = document.querySelector('#txt_ework').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strworkflow == '' ) 
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
        url:'controller_func/estado_workflow/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_workflow").empty();
                $("#modal-form-workflow").modal("hide");
                toastr.success("Se creó nuevo workflow");
                list_estado_workflow();
                
            }else if(data.trim()=="true_update"){
                $("#form_workflow").empty();
                $("#modal-form-workflow").modal("hide");
                toastr.success("Se actualizó el workflow");
                list_estado_workflow();  
                              
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});


function list_estado_workflow()
{
    $.ajax({
        url:"controller_func/estado_workflow/listar.php"
    }).done(function(data){
        $('.table_workflow').empty();
        $('.table_workflow').append(data);        
    })
}


$(document).on('click', '.nuevo_workflow_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_workflow/create.php?id="+id;
    $.get(url, function(data){
        $("#form_workflow").empty();
        $("#form_workflow").append(data);
        if(id>0){
            $(".title_workflow").empty();
            $(".title_workflow").append("Modificar estado workflow");
        }else{
            $(".title_workflow").empty();
            $(".title_workflow").append("Nuevo estado workflow ");
        }
        $("#modal-form-workflow").modal("show");
    })
});

$(document).on('click', '.show_workflow_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_workflow/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_workflow").empty();
        $("#form_show_workflow").append(data);
        $("#form_show_workflow :input").prop('disabled',true);
        $("#modal-show-workflow").modal("show");
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


$(document).on('click', '.activar-workflow', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_workflow/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_workflow"+id).removeClass('btn btn-sm btn-success activar-workflow').addClass('btn btn-sm btn-danger desactivar-workflow');
                $("#icon_workflow"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});


$(document).on('click', '.desactivar-workflow', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_workflow/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_workflow"+id).removeClass('btn btn-sm btn-danger desactivar-workflow').addClass('btn btn-sm btn-success activar-workflow');
                $("#icon_workflow"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});


/*Tiempo Carga de Datos*/
function cargar_data(){
    let timerInterval
    Swal.fire({
      title: 'Creando Tabla de Datos',
      html: 'Cargando... <b></b>',
      timer: timerInterval,
      onBeforeOpen: () => {
        Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer
  
      ) {
        console.log('Estaba cerrado por el temporizador')
      }
    })
}  

/*cargar excel */
$(document).on('click', '.exportar-excel-est-wor', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/estado_workflow/exportar_excel.php",   
        dataType:'json',
        beforeSend:function(){
            cargar_data();
            },
        complete:function(){
            Swal.close();
            },
        }).done(function(data){
            var $a = $("<a>");
            $a.attr("href",data.file);
            $("body").append($a);
            $a.attr("download",data.namearchivo+".xlsx");
            $a[0].click();
            $a.remove();
        });
});