<?php
include_once("../../model_class/modulo.php");
include_once("../../model_class/sub_modulo.php");
$obj_m= new modulo();
$obj_sm= new sub_modulo();

$obj_m->nivel=$_REQUEST['nivel_seleccionado'];

if ($obj_m->nivel==1 || $obj_m->nivel==2) {
    $obj_m->nivel=2;
    $rs_modulo=$obj_m->combo_x_nivel();
    $result="<option  value ='0'>NO NECESARIO</option>";
   /*  while($fila_m=mysqli_fetch_assoc($rs_modulo)){
        $result.="
        <option value=".$fila_m['id_modulo'].">".$fila_m['titulo']."</option>
        "; 
    } */
    echo $result;
    exit();
}

$obj_sm->nivel=$_REQUEST['nivel_seleccionado'];

if ($obj_sm->nivel==3) {
    $obj_sm->nivel=2;
    $rs_submodulo=$obj_sm->combosub_x_nivel();
    $result="<option  value ='0'>SELECCIONE SUB MODULO</option>";
    while($fila_sm=mysqli_fetch_assoc($rs_submodulo)){
        $result.="
        <option value=".$fila_sm['id_sub_modulo'].">".$fila_sm['sub_modulo']."</option>
        "; 
    }
    echo $result;
    exit();
}


?>
