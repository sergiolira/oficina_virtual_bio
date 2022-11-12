<option  value="0" >General | Ver de todos los Lideres</option>
<?php
include_once("../../model_class/representante.php");
$obj=new representante();
$rs=$obj->combo_representante_lider();
while($fila=mysqli_fetch_assoc($rs)){
?>
<option  value="<?php echo $fila["ruc"]?>"><?php echo $fila["ruc"].' - '.$fila["nombre"].' '.$fila["apellidopaterno"].' '.$fila["apellidomaterno"];?></option>
<?php }?>

