<option  value="0" >.::Seleccionar año::.</option>
<?php 
include_once("../../model_class/cabecera_comisiones_venta.php");
$obj=new cabecera_comisiones_venta();
$rs=$obj->combo_anio();
while($fila=mysqli_fetch_assoc($rs)){
?>
<option  value="<?php echo $fila["anio"]?>"><?php echo $fila["anio"]?></option>
<?php }?>