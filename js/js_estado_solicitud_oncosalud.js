/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gestonc', function() {
    var data=$('#form_estonc').serialize();

    var strestonc = document.querySelector('#txt_estonc').value;
    var strestcol = document.querySelector('#txt_estcol').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strestonc == '' || strestcol == '' ) 
    {
        toastr.error("Algunos campos son obligatorios.");
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
        url:'controller_func/estado_solicitud_oncosalud/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_estonc").empty();
                $("#modal-form-estonc").modal("hide");
                toastr.success("Se creó el estado sol. de oncosalud");
                list_estado_solicitud_oncosalud();
                
            }else if(data.trim()=="true_update"){
                $("#form_estonc").empty();
                $("#modal-form-estonc").modal("hide");
                toastr.success("Se actualizó el estado sol. de oncosalud");
                list_estado_solicitud_oncosalud();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

/* ------ data table Mostrar Lista ------*/
function list_estado_solicitud_oncosalud()
{
    $.ajax({
        url:"controller_func/estado_solicitud_oncosalud/listar.php"
    }).done(function(data){
        $('.table_estonc').empty();
        $('.table_estonc').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_estonc_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_solicitud_oncosalud/create.php?id="+id;
    $.get(url, function(data){
        $("#form_estonc").empty();
        $("#form_estonc").append(data);
        if(id>0){
            $(".title_estonc").empty();
            $(".title_estonc").append("Modificar estado solicitud de oncosalud");
        }else{
            $(".title_estonc").empty();
            $(".title_estonc").append("Nuevo estado solicitud de oncosalud");
        }
        $("#modal-form-estonc").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_estonc_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_solicitud_oncosalud/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_estonc").empty();
        $("#form_show_estonc").append(data);
        $("#form_show_estonc :input").prop('disabled',true);
        $("#modal-show-estonc").modal("show");
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
$(document).on('click', '.activar-estonc', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_solicitud_oncosalud/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_estonc"+id).removeClass('btn btn-sm btn-success activar-estonc').addClass('btn btn-sm btn-danger desactivar-estonc');
                $("#icon_estonc"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-estonc', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_solicitud_oncosalud/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_estonc"+id).removeClass('btn btn-sm btn-danger desactivar-estonc').addClass('btn btn-sm btn-success activar-estonc');
                $("#icon_estonc"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-est-sol-onco', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/estado_solicitud_oncosalud/exportar_excel.php",   
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