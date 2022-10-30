function list_det_com() {
    $.ajax({
        url: 'controller_func/comisiones_detalle/list.php',

    }).done(function (data) {
        $('.table_det_comisiones').html(data);
    });
}

$(document).on("click", ".new_detalle_comision", function () {
    
    var id = $(this).data('id');

    var data=$('#form_det_comision').serialize();

    var url = "controller_func/comisiones_detalle/create.php?id=" + id;
    $.get(url, function (data) {
        $('#form_det_comision').empty();
        $('#form_det_comision').append(data);

    });
    $("#modal_form-detalle").modal("show");
});

$(document).on("click", "#btn_save", function () {
    var data = $("#form_det_comision").serialize();
    var strLic = document.querySelector('#slt_rep').value;
    var id_t_lic=document.querySelector('#slt_pro').value;
    var strCod = document.querySelector('#txt_cantidad').value;
    var strStock = document.querySelector('#txt_comision').value;
    var str_sub_total=document.querySelector("#txt_subtotal").value;
    if (strLic == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (id_t_lic == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (strCod == '') 
    {
        toastr.error("T odos los campos son obligatorios.");
        return false;
    }
    else if (strStock == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if(str_sub_total == ""){
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
        url: 'controller_func/comisiones_detalle/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            if (data == 'true') {
                list_det_com();
                $('#modal_form-detalle').modal('hide');
            } else {
                alert("Error al guardar");
            }
        }
    });
});

$(document).on("click", ".desactivar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "desactivar";
    var url = "controller_func/comisiones_detalle/accion.php?id="+id+"&opcion_estado="+opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se activo correctamente");
            list_det_com();
        } else {
            alert("Error al desactivar"+data);
        }
    });
});

$(document).on("click", ".activar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "activar";
    var url = "controller_func/comisiones_detalle/accion.php?id="+id+"&opcion_estado="+opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se desactivo correctamente");
            list_det_com();
        } else {
            alert("Error al desactivar"+data);
        }
    }); 
});
$(document).on("click",".new-modal-show-detalle",function() {
    var id = $(this).data('id');

    var data=$('#form_detalle').serialize();

    var url = "controller_func/comisiones_detalle/show.php?id=" + id;
    $.get(url, function (data) {
        $('#form_detalle').empty();
        $('#form_detalle').append(data);

    });
    $("#modal-form-show-detalle").modal("show");
})