<?php
session_start();
include_once("../../model_class/descuento_producto.php");
$obj_d_p= new descuento_producto();

/**cabecera */
$html='
<table id="tbl_d_p" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
<thead>
<tr>  
    <th>N°</th>
    <th>ID</th>
    <th>Tipo de descuento</th>
    <th>Producto en descontar</th>
    <th>Monto</th>
    <th>Fecha de inicio</th>
    <th>Fecha fin</th>
    <th>Estado</th>
    <th>Fecha de registro</th>
    <th>Opciones</th>
</tr>
</thead>
<tbody>
';

$rs_lista=$obj_d_p->read();
$c=1;
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
  
if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_descuento_producto"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-d_p" id="btn_d_p'.$fila["id_descuento_producto"].'">
  <i class="far fa-trash-alt" id="icon_d_p'.$fila["id_descuento_producto"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_descuento_producto"].'"   
  title="Activar" class="btn btn-xs btn-success activar-d_p" id="btn_d_p'.$fila["id_descuento_producto"].'">
  <i class="fas fa-user-check" id="icon_d_p'.$fila["id_descuento_producto"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_descuento_producto"].'"             
  title="Modificar" class="btn btn-xs btn-warning nuevo_d_p_modal"><i class="far fa-edit"></i></button>';
  }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_descuento_producto"].'</td>
            <td>'.$fila["tipo_descuento"].'</td>
            
            <td>'.$fila["nombre_producto"].'</td>
            <td>'.$fila["monto"].'</td>
            <td>'.$fila["fecha_inicio"].'</td>
            <td>'.$fila["fecha_fin"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_descuento_producto"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                 '.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_descuento_producto"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_d_p_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";
$html.='<script>
 $(function () {
    
    $("#tbl_d_p").DataTable({
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