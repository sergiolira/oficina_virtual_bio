<option  value="0" >.::Seleccionar semana::.</option>
<?php
include_once("../../model_class/trama_registro_ventas.php");
$obj=new trama_registro_ventas();
$obj->anio_detalle=$_REQUEST["slt_anio_c"];
$obj->mes_detalle=$_REQUEST["slt_mes_c"];
$rs=$obj->combo_semana();
while($fila=mysqli_fetch_assoc($rs)){
?>
<option  value="<?php echo $fila["semana_detalle"]?>"><?php echo $fila["semana_detalle"]?></option>
<?php }?>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('#slt_semana_c').select2({
      theme: 'bootstrap4'
    });
  });

</script>