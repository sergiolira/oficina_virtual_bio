/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gd_p', function() {
   
    var data=$('#form_d_p').serialize();
    
    var id_t_d=document.querySelector('#slt_t_d').value;
    var strMonto = document.querySelector('#txt_monto').value;
    var str_f_i = document.querySelector('#txt_f_i').value;
    var str_f_f = document.querySelector('#txt_f_f').value;
    var id_pro=document.querySelector('#slt_pro').value;
    
    
    
    if (id_t_d == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (strMonto == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (str_f_i == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (str_f_f == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (id_pro == '') 
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
        url:'controller_func/descuento_producto/accion.php',
        data:data,
        success:function(data){   
                   
            if(data.trim()=="true_create"){               
                $("#form_d_p").empty();
                $("#modal-form-d_p").modal("hide");
                toastr.success("Se creó el descuento del producto");
                list_descuento_producto();
                
            }else if(data.trim()=="true_update"){
                $("#form_d_p").empty();
                $("#modal-form-d_p").modal("hide");
                toastr.success("Se actualizó el descuento del producto");
                list_descuento_producto();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_descuento_producto()
{   
    
    $.ajax({
        url:"controller_func/descuento_producto/list.php"
    }).done(function(data){
        $('.table_d_p').empty();
        $('.table_d_p').append(data);        
    });
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_d_p_modal', function() {
   
    var id=$(this).data("id");
    var url="controller_func/descuento_producto/create.php?id="+id;
    $.get(url, function(data){
        $("#form_d_p").empty();
        $("#form_d_p").append(data);
        if(id>0){
            $(".title_d_p").empty();
            $(".title_d_p").append("Modificar descuento del producto");
        }else{
            $(".title_d_p").empty();
            $(".title_d_p").append("Nuevo descuento");
        }
        $("#modal-form-d_p").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_d_p_modal', function() {
    var id=$(this).data("id");
    
    var url="controller_func/descuento_producto/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_d_p").empty();
        $("#form_show_d_p").append(data);
        $("#form_show_d_p :input").prop('disabled',true);
        $("#modal-show-d_p").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-d_p', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/descuento_producto/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_d_p"+id).removeClass('btn btn-sm btn-success activar-d_p').addClass('btn btn-sm btn-danger desactivar-d_p');
                $("#icon_d_p"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-d_p', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/descuento_producto/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_d_p"+id).removeClass('btn btn-sm btn-danger desactivar-d_p').addClass('btn btn-sm btn-success activar-d_p');
                $("#icon_d_p"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-descuento-producto', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/descuento_producto/exportar_excel.php",   
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