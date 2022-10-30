/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_tipo_programa_oncosalud').serialize();
    var strTipo_p = document.querySelector('#txt_tipo_p').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    var strtipo_producto = document.querySelector('#slt_p_onco').value;
    
    if (strTipo_p == '' || strobservacion == '' ) 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    if (strtipo_producto == '0' ) 
    {
        toastr.error("Por favor selecione un producto.");
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
        url:'controller_func/tipo_programa_oncosalud/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_tipo_programa_oncosalud").empty();
                $("#modal-form-tipo-programa-oncosalud").modal("hide");
                toastr.success("Se agrego un nuevo programa oncosalud");
                list_tipo_programa_oncosalud();
                
            }else if(data.trim()=="true_update"){
                $("#form_tipo_programa_oncosalud").empty();
                $("#modal-form-tipo-programa-oncosalud").modal("hide");
                toastr.success("Se actualizo el programa oncosalud");
                list_tipo_programa_oncosalud();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ data table Mostrar Lista ------*/
function list_tipo_programa_oncosalud()
{
    $.ajax({
        url:"controller_func/tipo_programa_oncosalud/list.php"
    }).done(function(data){
        $('.table-tipo-programa-oncosalud').empty();
        $('.table-tipo-programa-oncosalud').append(data);        
    })
} 

/* ------ data table Mostrar Lista ------*/
$(document).on('click', '.new-modal-tipo-programa-oncosalud', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_programa_oncosalud/create.php?id="+id;
    $.get(url, function(data){
        $("#form_tipo_programa_oncosalud").empty();
        $("#form_tipo_programa_oncosalud").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar tipo programa oncosalud");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo tipo programa oncosalud");
        }
        $("#modal-form-tipo-programa-oncosalud").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-tipo-programa-oncosalud', function() {
    var id=$(this).data("id");
    var url="controller_func/tipo_programa_oncosalud/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_tipo_programa_oncosalud").empty();
        $("#form_show_tipo_programa_oncosalud").append(data);
        $("#form_show_tipo_programa_oncosalud :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles tipo programa oncosalud");
        $("#modal-form-show-tipo-programa-oncosalud").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_programa_oncosalud/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_activado"){
                toastr.success("Se activo el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_item"+id).removeClass('btn btn-sm btn-success activar-item').addClass('btn btn-sm btn-danger desactivar-item');
                $("#icon_item"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/tipo_programa_oncosalud/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_desactivado"){
                toastr.success("Se desactivo el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_item"+id).removeClass('btn btn-sm btn-danger desactivar-item').addClass('btn btn-sm btn-success activar-item');
                $("#icon_item"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-tipo-pro-onco', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/tipo_programa_oncosalud/exportar_excel.php",   
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