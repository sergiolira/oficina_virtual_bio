<?php
session_start();
include_once("../../model_class/representante.php");
include_once("../../model_class/afiliado.php");
include_once("../../model_class/solicitud_arbol_virtual.php");
include_once("../../model_class/candidato.php");
$obj_c=new candidato();
$obj_s=new solicitud_arbol_virtual();
$obj_r=new representante();
$obj_a=new afiliado();


/**Obtener el txtnrosoli y txtruc_buscar */
if(trim($_REQUEST["txtruc_buscar"])!=""){
    $ruc_inicial=$_REQUEST["txtruc_buscar"];
}
  
if(trim($_REQUEST["txtnrosoli"])!=""){
    $txtnrosoli=$_REQUEST["txtnrosoli"];
}
$obj_s->ruc_inicial=$ruc_inicial;
$obj_s->nro_solicitud=$txtnrosoli;

$estado=$obj_s->obtener_nro_solicitud_estado();
if($estado!="3"){
    switch ($estado) {
        case '1':
            echo "En proceso";
            break;
        case '2':
            echo "Pendiente";
            break;
        case '4':
            echo "Aceptado";
            break;
        case '5':
            echo "Rechazado";
            break;        
        default:
            echo "Cancelado o Eliminado";
            break;
    }
    die();
}else{


$rs=$obj_s->list_solicitud_aceptada();

while($fila=mysqli_fetch_assoc($rs)){

    if($fila["proceso"]=="edit"){

        /**Tabla Afiliado */
        $obj_a->ruc_patrocinador=$fila["ruc_patrocinador"];
        $obj_a->posicion=$fila["posicion"];
        $obj_a->id_usuarioactualiza=$_SESSION["id_usuario"];
        $obj_a->ruc_usuario=$fila["ruc_usuario"];
        $obj_a->update_red_x_solicitud();
        /**Tabla Representante */
        $obj_r->patrocinador_directo=$fila["ruc_patrocinador"];
        $obj_r->posicion=$fila["posicion"];
        $obj_r->id_usuarioactualiza=$_SESSION["id_usuario"];
        $obj_r->nro_documento=$fila["ruc_usuario"];
        $obj_r->patrocinador=$fila["ruc_lider_red"];
        $obj_r->update_red_x_solicitud();
        /**Tabla Solicitud */
        $obj_s->id_usuarioactualiza=$_SESSION["id_usuario"];
        $obj_s->nro_solicitud=$fila["nro_solicitud"];
        $obj_s->ruc_inicial=$fila["ruc_inicial"];
        $obj_s->id_solicitud_arbolvirtual=$fila["id_solicitud_arbolvirtual"];
        $obj_s->ruc_usuario=$fila["ruc_usuario"];
        $obj_s->ruc_patrocinador=$fila["ruc_patrocinador"];
        $obj_s->update_estado_aceptada_x_id();
    }

    if($fila["proceso"]=="remove"){

        /**Tabla Afiliado */
        $obj_a->ruc_usuario=$fila["ruc_usuario"];
        $obj_a->remove_red_x_solicitud();
        /**Tabla Representante */
        $obj_r->ruc=$fila["ruc_usuario"];
        if($fila["ruc_usuario"]==$fila["ruc_lider_red"]){
            $obj_r->patrocinador="0";
        }else{
            $obj_r->patrocinador=$fila["ruc_lider_red"];
        }        
      

        /**Tabla Solicitud */
        $obj_s->id_usuarioactualiza=$_SESSION["id_usuario"];
        $obj_s->nro_solicitud=$fila["nro_solicitud"];
        $obj_s->ruc_inicial=$fila["ruc_inicial"];
        $obj_s->id_solicitud_arbolvirtual=$fila["id_solicitud_arbolvirtual"];
        $obj_s->ruc_usuario=$fila["ruc_usuario"];
        $obj_s->ruc_patrocinador=$fila["ruc_patrocinador"];
        $obj_s->update_estado_aceptada_x_id();     
           
       
    }
    
    
}

echo "true";
die();

}


   
?>