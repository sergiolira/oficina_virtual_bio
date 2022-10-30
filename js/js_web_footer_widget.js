/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gwfw', function() {
   
    var data=$('#form_wfw').serialize();
    
    var srtwfw=document.querySelector('#txt_wfw').value;
    
    
    if (srtwfw == '') 
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
        url:'controller_func/web_footer_widget/accion.php',
        data:data,
        success:function(data){   
                   
            if(data.trim()=="true_create"){               
                $("#form_wfw").empty();
                $("#modal-form-wfw").modal("hide");
                toastr.success("Se creó el web footer widget");
                list_web_footer_widget();
                
            }else if(data.trim()=="true_update"){
                $("#form_wfw").empty();
                $("#modal-form-wfw").modal("hide");
                toastr.success("Se actualizó el web footer widget");
                list_web_footer_widget();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_web_footer_widget()
{   
    
    $.ajax({
        url:"controller_func/web_footer_widget/list.php"
    }).done(function(data){
        $('.table_wfw').empty();
        $('.table_wfw').append(data);        
    });
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_wfw_modal', function() {
   
    var id=$(this).data("id");
    var url="controller_func/web_footer_widget/create.php?id="+id;
    $.get(url, function(data){
        $("#form_wfw").empty();
        $("#form_wfw").append(data);
        if(id>0){
            $(".title_wfw").empty();
            $(".title_wfw").append("Modificar web footer widget");
        }else{
            $(".title_wfw").empty();
            $(".title_wfw").append("Nuevo web footer widget");
        }
        $("#modal-form-wfw").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_wfw_modal', function() {
    var id=$(this).data("id");
    
    var url="controller_func/web_footer_widget/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_wfw").empty();
        $("#form_show_wfw").append(data);
        $("#form_show_wfw :input").prop('disabled',true);
        $("#modal-show-wfw").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-wfw', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_footer_widget/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_wfw"+id).removeClass('btn btn-sm btn-success activar-wfw').addClass('btn btn-sm btn-danger desactivar-wfw');
                $("#icon_wfw"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-wfw', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_footer_widget/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_wfw"+id).removeClass('btn btn-sm btn-danger desactivar-wfw').addClass('btn btn-sm btn-success activar-wfw');
                $("#icon_wfw"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-web-footer-widget', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/web_footer_widget/exportar_excel.php",   
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