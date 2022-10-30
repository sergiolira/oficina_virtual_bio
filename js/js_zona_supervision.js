/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gz_sup', function() {
    var data=$('#form_z_sup').serialize();
    var strMarca = document.querySelector('#txt_z_sup').value;
    
    if (strMarca == '') 
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
        url:'controller_func/zona_supervision/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_z_sup").empty();
                $("#modal-form-z_sup").modal("hide");
                toastr.success("Se creó la zona de supervisión");
                list_zona_supervision();
                
            }else if(data.trim()=="true_update"){
                $("#form_z_sup").empty();
                $("#modal-form-z_sup").modal("hide");
                toastr.success("Se actualizó la zona de supervisión");
                list_zona_supervision();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

//mostrar listaa
function list_zona_supervision()
{
    $.ajax({
        url:"controller_func/zona_supervision/list.php"
    }).done(function(data){
        $('.table_z_sup').empty();
        $('.table_z_sup').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_z_sup_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/zona_supervision/create.php?id="+id;
    $.get(url, function(data){
        $("#form_z_sup").empty();
        $("#form_z_sup").append(data);
        if(id>0){
            $(".title_z_sup").empty();
            $(".title_z_sup").append("Modificar la zona de supervisión");
        }else{
            $(".title_z_sup").empty();
            $(".title_z_sup").append("Nueva zona de supervisión");
        }
        $("#modal-form-z_sup").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_z_sup_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/zona_supervision/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_z_sup").empty();
        $("#form_show_z_sup").append(data);
        $("#form_show_z_sup :input").prop('disabled',true);
        $("#modal-show-z_sup").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-z_sup', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/zona_supervision/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_z_sup"+id).removeClass('btn btn-sm btn-success activar-z_sup').addClass('btn btn-sm btn-danger desactivar-z_sup');
                $("#icon_z_sup"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-z_sup', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/zona_supervision/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_z_sup"+id).removeClass('btn btn-sm btn-danger desactivar-z_sup').addClass('btn btn-sm btn-success activar-z_sup');
                $("#icon_z_sup"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-zona-supervision', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/zona_supervision/exportar_excel.php",   
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