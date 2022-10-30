/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_ubigeo_peru_districts').serialize();
    var strTitulo = document.querySelector('#txt_title').value;
    
    if (strTitulo == '') 
    {
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
        type:'POST',
        url:'controller_func/ubigeo_peru_districts/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_ubigeo_peru_districts").empty();
                $("#modal-form-ubigeo-peru-districts").modal("hide");
                toastr.success("Se agrego un nuevo ubigeo_peru_districts");
                list_ubigeo_peru_districts();
                
            }else if(data.trim()=="true_update"){
                $("#form_ubigeo_peru_districts").empty();
                $("#modal-form-ubigeo-peru-districts").modal("hide");
                toastr.success("Se actualizo ubigeo_peru_districts");
                list_ubigeo_peru_districts();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------Modal SHOW vista------*/
function list_ubigeo_peru_districts()
{
    $.ajax({
        url:"controller_func/ubigeo_peru_districts/list.php"
    }).done(function(data){
        $('.table-ubigeo-peru-districts').empty();
        $('.table-ubigeo-peru-districts').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-ubigeo-peru-districts', function() {
    var id=$(this).data("id");
    var url="controller_func/ubigeo_peru_districts/create.php?id="+id;
    $.get(url, function(data){
        $("#form_ubigeo_peru_districts").empty();
        $("#form_ubigeo_peru_districts").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar ubigeo peru districts.");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo ubigeo peru districts.");
        }
        $("#modal-form-ubigeo-peru-districts").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-ubigeo-peru-districts', function() {
    var id=$(this).data("id");
    var url="controller_func/ubigeo_peru_districts/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_ubigeo_peru_districts").empty();
        $("#form_show_ubigeo_peru_districts").append(data);
        $("#form_show_ubigeo_peru_districts :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles ubigeo peru provinces");
        $("#modal-form-show-ubigeo-peru-districts").modal("show");
    })
});

$(document).on('change', '#slt_dep', function() {
    var selected=$("#slt_dep").val()
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_provinces/combo_x_dep.php',
        data:{'id_departamento_seleccionado': selected} ,
        success:function(data){  
            $('#slt_pro').html(data);
        }
    })
});