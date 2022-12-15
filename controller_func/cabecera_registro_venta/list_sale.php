<?php
session_start();
include_once("../../model_class/cabecera_registro_venta.php");
$obj_cabecera_registro_venta= new cabecera_registro_venta();

$filtro="";$fecha_ped_ini="";$fecha_ped_fin="";$fecha_entrega_ini="";$fecha_entrega_fin="";
$slt_estado_pedido_c="";$slt_tipo_venta_c="";$txt_nro_sol_c="";$txt_nro_doc_c="";

$fecha_ped_ini=$_REQUEST["fecha_ped_ini"];
$fecha_ped_fin=$_REQUEST["fecha_ped_fin"];
$fecha_entrega_ini=$_REQUEST["fecha_entrega_ini"];
$fecha_entrega_fin=$_REQUEST["fecha_entrega_fin"];
$slt_estado_pedido_c=$_REQUEST["slt_estado_pedido_c"];
$slt_tipo_venta_c=$_REQUEST["slt_tipo_venta_c"];
$txt_nro_sol_c=$_REQUEST["txt_nro_sol_c"];
$txt_nro_doc_c=$_REQUEST["txt_nro_doc_c"];
$estado_venta="Estado de venta";


if(trim($fecha_ped_ini)!="null" && trim($fecha_ped_ini)!="" && $fecha_ped_ini!="0" &&
trim($fecha_ped_fin)!="null" && trim($fecha_ped_fin)!="" && $fecha_ped_fin!="0"){
  $filtro.=" and DATE(crv.fecha_pedido) BETWEEN '".$fecha_ped_ini."' AND '".$fecha_ped_fin."'";
}

if(trim($fecha_entrega_ini)!="null" && trim($fecha_entrega_ini)!="" && $fecha_entrega_ini!="0" &&
trim($fecha_entrega_fin)!="null" && trim($fecha_entrega_fin)!="" && $fecha_entrega_fin!="0"){
  $filtro.=" and DATE(crv.fecha_entrega) BETWEEN '".$fecha_entrega_ini."' AND '".$fecha_entrega_fin."'";
}

 
if($slt_estado_pedido_c!=0 && $slt_estado_pedido_c!=""){
    $filtro.=" AND crv.id_estado_registro_venta IN (".$slt_estado_pedido_c.")";
}

if($slt_tipo_venta_c!=0 && $slt_tipo_venta_c!=""){
    $filtro.=" AND drv.id_tipo_venta IN (".$slt_tipo_venta_c.")";
}

if($txt_nro_sol_c!=""){
$filtro.=" AND crv.nro_solicitud='".$txt_nro_sol_c."'";
}

if($txt_nro_doc_c!=""){
$filtro.=" AND crv.nro_documento='".$txt_nro_doc_c."'";
}

if($_SESSION["id_rol"]=="3"){
$filtro.=" AND crv.nro_documento='".$_SESSION["nro_documento"]."' AND crv.tipo_cliente='ASESOR' ";
$estado_venta="Estado de compra";
}

$html='<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
<thead>
    <tr>  
        <th>N°</th>
        <th>Nº Solicitud</th>
        <th>Cliente</th>
        <th>N° de doc</th>
        <th>Fecha Pedido</th>
        <th>Fecha Entrega</th>
        <th>Total Dsct</th>
        <th>Costo Envio</th>
        <th>Total</th>
        <th>'.$estado_venta.'</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody>';
$rs_lista=$obj_cabecera_registro_venta->consult_filtro($filtro);
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";$fecha_entrega="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
    $estado="Activo";$estado_style="class='text-success'";
    $btn_eliminar='<button data-id="'.$fila["nro_solicitud"].'"   
    title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_marca'.$fila["nro_solicitud"].'">
    <i class="far fa-trash-alt" id="icon_marca'.$fila["id_cabecera_registro_venta"].'"></i></button>';
}else{ 
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["nro_solicitud"].'"   
    title="Activar" class="btn btn-xs btn-success activar-item" id="btn_marca'.$fila["nro_solicitud"].'">
    <i class="fas fa-user-check" id="icon_marca'.$fila["nro_solicitud"].'"></i></button>';
}
if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["nro_solicitud"].'"
    title="Modificar" class="btn btn-xs btn-warning nuevo_detalle_venta_modal"><i class="far fa-edit"></i></button>';
    }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}

if($fila["estado_registro_venta"]!=1 && $_SESSION["id_rol"]=="3"){
    $btn_editar='<button data-id="'.$fila["nro_solicitud"].'"
    title="Modificar" class="btn btn-xs btn-warning" disabled><i class="far fa-edit"></i></button>';
}

if($fila["fecha_entrega"]!="1900-01-01"){
    $fecha_entrega=$fila["fecha_entrega"];
}else{
    $fecha_entrega="0000-00-00";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["nro_solicitud"].'</td>
            <td>'.ucwords(strtolower($fila["nombre_cliente"])).'</td>
            <td>'.$fila["nro_documento"].'</td>
            <td>'.$fila["fecha_pedido"].'</td>
            <td>'.$fecha_entrega.'</td>
            <td>'.$fila["total_descuento"].' %</td>
            <td>$ '.$fila["costo_envio"].'</td>
            <td>$ '.$fila["total"].'</td>
            <td>'.$fila["estado_registro_venta"].'</td>
            <td>
                '.$btn_editar.'
                <button data-id="'.$fila["nro_solicitud"].'"title="ver mas" class="btn btn-xs btn-primary 
                show_detalle_venta_modal"><i class="far fa-eye"></i>
                </button>
            </td> 
        </tr>';
        $c++;
}
$html.="</tbody> </table>";
$html.='<script>
 $(function () {
    $("#tbl_marca").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });
</script>'
;
echo $html;
die();
?>