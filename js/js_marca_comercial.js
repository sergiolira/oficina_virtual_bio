/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gmarca', function() {
    var data=$('#form_marca').serialize();
    
    var strMarca = document.querySelector('#txt_mco').value;
    var strobservacion = document.querySelector('#txt_obs').value;
    
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
        url:'controller_func/marca_comercial/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_marca").empty();
                $("#modal-form-marca").modal("hide");
                toastr.success("Se creó la marca");
                list_marca_comercial();
                
            }else if(data.trim()=="true_update"){
                $("#form_marca").empty();
                $("#modal-form-marca").modal("hide");
                toastr.success("Se actualizó la marca");
                list_marca_comercial();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

/* ------ data table Mostrar Lista ------*/
function list_marca_comercial()
{
    
    $.ajax({
        url:"controller_func/marca_comercial/listar.php"
    }).done(function(data){
        $('.table_marca').empty();
        $('.table_marca').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_marca_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/marca_comercial/create.php?id="+id;
    $.get(url, function(data){
        $("#form_marca").empty();
        $("#form_marca").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar marca comercial");
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nueva marca comercial");
        }
        $("#modal-form-marca").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_marca_modal', function() {
    
    var id=$(this).data("id");
    var url="controller_func/marca_comercial/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_marca").empty();
        $("#form_show_marca").append(data);
        $("#form_show_marca :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles marca comercial");
        $("#modal-show-marca").modal("show");
    })
});

$(document).on('click', '.delete-can', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"delete"};
    $.ajax({
        type:'POST',
        url:'controller_func/candidato/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_delete"){
                toastr.success("Se elimino el item correctamente");
                list_candidatos();
            }
        }
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-marca', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/marca_comercial/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_marca"+id).removeClass('btn btn-sm btn-success activar-marca').addClass('btn btn-sm btn-danger desactivar-marca');
                $("#icon_marca"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-marca', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/marca_comercial/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_marca"+id).removeClass('btn btn-sm btn-danger desactivar-marca').addClass('btn btn-sm btn-success activar-marca');
                $("#icon_marca"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-marca-com', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/marca_comercial/exportar_excel.php",   
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