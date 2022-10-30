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

//Declaro una variable global regexemail
var regexemail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

/*Usuario  CRUD*/
//Crea a new usuario
  $(document).on('click', '.add-modal-usuario', function() {
    var id = $(this).data('id');
    var url = "controller_func/usuario/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-user'></i> Nuevo usuario");

    });
  });
  //Crea a new Representante lider
  $(document).on('click', '.add-modal-representante-lider', function() {
    var id = $(this).data('id');
    var url = "controller_func/representante/create_r.php?id="+id;
    $.get(url, function (data) {
      if(data=="false"){
        toastr.error('Se registraron los 50 representantes lideres. Limite permido por sistema');
      }else{
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-user'></i> Nuevo representante lider");
      }

    });
  });

//Lista de usuarios
  function list_usuarios(){
      $.ajax({
      url:"controller_func/usuario/list.php"
      }).done(function(info){
        $(".tbody_list").empty();
        $(".tbody_list").append(info);
      })

  }

//Exportar  Usuario
 $(document).on('click', '.report-excel-usuarios', function() {
        window.location.href="controller_func/usuario/exportarexcel.php";
  });

 //Exportar PDF Representante
 $(document).on('click', '.report-pdf-usuarios', function() {
        window.location.href="controller_func/usuario/exportarpdf.php";
  });


//Cargar usuarios
  $(document).on('click', '#load-usuarios', function() {
    list_usuarios();
  });

//Eliminar usuario
  $(document).on('click', '#delete-usuario', function() {
    var id = $(this).data('id');
    var url = "controller_func/usuario/accion.php?id="+id+"&es=3";
    $.get(url, function (data) {
    if(data=="delete_true"){
      $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
      $('.itemrow_jbtn'+id).attr('id','activate-usuario');
      $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Activar');
      toastr.error('Se desactivo el item correctamente');
    }
    });
  });

 //Activar usuario
  $(document).on('click', '#activate-usuario', function() {
    var id = $(this).data('id');
    var url = "controller_func/usuario/accion.php?id="+id+"&es=4";
    $.get(url, function (data) {
      if(data=="activate_true"){
      $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
      $('.itemrow_jbtn'+id).attr('id','delete-usuario');
      $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Eliminar');
      toastr.success('Se activo el item correctamente');
      }
    });
  });

//Show usuario
  $(document).on('click', '.show-modal-usuario', function() {
    var id = $(this).data('id');
    var url = "controller_func/usuario/show.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
      $('.stitle_u').empty();
      $('.stitle_u').append("<i class='far fa-user'></i> Detalle usuario");
    });
  });


//Show Representante Lider
  $(document).on('click', '.show-modal-representante-lider', function() {
    var id = $(this).data('id');
    var url = "controller_func/representante/show_r.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
      $('.stitle_u').empty();
      $('.stitle_u').append("<i class='far fa-user'></i> Detalle representante lider");
    });
  });

/*Add Usuario*/
$('.modal-footer').on('click', '.add-usuario', function() {

      var tiuser=$("#tiuser").val();
      if(tiuser==1){
          var txtnombre=$("#txtnombre").val();
          var txtapep=$("#txtapep").val();
          var txtapem=$("#txtapem").val();
          var txtcorreo=$("#txtcorreo").val();
          var txtpass=$("#txtpass").val();
          var txtpassr=$("#txtpassr").val();
          var txtdni=$("#txtdni").val();
          var hdnid=$("#hdnid").val();
       if(txtnombre.trim()==""){
          $('#txtnombre').attr('class','form-control is-invalid');
          $('.msj_nom').empty();
          $('.msj_nom').append("-  escriba un nombre");
          window.setTimeout(function() { $('.msj_nom').html("");$('#txtnombre').attr('class','form-control');}, 3000);
        }else if(txtapep.trim()==""){
          $('#txtapep').attr('class','form-control is-invalid');
          $('.msj_apep').empty();
          $('.msj_apep').append("-  escriba un apellido paterno");
          window.setTimeout(function() { $('.msj_apep').html("");$('#txtapep').attr('class','form-control');}, 3000);
        }else if(txtapem.trim()==""){
          $('#txtapem').attr('class','form-control is-invalid');
          $('.msj_apem').empty();
          $('.msj_apem').append("-  escriba un apellido materno");
          window.setTimeout(function() { $('.msj_apem').html("");$('#txtapem').attr('class','form-control');}, 3000);
        }else if(txtcorreo.trim()==""){
          $('#txtcorreo').attr('class','form-control is-invalid');
          $('.msj_correo').empty();
          $('.msj_correo').append("-  escriba un correo electronico");
          window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
        }else if((regexemail.test(txtcorreo))==false){
          $('#txtcorreo').attr('class','form-control is-invalid');
          $('.msj_correo').empty();
          $('.msj_correo').append("-  escriba un correo electronico correcto");
          window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
        }else if(txtpass.trim()=="" && hdnid==0){
          $('#txtpass').attr('class','form-control is-invalid');
          $('.msj_pass').empty();
          $('.msj_pass').append("-  escriba una contraseña");
          window.setTimeout(function() { $('.msj_pass').html("");$('#txtpass').attr('class','form-control');}, 3000);
        }else if(txtpassr.trim()=="" && hdnid==0){
          $('#txtpassr').attr('class','form-control is-invalid');
          $('.msj_passr').empty();
          $('.msj_passr').append("-  escriba una contraseña");
          window.setTimeout(function() { $('.msj_passr').html("");$('#txtpassr').attr('class','form-control');}, 3000);
        }else if(txtdni.trim()==""){
          $('#txtdni').attr('class','form-control is-invalid');
          $('.msj_dni').empty();
          $('.msj_dni').append("-  escriba un DNI");
          window.setTimeout(function() { $('.msj_dni').html("");$('#txtdni').attr('class','form-control');}, 3000);
        }else{
          var dataString = $('#formadd').serialize();
          $.ajax({
            type: 'POST',
            url: 'controller_func/usuario/accion.php',
            data: dataString,
            success: function(data) {
              switch (data) {
                case "true_doble":
                  $('#txtcorreo').attr('class','form-control is-invalid');
                  $('.msj_correo').empty();
                  $('.msj_correo').append("- Ya existe correo de usuario en su lista");
                  window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
                  break;
                case "true_doble_DNI":
                  $('#txtdni').attr('class','form-control is-invalid');
                  $('.msj_dni').empty();
                  $('.msj_dni').append("- Ya existe DNI de usuario en su lista");
                  window.setTimeout(function() { $('.msj_dni').html("");$('#txtdni').attr('class','form-control');}, 3000);
                  break;
                case "save_true":
                    $('#formadd').empty();
                    $('#addModal').modal('hide');
                    toastr.success('Se agrego el item correctamente');
                    list_usuarios();
                   break;
                case "edit_true":
                    $('#formadd').empty();
                    $('#addModal').modal('hide');
                    toastr.success('Se modifico el item correctamente');
                    list_usuarios();
                   break;
                default:
                    toastr.success('Error 505');
                   break;
              }
            }
          });
        }
      }else{
        var hdnid=$("#hdnid").val();
        if(hdnid>0){
        var txtruc="00";
        var txtrazons="NO";
        }else{
        var txtruc=$("#txtruc").val();
        var txtrazons=$("#txtrazons").val();
        }
        var txtnombre=$("#txtnombre").val();
        var txtapep=$("#txtapep").val();
        var txtapem=$("#txtapem").val();
        var txtcorreo=$("#txtcorreo").val();
        var txtpass=$("#txtpass").val();
        var txtpassr=$("#txtpassr").val();
       if(txtnombre.trim()==""){
          $('#txtnombre').attr('class','form-control is-invalid');
          $('.msj_nom').empty();
          $('.msj_nom').append("-  escriba un nombre");
          window.setTimeout(function() { $('.msj_nom').html("");$('#txtnombre').attr('class','form-control');}, 3000);
        }else if(txtapep.trim()==""){
          $('#txtapep').attr('class','form-control is-invalid');
          $('.msj_apep').empty();
          $('.msj_apep').append("-  escriba un apellido paterno");
          window.setTimeout(function() { $('.msj_apep').html("");$('#txtapep').attr('class','form-control');}, 3000);
        }else if(txtapem.trim()==""){
          $('#txtapem').attr('class','form-control is-invalid');
          $('.msj_apem').empty();
          $('.msj_apem').append("-  escriba un apellido materno");
          window.setTimeout(function() { $('.msj_apem').html("");$('#txtapem').attr('class','form-control');}, 3000);
        }else if(txtcorreo.trim()==""){
          $('#txtcorreo').attr('class','form-control is-invalid');
          $('.msj_correo').empty();
          $('.msj_correo').append("-  escriba un correo electronico");
          window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
        }else if((regexemail.test(txtcorreo))==false){
          $('#txtcorreo').attr('class','form-control is-invalid');
          $('.msj_correo').empty();
          $('.msj_correo').append("-  escriba un correo electronico correcto");
          window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
        }else if(txtpass.trim()=="" && hdnid==0){
          $('#txtpass').attr('class','form-control is-invalid');
          $('.msj_pass').empty();
          $('.msj_pass').append("-  escriba una contraseña");
          window.setTimeout(function() { $('.msj_pass').html("");$('#txtpass').attr('class','form-control');}, 3000);
        }else if(txtpassr.trim()=="" && hdnid==0){
          $('#txtpassr').attr('class','form-control is-invalid');
          $('.msj_passr').empty();
          $('.msj_passr').append("-  escriba una contraseña");
          window.setTimeout(function() { $('.msj_passr').html("");$('#txtpassr').attr('class','form-control');}, 3000);
        }else if(txtruc.trim()=="" && hdnid==0){
          $('#txtruc').attr('class','form-control is-invalid');
          $('.msj_ruc').empty();
          $('.msj_ruc').append("-  escriba un RUC");
          window.setTimeout(function() { $('.msj_ruc').html("");$('#txtruc').attr('class','form-control');}, 3000);
        }else if(txtrazons.trim()=="" && hdnid==0){
          $('#txtrazons').attr('class','form-control is-invalid');
          $('.msj_razons').empty();
          $('.msj_razons').append("-  escriba una razon social");
          window.setTimeout(function() { $('.msj_razons').html("");$('#txtrazons').attr('class','form-control');}, 3000);
        }else{
          var dataString = $('#formadd').serialize();
          $.ajax({
            type: 'POST',
            url: 'controller_func/usuario/accion.php',
            data: dataString,
            success: function(data) {
              switch (data) {
                case "true_doble":
                  $('#txtcorreo').attr('class','form-control is-invalid');
                  $('.msj_correo').empty();
                  $('.msj_correo').append("- Ya existe correo de representante en su lista");
                  window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
                  break;
                case "save_true":
                    $('#formadd').empty();
                    $('#addModal').modal('hide');
                    toastr.success('Se agrego el item correctamente');
                    list_usuarios();
                   break;
                case "edit_true":
                    $('#formadd').empty();
                    $('#addModal').modal('hide');
                    toastr.success('Se modifico el item correctamente');
                    list_usuarios();
                   break;
                default:
                    toastr.success('Error 505');
                   break;
              }
            }
          });
        }


      }




});



/*Validar password_r Repetida*/
 $(document).on('keyup mouseleave', '#txtpassr', function() {
    var password=$("#txtpass").val();
    var passwordrepit=$("#txtpassr").val();
    if(passwordrepit!=""){
      if(password!=passwordrepit){
        $('.add-usuario').prop('disabled', true);
        $('.add-representante').prop('disabled', true);
        if(password!=""){
        $('#txtpassr').attr('class','form-control is-invalid');
        }
      }else{
          $('.add-usuario').prop('disabled', false);
          $('.add-representante').prop('disabled', false);
          $('#txtpassr').attr('class','form-control is-valid');
          $('#txtpass').attr('class','form-control is-valid');
      }
    }else{
       $('.add-usuario').prop('disabled', false);
       $('.add-representante').prop('disabled', false);
    }

  });

 $(document).on('keyup mouseleave', '#txtpass', function() {
    var password=$("#txtpass").val();
    var passwordrepit=$("#txtpassr").val();
    if(password!=""){
      if(password!=passwordrepit){
        $('.add-usuario').prop('disabled', true);
        $('.add-representante').prop('disabled', true);
        if(passwordrepit!=""){
        $('#txtpassr').attr('class','form-control is-invalid');
        }

      }else{
          $('.add-usuario').prop('disabled', false);
          $('.add-representante').prop('disabled', false);
          $('#txtpassr').attr('class','form-control is-valid');
          $('#txtpass').attr('class','form-control is-valid');
      }
    }else{
      $('.add-usuario').prop('disabled', false);
      $('.add-representante').prop('disabled', false);
    }

  });



/*Start Perfil de Usuario*/
//Crea a new Perfil de Usuario
  $(document).on('click', '.add-modal-perfilusuario', function() {
    var id = $(this).data('id');
    var url = "controller_func/perfilusuario/create.php?id="+id;
    $.get(url, function (data) {
      if(data=="session_caduco"){
        repetir_session();
      }else{
        $('#formadd').empty();
        $('#formadd').append(data);
        $('#addModal').modal('show');
      }
      
    });
  });
//Lista de Perfil de Usuario
  function list_perfilusuarios(){
      $.ajax({
      url:"controller_func/perfilusuario/list.php"
      }).done(function(info){
        $('.tbody_list').empty();
        $(".tbody_list").append(info);
      })

  }

//Exportar Excel Perfil de Usuario
 $(document).on('click', '.report-excel-perfilusuario', function() {
        window.location.href="controller_func/perfilusuario/exportarexcel.php";
  });

 //Exportar PDF Perfil de Usuario
 $(document).on('click', '.report-pdf-perfilusuario', function() {
        window.location.href="controller_func/perfilusuario/exportarpdf.php";
  });

//Cargar Perfil de Usuario
  $(document).on('click', '#load-perfilusuario', function() {
    list_perfilusuarios();
  });

//Eliminar Perfil de Usuario
  $(document).on('click', '#delete-perfilusuario', function() {
    var id = $(this).data('id');
    var url = "controller_func/perfilusuario/accion.php?id="+id+"&es=3";
    $.get(url, function (data) {
        if(data=="delete_true"){
          $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
          $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
          $('.itemrow_jbtn'+id).attr('id','activate-perfilusuario');
          $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
          $('.itemrow_jbtn'+id).attr('title', 'Activar');
          toastr.error('Se desactivo el item correctamente');
        }
    });
  });

 //Activar Perfil de Usuario
  $(document).on('click', '#activate-perfilusuario', function() {
    var id = $(this).data('id');
    var url = "controller_func/perfilusuario/accion.php?id="+id+"&es=4";
    $.get(url, function (data) {
    if(data=="activate_true"){
      $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
      $('.itemrow_jbtn'+id).attr('id','delete-perfilusuario');
      $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Eliminar');
      toastr.success('Se activo el item correctamente');
      }
    });
  });

//Show Perfil de Usuario
  $(document).on('click', '.show-modal-perfilusuario', function() {
    var id = $(this).data('id');
    var url = "controller_func/perfilusuario/show.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
    });
  });

/*Add Perfil de Perfil de Usuario*/
$('.modal-footer').on('click', '.add-perfilusuario', function() {
     var txtperfilusu=$("#txtperfilusu").val();
     if(txtperfilusu.trim()==""){
        $('#txtperfilusu').attr('class','form-control is-invalid');
        $('.msj_desc').empty();
        $('.msj_desc').append("- texto vacio");
        window.setTimeout(function() { $('.msj_desc').html("");$('#txtperfilusu').attr('class','form-control');}, 3000);
      }else{
          var dataString = $('#formadd').serialize();
          $.ajax({
          type: 'POST',
          url: 'controller_func/perfilusuario/accion.php',
          data: dataString,
          success: function(data){
            switch (data) {
              case "true_doble":
                $('#txtperfilusu').attr('class','form-control is-invalid');
                $('.msj_desc').empty();
                $('.msj_desc').append("- Ya existe perfil en su lista");
                window.setTimeout(function() { $('.msj_desc').html("");$('#txtperfilusu').attr('class','form-control');}, 3000);
                break;
              case "save_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se agrego el item correctamente');
                  list_perfilusuarios();
                 break;
              case "edit_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se modifico el item correctamente');
                  list_perfilusuarios();
                 break;
              default:
                  toastr.success('Error 505');
                 break;
            }

            }

          });
      }

  });
/*End Perfil de Usuario*/

/*Representante  CRUD*/
//Crea a new Representante
  $(document).on('click', '.add-modal-representante', function() {
    var id = $(this).data('id');
    var url = "controller_func/representante/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
    });
  });
//Lista de Representante
  function list_representantes(){
      $.ajax({
      url:"controller_func/representante/list.php"
      }).done(function(info){
        $('.tbody_list').empty();
        $(".tbody_list").append(info);
      })

  }
//Cargar Representante
  $(document).on('click', '#load-representantes', function() {
    list_representantes();
  });

//Eliminar Representante
  $(document).on('click', '#delete-representante', function() {
    var id = $(this).data('id');
    var content = $(this).data('content');
    var url = "controller_func/representante/accion.php?id="+id+"&es=3&content="+content;
    $.get(url, function (data) {

      $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
      $('.itemrow_jbtn'+id).attr('id','activate-representante');
      $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Activar');

    });
  });

 //Exportar excel Representante
 $(document).on('click', '.report-excel-representantes', function() {
        window.location.href="controller_func/representante/exportarexcel.php";
  });

//Exportar PDF Representante
 $(document).on('click', '.report-pdf-representantes', function() {
        window.location.href="controller_func/representante/exportarpdf.php";
  });

 //Activar Representante
  $(document).on('click', '#activate-representante', function() {
    var id = $(this).data('id');
    var content = $(this).data('content');
    var url = "controller_func/representante/accion.php?id="+id+"&es=4&content="+content;
    $.get(url, function (data) {

        $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
        $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
        $('.itemrow_jbtn'+id).attr('id','delete-representante');
        $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
        $('.itemrow_jbtn'+id).attr('title', 'Eliminar');

    });
  });

//Show Representante
  $(document).on('click', '.show-modal-representante', function() {
    var id = $(this).data('id');
    var url = "controller_func/representante/show.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
    });
  });

/*Add Representante*/
$('.modal-footer').on('click', '.add-representante', function() {
      var tiuser=$("#tiuser").val();
      var list=$("#list").val();
      if(tiuser==1){
        var hdnid=$("#hdnid").val();
        if(hdnid>0){
          var txtruc="00";
          var txtsponsor="00";
          var sltposicion="00";
        }else{
          var txtruc=$("#txtruc").val();
          var txtsponsor=$("#txtsponsor").val();
          var sltposicion=$("#sltposicion").val();
        }
          var txtnombre=$("#txtnombre").val();
          var txtapep=$("#txtapep").val();
          var txtapem=$("#txtapem").val();
          var txtcorreo=$("#txtcorreo").val();
          var txtpass=$("#txtpass").val();
          var txtpassr=$("#txtpassr").val();
          var txtrazons=$("#txtrazons").val();

          if(txtnombre.trim()==""){
              $('#txtnombre').attr('class','form-control is-invalid');
              $('.msj_nom').empty();
              $('.msj_nom').append("-  escriba un nombre");
              window.setTimeout(function() { $('.msj_nom').html("");$('#txtnombre').attr('class','form-control');}, 3000);
            }else if(txtapep.trim()==""){
              $('#txtapep').attr('class','form-control is-invalid');
              $('.msj_apep').empty();
              $('.msj_apep').append("-  escriba un apellido paterno");
              window.setTimeout(function() { $('.msj_apep').html("");$('#txtapep').attr('class','form-control');}, 3000);
            }else if(txtapem.trim()==""){
              $('#txtapem').attr('class','form-control is-invalid');
              $('.msj_apem').empty();
              $('.msj_apem').append("-  escriba un apellido materno");
              window.setTimeout(function() { $('.msj_apem').html("");$('#txtapem').attr('class','form-control');}, 3000);
            }else if(txtpass.trim()=="" && hdnid==0){
              $('#txtpass').attr('class','form-control is-invalid');
              $('.msj_pass').empty();
              $('.msj_pass').append("-  escriba una contraseña");
              window.setTimeout(function() { $('.msj_pass').html("");$('#txtpass').attr('class','form-control');}, 3000);
            }else if(txtpassr.trim()=="" && hdnid==0){
              $('#txtpassr').attr('class','form-control is-invalid');
              $('.msj_passr').empty();
              $('.msj_passr').append("-  escriba una contraseña");
              window.setTimeout(function() { $('.msj_passr').html("");$('#txtpassr').attr('class','form-control');}, 3000);
            }else if(txtruc.trim()=="" && hdnid==0){
              $('#txtruc').attr('class','form-control is-invalid');
              $('.msj_ruc').empty();
              $('.msj_ruc').append("-  escriba un RUC");
              window.setTimeout(function() { $('.msj_ruc').html("");$('#txtruc').attr('class','form-control');}, 3000);
            }else if(txtrazons.trim()==""){
              $('#txtrazons').attr('class','form-control is-invalid');
              $('.msj_razons').empty();
              $('.msj_razons').append("-  escriba una razon social");
              window.setTimeout(function() { $('.msj_razons').html("");$('#txtrazons').attr('class','form-control');}, 3000);
            }else if(txtcorreo.trim()==""){
              $('#txtcorreo').attr('class','form-control is-invalid');
              $('.msj_correo').empty();
              $('.msj_correo').append("-  escriba un correo electronico");
              window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
            }else if((regexemail.test(txtcorreo))==false){
              $('#txtcorreo').attr('class','form-control is-invalid');
              $('.msj_correo').empty();
              $('.msj_correo').append("-  escriba un correo electronico correcto");
              window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
            }else if(txtsponsor.trim()=="" && hdnid==0){
              $('#txtsponsor').attr('class','form-control is-invalid');
              $('.msj_sponsor').empty();
              $('.msj_sponsor').append("-  escriba una razon social");
              window.setTimeout(function() { $('.msj_sponsor').html("");$('#txtsponsor').attr('class','form-control');}, 3000);
            }else if((sltposicion==0 || sltposicion=="0") && hdnid==0){
              //$('#sltposicion').attr('class','form-control select2 is-invalid');
              $('.msj_posicion').empty();
              $('.msj_posicion').append("-  Ingrese otro RUC / Sponsor ");
              window.setTimeout(function() { $('.msj_posicion').html("");}, 3000);
            }/*else if((sltposicion==4 || sltposicion=="4") && hdnid==0){
              //$('#sltposicion').attr('class','form-control select2 is-invalid');
              $('.msj_posicion').empty();
              $('.msj_posicion').append("-  Seleccione una posicion");
              window.setTimeout(function() { $('.msj_posicion').html("");}, 3000);
            }*/else{
                var dataString = $('#formadd').serialize();
                $.ajax({
                  type: 'POST',
                  url: 'controller_func/representante/accion.php',
                  data: dataString,
                  success: function(data) {

                    if(list=="1"){
                      switch (data) {
                        case "true_doble":
                          $('#txtcorreo').attr('class','form-control is-invalid');
                          $('.msj_correo').empty();
                          $('.msj_correo').append("- Ya existe correo de representante");
                          window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
                          break;
                        case "save_true":
                            $('#formadd').empty();
                            $('#modal-subir-rep-con-sis').modal('hide');
                            toastr.success('Se agrego el item correctamente');
                            list_representantes_conectados();
                           break;
                        case "edit_true":
                            $('#formadd').empty();
                            $('#modal-subir-rep-con-sis').modal('hide');
                            toastr.success('Se modifico el item correctamente');
                            list_representantes_conectados();
                           break;
                        default:
                            toastr.success('Error 505');
                           break;
                      }

                    }else{

                      switch (data) {
                        case "true_doble":
                          $('#txtcorreo').attr('class','form-control is-invalid');
                          $('.msj_correo').empty();
                          $('.msj_correo').append("- Ya existe correo de representante");
                          window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
                          break;
                        case "save_true":
                            $('#formadd').empty();
                            $('#addModal').modal('hide');
                            toastr.success('Se agrego el item correctamente');
                            list_representantes();
                           break;
                        case "edit_true":
                            $('#formadd').empty();
                            $('#addModal').modal('hide');
                            toastr.success('Se modifico el item correctamente');
                            list_representantes();
                           break;
                        default:
                            toastr.success('Error 505');
                           break;
                      }

                    }

                          

                  }

                });

            }
      }else{
          var hdnid=$("#hdnid").val();
          if(hdnid>0){
          var txtruc="00";
          var txtrazons="NO";
          }else{
          var txtruc=$("#txtruc").val();
          var txtsponsor=0;
          var sltposicion=0;
          var txtrazons=$("#txtrazons").val();
          }
          var txtnombre=$("#txtnombre").val();
          var txtapep=$("#txtapep").val();
          var txtapem=$("#txtapem").val();
          var txtcorreo=$("#txtcorreo").val();
          var txtpass=$("#txtpass").val();
          var txtpassr=$("#txtpassr").val();
         if(txtnombre.trim()==""){
            $('#txtnombre').attr('class','form-control is-invalid');
            $('.msj_nom').empty();
            $('.msj_nom').append("-  escriba un nombre");
            window.setTimeout(function() { $('.msj_nom').html("");$('#txtnombre').attr('class','form-control');}, 3000);
          }else if(txtapep.trim()==""){
            $('#txtapep').attr('class','form-control is-invalid');
            $('.msj_apep').empty();
            $('.msj_apep').append("-  escriba un apellido paterno");
            window.setTimeout(function() { $('.msj_apep').html("");$('#txtapep').attr('class','form-control');}, 3000);
          }else if(txtapem.trim()==""){
            $('#txtapem').attr('class','form-control is-invalid');
            $('.msj_apem').empty();
            $('.msj_apem').append("-  escriba un apellido materno");
            window.setTimeout(function() { $('.msj_apem').html("");$('#txtapem').attr('class','form-control');}, 3000);
          }else if(txtcorreo.trim()==""){
            $('#txtcorreo').attr('class','form-control is-invalid');
            $('.msj_correo').empty();
            $('.msj_correo').append("-  escriba un correo electronico");
            window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
          }else if((regexemail.test(txtcorreo))==false){
            $('#txtcorreo').attr('class','form-control is-invalid');
            $('.msj_correo').empty();
            $('.msj_correo').append("-  escriba un correo electronico correcto");
            window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
          }else if(txtpass.trim()=="" && hdnid==0){
            $('#txtpass').attr('class','form-control is-invalid');
            $('.msj_pass').empty();
            $('.msj_pass').append("-  escriba una contraseña");
            window.setTimeout(function() { $('.msj_pass').html("");$('#txtpass').attr('class','form-control');}, 3000);
          }else if(txtpassr.trim()=="" && hdnid==0){
            $('#txtpassr').attr('class','form-control is-invalid');
            $('.msj_passr').empty();
            $('.msj_passr').append("-  escriba una contraseña");
            window.setTimeout(function() { $('.msj_passr').html("");$('#txtpassr').attr('class','form-control');}, 3000);
          }else if(txtruc.trim()=="" && hdnid==0){
            $('#txtruc').attr('class','form-control is-invalid');
            $('.msj_ruc').empty();
            $('.msj_ruc').append("-  escriba un RUC");
            window.setTimeout(function() { $('.msj_ruc').html("");$('#txtruc').attr('class','form-control');}, 3000);
          }else if(txtrazons.trim()=="" && hdnid==0){
            $('#txtrazons').attr('class','form-control is-invalid');
            $('.msj_razons').empty();
            $('.msj_razons').append("-  escriba una razon social");
            window.setTimeout(function() { $('.msj_razons').html("");$('#txtrazons').attr('class','form-control');}, 3000);
          }else{
            var dataString = $('#formadd').serialize();
            $.ajax({
              type: 'POST',
              url: 'controller_func/representante/accion.php',
              data: dataString,
              success: function(data) {
                /*Represetante conectado sube a sistema */
                if(list=="1"){

                  switch (data) {
                    case "true_doble":
                      $('#txtcorreo').attr('class','form-control is-invalid');
                      $('.msj_correo').empty();
                      $('.msj_correo').append("- Ya existe correo de representante");
                      window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
                      break;
                    case "save_true":
                        $('#formadd').empty();
                        $('#modal-subir-rep-con-sis').modal('hide');
                        toastr.success('Se agrego el item correctamente');
                        list_representantes_conectados();
                        
                       break;
                    case "edit_true":
                        $('#formadd').empty();
                        $('#modal-subir-rep-con-sis').modal('hide');
                        toastr.success('Se modifico el item correctamente');
                        list_representantes_conectados();
                        edit_estado_rep_con();
                       break;
                    default:
                        toastr.success('Error 505');
                       break;
                  }

                }else{

                  switch (data) {
                    case "true_doble":
                      $('#txtcorreo').attr('class','form-control is-invalid');
                      $('.msj_correo').empty();
                      $('.msj_correo').append("- Ya existe correo de representante");
                      window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
                      break;
                    case "save_true":
                        $('#formadd').empty();
                        $('#addModal').modal('hide');
                        toastr.success('Se agrego el item correctamente');
                        list_representantes();
                       break;
                    case "edit_true":
                        $('#formadd').empty();
                        $('#addModal').modal('hide');
                        toastr.success('Se modifico el item correctamente');
                        list_representantes();
                       break;
                    default:
                        toastr.success('Error 505');
                       break;
                  }

                }
              }
            });
          }
      }
  });

  /*Validar RUC */

  function validar_ruc(){

    var ruc=$("#txtruc").val();
    var dataString = {"ruc":ruc}
    
    //alert(ruc.length);
    if(ruc.trim()=="" || ruc.length<=10){
          $('#txtruc').attr('class','form-control');
          $('.msj_ruc').empty();
          $('.add-usuario').prop('disabled', false);
          $('.add-representante').prop('disabled', false);
    }else{
      $.ajax({
      type: 'POST',
      url: 'controller_func/validar/validar_ruc.php',
      data: dataString,
      success: function(data) {
        
        if(data=="true"){
          $('.add-usuario').prop('disabled', false);
          $('.add-representante').prop('disabled', false);
          $('#txtruc').attr('class','form-control is-valid');
          $('.msj_ruc').empty();
        }else{
          $('.add-usuario').prop('disabled', true);
          $('.add-representante').prop('disabled', true);
          $('#txtruc').attr('class','form-control is-invalid');
          $('.msj_ruc').empty();
          $('.msj_ruc').append("- Existente");
        }
        }
      });
    }
  }



$(document).on('keyup mouseleave', '#txtruc', function() {
    this.value = this.value.replace(/[^0-9]/g,'');
    var ruc=$("#txtruc").val();
    var dataString = {"ruc":ruc}
    //alert(ruc.length);
    if(ruc.trim()=="" || ruc.length<=10){
          $('#txtruc').attr('class','form-control');
          $('.msj_ruc').empty();
          $('.add-usuario').prop('disabled', false);
          $('.add-representante').prop('disabled', false);
    }else{
      $.ajax({
      type: 'POST',
      url: 'controller_func/validar/validar_ruc.php',
      data: dataString,
      success: function(data) {
        if(data=="true"){
          $('.add-usuario').prop('disabled', false);
          $('.add-representante').prop('disabled', false);
          $('#txtruc').attr('class','form-control is-valid');
          $('.msj_ruc').empty();
        }else{
          $('.add-usuario').prop('disabled', true);
          $('.add-representante').prop('disabled', true);
          $('#txtruc').attr('class','form-control is-invalid');
          $('.msj_ruc').empty();
          $('.msj_ruc').append("- Existente");
        }
        }
      });
    }
  });

  $(document).on('keyup mouseleave', '#txtruc_trama', function() {
    this.value = this.value.replace(/[^0-9]/g,'');
    var ruc=$("#txtruc_trama").val();
    var id=$("#hdnid").val();
    var dataString = {"ruc":ruc,"id":id}
    //alert(ruc.length);
    if(ruc.trim()=="" || ruc.length<=10){
          $('#txtruc_trama').attr('class','form-control');
          $('.msj_ruc').empty();
          $('.btn-editar-rep-con').prop('disabled', false);
    }else{
      $.ajax({
      type: 'POST',
      url: 'controller_func/validar/validar_ruc_conectado.php',
      data: dataString,
      success: function(data) {
        if(data.trim()=="true"){
          $('.btn-editar-rep-con').prop('disabled', false);
          $('#txtruc_trama').attr('class','form-control is-valid');
          $('.msj_ruc').empty();
        }else{
          $('.btn-editar-rep-con').prop('disabled', true);
          $('#txtruc_trama').attr('class','form-control is-invalid');
          $('.msj_ruc').empty();
          $('.msj_ruc').append("- Existente");
        }
        }
      });
    }
  });

/*Validar RUC de Sponsor */

function validar_ruc_sponsor(){

  var ruc=$("#txtsponsor").val();
  var dataString = {"ruc":ruc}
  //alert(ruc.length);
  if(ruc.trim()=="" || ruc.length<=10){
        $('#txtsponsor').attr('class','form-control');
        $('.msj_sponsor').empty();
        $('.add-usuario').prop('disabled', false);
        $('.add-representante').prop('disabled', false);
  }else{
    $.ajax({
    type: 'POST',
    url: 'controller_func/validar/validar_ruc.php',
    data: dataString,
    success: function(data) {
      if(data=="true"){
        $('.add-usuario').prop('disabled', true);
        $('.add-representante').prop('disabled', true);
        $('#txtsponsor').attr('class','form-control is-invalid');
        $('.msj_sponsor').empty();
        $('.msj_sponsor').append("- No Existente");
        $('#lbldsponsor').empty();
      }else{
        $('.add-usuario').prop('disabled', false);
        $('.add-representante').prop('disabled', false);
        $('#txtsponsor').attr('class','form-control is-valid');
        $('.msj_sponsor').empty();
        combo_posicion();
        datos_sponsor();
        datos_ruc_lider();
      }
      }
    });
  }
    
}

$(document).on('keyup mouseleave', '#txtsponsor', function() {
  this.value = this.value.replace(/[^0-9]/g,'');
  var ruc=$("#txtsponsor").val();
  var dataString = {"ruc":ruc}
  //alert(ruc.length);
  if(ruc.trim()=="" || ruc.length<=10){
        $('#txtsponsor').attr('class','form-control');
        $('.msj_sponsor').empty();
        $('.add-usuario').prop('disabled', false);
        $('.add-representante').prop('disabled', false);
  }else{
    $.ajax({
    type: 'POST',
    url: 'controller_func/validar/validar_ruc.php',
    data: dataString,
    success: function(data) {
      if(data=="true"){
        $('.add-usuario').prop('disabled', true);
        $('.add-representante').prop('disabled', true);
        $('#txtsponsor').attr('class','form-control is-invalid');
        $('.msj_sponsor').empty();
        $('.msj_sponsor').append("- No Existente");
        $('#lbldsponsor').empty();
      }else{
        $('.add-usuario').prop('disabled', false);
        $('.add-representante').prop('disabled', false);
        $('#txtsponsor').attr('class','form-control is-valid');
        $('.msj_sponsor').empty();
        combo_posicion();
        datos_sponsor();
        datos_ruc_lider();
      }
      }
    });
  }
});


//Combo Posicion
  function combo_posicion(){
      var ruc=$("#txtsponsor").val();
      var dataString = {"txtsponsor":ruc}
      $.ajax({
      type: 'POST',
      url:"controller_func/representante/combo_posicion.php",
      data: dataString,
      }).done(function(info){
        $('#sltposicion').empty();
        $("#sltposicion").append(info);
      })
  }



//Datos Sponsor
  function datos_sponsor(){
      var ruc=$("#txtsponsor").val();
      var dataString = {"ruc":ruc}
      $.ajax({
      type: 'POST',
      url:"controller_func/representante/datos_sponsor.php",
      data: dataString,
      }).done(function(info){
        $('#lbldsponsor').empty();
        $("#lbldsponsor").append(info);
      })
  }

//Datos Sponsor
  function datos_ruc_lider(){
      var ruc=$("#txtsponsor").val();
      var dataString = {"ruc":ruc}
      $.ajax({
      type: 'POST',
      url:"controller_func/representante/datos_ruc_lider.php",
      data: dataString,
      }).done(function(info){
        $('#txtlred').empty();
        $("#txtlred").val(info);
      })
  }


/*Start Estado | Registro de solicitud*/
//Crea a new Estado | Registro de solicitud
  $(document).on('click', '.add-modal-estadoregistrosolicitud', function() {
    var id = $(this).data('id');
    var url = "controller_func/estado_registro_solicitud/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
    });
  });
//Lista de Estado | Registro de solicitud
  function list_estadoregistrosolicitud(){
      $.ajax({
      url:"controller_func/estado_registro_solicitud/list.php"
      }).done(function(info){
        $('.tbody_list').empty();
        $(".tbody_list").append(info);
      })

  }

//Exportar Excel Estado | Registro de solicitud
 $(document).on('click', '.report-excel-estadoregistrosolicitud', function() {
        window.location.href="controller_func/estado_registro_solicitud/exportarexcel.php";
  });

 //Exportar PDF Estado | Registro de solicitud
 $(document).on('click', '.report-pdf-estado_estadoregistrosolicitud', function() {
        window.location.href="controller_func/estado_registro_solicitud/exportarpdf.php";
  });

//Cargar Estado | Registro de solicitud
  $(document).on('click', '#load-estadoregistrosolicitud', function() {
    list_estadoregistrosolicitud();
  });

//Eliminar Estado | Registro de solicitud
  $(document).on('click', '#delete-estadoregistrosolicitud', function() {
    var id = $(this).data('id');
    var url = "controller_func/estado_registro_solicitud/accion.php?id="+id+"&es=3";
    $.get(url, function (data) {
        if(data=="delete_true"){
          $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
          $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
          $('.itemrow_jbtn'+id).attr('id','activate-estadoregistrosolicitud');
          $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
          $('.itemrow_jbtn'+id).attr('title', 'Activar');
          toastr.error('Se desactivo el item correctamente');
        }
    });
  });

 //Activar Estado | Registro de solicitud
  $(document).on('click', '#activate-estadoregistrosolicitud', function() {
    var id = $(this).data('id');
    var url = "controller_func/estado_registro_solicitud/accion.php?id="+id+"&es=4";
    $.get(url, function (data) {
    if(data=="activate_true"){
      $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
      $('.itemrow_jbtn'+id).attr('id','delete-estadoregistrosolicitud');
      $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Eliminar');
      toastr.success('Se activo el item correctamente');
      }
    });
  });

//Show Estado | Registro de solicitud
  $(document).on('click', '.show-modal-estadoregistrosolicitud', function() {
    var id = $(this).data('id');
    var url = "controller_func/estado_registro_solicitud/show.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
    });
  });

/*Add  Estado | Registro de solicitud*/
$('.modal-footer').on('click', '.add-estadoregistrosolicitud', function() {
     var txtdescripcion=$("#txtdescripcion").val();
     var txtestilocolor=$("#txtestilocolor").val();
     if(txtdescripcion.trim()==""){
        $('#txtdescripcion').attr('class','form-control is-invalid');
        $('.msj_desc').empty();
        $('.msj_desc').append("- texto vacio");
        window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
      }else if(txtestilocolor.trim()==""){
          $('#txtestilocolor').attr('class','form-control is-invalid');
          $('.msj_estilocolor').empty();
          $('.msj_estilocolor').append("- texto vacio");
          window.setTimeout(function() { $('.msj_estilocolor').html("");$('#txtestilocolor').attr('class','form-control');}, 3000);
      }else{
          var dataString = $('#formadd').serialize();
          $.ajax({
          type: 'POST',
          url: 'controller_func/estado_registro_solicitud/accion.php',
          data: dataString,
          success: function(data){
            switch (data) {
              case "true_doble":
                $('#txtdescripcion').attr('class','form-control is-invalid');
                $('.msj_desc').empty();
                $('.msj_desc').append("- Ya existe esta descripción en su lista");
                window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
                break;
              case "save_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se agrego el item correctamente');
                  list_estadoregistrosolicitud();
                 break;
              case "edit_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se modifico el item correctamente');
                  list_estadoregistrosolicitud();
                 break;
              default:
                  toastr.success('Error 505');
                 break;
            }

            }

          });
      }

  });
/*End Estado | Registro de solicitud*/

/*Start Estado WorkFlow*/
//Crea a new Estado WorkFlow
  $(document).on('click', '.add-modal-estadoworkflow', function() {
    var id = $(this).data('id');
    var url = "controller_func/estado_workflow/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
    });
  });
//Lista de Estado WorkFlow
  function list_estadoworkflow(){
      $.ajax({
      url:"controller_func/estado_workflow/list.php"
      }).done(function(info){
        $('.tbody_list').empty();
        $(".tbody_list").append(info);
      })

  }

//Exportar Excel Estado WorkFlow
 $(document).on('click', '.report-excel-estadoworkflow', function() {
        window.location.href="controller_func/estado_workflow/exportarexcel.php";
  });

 //Exportar PDF Estado WorkFlow
 $(document).on('click', '.report-pdf-estado_estadoworkflow', function() {
        window.location.href="controller_func/estado_workflow/exportarpdf.php";
  });

//Cargar Estado WorkFlow
  $(document).on('click', '#load-estadoworkflow', function() {
    list_estadoworkflow();
  });

//Eliminar Estado WorkFlow
  $(document).on('click', '#delete-estadoworkflow', function() {
    var id = $(this).data('id');
    var url = "controller_func/estado_workflow/accion.php?id="+id+"&es=3";
    $.get(url, function (data) {
        if(data=="delete_true"){
          $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
          $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
          $('.itemrow_jbtn'+id).attr('id','activate-estadoworkflow');
          $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
          $('.itemrow_jbtn'+id).attr('title', 'Activar');
          toastr.error('Se desactivo el item correctamente');
        }
    });
  });

 //Activar Estado WorkFlow
  $(document).on('click', '#activate-estadoworkflow', function() {
    var id = $(this).data('id');
    var url = "controller_func/estado_workflow/accion.php?id="+id+"&es=4";
    $.get(url, function (data) {
    if(data=="activate_true"){
      $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
      $('.itemrow_jbtn'+id).attr('id','delete-estadoworkflow');
      $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Eliminar');
      toastr.success('Se activo el item correctamente');
      }
    });
  });

//Show Estado WorkFlow
  $(document).on('click', '.show-modal-estadoworkflow', function() {
    var id = $(this).data('id');
    var url = "controller_func/estado_workflow/show.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
    });
  });

/*Add  Estado WorkFlow*/
$('.modal-footer').on('click', '.add-estadoworkflow', function() {
     var txtdescripcion=$("#txtdescripcion").val();
     if(txtdescripcion.trim()==""){
        $('#txtdescripcion').attr('class','form-control is-invalid');
        $('.msj_desc').empty();
        $('.msj_desc').append("- texto vacio");
        window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
      }else{
          var dataString = $('#formadd').serialize();
          $.ajax({
          type: 'POST',
          url: 'controller_func/estado_workflow/accion.php',
          data: dataString,
          success: function(data){
            switch (data) {
              case "true_doble":
                $('#txtdescripcion').attr('class','form-control is-invalid');
                $('.msj_desc').empty();
                $('.msj_desc').append("- Ya existe esta descripción en su lista");
                window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
                break;
              case "save_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se agrego el item correctamente');
                  list_estadoworkflow();
                 break;
              case "edit_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se modifico el item correctamente');
                  list_estadoworkflow();
                 break;
              default:
                  toastr.success('Error 505');
                 break;
            }

            }

          });
      }

  });
/*End Estado WorkFlow*/

/*Start Metodo Pago*/
//Crea a new Metodo Pago
  $(document).on('click', '.add-modal-metodopago', function() {
    var id = $(this).data('id');
    var url = "controller_func/metodo_pago/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
    });
  });
//Lista de Metodo Pago
  function list_metodopago(){
      $.ajax({
      url:"controller_func/metodo_pago/list.php"
      }).done(function(info){
        $('.tbody_list').empty();
        $(".tbody_list").append(info);
      })

  }

//Exportar Excel Metodo Pago
 $(document).on('click', '.report-excel-metodopago', function() {
        window.location.href="controller_func/metodo_pago/exportarexcel.php";
  });

 //Exportar PDF Metodo Pago
 $(document).on('click', '.report-pdf-estado_metodopago', function() {
        window.location.href="controller_func/metodo_pago/exportarpdf.php";
  });

//Cargar Metodo Pago
  $(document).on('click', '#load-metodopago', function() {
    list_metodopago();
  });

//Eliminar Metodo Pago
  $(document).on('click', '#delete-metodopago', function() {
    var id = $(this).data('id');
    var url = "controller_func/metodo_pago/accion.php?id="+id+"&es=3";
    $.get(url, function (data) {
        if(data=="delete_true"){
          $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
          $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
          $('.itemrow_jbtn'+id).attr('id','activate-metodopago');
          $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
          $('.itemrow_jbtn'+id).attr('title', 'Activar');
          toastr.error('Se desactivo el item correctamente');
        }
    });
  });

 //Activar Metodo Pago
  $(document).on('click', '#activate-metodopago', function() {
    var id = $(this).data('id');
    var url = "controller_func/metodo_pago/accion.php?id="+id+"&es=4";
    $.get(url, function (data) {
    if(data=="activate_true"){
      $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
      $('.itemrow_jbtn'+id).attr('id','delete-metodopago');
      $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Eliminar');
      toastr.success('Se activo el item correctamente');
      }
    });
  });

//Show Metodo Pago
  $(document).on('click', '.show-modal-metodopago', function() {
    var id = $(this).data('id');
    var url = "controller_func/metodo_pago/show.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
    });
  });

/*Add  Metodo Pago*/
$('.modal-footer').on('click', '.add-metodopago', function() {
     var txtdescripcion=$("#txtdescripcion").val();
     if(txtdescripcion.trim()==""){
        $('#txtdescripcion').attr('class','form-control is-invalid');
        $('.msj_desc').empty();
        $('.msj_desc').append("- texto vacio");
        window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
      }else{
          var dataString = $('#formadd').serialize();
          $.ajax({
          type: 'POST',
          url: 'controller_func/metodo_pago/accion.php',
          data: dataString,
          success: function(data){
            switch (data) {
              case "true_doble":
                $('#txtdescripcion').attr('class','form-control is-invalid');
                $('.msj_desc').empty();
                $('.msj_desc').append("- Ya existe esta descripción en su lista");
                window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
                break;
              case "save_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se agrego el item correctamente');
                  list_metodopago();
                 break;
              case "edit_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se modifico el item correctamente');
                  list_metodopago();
                 break;
              default:
                  toastr.success('Error 505');
                 break;
            }

            }

          });
      }

  });
/*End Metodo Pago*/

/*Start Tipo de origen Oncosalud*/
//Crea a new Tipo de origen Oncosalud
  $(document).on('click', '.add-modal-tipoorigenoncosalud', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_origen_oncosalud/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
    });
  });
//Lista de Tipo de origen Oncosalud
  function list_tipoorigenoncosalud(){
      $.ajax({
      url:"controller_func/tipo_origen_oncosalud/list.php"
      }).done(function(info){
        $('.tbody_list').empty();
        $(".tbody_list").append(info);
      })

  }

//Exportar Excel Tipo de origen Oncosalud
 $(document).on('click', '.report-excel-tipoorigenoncosalud', function() {
        window.location.href="controller_func/tipo_origen_oncosalud/exportarexcel.php";
  });

 //Exportar PDF Tipo de origen Oncosalud
 $(document).on('click', '.report-pdf-estado_tipoorigenoncosalud', function() {
        window.location.href="controller_func/tipo_origen_oncosalud/exportarpdf.php";
  });

//Cargar Tipo de origen Oncosalud
  $(document).on('click', '#load-tipoorigenoncosalud', function() {
    list_tipoorigenoncosalud();
  });

//Eliminar Tipo de origen Oncosalud
  $(document).on('click', '#delete-tipoorigenoncosalud', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_origen_oncosalud/accion.php?id="+id+"&es=3";
    $.get(url, function (data) {
        if(data=="delete_true"){
          $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
          $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
          $('.itemrow_jbtn'+id).attr('id','activate-tipoorigenoncosalud');
          $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
          $('.itemrow_jbtn'+id).attr('title', 'Activar');
          toastr.error('Se desactivo el item correctamente');
        }
    });
  });

 //Activar Tipo de origen Oncosalud
  $(document).on('click', '#activate-tipoorigenoncosalud', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_origen_oncosalud/accion.php?id="+id+"&es=4";
    $.get(url, function (data) {
    if(data=="activate_true"){
      $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
      $('.itemrow_jbtn'+id).attr('id','delete-tipoorigenoncosalud');
      $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Eliminar');
      toastr.success('Se activo el item correctamente');
      }
    });
  });

//Show Tipo de origen Oncosalud
  $(document).on('click', '.show-modal-tipoorigenoncosalud', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_origen_oncosalud/show.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
    });
  });

/*Add  Tipo de origen Oncosalud*/
$('.modal-footer').on('click', '.add-tipoorigenoncosalud', function() {
     var txtdescripcion=$("#txtdescripcion").val();
     if(txtdescripcion.trim()==""){
        $('#txtdescripcion').attr('class','form-control is-invalid');
        $('.msj_desc').empty();
        $('.msj_desc').append("- texto vacio");
        window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
      }else{
          var dataString = $('#formadd').serialize();
          $.ajax({
          type: 'POST',
          url: 'controller_func/tipo_origen_oncosalud/accion.php',
          data: dataString,
          success: function(data){
            switch (data) {
              case "true_doble":
                $('#txtdescripcion').attr('class','form-control is-invalid');
                $('.msj_desc').empty();
                $('.msj_desc').append("- Ya existe esta descripción en su lista");
                window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
                break;
              case "save_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se agrego el item correctamente');
                  list_tipoorigenoncosalud();
                 break;
              case "edit_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se modifico el item correctamente');
                  list_tipoorigenoncosalud();
                 break;
              default:
                  toastr.success('Error 505');
                 break;
            }

            }

          });
      }

  });
/*End Tipo de origen Oncosalud*/

/*Start Tipo de pago*/
//Crea a new Tipo de pago
  $(document).on('click', '.add-modal-tipopago', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_pago/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
    });
  });
//Lista de Tipo de pago
  function list_tipopago(){
      $.ajax({
      url:"controller_func/tipo_pago/list.php"
      }).done(function(info){
        $('.tbody_list').empty();
        $(".tbody_list").append(info);
      })

  }

//Exportar Excel Tipo de pago
 $(document).on('click', '.report-excel-tipopago', function() {
        window.location.href="controller_func/tipo_pago/exportarexcel.php";
  });

 //Exportar PDF Tipo de pago
 $(document).on('click', '.report-pdf-estado_tipopago', function() {
        window.location.href="controller_func/tipo_pago/exportarpdf.php";
  });

//Cargar Tipo de pago
  $(document).on('click', '#load-tipopago', function() {
    list_tipopago();
  });

//Eliminar Tipo de pago
  $(document).on('click', '#delete-tipopago', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_pago/accion.php?id="+id+"&es=3";
    $.get(url, function (data) {
        if(data=="delete_true"){
          $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
          $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
          $('.itemrow_jbtn'+id).attr('id','activate-tipopago');
          $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
          $('.itemrow_jbtn'+id).attr('title', 'Activar');
          toastr.error('Se desactivo el item correctamente');
        }
    });
  });

 //Activar Tipo de pago
  $(document).on('click', '#activate-tipopago', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_pago/accion.php?id="+id+"&es=4";
    $.get(url, function (data) {
    if(data=="activate_true"){
      $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
      $('.itemrow_jbtn'+id).attr('id','delete-tipopago');
      $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Eliminar');
      toastr.success('Se activo el item correctamente');
      }
    });
  });

//Show Tipo de pago
  $(document).on('click', '.show-modal-tipopago', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_pago/show.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
    });
  });

/*Add  Tipo de pago*/
$('.modal-footer').on('click', '.add-tipopago', function() {
     var txtdescripcion=$("#txtdescripcion").val();
     if(txtdescripcion.trim()==""){
        $('#txtdescripcion').attr('class','form-control is-invalid');
        $('.msj_desc').empty();
        $('.msj_desc').append("- texto vacio");
        window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
      }else{
          var dataString = $('#formadd').serialize();
          $.ajax({
          type: 'POST',
          url: 'controller_func/tipo_pago/accion.php',
          data: dataString,
          success: function(data){
            switch (data) {
              case "true_doble":
                $('#txtdescripcion').attr('class','form-control is-invalid');
                $('.msj_desc').empty();
                $('.msj_desc').append("- Ya existe esta descripción en su lista");
                window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
                break;
              case "save_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se agrego el item correctamente');
                  list_tipopago();
                 break;
              case "edit_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se modifico el item correctamente');
                  list_tipopago();
                 break;
              default:
                  toastr.error('Error 505');
                 break;
            }

            }

          });
      }

  });
/*End Tipo de pago*/

/*Start Tipo de pago*/
//Crea a new Tipo de pago
  $(document).on('click', '.add-modal-tipoprogramaoncosalud', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_programa_oncosalud/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
    });
  });
//Lista de Tipo de pago
  function list_tipoprogramaoncosalud(){
      $.ajax({
      url:"controller_func/tipo_programa_oncosalud/list.php"
      }).done(function(info){
        $('.tbody_list').empty();
        $(".tbody_list").append(info);
      })

  }

//Exportar Excel Tipo de pago
 $(document).on('click', '.report-excel-tipoprogramaoncosalud', function() {
        window.location.href="controller_func/tipo_programa_oncosalud/exportarexcel.php";
  });

 //Exportar PDF Tipo de pago
 $(document).on('click', '.report-pdf-estado_tipoprogramaoncosalud', function() {
        window.location.href="controller_func/tipo_programa_oncosalud/exportarpdf.php";
  });

//Cargar Tipo de pago
  $(document).on('click', '#load-tipoprogramaoncosalud', function() {
    list_tipoprogramaoncosalud();
  });

//Eliminar Tipo de pago
  $(document).on('click', '#delete-tipoprogramaoncosalud', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_programa_oncosalud/accion.php?id="+id+"&es=3";
    $.get(url, function (data) {
        if(data=="delete_true"){
          $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
          $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
          $('.itemrow_jbtn'+id).attr('id','activate-tipoprogramaoncosalud');
          $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
          $('.itemrow_jbtn'+id).attr('title', 'Activar');
          toastr.error('Se desactivo el item correctamente');
        }
    });
  });

 //Activar Tipo de pago
  $(document).on('click', '#activate-tipoprogramaoncosalud', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_programa_oncosalud/accion.php?id="+id+"&es=4";
    $.get(url, function (data) {
    if(data=="activate_true"){
      $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
      $('.itemrow_jbtn'+id).attr('id','delete-tipoprogramaoncosalud');
      $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Eliminar');
      toastr.success('Se activo el item correctamente');
      }
    });
  });

//Show Tipo de pago
  $(document).on('click', '.show-modal-tipoprogramaoncosalud', function() {
    var id = $(this).data('id');
    var url = "controller_func/tipo_programa_oncosalud/show.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
    });
  });

/*Add  Tipo de pago*/
$('.modal-footer').on('click', '.add-tipoprogramaoncosalud', function() {
     var txtdescripcion=$("#txtdescripcion").val();
     if(txtdescripcion.trim()==""){
        $('#txtdescripcion').attr('class','form-control is-invalid');
        $('.msj_desc').empty();
        $('.msj_desc').append("- texto vacio");
        window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
      }else{
          var dataString = $('#formadd').serialize();
          $.ajax({
          type: 'POST',
          url: 'controller_func/tipo_programa_oncosalud/accion.php',
          data: dataString,
          success: function(data){
            switch (data) {
              case "true_doble":
                $('#txtdescripcion').attr('class','form-control is-invalid');
                $('.msj_desc').empty();
                $('.msj_desc').append("- Ya existe esta descripción en su lista");
                window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
                break;
              case "save_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se agrego el item correctamente');
                  list_tipoprogramaoncosalud();
                 break;
              case "edit_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se modifico el item correctamente');
                  list_tipoprogramaoncosalud();
                 break;
              default:
                  toastr.success('Error 505');
                 break;
            }

            }

          });
      }

  });
/*End Tipo de pago*/


/*Postulante  CRUD*/
//Crea a new Postulante
$(document).on('click', '.add-modal-usuario', function() {
  var id = $(this).data('id');
  var url = "controller_func/usuario/create.php?id="+id;
  $.get(url, function (data) {
    $('#formadd').empty();
    $('#formadd').append(data);
    $('#addModal').modal('show');
    $('.title_u').empty();
    $('.title_u').append("<i class='far fa-user'></i> Nuevo usuario");

  });
});


//Lista de usuarios
function list_postulantes(){
    $.ajax({
    url:"controller_func/rrhh_dp_postulante/list.php"
    }).done(function(info){
      $(".tbody_list").empty();
      $(".tbody_list").append(info);
    })

}

/*Start Nivel de Categoria*/
//Crea a new Nivel de  Categoria
  $(document).on('click', '.add-modal-nivelcategoria', function() {
    var id = $(this).data('id');
    var url = "controller_func/nivel_categoria/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
    });
  });
//Lista de Tipo de pago
  function list_nivelcategoria(){
      $.ajax({
      url:"controller_func/nivel_categoria/list.php"
      }).done(function(info){
        $('.tbody_list').empty();
        $(".tbody_list").append(info);
      })

  }

//Exportar Excel Tipo de pago
 $(document).on('click', '.report-excel-nivelcategoria', function() {
        window.location.href="controller_func/nivel_categoria/exportarexcel.php";
  });

 //Exportar PDF Tipo de pago
 $(document).on('click', '.report-pdf-nivelcategoria', function() {
        window.location.href="controller_func/nivel_categoria/exportarpdf.php";
  });

//Cargar Tipo de pago
  $(document).on('click', '#load-nivelcategoria', function() {
    list_nivelcategoria();
  });

//Eliminar Tipo de pago
  $(document).on('click', '#delete-nivelcategoria', function() {
    var id = $(this).data('id');
    var url = "controller_func/nivel_categoria/accion.php?id="+id+"&es=3";
    $.get(url, function (data) {
        if(data=="delete_true"){
          $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
          $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
          $('.itemrow_jbtn'+id).attr('id','activate-tipoprogramaoncosalud');
          $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
          $('.itemrow_jbtn'+id).attr('title', 'Activar');
          toastr.error('Se desactivo el item correctamente');
        }
    });
  });

 //Activar Tipo de pago
  $(document).on('click', '#activate-nivelcategoria', function() {
    var id = $(this).data('id');
    var url = "controller_func/nivel_categoria/accion.php?id="+id+"&es=4";
    $.get(url, function (data) {
    if(data=="activate_true"){
      $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
      $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
      $('.itemrow_jbtn'+id).attr('id','delete-tipoprogramaoncosalud');
      $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Eliminar');
      toastr.success('Se activo el item correctamente');
      }
    });
  });

//Show Tipo de pago
  $(document).on('click', '.show-modal-nivelcategoria', function() {
    var id = $(this).data('id');
    var url = "controller_func/nivel_categoria/show.php?id="+id;
    $.get(url, function (data) {
      $('#formshow').empty();
      $('#formshow').append(data);
      $('#showModal').modal('show');
    });
  });

/*Add  Tipo de pago*/
$('.modal-footer').on('click', '.add-nivelcategoria', function() {
     var txtdescripcion=$("#txtdescripcion").val();
     if(txtdescripcion.trim()==""){
        $('#txtdescripcion').attr('class','form-control is-invalid');
        $('.msj_desc').empty();
        $('.msj_desc').append("- texto vacio");
        window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
      }else{
          var dataString = $('#formadd').serialize();
          $.ajax({
          type: 'POST',
          url: 'controller_func/nivel_categoria/accion.php',
          data: dataString,
          success: function(data){
            switch (data) {
              case "true_doble":
                $('#txtdescripcion').attr('class','form-control is-invalid');
                $('.msj_desc').empty();
                $('.msj_desc').append("- Ya existe esta descripción en su lista");
                window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
                break;
              case "save_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se agrego el item correctamente');
                  list_nivelcategoria();
                 break;
              case "edit_true":
                  $('#formadd').empty();
                  $('#addModal').modal('hide');
                  toastr.success('Se modifico el item correctamente');
                  list_nivelcategoria();
                 break;
              default:
                  toastr.success('Error 505');
                 break;
            }

            }

          });
      }

  });
/*End Nivel Categoria*/

//Lista de usuarios
function repetir_session(){

  $('#showModal_login').modal('show');

}

$('#check_fec_baj').change(function(){
  if($(this).is(':checked')) {
    $('#fecha_baja').prop('disabled', false);
  } else {    
    $('#fecha_baja').prop('disabled', true);
  }
});

$('#check_fec_ing').change(function(){
  if($(this).is(':checked')) {
    $('#txt_fecha_ingreso').prop('disabled', false);
  } else {    
    $('#txt_fecha_ingreso').prop('disabled', true);
  }
});

//Lista de Representante conectados
function list_representantes_conectados(){
  var sltestadocontrato_filtro=$("#sltestadocontrato_filtro").val();
  var sltsegmentomkf_filtro=$("#sltsegmentomkf_filtro").val();
  var sltestadoconexion_filtro=$("#sltestadoconexion_filtro").val();
  var sltliderred_filtro=$("#sltliderred_filtro").val();
  var txtrep_filtro=$("#txtrep_filtro").val();
  var fecha_ini=""
  var fecha_fin=""
  var fecha_baja_ini="";
  var fecha_baja_fin="";
  var sltest_alta_filtro=$('#sltest_alta_filtro').val();

  if($('#check_fec_baj').is(':checked')) {
    fecha_baja_ini=$('#fecha_baja').data('daterangepicker').startDate.format('YYYY-MM-DD');
    fecha_baja_fin=$('#fecha_baja').data('daterangepicker').endDate.format('YYYY-MM-DD');
  }else{
    fecha_baja_ini="";
    fecha_baja_fin="";
  }

  if($('#check_fec_ing').is(':checked')) {
    fecha_ini=$('#txt_fecha_ingreso').data('daterangepicker').startDate.format('YYYY-MM-DD');
    fecha_fin=$('#txt_fecha_ingreso').data('daterangepicker').endDate.format('YYYY-MM-DD');
  }else{
    fecha_ini="";
    fecha_fin="";
  }

  var dataString = {"est_cont_filtro":sltestadocontrato_filtro,"est_seg_filtro":sltsegmentomkf_filtro,
  "est_conx_filtro":sltestadoconexion_filtro,"lider_red_filtro":sltliderred_filtro,
  "txt_rep_filtro":txtrep_filtro,"fecha_ini":fecha_ini,"fecha_fin":fecha_fin,"fecha_baja_ini":fecha_baja_ini,"fecha_baja_fin":fecha_baja_fin,
  "sltest_alta_filtro":sltest_alta_filtro}

  $.ajax({
  type: 'POST',
  url:"controller_func/representante_conectado/list.php",
  data: dataString,
  beforeSend:function(){
    cargar_data();
    },
  
  complete:function(){
    Swal.close();
    }
  }).promise().done(function(info){
    $('.tbody_list').empty();
    $(".tbody_list").append(info);
  })
  


}

//Lista de Representante conectados
function list_representantes_hc(){
  var sltestadocontrato_filtro=$("#sltestadocontrato_filtro").val();
  var sltsegmentomkf_filtro=$("#sltsegmentomkf_filtro").val();
  var sltestadoconexion_filtro=$("#sltestadoconexion_filtro").val();
  var sltliderred_filtro=$("#sltliderred_filtro").val();
  var txtrep_filtro=$("#txtrep_filtro").val();
  var fecha_ini=""
  var fecha_fin=""
  var fecha_baja_ini="";
  var fecha_baja_fin="";
  var sltest_alta_filtro=$('#sltest_alta_filtro').val();

  if($('#check_fec_baj').is(':checked')) {
    fecha_baja_ini=$('#fecha_baja').data('daterangepicker').startDate.format('YYYY-MM-DD');
    fecha_baja_fin=$('#fecha_baja').data('daterangepicker').endDate.format('YYYY-MM-DD');
  }else{
    fecha_baja_ini="";
    fecha_baja_fin="";
  }

  if($('#check_fec_ing').is(':checked')) {
    fecha_ini=$('#txt_fecha_ingreso').data('daterangepicker').startDate.format('YYYY-MM-DD');
    fecha_fin=$('#txt_fecha_ingreso').data('daterangepicker').endDate.format('YYYY-MM-DD');
  }else{
    fecha_ini="";
    fecha_fin="";
  }

  var dataString = {"est_cont_filtro":sltestadocontrato_filtro,"est_seg_filtro":sltsegmentomkf_filtro,
  "est_conx_filtro":sltestadoconexion_filtro,"lider_red_filtro":sltliderred_filtro,
  "txt_rep_filtro":txtrep_filtro,"fecha_ini":fecha_ini,"fecha_fin":fecha_fin,"fecha_baja_ini":fecha_baja_ini,"fecha_baja_fin":fecha_baja_fin,
  "sltest_alta_filtro":sltest_alta_filtro}
  
  $.ajax({
  type: 'POST',
  url:"controller_func/representante_conectado/list_hc.php",
  data: dataString,
  beforeSend:function(){
    cargar_data();
    },
  complete:function(){
    Swal.close();
    },
  }).done(function(info){
    $('.tbody_list').empty();
    $(".tbody_list").append(info);
  })

}


//Activar HC ONCOSALUD
$(document).on('click', '#desactivar-hc-representante', function() {
  var id = $(this).data('id');
  var url = "controller_func/representante_conectado/accion_hc.php?id="+id+"&es=2";
  $.get(url, function (data) {
    $('#itemrow_jbtn'+id).removeClass('fas fa-check').addClass('fas fa-times');
    $('.itemrow_jbtn'+id).attr('id','activar-hc-representante');
    $('.itemrow_jbtn'+id).attr('class','btn btn-secondary  btn-xs itemrow_jbtn'+id);
    $('.itemrow_jbtn'+id).attr('title', 'Activo HC Oncosalud');
  });
});

//Activar Representante
$(document).on('click', '#activar-hc-representante', function() {
  var id = $(this).data('id');
  var url = "controller_func/representante_conectado/accion_hc.php?id="+id+"&es=3";
  $.get(url, function (data) {      
      $('#itemrow_jbtn'+id).removeClass('fas fa-times').addClass('fas fa-check');
      $('.itemrow_jbtn'+id).attr('id','desactivar-hc-representante');
      $('.itemrow_jbtn'+id).attr('class','btn btn-primary btn-xs itemrow_jbtn'+id);
      $('.itemrow_jbtn'+id).attr('title', 'Inactivo HC Oncosalud');
  });
});



$(document).on('click', '.edit-rep-con', function() {
  var id = $(this).data('id');
  var url = "controller_func/representante_conectado/create.php?id="+id;
  $.get(url, function (data) {
    $('#frm-editar-rep-con').empty();
    $('#frm-editar-rep-con').append(data);
    $('#modal-editar-rep-con').modal('show');
  });
});

$(document).on('click', '.subir-rep-cone-sis', function() {
  var id = $(this).data('id');
  var url = "controller_func/representante_conectado/subir.php?id="+id;
  $.get(url, function (data) {
    $('#formadd').empty();
    $('#formadd').append(data);
    $('#modal-subir-rep-con-sis').modal('show');
  });
});



/**representante conectados */

$(document).on('keyup', '#txtdni', function() {
  this.value = this.value.replace(/[^0-9]/g,'');
});

$(document).on('keyup', '#txtcel', function() {
  this.value = this.value.replace(/[^0-9]/g,'');
});

$(document).on('keyup', '#txtedad', function() {
  this.value = this.value.replace(/[^0-9]/g,'');
});


$(document).on('change', '#sltnombreliderred', function() {

  var sltnombreliderred=$("#sltnombreliderred").val();

  if(sltnombreliderred=="nuevacabezared" || sltnombreliderred=="unilevel"){
    $('#divtxtsponsor').hide();
    $('#divtxtsponsor_datos').hide();
    $('#divtxtsupervisor').show();
    $('.btn-editar-rep-con').prop('disabled', false);
  }else{
    $('#divtxtsponsor').show();
    $('#divtxtsponsor_datos').show();    
    $('#divtxtsupervisor').hide();    
    $('.btn-editar-rep-con').prop('disabled', true);
  }
 
});


$(document).on('change', '#sltentidadbanco', function() {

  var sltentidadbanco=$("#sltentidadbanco").val();
  if(sltentidadbanco=="Otro"){
    $('#divtxtentidad_bancaria').show();  
    $('#txtotrobanco').prop('type', 'text');
  }else{
    $('#txtotrobanco').prop('type', 'hidden');
    $('#divtxtentidad_bancaria').hide();
  }
 
});

/*Validar RUC representante conectado */
$(document).on('keyup mouseleave', '#txtsponsor_rc', function() {
  this.value = this.value.replace(/[^0-9]/g,'');
  var ruc=$("#txtsponsor_rc").val();
  var liderdered=$("#sltnombreliderred").val();
  var dataString = {"ruc":ruc,"liderdered":liderdered}
  //alert(ruc.length);
  if(ruc.trim()=="" || ruc.length<=10){
        $('#txtsponsor_rc').attr('class','form-control');
        $('.msj-txtsponsor').empty();
        $('.btn-editar-rep-con').prop('disabled', false);
  }else{
    $.ajax({
    type: 'POST',
    url: 'controller_func/validar/validar_ruc_conectado_sponsor.php',
    data: dataString,
    success: function(data) {
      if(data.trim()=="false"){
        $('.btn-editar-rep-con').prop('disabled', true);
        $('#txtsponsor_rc').attr('class','form-control is-invalid');
        $('.msj-txtsponsor').empty();
        $('.msj-txtsponsor').append("- No Existente");
        $('#lbl_ruc_lider_dir').empty();
      }else{
        $('.btn-editar-rep-con').prop('disabled', false);
        $('#txtsponsor_rc').attr('class','form-control is-valid');
        $('.msj-txtsponsor').empty();        
        datos_sponsor_rc();        
      }
      }
    });
  }
});

//Datos Sponsor
function datos_sponsor_rc(){
  var ruc=$("#txtsponsor_rc").val();
  var dataString = {"ruc":ruc}
  $.ajax({
  type: 'POST',
  url:"controller_func/representante_conectado/datos_sponsor.php",
  data: dataString,
  }).done(function(info){
    $('#lbl_ruc_lider_dir').empty();
    $("#lbl_ruc_lider_dir").append(info);
  })
}


$(document).on('change', '#sltdepartamento', function() {

  var sltdepartamento=$("#sltdepartamento").val();
  var dataString = {"sltdepartamento":sltdepartamento}

 $.ajax({
      type: 'POST',
      url:"controller_func/provincia/combo.php",
      data: dataString
      }).done(function(info){
        $('#sltprovincia').empty();
        $("#sltprovincia").append(info);
      });
});

$(document).on('change', '#sltprovincia', function() {

  var sltprovincia=$("#sltprovincia").val();
  var sltdepartamento=$("#sltdepartamento").val();
  var dataString = {"sltdepartamento":sltdepartamento,"sltprovincia":sltprovincia}

 $.ajax({
      type: 'POST',
      url:"controller_func/distrito/combo.php",
      data: dataString
      }).done(function(info){
        $('#sltdistrito').empty();
        $("#sltdistrito").append(info);
      });
});



$(document).on('click', '.btn-editar-rep-con', function() {

  var txtedit=$("#txtedit").val();
    
  var txtnombre=$("#txtnombre").val();
  var txtapepat=$("#txtapepat").val();
  var txtapemat=$("#txtapemat").val();
  var txtdni=$("#txtdni").val();
  var txtcel=$("#txtcel").val();
  var txtemail=$("#txtemail").val();
  var sltgenero=$("#sltgenero").val();
  var txtfechanac=$("#txtfechanac").val();
  var txtedad=$("#txtedad").val();
  var sltestadocivil=$("#sltestadocivil").val();
  var txthijos=$("#txthijos").val();
  var txthijos_7=$("#txthijos_7").val();
  var txthijos_8_12=$("#txthijos_8_12").val();
  var txthijos_13_17=$("#txthijos_13_17").val();
  var txthijos_18=$("#txthijos_18").val();
  var sltdependientes=$("#sltdependientes").val();
  var txtdireccion=$("#txtdireccion").val();
  var sltdepartamento=$("#sltdepartamento").val();
  var sltprovincia=$("#sltprovincia").val();
  var sltdistrito=$("#sltdistrito").val();
  
  var txtotrobanco="Otro";
  var posicion=0;
 
  var txtruc=$("#txtruc_trama").val();  
  var sltentidadbanco=$("#sltentidadbanco").val();
  if(sltentidadbanco=="Otro"){    
    var txtotrobanco=$("#txtotrobanco").val();
  }
  var txtncuenta=$("#txtncuenta").val();
  var txtncuentainter=$("#txtncuentainter").val();

  var txtfechainicon=$("#txtfechainicon").val();
  var txtfechafincon=$("#txtfechafincon").val();
  var sltestadocontrato=$("#sltestadocontrato").val();
  var sltestadosegmento=$("#sltestadosegmento").val();
  var sltestadoconexion=$("#sltestadoconexion").val();

  if(txtedit=="2"){
    var sltnombreliderred="ensis"; 
    var txtsponsor_rc="ensis";
    
  }else{
    var sltnombreliderred=$("#sltnombreliderred").val();
    if(sltnombreliderred!="nuevacabezared" && sltnombreliderred!="unilevel"){    
      var txtsponsor_rc=$("#txtsponsor_rc").val();
    }
  }

  if(txtnombre.trim()==""){
    $('#txtnombre').attr('class','form-control is-invalid');
    $('.msj-txtnombre').empty();
    $('.msj-txtnombre').append(" - Ingrese un nombre");
    posicion = $("#txtnombre").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtnombre").focus();
    window.setTimeout(function() { $('.msj-txtnombre').html("");$('#txtnombre').attr('class','form-control');}, 3000);
    //return false;
  }else if(txtapepat.trim()==""){
    $('#txtapepat').attr('class','form-control is-invalid');
    $('.msj-txtapepat').empty();
    $('.msj-txtapepat').append(" - Ingrese un apellido paterno");
    posicion = $("#txtapepat").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtapepat").focus();
    window.setTimeout(function() { $('.msj-txtapepat').html("");$('#txtapepat').attr('class','form-control');}, 3000);
  }else if(txtapemat.trim()==""){
    $('#txtapemat').attr('class','form-control is-invalid');
    $('.msj-txtapemat').empty();
    $('.msj-txtapemat').append(" - Ingrese un apellido materno");
    posicion = $("#txtapemat").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtapemat").focus();
    window.setTimeout(function() { $('.msj-txtapemat').html("");$('#txtapemat').attr('class','form-control');}, 3000);
  }else if(txtdni.trim()==""){
    $('#txtdni').attr('class','form-control is-invalid');
    $('.msj-txtdni').empty();
    $('.msj-txtdni').append(" - Ingrese un DNI");
    posicion = $("#txtdni").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtdni").focus();
    window.setTimeout(function() { $('.msj-txtdni').html("");$('#txtdni').attr('class','form-control');}, 3000);
  }else if(txtcel.trim()==""){
    $('#txtcel').attr('class','form-control is-invalid');
    $('.msj-txtcel').empty();
    $('.msj-txtcel').append(" - Ingrese un celular");
    posicion = $("#txtcel").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtcel").focus();
    window.setTimeout(function() { $('.msj-txtcel').html("");$('#txtcel').attr('class','form-control');}, 3000);
  }else if(txtemail.trim()=="" || (regexemail.test(txtemail))==false){
    $('#txtemail').attr('class','form-control is-invalid');
    $('.msj-txtemail').empty();
    $('.msj-txtemail').append(" - Ingrese un correo electronico o email");
    posicion = $("#txtemail").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtemail").focus();
    window.setTimeout(function() { $('.msj-txtemail').html("");$('#txtemail').attr('class','form-control');}, 3000);
  }else if(sltgenero.trim()=="0"){
    $('.msj-sltgenero').empty();
    $('.msj-sltgenero').append(" - Seleccione un genero");
    posicion = $("#sltgenero").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltgenero").focus();
    window.setTimeout(function() { $('.msj-sltgenero').html("");}, 3000);
  }else if(txtfechanac.trim()==""){
    $('#txtfechanac').attr('class','form-control float-right is-invalid');
    $('.msj-txtfechanac').empty();
    $('.msj-txtfechanac').append(" - Seleccione una fecha de nacimiento");
    posicion = $("#txtfechanac").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    window.setTimeout(function() { $('.msj-txtfechanac').html("");$('#txtfechanac').attr('class','form-control');}, 3000);
  }else if(txtedad.trim()=="" || txtedad<18){
    $('#txtedad').attr('class','form-control is-invalid');
    $('.msj-txtedad').empty();
    $('.msj-txtedad').append(" - Ingrese una edad");
    posicion = $("#txtedad").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtedad").focus();
    window.setTimeout(function() { $('.msj-txtedad').html("");$('#txtedad').attr('class','form-control');}, 3000);
  }else if(sltestadocivil.trim()=="0"){
    $('.msj-sltestadocivil').empty();
    $('.msj-sltestadocivil').append(" - Seleccione un estado civil");
    posicion = $("#sltestadocivil").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltestadocivil").focus();
    window.setTimeout(function() { $('.msj-sltestadocivil').html("");}, 3000);
  }else if(txthijos.trim()==""){
    $('#txthijos').attr('class','form-control is-invalid');
    $('.msj-txthijos').empty();
    $('.msj-txthijos').append(" - Ingrese una cantidad | minimo=0 | maximo > 0");
    posicion = $("#txthijos").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txthijos").focus();
    window.setTimeout(function() { $('.msj-txthijos').html("");$('#txthijos').attr('class','form-control');}, 3000);
  }else if(txthijos_7.trim()==""){
    $('#txthijos_7').attr('class','form-control is-invalid');
    $('.msj-txthijos_7').empty();
    $('.msj-txthijos_7').append(" - Ingrese una cantidad | minimo=0 | maximo > 0");
    posicion = $("#txthijos_7").offset().top;posicion-=75;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txthijos_7").focus();
    window.setTimeout(function() { $('.msj-txthijos_7').html("");$('#txthijos_7').attr('class','form-control');}, 3000);
  }else if(txthijos_8_12.trim()==""){
    $('#txthijos_8_12').attr('class','form-control is-invalid');
    $('.msj-txthijos_8_12').empty();
    $('.msj-txthijos_8_12').append(" - Ingrese una cantidad | minimo=0 | maximo > 0");
    posicion = $("#txthijos_8_12").offset().top;posicion-=75;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txthijos_8_12").focus();
    window.setTimeout(function() { $('.msj-txthijos_8_12').html("");$('#txthijos_8_12').attr('class','form-control');}, 3000);
  }else if(txthijos_13_17.trim()==""){
    $('#txthijos_13_17').attr('class','form-control is-invalid');
    $('.msj-txthijos_13_17').empty();
    $('.msj-txthijos_13_17').append(" - Ingrese una cantidad | minimo=0 | maximo > 0");
    posicion = $("#txthijos_13_17").offset().top;posicion-=75;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txthijos_13_17").focus();
    window.setTimeout(function() { $('.msj-txthijos_13_17').html("");$('#txthijos_13_17').attr('class','form-control');}, 3000);
  }else if(txthijos_18.trim()==""){
    $('#txthijos_18').attr('class','form-control is-invalid');
    $('.msj-txthijos_18').empty();
    $('.msj-txthijos_18').append(" - Ingrese una cantidad | minimo=0 | maximo > 0");
    posicion = $("#txthijos_18").offset().top;posicion-=75;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txthijos_18").focus();
    window.setTimeout(function() { $('.msj-txthijos_18').html("");$('#txthijos_18').attr('class','form-control');}, 3000);
  }else if(sltdependientes.trim()=="0"){
    $('.msj-sltdependientes').empty();
    $('.msj-sltdependientes').append(" - Seleccione si ¿ Tienes otros dependientes ? ");
    posicion = $("#sltdependientes").offset().top;posicion-=75;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltdependientes").focus();
    window.setTimeout(function() { $('.msj-sltdependientes').html("");}, 3000);
  }else if(txtdireccion.trim()==""){
    $('#txtdireccion').attr('class','form-control is-invalid');
    $('.msj-txtdireccion').empty();
    $('.msj-txtdireccion').append(" - Ingrese una dirección");
    posicion = $("#txtdireccion").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtdireccion").focus();
    window.setTimeout(function() { $('.msj-txtdireccion').html("");$('#txtdireccion').attr('class','form-control');}, 3000);
  }else if(sltdepartamento.trim()=="0"){
    $('.msj-sltdepartamento').empty();
    $('.msj-sltdepartamento').append(" - Seleccione un departamento");
    posicion = $("#sltdepartamento").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltdepartamento").focus();
    window.setTimeout(function() { $('.msj-sltdepartamento').html("");}, 3000);
  }else if(sltprovincia.trim()=="0"){
    $('.msj-sltprovincia').empty();
    $('.msj-sltprovincia').append(" - Seleccione una provincia");
    posicion = $("#sltprovincia").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltprovincia").focus();
    window.setTimeout(function() { $('.msj-sltprovincia').html("");}, 3000);
  }else if(sltdistrito.trim()=="0"){
    $('.msj-sltdistrito').empty();
    $('.msj-sltdistrito').append(" - Seleccione un distrito");
    posicion = $("#sltdistrito").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltdistrito").focus();
    window.setTimeout(function() { $('.msj-sltdistrito').html("");}, 3000);
  }else if(sltnombreliderred.trim()=="0"){
    $('.msj-sltnombreliderred').empty();
    $('.msj-sltnombreliderred').append(" - Seleccione un nombre de lider de red");
    posicion = $("#sltnombreliderred").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltnombreliderred").focus();
    window.setTimeout(function() { $('.msj-sltnombreliderred').html("");}, 3000);
  }else if(txtruc.trim()==""){
    $('#txtruc_trama').attr('class','form-control is-invalid');
    $('.msj-txtruc').empty();
    $('.msj-txtruc').append(" - Ingrese un RUC Persona Natural");
    posicion = $("#txtruc").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtruc_trama").focus();
    window.setTimeout(function() { $('.msj-txtruc').html("");$('#txtruc_trama').attr('class','form-control');}, 3000);
  }else if((sltnombreliderred.trim()!="nuevacabezared" && sltnombreliderred.trim()!="unilevel") && txtsponsor_rc.trim()==""){
    $('#txtsponsor_rc').attr('class','form-control is-invalid');
    $('.msj-txtsponsor').empty();
    $('.msj-txtsponsor').append(" - Ingrese un RUC Persona Natural");
    posicion = $("#txtsponsor").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtsponsor").focus();
    window.setTimeout(function() { $('.msj-txtsponsor').html("");}, 3000);
  }else if(sltentidadbanco.trim()=="0"){
    $('.msj-sltentidadbanco').empty();
    $('.msj-sltentidadbanco').append(" - Seleccione una entidad bancaria");
    posicion = $("#sltentidadbanco").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltentidadbanco").focus();
    window.setTimeout(function() { $('.msj-sltentidadbanco').html("");}, 3000);
  }else if(sltentidadbanco.trim()=="Otro" && txtotrobanco.trim()==""){
    $('#txtotrobanco').attr('class','form-control is-invalid');
    posicion = $("#txtotrobanco").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtotrobanco").focus();
    window.setTimeout(function() {$('#txtotrobanco').attr('class','form-control');}, 3000);
  }else if(txtncuenta.trim()==""){
    $('#txtncuenta').attr('class','form-control is-invalid');
    $('.msj-txtncuenta').empty();
    $('.msj-txtncuenta').append(" - Ingrese un número");
    posicion = $("#txtncuenta").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtncuenta").focus();
    window.setTimeout(function() { $('.msj-txtncuenta').html("");$('#txtncuenta').attr('class','form-control');}, 3000);
  }else if(txtncuentainter.trim()==""){
    $('#txtncuentainter').attr('class','form-control is-invalid');
    $('.msj-txtncuentainter').empty();
    $('.msj-txtncuentainter').append(" - Ingrese un número");
    posicion = $("#txtncuentainter").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtncuentainter").focus();
    window.setTimeout(function() { $('.msj-txtncuentainter').html("");$('#txtncuentainter').attr('class','form-control');}, 3000);
  }/*else if(txtfechainicon.trim()==""){
    $('#txtfechainicon').attr('class','form-control float-right is-invalid');
    $('.msj-txtfechainicon').empty();
    $('.msj-txtfechainicon').append(" - Seleccione una fecha de inicio de contrato");
    posicion = $("#txtfechainicon").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    window.setTimeout(function() { $('.msj-txtfechafincon').html("");$('#txtfechafincon').attr('class','form-control');}, 3000);
  }else if(txtfechafincon.trim()==""){
    $('#txtfechafincon').attr('class','form-control float-right is-invalid');
    $('.msj-txtfechafincon').empty();
    $('.msj-txtfechafincon').append(" - Seleccione una fecha final de contrato");
    posicion = $("#txtfechafincon").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    window.setTimeout(function() { $('.msj-txtfechafincon').html("");$('#txtfechafincon').attr('class','form-control');}, 3000);
  }*/else if(sltestadocontrato.trim()=="0"){
    $('.msj-sltestadocontrato').empty();
    $('.msj-sltestadocontrato').append(" - Seleccione un estado de contrato");
    posicion = $("#sltestadocontrato").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltestadocontrato").focus();
    window.setTimeout(function() { $('.msj-sltestadocontrato').html("");}, 3000);
  }else if(sltestadosegmento.trim()=="0"){
    $('.msj-sltestadosegmento').empty();
    $('.msj-sltestadosegmento').append(" - Seleccione un segmento MKF");
    posicion = $("#sltestadosegmento").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltestadosegmento").focus();
    window.setTimeout(function() { $('.msj-sltestadosegmento').html("");}, 3000);
  }else if(sltestadoconexion.trim()=="0"){
    $('.msj-sltestadoconexion').empty();
    $('.msj-sltestadoconexion').append(" - Seleccione un estado de conexion");
    posicion = $("#sltestadoconexion").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltestadoconexion").focus();
    window.setTimeout(function() { $('.msj-sltestadoconexion').html("");}, 3000);
  }else{   
      var dataString = $('#frm-editar-rep-con').serialize();
      $.ajax({
        type: 'POST',
        url: 'controller_func/representante_conectado/accion.php',
        data: dataString,
        success: function(data){  
          if(data.trim()=="true"){
            toastr.success('Gracias, se modifico los datos correctamente');
            $('#frm-editar-rep-con').empty();
            $('#modal-editar-rep-con').modal('hide');
            list_representantes_conectados();
          }else{
            toastr.error('No se modifico sus datos, comuniquese con Soporte Prolife');
            $('#frm-editar-rep-con').empty();
            $('#modal-editar-rep-con').modal('hide');
            list_representantes_conectados();
          }
        }

      });
  }
});

$(document).on('click', '.reingreso-rep-cone-sis', function() {
  var id = $(this).data('id');
  var url = "controller_func/representante_conectado/re-ingreso.php?id="+id;
  $.get(url, function (data) {
    $('#frm-re-ingreso-rep').empty();
    $('#frm-re-ingreso-rep').append(data);
    $('#modal-re-ingreso-rep').modal('show');
  });
});

$(document).on('click', '.btn-re-ingreso-rep-con', function() {

  var txtedit=$("#txtedit").val();
    
  var txtnombre=$("#txtnombre").val();
  var txtapepat=$("#txtapepat").val();
  var txtapemat=$("#txtapemat").val();
  var txtdni=$("#txtdni").val();
  var txtcel=$("#txtcel").val();
  var txtemail=$("#txtemail").val();
  var sltgenero=$("#sltgenero").val();
  var txtfechanac=$("#txtfechanac").val();
  var txtedad=$("#txtedad").val();
  var sltestadocivil=$("#sltestadocivil").val();
  var txthijos=$("#txthijos").val();
  var txthijos_7=$("#txthijos_7").val();
  var txthijos_8_12=$("#txthijos_8_12").val();
  var txthijos_13_17=$("#txthijos_13_17").val();
  var txthijos_18=$("#txthijos_18").val();
  var sltdependientes=$("#sltdependientes").val();
  var txtdireccion=$("#txtdireccion").val();
  var sltdepartamento=$("#sltdepartamento").val();
  var sltprovincia=$("#sltprovincia").val();
  var sltdistrito=$("#sltdistrito").val();
  
  var txtotrobanco="Otro";
  var posicion=0;
 
  var txtruc=$("#txtruc_trama").val();  
  var sltentidadbanco=$("#sltentidadbanco").val();
  if(sltentidadbanco=="Otro"){    
    var txtotrobanco=$("#txtotrobanco").val();
  }
  var txtncuenta=$("#txtncuenta").val();
  var txtncuentainter=$("#txtncuentainter").val();

  var sltnombreliderred=$("#sltnombreliderred").val();
  if(sltnombreliderred!="nuevacabezared" && sltnombreliderred!="unilevel"){    
    var txtsponsor_rc=$("#txtsponsor_rc").val();
  }
  

  if(txtnombre.trim()==""){
    $('#txtnombre').attr('class','form-control is-invalid');
    $('.msj-txtnombre').empty();
    $('.msj-txtnombre').append(" - Ingrese un nombre");
    posicion = $("#txtnombre").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtnombre").focus();
    window.setTimeout(function() { $('.msj-txtnombre').html("");$('#txtnombre').attr('class','form-control');}, 3000);
    //return false;
  }else if(txtapepat.trim()==""){
    $('#txtapepat').attr('class','form-control is-invalid');
    $('.msj-txtapepat').empty();
    $('.msj-txtapepat').append(" - Ingrese un apellido paterno");
    posicion = $("#txtapepat").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtapepat").focus();
    window.setTimeout(function() { $('.msj-txtapepat').html("");$('#txtapepat').attr('class','form-control');}, 3000);
  }else if(txtapemat.trim()==""){
    $('#txtapemat').attr('class','form-control is-invalid');
    $('.msj-txtapemat').empty();
    $('.msj-txtapemat').append(" - Ingrese un apellido materno");
    posicion = $("#txtapemat").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtapemat").focus();
    window.setTimeout(function() { $('.msj-txtapemat').html("");$('#txtapemat').attr('class','form-control');}, 3000);
  }else if(txtdni.trim()==""){
    $('#txtdni').attr('class','form-control is-invalid');
    $('.msj-txtdni').empty();
    $('.msj-txtdni').append(" - Ingrese un DNI");
    posicion = $("#txtdni").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtdni").focus();
    window.setTimeout(function() { $('.msj-txtdni').html("");$('#txtdni').attr('class','form-control');}, 3000);
  }else if(txtcel.trim()==""){
    $('#txtcel').attr('class','form-control is-invalid');
    $('.msj-txtcel').empty();
    $('.msj-txtcel').append(" - Ingrese un celular");
    posicion = $("#txtcel").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtcel").focus();
    window.setTimeout(function() { $('.msj-txtcel').html("");$('#txtcel').attr('class','form-control');}, 3000);
  }else if(txtemail.trim()=="" || (regexemail.test(txtemail))==false){
    $('#txtemail').attr('class','form-control is-invalid');
    $('.msj-txtemail').empty();
    $('.msj-txtemail').append(" - Ingrese un correo electronico o email");
    posicion = $("#txtemail").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtemail").focus();
    window.setTimeout(function() { $('.msj-txtemail').html("");$('#txtemail').attr('class','form-control');}, 3000);
  }else if(sltgenero.trim()=="0"){
    $('.msj-sltgenero').empty();
    $('.msj-sltgenero').append(" - Seleccione un genero");
    posicion = $("#sltgenero").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltgenero").focus();
    window.setTimeout(function() { $('.msj-sltgenero').html("");}, 3000);
  }else if(txtfechanac.trim()==""){
    $('#txtfechanac').attr('class','form-control float-right is-invalid');
    $('.msj-txtfechanac').empty();
    $('.msj-txtfechanac').append(" - Seleccione una fecha de nacimiento");
    posicion = $("#txtfechanac").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    window.setTimeout(function() { $('.msj-txtfechanac').html("");$('#txtfechanac').attr('class','form-control');}, 3000);
  }else if(txtedad.trim()=="" || txtedad<18){
    $('#txtedad').attr('class','form-control is-invalid');
    $('.msj-txtedad').empty();
    $('.msj-txtedad').append(" - Ingrese una edad");
    posicion = $("#txtedad").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtedad").focus();
    window.setTimeout(function() { $('.msj-txtedad').html("");$('#txtedad').attr('class','form-control');}, 3000);
  }else if(sltestadocivil.trim()=="0"){
    $('.msj-sltestadocivil').empty();
    $('.msj-sltestadocivil').append(" - Seleccione un estado civil");
    posicion = $("#sltestadocivil").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltestadocivil").focus();
    window.setTimeout(function() { $('.msj-sltestadocivil').html("");}, 3000);
  }else if(txthijos.trim()==""){
    $('#txthijos').attr('class','form-control is-invalid');
    $('.msj-txthijos').empty();
    $('.msj-txthijos').append(" - Ingrese una cantidad | minimo=0 | maximo > 0");
    posicion = $("#txthijos").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txthijos").focus();
    window.setTimeout(function() { $('.msj-txthijos').html("");$('#txthijos').attr('class','form-control');}, 3000);
  }else if(txthijos_7.trim()==""){
    $('#txthijos_7').attr('class','form-control is-invalid');
    $('.msj-txthijos_7').empty();
    $('.msj-txthijos_7').append(" - Ingrese una cantidad | minimo=0 | maximo > 0");
    posicion = $("#txthijos_7").offset().top;posicion-=75;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txthijos_7").focus();
    window.setTimeout(function() { $('.msj-txthijos_7').html("");$('#txthijos_7').attr('class','form-control');}, 3000);
  }else if(txthijos_8_12.trim()==""){
    $('#txthijos_8_12').attr('class','form-control is-invalid');
    $('.msj-txthijos_8_12').empty();
    $('.msj-txthijos_8_12').append(" - Ingrese una cantidad | minimo=0 | maximo > 0");
    posicion = $("#txthijos_8_12").offset().top;posicion-=75;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txthijos_8_12").focus();
    window.setTimeout(function() { $('.msj-txthijos_8_12').html("");$('#txthijos_8_12').attr('class','form-control');}, 3000);
  }else if(txthijos_13_17.trim()==""){
    $('#txthijos_13_17').attr('class','form-control is-invalid');
    $('.msj-txthijos_13_17').empty();
    $('.msj-txthijos_13_17').append(" - Ingrese una cantidad | minimo=0 | maximo > 0");
    posicion = $("#txthijos_13_17").offset().top;posicion-=75;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txthijos_13_17").focus();
    window.setTimeout(function() { $('.msj-txthijos_13_17').html("");$('#txthijos_13_17').attr('class','form-control');}, 3000);
  }else if(txthijos_18.trim()==""){
    $('#txthijos_18').attr('class','form-control is-invalid');
    $('.msj-txthijos_18').empty();
    $('.msj-txthijos_18').append(" - Ingrese una cantidad | minimo=0 | maximo > 0");
    posicion = $("#txthijos_18").offset().top;posicion-=75;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txthijos_18").focus();
    window.setTimeout(function() { $('.msj-txthijos_18').html("");$('#txthijos_18').attr('class','form-control');}, 3000);
  }else if(sltdependientes.trim()=="0"){
    $('.msj-sltdependientes').empty();
    $('.msj-sltdependientes').append(" - Seleccione si ¿ Tienes otros dependientes ? ");
    posicion = $("#sltdependientes").offset().top;posicion-=75;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltdependientes").focus();
    window.setTimeout(function() { $('.msj-sltdependientes').html("");}, 3000);
  }else if(txtdireccion.trim()==""){
    $('#txtdireccion').attr('class','form-control is-invalid');
    $('.msj-txtdireccion').empty();
    $('.msj-txtdireccion').append(" - Ingrese una dirección");
    posicion = $("#txtdireccion").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtdireccion").focus();
    window.setTimeout(function() { $('.msj-txtdireccion').html("");$('#txtdireccion').attr('class','form-control');}, 3000);
  }else if(sltdepartamento.trim()=="0"){
    $('.msj-sltdepartamento').empty();
    $('.msj-sltdepartamento').append(" - Seleccione un departamento");
    posicion = $("#sltdepartamento").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltdepartamento").focus();
    window.setTimeout(function() { $('.msj-sltdepartamento').html("");}, 3000);
  }else if(sltprovincia.trim()=="0"){
    $('.msj-sltprovincia').empty();
    $('.msj-sltprovincia').append(" - Seleccione una provincia");
    posicion = $("#sltprovincia").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltprovincia").focus();
    window.setTimeout(function() { $('.msj-sltprovincia').html("");}, 3000);
  }else if(sltdistrito.trim()=="0"){
    $('.msj-sltdistrito').empty();
    $('.msj-sltdistrito').append(" - Seleccione un distrito");
    posicion = $("#sltdistrito").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltdistrito").focus();
    window.setTimeout(function() { $('.msj-sltdistrito').html("");}, 3000);
  }else if(sltnombreliderred.trim()=="0"){
    $('.msj-sltnombreliderred').empty();
    $('.msj-sltnombreliderred').append(" - Seleccione un nombre de lider de red");
    posicion = $("#sltnombreliderred").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltnombreliderred").focus();
    window.setTimeout(function() { $('.msj-sltnombreliderred').html("");}, 3000);
  }else if(txtruc.trim()==""){
    $('#txtruc_trama').attr('class','form-control is-invalid');
    $('.msj-txtruc').empty();
    $('.msj-txtruc').append(" - Ingrese un RUC Persona Natural");
    posicion = $("#txtruc").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtruc_trama").focus();
    window.setTimeout(function() { $('.msj-txtruc').html("");$('#txtruc_trama').attr('class','form-control');}, 3000);
  }else if((sltnombreliderred.trim()!="nuevacabezared" && sltnombreliderred.trim()!="unilevel") && txtsponsor_rc.trim()==""){
    $('#txtsponsor_rc').attr('class','form-control is-invalid');
    $('.msj-txtsponsor').empty();
    $('.msj-txtsponsor').append(" - Ingrese un RUC Persona Natural");
    posicion = $("#txtsponsor").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtsponsor").focus();
    window.setTimeout(function() { $('.msj-txtsponsor').html("");}, 3000);
  }else if(sltentidadbanco.trim()=="0"){
    $('.msj-sltentidadbanco').empty();
    $('.msj-sltentidadbanco').append(" - Seleccione una entidad bancaria");
    posicion = $("#sltentidadbanco").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#sltentidadbanco").focus();
    window.setTimeout(function() { $('.msj-sltentidadbanco').html("");}, 3000);
  }else if(sltentidadbanco.trim()=="Otro" && txtotrobanco.trim()==""){
    $('#txtotrobanco').attr('class','form-control is-invalid');
    posicion = $("#txtotrobanco").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtotrobanco").focus();
    window.setTimeout(function() {$('#txtotrobanco').attr('class','form-control');}, 3000);
  }else if(txtncuenta.trim()==""){
    $('#txtncuenta').attr('class','form-control is-invalid');
    $('.msj-txtncuenta').empty();
    $('.msj-txtncuenta').append(" - Ingrese un número");
    posicion = $("#txtncuenta").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtncuenta").focus();
    window.setTimeout(function() { $('.msj-txtncuenta').html("");$('#txtncuenta').attr('class','form-control');}, 3000);
  }else if(txtncuentainter.trim()==""){
    $('#txtncuentainter').attr('class','form-control is-invalid');
    $('.msj-txtncuentainter').empty();
    $('.msj-txtncuentainter').append(" - Ingrese un número");
    posicion = $("#txtncuentainter").offset().top;posicion-=50;    
    $("html, body").animate({scrollTop: posicion }, 100);
    $("#txtncuentainter").focus();
    window.setTimeout(function() { $('.msj-txtncuentainter').html("");$('#txtncuentainter').attr('class','form-control');}, 3000);
  }else{   
      var dataString = $('#frm-re-ingreso-rep').serialize();
      $.ajax({
        type: 'POST',
        url: 'controller_func/representante_conectado/accion.php',
        data: dataString,
        success: function(data){  
          if(data.trim()=="true"){
            toastr.success('Gracias, se re-ingreso el representante correctamente');
            $('#frm-re-ingreso-rep').empty();
            $('#modal-re-ingreso-rep').modal('hide');
            list_representantes_conectados();
          }else{
            toastr.error('No se re-ingreso sus datos, comuniquese con Soporte Prolife');
            $('#frm-re-ingreso-rep').empty();
            $('#modal-re-ingreso-rep').modal('hide');
            list_representantes_conectados();
          }
        }

      });
  }
});

$(document).on('click', '.list-re-ingreso', function() {
  var id = $(this).data('id');
  var url = "controller_func/representante_conectado/list_re-ingreso.php?id="+id;
  $.get(url, function (data) {
    $('#frm-list-re-ingreso-rep').empty();
    $('#frm-list-re-ingreso-rep').append(data);
    $('#modal-list-re-ingreso-rep').modal('show');
  });
});

function combo_estado_conexion(){
  $.ajax({
  url:"controller_func/estado_conexion/combo.php"
  }).done(function(info){
    $('#sltestadoconexion_filtro').empty();
    $("#sltestadoconexion_filtro").append(info);
  })
}

function combo_estado_contrato(){
  $.ajax({
  url:"controller_func/estado_contrato/combo.php"
  }).done(function(info){
    $('#sltestadocontrato_filtro').empty();
    $("#sltestadocontrato_filtro").append(info);
  })
}

function combo_estado_segmento_mkf(){
  $.ajax({
  url:"controller_func/estado_segmento_mkf/combo.php"
  }).done(function(info){
    $('#sltsegmentomkf_filtro').empty();
    $("#sltsegmentomkf_filtro").append(info);
  })
}


function combo_liderred(){
  $.ajax({
  url:"controller_func/representante_conectado/combo_lider_red.php"
  }).done(function(info){
    $('#sltliderred_filtro').empty();
    $("#sltliderred_filtro").append(info);
  })
}

$(document).on('keyup mouseleave', '#txtrep_filtro', function() {
  this.value = this.value.replace(/[^0-9]/g,'');
  var ruc=$("#txtrep_filtro").val();
  var dataString = {"ruc":ruc}
  //alert(ruc.length);
  if(ruc.trim()=="" || ruc.length<=10){
        $('#txtrep_filtro').attr('class','form-control');
        $('.msj_ruc_filtro').empty();
  }else{
    $.ajax({
    type: 'POST',
    url: 'controller_func/validar/validar_matriz_ruc.php',
    data: dataString,
    success: function(data) {
      if(data.trim()=="true"){
        $('#txtrep_filtro').attr('class','form-control is-valid');
        $('.msj_ruc_filtro').empty();
      }else{
        $('#txtrep_filtro').attr('class','form-control is-invalid');
        $('.msj_ruc_filtro').empty();
        $('.msj_ruc_filtro').append("- No Existente");
      }
      }
    });
  }
});

$(document).on('change', '#sltestadocontrato_filtro', function() {

  var estado_contrato=$("#sltestadocontrato_filtro").val();
  if(estado_contrato=="4"){
    $("#sltest_alta_filtro").val(0);
    $('#sltest_alta_filtro').select2().trigger('change');
    $('#sltest_alta_filtro').prop('disabled', true);
  }  else{
    $('#sltest_alta_filtro').prop('disabled', false);
  }
  
});



$(document).on('click', '.consult-representantes-conectados', function() {
  var URLactual = window.location.toString();
  var URLactual_;  
  URLactual_=URLactual.substr(-20);  
  if(URLactual_=="representante-hc.php"){
    list_representantes_hc();
  }else{
    list_representantes_conectados();
  }
});


//Exportar  Matriz Representante
$(document).on('click', '.report-excel-matriz-representantes', function() {
  var sltestadocontrato_filtro=$("#sltestadocontrato_filtro").val();
  var sltsegmentomkf_filtro=$("#sltsegmentomkf_filtro").val();
  var sltestadoconexion_filtro=$("#sltestadoconexion_filtro").val();
  var sltliderred_filtro=$("#sltliderred_filtro").val();
  var txtrep_filtro=$("#txtrep_filtro").val();

  var fecha_ini=""
  var fecha_fin=""
  var fecha_baja_ini="";
  var fecha_baja_fin="";
  var sltest_alta_filtro=$('#sltest_alta_filtro').val();

  if($('#check_fec_baj').is(':checked')) {
    fecha_baja_ini=$('#fecha_baja').data('daterangepicker').startDate.format('YYYY-MM-DD');
    fecha_baja_fin=$('#fecha_baja').data('daterangepicker').endDate.format('YYYY-MM-DD');
  }else{
    fecha_baja_ini="";
    fecha_baja_fin="";
  }

  if($('#check_fec_ing').is(':checked')) {
    fecha_ini=$('#txt_fecha_ingreso').data('daterangepicker').startDate.format('YYYY-MM-DD');
    fecha_fin=$('#txt_fecha_ingreso').data('daterangepicker').endDate.format('YYYY-MM-DD');
  }else{
    fecha_ini="";
    fecha_fin="";
  }
 
  //window.location.href="controller_func/representante_conectado/exportarexcel.php?est_cont_filtro="+sltestadocontrato_filtro+"&est_seg_filtro="+sltsegmentomkf_filtro+"&est_conx_filtro="+sltestadoconexion_filtro+"&lider_red_filtro="+sltliderred_filtro+"&txt_rep_filtro="+txtrep_filtro+"&fecha_ini="+fecha_ini+"&fecha_fin="+fecha_fin;
  var dataString = {"est_cont_filtro":sltestadocontrato_filtro,"est_seg_filtro":sltsegmentomkf_filtro,
  "est_conx_filtro":sltestadoconexion_filtro,"lider_red_filtro":sltliderred_filtro,
  "txt_rep_filtro":txtrep_filtro,"fecha_ini":fecha_ini,"fecha_fin":fecha_fin,"fecha_baja_ini":fecha_baja_ini,"fecha_baja_fin":fecha_baja_fin,
  "sltest_alta_filtro":sltest_alta_filtro}

  $.ajax({
    type: 'PATCH',
    url:window.location.href="controller_func/representante_conectado/exportarexcel.php?est_cont_filtro="+sltestadocontrato_filtro+"&est_seg_filtro="+sltsegmentomkf_filtro+"&est_conx_filtro="+sltestadoconexion_filtro+"&lider_red_filtro="+sltliderred_filtro+"&txt_rep_filtro="+txtrep_filtro+"&fecha_ini="+fecha_ini+"&fecha_fin="+fecha_fin+"&fecha_baja_ini="+fecha_baja_ini+"&fecha_baja_fin="+fecha_baja_fin+"&sltest_alta_filtro="+sltest_alta_filtro,
    data: dataString,
    beforeSend:function(){
      cargar_data();
      },
    complete:function(){
      Swal.close();
      },
    }).done(function(info){
      
    });
  


});


$(document).on('click', '.show-mat-rep', function() {
  var id = $(this).data('id');
  var url = "controller_func/representante_conectado/show.php?id="+id;
  $.get(url, function (data) {
    $('#frm-show-rep-con').empty();
    $('#frm-show-rep-con').append(data);
    $('#modal-show-rep-con').modal('show');
  });
});


/*Start  Tipo de Red MLM*/
//Crea a new Tipo de Red MLM
$(document).on('click', '.add-modal-tipo_red_mlm', function() {
  var id = $(this).data('id');
  var url = "controller_func/tipo_red_mlm/create.php?id="+id;
  $.get(url, function (data) {
    if(data=="session_caduco"){
      repetir_session();
    }else{
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
    }
    
  });
});
//Lista de Tipo de Red MLM
function list_tipo_red_mlms(){
    $.ajax({
    url:"controller_func/tipo_red_mlm/list.php"
    }).done(function(info){
      $('.tbody_list').empty();
      $(".tbody_list").append(info);
    })

}

//Exportar Excel Tipo de Red MLM
$(document).on('click', '.report-excel-tipo_red_mlm', function() {
      window.location.href="controller_func/tipo_red_mlm/exportarexcel.php";
});

//Exportar PDF Tipo de Red MLM
$(document).on('click', '.report-pdf-tipo_red_mlm', function() {
      window.location.href="controller_func/tipo_red_mlm/exportarpdf.php";
});

//Cargar Tipo de Red MLM
$(document).on('click', '#load-tipo_red_mlm', function() {
  list_tipo_red_mlms();
});

//Eliminar Tipo de Red MLM
$(document).on('click', '#delete-tipo_red_mlm', function() {
  var id = $(this).data('id');
  var url = "controller_func/tipo_red_mlm/accion.php?id="+id+"&es=3";
  $.get(url, function (data) {
      if(data=="delete_true"){
        $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Inactivo</td>");
        $('#itemrow_jbtn'+id).removeClass('fas fa-trash-alt').addClass('fas fa-user-check');
        $('.itemrow_jbtn'+id).attr('id','activate-tipo_red_mlm');
        $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-sm itemrow_jbtn'+id);
        $('.itemrow_jbtn'+id).attr('title', 'Activar');
        toastr.error('Se desactivo el item correctamente');
      }
  });
});

//Activar Tipo de Red MLM
$(document).on('click', '#activate-tipo_red_mlm', function() {
  var id = $(this).data('id');
  var url = "controller_func/tipo_red_mlm/accion.php?id="+id+"&es=4";
  $.get(url, function (data) {
  if(data=="activate_true"){
    $('.itemrow_h' + id).replaceWith("<td  class='itemrow_h" + id + "'>Activo</td>");
    $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-trash-alt');
    $('.itemrow_jbtn'+id).attr('id','delete-tipo_red_mlm');
    $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-sm itemrow_jbtn'+id);
    $('.itemrow_jbtn'+id).attr('title', 'Eliminar');
    toastr.success('Se activo el item correctamente');
    }
  });
});

//Show Tipo de Red MLM
$(document).on('click', '.show-modal-tipo_red_mlm', function() {
  var id = $(this).data('id');
  var url = "controller_func/tipo_red_mlm/show.php?id="+id;
  $.get(url, function (data) {
    $('#formshow').empty();
    $('#formshow').append(data);
    $('#showModal').modal('show');
  });
});

/*Add Tipo de Red MLM*/
$('.modal-footer').on('click', '.add-tipo_red_mlm', function() {
   var txtdescripcion=$("#txtdescripcion").val();
   if(txtdescripcion.trim()==""){
      $('#txtdescripcion').attr('class','form-control is-invalid');
      $('.msj_desc').empty();
      $('.msj_desc').append("- texto vacio");
      window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
    }else{
        var dataString = $('#formadd').serialize();
        $.ajax({
        type: 'POST',
        url: 'controller_func/tipo_red_mlm/accion.php',
        data: dataString,
        success: function(data){
          switch (data) {
            case "true_doble":
              $('#txtdescripcion').attr('class','form-control is-invalid');
              $('.msj_desc').empty();
              $('.msj_desc').append("- Ya existe perfil en su lista");
              window.setTimeout(function() { $('.msj_desc').html("");$('#txtdescripcion').attr('class','form-control');}, 3000);
              break;
            case "save_true":
                $('#formadd').empty();
                $('#addModal').modal('hide');
                toastr.success('Se agrego el item correctamente');
                list_tipo_red_mlms();
               break;
            case "edit_true":
                $('#formadd').empty();
                $('#addModal').modal('hide');
                toastr.success('Se modifico el item correctamente');
                list_tipo_red_mlms();
               break;
            default:
                toastr.success('Error 505');
               break;
          }

          }

        });
    }

});
/*End Tipo de Red MLM*/


//Lista de contratantes onco/auna
function list_contratantes_onco_auna(){
  $.ajax({
  url:"controller_func/contratante_onco_auna/list.php"
  }).done(function(info){
    $(".tbody_list").empty();
    $(".tbody_list").append(info);
  })
}


//Crear nuevo contratante-onco-auna
  $(document).on('click', '.add-modal-contratante-onco-auna', function() {
    var id = $(this).data('id');
    var url = "controller_func/contratante_onco_auna/create.php?id="+id;
    $.get(url, function (data) {
      $('#formadd').empty();
      $('#formadd').append(data);
      $('#addModal').modal('show');
      $('.title_u').empty();
      $('.title_u').append("<i class='far fa-user'></i> Nuevo contratante");

    });
  });

  //Cargar contratantes onco/auna
  $(document).on('click', '#load-contratante-onco-auna', function() {
    list_contratantes_onco_auna();
  });

  /*Add contratantes onco/auna */
$('.modal-footer').on('click', '.add-contratante-onco-auna', function() {

  var txtnombre=$("#txtnombre").val();
  var txtapep=$("#txtapep").val();
  var txtapem=$("#txtapem").val();
  var txtcorreo=$("#txtcorreo").val();
  var txtdni=$("#txtdni").val();
  var txttelefono=$("#txttelefono").val();
  var txtnrosol=$("#txtnrosol").val();
   if(txtnombre.trim()==""){
      $('#txtnombre').attr('class','form-control is-invalid');
      $('.msj_nom').empty();
      $('.msj_nom').append("-  escriba un nombre");
      window.setTimeout(function() { $('.msj_nom').html("");$('#txtnombre').attr('class','form-control');}, 3000);
    }else if(txtapep.trim()==""){
      $('#txtapep').attr('class','form-control is-invalid');
      $('.msj_apep').empty();
      $('.msj_apep').append("-  escriba un apellido paterno");
      window.setTimeout(function() { $('.msj_apep').html("");$('#txtapep').attr('class','form-control');}, 3000);
    }else if(txtapem.trim()==""){
      $('#txtapem').attr('class','form-control is-invalid');
      $('.msj_apem').empty();
      $('.msj_apem').append("-  escriba un apellido materno");
      window.setTimeout(function() { $('.msj_apem').html("");$('#txtapem').attr('class','form-control');}, 3000);
    }else if(txtcorreo.trim()==""){
      $('#txtcorreo').attr('class','form-control is-invalid');
      $('.msj_correo').empty();
      $('.msj_correo').append("-  escriba un correo electronico");
      window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
    }else if((regexemail.test(txtcorreo))==false){
      $('#txtcorreo').attr('class','form-control is-invalid');
      $('.msj_correo').empty();
      $('.msj_correo').append("-  escriba un correo electronico correcto");
      window.setTimeout(function() { $('.msj_correo').html("");$('#txtcorreo').attr('class','form-control');}, 3000);
    }else if(txtdni.trim()==""){
      $('#txtdni').attr('class','form-control is-invalid');
      $('.msj_dni').empty();
      $('.msj_dni').append("-  ingrese un DNI");
      window.setTimeout(function() { $('.msj_dni').html("");$('#txtdni').attr('class','form-control');}, 3000);
    }else if(txttelefono.trim()==""){
      $('#txttelefono').attr('class','form-control is-invalid');
      $('.msj_telefono').empty();
      $('.msj_telefono').append("-  ingrese un Telefono");
      window.setTimeout(function() { $('.msj_telefono').html("");$('#txttelefono').attr('class','form-control');}, 3000);
    }else if(txtnrosol.trim()==""){
      $('#txtnrosol').attr('class','form-control is-invalid');
      $('.msj_nrosol').empty();
      $('.msj_nrosol').append("-  ingrese un N° de solicitud");
      window.setTimeout(function() { $('.msj_nrosol').html("");$('#txtnrosol').attr('class','form-control');}, 3000);
    }else{
      var dataString = $('#formadd').serialize();
      $.ajax({
        type: 'POST',
        url: 'controller_func/contratante_onco_auna/accion.php',
        data: dataString,
        success: function(data) {
          switch (data) {
            case "true_doble_DNI":
              $('#txtdni').attr('class','form-control is-invalid');
              $('.msj_dni').empty();
              $('.msj_dni').append("- Ya existe DNI de contratante en su lista");
              window.setTimeout(function() { $('.msj_dni').html("");$('#txtdni').attr('class','form-control');}, 3000);
              break;
            case "save_true":
                $('#formadd').empty();
                $('#addModal').modal('hide');
                toastr.success('Se agrego el item correctamente');
                list_contratantes_onco_auna();
               break;
            case "edit_true":
                $('#formadd').empty();
                $('#addModal').modal('hide');
                toastr.success('Se modifico el item correctamente');
                list_contratantes_onco_auna();
               break;
            default:
                toastr.success('Error 505');
               break;
          }
        }
      });
    }
});


//Show contratante_onco_auna
$(document).on('click', '.show-modal-contratante-onco-auna', function() {
  var id = $(this).data('id');
  var url = "controller_func/contratante_onco_auna/show.php?id="+id;
  $.get(url, function (data) {
    $('#formshow').empty();
    $('#formshow').append(data);
    $('#showModal').modal('show');
    $('.stitle_u').empty();
    $('.stitle_u').append("<i class='far fa-user'></i> Detalle Contratante");
  });
});


//Eliminar contratante_onco_auna
$(document).on('click', '#delete-contratante-onco-auna', function() {
  var id = $(this).data('id');
  var url = "controller_func/contratante_onco_auna/accion.php?id="+id+"&es=3";
  $.get(url, function (data) {
  if(data=="delete_true"){
    $('.itemrow_h' + id).replaceWith("<td style='color:#218838' class='itemrow_h" + id + "'>Liberado</td>");
    $('#itemrow_jbtn'+id).removeClass('fas fa-user-lock').addClass('fas fa-user-check');
    $('.itemrow_jbtn'+id).attr('id','activate-contratante-onco-auna');
    $('.itemrow_jbtn'+id).attr('class','btn btn-success btn-xs btn-sm itemrow_jbtn'+id);
    $('.itemrow_jbtn'+id).attr('title', 'Activar');
    toastr.error('Se libero el item correctamente');
  }
  });
});

//Activar contratante_onco_auna
$(document).on('click', '#activate-contratante-onco-auna', function() {
  var id = $(this).data('id');
  var url = "controller_func/contratante_onco_auna/accion.php?id="+id+"&es=4";
  $.get(url, function (data) {
    if(data=="activate_true"){
    $('.itemrow_h' + id).replaceWith("<td style='color:red' class='itemrow_h" + id + "'>Activo (Ocupado)</td>");
    $('#itemrow_jbtn'+id).removeClass('fas fa-user-check').addClass('fas fa-user-lock');
    $('.itemrow_jbtn'+id).attr('id','delete-contratante-onco-auna');
    $('.itemrow_jbtn'+id).attr('class','btn btn-danger btn-xs itemrow_jbtn'+id);
    $('.itemrow_jbtn'+id).attr('title', 'Liberar');
    toastr.success('Se activo el item correctamente');
    }
  });
});

//Show solicitudes contratante_onco_auna
$(document).on('click', '.show-modal-solicitudes-contratante', function() {
  var id = $(this).data('id');
  var name = $(this).data('name');
  
  var dataString = {"id":id,"name":name};

 $.ajax({
    type: 'POST',
    url:"controller_func/contratante_onco_auna/show_solicitudes.php",
    data: dataString,
    beforeSend:function(){
      cargar_data();
      },
    complete:function(){
      Swal.close();
      },
    }).done(function(info){
      $('.show-solicitudes-contratante').empty();
      $('.show-solicitudes-contratante').append(info);
      $('.title_u_sol').empty();
      $('.title_u_sol').append("<i class='far fa-newspaper'></i> Solicitudes de "+name+" / DNI : "+id);
      $('#showModalSolicitudes').modal('show');
    });

});

/**Validacion de DNI Diners Club */
$(document).on('click', '.consult-dni-contratante-gestion', function() {
  var txtdni=$("#txtdni_gestion").val();
  var url='controller_func/validar/validar_dni_dinersclub.php';
  var dataString = {"txtdni":txtdni}  
  
  if(txtdni.trim()=="" || txtdni.length!=8){
        $('#txtdni_gestion').attr('class','form-control is-invalid');
        $('.msj-txtdni_gestion').empty();
        $('.msj-txtdni_gestion').append("- N° DNI debe ser de 8 numeros");
        window.setTimeout(function() { $('.msj-txtdni_gestion').html("");$('#txtdni_gestion').attr('class','form-control');}, 3000);
        return false;
  }else{
    $.ajax({
    type: 'POST',
    url: url,
    data: dataString,
    beforeSend:function(){     
      $('.consult-dni-contratante-gestion').html("Validando...");
      $('.consult-dni-contratante-gestion').prop('disabled', true);
      },
    complete:function(){
      $('.consult-dni-contratante-gestion').html("Consultar y validar");
      $('.consult-dni-contratante-gestion').prop('disabled', false);
      },
    }).promise().done(function(data) {      
        var content = JSON.parse(data);      
        if(content[0].en_sistema=="true"){
          $('#txtdni_gestion').attr('class','form-control is-valid');
          $('#lblestado_dni').attr('class','form-control is-valid');
          $('#lblestado_dni').empty();
          $('#lblestado_dni').append("Aprobado");
          $('#lblproducto_dni').empty();          
          $('#lblproducto_dni').append(content[0].producto);
          $('#lbltasa_dni').empty();
          $('#lbltasa_dni').append(content[0].tasapor);
        }else if(content[0].en_sistema=="false"){
          $('#txtdni_gestion').attr('class','form-control is-invalid');
          $('#lblestado_dni').attr('class','form-control is-invalid');
          $('#lblestado_dni').empty();
          $('#lblestado_dni').append("No incluido en campaña");
          $('#lblproducto_dni').empty();
          $('#lblproducto_dni').append("---");          
          $('#lbltasa_dni').empty();
          $('#lbltasa_dni').append("---");
        }
      })
  }
});