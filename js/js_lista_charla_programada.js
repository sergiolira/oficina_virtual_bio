/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gl_c_p', function() {
    
    var data=$('#form_l_c_p').serialize();
    
    var strtitulo = document.querySelector('#txt_t').value;
    var str_f_c = document.querySelector('#txt_f_c').value;
    var str_h_c = document.querySelector('#txt_h_c').value;
    var id_cap=document.querySelector('#slt_cap').value;
    var id_e_p_c=document.querySelector('#slt_e_p_c').value;
    
    
    
    if (strtitulo == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (str_f_c == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (str_h_c == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (id_cap == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (id_cap == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (id_e_p_c == '') 
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
        url:'controller_func/cabecera_programacion_charla/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_create"){               
                $("#form_l_c_p").empty();
                $("#modal-form-l_c_p").modal("hide");
                toastr.success("Se creó la Charla");
                list_lista_charla_programada();
                
            }else if(data.trim()=="true_update"){
                $("#form_l_c_p").empty();
                $("#modal-form-l_c_p").modal("hide");
                toastr.success("Se actualizó la charla");
                list_lista_charla_programada();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_lista_charla_programada()
{   
    
    $.ajax({
        url:"controller_func/cabecera_programacion_charla/list.php"
    }).done(function(data){
        $('.table_l_c_p').empty();
        $('.table_l_c_p').append(data);        
    });
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_l_c_p_modal', function() {
   
    var id=$(this).data("id");
    var url="controller_func/cabecera_programacion_charla/create.php?id="+id;
    $.get(url, function(data){
        $("#form_l_c_p").empty();
        $("#form_l_c_p").append(data);
        if(id>0){
            $(".title_l_c_p").empty();
            $(".title_l_c_p").append("Modificar charla");
        }else{
            $(".title_l_c_p").empty();
            $(".title_l_c_p").append("Nueva charla");
        }
        $("#modal-form-l_c_p").modal("show");
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

//Show listado de charlas
$(document).on('click', '.show_list_can_modal', function() {
    
    var id_cabecera=$(this).data("id_cabecera");
    
    var url="controller_func/detalle_programacion_charla/list_can_charla.php?id_cabecera="+id_cabecera;
    $.get(url, function(data){
        $('.row_list_can').empty();
        $('.row_list_can').append(data);
        $('#modal-show-list_can').modal('show');
    })
  });

  $(document).on('click', '.switch_list_can', function() {
    var id_can=$(this).data("id");
    var desc=$(this).data("desc");
    

    switch (desc) {
        case "candidato":      
            var estado_switch_permiso=$('input:checkbox[name=customSwitch1'+id+']:checked').val();      
            break;
        
    }
    
    var data={"id_mod":id,"id_rol":id_rol,"desc":desc,"estado_switch_permiso":estado_switch_permiso};

    $.ajax({
        type:'POST',
        url:'controller_func/permiso/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true"){
                toastr.success("Se actualizo el item correctamente");
            }
        }
    })   
   
});