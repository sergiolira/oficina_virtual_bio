<option  value="0" >.::Seleccionar mes::.</option>
<?php
include_once("../../model_class/cabecera_comisiones_venta.php");
$obj=new cabecera_comisiones_venta();
$obj->anio=$_REQUEST["slt_anio_c"];
$obj->mes=$_REQUEST["slt_mes_c"];
$rs=$obj->combo_semana_comisiones_nogenerados();
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