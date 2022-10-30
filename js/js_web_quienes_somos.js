// Imagen portada Quienes somos
$(document).on('click', '.new_img_portada', function() {
    var url="controller_func/web_quienes_somos/show_portada.php";
    $.get(url, function(data){
        $("#form_imagen_portada").empty();
        $("#form_imagen_portada").append(data);
        $(".modal-title").empty();
        $(".modal-title").append("Imagen portada quienes somos");
        $("#modal_imagen_portada").modal("show");
    })
});

// Subir foto ---------------------------------------------------------------------
$(document).on('click', '.cargar_img_portada', function() {
    var url="controller_func/web_quienes_somos/cargar_portada.php";
    $.get(url, function(data){
        $("#form_cargar_portada").empty();
        $("#form_cargar_portada").append(data);
        $(".modal-title").empty();
        $(".modal-title").append("Cargar imagen");
        $("#modal_form-cargar_portada").modal("show");
    })
});

function list_web_quienes_somos(){
    $.ajax({
        url: 'controller_func/web_quienes_somos/list.php',

    }).done(function (data) {
        $('.table_web_quienes_somos').html(data);
    });
}
$(document).on("click",".new_web_quienes_somos",function(){
    var id = $(this).data('id');
    var url = "controller_func/web_quienes_somos/create.php?id=" + id;

    $.get(url, function (data) {
        $('#form_web_quienes_somos').empty();
        $('#form_web_quienes_somos').append(data);

    })
    $("#modal_form-web_quienes_somos").modal("show");
})
$(document).on("click","#btn_save",function(){
    var data = $("#form_web_quienes_somos").serialize();
    var titulo = document.querySelector("#txt_titulo").value;
    var imagen_p = document.querySelector("#txt_imagen_p").value;
    var imagen = document.querySelector("#txt_imagen").value;
    var subtitulo = document.querySelector("#txt_subtitulo").value;
    var parrafo = document.querySelector("#txt_parrafo").value;
    var icono = document.querySelector("#txt_icono").value;
    if(titulo == ""||imagen_p == ""||imagen == ""||subtitulo == ""||parrafo == ""||icono==""){
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
        url: 'controller_func/web_quienes_somos/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            if (data == 'true') {
                list_web_quienes_somos();
                toastr.success("Datos guardados");
                $('#modal_form-web_quienes_somos').modal('hide');
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
    var url = "controller_func/web_quienes_somos/accion.php?id="+id+ "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se activo correctamente");
            list_web_quienes_somos();
        } else {
            alert("Error al desactivar"+data);
        }
    })
})
$(document).on("click", ".desactivar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "desactivar";
    var url = "controller_func/web_quienes_somos/accion.php?id=" + id + "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se desactivo correctamente");
            list_web_quienes_somos();
        } 
    })
});
$(document).on("click",".new-modal-show-web_quienes_somos",function() {
    var id = $(this).data('id');

    var data=$('#form_quienes_somos').serialize();

    var url = "controller_func/web_quienes_somos/show.php?id=" + id;
    $.get(url, function (data) {
        $('#form_quienes_somos').empty();
        $('#form_quienes_somos').append(data);
        $("#form_quienes_somos :input").prop('disabled',true);

    });
    $("#modal-form-show-web_quienes_somos").modal("show");
})