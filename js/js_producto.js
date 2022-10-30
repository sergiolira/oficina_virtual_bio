/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_save', function() {
    var data=$('#form_producto').serialize();

    var strNombreProduto = document.querySelector('#txt_Nombre_producto').value;
    var strDesc = document.querySelector('#txt_desc').value;
    var strprecio = document.querySelector('#txt_precio_anterior').value;
    var strStock = document.querySelector('#txt_stock').value;
    var strPreciopagar = document.querySelector('#txt_precio_nuevo').value;
    var strtipoproducto = document.querySelector('#slt_tipo_producto').value;
    var strMarca = document.querySelector('#slt_marca_producto').value;
    var strPeso = document.querySelector('#txt_peso').value;
    var strtipoPeso = document.querySelector('#slt_tipo_peso').value;
    var strcategoria = document.querySelector('#slt_cp').value;
    var strsubcategoria = document.querySelector('#slt_scp').value;
    
    if (strNombreProduto == '') 
    {
        toastr.error("Ingrese un nombre para el producto.");
        return false;
    }
    if (strDesc == '' ) 
    {
        toastr.error("Agregue una descripcion del producto.");
        return false;
    }
    if (strprecio == '' ) 
    {
        toastr.error("Ingrese precio o monto del producto.");
        return false;
    }
    if (strStock == '') 
    {
        toastr.error("Ingrese la cantidad de Stock.");
        return false;
    }
    if (strPreciopagar == '') 
    {
        toastr.error("El campo precio pagar no debe estar vacio.");
        return false;
    }
    if (strtipoproducto == '' || strMarca == '' || strPeso == '' || strtipoPeso == '' || strcategoria == '' 
    || strsubcategoria == '') 
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
        url:'controller_func/producto/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="true_create"){               
                $("#form_producto").empty();
                $("#modal-form-producto").modal("hide");
                toastr.success("Se agrego un producto"); 
                list_producto();
                
            }else if(data.trim()=="true_update"){
                $("#form_producto").empty();
                $("#modal-form-producto").modal("hide");
                toastr.success("Se actualizo producto");
                list_producto();                
            }else if(data.trim()=="error_datos"){
                toastr.error("Por favor valide la informacion ingresada, Datos incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

/* ------Modal lista------*/
function list_producto()
{
    $.ajax({
        url:"controller_func/producto/list.php"
    }).done(function(data){
        $('.table-producto').empty();
        $('.table-producto').append(data);        
    })
} 


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.new-modal-producto', function() {
    var id=$(this).data("id");
    var url="controller_func/producto/create.php?id="+id;
    $.get(url, function(data){
        $("#form_producto").empty();
        $("#form_producto").append(data);
        if(id>0){
            document.querySelector("#divBarcode").classList.remove("notblock");
            fntBarcode();
            $(".modal-title").empty();
            $(".modal-title").append("Modificar producto");
        }else{
            $(".modal-title").empty();
            $(".modal-title").append("Nuevo producto");
        }
        $("#modal-form-producto").modal("show");
    })
});

/* ------Modal SHOW Producto------*/

$(document).on('click', '.new-modal-show-producto', function() {
    var id=$(this).data("id");
    var url="controller_func/producto/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_producto").empty();
        $("#form_show_producto").append(data);
        document.querySelector("#divBarcode").classList.remove("notblock");
        fntBarcode();
        $("#form_show_producto :input").prop('disabled',true);
        $(".modal-title").empty();
        $(".modal-title").append("Detalles producto");
        $("#modal-form-show-producto").modal("show");
    })
});
// Subir foto ---------------------------------------------------------------------
$(document).on('click', '.btnAddImage', function() {
    var id=$(this).data("id");
    var url="controller_func/producto/cargar_fotos.php?id="+id;
    $.get(url, function(data){
        $("#form_fotos").empty();
        $("#form_fotos").append(data);
        document.querySelector("#divBarcode").classList.remove("notblock");
        fntBarcode();
        $(".modal-title-foto").empty();
        $(".modal-title-foto").append("Cargar foto");

        $("#modal-form-fotos").modal("show");
    })
});

 /* ------ Eliminar foto ------*/
 $(document).on('click', '.btnDeleteImage', function() {
    var id=$(this).data("id");    
    var data={"id":id,"foto":"eliminar"};
    $.ajax({
        type:'POST',
        url:'controller_func/producto/accion.php',
        data:data,
        success:function(data){            
            if(data.trim()=="true_eliminado"){
                toastr.success("Se elimino la imagen");
                obtener_fotos();
                
            }
        }
    })
});

function obtener_fotos() {
    var id = $("#id").val();
    if (id > 0){
        $.ajax({
            url: "controller_func/producto/list_fotos.php",
            type: "post",
            data: { "id": id },
            success: function(data){
                $('#containerImage').html(data);
            }
        })

    } else {
        toastr.error("Lista no pudo ser cargada correctamente.");
        
    }
    
}

$(document).on('click', '#btn_save-fotos', function() {
    var data=$('#form_fotos').serializeArray();
    
    var formElement = document.getElementById("form_fotos"); 
    var paqueteDeDatos = new FormData(formElement);
    $.ajax({
        type:'POST',
        url:'controller_func/producto/accion_fotos.php',
        data: paqueteDeDatos,
        beforeSend: function(){
            $("#id").val(data[0].value);
        },
        contentType: false,
        cache: false,
        processData:false, 
        success:function(data){
            if(data.trim()=="true_foto_producto"){  
                obtener_fotos();             
                $("#form_fotos").empty();
                $("#modal-form-fotos").modal("hide");
                $("#modal-form-producto").modal("show");
                toastr.success("Foto guardada");
                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        } 
    })
});

//obtener "Sub Categoria "-----------------------------------------------------------------------------------------------------------------------

$(document).on('change', '#slt_cp', function() {    
    var selected = $("#slt_cp").val();
    $.ajax({
        type:'POST',
        url:'controller_func/sub_categoria_producto/combo_x_categoria.php',
        data:{'id_categoria_seleccionado': selected} ,
        success:function(data){
            $('#slt_scp').html(data);
        }
    })
});


// BARCODE Codigo de Barra-----------------------------------------------------------------------------------------------------------------------

  function fntBarcode(){
     let codigo = document.querySelector("#txt_codigo_barra").value;
     JsBarcode("#barcode", codigo);
  }

  function fntPrintBarcode(area){
     let elementArea = document.querySelector(area);
     let vprint = window.open(' ', 'popimpr', 'heigth=400,width=600');
     vprint.document.write(elementArea.innerHTML );
     vprint.document.close();
     vprint.print();
     vprint.close();

  }

//  Calculo de porcentaje-----------------------------------------------------------------------------------------------------------------------

 function calcularPorcentaje() {
    let valid = document.querySelectorAll(".validpre");
    valid.forEach(function(valid){
        valid.addEventListener('keyup', function(){
            let nuevo = document.getElementById("txt_precio_nuevo");
            let actual = document.getElementById("txt_precio_anterior");
            let result = 0;
            let porcentaje = "";
            let promedio = "";

            promedio = (parseInt(nuevo.value) * parseInt(100) / parseInt(actual.value));
            porcentaje = (parseInt(100) - parseInt(promedio));
            result = porcentaje;
            if (result>0) {
                document.getElementById("txt_descuento").value = result;
            } else {
                document.getElementById("txt_descuento").value = 0;
            }
        });
    });

 }
 function calcularprecio() {
    let valid = document.getElementById("txt_descuento");
    valid.addEventListener('keyup', function(){
        let descuento = document.getElementById("txt_descuento");
        let actual = document.getElementById("txt_precio_anterior");

        let valorDescuento = "";
        let PrecioNuevo = "";

        valorDescuento = (parseInt(actual.value) * (parseInt(descuento.value) / parseInt(100)));
        PrecioNuevo = (parseInt(actual.value) - parseInt(valorDescuento));

        if (PrecioNuevo>0) {
            document.getElementById("txt_precio_nuevo").value = PrecioNuevo;
        } else {
            document.getElementById("txt_precio_nuevo").value = " ";
        }
    });

 }

 /* ------ Activar Estado------*/
$(document).on('click', '.activar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/producto/accion.php',
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

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-item', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/producto/accion.php',
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







