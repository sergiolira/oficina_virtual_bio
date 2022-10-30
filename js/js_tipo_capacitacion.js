/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gt_c', function() {
    var data=$('#form_t_c').serialize();
    var strTipoLic = document.querySelector('#txt_t_c').value;
    
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
        url:'controller_func/tipo_capacitacion/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_t_c").empty();
                $("#modal-form-t_c").modal("hide");
                toastr.success("Se creó el tipo de capacitacion");
                list_tipo_capacitacion();
                
            }else if(data.trim()=="true_update"){
                $("#form_t_c").empty();
                $("#modal-form-t_c").modal("hide");
                toastr.success("Se actualizó el tipo de capacitacion");
                list_tipo_capacitacion();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_tipo_capacitacion()
{   
    $.ajax({
        url:"controller_func/tipo_capacitacion/list.php"
    }).done(function(data){
        $('.table_t_c').empty();
        $('.table_t_c').append(data);        
    });
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_t_c_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_capacitacion/create.php?id="+id;
    $.get(url, function(data){
        $("#form_t_c").empty();
        $("#form_t_c").append(data);
        if(id>0){
            $(".title_t_c").empty();
            $(".title_t_c").append("Modificar tipo de capacitacion");
        }else{
            $(".title_t_c").empty();
            $(".title_t_c").append("Nuevo tipo de capacitacion");
        }
        $("#modal-form-t_c").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_t_c_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_capacitacion/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_t_c").empty();
        $("#form_show_t_c").append(data);
        $("#form_show_t_c :input").prop('disabled',true);
        $("#modal-show-t_c").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-t_c', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_capacitacion/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_t_c"+id).removeClass('btn btn-sm btn-success activar-t_c').addClass('btn btn-sm btn-danger desactivar-t_c');
                $("#icon_t_c"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-t_c', function() {
    var id=$(this).data("id");    
    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_capacitacion/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_t_c"+id).removeClass('btn btn-sm btn-danger desactivar-t_c').addClass('btn btn-sm btn-success activar-t_c');
                $("#icon_t_c"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-t-c', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/tipo_capacitacion/exportar_excel.php",   
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