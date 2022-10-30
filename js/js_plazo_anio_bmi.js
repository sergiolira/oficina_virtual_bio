//function list_producto_bmi
function list_plazo_anio_bmi(){
    $.ajax({
        url:"controller_func/plazo_anio_bmi/list.php"
    }).done(function(data){
        $('.table_plazo').empty();
        $('.table_plazo').append(data);        
    })
}
//function open modal create or edit-view
$(document).on('click', '.nuevo_plazo_modal', function() {
    document.getElementById('btn_save').disabled = true;
    var id=$(this).data("id");
    var url="controller_func/plazo_anio_bmi/create.php?id="+id;
    $.get(url, function(data){
        $("#form_plazo").empty();
        $("#form_plazo").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar Año Producto BMI");
            document.getElementById('btn_save').disabled = false;
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nuevo Año Producto");
        }
        $("#modal-form-plazo").modal("show");
    })
});
//function insert or update producto_bmi;
$(document).on('click', '#btn_save', function() {
    var data=$('#form_plazo').serialize();
    $.ajax({
        type:'POST',
        url:'controller_func/plazo_anio_bmi/accion.php',
        data:data,
        success:function(data){         
            if(data.trim()=="true_create"){               
                $("#form_plazo").empty();
                $("#modal-form-plazo").modal("hide");
                toastr.success("Se creó el Año");
                list_plazo_anio_bmi();
            }else if(data.trim()=="true_update"){
                $("#form_plazo").empty();
                $("#modal-form-plazo").modal("hide");
                toastr.success("Se actualizó el Año");
                list_plazo_anio_bmi();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                
                toastr.error("No se guardaron correctamente los datos. Complete todos los campos");    
            }
        }
    })
});

//function show data producto_bmi modal-view
$(document).on('click', '.show_marca_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/plazo_anio_bmi/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_plazo").empty();
        $("#form_show_plazo").append(data);
        $("#form_show_plazo :input").prop('disabled',true);
        $("#modal-show-plazo").modal("show");
    })
});

//function activate state
$(document).on('click', '.activar-marca', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/plazo_anio_bmi/accion.php',
        data:data,
        success:function(data){         
            if(data.trim()=="true_activado"){
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
        url:'controller_func/plazo_anio_bmi/accion.php',
        data:data,
        success:function(data){           
            if(data.trim()=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_marca"+id).removeClass('btn btn-sm btn-danger desactivar-marca').addClass('btn btn-sm btn-success activar-marca');
                $("#icon_marca"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});


$(document).on('change', '#stl_ramo_seleccionado', function() {
    var option = $("#stl_ramo_seleccionado").val();
    $.ajax({
        type:'POST',
        url:'controller_func/producto_bmi/combo_x_producto.php',
        data:{'id_ramo_seleccionado': option} ,
        success:function(data){  
            $('#slt_producto_selecionado').html(data);
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
$(document).on('click', '.exportar-excel-plazo-anio-bmi', function() {
    $.ajax({
        type:'POST',
        url:'controller_func/plazo_anio_bmi/exportar_excel.php',
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