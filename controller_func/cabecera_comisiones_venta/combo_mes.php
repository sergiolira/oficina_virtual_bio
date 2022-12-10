<option  value="0" >.::Seleccionar mes::.</option>
<?php
include_once("../../model_class/cabecera_comisiones_venta.php");
$obj=new cabecera_comisiones_venta();
$obj->anio=$_REQUEST["slt_anio_c"];
$rs=$obj->combo_mes();
while($fila=mysqli_fetch_assoc($rs)){
?>
<option  value="<?php echo $fila["mes"]?>"><?php echo $fila["mes"]?></option>
<?php }?>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('#slt_mes_c').select2({
      theme: 'bootstrap4'
    });
  });
</script>