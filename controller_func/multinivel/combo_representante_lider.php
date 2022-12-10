<option  value="0" >Seleccionar o escribir</option>
<?php
include_once("../../model_class/representante.php");
$obj=new representante();
$rs=$obj->combo_representante_lider();
while($fila=mysqli_fetch_assoc($rs)){
?>
<option  value="<?php echo $fila["nro_documento"]?>">
<?php echo $fila["nro_documento"].' - '.$fila["nombre"].' '.$fila["apellidopaterno"].' '.$fila["apellidomaterno"];?></option>
<?php }?>

