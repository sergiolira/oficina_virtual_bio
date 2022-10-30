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

/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gtipo_lic', function() {
    var data=$('#form_tipo_lic').serialize();
    var strTipoLic = document.querySelector('#txt_tipo_lic').value;
    
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
        url:'controller_func/tipo_licencia/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_tipo_lic").empty();
                $("#modal-form-tipo_lic").modal("hide");
                toastr.success("Se creó el tipo de licencia");
                list_tipo_licencia();
                
            }else if(data.trim()=="true_update"){
                $("#form_tipo_lic").empty();
                $("#modal-form-tipo_lic").modal("hide");
                toastr.success("Se actualizó el tipo de licencia");
                list_tipo_licencia();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});


//mostrar listaa
function list_tipo_licencia()
{   
    
    $.ajax({
        url:"controller_func/tipo_licencia/list.php"
    }).done(function(data){
        $('.table_tipo_lic').empty();
        $('.table_tipo_lic').append(data);        
    });
}
/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_tipo_lic_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_licencia/create.php?id="+id;
    $.get(url, function(data){
        $("#form_tipo_lic").empty();
        $("#form_tipo_lic").append(data);
        if(id>0){
            $(".title_tipo_lic").empty();
            $(".title_tipo_lic").append("Modificar tipo de licencia");
        }else{
            $(".title_tipo_lic").empty();
            $(".title_tipo_lic").append("Nuevo tipo de licencia");
        }
        $("#modal-form-tipo_lic").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_tipo_lic_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_licencia/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_tipo_lic").empty();
        $("#form_show_tipo_lic").append(data);
        $("#form_show_tipo_lic :input").prop('disabled',true);
        $("#modal-show-tipo_lic").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-tipo_lic', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_licencia/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_tipo_lic"+id).removeClass('btn btn-sm btn-success activar-tipo_lic').addClass('btn btn-sm btn-danger desactivar-tipo_lic');
                $("#icon_tipo_lic"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-tipo_lic', function() {
    var id=$(this).data("id");    
    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_licencia/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_tipo_lic"+id).removeClass('btn btn-sm btn-danger desactivar-tipo_lic').addClass('btn btn-sm btn-success activar-tipo_lic');
                $("#icon_tipo_lic"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});

/*--------Exportar a Excel---------*/
$(document).on('click', '.exportar-excel-tip-lic', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/tipo_licencia/exportar_excel.php",   
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