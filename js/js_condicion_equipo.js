/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gc_e', function() {
    var data=$('#form_c_e').serialize();
    var strConEqui = document.querySelector('#txt_c_e').value;
    
    if (strConEqui == '') 
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
        url:'controller_func/condicion_equipo/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_c_e").empty();
                $("#modal-form-c_e").modal("hide");
                toastr.success("Se creó la condición del equipo");
                list_condicion_equipo();
                
            }else if(data.trim()=="true_update"){
                $("#form_c_e").empty();
                $("#modal-form-c_e").modal("hide");
                toastr.success("Se actualizó la condidición del equipo");
                list_condicion_equipo();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});


//mostrar listaa
function list_condicion_equipo()
{   
    $.ajax({
        url:"controller_func/condicion_equipo/list.php"
    }).done(function(data){
        $('.table_c_e').empty();
        $('.table_c_e').append(data);        
    });
}
/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_c_e_modal', function() {
    
    var id=$(this).data("id");
    var url="controller_func/condicion_equipo/create.php?id="+id;
    $.get(url, function(data){
        $("#form_c_e").empty();
        $("#form_c_e").append(data);
        if(id>0){
            $(".title_c_e").empty();
            $(".title_c_e").append("Modificar condición de equipo");
        }else{
            $(".title_c_e").empty();
            $(".title_c_e").append("Nueva condición de equipo");
        }
        $("#modal-form-c_e").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_c_e_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/condicion_equipo/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_c_e").empty();
        $("#form_show_c_e").append(data);
        $("#form_show_c_e :input").prop('disabled',true);
        $("#modal-show-c_e").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-c_e', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/condicion_equipo/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_c_e"+id).removeClass('btn btn-sm btn-success activar-c_e').addClass('btn btn-sm btn-danger desactivar-c_e');
                $("#icon_c_e"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-c_e', function() {
    var id=$(this).data("id");    
    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/condicion_equipo/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_c_e"+id).removeClass('btn btn-sm btn-danger desactivar-c_e').addClass('btn btn-sm btn-success activar-c_e');
                $("#icon_c_e"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-condicion-equipo', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/condicion_equipo/exportar_excel.php",   
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