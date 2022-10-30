/* ------ Login ------*/
$(document).on('click', '#btn_ini', function() {
    var data=$('#form_login').serialize();

    var strEmail = document.querySelector('#email').value;
    var strPassword = document.querySelector('#password').value;

    if (strEmail == '' || strPassword == '') 
    {
        toastr.error("Todos los campos son obligatorios.");
        return false;
    }   
    $.ajax({
        type:'POST',
        url:'controller_func/login/accion.php',
        data:data, 
        success:function(data){
            if(data.trim()=="existe"){               
                window.location.replace('index.php');                
            }else if(data.trim()=="error_datos"){
                toastr.error("Datos vacios.");
            }else if(data.trim()=="inactivo"){
                toastr.error("Su usuario esta inactivo por favor comuniquese con un administrador.");
            }else{
                toastr.error("El usuario o contraseña son incorrectos.");
                document.querySelector('#password').value = "";
            }
        } 
    })
});