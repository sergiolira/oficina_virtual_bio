$(document).on("click", ".new_cabecera_comision", function () {
    var id = $(this).data('id');
    var url = "controller_func/comisiones/Create.php?id=" + id;

    $.get(url, function (data) {
        $('#form_comision').empty();
        $('#form_comision').append(data);

    })
    $("#modal_form-cabecera").modal("show");
})
function list_cab_com() {
    $.ajax({
        url: 'controller_func/comisiones/list.php',

    }).done(function (data) {
        $('.table_cabecera_comisiones').html(data);
    });
}
$(document).on("click", "#btn_save", function () {
    var data = $("#form_comision").serialize();
    var txt_representante = document.querySelector('#txt_representante').value;
    var text_correo = document.querySelector('#text_correo').value;
    var txt_num_document = document.querySelector('#txt_num_document').value;
    var txt_comision = document.querySelector('#txt_comision').value;
    var txt_anio = document.querySelector('#txt_anio').value;
    var txt_mes = document.querySelector('#txt_mes').value;
    var txt_sem_inicio = document.querySelector('#txt_sem_inicio').value;
    var txt_sem_fin = document.querySelector('#txt_sem_fin').value;
    var txt_sem_det = document.querySelector('#txt_sem_det').value;
    if(txt_representante==""||
        text_correo==""||
        txt_num_document==""||
        txt_comision==""||
        txt_anio==""||
        txt_mes==""||
        txt_sem_inicio==""||
        txt_sem_fin==""||
        txt_sem_det==""){
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
        url: 'controller_func/comisiones/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            if (data == 'true') {
                list_cab_com();
                $('#modal_form-cabecera').modal('hide');
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
$(document).on("click", ".activar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "desactivar";
    var url = "controller_func/comisiones/accion.php?id="+id+ "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se activo correctamente");
            list_cab_com();
        } else {
            alert("Error al desactivar"+data);
        }
    })
})
$(document).on("click", ".desactivar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "activar";
    var url = "controller_func/comisiones/accion.php?id=" + id + "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se desactivo correctamente");
            list_cab_com();
        } else {
            alert("Error al desactivar"+data);
        }
    })
});
$(document).on("click",".new-modal-show-cabecera",function(){
    var id = $(this).data('id');
    var url = "controller_func/comisiones/show.php?id=" + id;
    $.get(url, function (data) {
        $('#form_cab_comisiones').empty();
        $('#form_cab_comisiones').append(data);
        $('#form_cab_comisiones :input').prop('disabled',true);

    })
    $("#modal-form-show-cabecera").modal("show");
})