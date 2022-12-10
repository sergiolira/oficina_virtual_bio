<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/usuario.php");
$obj_u= new usuario();


$formatos_permitidos_cv =  array('pdf','doc','docx');
$formatos_permitidos_foto_perfil =  array('png','jpg','jpeg');

/*---- Activar y desactivar Estado ----*/
if(isset($_REQUEST["accion"])){
    if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="activar"){
        $obj_u->id_usuario=intval(strClean($_REQUEST["id"]));
        $obj_u->activar();
        echo "true_activado";
        die(); 
    }else if($_REQUEST["id"]>0 && $_REQUEST["accion"]=="desactivar"){
        $obj_u->id_usuario=intval(strClean($_REQUEST["id"]));
        $obj_u->desactivar();
        echo "true_desactivado";
        die();
    }
}

/*---- Crear y actualizar usuarios ----*/

if($_REQUEST["id"]>0){

    /**Gestion de archivo CV */
    $nombre_temporal=$_FILES['file_cv']['tmp_name'];  
    $nombreArc = $_FILES["file_cv"]["name"];             
    $extensionArc = pathinfo($nombreArc, PATHINFO_EXTENSION);
    $nuevo_nombre_archivo="CV_".date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc;
    if($nombre_temporal=="" || $nombre_temporal=="null" || $nombre_temporal=="NULL" || !is_null($nombre_temporal))
    {

    } else {
        if(!in_array($extensionArc, $formatos_permitidos_cv)) {
            echo 'error_extencion_cv';
            die();
        }
        if(!isset($_FILES) || empty($_FILES) && ($_REQUEST["hdnid"]=="" || $_REQUEST["hdnid"]=="0")){
            echo 'error_no_archivo';
            exit();
        }
    }

    /**Gestion de imagen perfil */
    $nombre_temporal_fp=$_FILES['file_foto_perfil']['tmp_name'];  
    $nombreArc_fp = $_FILES["file_foto_perfil"]["name"];             
    $extensionArc_fp = pathinfo($nombreArc_fp, PATHINFO_EXTENSION);
    $nuevo_nombre_archivo_fp="fp_".date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc_fp;
    $sizeArc_fp=filesize($nombre_temporal_fp);
    if($nombre_temporal_fp=="" || $nombre_temporal_fp=="null" || $nombre_temporal_fp=="NULL" || !is_null($nombre_temporal_fp))
    {

    } else {

        if(!in_array($extensionArc_fp, $formatos_permitidos_foto_perfil)) {
            echo 'error_extencion_imagen';
            die();
        }
        if(!isset($_FILES) || empty($_FILES) && ($_REQUEST["hdnid"]=="" || $_REQUEST["hdnid"]=="0")){
            echo 'error_no_archivo';
            exit();
        }

        $imagen = getimagesize($nombre_temporal_fp);
        $ancho = $imagen[0];              //Ancho
        $alto = $imagen[1]; 

        if($ancho!=400 && $alto!=400){
          echo 'error_tamaño_imagen';
          die();
        }
    }


    if($nombre_temporal!="" || $nombre_temporal!="null" || $nombre_temporal!="NULL" || !is_null($nombre_temporal)){

        $sub_carpeta_cv=date('dmy').date('His')."_".rand(10, 99);

        $path_cv = '../../archivos/CV/'.$sub_carpeta_cv;

        if (!file_exists($path_cv)) {
            mkdir($path_cv, 0777, true);
        }

        $carpeta_ubicacion_bd_cv="archivos/CV/".$sub_carpeta_cv."/";

        move_uploaded_file($nombre_temporal, '../../archivos/CV/'.$sub_carpeta_cv.'/'.$nuevo_nombre_archivo);


        $obj_u->cv= $carpeta_ubicacion_bd_cv.$nuevo_nombre_archivo;
        $obj_u->id_usuario= intval(strClean($_REQUEST["id"]));
        $obj_u->update_cv();
    }

    if($nombre_temporal_fp!="" || $nombre_temporal_fp!="null" || $nombre_temporal_fp!="NULL" || !is_null($nombre_temporal_fp)){

        $sub_carpeta_fp=date('dmy').date('His')."_".rand(10, 99);

        $path_fp = '../../archivos/foto_perfil/'.$sub_carpeta_fp;

        if (!file_exists($path_fp)) {
            mkdir($path_fp, 0777, true);
        }

        $carpeta_ubicacion_bd_fp="archivos/foto_perfil/".$sub_carpeta_fp."/";

        move_uploaded_file($nombre_temporal_fp, '../../archivos/foto_perfil/'.$sub_carpeta_fp.'/'.$nuevo_nombre_archivo_fp);
        $obj_u->foto_perfil=$carpeta_ubicacion_bd_fp.$nuevo_nombre_archivo_fp;
        $obj_u->foto_tamanio=$sizeArc_fp;
        $obj_u->id_usuario= intval(strClean($_REQUEST["id"]));
        $obj_u->update_foto_perfil();
        
    }


    if ($_REQUEST["txt_password"]=="") {
        $strPassword= $_REQUEST["txt_password"];
    } else {
        $strPassword= hash("SHA256",$_REQUEST["txt_password"]);
    }
    $obj_u->id_rol= intval(strClean($_REQUEST["slt_rol"]));
    $obj_u->nombre= strClean($_REQUEST["txt_name"]);
    $obj_u->apellido_paterno= strClean($_REQUEST["txt_app"]);
    $obj_u->apellido_materno= strClean($_REQUEST["txt_apm"]);
    $obj_u->telefono= strClean($_REQUEST["txt_tel"]);
    $obj_u->correo= strClean($_REQUEST["txt_email"]);
    $obj_u->id_tipo_documento= strClean($_REQUEST["slt_dni"]);
    $obj_u->num_documento= strClean($_REQUEST["txt_num_document"]);
    $obj_u->id_genero= strClean($_REQUEST["slt_genero"]);
    $obj_u->id_departamento= strClean($_REQUEST["slt_dep"]);
    $obj_u->id_provincia= strClean($_REQUEST["slt_prov"]);
    $obj_u->id_distrito= strClean($_REQUEST["slt_dist"]);
    $obj_u->direccion= strClean($_REQUEST["txt_direc"]);
    $obj_u->fecha_nac= strClean($_REQUEST["txt_nac"]);
    $obj_u->fecha_inicio_labores= strClean($_REQUEST["txt_inicio"]);
    if(isset($_REQUEST["check_fec_fin"])){
        $obj_u->fecha_fin_labores= strClean($_REQUEST["txt_fin"]);
    } else {
        $obj_u->fecha_fin_labores="1900-01-01";
    }    
    $obj_u->nro_hijos= strClean($_REQUEST["txt_hijos"]);
    $obj_u->id_estado_civil= strClean($_REQUEST["slt_est_civil"]);  
    $obj_u->clave= strClean($strPassword);
    $obj_u->id_usuario= intval(strClean($_REQUEST["id"]));
    
        $obj_u->update();
        echo "true_update";
        die(); 
    

}else{


    /**Gestion de archivo CV */
    $nombre_temporal=$_FILES['file_cv']['tmp_name'];  
    $nombreArc = $_FILES["file_cv"]["name"];             
    $extensionArc = pathinfo($nombreArc, PATHINFO_EXTENSION);
    $nuevo_nombre_archivo="CV_".date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc;
    if($nombre_temporal!="" || $nombre_temporal!="null" || $nombre_temporal!="NULL" || !is_null($nombre_temporal))
    {

        if(!in_array($extensionArc, $formatos_permitidos_cv)) {
            echo 'error_extencion_cv';
            die();
        }
        if(!isset($_FILES) || empty($_FILES) && ($_REQUEST["hdnid"]=="" || $_REQUEST["hdnid"]=="0")){
            echo 'error_no_archivo';
            exit();
        }

    }else{
        echo 'error_no_archivo';
        exit();
    }


    /**Gestion de imagen perfil */
    $nombre_temporal_fp=$_FILES['file_foto_perfil']['tmp_name'];  
    $nombreArc_fp = $_FILES["file_foto_perfil"]["name"];             
    $extensionArc_fp = pathinfo($nombreArc_fp, PATHINFO_EXTENSION);
    $nuevo_nombre_archivo_fp="fp_".date('dmy')."_".date('Hs')."_".rand(10, 99).".".$extensionArc_fp;
    $sizeArc_fp=filesize($nombre_temporal_fp);
    if($nombre_temporal_fp!="" || $nombre_temporal_fp!="null" || $nombre_temporal_fp!="NULL" || !is_null($nombre_temporal_fp))
    {

        if(!in_array($extensionArc_fp, $formatos_permitidos_foto_perfil)) {
            echo 'error_extencion_imagen';
            die();
        }
        if(!isset($_FILES) || empty($_FILES) && ($_REQUEST["hdnid"]=="" || $_REQUEST["hdnid"]=="0")){
            echo 'error_no_archivo';
            exit();
        }

        $imagen = getimagesize($nombre_temporal_fp);
        $ancho = $imagen[0];              //Ancho
        $alto = $imagen[1]; 

        if($ancho!=400 && $alto!=400){
          echo 'error_tamaño_imagen';
          die();
        }

    }else{
        echo 'error_no_archivo';
        exit();
    }


    /**Gestion de CV */     
    $sub_carpeta_cv=date('dmy').date('His')."_".rand(10, 99);

    $path_cv = '../../archivos/CV/'.$sub_carpeta_cv;

    if (!file_exists($path_cv)) {
        mkdir($path_cv, 0777, true);
    }

    $carpeta_ubicacion_bd_cv="archivos/CV/".$sub_carpeta_cv."/";

    move_uploaded_file($nombre_temporal, '../../archivos/CV/'.$sub_carpeta_cv.'/'.$nuevo_nombre_archivo);

    
    /**Gestion de imagen perfil */
    $sub_carpeta_fp=date('dmy').date('His')."_".rand(10, 99);
    
    $path_fp = '../../archivos/foto_perfil/'.$sub_carpeta_fp;

    if (!file_exists($path_fp)) {
        mkdir($path_fp, 0777, true);
    }

    $carpeta_ubicacion_bd_fp="archivos/foto_perfil/".$sub_carpeta_fp."/";

    move_uploaded_file($nombre_temporal_fp, '../../archivos/foto_perfil/'.$sub_carpeta_fp.'/'.$nuevo_nombre_archivo_fp);


    $strPassword= hash("SHA256",$_REQUEST["txt_password"]);
    $obj_u->id_rol= intval(strClean($_REQUEST["slt_rol"]));
    $obj_u->nombre= strClean($_REQUEST["txt_name"]);
    $obj_u->apellido_paterno= strClean($_REQUEST["txt_app"]);
    $obj_u->apellido_materno= strClean($_REQUEST["txt_apm"]);
    $obj_u->telefono= strClean($_REQUEST["txt_tel"]);
    $obj_u->correo= strClean($_REQUEST["txt_email"]);
    $obj_u->id_tipo_documento= strClean($_REQUEST["slt_dni"]);
    $obj_u->num_documento= strClean($_REQUEST["txt_num_document"]);
    $obj_u->id_genero= strClean($_REQUEST["slt_genero"]);
    $obj_u->id_departamento= strClean($_REQUEST["slt_dep"]);
    $obj_u->id_provincia= strClean($_REQUEST["slt_prov"]);
    $obj_u->id_distrito= strClean($_REQUEST["slt_dist"]);
    $obj_u->direccion= strClean($_REQUEST["txt_direc"]);
    $obj_u->fecha_nac= strClean($_REQUEST["txt_nac"]);
    $obj_u->fecha_inicio_labores= strClean($_REQUEST["txt_inicio"]);
    if(isset($_REQUEST["check_fec_fin"])){
        $obj_u->fecha_fin_labores= strClean($_REQUEST["txt_fin"]);
    } else {
        $obj_u->fecha_fin_labores="1900-01-01";
    }   
    $obj_u->nro_hijos= strClean($_REQUEST["txt_hijos"]);
    $obj_u->id_estado_civil= strClean($_REQUEST["slt_est_civil"]);
    $obj_u->foto_perfil=$carpeta_ubicacion_bd_fp.$nuevo_nombre_archivo_fp;
    $obj_u->foto_tamanio=$sizeArc_fp;
    $obj_u->cv= $carpeta_ubicacion_bd_cv.$nuevo_nombre_archivo;
    $obj_u->clave= strClean($strPassword);
    if ($obj_u->id_rol == '' || $obj_u->nombre == '' || $obj_u->apellido_paterno == '' || $obj_u->apellido_materno == '' 
        || $obj_u->telefono == '' || $obj_u->correo == '' || $obj_u->clave == '') {
        echo "error_datos"; 
        return false;
    } else {
        $obj_u->create(); 
        echo "true_create";
        die();        
    }

}

?>