function list_comision_agente_bmi(){
    $.ajax({
        url:"controller_func/comision_agente_bmi/list.php"
    }).done(function(data){
        $('.table-cliente-bmi').empty();
        $('.table-cliente-bmi').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-cliente-bmi', function() {
    document.getElementById('btn_save').disabled = true;
    var id=$(this).data("id");
    var url="controller_func/comision_agente_bmi/create.php?id="+id;
    $.get(url, function(data){
        $("#form_cliente_bmi").empty();
        $("#form_cliente_bmi").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar Comision");
            document.getElementById('btn_save').disabled = false;
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nueva Comisión");
        }
        $("#modal-form-cliente-bmi").modal("show");
    })
});

$(document).on('click', '#btn_save', function() {
    var data=$('#form_cliente_bmi').serialize();
     $.ajax({
        type:'POST',
        url:'controller_func/comision_agente_bmi/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_cliente_bmi").empty();
                $("#modal-form-cliente-bmi").modal("hide");
                toastr.success("Se creó una comisión");
                list_comision_agente_bmi();   
            }else if(data.trim()=="true_update"){
                $("#form_cliente_bmi").empty();
                $("#modal-form-cliente-bmi").modal("hide");
                toastr.success("Se actualizo la comisión");
                list_comision_agente_bmi();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos. Complete todos los campos.");
            }
        } 
    })
});
/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/comision_agente_bmi/accion.php',
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
        url:'controller_func/comision_agente_bmi/accion.php',
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

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-cliente-bmi', function() {
    var id=$(this).data("id");
    var url="controller_func/comision_agente_bmi/show.php?id="+id;
    $.get(url, function(data){
        console.log(data);
        $("#form_show_cliente_bmi").empty();
        $("#form_show_cliente_bmi").append(data);
        $("#form_show_cliente_bmi :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles del Agente");
        $("#modal-form-show-cliente-bmi").modal("show");
    })
});


//select anidado 
$(document).on('change', '#slt_ramo', function() {
    var option = $("#slt_ramo").val();
    //$("#slt_plazo_selecionado").find('option').remove().end().append('<option value="0">SELECCIONAR PLAZO</option>').val('0');
    $.ajax({
        type:'POST',
        url:'controller_func/producto_bmi/combo_x_producto.php',
        data:{'id_ramo_seleccionado': option} ,
        success:function(data){  
            $('#slt_producto_bmi').html(data);
        }
    })
});