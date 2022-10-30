/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gw_h', function() {
   
    var data=$('#form_w_h').serialize();
    
    var srtM_c=document.querySelector('#txt_m_c').value;
    var srtL=document.querySelector('#txt_l').value;
    var srt_L_B=document.querySelector('#txt_l_b').value;
    var srt_L_F=document.querySelector('#txt_l_f').value;
    var srt_C1=document.querySelector('#txt_c1').value;
    var srt_C2=document.querySelector('#txt_c2').value;
    var srt_RS=document.querySelector('#txt_r_s').value;

    var srtRUC=document.querySelector('#txt_r').value;
    
    if (srtM_c == '' || srtL == '' || srt_L_B == '' || srt_L_F == '' || srt_C1 == '' ||
     srt_C2 == '' || srt_RS == '' || srtRUC=='') 
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
        url:'controller_func/web_header/accion.php',
        data:data,
        success:function(data){   
                   alert(data);
            if(data.trim()=="true_create"){               
                $("#form_w_h").empty();
                $("#modal-form-w_h").modal("hide");
                toastr.success("Se creó el web header");
                list_web_header();
                
            }else if(data.trim()=="true_update"){
                $("#form_w_h").empty();
                $("#modal-form-w_h").modal("hide");
                toastr.success("Se actualizó el web header");
                list_web_header();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_web_header()
{   
    
    $.ajax({
        url:"controller_func/web_header/list.php"
    }).done(function(data){
        $('.table_w_h').empty();
        $('.table_w_h').append(data);        
    });
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_w_h_modal', function() {
   
    var id=$(this).data("id");
    var url="controller_func/web_header/create.php?id="+id;
    $.get(url, function(data){
        $("#form_w_h").empty();
        $("#form_w_h").append(data);
        if(id>0){
            $(".title_w_h").empty();
            $(".title_w_h").append("Modificar web header");
        }else{
            $(".title_w_h").empty();
            $(".title_w_h").append("Nuevo web header");
        }
        $("#modal-form-w_h").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_w_h_modal', function() {
    var id=$(this).data("id");
    
    var url="controller_func/web_header/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_w_h").empty();
        $("#form_show_w_h").append(data);
        $("#form_show_w_h :input").prop('disabled',true);
        $("#modal-show-w_h").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-w_h', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_header/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_w_h"+id).removeClass('btn btn-sm btn-success activar-w_h').addClass('btn btn-sm btn-danger desactivar-w_h');
                $("#icon_w_h"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-w_h', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/web_header/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_w_h"+id).removeClass('btn btn-sm btn-danger desactivar-w_h').addClass('btn btn-sm btn-success activar-w_h');
                $("#icon_w_h"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-web-header', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/web_header/exportar_excel.php",   
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