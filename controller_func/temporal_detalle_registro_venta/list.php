<?php
session_start();
include_once("../../model_class/temporal_detalle_registro_venta.php");
$obj_temporal_detalle_registro_venta= new temporal_detalle_registro_venta();

/**cabecera*/
$html='<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
<thead>
    <tr>  
        <th>N°</th>
        <th>Nº Solicitud</th>
        <th>Tipo Venta</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio Unitario</th>
        <th>Dsct Producto</th>
        <th>Sub Total</th>
        <th>Estado</th>
        <th>fecha Registro</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody>';
$rs_lista=$obj_temporal_detalle_registro_venta->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
    $estado="Activo";$estado_style="class='text-success'";
    $btn_eliminar='<button data-id="'.$fila["id_temporal_detalle_registro_venta"].'"   
    title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_marca'.$fila["id_temporal_detalle_registro_venta"].'">
    <i class="far fa-trash-alt" id="icon_marca'.$fila["id_temporal_detalle_registro_venta"].'"></i></button>';
}else{ 
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_temporal_detalle_registro_venta"].'"   
    title="Activar" class="btn btn-xs btn-success activar-item" id="btn_marca'.$fila["id_temporal_detalle_registro_venta"].'">
    <i class="fas fa-user-check" id="icon_marca'.$fila["id_temporal_detalle_registro_venta"].'"></i></button>';
}
if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_temporal_detalle_registro_venta"].'"
    title="Modificar" class="btn btn-xs btn-warning nuevo_detalle_venta_modal_temporal"><i class="far fa-edit"></i></button>';
    }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["nro_solicitud"].'</td>
            <td>'.$fila["tipo_venta"].'</td>
            <td>'.$fila["nombre_producto"].'</td>
            <td>'.$fila["cantidad"].'</td>
            <td>'.$fila["precio_unitario"].'</td>
            <td>'.$fila["monto"].'</td>
            <td>'.$fila["sub_total"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_temporal_detalle_registro_venta"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>
                '.$btn_editar.' '.$btn_eliminar.'
                <button data-id="'.$fila["id_temporal_detalle_registro_venta"].'"title="ver mas" class="btn btn-xs btn-primary show_detalle_venta_modal_temporal"><i class="far fa-eye"></i>
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