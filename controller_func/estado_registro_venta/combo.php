<?php
include_once("../../model_class/estado_registro_venta.php");
$obj=new estado_registro_venta();
$rs=$obj->combo();
while($fila=mysqli_fetch_assoc($rs)){
?>
<option  value="<?php echo $fila["id_estado_registro_venta"]?>"><?php echo $fila["estado_registro_venta"]?></option>
<?php }?>