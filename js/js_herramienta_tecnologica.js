/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gh_tec', function() {
    
    var data=$('#form_h_tec').serialize();
    var str_t_e = document.querySelector('#slt_t_e').value;
    var strdesc = document.querySelector('#txt_desc').value;
    var str_m_e = document.querySelector('#slt_m_e').value;
    var str_modelo = document.querySelector('#txt_mod').value;
    var str_nro_s = document.querySelector('#txt_n_s').value;
    var str_f_c = document.querySelector('#txt_f_c').value;
    var str_f_g = document.querySelector('#txt_f_g').value;
    var str_pre = document.querySelector('#txt_pre').value;
    var str_c_e = document.querySelector('#slt_c_e').value;
    var str_v_a = document.querySelector('#txt_v_a').value;
    
    if (str_t_e == '0') 
    {
        toastr.error("Seleccione un tipo de equipo.");
        return false;
    }
    else if (strdesc == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (str_m_e == '0') 
    {
        toastr.error("Seleccione una marca de equipo.");
        return false;
    }
    else if (str_modelo == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (str_nro_s == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (str_f_c == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (str_f_g == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (str_pre == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (str_c_e == '0') 
    {
        toastr.error("Seleccione una marca de equipo.");
        return false;
    }
    else if (str_v_a == '') 
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
        url:'controller_func/herramienta_tecnologica/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_h_tec").empty();
                $("#modal-form-h_tec").modal("hide");
                toastr.success("Se creó la herramienta tecnologica");
                list_herramienta_tec();
                
            }else if(data.trim()=="true_update"){
                $("#form_h_tec").empty();
                $("#modal-form-h_tec").modal("hide");
                toastr.success("Se actualizó la herramienta tecnologica");
                list_herramienta_tec();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});

/* ------ data table Mostrar Lista ------*/
function list_herramienta_tec()
{
    $.ajax({
        url:"controller_func/herramienta_tecnologica/list.php"
    }).done(function(data){
        $('.table_h_tec').empty();
        $('.table_h_tec').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_h_tec_modal', function() {
    
    var id=$(this).data("id");
    var url="controller_func/herramienta_tecnologica/create.php?id="+id;
    $.get(url, function(data){
        $("#form_h_tec").empty();
        $("#form_h_tec").append(data);
        if(id>0){
            $(".title_h_tec").empty();
            $(".title_h_tec").append("Modificar herramienta tecnologica");
        }else{
            $(".title_h_tec").empty();
            $(".title_h_tec").append("Nueva herramienta tecnologica");
        }
        $("#modal-form-h_tec").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_h_tec_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/herramienta_tecnologica/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_h_tec").empty();
        $("#form_show_h_tec").append(data);
        $("#form_show_h_tec :input").prop('disabled',true);
        $("#modal-show-h_tec").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-h_tec', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/herramienta_tecnologica/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_h_tec"+id).removeClass('btn btn-sm btn-success activar-h_tec').addClass('btn btn-sm btn-danger desactivar-h_tec');
                $("#icon_h_tec"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-h_tec', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/herramienta_tecnologica/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_h_tec"+id).removeClass('btn btn-sm btn-danger desactivar-h_tec').addClass('btn btn-sm btn-success activar-h_tec');
                $("#icon_h_tec"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
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
$(document).on('click', '.exportar-excel-h-tec', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/herramienta_tecnologica/exportar_excel.php",   
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
