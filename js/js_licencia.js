/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_glic', function() {
    
    var data=$('#form_lic').serialize();
    
    var strLic = document.querySelector('#txt_lic').value;
    var id_t_lic=document.querySelector('#slt_t_lic').value;
    var strCod = document.querySelector('#txt_cod').value;
    var strStock = document.querySelector('#txt_stock').value;
    
    
    if (strLic == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (id_t_lic == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (strCod == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (strStock == '') 
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
        url:'controller_func/licencia/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_lic").empty();
                $("#modal-form-lic").modal("hide");
                toastr.success("Se creó la Licencia");
                list_licencia();
                
            }else if(data.trim()=="true_update"){
                $("#form_lic").empty();
                $("#modal-form-lic").modal("hide");
                toastr.success("Se actualizó la licencia");
                list_licencia();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_licencia()
{   
    
    $.ajax({
        url:"controller_func/licencia/list.php"
    }).done(function(data){
        $('.table_lic').empty();
        $('.table_lic').append(data);        
    });
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_lic_modal', function() {
   
    var id=$(this).data("id");
    var url="controller_func/licencia/create.php?id="+id;
    $.get(url, function(data){
        $("#form_lic").empty();
        $("#form_lic").append(data);
        if(id>0){
            $(".title_lic").empty();
            $(".title_lic").append("Modificar licencia");
        }else{
            $(".title_lic").empty();
            $(".title_lic").append("Nueva licencia");
        }
        $("#modal-form-lic").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_lic_modal', function() {
    var id=$(this).data("id");
    
    var url="controller_func/licencia/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_lic").empty();
        $("#form_show_lic").append(data);
        $("#form_show_lic :input").prop('disabled',true);
        $("#modal-show-lic").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-lic', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/licencia/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_lic"+id).removeClass('btn btn-sm btn-success activar-lic').addClass('btn btn-sm btn-danger desactivar-lic');
                $("#icon_lic"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-lic', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/licencia/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_lic"+id).removeClass('btn btn-sm btn-danger desactivar-lic').addClass('btn btn-sm btn-success activar-lic');
                $("#icon_lic"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-lic', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/licencia/exportar_excel.php",   
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