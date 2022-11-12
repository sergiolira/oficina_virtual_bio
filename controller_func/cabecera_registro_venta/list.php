<?php
session_start();
include_once("../../model_class/cabecera_registro_venta.php");
$obj_cabecera_registro_venta= new cabecera_registro_venta();
$html='<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
<thead>
    <tr>  
        <th>N°</th>
        <th>Nº Solicitud</th>
        <th>Fecha Pedido</th>
        <th>Fecha Entrega</th>
        <th>Total Dsct</th>
        <th>Impuesto</th>
        <th>Costo Envio</th>
        <th>Total</th>
        <th>Estado</th>
        <th>Fecha Registro</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody>';
$rs_lista=$obj_cabecera_registro_venta->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
    $estado="Activo";$estado_style="class='text-success'";
    $btn_eliminar='<button data-id="'.$fila["id_cabecera_registro_venta"].'"   
    title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_marca'.$fila["id_cabecera_registro_venta"].'">
    <i class="far fa-trash-alt" id="icon_marca'.$fila["id_cabecera_registro_venta"].'"></i></button>';
}else{ 
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_cabecera_registro_venta"].'"   
    title="Activar" class="btn btn-xs btn-success activar-item" id="btn_marca'.$fila["id_cabecera_registro_venta"].'">
    <i class="fas fa-user-check" id="icon_marca'.$fila["id_cabecera_registro_venta"].'"></i></button>';
}
if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_cabecera_registro_venta"].'"
    title="Modificar" class="btn btn-xs btn-warning nuevo_detalle_venta_modal"><i class="far fa-edit"></i></button>';
    }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["nro_solicitud"].'</td>
            <td>'.$fila["fecha_pedido"].'</td>
            <td>'.$fila["fecha_entrega"].'</td>
            <td>'.$fila["total_descuento"].'</td>
            <td>'.$fila["impuesto"].'</td>
            <td>'.$fila["costo_envio"].'</td>
            <td>'.$fila["total"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_cabecera_registro_venta"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>
                '.$btn_editar.' '.$btn_eliminar.'
                <button data-id="'.$fila["id_cabecera_registro_venta"].'"title="ver mas" class="btn btn-xs btn-primary show_detalle_venta_modal"><i class="far fa-eye"></i>
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