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
$slt_estado_pedido_c=8;
$txt_nro_sol_c=$_REQUEST["txt_nro_sol_c"];
$txt_nro_doc_c=$_REQUEST["txt_nro_doc_c"];

if(trim($fecha_ped_ini)!="null" && trim($fecha_ped_ini)!="" && $fecha_ped_ini!="0" &&
trim($fecha_ped_fin)!="null" && trim($fecha_ped_fin)!="" && $fecha_ped_fin!="0"){
  $filtro.=" and DATE(crv.fecha_pedido) BETWEEN '".$fecha_ped_ini."' AND '".$fecha_ped_fin."'";
}

if(trim($fecha_entrega_ini)!="null" && trim($fecha_entrega_ini)!="" && $fecha_entrega_ini!="0" &&
trim($fecha_entrega_fin)!="null" && trim($fecha_entrega_fin)!="" && $fecha_entrega_fin!="0"){
  $filtro.=" and DATE(crv.fecha_entrega) BETWEEN '".$fecha_entrega_ini."' AND '".$fecha_entrega_fin."'";
}

$filtro.=" and crv.id_estado_registro_venta in (".$slt_estado_pedido_c.")";


if($txt_nro_sol_c!=""){
$filtro.=" and crv.nro_solicitud='".$txt_nro_sol_c."'";
}

if($txt_nro_doc_c!=""){
$filtro.=" and crv.nro_documento='".$txt_nro_doc_c."'";
}

$filtro.=" and crv.estado_enviado_comision!='3'";

$filtro.=" and (crv.patrocinador!='Cabeza de Red' OR drv.id_tipo_venta!='2')";

$html='<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
<thead>
    <tr>  
        <th>N°</th>
        <th>Nº Solicitud</th>
        <th>Cliente</th>
        <th>N° de doc</th>
        <th>Tipo de venta</th>
        <th>Fecha Pedido</th>
        <th>Fecha Entrega</th>
        <th>Total Dsct</th>
        <th>Costo Envio</th>
        <th>Total</th>
        <th title="Comisión">Enviado Trama a comisión</th>
        <th>Estado de venta</th>
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
if($fila["fecha_entrega"]!="1900-01-01"){
    $fecha_entrega=$fila["fecha_entrega"];
}else{
    $fecha_entrega="0000-00-00";
}

if($fila["estado_enviado_comision"]=="1"){
    $estado_enviado_comision="No Enviado";
    $disabled="";
  }elseif($fila["estado_enviado_comision"]=="2"){
    $estado_enviado_comision="Enviado";
    $disabled="disabled";
  }else{
    $estado_enviado_comision="Comisionado";
    $disabled="disabled";
  }

$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["nro_solicitud"].'</td>
            <td>'.$fila["nombre_cliente"].'</td>
            <td>'.$fila["nro_documento"].'</td>
            <td>'.$fila["tipo_venta"].'</td>
            <td>'.$fila["fecha_pedido"].'</td>
            <td>'.$fecha_entrega.'</td>
            <td>'.$fila["total_descuento"].' %</td>
            <td>$ '.$fila["costo_envio"].'</td>
            <td>$ '.$fila["total"].'</td>
            <td>'.$fila["estado_registro_venta"].'</td>
            <td>'.$estado_enviado_comision.'</td>
            <td>
                <button type="button" '.$disabled.' class="btn btn-success btn-xs add-solicitud-tem-trama" title="Agregar a trama" 
                data-solicitud="'.$fila["nro_solicitud"].'" data-id="'.$fila["id_cabecera_registro_venta"].'"><i class="fas fa-plus"></i></button>
                <button data-id="'.$fila["nro_solicitud"].'"title="ver mas" class="btn btn-xs btn-primary 
                show_detalle_venta_modal"><i class="far fa-eye"></i>
                </button>
            </td> 
        </tr>';
        $c++;
}
$html.='</tbody> </table></br>
<div class="float-sm-right"><button type="button" class="btn btn-success btn-xs add-solicitud-list-trama" title="Agregar lista a trama">
<i class="fas fa-list-ol"></i> Agregar todas las ventas a Trama</button></div>';
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