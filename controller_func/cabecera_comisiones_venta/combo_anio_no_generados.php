<option  value="0" >.::Seleccionar año::.</option>
<?php
include_once("../../model_class/cabecera_comisiones_venta.php");
$obj=new cabecera_comisiones_venta();
$rs=$obj->combo_anio_comisiones_nogenerados();
while($fila=mysqli_fetch_assoc($rs)){
?>
<option  value="<?php echo $fila["anio_detalle"]?>"><?php echo $fila["anio_detalle"]?></option>
<?php }?>
