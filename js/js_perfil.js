$(document).on('click', '#btn_save', function() {
    var data=$('#form_perfil').serialize();
    // var strTitulo = document.querySelector('#txt_title').value;
    
    // if (strTitulo == '') 
    // {
    //     toastr.error("Todos los campos son obligatorios.");
    //     return false;
    // }
    let elementsValid = document.getElementsByClassName("valid");
    for (let i = 0; i < elementsValid.length; i++) { 
        if(elementsValid[i].classList.contains('is-invalid')) { 
            toastr.error("Atencion Por favor verifique los campos en rojo.");                
            return false;
        } 
    }
    $.ajax({
        type:'POST',
        url:'controller_func/perfil/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_update"){
                $("#form_perfil").empty();
                $("#modal-form-perfil").modal("hide");
                toastr.success("Se actualizaron los datos");
                list_perfilUsuario();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

$(document).on('click', '#fa-save-foto', function() {
    
    let elementsValid = document.getElementsByClassName("valid");  
    for (let i = 0; i < elementsValid.length; i++) { 
        if(elementsValid[i].classList.contains('is-invalid')) { 
            toastr.error("Atencion Por favor verifique los campos en rojo.");                
            return false;
        } 
    }
    var formElement = document.getElementById("form_perfil_foto"); 
    var paqueteDeDatos = new FormData(formElement);
    $.ajax({
        type:'POST',
        url:'controller_func/perfil/accion_foto_perfil.php',
        data: paqueteDeDatos,
        contentType: false,
        cache: false,
        processData:false, 
        success:function(data){
            if(data.trim()=="true_update"){               
                $("#form_perfil_foto").empty();
                $("#modal-form-perfil-foto").modal("hide");
                toastr.success("La foto se a actualizado");
                list_perfilUsuario();
                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");


            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

function list_perfilUsuario()
{
    $.ajax({
        url:"controller_func/perfil/list.php"
    }).done(function(data){
        $('.list_perfil_user').empty();
        $('.list_perfil_user').append(data);        
    })
} 

$(document).on('click', '.new-modal-perfil', function() {
    var id=$(this).data("id");
    var url="controller_func/perfil/create.php?id="+id;
    $.get(url, function(data){
        $("#form_perfil").empty();
        $("#form_perfil").append(data);
        
            $(".modal-title").empty();
            $(".modal-title").append("Editar datos personales");

        $("#modal-form-perfil").modal("show");
    })
});

$(document).on('click', '.new-modal-perfil-foto', function() {
    var id=$(this).data("id");
    var url="controller_func/perfil/uddate_foto_perfil.php?id="+id;
    $.get(url, function(data){
        $("#form_perfil_foto").empty();
        $("#form_perfil_foto").append(data);
        
            $(".modal-title").empty();
            $(".modal-title").append("Actualizar foto");

        $("#modal-form-perfil-foto").modal("show");
    })
});

//obtener "value"-----------------------------------------------------------------------------------------------------------------------

$(document).on('change', '#slt_dep', function() {
    var selected=$("#slt_dep").val()
    $("#slt_dist").find('option').remove().end().append('<option value="0">SELECCIONE DISTRITO</option>').val('0');
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_provinces/combo_x_dep.php',
        data:{'id_departamento_seleccionado': selected} ,
        success:function(data){  
            $('#slt_prov').html(data);
        }
    })
});
//obtener "value"
$(document).on('change', '#slt_prov', function() {    
    var selected = $("#slt_prov").val();
    $.ajax({
        type:'POST',
        url:'controller_func/ubigeo_peru_districts/combo_x_prov.php',
        data:{'id_provincia_seleccionado': selected} ,
        success:function(data){
            $('#slt_dist').html(data);
        }
    })
});