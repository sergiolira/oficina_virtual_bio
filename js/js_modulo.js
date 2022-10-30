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

/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_modulo').serialize();
    var strTitulo = document.querySelector('#txt_title').value;
    
    if (strTitulo == '') 
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
        url:'controller_func/modulo/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_modulo").empty();
                $("#modal-form-modulo").modal("hide");
                toastr.success("Se agrego modulo");
                list_modulos();
                
            }else if(data.trim()=="true_update"){
                $("#form_modulo").empty();
                $("#modal-form-modulo").modal("hide");
                toastr.success("Se actualizo modulo");
                list_modulos();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------Modal SHOW vista------*/
function list_modulos()
{
    $.ajax({
        url:"controller_func/modulo/list.php"
    }).done(function(data){
        $('.table-tipo-modulo').empty();
        $('.table-tipo-modulo').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-modulo', function() {
    var id=$(this).data("id");
    var url="controller_func/modulo/create.php?id="+id;
    $.get(url, function(data){
        $("#form_modulo").empty();
        $("#form_modulo").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar modulo");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo modulo");
        }
        $("#modal-form-modulo").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-modulo', function() {
    var id=$(this).data("id");
    var url="controller_func/modulo/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_modulo").empty();
        $("#form_show_modulo").append(data);
        $("#form_show_modulo :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles modulo");
        $("#modal-form-show-modulo").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/modulo/accion.php',
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
        url:'controller_func/modulo/accion.php',
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

$(document).on('change', '#slt_nivel', function() {
    var selected=$("#slt_nivel").val();
    if (selected==1 || selected==3) {
        $("#op").find('i').remove().end().append('<i class="text-danger" title="ingrese link">*</i>').val('0');
    } else {
        $("#op").find('i').remove().end().append('<i class="text-danger" title="Complete este campo">(Opcional para nivel 2)</i>').val('0');
    } 
});

//Exportar Excel-----------------------------------------------------------------------------------------------------------------------

$(document).on('click', '.exportar-excel-modulos', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/modulo/exportar_excel.php",   
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