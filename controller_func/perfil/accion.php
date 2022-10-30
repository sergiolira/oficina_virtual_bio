
<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/perfil.php");
$obj_p= new perfil();


/*---- Actualizar perfil ----*/

 if($_REQUEST["id"]>0){

    if ($_REQUEST["txt_password"]=="") {
        $strPassword= $_REQUEST["txt_password"];
    } else {
        $strPassword= hash("SHA256",$_REQUEST["txt_password"]);
    }

     $obj_p->direccion= strClean($_REQUEST["txt_direccion"]);
     $obj_p->telefono= strClean($_REQUEST["txt_tele"]);
     $obj_p->id_departamento= strClean($_REQUEST["slt_dep"]);
     $obj_p->id_provincia= strClean($_REQUEST["slt_prov"]);
     $obj_p->id_distrito= strClean($_REQUEST["slt_dist"]);
     $obj_p->id_genero= strClean($_REQUEST["slt_genero"]);
     $obj_p->id_estado_civil= strClean($_REQUEST["slt_est_civil"]);
     $obj_p->clave= strClean($strPassword);
     $obj_p->nro_hijos= strClean($_REQUEST["txt_hijos"]);
     $obj_p->id_usuario= intval(strClean($_REQUEST["id"]));
     if ($obj_p->direccion == '' || $obj_p->telefono == '' || $obj_p->id_departamento == '' || $obj_p->id_provincia == '' 
     || $obj_p->id_distrito == '' || $obj_p->id_genero == '' || $obj_p->id_estado_civil == '' || $obj_p->id_usuario == '' 
     || $obj_p->nro_hijos == '') {
     echo "error_datos";
     return false;
     } else {
         $obj_p->update_perfil();
         echo "true_update";
         die(); 
     }


 }





?>