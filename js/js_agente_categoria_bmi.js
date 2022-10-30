//function list_cateogira_agente_bmi
function list_cateogira_agente_bmi(){
    $.ajax({
        url:"controller_func/agente_categoria_bmi/list.php"
    }).done(function(data){
        $('.table_agente_categoria').empty();
        $('.table_agente_categoria').append(data);        
    })
}
//function show modal ramo 
$(document).on('click', '.nuevo_agente_categoria_modal', function() {
    document.getElementById('btn_save').disabled = true;
    var id=$(this).data("id");
    var url="controller_func/agente_categoria_bmi/create.php?id="+id;
    $.get(url, function(data){
        $("#form_agente_categoria").empty();
        $("#form_agente_categoria").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar Categoria - Agente");
            document.getElementById('btn_save').disabled = false;
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nueva Categoría - Agente");
        }
        $("#modal-form-agente-categoria").modal("show");
    })
});

$(document).on('click', '#btn_save', function() {
    var data=$('#form_agente_categoria').serialize();
    $.ajax({
        type:'POST',
        url:'controller_func/agente_categoria_bmi/accion.php',
        data:data,
        success:function(data){         
            if(data.trim()=="true_create"){               
                $("#form_agente_categoria").empty();
                $("#modal-form-agente-categoria").modal("hide");
                toastr.success("Se creó la Categoría - Agente");
                list_cateogira_agente_bmi();
            }else if(data.trim()=="true_update"){
                $("#form_agente_categoria").empty();
                $("#modal-form-agente-categoria").modal("hide");
                toastr.success("Se actualizó la Categoría - Agente");
                list_cateogira_agente_bmi();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                
                toastr.error("No se guardaron correctamente los datos. Complete todos los campos");    
            }
        }
    })
});

//function show data ramo modal-view
$(document).on('click', '.show_agente_categoria_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/agente_categoria_bmi/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_agente_categoria").empty();
        $("#form_show_agente_categoria").append(data);
        $("#form_show_agente_categoria :input").prop('disabled',true);
        $("#modal-show-agente-categoria").modal("show");
    })
});

//function activate state
$(document).on('click', '.activar-marca', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/agente_categoria_bmi/accion.php',
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
//function disable status
$(document).on('click', '.desactivar-marca', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/agente_categoria_bmi/accion.php',
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


//exportar a excel
//interval
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
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('Estaba cerrado por el temporizador')
      }
    })
}  
//export data excel
$(document).on('click', '.exportar-excel-categoria-agente-bmi', function() {
    $.ajax({
        type:'POST',
        url:'controller_func/agente_categoria_bmi/exportar_excel.php',
        dataType:'json',
        beforeSend:function(){
            cargar_data();
        },complete:function(){
            Swal.close();
        },}).done(function(data){
            var $a = $("<a>");
            $a.attr("href",data.file);
            $("body").append($a);
            $a.attr("download",data.namearchivo+".xlsx");
            $a[0].click();
            $a.remove();
    });
});