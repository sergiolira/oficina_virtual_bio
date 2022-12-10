<?php
include_once("../../model_class/tipo_venta.php");
$obj=new tipo_venta();
$rs=$obj->combo();
while($fila=mysqli_fetch_assoc($rs)){
?>
<option  value="<?php echo $fila["id_tipo_venta"]?>"><?php echo $fila["tipo_venta"]?></option>
<?php }?>