<?php
session_start();
include_once("../../model_class/registro_compra.php");
$obj_r_c= new registro_compra();

/**cabecera */
$html='
<table id="tbl_r_c" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
<thead>
<tr>  
    <th>N°</th>
    <th>ID</th>
    <th>Producto</th>
    <th>Divisa</th>
    <th>Cantidad</th>
    <th>Precio unitario</th>
    <th>Sub total</th>
    <th>Fecha de ingreso</th>
    <th>Estado</th>
    <th>Fecha de registro</th>
    <th>Opciones</th>
</tr>
</thead>
<tbody>
';

$rs_lista=$obj_r_c->read();
$c=1;
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
  
if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_registro_compra"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-r_c" id="btn_r_c'.$fila["id_registro_compra"].'">
  <i class="far fa-trash-alt" id="icon_r_c'.$fila["id_registro_compra"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_registro_compra"].'"   
  title="Activar" class="btn btn-xs btn-success activar-r_c" id="btn_r_c'.$fila["id_registro_compra"].'">
  <i class="fas fa-user-check" id="icon_r_c'.$fila["id_registro_compra"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_registro_compra"].'"             
  title="Modificar" class="btn btn-xs btn-warning nuevo_r_c_modal"><i class="far fa-edit"></i></button>';
  }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_registro_compra"].'</td>
            <td>'.$fila["nombre_producto"].'</td>
            <td>'.$fila["divisa"].'</td>
            <td>'.$fila["cantidad"].'</td>
            <td>'.$fila["precio_unitario"].'</td>
            <td>'.$fila["sub_total"].'</td>
            <td>'.$fila["fecha_ingreso"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_registro_compra"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                 '.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_registro_compra"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_r_c_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";
$html.='<script>
 $(function () {
    
    $("#tbl_r_c").DataTable({
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