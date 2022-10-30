
<?php 
session_start();
include_once("../../model_class/producto.php");
$obj_r= new producto();
/**cabecera */
$html='
<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Producto</th>
            <th>Stock inicial</th>
            <th>stock actual</th>
            <th>Descuento %</th>
            <th>Precio comprar</th>
            <th>Peso</th>
            <th>Estado</th>
            <th>Fecha Registro</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
';

$rs_lista=$obj_r->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
 /**Estado=1 ACTIVO Estado=0 Inactivo*/ 
 if($fila["estado"]==1){

   $estado="Activo";$estado_style="class='text-success'";
   $btn_eliminar='<button data-id="'.$fila["id_producto"].'"     
   title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item'.$fila["id_producto"].'">
   <i class="far fa-trash-alt" id="icon_item'.$fila["id_producto"].'"></i></button>';
  }else{

    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar='<button data-id="'.$fila["id_producto"].'"     
   title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item'.$fila["id_producto"].'">
   <i class="fas fa-user-check" id="icon_item'.$fila["id_producto"].'"></i></button>';
  }

  if($_SESSION['actualizar']==1 ){
    $btn_editar='<button data-id="'.$fila["id_producto"].'"
     title="Modificar" class="btn btn-xs btn-warning new-modal-producto"><i class="far fa-edit"></i></button>';
     } else {
      $btn_editar='';
     } 

  if($_SESSION['eliminar']==1 ){          
    $btn_eliminar;
    } else {
      $btn_eliminar='';
    }
       
$html.='<tr>
            <td>'.$c.'</td>
            <td>'.$fila["id_producto"].'</td>
            <td>'.$fila["nombre_producto"].'</td>
            <td>'.$fila["stock_inicial"].'</td>
            <td>'.$fila["stock_actual"].'</td>
            <td>'.$fila["descuento"].'</td>
            <td><b>'.''.$fila["expresion"]. '</b> '.$fila["precio_compra"].'</td>
            <td>'.$fila["peso"].' '.$fila["unidad_medida"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_producto"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            
            <td>'.$btn_editar.' '.$btn_eliminar.'

            <button data-id="'.$fila["id_producto"].'"
            title="Modificar" class="btn btn-xs btn-primary new-modal-show-producto"><i class="far fa-eye"></i></button>
            </td>

        </tr>';
        $c++;
}
$html.="</tbody> </table>";
$html.='<script> 
  $(function () {
    $("#example1").DataTable({
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
