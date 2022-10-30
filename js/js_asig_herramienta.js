/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_ga_h', function() {
    
    var data=$('#form_a_h').serialize();

    var id_usu=document.querySelector('#slt_usu').value;
    var id_h_tec=document.querySelector('#slt_h_tec').value;
    
    var str_f_a = document.querySelector('#txt_f_a').value;
    
    
    
    if (id_h_tec == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (id_usu == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (str_f_a == '') 
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
        url:'controller_func/asignacion_herramienta/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_a_h").empty();
                $("#modal-form-a_h").modal("hide");
                toastr.success("Se creo una asignación de herramienta");
                list_asig_herramienta();
                
            }else if(data.trim()=="true_update"){
                $("#form_a_h").empty();
                $("#modal-form-a_h").modal("hide");
                toastr.success("Se actualizó una asignación de herramienta");
                list_asig_herramienta();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_asig_herramienta()
{   
    
    $.ajax({
        url:"controller_func/asignacion_herramienta/list.php"
        
    }).done(function(data){
        $('.table_a_h').empty();
        $('.table_a_h').append(data);        
    });
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_a_h_modal', function() {
    var id=$(this).data("id");
    var id_h_tec=$(this).data("id_h_tec");
    
    var url="controller_func/asignacion_herramienta/create.php?id="+id+"&id_h_tec="+id_h_tec;
    $.get(url, function(data){
        $("#form_a_h").empty();
        $("#form_a_h").append(data);
        if(id>0){
            $(".title_a_h").empty();
            $(".title_a_h").append("Modificar asignación de herramienta");
        }else{
            $(".title_a_h").empty();
            $(".title_a_h").append("Nueva asignación de herramienta");
        }
        $("#modal-form-a_h").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_a_h_modal', function() {
    var id=$(this).data("id");
    
    var url="controller_func/asignacion_herramienta/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_a_h").empty();
        $("#form_show_a_h").append(data);
        $("#form_show_a_h :input").prop('disabled',true);
        $("#modal-show-a_h").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-a_h', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/asignacion_herramienta/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_a_h"+id).removeClass('btn btn-sm btn-success activar-a_h').addClass('btn btn-sm btn-danger desactivar-a_h');
                $("#icon_a_h"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-a_h', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/asignacion_herramienta/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_a_h"+id).removeClass('btn btn-sm btn-danger desactivar-a_h').addClass('btn btn-sm btn-success activar-a_h');
                $("#icon_a_h"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-a-herr', function() {
    alert("hola mundo");
    $.ajax({
        type:'POST',
        url:"controller_func/asignacion_herramienta/exportar_excel.php",   
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