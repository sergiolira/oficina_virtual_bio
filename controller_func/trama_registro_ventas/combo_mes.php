<option  value="0" >.::Seleccionar mes::.</option>
<?php
include_once("../../model_class/trama_registro_ventas.php");
$obj=new trama_registro_ventas();
$obj->anio_detalle=$_REQUEST["slt_anio_c"];
$rs=$obj->combo_mes();
while($fila=mysqli_fetch_assoc($rs)){
?>
<option  value="<?php echo $fila["mes_detalle"]?>"><?php echo $fila["mes_detalle"]?></option>
<?php }?>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('#slt_mes_c').select2({
      theme: 'bootstrap4'
    });
  });
</script>