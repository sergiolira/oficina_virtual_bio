//function list ramo
function list_ramo_bmi(){
    $.ajax({
        url:"controller_func/ramo_bmi/list.php"
    }).done(function(data){
        $('.table_ramo').empty();
        $('.table_ramo').append(data);        
    })
}

//function show modal ramo 
$(document).on('click', '.nuevo_ramo_modal', function() {
    document.getElementById('btn_save').disabled = true;
    var id=$(this).data("id");
    var url="controller_func/ramo_bmi/create.php?id="+id;
    $.get(url, function(data){
        $("#form_ramo").empty();
        $("#form_ramo").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar Ramo");
            document.getElementById('btn_save').disabled = false;
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo Ramo");
        }
        $("#modal-form-ramo").modal("show");
    })
});
//-> function create or edit
$(document).on('click', '#btn_save', function() {
    var data=$('#form_ramo').serialize();
    $.ajax({
        type:'POST',
        url:'controller_func/ramo_bmi/accion.php',
        data:data,
        success:function(data){          
            if(data.trim()=="true_create"){               
                $("#form_ramo").empty();
                $("#modal-form-ramo").modal("hide");
                toastr.success("Se creó el Ramo");
                list_ramo_bmi();
            }else if(data.trim()=="true_update"){
                $("#form_ramo").empty();
                $("#modal-form-ramo").modal("hide");
                toastr.success("Se actualizó el Ramo");
                list_ramo_bmi();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                
                toastr.error("No se guardaron correctamente los datos. Complete todos los campos");    
            }
        }
    })
});

//function show data ramo modal-view
$(document).on('click', '.show_ramo_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/ramo_bmi/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_ramo").empty();
        $("#form_show_ramo").append(data);
        $("#form_show_ramo :input").prop('disabled',true);
        $("#modal-show-ramo").modal("show");
    })
});



//function activate state
$(document).on('click', '.activar-marca', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/ramo_bmi/accion.php',
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
        url:'controller_func/ramo_bmi/accion.php',
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
$(document).on('click', '.exportar-excel-ramo-bmi', function() {
    $.ajax({
        type:'POST',
        url:'controller_func/ramo_bmi/exportar_excel.php',
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
