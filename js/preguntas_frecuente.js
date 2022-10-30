/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_preguntas_frecuente').serialize();
    var strpregunta = document.querySelector('#txt_preg').value;
    var strcategoria = document.querySelector('#slt_catf').value;
    
    if (strpregunta == '' || strcategoria == '' ) 
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
        url:'controller_func/preguntas_frecuente/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_preguntas_frecuente").empty();
                $("#modal-form-preguntas").modal("hide");
                toastr.success("Se agrego Una nueva pregunta");
                list_preguntas_frecuente();
                
            }else if(data.trim()=="true_update"){
                $("#form_preguntas_frecuente").empty();
                $("#modal-form-preguntas").modal("hide");
                toastr.success("Se actualizo la modalidad de pago");
                list_preguntas_frecuente();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});
 
/* ------ data table Mostrar Lista ------*/
function list_preguntas_frecuente() 
{
    $.ajax({
        url:"controller_func/preguntas_frecuente/list.php"
    }).done(function(data){
        $('.list_preguntas_frecuente').empty();
        $('.list_preguntas_frecuente').append(data);        
    })
}

function list_historial_respuesta() 
{
    $.ajax({
        url:"controller_func/preguntas_frecuente/historial_respuesta.php"
    }).done(function(data){
        $('.table-preguntas-frecuente').empty();
        $('.table-preguntas-frecuente').append(data);        
    })
}

/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-preguntas', function() {
    var id=$(this).data("id");
    var url="controller_func/preguntas_frecuente/create.php?id="+id;
    $.get(url, function(data){
        $("#form_preguntas_frecuente").empty();
        $("#form_preguntas_frecuente").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar pregunta");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nueva pregunta");
        }
        $("#modal-form-preguntas").modal("show");
    })
});

$(document).on('click', '.new-modal-show-preguntas', function() {
    var id=$(this).data("id");
    var url="controller_func/preguntas_frecuente/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_preguntas").empty();
        $("#form_show_preguntas").append(data);
        $("#form_show_preguntas :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles pregunta frecuente");
        $("#modal-form-show-preguntas").modal("show");
    })
});

$(document).on('click', '.new-modal-categoria', function() {
    document.getElementById('btn_save').disabled = true;
    var id=$(this).data("id");
    var url="controller_func/categoria_preguntas_frecuente/create.php?id="+id;
    $.get(url, function(data){
        $("#form_categoria_preguntas").empty();
        $("#form_categoria_preguntas").append(data);
        if(id>0){
            $(".modal-title").empty();
            $(".modal-title").append("Modificar pregunta");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nueva pregunta");
        }
        $("#modal-form-categoria").modal("show");
    })
});



