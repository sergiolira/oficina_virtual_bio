function list_web_mensaje(){
    $.ajax({
        url: 'controller_func/web_mensaje_contacto/list.php',

    }).done(function (data) {
        $('.table_web_mensaje').html(data);
    });
}
$(document).on("click",".new_web_mensaje",function(){
    var id = $(this).data('id');
    var url = "controller_func/web_mensaje_contacto/create.php?id=" + id;

    $.get(url, function (data) {
        $('#form_web_mensaje').empty();
        $('#form_web_mensaje').append(data);

    })
    $("#modal_form-web_mensaje").modal("show");
})

$(document).on("click","#btn_save",function(){
    var data = $("#form_web_mensaje").serialize();
    var nomb = document.querySelector("#txt_nom").value;
    var cor = document.querySelector("#txt_correo").value;
    var cel = document.querySelector("#txt_celular").value;
    var men = document.querySelector("#txt_mensaje").value;
    if(nomb == "" || cor == "" || cel == "" || men == ""){
        toastr.error("Todos los campos son obligatorios");
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
        url: 'controller_func/web_mensaje_contacto/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            if (data == 'true') {
                list_web_mensaje();
                toastr.success("Datos guardados");
                $('#modal_form-web_mensaje').modal('hide');
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
    var opcion_estado = "activar";
    var url = "controller_func/web_mensaje_contacto/accion.php?id="+id+ "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se activo correctamente");
            list_web_mensaje();
        } else {
            alert("Error al desactivar"+data);
        }
    })
})
$(document).on("click", ".desactivar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "desactivar";
    var url = "controller_func/web_mensaje_contacto/accion.php?id=" + id + "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se desactivo correctamente");
            list_web_mensaje();
        } else {
            alert("Error al desactivar"+data);
        }
    })
});
