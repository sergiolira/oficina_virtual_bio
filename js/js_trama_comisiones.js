function list_trama_com() {
    $.ajax({
        url: 'controller_func/comisiones_trama/list.php',

    }).done(function (data) {
        $('.table_trama_comisiones').html(data);
    });
}
$(document).on("click",".new_trama_comision",function(){
    var id = $(this).data('id');
    var url = "controller_func/comisiones_trama/create.php?id=" + id;
    $.get(url, function (data) {
        $('#form_trama_comision').empty();
        $('#form_trama_comision').append(data);

    })
    $("#modal_form-trama").modal("show");
});
$(document).on("click", "#btn_save", function () {
    var data = $("#form_trama_comision").serialize();
    var stl_pro = document.querySelector('#slt_pro').value;
    var cantidad  = document.querySelector('#txt_cantidad').value;
    var tipo_comision  = document.querySelector('#slt_tip').value;
    var comision  = document.querySelector('#txt_comision').value;
    if(stl_pro == "" || cantidad == "" || tipo_comision == "" || comision == ""){
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
    $.ajax({
        url: 'controller_func/comisiones_trama/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            if (data == 'true') {
                list_trama_com();
                $('#modal_form-trama').modal('hide');
                toastr.success("Datos guardados correctamente");
            } else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
                return false;
            }
        }
    });
});
$(document).on("click", ".desactivar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "desactivar";
    var url = "controller_func/comisiones_trama/accion.php?id="+id+"&opcion_estado="+opcion_estado;

    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se desactivo correctamente");
            list_trama_com();
        } 
    });
});

$(document).on("click", ".activar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "activar";
    var url = "controller_func/comisiones_trama/accion.php?id="+id+"&opcion_estado="+opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se activo correctamente");
            list_trama_com();
        } 
    }); 
});
$(document).on("click",".new-modal-show-trama",function () {
    var id = $(this).data('id');
    var url = "controller_func/comisiones_trama/show.php?id=" + id;
    $.get(url, function (data) {
        $('#form_show_trama_comisiones').empty();
        $('#form_show_trama_comisiones').append(data);
        $('#form_show_trama_comisiones :input').prop('disabled',true);
    })
    $("#modal-form-show-trama").modal("show");
})
