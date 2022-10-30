function list_web_ubicacion() {
    $.ajax({
        url: 'controller_func/web_ubicacion/list.php',

    }).done(function (data) {
        $('.table_web_ubicacion').html(data);
    });
}
$(document).on("click",".new_web_ubicacion",function(){
    var id = $(this).data('id');
    var url = "controller_func/web_ubicacion/create.php?id=" + id;

    $.get(url, function (data) {
        $('#form_web_ubicacion').empty();
        $('#form_web_ubicacion').append(data);

    })
    $("#modal_form-web_ubicacion").modal("show");
})
$(document).on("click","#btn_save",function(){
<<<<<<< HEAD
    var data = $("#form_web_ubicacion").serialize();
    var pais = document.querySelector('#sltpais').value;
    var dep = document.querySelector('#sltdepartamento').value;
    var prov = document.querySelector('#sltprovincia').value;
    var dist = document.querySelector('#sltdistrito').value;
    var direc = document.querySelector('#txt_direccion').value;
    var lat = document.querySelector('#txt_latitud').value;
    var long = document.querySelector('#txt_longitud').value;
    var img = document.querySelector('#txt_img').value;
    if(pais == "" || dep == "" || prov == "" || dist == "" || direc == "" || lat == "" || long == "" || 
    img == "" ){
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
=======
    // var data = $("#form_web_ubicacion").serialize();
    // var pais = document.querySelector('#sltpais').value;
    // var dep = document.querySelector('#sltdepartamento').value;
    // var prov = document.querySelector('#sltprovincia').value;
    // var dist = document.querySelector('#sltdistrito').value;
    // var direc = document.querySelector('#txt_direccion').value;
    // var lat = document.querySelector('#txt_latitud').value;
    // var long = document.querySelector('#txt_longitud').value;
    // var img = document.querySelector('#txt_img').value;
    // if(pais == "" || dep == "" || prov == "" || dist == "" || direc == "" || lat == "" || long == "" || 
    // img == "" ){
    //     toastr.error("Todos los campos son obligatorios.");
    //     return false;
    // }
    var formElement = document.getElementById("form_web_ubicacion");
    var paqueteDeDatos = new FormData(formElement);
>>>>>>> 3139a5ef66a5662297a67dd4f742f16044420dbd
    $.ajax({
        type: 'POST',
        url: 'controller_func/web_ubicacion/accion.php',
        data: paqueteDeDatos,
        contentType: false,
        cache: false,
        processData:false,
        success: function (data) {
            if (data == 'true') {
                list_web_ubicacion();
                toastr.success("Datos guardados");
                $('#modal_form-web_ubicacion').modal('hide');
            } else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
                return false;
            }
        }
    });
}) 
$(document).on("click", ".activar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "desactivar";
    var url = "controller_func/web_ubicacion/accion.php?id="+id+ "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se activo correctamente");
            list_web_ubicacion();
        } else {
            alert("Error al desactivar"+data);
        }
    })
})
$(document).on("click", ".desactivar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "activar";
    var url = "controller_func/web_ubicacion/accion.php?id=" + id + "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se desactivo correctamente");
            list_web_ubicacion();
        } else {
            alert("Error al desactivar"+data);
        }
    })
});
$(document).on("click",".new-modal-show-web_ubicacion",function() {
    var id = $(this).data('id');

    var data=$('#form_ubicacion').serialize();

    var url = "controller_func/web_ubicacion/show.php?id=" + id;
    $.get(url, function (data) {
        $('#form_ubicacion').empty();
        $('#form_ubicacion').append(data);
        $("#form_ubicacion :input").prop('disabled',true);

    });
    $("#modal-form-show-web_ubicacion").modal("show");
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