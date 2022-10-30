
<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/login.php");
$obj_r= new login();


/*---- Crear y actualizar roles ----*/

$strPassword= hash("SHA256",$_REQUEST["password"]);
$obj_r->correo= strClean($_REQUEST["email"]);
$obj_r->clave= strClean($strPassword);

    if ($obj_r->correo == '' || $obj_r->clave == '') 
    {
        echo "error_datos";
        return false;
    } else {
        $requestUser = $obj_r->loginUser();
        if (empty($requestUser)) {
            echo "datos_incorrectos";
            return false;
        } else {
            if($fila = mysqli_fetch_array($requestUser)){
                $estado = $fila['estado'];
                if ($estado == 1) {
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION["idUser"] = $fila["id_usuario"];

                    $rs_datos = $obj_r->sesionLogin($_SESSION['idUser']);
                    if($fila = mysqli_fetch_array($rs_datos)){
                    $_SESSION['nombre']=$fila['nombre'];
                    $_SESSION['apellido_paterno']=$fila['apellido_paterno'];
                    $_SESSION['apellido_materno']=$fila['apellido_materno'];
                    $_SESSION['telefono']=$fila['telefono'];
                    $_SESSION['correo']=$fila['correo'];
                    $_SESSION['foto_perfil']=$fila['foto_perfil'];
                    $_SESSION['estado']=$fila['estado'];
                    $_SESSION['fecharegistro']=$fila['fecharegistro'];
                    $_SESSION['fechaactualiza']=$fila['fechaactualiza'];
                    $_SESSION['id_usuarioregistro']=$fila['id_usuarioregistro'];
                    $_SESSION['id_usuarioactualiza']=$fila['id_usuarioactualiza'];
                    $_SESSION['id_rol']=$fila['id_rol'];
                    $_SESSION['rol']=$fila['rol'];
                    echo "existe";
                    die();
                    } 
                                    
                }else {
                    echo "inactivo";
                    return false;
                }
            }  
        }
        die();
    }
        
    
    



?>