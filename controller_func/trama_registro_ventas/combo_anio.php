<option  value="0" >.::Seleccionar año::.</option>

<?php 
include_once("../../model_class/trama_registro_ventas.php");
$obj=new trama_registro_ventas();
$rs=$obj->combo_anio();
while($fila=mysqli_fetch_assoc($rs)){
?>
<option  value="<?php echo $fila["anio_detalle"]?>"><?php echo $fila["anio_detalle"]?></option>
<?php }?>