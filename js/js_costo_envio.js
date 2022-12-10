function list_costo_envio(){
    $.ajax({
        url:"controller_func/costo_envio/list.php"
    }).done(function(data){
        $('.table_costo_envio').empty();
        $('.table_costo_envio').append(data);        
    })
}

$(document).on('click', '.nuevo_costo_envio_modal',function(){
    var id=$(this).data("id");
    var url="controller_func/costo_envio/create.php?id="+id;
    $.get(url, function(data){
        $("#form_costo_envio").empty();
        $("#form_costo_envio").append(data);
        if(id>0){
            $(".title_marca").empty();
            $(".title_marca").append("Modificar Costo de envio");
        }else{
            $(".title_marca").empty();
            $(".title_marca").append("Nuevo Costo de envio");
        }
        $("#modal-form-costo-envio").modal("show");
    })
});

//option event change value 
$(document).on('change', '#slt_departamendto_seleccionado', function() {
    var selected=$("#slt_departamendto_seleccionado").val()
    $("#slt_distrito_selecionado").find('option').remove().end().append('<option value="0">SELECCIONAR DISTRITO</option>').val('0');
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_provinces/combo_x_dep.php',
        data:{'id_departamento_seleccionado': selected} ,
        success:function(data){  
            $('#slt_provincia_seleccionado').html(data);
        }
    })
});
//obtener "value"
$(document).on('change', '#slt_provincia_seleccionado', function() {    
    var selected = $("#slt_provincia_seleccionado").val();
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_districts/combo_x_prov.php',
        data:{'id_provincia_seleccionado': selected} ,
        success:function(data){
            $('#slt_distrito_seleccionado').html(data);
        }
    })
});


$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/costo_envio/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_marca"+id).removeClass('btn btn-sm btn-success activar-item').addClass('btn btn-sm btn-danger desactivar-item');
                $("#icon_marca"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/costo_envio/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_marca"+id).removeClass('btn btn-sm btn-danger desactivar-item').addClass('btn btn-sm btn-success activar-item');
                $("#icon_marca"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});


$(document).on('click', '#btn_save', function() {
    var data=$('#form_costo_envio').serialize();
    if($("#slt_pais_seleccionado").val()==0){
        toastr.error("Seleccione un País");
        return false;
    }

    if($("#slt_departamendto_seleccionado").val()==0 && $("#slt_pais_seleccionado").val()==1){
        toastr.error("Seleccione un País");
        return false;
    }
    
    if($("#txt_monto").val()==''){
        toastr.error("Ingrese un Monto");
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
        url:'controller_func/costo_envio/accion.php',
        data:data,
        success:function(data){ 
            console.log(data);         
            if(data.trim()=="true_create"){               
                $("#form_costo_envio").empty();
                $("#modal-form-costo-envio").modal("hide");
                toastr.success("Se creó el tipo de Venta");
                list_costo_envio();
            }else if(data.trim()=="true_update"){
                $("#form_costo_envio").empty();
                $("#modal-form-costo-envio").modal("hide");
                toastr.success("Se actualizó el tipo de Venta");
                list_costo_envio();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});


$(document).on('click', '.show_costo_envio_modal', function() {
    var id=$(this).data("id");
    var url="controller_func/costo_envio/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_costo_envio").empty();
        $("#form_show_costo_envio").append(data);
        $("#form_show_costo_envio :input").prop('disabled',true);
        $("#modal-show-costo-envio").modal("show");
    })
});


$(document).on('change', '#slt_pais_seleccionado', function() {

    var sltpais=$("#slt_pais_seleccionado").val();
  
    if(sltpais=="1"){
      $(".div_departamento").show();
      $(".div_provincia").show();
      $(".div_distrito").show();    
    }else{
      $(".div_departamento").hide();
      $(".div_provincia").hide();
      $(".div_distrito").hide();
    }
});


$(document).on('change', '#sltdepartamento', function() {

    var sltdepartamento=$("#sltdepartamento").val();
    var dataString = {"id_departamento_seleccionado":sltdepartamento}
  
   $.ajax({
        type: 'POST',
        url:"controller_func/ubigeo_peru_provinces/combo_x_dep.php",
        data: dataString
        }).done(function(info){
          $('#sltprovincia').empty();
          $("#sltprovincia").append(info);
          

        });
  });
  
  $(document).on('change', '#sltprovincia', function() {
  
    var sltprovincia=$("#sltprovincia").val();
    var sltdepartamento=$("#sltdepartamento").val();
    var dataString = {"sltdepartamento":sltdepartamento,"id_provincia_seleccionado":sltprovincia}
  
   $.ajax({
        type: 'POST',
        url:"controller_func/ubigeo_peru_districts/combo_x_prov.php",
        data: dataString
        }).done(function(info){
          $('#slt_distrito_seleccionado').empty();
          $("#slt_distrito_seleccionado").append(info);
        });
  });
  
  