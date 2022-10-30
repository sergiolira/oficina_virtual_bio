<?php
// include_once("../../model_class/producto.php");
include_once("../../model_class/imagen_producto.php");
// $obj_prod= new producto();
$obj_im= new imagen_producto();
$obj_im->id_producto=$_POST["id"];
$rs_fotos=$obj_im->fotos_x_producto();
$result="";
while($fila_im=mysqli_fetch_assoc($rs_fotos)){
    $result.="
    <div id=".$fila_im['id_imagen_producto'].">
        <div class='prevImage'>
            <img src=".$fila_im['url_imagen'].">
        </div>
        <button class='btnDeleteImage' type='button' data-id=".$fila_im['id_imagen_producto']."><i class='fas fa-trash-alt'></i></button>
    </div>
    ";
}

echo $result;
exit();

?>


