/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_ga_lic', function() {
    
    var data=$('#form_a_lic').serialize();
    
    var id_h_tec=document.querySelector('#slt_h_tec').value;
    var id_lic=document.querySelector('#slt_lic').value;
    var str_f_a = document.querySelector('#txt_f_a').value;
    var str_f_v = document.querySelector('#txt_f_v').value;
    
    
    if (id_h_tec == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (id_lic == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (str_f_a == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (str_f_v == '') 
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
        url:'controller_func/asignacion_licencia/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_a_lic").empty();
                $("#modal-form-a_lic").modal("hide");
                toastr.success("Se creo una asignación de Licencia");
                list_asignacion_licencia();
                
            }else if(data.trim()=="true_update"){
                $("#form_a_lic").empty();
                $("#modal-form-a_lic").modal("hide");
                toastr.success("Se actualizó la asignación de licencia");
                list_asignacion_licencia();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_asignacion_licencia()
{   
    
    $.ajax({
        url:"controller_func/asignacion_licencia/list.php"
        
    }).done(function(data){
        $('.table_a_lic').empty();
        $('.table_a_lic').append(data);        
    });
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_a_lic_modal', function() {
    var id=$(this).data("id");
    var id_lic=$(this).data("id_lic");
    
    var url="controller_func/asignacion_licencia/create.php?id="+id+"&id_lic="+id_lic;
    $.get(url, function(data){
        $("#form_a_lic").empty();
        $("#form_a_lic").append(data);
        if(id>0){
            $(".title_a_lic").empty();
            $(".title_a_lic").append("Modificar asignación de licencia");
        }else{
            $(".title_a_lic").empty();
            $(".title_a_lic").append("Nueva asignación de licencia");
        }
        $("#modal-form-a_lic").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_a_lic_modal', function() {
    var id=$(this).data("id");
    
    var url="controller_func/asignacion_licencia/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_a_lic").empty();
        $("#form_show_a_lic").append(data);
        $("#form_show_a_lic :input").prop('disabled',true);
        $("#modal-show-a_lic").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-a_lic', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/asignacion_licencia/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_a_lic"+id).removeClass('btn btn-sm btn-success activar-a_lic').addClass('btn btn-sm btn-danger desactivar-a_lic');
                $("#icon_a_lic"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-a_lic', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/asignacion_licencia/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_a_lic"+id).removeClass('btn btn-sm btn-danger desactivar-a_lic').addClass('btn btn-sm btn-success activar-a_lic');
                $("#icon_a_lic"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-a-lic', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/asignacion_licencia/exportar_excel.php",   
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