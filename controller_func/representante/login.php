<?php
include_once('../../model_class/representante.php');
//include_once('../../model_class/tipo_red_mlm.php');
$obj=new representante();
//$obj_t_r_mlm=new tipo_red_mlm();
$obj->nro_documento=$_REQUEST["user"];
$obj->clave=$_REQUEST["clave"];
$obj->verificar_clave_repre();



if($obj->clave_v=="false"){
    echo $obj->clave_v;
    die();
}else{
    $obj->login_usuario_repre();
    if($obj->nro_documento!="false")
    {
                $rsu=$obj->datos_session_representante();
                //$rs_tipored_mlm=$obj_t_r_mlm->obtener_tipo_red_mlm();
                if($filau=mysqli_fetch_assoc($rsu))
                {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION["id_usuario"]=0;
                $_SESSION["id_representante"]=$filau["id_representante"];
                $_SESSION["tipo_persona"]=$filau["tipo_persona"];
                $_SESSION["tipo_compra"]=$filau["tipo_compra"];
                $_SESSION["descuento_x_registro"]=$filau["descuento_x_registro"];
                $_SESSION["nombre"]=$filau["nombre"];
                $_SESSION["apellidopaterno"]=$filau["apellidopaterno"];
                $_SESSION["apellidomaterno"]=$filau["apellidomaterno"];
                $_SESSION["id_tipo_documento"]=$filau["id_tipo_documento"];                
                $_SESSION["nro_documento"]=$filau["nro_documento"];
                $_SESSION["correo"]=$filau["correo"];
                $_SESSION["telefono"]=$filau["telefono"];
                $_SESSION["razon_social"]=$filau["razon_social"];
                $_SESSION["id_genero"]=$filau["id_genero"];
                $_SESSION["id_pais"]=$filau["id_pais"];
                $_SESSION["id_departamento"]=$filau["id_departamento"];
                $_SESSION["id_provincia"]=$filau["id_provincia"];
                $_SESSION["id_distrito"]=$filau["id_distrito"];
                $_SESSION["direccion"]=$filau["direccion"];
                $_SESSION["fecha_nacimiento"]=$filau["fecha_nacimiento"];
                $_SESSION["edad"]=$filau["edad"];
                $_SESSION["patrocinador"]=$filau["patrocinador"];
                $_SESSION["patrocinador_directo"]=$filau["patrocinador_directo"];
                $_SESSION["posicion"]=$filau["posicion"];
                $_SESSION["id_nivel"]=$filau["id_nivel"];
                $_SESSION["id_nivel_categoria"]=$filau["id_nivel_categoria"];
                $_SESSION["id_tipo_red_mlm"]=$filau["id_tipo_red_mlm"];
                $_SESSION["observacion"]=$filau["observacion"];
                $_SESSION["estado"]=$filau["estado"];
                $_SESSION["fechaactualiza"]=$filau["fechaactualiza"];
                $_SESSION["fecharegistro"]=$filau["fecharegistro"];
                $_SESSION["id_usuarioregistro"]=$filau["id_usuarioregistro"];
                $_SESSION["id_usuarioactualiza"]=$filau["id_usuarioactualiza"];
                $_SESSION['id_rol']="3";
                $_SESSION['rol']="Asesor de Venta";
                $_SESSION['foto_perfil']="imas/logo/usubio.png";
                echo "true";
                die();
                }

    }

}
echo $obj->correo;
die();
?>