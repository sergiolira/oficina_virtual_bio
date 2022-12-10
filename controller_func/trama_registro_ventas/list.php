<?php
session_start();
include_once("../../model_class/trama_registro_ventas.php");
$obj_cabecera_registro_venta= new trama_registro_ventas();

$filtro="";$fecha_ped_ini="";$fecha_ped_fin="";$fecha_entrega_ini="";$fecha_entrega_fin="";
$slt_estado_pedido_c="";$slt_tipo_venta_c="";$txt_nro_sol_c="";$txt_nro_doc_c="";

$slt_anio=$_REQUEST["slt_anio"];
$slt_mes=$_REQUEST["slt_mes"];
$slt_semana=$_REQUEST["slt_semana"];
 
if($slt_anio!=0 && $slt_anio!=""){
    $filtro.=" and crv.anio_detalle='".$slt_anio."' ";
}

if($slt_mes!=0 && $slt_mes!=""){
    $filtro.=" and crv.mes_detalle='".$slt_mes."' ";
}

if($slt_semana!=0 && $slt_semana!=""){
    $filtro.=" and crv.semana_detalle='".$slt_semana."' ";
}


$html='<table id="tbl_trama_ventas" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
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
        <th>Estado de venta</th>
        <th>Año</th>
        <th>Mes</th>
        <th>Semana</th>
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
    <i class="far fa-trash-alt" id="icon_marca'.$fila["id_trama_registro_ventas"].'"></i></button>';
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
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["nro_solicitud"].'</td>
            <td>'.$fila["nombre_cliente"].'</td>
            <td>'.$fila["nro_documento"].'</td>
            <td>'.$fila["fecha_pedido"].'</td>
            <td>'.$fecha_entrega.'</td>
            <td>'.$fila["total_descuento"].' %</td>
            <td>$ '.$fila["costo_envio"].'</td>
            <td>$ '.$fila["total"].'</td>
            <td>'.$fila["estado_registro_venta"].'</td>
            <td>'.$fila["anio_detalle"].'</td>
            <td>'.$fila["mes_detalle"].'</td>
            <td>'.$fila["semana_detalle"].'</td>
            <td>
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
    $("#tbl_trama_ventas").DataTable({
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