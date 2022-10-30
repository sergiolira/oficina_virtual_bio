function list_cliente_bmi(){
    $.ajax({
        url:"controller_func/cliente_bmi/list.php"
    }).done(function(data){
        $('.table-cliente-bmi').empty();
        $('.table-cliente-bmi').append(data);        
    })
}



/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-cliente-bmi', function() {
    document.getElementById('btn_save').disabled = true;
    var id=$(this).data("id");
    var url="controller_func/cliente_bmi/create.php?id="+id;
    $.get(url, function(data){
        $("#form_cliente_bmi").empty();
        $("#form_cliente_bmi").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar Cliente");
            document.getElementById('btn_save').disabled = false;
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo Cliente");
        }
        $("#modal-form-cliente-bmi").modal("show");
    })
});

$(document).on('click', '#btn_save', function() {
    var data=$('#form_cliente_bmi').serialize();
     $.ajax({
        type:'POST',
        url:'controller_func/cliente_bmi/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_cliente_bmi").empty();
                $("#modal-form-cliente-bmi").modal("hide");
                toastr.success("Se creó un nuevo Cliente");
                list_cliente_bmi();   
            }else if(data.trim()=="true_update"){
                $("#form_cliente_bmi").empty();
                $("#modal-form-cliente-bmi").modal("hide");
                toastr.success("Se actualizo el Cliente");
                list_cliente_bmi();                

            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");


            }else{
                toastr.error("No se guardaron correctamente los datos. Complete todos los campos");
            }
        } 
    })
});


/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-cliente-bmi', function() {
    var id=$(this).data("id");
    var url="controller_func/cliente_bmi/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_cliente_bmi").empty();
        $("#form_show_cliente_bmi").append(data);
        $("#form_show_cliente_bmi :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles del Agente");
        $("#modal-form-show-cliente-bmi").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/cliente_bmi/accion.php',
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
/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/cliente_bmi/accion.php',
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
//obtener "value"-----------------------------------------------------------------------------------------------------------------------
$(document).on('change', '#slt_departamendto_selecionado', function() {
    var selected=$("#slt_departamendto_selecionado").val()
    $("#slt_distrito_selecionado").find('option').remove().end().append('<option value="0">SELECCIONAR DISTRITO</option>').val('0');
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_provinces/combo_x_dep.php',
        data:{'id_departamento_seleccionado': selected} ,
        success:function(data){  
            $('#slt_provincia_selecionado').html(data);
        }
    })
});
//obtener "value"
$(document).on('change', '#slt_provincia_selecionado', function() {    
    var selected = $("#slt_provincia_selecionado").val();
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_districts/combo_x_prov.php',
        data:{'id_provincia_seleccionado': selected} ,
        success:function(data){
            $('#slt_distrito_selecionado').html(data);
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
$(document).on('click', '.exportar-excel-cliente-bmi', function() {
    $.ajax({
        type:'POST',
        url:'controller_func/cliente_bmi/exportar_excel.php',
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