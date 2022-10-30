<?php
//obtenemos las sub categoria segun la categoria escogido
include_once("../../model_class/sub_categoria_producto.php");
$obj_scp= new sub_categoria_producto();
$obj_scp->id_categoria_producto=$_REQUEST['id_categoria_seleccionado'];
$rs_Sub_categoria=$obj_scp->combo_x_categoria();
$result="<option  value ='0'>SELECCIONE</option>";
while($fila_p=mysqli_fetch_assoc($rs_Sub_categoria)){
      $result.="
      <option value=".$fila_p['id_sub_categoria_producto'].">".$fila_p['sub_categoria']."</option>
      ";
}
echo $result;
exit();
?>