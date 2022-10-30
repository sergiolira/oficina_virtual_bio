<?php
//obtenemos distritos según la provincia escogido
include_once("../../model_class/ubigeo_peru_districts.php");
$obj_up= new ubigeo_peru_districts();
$obj_up->province_id=$_REQUEST['id_provincia_seleccionado'];
$rs_distrito=$obj_up->combo_x_prov();
$result="<option  value ='0'>SELECCIONAR DISTRITO</option>";
while($fila_p=mysqli_fetch_assoc($rs_distrito)){
      $result.="
      <option value=".$fila_p['id'].">".$fila_p['name']."</option>
      ";
}
echo $result;
exit();
?>