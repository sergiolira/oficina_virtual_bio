<?php
//obtenemos la provincia según el departamento escogido
include_once("../../model_class/ubigeo_peru_provinces.php");
$obj_up= new ubigeo_peru_provinces();
$obj_up->department_id=$_REQUEST['id_departamento_seleccionado'];
$rs_provincia=$obj_up->combo_x_dep();
$result="<option  value ='0'>SELECCIONAR PROVINCIA</option>";
while($fila_p=mysqli_fetch_assoc($rs_provincia)){
      $result.="
      <option value=".$fila_p['id'].">".$fila_p['name']."</option>
      ";
}
echo $result;
exit();
?>