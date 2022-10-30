/**Modal de Registro */
$(document).on('click', '.add-modal-registro', function() {
    var id=$(this).data("id");
    var url="controller_func/archivo_herramientas_negocio/create-archivo.php?id="+id;
    $.get(url, function(data){
        $("#form-registro-archivo").empty();
        $("#form-registro-archivo").append(data);
        if(id>0){
            $(".title_hneg").empty();
            $(".title_hneg").append("Modificar");
        }else{
            $(".title_hneg").empty();
            $(".title_hneg").append("Nuevo");
        }
        $('#modal-registro-archivo').modal('show');
    })    
});



/* ------ Crear y actualizar ------*/
let peticion = new XMLHttpRequest();

$(document).on('click', '#save-registro-archivo', function() {
   

    /*var slt_scol = document.querySelector('#slt_scol').value;
    var slt_tinf = document.querySelector('#slt_tinf').value;
    var slt_tiar = document.querySelector('#slt_tiar').value;
    var slt_mco = document.querySelector('#slt_mco').value;
    */
    let elementsValid = document.getElementsByClassName("valid");
        for (let i = 0; i < elementsValid.length; i++) { 
            if(elementsValid[i].classList.contains('is-invalid')) { 
                toastr.error("Atencion Por favor verifique los campos en rojo.");                
                return false;
            } 
        }

    var formElement = document.getElementById("form-registro-archivo");
    var paqueteDeDatos = new FormData(formElement);
    $.ajax({
        type: 'POST',
        url: "controller_func/archivo_herramientas_negocio/accion-archivo.php",
        data: paqueteDeDatos,
        contentType: false,
        cache: false,
        processData:false,
        success:function(data){            
            if(data=="true_create"){               
                $("#form-registro-archivo").empty();
                $("#modal-registro-archivo").modal("hide");
                toastr.success("Se creó la herramienta");
                list_archivo_herramientas_negocios();
                
            }else if(data=="true_update"){
                $("#form-registro-archivo").empty();
                $("#modal-registro-archivo").modal("hide");
                toastr.success("Se actualizó la herramienta");
                list_archivo_herramientas_negocios();                
            }else{
                toastr.error("No se grabó los datos correctamente");
            }
        }
    })
});