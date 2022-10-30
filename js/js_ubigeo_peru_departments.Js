/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_ubigeo_peru_departments').serialize();
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
        url:'controller_func/ubigeo_peru_departments/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_ubigeo_peru_departments").empty();
                $("#modal-form-ubigeo-peru-departments").modal("hide");
                toastr.success("Se agrego un nuevo ubigeo_peru_departments");
                list_ubigeo_peru_departments();
                
            }else if(data.trim()=="true_update"){
                $("#form_ubigeo_peru_departments").empty();
                $("#modal-form-ubigeo-peru-departments").modal("hide");
                toastr.success("Se actualizo ubigeo_peru_departments");
                list_ubigeo_peru_departments();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------Modal SHOW vista------*/
function list_ubigeo_peru_departments()
{
    $.ajax({
        url:"controller_func/ubigeo_peru_departments/list.php"
    }).done(function(data){
        $('.table-ubigeo-peru-departments').empty();
        $('.table-ubigeo-peru-departments').append(data);        
    })
} 

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-ubigeo-peru-departments', function() {
    var id=$(this).data("id");
    var url="controller_func/ubigeo_peru_departments/create.php?id="+id;
    $.get(url, function(data){
        $("#form_ubigeo_peru_departments").empty();
        $("#form_ubigeo_peru_departments").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar ubigeo peru departments.");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo ubigeo peru departments.");
        }
        $("#modal-form-ubigeo-peru-departments").modal("show");
    })
});

/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-ubigeo-peru-departments', function() {
    var id=$(this).data("id");
    var url="controller_func/ubigeo_peru_departments/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_ubigeo_peru_departments").empty();
        $("#form_show_ubigeo_peru_departments").append(data);
        $("#form_show_ubigeo_peru_departments :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles ubigeo peru departments");
        $("#modal-form-show-ubigeo-peru-departments").modal("show");
    })
});
