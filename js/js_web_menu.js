/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gweb_menu', function() {
    var data=$('#form_web_menu').serialize();
    var strWeb_menu = document.querySelector('#txt_web_menu').value;
    var strEnlace = document.querySelector('#txt_enlace').value;
    
    
    if (strWeb_menu == '' || strEnlace== '' ) 
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
        url:'controller_func/web_menu/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_web_menu").empty();
                $("#modal-form-web_menu").modal("hide");
                toastr.success("Se creó la web del menu");
                list_web_menu();
                
            }else if(data.trim()=="true_update"){
                $("#form_web_menu").empty();
                $("#modal-form-web_menu").modal("hide");
                toastr.success("Se actualizó la web del menu");
                list_web_menu();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

//mostrar listaa
function list_web_menu()
{
    $.ajax({
        url:"controller_func/web_menu/list.php"
    }).done(function(data){
        $('.table_web_menu').empty();
        $('.table_web_menu').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_web_menu_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/web_menu/create.php?id="+id;
    $.get(url, function(data){
        $("#form_web_menu").empty();
        $("#form_web_menu").append(data);
        if(id>0){
            $(".title_web_menu").empty();
            $(".title_web_menu").append("Modificar la web del menu");
        }else{
            $(".title_web_menu").empty();
            $(".title_web_menu").append("Nueva web del menu");
        }
        $("#modal-form-web_menu").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_web_menu_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/web_menu/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_web_menu").empty();
        $("#form_show_web_menu").append(data);
        $("#form_show_web_menu :input").prop('disabled',true);
        $("#modal-show-web_menu").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-web_menu', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_menu/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_web_menu"+id).removeClass('btn btn-sm btn-success activar-web_menu').addClass('btn btn-sm btn-danger desactivar-web_menu');
                $("#icon_web_menu"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-web_menu', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_menu/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_web_menu"+id).removeClass('btn btn-sm btn-danger desactivar-web_menu').addClass('btn btn-sm btn-success activar-web_menu');
                $("#icon_web_menu"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-web-menu', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/web_menu/exportar_excel.php",   
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