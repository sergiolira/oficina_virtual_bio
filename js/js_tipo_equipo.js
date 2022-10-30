/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gtipo_e', function() {
    var data=$('#form_tipo_e').serialize();
    var strTipoLic = document.querySelector('#txt_tipo_e').value;
    
    if (strTipoLic == '') 
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
        url:'controller_func/tipo_equipo/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_tipo_e").empty();
                $("#modal-form-tipo_e").modal("hide");
                toastr.success("Se creó el tipo de equipo");
                list_tipo_equipo();
                
            }else if(data.trim()=="true_update"){
                $("#form_tipo_e").empty();
                $("#modal-form-tipo_e").modal("hide");
                toastr.success("Se actualizó el tipo de equipo");
                list_tipo_equipo();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_tipo_equipo()
{   
    $.ajax({
        url:"controller_func/tipo_equipo/list.php"
    }).done(function(data){
        $('.table_tipo_e').empty();
        $('.table_tipo_e').append(data);        
    });
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_tipo_e_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_equipo/create.php?id="+id;
    $.get(url, function(data){
        $("#form_tipo_e").empty();
        $("#form_tipo_e").append(data);
        if(id>0){
            $(".title_tipo_e").empty();
            $(".title_tipo_e").append("Modificar tipo de equipo");
        }else{
            $(".title_tipo_e").empty();
            $(".title_tipo_e").append("Nuevo tipo de equipo");
        }
        $("#modal-form-tipo_e").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_tipo_e_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_equipo/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_tipo_e").empty();
        $("#form_show_tipo_e").append(data);
        $("#form_show_tipo_e :input").prop('disabled',true);
        $("#modal-show-tipo_e").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-tipo_e', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_equipo/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_tipo_e"+id).removeClass('btn btn-sm btn-success activar-tipo_e').addClass('btn btn-sm btn-danger desactivar-tipo_e');
                $("#icon_tipo_e"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-tipo_e', function() {
    var id=$(this).data("id");    
    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_equipo/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_tipo_e"+id).removeClass('btn btn-sm btn-danger desactivar-tipo_e').addClass('btn btn-sm btn-success activar-tipo_e');
                $("#icon_tipo_e"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-tip-equipo', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/tipo_equipo/exportar_excel.php",   
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