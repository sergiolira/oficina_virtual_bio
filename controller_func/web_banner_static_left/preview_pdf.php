<?php
include_once("../../model_class/web_banner_static_left.php");
$obj_web_banner_static_left= new web_banner_static_left();
$obj_web_banner_static_left->id_web_banner_static_left=$_REQUEST["id"];
$result = $obj_web_banner_static_left->preview_pdf();
echo json_encode($result);
?>