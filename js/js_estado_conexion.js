/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gconexion', function() {
    var data=$('#form_conexion').serialize();

    var strconexion = document.querySelector('#txt_econ').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
    if (strconexion == '' ) 
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
        url:'controller_func/estado_conexion/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_conexion").empty();
                $("#modal-form-conexion").modal("hide");
                toastr.success("Se creó la conexión");
                list_estado_conexion();
                
            }else if(data.trim()=="true_update"){
                $("#form_conexion").empty();
                $("#modal-form-conexion").modal("hide");
                toastr.success("Se actualizó la conexión");
                list_estado_conexion();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

/* ------ data table Mostrar Lista ------*/
function list_estado_conexion()
{
    $.ajax({
        url:"controller_func/estado_conexion/listar.php"
    }).done(function(data){
        $('.table_conexion').empty();
        $('.table_conexion').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_conexion_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_conexion/create.php?id="+id;
    $.get(url, function(data){
        $("#form_conexion").empty();
        $("#form_conexion").append(data);
        if(id>0){
            $(".title_conexion").empty();
            $(".title_conexion").append("Modificar estado de conexión");
        }else{
            $(".title_conexion").empty();
            $(".title_conexion").append("Nuevo estado de conexión");
        }
        $("#modal-form-conexion").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_conexion_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_conexion/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_conexion").empty();
        $("#form_show_conexion").append(data);
        $("#form_show_conexion :input").prop('disabled',true);
        $("#modal-show-conexion").modal("show");
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
$(document).on('click', '.activar-conexion', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_conexion/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_conexion"+id).removeClass('btn btn-sm btn-success activar-conexion').addClass('btn btn-sm btn-danger desactivar-conexion');
                $("#icon_conexion"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-conexion', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_conexion/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_conexion"+id).removeClass('btn btn-sm btn-danger desactivar-conexion').addClass('btn btn-sm btn-success activar-conexion');
                $("#icon_conexion"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-estado-conex', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/estado_conexion/exportar_excel.php",   
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