$(document).on('click', '.switch_permiso', function() {
    var id=$(this).data("id");
    var desc=$(this).data("desc");
    var id_rol=$(this).data("idrol");
    var estado_switch_permiso="nada";   

    switch (desc) {
        case "ver":      
            var estado_switch_permiso=$('input:checkbox[name=customSwitch1'+id+']:checked').val();      
            break;
        case "crear":
            var estado_switch_permiso=$('input:checkbox[name=customSwitch2'+id+']:checked').val(); 
            break;
        case "actualizar":
            var estado_switch_permiso=$('input:checkbox[name=customSwitch3'+id+']:checked').val(); 
            break;
        case "eliminar":
            var estado_switch_permiso=$('input:checkbox[name=customSwitch4'+id+']:checked').val(); 
            break;
    }
    
    var data={"id_mod":id,"id_rol":id_rol,"desc":desc,"estado_switch_permiso":estado_switch_permiso};

    $.ajax({
        type:'POST',
        url:'controller_func/permiso/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true"){
                toastr.success("Se actualizo el item correctamente");
            }
        }
    })   
   
});


/* ------Modal SHOW permisos------*/
$(document).on('click', '.new-modal-show-permisos', function() {
    var id=$(this).data("id");
    var url="controller_func/permiso/list_create.php?id="+id;
    $.get(url, function(data){
        $("#form_permiso").empty();
        $("#form_permiso").append(data);
        $(".modal-title").empty();
        $(".modal-title").append("Permisos de roles");
        $("#modal-form-permiso").modal("show");
    })
});