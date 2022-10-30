/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gwrs', function() {
   
    var data=$('#form_wrs').serialize();
    
    var srtWrs=document.querySelector('#txt_wrs').value;
    var strIcon=document.querySelector('#txt_icono').value;
    var strEnlace = document.querySelector('#txt_enlace').value;
    
    if (srtWrs == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (strIcon == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (strEnlace == '') 
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
        url:'controller_func/web_red_social/accion.php',
        data:data,
        success:function(data){   
                   
            if(data.trim()=="true_create"){               
                $("#form_wrs").empty();
                $("#modal-form-wrs").modal("hide");
                toastr.success("Se creó el web red social");
                list_web_red_social();
                
            }else if(data.trim()=="true_update"){
                $("#form_wrs").empty();
                $("#modal-form-wrs").modal("hide");
                toastr.success("Se actualizó el web red social");
                list_web_red_social();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_web_red_social()
{   
    
    $.ajax({
        url:"controller_func/web_red_social/list.php"
    }).done(function(data){
        $('.table_wrs').empty();
        $('.table_wrs').append(data);        
    });
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_wrs_modal', function() {
   
    var id=$(this).data("id");
    var url="controller_func/web_red_social/create.php?id="+id;
    $.get(url, function(data){
        $("#form_wrs").empty();
        $("#form_wrs").append(data);
        if(id>0){
            $(".title_wrs").empty();
            $(".title_wrs").append("Modificar web red social");
        }else{
            $(".title_wrs").empty();
            $(".title_wrs").append("Nuevo web red social");
        }
        $("#modal-form-wrs").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_wrs_modal', function() {
    var id=$(this).data("id");
    
    var url="controller_func/web_red_social/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_wrs").empty();
        $("#form_show_wrs").append(data);
        $("#form_show_wrs :input").prop('disabled',true);
        $("#modal-show-wrs").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-wrs', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_red_social/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_wrs"+id).removeClass('btn btn-sm btn-success activar-wrs').addClass('btn btn-sm btn-danger desactivar-wrs');
                $("#icon_wrs"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-wrs', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_red_social/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_wrs"+id).removeClass('btn btn-sm btn-danger desactivar-wrs').addClass('btn btn-sm btn-success activar-wrs');
                $("#icon_wrs"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-web-red-social', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/web_red_social/exportar_excel.php",   
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