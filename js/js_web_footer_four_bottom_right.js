/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gwffbr', function() {
   
    var data=$('#form_wffbr').serialize();
    
    var srtwffbr=document.querySelector('#txt_wffbr').value;
    var strEnlace=document.querySelector('#txt_enlace').value;
    var strImagen = document.querySelector('#txt_imagen').value;
    
    if (srtwffbr == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (strEnlace == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (strImagen == '') 
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
        url:'controller_func/web_footer_four_bottom_right/accion.php',
        data:data,
        success:function(data){   
                   
            if(data.trim()=="true_create"){               
                $("#form_wffbr").empty();
                $("#modal-form-wffbr").modal("hide");
                toastr.success("Se creó el Web footer four b.r.");
                list_web_footer_four_bottom_right();
                
            }else if(data.trim()=="true_update"){
                $("#form_wffbr").empty();
                $("#modal-form-wffbr").modal("hide");
                toastr.success("Se actualizó el Web footer four b.r.");
                list_web_footer_four_bottom_right();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_web_footer_four_bottom_right()
{   
    
    $.ajax({
        url:"controller_func/web_footer_four_bottom_right/list.php"
    }).done(function(data){
        $('.table_wffbr').empty();
        $('.table_wffbr').append(data);        
    });
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_wffbr_modal', function() {
   
    var id=$(this).data("id");
    var url="controller_func/web_footer_four_bottom_right/create.php?id="+id;
    $.get(url, function(data){
        $("#form_wffbr").empty();
        $("#form_wffbr").append(data);
        if(id>0){
            $(".title_wffbr").empty();
            $(".title_wffbr").append("Modificar Web footer four b.r.");
        }else{
            $(".title_wffbr").empty();
            $(".title_wffbr").append("Nuevo Web footer four b.r.");
        }
        $("#modal-form-wffbr").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_wffbr_modal', function() {
    var id=$(this).data("id");
    
    var url="controller_func/web_footer_four_bottom_right/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_wffbr").empty();
        $("#form_show_wffbr").append(data);
        $("#form_show_wffbr :input").prop('disabled',true);
        $("#modal-show-wffbr").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-wffbr', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_footer_four_bottom_right/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_wffbr"+id).removeClass('btn btn-sm btn-success activar-wffbr').addClass('btn btn-sm btn-danger desactivar-wffbr');
                $("#icon_wffbr"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-wffbr', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_footer_four_bottom_right/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_wffbr"+id).removeClass('btn btn-sm btn-danger desactivar-wffbr').addClass('btn btn-sm btn-success activar-wffbr');
                $("#icon_wffbr"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-web-footer_four', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/web_footer_four_bottom_right/exportar_excel.php",   
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