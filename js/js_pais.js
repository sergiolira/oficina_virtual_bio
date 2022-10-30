/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gpais', function() {
    var data=$('#form_pais').serialize();
    var strMarca = document.querySelector('#txt_pais').value;
    
    if (strMarca == '') 
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
        url:'controller_func/pais/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_pais").empty();
                $("#modal-form-pais").modal("hide");
                toastr.success("Se creó el país");
                list_pais();
                
            }else if(data.trim()=="true_update"){
                $("#form_pais").empty();
                $("#modal-form-pais").modal("hide");
                toastr.success("Se actualizó el país");
                list_pais();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

//mostrar listaa
function list_pais()
{
    $.ajax({
        url:"controller_func/pais/list.php"
    }).done(function(data){
        $('.table_pais').empty();
        $('.table_pais').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_pais_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/pais/create.php?id="+id;
    $.get(url, function(data){
        $("#form_pais").empty();
        $("#form_pais").append(data);
        if(id>0){
            $(".title_pais").empty();
            $(".title_pais").append("Modificar país");
        }else{
            $(".title_pais").empty();
            $(".title_pais").append("Nueva país");
        }
        $("#modal-form-pais").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_pais_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/pais/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_pais").empty();
        $("#form_show_pais").append(data);
        $("#form_show_pais :input").prop('disabled',true);
        $("#modal-show-pais").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-pais', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/pais/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_pais"+id).removeClass('btn btn-sm btn-success activar-pais').addClass('btn btn-sm btn-danger desactivar-pais');
                $("#icon_pais"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-pais', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/pais/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_pais"+id).removeClass('btn btn-sm btn-danger desactivar-pais').addClass('btn btn-sm btn-success activar-pais');
                $("#icon_pais"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-pais', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/pais/exportar_excel.php",   
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