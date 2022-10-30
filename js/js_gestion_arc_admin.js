
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
//let peticion = new XMLHttpRequest();

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
    //alert(paqueteDeDatos);console.log(paqueteDeDatos);
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

/* ------ data table Mostrar Lista ------*/
function list_archivo_herramientas_negocios()
{
    $.ajax({
        url:"controller_func/archivo_herramientas_negocio/listar-archivo.php"
    }).done(function(data){
        $('.list_archivos').empty();
        $('.list_archivos').append(data);        
    })
}


/* ------ data table Mostrar Lista ------*/
function list_archivo_herramientas_negocios_archivados()
{
    $.ajax({
        url:"controller_func/archivo_herramientas_negocio/listar-archivo-archivado.php"
    }).done(function(data){
        $('.list_archivos_archivados').empty();
        $('.list_archivos_archivados').append(data);        
    })
}


/* ------ Desactivar Estado------*/
$(document).on('click', '.archivar-archivo', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"archivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/archivo_herramientas_negocio/accion-archivo.php',
        data:data,
        success:function(data){            
            if(data=="true_archivado"){
                toastr.success("Se archivo el item correctamente");
                list_archivo_herramientas_negocios_archivados();
                list_archivo_herramientas_negocios();
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.activar-archivo', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/archivo_herramientas_negocio/accion-archivo.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se archivo el item correctamente");
                list_archivo_herramientas_negocios_archivados();
                list_archivo_herramientas_negocios();
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-archivo', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/archivo_herramientas_negocio/accion-archivo.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se elimino el item correctamente");
                list_archivo_herramientas_negocios_archivados();
                list_archivo_herramientas_negocios();
            }
        }
    })
});

/**Mostrar Modal Video */
$(document).on('click', '.show-video', function() {
   var id=$(this).data("id");
   var title=$(this).data("title");
    var url="controller_func/archivo_herramientas_negocio/show-video.php?id="+id;
    $.get(url, function(data){
        $(".video-archivo").empty();
        $(".video-archivo").append(data);
        $(".title_video").empty();
        $(".title_video").append(title);       
        $('#modal-show-video').modal('show');
    })  
    var url="controller_func/archivo_herramientas_negocio/descargar-archivo.php?id="+id;
    $.get(url, function(data){
       list_archivo_herramientas_negocios_archivados();
        list_archivo_herramientas_negocios();
    }) 
    
});

/**Mostrar Modal Video */
$(document).on('click', '.descargar-archivo', function() {
    var id=$(this).data("id");
     var url="controller_func/archivo_herramientas_negocio/descargar-archivo.php?id="+id;
     $.get(url, function(data){
        list_archivo_herramientas_negocios_archivados();
                list_archivo_herramientas_negocios();
     })  
     
 });

