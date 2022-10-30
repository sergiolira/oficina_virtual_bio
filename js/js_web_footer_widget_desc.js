/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gwfwd', function() {
    var data=$('#form_wfwd').serialize();
    var strwfwd = document.querySelector('#txt_wfwd').value;
    var strEnlace = document.querySelector('#txt_enlace').value;
    var slt_wfw = document.querySelector('#slt_wfw').value;
    
    
    if (strwfwd == '' || strEnlace== '' || slt_wfw=='') 
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
        url:'controller_func/web_footer_widget_desc/accion.php',
        data:data,
        success:function(data){  
            alert(data);          
            if(data.trim()=="true_create"){               
                $("#form_wfwd").empty();
                $("#modal-form-wfwd").modal("hide");
                toastr.success("Se creó la web footer widget desc");
                list_web_footer_widget_desc();
                
            }else if(data.trim()=="true_update"){
                $("#form_wfwd").empty();
                $("#modal-form-wfwd").modal("hide");
                toastr.success("Se actualizó la web footer widget desc");
                list_web_footer_widget_desc();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

//mostrar listaa
function list_web_footer_widget_desc()
{
    $.ajax({
        url:"controller_func/web_footer_widget_desc/list.php"
    }).done(function(data){
        $('.table_wfwd').empty();
        $('.table_wfwd').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_wfwd_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/web_footer_widget_desc/create.php?id="+id;
    $.get(url, function(data){
        $("#form_wfwd").empty();
        $("#form_wfwd").append(data);
        if(id>0){
            $(".title_wfwd").empty();
            $(".title_wfwd").append("Modificar la web footer widget desc");
        }else{
            $(".title_wfwd").empty();
            $(".title_wfwd").append("Nueva web footer widget desc");
        }
        $("#modal-form-wfwd").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_wfwd_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/web_footer_widget_desc/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_wfwd").empty();
        $("#form_show_wfwd").append(data);
        $("#form_show_wfwd :input").prop('disabled',true);
        $("#modal-show-wfwd").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-wfwd', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_footer_widget_desc/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_wfwd"+id).removeClass('btn btn-sm btn-success activar-wfwd').addClass('btn btn-sm btn-danger desactivar-wfwd');
                $("#icon_wfwd"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-wfwd', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_footer_widget_desc/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_wfwd"+id).removeClass('btn btn-sm btn-danger desactivar-wfwd').addClass('btn btn-sm btn-success activar-wfwd');
                $("#icon_wfwd"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel_wfwd', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/web_footer_widget_desc/exportar_excel.php",   
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