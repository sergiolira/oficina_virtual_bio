/*Tiempo Carga de Datos*/
function cargar_data(){
    let timerInterval
    Swal.fire({
      title: 'Creando Tabla de Datos',
      html: 'Cargando... <b></b>',
      timer: timerInterval,
      onBeforeOpen: () => {
        Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer
  
      ) {
        console.log('Estaba cerrado por el temporizador')
      }
    })
} 

/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    /*var data=$('#form_usuario').serialize();
    var strId_persona = document.querySelector('#id').value;
    var strNombres = document.querySelector('#txt_name').value;
    var strApellidop = document.querySelector('#txt_app').value;
    var strApellidom = document.querySelector('#txt_apm').value;
    var strTelefono = document.querySelector('#txt_tel').value;
    var strCorreo = document.querySelector('#txt_email').value;
    var strPassword = document.querySelector('#txt_password').value;
    var strRol = document.querySelector('#slt_rol').value;
    
    if (strNombres == '' || strApellidop == '' | strApellidom == '' | strTelefono == '' | strCorreo == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    if (strRol == '') 
    {
        toastr.error("Por favor seleccione un Rol.");
        return false;
    }
    if (strId_persona == 0) 
    {
        if (strPassword == '') 
        {
            toastr.error("Por favor ingrese un password.");
            return false;
        }
    }*/
    let elementsValid = document.getElementsByClassName("valid");  
    for (let i = 0; i < elementsValid.length; i++) { 
        if(elementsValid[i].classList.contains('is-invalid')) { 
            toastr.error("Atencion Por favor verifique los campos en rojo.");                
            return false;
        } 
    }
    var formElement = document.getElementById("form_usuario");
    var paqueteDeDatos = new FormData(formElement);
    $.ajax({
        type:'POST',
        url:'controller_func/usuario/accion.php',
        data: paqueteDeDatos,
        contentType: false,
        cache: false,
        processData:false, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_usuario").empty();
                $("#modal-form-usuario").modal("hide");
                toastr.success("Se creo un nuevo usuario");
                list_usuarios();
                
            }else if(data.trim()=="true_update"){
                $("#form_usuario").empty();
                $("#modal-form-usuario").modal("hide");
                toastr.success("Se actualizo el usuario");
                list_usuarios();                

            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");


            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------ data table Mostrar Lista ------*/
function list_usuarios()
{
    $.ajax({
        url:"controller_func/usuario/list.php"
    }).done(function(data){
        $('.table-usuarios').empty();
        $('.table-usuarios').append(data);        
    })
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-usuario', function() {
    var id=$(this).data("id");
    var url="controller_func/usuario/create.php?id="+id;
    $.get(url, function(data){
        $("#form_usuario").empty();
        $("#form_usuario").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar usuario");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo usuario");
        }
        $("#modal-form-usuario").modal("show");
    })
});


/* ------Modal SHOW vista------*/
$(document).on('click', '.new-modal-show-usuario', function() {
    var id=$(this).data("id");
    var url="controller_func/usuario/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_usuario").empty();
        $("#form_show_usuario").append(data);
        $("#form_show_usuario :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles del usuario");
        $("#modal-form-show-usuario").modal("show");
    })
});

/* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/usuario/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_activado"){
                toastr.success("Se activo el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_item"+id).removeClass('btn btn-sm btn-success activar-item').addClass('btn btn-sm btn-danger desactivar-item');
                $("#icon_item"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactiar Estado------*/
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/usuario/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_desactivado"){
                toastr.success("Se desactivo el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_item"+id).removeClass('btn btn-sm btn-danger desactivar-item').addClass('btn btn-sm btn-success activar-item');
                $("#icon_item"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
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


//Exportar Excel-----------------------------------------------------------------------------------------------------------------------

$(document).on('click', '.exportar-excel-usuario', function() {
    $.ajax({
        type:'POST',
        url:"controller_func/usuario/exportar_excel.php",   
        dataType:'json',
        beforeSend:function(){
            cargar_data();
            },
        complete:function(){
            Swal.close();
            },
        }).done(function(data){
            var $a = $("<a>");
            $a.attr("href",data.file);
            $("body").append($a);
            $a.attr("download",data.namearchivo+".xlsx");
            $a[0].click();
            $a.remove();
        });
});

