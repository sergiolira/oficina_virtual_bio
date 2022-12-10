/* ------ Crear y actualizar ------*/
$(document).on('click', '#btn_gr_c', function() {
   
    var data=$('#form_r_c').serialize();
    
    var id_pro=document.querySelector('#slt_pro').value;
    var id_div=document.querySelector('#slt_div').value;
    var srtCantidad=document.querySelector('#txt_can').value;
    var strPre_u=document.querySelector('#txt_p_u').value;
    var strSub_t = document.querySelector('#txt_s_t').value;
    var strF_i = document.querySelector('#txt_f_i').value;
    
    
    
    
    
    if (id_pro == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (id_div == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }else if (srtCantidad == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (strPre_u == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (strSub_t == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }
    else if (strF_i == '') 
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
        url:'controller_func/registro_compra/accion.php',
        data:data,
        success:function(data){   
            
            if(data.trim()=="true_create"){               
                $("#form_r_c").empty();
                $("#modal-form-r_c").modal("hide");
                toastr.success("Se creó el registro de compra");
                list_registro_compra();
                
            }else if(data.trim()=="true_update"){
                $("#form_r_c").empty();
                $("#modal-form-r_c").modal("hide");
                toastr.success("Se actualizó el registro de compra");
                list_registro_compra();                
            }else if(data.trim()=="incorrectos"){
                toastr.error("Por favor valide los campos los datos ingresados son incorrectos.");
            }else{
                toastr.error("No se guardaron correctamente los datos.");
            }
        }
    })
});
//mostrar listaa
function list_registro_compra()
{   
    
    $.ajax({
        url:"controller_func/registro_compra/list.php"
    }).done(function(data){
        $('.table_r_c').empty();
        $('.table_r_c').append(data);        
    });
}


/* ------Modal formulario Crear y Editar------*/
$(document).on('click', '.nuevo_r_c_modal', function() {
   
    var id=$(this).data("id");
    var url="controller_func/registro_compra/create.php?id="+id;
    $.get(url, function(data){
        $("#form_r_c").empty();
        $("#form_r_c").append(data);
        if(id>0){
            $(".title_r_c").empty();
            $(".title_r_c").append("Modificar registro de compra");
        }else{
            $(".title_r_c").empty();
            $(".title_r_c").append("Nuevo registro de compra");
        }
        $("#modal-form-r_c").modal("show");
    })
});
/* ------Modal SHOW vista------*/
$(document).on('click', '.show_r_c_modal', function() {
    var id=$(this).data("id");
    
    var url="controller_func/registro_compra/show.php?id="+id;
    $.get(url, function(data){
        $("#form_show_r_c").empty();
        $("#form_show_r_c").append(data);
        $("#form_show_r_c :input").prop('disabled',true);
        $("#modal-show-r_c").modal("show");
    })
});


/* ------ Activar Estado------*/
$(document).on('click', '.activar-r_c', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"activar"};
    $.ajax({
        type:'POST',
        url:'controller_func/registro_compra/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_activado"){
                toastr.success("Se activó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-success' id='td_estado"+id+"'>Activo</td>");
                $("#btn_r_c"+id).removeClass('btn btn-sm btn-success activar-r_c').addClass('btn btn-sm btn-danger desactivar-r_c');
                $("#icon_r_c"+id).removeClass('fas fa-user-check').addClass('far fa-trash-alt');
            }
        }
    })
});

/* ------ Desactivar Estado------*/
$(document).on('click', '.desactivar-r_c', function() {
    var id=$(this).data("id");    
    var data={"id":id,"accion":"desactivar"};
    $.ajax({
        type:'POST',
        url:'controller_func/registro_compra/accion.php',
        data:data,
        success:function(data){            
            if(data=="true_desactivado"){
                toastr.success("Se desactivó el item correctamente");
                $("#td_estado"+id).replaceWith("<td class='text-danger' id='td_estado"+id+"'>Inactivo</td>");
                $("#btn_r_c"+id).removeClass('btn btn-sm btn-danger desactivar-r_c').addClass('btn btn-sm btn-success activar-r_c');
                $("#icon_r_c"+id).removeClass('far fa-trash-alt').addClass('fas fa-user-check');
            }
        }
    })
});

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

/*cargar excel */
$(document).on('click', '.exportar-excel-registro-compra', function() {
    
    $.ajax({
        type:'POST',
        url:"controller_func/registro_compra/exportar_excel.php",   
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

$(document).on('keyup', '#txt_p_u', function(e){
    var txt_can = $("#txt_can").val();
    var txt_p_u = $("#txt_p_u").val();
    var total=0.00;

    if(txt_p_u==""){
        txt_p_u=0.00;
        if(txt_p_u==0.00){
            txt_p_u=0.00;
        }
        if(txt_can==0.00){
            txt_can=1;
        }
        total = parseFloat(txt_p_u)*parseFloat(txt_can);
        $("#txt_s_t").val(total);
    }

    if(parseFloat(txt_p_u)<=0){ //borra los otros campos si el sub total es igual a -> " "
        return false
    }
    if(parseFloat(txt_p_u)>0){            
        total = parseFloat(txt_p_u)*parseFloat(txt_can);
        $("#txt_s_t").val(total);
    }
    
});


$(document).on('keyup', '#txt_can', function(e){
    var txt_can = $("#txt_can").val();
    var txt_p_u = $("#txt_p_u").val();
    var total=0.00;

    if(txt_can==""){
        txt_can=1;
        if(txt_p_u==0.00){
            txt_p_u=0.00;
        }
        if(txt_can==0.00){
            txt_can=1;
        }
        total = parseFloat(txt_p_u)*parseFloat(txt_can);
        $("#txt_s_t").val(total);
    }

    if(parseFloat(txt_can)<=0){ //borra los otros campos si el sub total es igual a -> " "
        return false
    }
    if(parseFloat(txt_can)>0){            
        total = parseFloat(txt_p_u)*parseFloat(txt_can);
        $("#txt_s_t").val(total);
    }
    
});