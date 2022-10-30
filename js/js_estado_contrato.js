/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_ge_con', function() {
    var data=$('#form_e_con').serialize();
    var strConEqui = document.querySelector('#txt_e_con').value;
    
    if (strConEqui == '') 
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
        url:'controller_func/estado_contrato/accion.php',
        data:data,
        success:function(data){ 
                      
            if(data.trim()=="true_create"){               
                $("#form_e_con").empty();
                $("#modal-form-e_con").modal("hide");
                toastr.success("Se creó el estado de contrato");
                list_estado_contrato();
                
            }else if(data.trim()=="true_update"){
                $("#form_e_con").empty();
                $("#modal-form-e_con").modal("hide");
                toastr.success("Se actualizó el estado de contrato");
                list_estado_contrato();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});


//mostrar listaa
function list_estado_contrato()
{   
    $.ajax({
        url:"controller_func/estado_contrato/list.php"
    }).done(function(data){
        $('.table_e_con').empty();
        $('.table_e_con').append(data);        
    });
}
/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_e_con_modal', function() {
    
    var id=$(this).data("id");
    var url="controller_func/estado_contrato/create.php?id="+id;
    $.get(url, function(data){
        $("#form_e_con").empty();
        $("#form_e_con").append(data);
        if(id>0){
            $(".title_e_con").empty();
            $(".title_e_con").append("Modificar estado de contrato");
        }else{
            $(".title_e_con").empty();
            $(".title_e_con").append("Nuevo estado de contrato");
        }
        $("#modal-form-e_con").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_e_con_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/estado_contrato/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_e_con").empty();
        $("#form_show_e_con").append(data);
        $("#form_show_e_con :input").prop('disabled',true);
        $("#modal-show-e_con").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-e_con', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_contrato/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_e_con"+id).removeClass('btn btn-sm btn-success activar-e_con').addClass('btn btn-sm btn-danger desactivar-e_con');
                $("#icon_e_con"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-e_con', function() {
    var id=$(this).data("id");    
    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/estado_contrato/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_e_con"+id).removeClass('btn btn-sm btn-danger desactivar-e_con').addClass('btn btn-sm btn-success activar-e_con');
                $("#icon_e_con"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-estado_contrato', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/estado_contrato/exportar_excel.php",   
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