function list_comision() {
    $.ajax({
        url: 'controller_func/tipo_comision/list.php',

    }).done(function (data) {
        $('.table_tipo_comision').html(data);
    });
}
$(document).on("click",".new_tipo_comision",function(){
    var id = $(this).data('id');
    var url = "controller_func/tipo_comision/create.php?id=" + id;
    $.get(url, function (data) {
        $('#form_tipo_comision').empty();
        $('#form_tipo_comision').append(data);

    })
    $("#modal_form-tipo-comision").modal("show");
});
$(document).on("click", "#btn_save", function () {
    var data = $("#form_tipo_comision").serialize();
    $.ajax({
        url: 'controller_func/tipo_comision/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            if (data == 'true') {
                list_comision();
                toastr.success("Datos guardados");
                $('#modal_form-tipo-comision').modal('hide');
            } 
        }
    });
});
$(document).on("click", ".desactivar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "desactivar";
    var url = "controller_func/tipo_comision/accion.php?id="+id+"&opcion_estado="+opcion_estado;

    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Estado desactivado");
            list_comision();
        } 
    });
});

$(document).on("click", ".activar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "activar";
    var url = "controller_func/tipo_comision/accion.php?id="+id+"&opcion_estado="+opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Estado Activado");
            list_comision();
        } 
    }); 
});