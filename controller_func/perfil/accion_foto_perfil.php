
<?php
require_once("../../helpers/helpers.php");
include_once("../../model_class/perfil.php");
$obj_p= new perfil();

$formatos_permitidos_cv =  array('pdf','doc','docx');
$formatos_permitidos_foto_perfil =  array('png','jpg','jpeg');

if($_REQUEST["id"]>0){

    /*Gestion de imagen perfil */
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
    
    }
    
    if($nombre_temporal_fp!="" || $nombre_temporal_fp!="null" || $nombre_temporal_fp!="NULL" || !is_null($nombre_temporal_fp)){
    
        $sub_carpeta_fp=date('dmy').date('His')."_".rand(10, 99);
    
        $path_fp = '../../archivos/foto_perfil/'.$sub_carpeta_fp;
    
        if (!file_exists($path_fp)) {
            mkdir($path_fp, 0777, true);
        }
    
        $carpeta_ubicacion_bd_fp="archivos/foto_perfil/".$sub_carpeta_fp."/";
    
        move_uploaded_file($nombre_temporal_fp, '../../archivos/foto_perfil/'.$sub_carpeta_fp.'/'.$nuevo_nombre_archivo_fp);
        $obj_p->foto_perfil=$carpeta_ubicacion_bd_fp.$nuevo_nombre_archivo_fp;
        $obj_p->foto_tamanio=$sizeArc_fp;
        $obj_p->id_usuario= intval(strClean($_REQUEST["id"]));
        $obj_p->update_foto();
        echo "true_update";
        
    
    }
    
    }

?>