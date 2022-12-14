var regexemail= /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//Lista
function list_candidato(){
    $.ajax({
    url:"controller_func/candidato/list.php"
    }).done(function(info){
      $('.tbody_list').empty();
      $(".tbody_list").append(info);
    })
  
  }

//Crear Candidato 
$(document).on('click', '.add-modal-candidato', function() {
    var id = $(this).data('id');
    var url = "controller_func/candidato/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-user'></i> Nuevo Candidato");
    });
});


//Guardar Candidato x rep
$('.modal-footer').on('click', '.add-candidato', function() {


    var txtnombre=$("#txtnombre").val();
    var txtapep=$("#txtapep").val();
    var txtapem=$("#txtapem").val();
    var txtcorreo=$("#txtcorreo").val();
    var slt_t_d=$("#slt_t_d").val();
    var txtnro_doc=$("#txtnro_doc").val();
    var txttelefono=$("#txttelefono").val();
    var sltgenero=$("#sltgenero").val();
    var txtfechanac=$("#txtfechanac").val();
    var sltpais=$("#sltpais").val();
    var sltdepartamento=$("#sltdepartamento").val();
    var sltprovincia=$("#sltprovincia").val();
    var sltdistrito=$("#sltdistrito").val();
    var txtdireccion=$("#txtdireccion").val();

    if(txtnombre.trim()==""){
      $('#txtnombre').attr('class','form-control is-invalid');
      $('.msj-txtnombre').empty();
      $('.msj-txtnombre').append("-  escriba un nombre");
      window.setTimeout(function() { $('.msj-txtnombre').html("");$('#txtnombre').attr('class','form-control');}, 3000);
      return false;
    }
    if(txtapep.trim()==""){
      $('#txtapep').attr('class','form-control is-invalid');
      $('.msj-txtapep').empty();
      $('.msj-txtapep').append("-  escriba un apellido paterno");
      window.setTimeout(function() { $('.msj-txtapep').html("");$('#txtapep').attr('class','form-control');}, 3000);
      return false;
    }
    if(txtapem.trim()==""){
      $('#txtapem').attr('class','form-control is-invalid');
      $('.msj-txtapem').empty();
      $('.msj-txtapem').append("-  escriba un apellido materno");
      window.setTimeout(function() { $('.msj-txtapem').html("");$('#txtapem').attr('class','form-control');}, 3000);
      return false;
    }
    if(slt_t_d.trim()=="" || slt_t_d==0){
      $('.msj-slt_t_d').empty();
      $('.msj-slt_t_d').append(" - Seleccione una opci??n");
      window.setTimeout(function() {$('.msj-slt_t_d').html("");}, 3000);                
      return false;
    }
    if(txtnro_doc.trim()=="" || txtnro_doc<=7){
      $('#txtnro_doc').attr('class','form-control is-invalid');
      $('.msj-txtnro_doc').empty();
      $('.msj-txtnro_doc').append("-N?? debe ser de mas de 7 digitos");
      window.setTimeout(function() { $('.msj-txtnro_doc').html("");$('#txtnro_doc').attr('class','form-control');}, 3000);    
      return false; 
    }
    if(txttelefono.trim()==""){
      $('#txttelefono').attr('class','form-control is-invalid');
      $('.msj-txttelefono').empty();
      $('.msj-txttelefono').append("-  escriba un N?? de celular / telefono");
      window.setTimeout(function() { $('.msj-txttelefono').html("");$('#txttelefono').attr('class','form-control');}, 3000);
      return false;
    }
    if(txtcorreo.trim()==""){
      $('#txtcorreo').attr('class','form-control is-invalid');
      $('.msj-txtcorreo').empty();
      $('.msj-txtcorreo').append("-  escriba un correo electronico");
      window.setTimeout(function() { $('.msj-txtcorreo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
      return false;
    }
    if((regexemail.test(txtcorreo))==false){
      $('#txtcorreo').attr('class','form-control is-invalid');
      $('.msj-txtcorreo').empty();
      $('.msj-txtcorreo').append("-  escriba un correo electronico correcto");
      window.setTimeout(function() { $('.msj-txtcorreo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
      return false;
    }
    if(sltgenero.trim()=="" || sltgenero==0){
      $('.msj-sltgenero').empty();
      $('.msj-sltgenero').append(" - Seleccione una opci??n");
      window.setTimeout(function() {$('.msj-sltgenero').html("");}, 3000);                
      return false;
    }
    if(txtfechanac.trim()==""){
      $('#txtfechanac').attr('class','form-control is-invalid');
      $('.msj-txtfechanac').empty();
      $('.msj-txtfechanac').append("-  escriba una fecha de nacimiento");
      window.setTimeout(function() { $('.msj-txtfechanac').html("");$('#txtfechanac').attr('class','form-control');}, 3000);
      return false;
    }
    if(sltpais.trim()=="" || sltpais==0){
      $('.msj-sltpais').empty();
      $('.msj-sltpais').append(" - Seleccione una opci??n");
      window.setTimeout(function() {$('.msj-sltpais').html("");}, 3000);                
      return false;
    }
    if((sltdepartamento==0 || sltdepartamento=="0") && sltpais=="1"){
      $('.msj-sltdepartamento').empty();
      $('.msj-sltdepartamento').append(" - Seleccione una opci??n");
      window.setTimeout(function() {$('.msj-sltdepartamento').html("");}, 3000);                
      return false;
    }
    if((sltprovincia.trim()=="" || sltprovincia==0) && sltpais=="1"){
      $('.msj-sltprovincia').empty();
      $('.msj-sltprovincia').append(" - Seleccione una opci??n");
      window.setTimeout(function() {$('.msj-sltprovincia').html("");}, 3000);                
      return false;
    }
    if((sltdistrito.trim()=="" || sltdistrito==0) && sltpais=="1"){
      $('.msj-sltdistrito').empty();
      $('.msj-sltdistrito').append(" - Seleccione una opci??n");
      window.setTimeout(function() {$('.msj-sltdistrito').html("");}, 3000);                
      return false;
    }
    if(txtdireccion.trim()==""){
      $('#txtdireccion').attr('class','form-control is-invalid');
      $('.msj-txtdireccion').empty();
      $('.msj-txtdireccion').append("-  escriba una direcci??n");
      window.setTimeout(function() { $('.msj-txtdireccion').html("");$('#txtdireccion').attr('class','form-control');}, 3000);
      return false;
    }
        var dataString = $('#formadd').serialize();
        $.ajax({
          type: 'POST',
          url: 'controller_func/candidato/accion.php',
          data: dataString,
          success: function(data) {
            switch (data) {            
              case "save_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se agrego el item correctamente');
                  list_candidato();
                 break;
              case "edit_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se modifico el item correctamente');
                  list_candidato();
                 break;
              case "edad_false":
                $('#txtfechanac').attr('class','form-control is-invalid');
                $('.msj-txtfechanac').empty();
                $('.msj-txtfechanac').append("- la edad debe superar o ser igual a 20 a??os");
                window.setTimeout(function() { $('.msj-txtfechanac').html("");$('#txtfechanac').attr('class','form-control');}, 3000);
                break;                        
              default:
                  toastr.error('Error 505');
                 break;
            }
          }
        });
});
  

//Show Tipo de Red MLM
$(document).on('click', '.show-modal-candidato', function() {
  
    var id = $(this).data('id');
    var url = "controller_func/candidato/show.php?id="+id;
    $.get(url, function (data) {
        $('#formshow').empty();
        $('#formshow').append(data);
        $('#formshow :input').prop('disabled', true); 
        $('#showModal').modal('show');
    });
});
  
$(document).on('keyup', '#txtnro_doc', function() {
var hdnid=$("#hdnid").val();
var txtnro_doc=$("#txtnro_doc").val();


if(txtnro_doc.trim()=="" || txtnro_doc.length<=7){
    $('#txtnro_doc').attr('class','form-control is-invalid');
    $('.msj-txtnro_doc').empty();
    $('.msj-txtnro_doc').append("-N?? documento debe ser mayor a 7 digitos");
    window.setTimeout(function() { $('.msj-txtnro_doc').html("");$('#txtnro_doc').attr('class','form-control');}, 3000);    
    return false; 
}

var dataString = {"txtnro_doc":txtdni,"hdnid":hdnid};
var url='controller_func/validar/validar_dni_candidato.php';

$.ajax({
    type: 'POST',
    url: url,
    data: dataString,
    success: function(data) {
        if(data=="true"){
        $('#txtdni').attr('class','form-control is-invalid');
        $('.msj-txtnro_doc').empty();
        $('.msj-txtnro_doc').append("-N?? documento ya se encuentra registrado");
        $('.add-candidato-x-rep').prop('disabled', true);
        $('.add-candidato').prop('disabled', true);
        }else{
        $('#txtdni').attr('class','form-control is-valid');
        $('.msj-txtnro_doc').empty();
        $('.add-candidato-x-rep').prop('disabled', false);
        $('.add-candidato').prop('disabled', false);
        }
    }
});
});


$(document).on('click', '.report-excel-candidato', function() {
$.ajax({
    type: 'PATCH',
    url:window.location.href="controller_func/candidato/exportarexcel.php",
    beforeSend:function(){
    cargar_data();
    },
    complete:function(){
    Swal.close();
    },
    }).done(function(info){ });     
});



$(document).on('change', '#sltrelacion', function() {

    var sltrelacion=$("#sltrelacion").val();
    if(sltrelacion=="Otro"){
      $('#txtrelacion').removeAttr('disabled');
      $('#divtxtrel').attr('class','col-4');
      $('#divrecl').attr('class','col-4');
    }else{    
      $('#txtrelacion').attr('disabled', 'disabled');
      $('#divtxtrel').attr('class','col-3');
      $('#divrecl').attr('class','col-5');
    }
   
  });
  
  
  $(document).on('change', '#slt_experiencia_comercial', function() {
  
    var slt_experiencia_comercial=$("#slt_experiencia_comercial").val();
    if(slt_experiencia_comercial=="Otro"){
      $('#txt_experiencia_comercial').removeAttr('disabled');
    }else{    
      $('#txt_experiencia_comercial').attr('disabled','disabled');
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
        $('#sltdistrito').empty();
        $("#sltdistrito").append(info);
      });
});

$(document).on('click', '.r_disponibilidad_gestion_negocio', function() {
  var r_disponibilidad_gestion_negocio=$('input:radio[name=r_disponibilidad_gestion_negocio]:checked').val();
  if (r_disponibilidad_gestion_negocio == 'Si') {
    $('#checkbox_horario_gestion_negocio_1').prop('disabled', false);    
    $('#checkbox_horario_gestion_negocio_2').prop('disabled', false);
    $('#checkbox_horario_gestion_negocio_3').prop('disabled', false);
  }
  else if (r_disponibilidad_gestion_negocio == 'No') {
    $('#checkbox_horario_gestion_negocio_1').prop("checked",false);
    $('#checkbox_horario_gestion_negocio_2').prop("checked",false);
    $('#checkbox_horario_gestion_negocio_3').prop("checked",false);
    $('#checkbox_horario_gestion_negocio_1').prop('disabled', true);
    $('#checkbox_horario_gestion_negocio_2').prop('disabled', true);
    $('#checkbox_horario_gestion_negocio_3').prop('disabled', true);
  }
});

//Show listado de charlas
$(document).on('click', '.show-modal-list-charlas', function() {
  
  var id = $(this).data('id');
  var id_est_can = $(this).data('id_est_can');
  var id_est_cha = $(this).data('id_est_cha');

  var data = {"id_can":id,"id_est_can":id_est_can,"id_est_cha":id_est_cha}

  $('#list_modal_charlas').modal('show');
  var url = "controller_func/cabecera_programacion_charla/list_charlas.php";
  $.get(url,data, function (data) {
      $('.row_list_charlas').empty();
      $('.row_list_charlas').append(data);
      $('#list_modal_charlas').modal('show');
  });
});

/**programar charla */
$(document).on('click', '.btn-pro-can-charla', function() {

  var id_can = $(this).data('id_can');
  var id_est_can = $(this).data('id_est_can');
  var id_est_cha = $(this).data('id_est_cha');
  var id_cab_prog_charla=$(this).data('id_cab_prog_charla');
  var est_char=$(this).data('est_char');
  dataString = {"id_can":id_can,"id_est_can":id_est_can,"id_est_cha":id_est_cha,"id_cab_prog_charla":id_cab_prog_charla,"est_char":est_char}

  $.ajax({
      type: 'POST',
      url:"controller_func/detalle_programacion_charla/accion_programar_candidato.php",
      data: dataString
      }).done(function(info){
       switch (info) {
          case 'true':
            toastr.success('Se programo la charla correctamente');            
            list_candidato();
            $('.row_list_charlas').empty();
            $('#list_modal_charlas').modal('hide');
            break;
          case 'existe':
            toastr.success('Se programao la charla correctamente');            
            list_candidato();        
            $('.row_list_charlas').empty();
            $('#list_modal_charlas').modal('hide');
            break;
       }
      });
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-can', function() {
  var id=$(this).data("id");    
  var data={"id":id,"accion":"activar"};
  $.ajax({
      type:'POST',
      url:'controller_func/candidato/accion.php',
      data:data,
      success:function(data){            
          if(data=="true_activado"){
              toastr.success("Se activ?? el item correctamente");
              $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
              $("#btn_can"+id).removeClass('btn btn-sm btn-success activar-can').addClass('btn btn-sm btn-danger desactivar-can');
              $("#icon_can"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
          }
      }
  })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-can', function() {
  var id=$(this).data("id");    
  var data={"id":id,"accion":"desactivar"};
  $.ajax({
      type:'POST',
      url:'controller_func/candidato/accion.php',
      data:data,
      success:function(data){            
          if(data=="true_desactivado"){
              toastr.success("Se desactiv?? el item correctamente");
              $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
              $("#btn_can"+id).removeClass('btn btn-sm btn-danger desactivar-can').addClass('btn btn-sm btn-success activar-can');
              $("#icon_can"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
          }
      }
  })
});

$(document).on('change', '#sltpais', function() {

  var sltpais=$("#sltpais").val();

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