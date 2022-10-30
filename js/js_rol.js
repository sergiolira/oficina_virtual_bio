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
    var data=$('#form_rol').serialize();
    var strRol = document.querySelector('#txt_rol').value;
    var strDescripcion = document.querySelector('#txt_descrip').value;
    
    if (strRol == '') 
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
        url:'controller_func/rol/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_rol").empty();
                $("#modal-form-rol").modal("hide");
                toastr.success("Se creo un nuevo rol");
                list_roles();
                
            }else if(data.trim()=="true_update"){
                $("#form_rol").empty();
                $("#modal-form-rol").modal("hide");
                toastr.success("Se actualizo el rol");
                list_roles();                

            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");


            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ data table Mostrar Lista ------*/
function list_roles()
{
    $.ajax({
        url:"controller_func/rol/list.php"
    }).done(function(data){
        $('.table-roles').empty();
        $('.table-roles').append(data);        
    })
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-rol', function() {
    var id=$(this).data("id");
    var url="controller_func/rol/create.php?id="+id;
    $.get(url, function(data){
        $("#form_rol").empty();
        $("#form_rol").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar rol");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo rol");
        }
        $("#modal-form-rol").modal("show");
    })
});


/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-rol', function() {
    var id=$(this).data("id");
    var url="controller_func/rol/show.php?id="+id;
    $.get(url, function(data){
        $("#form_rol").empty();
        $("#form_rol").append(data);
        $("#form_rol :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles del rol");
        $("#modal-form-rol").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/rol/accion.php',
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

/* ------ Desactiar Estado------*/
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/rol/accion.php',
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

//Exportar Excel-----------------------------------------------------------------------------------------------------------------------

$(document).on('click', '.exportar-excel-rol', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/rol/exportar_excel.php",   
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