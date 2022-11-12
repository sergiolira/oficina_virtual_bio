<?php
session_start();

include_once("../../model_class/representante.php");
$obj=new representante();





if(isset($_REQUEST["sltruc_buscar"]) and  trim($_REQUEST["sltruc_buscar"])!=0){
  $txtpatrocinador=$_REQUEST["sltruc_buscar"];
}
if(isset($_REQUEST["txtruc_buscar"]) and  trim($_REQUEST["txtruc_buscar"])!=""){
  $txtpatrocinador=$_REQUEST["txtruc_buscar"];
}


$txtpatrocinador=$_SESSION["ruc"];

$ruc1='';

$ruc1_2='';$ruc2_2='';$ruc3_2='';

$ruc1_3='';$ruc2_3='';$ruc3_3='';$ruc4_3='';$ruc5_3='';$ruc6_3='';$ruc7_3='';$ruc8_3='';$ruc9_3='';

$ruc1_4='';$ruc2_4='';$ruc3_4='';$ruc4_4='';$ruc5_4='';$ruc6_4='';$ruc7_4='';$ruc8_4='';$ruc9_4='';$ruc10_4='';$ruc11_4='';$ruc12_4='';$ruc13_4='';$ruc14_4='';$ruc15_4='';$ruc16_4='';$ruc17_4='';$ruc18_4='';$ruc19_4='';$ruc20_4='';$ruc21_4='';$ruc22_4='';$ruc23_4='';$ruc24_4='';$ruc25_4='';$ruc26_4='';$ruc27_4='';

$ruc1_5='';$ruc2_5='';$ruc3_5='';$ruc4_5='';$ruc5_5='';$ruc6_5='';$ruc7_5='';$ruc8_5='';$ruc9_5='';$ruc10_5='';$ruc11_5='';$ruc12_5='';$ruc13_5='';$ruc14_5='';$ruc15_5='';$ruc16_5='';$ruc17_5='';$ruc18_5='';$ruc19_5='';$ruc20_5='';$ruc21_5='';$ruc22_5='';$ruc23_5='';$ruc24_5='';$ruc25_5='';$ruc26_5='';$ruc27_5='';$ruc28_5='';$ruc29_5='';$ruc30_5='';$ruc31_5='';$ruc32_5='';$ruc33_5='';$ruc34_5='';$ruc35_5='';$ruc36_5='';$ruc37_5='';$ruc38_5='';$ruc39_5='';$ruc40_5='';$ruc41_5='';$ruc42_5='';$ruc43_5='';$ruc44_5='';$ruc45_5='';$ruc46_5='';$ruc47_5='';$ruc48_5='';$ruc49_5='';$ruc50_5='';$ruc51_5='';$ruc52_5='';$ruc53_5='';$ruc54_5='';$ruc55_5='';$ruc56_5='';$ruc57_5='';$ruc58_5='';$ruc59_5='';$ruc60_5='';$ruc61_5='';$ruc62_5='';$ruc63_5='';$ruc64_5='';$ruc65_5='';$ruc66_5='';$ruc67_5='';$ruc68_5='';$ruc69_5='';$ruc70_5='';$ruc71_5='';$ruc72_5='';$ruc73_5='';$ruc74_5='';$ruc75_5='';$ruc76_5='';$ruc77_5='';$ruc78_5='';$ruc79_5='';$ruc80_5='';$ruc81_5='';

$ruc1_cat='';

$ruc1_2_cat='';$ruc2_2_cat='';$ruc3_2_cat='';

$ruc1_3_cat='';$ruc2_3_cat='';$ruc3_3_cat='';$ruc4_3_cat='';$ruc5_3_cat='';$ruc6_3_cat='';$ruc7_3_cat='';$ruc8_3_cat='';$ruc9_3_cat='';

$ruc1_4_cat='';$ruc2_4_cat='';$ruc3_4_cat='';$ruc4_4_cat='';$ruc5_4_cat='';$ruc6_4_cat='';$ruc7_4_cat='';$ruc8_4_cat='';$ruc9_4_cat='';$ruc10_4_cat='';$ruc11_4_cat='';$ruc12_4_cat='';$ruc13_4_cat='';$ruc14_4_cat='';$ruc15_4_cat='';$ruc16_4_cat='';$ruc17_4_cat='';$ruc18_4_cat='';$ruc19_4_cat='';$ruc20_4_cat='';$ruc21_4_cat='';$ruc22_4_cat='';$ruc23_4_cat='';$ruc24_4_cat='';$ruc25_4_cat='';$ruc26_4_cat='';$ruc27_4_cat='';

$ruc1_5_cat='';$ruc2_5_cat='';$ruc3_5_cat='';$ruc4_5_cat='';$ruc5_5_cat='';$ruc6_5_cat='';$ruc7_5_cat='';$ruc8_5_cat='';$ruc9_5_cat='';$ruc10_5_cat='';$ruc11_5_cat='';$ruc12_5_cat='';$ruc13_5_cat='';$ruc14_5_cat='';$ruc15_5_cat='';$ruc16_5_cat='';$ruc17_5_cat='';$ruc18_5_cat='';$ruc19_5_cat='';$ruc20_5_cat='';$ruc21_5_cat='';$ruc22_5_cat='';$ruc23_5_cat='';$ruc24_5_cat='';$ruc25_5_cat='';$ruc26_5_cat='';$ruc27_5_cat='';$ruc28_5_cat='';$ruc29_5_cat='';$ruc30_5_cat='';$ruc31_5_cat='';$ruc32_5_cat='';$ruc33_5_cat='';$ruc34_5_cat='';$ruc35_5_cat='';$ruc36_5_cat='';$ruc37_5_cat='';$ruc38_5_cat='';$ruc39_5_cat='';$ruc40_5_cat='';$ruc41_5_cat='';$ruc42_5_cat='';$ruc43_5_cat='';$ruc44_5_cat='';$ruc45_5_cat='';$ruc46_5_cat='';$ruc47_5_cat='';$ruc48_5_cat='';$ruc49_5_cat='';$ruc50_5_cat='';$ruc51_5_cat='';$ruc52_5_cat='';$ruc53_5_cat='';$ruc54_5_cat='';$ruc55_5_cat='';$ruc56_5_cat='';$ruc57_5_cat='';$ruc58_5_cat='';$ruc59_5_cat='';$ruc60_5_cat='';$ruc61_5_cat='';$ruc62_5_cat='';$ruc63_5_cat='';$ruc64_5_cat='';$ruc65_5_cat='';$ruc66_5_cat='';$ruc67_5_cat='';$ruc68_5_cat='';$ruc69_5_cat='';$ruc70_5_cat='';$ruc71_5_cat='';$ruc72_5_cat='';$ruc73_5_cat='';$ruc74_5_cat='';$ruc75_5_cat='';$ruc76_5_cat='';$ruc77_5_cat='';$ruc78_5_cat='';$ruc79_5_cat='';$ruc80_5_cat='';$ruc81_5_cat='';


$js_json="";$js_json_2="";$js_json_3="";$js_json_4="";$js_json_5="";

$patrocinador_directo=$txtpatrocinador;

$obj->ruc=$patrocinador_directo;

$rs_n_uno=$obj->dato_representante_nivel_uno($patrocinador_directo);
$rs_count_rep_x_pat_dir=$obj->count_rep_x_pat_dir($patrocinador_directo);
if($fila_n_uno=mysqli_fetch_assoc($rs_n_uno)){
  $ruc1=$fila_n_uno["ruc"];
  $ruc1_cat=$fila_n_uno["id_nivel_categoria"];
  $js_json.='{ "id":"1", "Datos": "'.$fila_n_uno["nombre"]." ".$fila_n_uno["apellidopaterno"]." ".$fila_n_uno["apellidomaterno"].'","img": "imas/logo/usulider.png", "RUC": "'.$fila_n_uno["ruc"].'","email":"'.$fila_n_uno["correo"].'"},';
}

/*Validamos su categoria nivel y sus afialidos*/
/*Si es categoria basico plata y oro y no tiene ningun afiliado */
if($ruc1_cat<=3 && $rs_count_rep_x_pat_dir=="0"){

  
    $js_json_2.='{ "id":"2","pid":"1", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_2.='{ "id":"3","pid":"1", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
    $js_json_3.='{ "id":"4","pid":"2", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_3.='{ "id":"5","pid":"2", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_3.='{ "id":"6","pid":"3", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_3.='{ "id":"7","pid":"3", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
    $js_json_4.='{ "id":"8","pid":"4", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"9","pid":"4", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"10","pid":"5", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"11","pid":"5", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
    $js_json_4.='{ "id":"12","pid":"6", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"13","pid":"6", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"14","pid":"7", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"15","pid":"7", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
    $js_json_5.='{ "id":"16","pid":"8", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"17","pid":"8", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"18","pid":"9", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"19","pid":"9", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
    $js_json_5.='{ "id":"20","pid":"10", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"21","pid":"10", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"22","pid":"11", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"23","pid":"11", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"24","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"25","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"26","pid":"13", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"27","pid":"13", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
    $js_json_5.='{ "id":"28","pid":"14", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"29","pid":"14", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"30","pid":"15", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"31","pid":"15", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
  
}
  
  
  /*Si es categoria diamante y no tiene ningun afiliado */
if($ruc1_cat>=4 && $rs_count_rep_x_pat_dir=="0"){
    
    $js_json_2.='{ "id":"2","pid":"1", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_2.='{ "id":"3","pid":"1", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_2.='{ "id":"4","pid":"1", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
    $js_json_3.='{ "id":"5","pid":"2", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_3.='{ "id":"6","pid":"2", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_3.='{ "id":"7","pid":"3", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_3.='{ "id":"8","pid":"3", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_3.='{ "id":"9","pid":"4", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_3.='{ "id":"10","pid":"4", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    
    $js_json_4.='{ "id":"11","pid":"5", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"12","pid":"5", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"13","pid":"6", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"14","pid":"6", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"15","pid":"7", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"16","pid":"7", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
    $js_json_4.='{ "id":"17","pid":"8", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"18","pid":"8", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"19","pid":"9", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"20","pid":"9", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"21","pid":"10", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_4.='{ "id":"22","pid":"10", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    
    
    $js_json_5.='{ "id":"23","pid":"11", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"24","pid":"11", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"25","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"26","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"27","pid":"13", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"28","pid":"13", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"29","pid":"14", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"30","pid":"14", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"31","pid":"15", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"32","pid":"15", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"33","pid":"16", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"34","pid":"16", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"35","pid":"17", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"36","pid":"17", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"37","pid":"18", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"38","pid":"18", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"39","pid":"19", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"40","pid":"19", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"41","pid":"20", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"42","pid":"20", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"43","pid":"21", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"44","pid":"21", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
    $js_json_5.='{ "id":"45","pid":"22", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    $js_json_5.='{ "id":"46","pid":"22", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
}
  
  /*Categoria basico , plata y oro y si tienen afiliados directos*/
if($ruc1_cat<=3 && $rs_count_rep_x_pat_dir!="0"){
  
    $rs=$obj->listar_representantes_sponsor($patrocinador_directo);
    while($fila=mysqli_fetch_assoc($rs)){
      /*Inicio Ruc 1 nivel 2*/
      /*Izquierda 1*/
      if($fila["posicion"]==1){
        $ruc1_2=$fila["ruc"];
        $ruc1_2_cat=$fila["id_nivel_categoria"];
        $js_json_2.='{"id":"'.$fila["ruc"].'","pid":"1","Datos":"'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila["ruc"].'","email":"'.$fila["correo"].'"},';
      
      }
      /*Centro 2*/
      if($fila["posicion"]==2){
        $ruc2_2=$fila["ruc"];
        $ruc2_2_cat=$fila["id_nivel_categoria"];
        $js_json_2.='{"id":"'.$fila["ruc"].'","pid":"1","Datos":"'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila["ruc"].'","email":"'.$fila["correo"].'"},';
  
      }
      /*Derecha 3
      if($fila["posicion"]==3){
        $ruc3_2=$fila["ruc"];
        $js_json_2.='{"id":"'.$fila["ruc"].'","pid":"1","Datos":"'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila["ruc"].'","email":"'.$fila["correo"].'"},';
  
      }*/
      
  
        $rs_4=$obj->listar_representantes_sponsor($fila["ruc"]);
        while ($fila_4=mysqli_fetch_assoc($rs_4)) {
              /*Inicio Ruc 1 nivel 3*/
              /*Izquierda 1*/
              if($fila_4["posicion"]==1 && $fila["ruc"]==$ruc1_2){
                $ruc1_3=$fila_4["ruc"];
                $ruc1_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc1_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Centro 2*/
              if($fila_4["posicion"]==2 && $fila["ruc"]==$ruc1_2){
                $ruc2_3=$fila_4["ruc"];
                $ruc2_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc1_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Derecha 3*/
              if($fila_4["posicion"]==3 && $fila["ruc"]==$ruc1_2 && $ruc1_2_cat>=4){
                $ruc3_3=$fila_4["ruc"];
                $ruc3_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc1_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Fin Ruc 1 nivel 3*/
  
              /*Inicio Ruc 2 nivel 3*/
              /*Izquierda 1*/
              if($fila_4["posicion"]==1 && $fila["ruc"]==$ruc2_2){
                $ruc4_3=$fila_4["ruc"];
                $ruc4_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc2_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Centro 2*/
              if($fila_4["posicion"]==2 && $fila["ruc"]==$ruc2_2){
                $ruc5_3=$fila_4["ruc"];
                $ruc5_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc2_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Derecha 3*/
              if($fila_4["posicion"]==3 && $fila["ruc"]==$ruc2_2 && $ruc2_2_cat>=4){
                $ruc6_3=$fila_4["ruc"];
                $ruc6_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc2_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Fin Ruc 2 nivel 3*/
  
              /*Inicio Ruc 3 nivel 3
              Izquierda 1
              if($fila_4["posicion"]==1 && $fila["ruc"]==$ruc3_2){
                $ruc7_3=$fila_4["ruc"];
                $ruc7_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc3_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              Centro 2
              if($fila_4["posicion"]==2 && $fila["ruc"]==$ruc3_2){
                $ruc8_3=$fila_4["ruc"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc3_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              Derecha 3
              if($fila_4["posicion"]==3 && $fila["ruc"]==$ruc3_2){
                $ruc9_3=$fila_4["ruc"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc3_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              Fin Ruc 3 nivel 3*/
  
                $rs_8=$obj->listar_representantes_sponsor($fila_4["ruc"]);
                while ($fila_8=mysqli_fetch_assoc($rs_8)) {
                  /*Inicio Ruc 1 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc1_3){
                    $ruc1_4=$fila_8["ruc"];
                    $ruc1_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc1_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc1_3){
                    $ruc2_4=$fila_8["ruc"];
                    $ruc2_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc1_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc1_3 && $ruc1_3_cat>=4){
                    $ruc3_4=$fila_8["ruc"];
                    $ruc3_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc1_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 1 nivel 4*/
  
                  /*Inicio Ruc 2 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc2_3){
                    $ruc4_4=$fila_8["ruc"];
                    $ruc4_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc2_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc2_3){
                    $ruc5_4=$fila_8["ruc"];
                    $ruc5_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc2_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc2_3 && $ruc2_3_cat>=4){
                    $ruc6_4=$fila_8["ruc"];
                    $ruc6_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc2_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img": "imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 2 nivel 4*/
  
                  /*Inicio Ruc 3 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc3_3){
                    $ruc7_4=$fila_8["ruc"];
                    $ruc7_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc3_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc3_3){
                    $ruc8_4=$fila_8["ruc"];
                    $ruc8_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc3_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc3_3 && $ruc3_3_cat>=4){
                    $ruc9_4=$fila_8["ruc"];
                    $ruc9_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc3_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 3 nivel 4*/
  
                  /*Inicio Ruc 4 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc4_3){
                    $ruc10_4=$fila_8["ruc"];
                    $ruc10_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc4_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc4_3){
                    $ruc11_4=$fila_8["ruc"];
                    $ruc11_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc4_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc4_3 && $ruc4_3_cat>=4){
                    $ruc12_4=$fila_8["ruc"];
                    $ruc12_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc4_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 4 nivel 4*/
  
                  /*Inicio Ruc 5 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc5_3){
                    $ruc13_4=$fila_8["ruc"];
                    $ruc13_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc5_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc5_3){
                    $ruc14_4=$fila_8["ruc"];
                    $ruc14_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc5_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc5_3 && $ruc5_3_cat>=4){
                    $ruc15_4=$fila_8["ruc"];
                    $ruc15_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc5_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 5 nivel 4*/
  
                  /*Inicio Ruc 6 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc6_3){
                    $ruc16_4=$fila_8["ruc"];
                    $ruc16_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc6_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc6_3){
                    $ruc17_4=$fila_8["ruc"];
                    $ruc17_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc6_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc6_3 && $ruc6_3_cat>=4){
                    $ruc18_4=$fila_8["ruc"];
                    $ruc18_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc6_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 6 nivel 4*/
  
                  /*Inicio Ruc 7 nivel 4
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc7_3){
                    $ruc19_4=$fila_8["ruc"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc7_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  Centro 2
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc7_3){
                    $ruc20_4=$fila_8["ruc"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc7_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  Derecha 3
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc7_3){
                    $ruc21_4=$fila_8["ruc"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc7_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }Fin Ruc 7 nivel 4
  
                  Inicio Ruc 8 nivel 4
                  Izquierda 1
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc8_3){
                    $ruc22_4=$fila_8["ruc"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc8_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  Centro 2
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc8_3){
                    $ruc23_4=$fila_8["ruc"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc8_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  Derecha 3
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc8_3){
                    $ruc24_4=$fila_8["ruc"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc8_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  Fin Ruc 8 nivel 4
  
                  Inicio Ruc 9 nivel 4
                  Izquierda 1
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc9_3){
                    $ruc25_4=$fila_8["ruc"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc9_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  Centro 2
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc9_3){
                    $ruc26_4=$fila_8["ruc"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc9_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  Derecha 3
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc9_3){
                    $ruc27_4=$fila_8["ruc"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc9_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  Fin Ruc 9 nivel 4*/
                      $rs_16=$obj->listar_representantes_sponsor($fila_8["ruc"]);
                      while ($fila_16=mysqli_fetch_assoc($rs_16)) {
  
                          /*Inicio Ruc 1 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc1_4){
                            $ruc1_5=$fila_16["ruc"];
                            $ruc1_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc1_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc1_4){
                            $ruc2_5=$fila_16["ruc"];
                            $ruc2_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc1_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc1_4 && $ruc1_4_cat>=4){
                            $ruc3_5=$fila_16["ruc"];
                            $ruc3_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc1_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 1 nivel 5*/
  
                          /*Inicio Ruc 2 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc2_4){
                            $ruc4_5=$fila_16["ruc"];
                            $ruc4_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc2_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc2_4){
                            $ruc5_5=$fila_16["ruc"];
                            $ruc5_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc2_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc2_4 && $ruc2_4_cat>=4){
                            $ruc6_5=$fila_16["ruc"];
                            $ruc6_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc2_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 2 nivel 5*/
  
                          /*Inicio Ruc 3 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc3_4){
                            $ruc7_5=$fila_16["ruc"];
                            $ruc7_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc3_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc3_4){
                            $ruc8_5=$fila_16["ruc"];
                            $ruc8_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc3_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc3_4 && $ruc3_4_cat>=4){
                            $ruc9_5=$fila_16["ruc"];
                            $ruc9_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc3_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 3 nivel 5*/
  
                          /*Inicio Ruc 4 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc4_4){
                            $ruc10_5=$fila_16["ruc"];
                            $ruc10_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc4_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc4_4){
                            $ruc11_5=$fila_16["ruc"];
                            $ruc11_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc4_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc4_4 && $ruc4_4_cat>=4){
                            $ruc12_5=$fila_16["ruc"];
                            $ruc12_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc4_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 4 nivel 5*/
  
                          /*Inicio Ruc 5 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc5_4){
                            $ruc13_5=$fila_16["ruc"];
                            $ruc13_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc5_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc5_4){
                            $ruc14_5=$fila_16["ruc"];
                            $ruc14_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc5_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc5_4 && $ruc5_4_cat>=4){
                            $ruc15_5=$fila_16["ruc"];
                            $ruc15_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc5_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 5 nivel 5*/
  
                          /*Inicio Ruc 6 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc6_4){
                            $ruc16_5=$fila_16["ruc"];
                            $ruc16_5_cat=$fila_16["rid_nivel_categoriauc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc6_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc6_4){
                            $ruc17_5=$fila_16["ruc"];
                            $ruc17_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc6_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc6_4 && $ruc6_4_cat>=4){
                            $ruc18_5=$fila_16["ruc"];
                            $ruc18_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc6_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 6 nivel 5*/
  
                          /*Inicio Ruc 7 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc7_4){
                            $ruc19_5=$fila_16["ruc"];
                            $ruc19_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc7_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc7_4){
                            $ruc20_5=$fila_16["ruc"];
                            $ruc20_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc7_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc7_4 && $ruc7_4_cat>=4){
                            $ruc21_5=$fila_16["ruc"];
                            $ruc21_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc7_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 7 nivel 5*/
  
                          /*Inicio Ruc 8 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc8_4){
                            $ruc22_5=$fila_16["ruc"];
                            $ruc22_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc8_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc8_4){
                            $ruc23_5=$fila_16["ruc"];
                            $ruc23_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc8_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc8_4 && $ruc8_4_cat>=4){
                            $ruc24_5=$fila_16["ruc"];
                            $ruc24_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc8_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 8 nivel 5*/
  
                          /*Inicio Ruc 9 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc9_4){
                            $ruc25_5=$fila_16["ruc"];
                            $ruc25_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc9_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc9_4){
                            $ruc26_5=$fila_16["ruc"];
                            $ruc26_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc9_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc9_4 && $ruc9_4_cat>=4){
                            $ruc27_5=$fila_16["ruc"];
                            $ruc27_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc9_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 9 nivel 5*/
  
                          /*Inicio Ruc 10 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc10_4){
                            $ruc28_5=$fila_16["ruc"];
                            $ruc28_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc10_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc10_4){
                            $ruc29_5=$fila_16["ruc"];
                            $ruc29_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc10_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc10_4 && $ruc10_4_cat>=4){
                            $ruc30_5=$fila_16["ruc"];
                            $ruc30_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc10_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 10 nivel 5*/
  
                          /*Inicio Ruc 11 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc11_4){
                            $ruc31_5=$fila_16["ruc"];
                            $ruc31_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc11_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc11_4){
                            $ruc32_5=$fila_16["ruc"];
                            $ruc32_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc11_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc11_4 && $ruc11_4_cat>=4){
                            $ruc33_5=$fila_16["ruc"];
                            $ruc33_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc11_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 11 nivel 5*/
  
                          /*Inicio Ruc 12 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc12_4){
                            $ruc34_5=$fila_16["ruc"];
                            $ruc34_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc12_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc12_4){
                            $ruc35_5=$fila_16["ruc"];
                            $ruc35_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc12_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc12_4 && $ruc12_4_cat>=4){
                            $ruc36_5=$fila_16["ruc"];
                            $ruc36_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc12_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 10 nivel 5*/
  
                          /*Inicio Ruc 13 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc13_4){
                            $ruc37_5=$fila_16["ruc"];
                            $ruc37_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc13_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc13_4){
                            $ruc38_5=$fila_16["ruc"];
                            $ruc38_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc13_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc13_4 && $ruc13_4_cat>=4){
                            $ruc39_5=$fila_16["ruc"];
                            $ruc39_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc13_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 13 nivel 5*/
  
                          /*Inicio Ruc 14 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc14_4){
                            $ruc40_5=$fila_16["ruc"];
                            $ruc40_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc14_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc14_4){
                            $ruc41_5=$fila_16["ruc"];
                            $ruc41_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc14_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc14_4 && $ruc14_4_cat>=4){
                            $ruc42_5=$fila_16["ruc"];
                            $ruc42_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc14_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 14 nivel 5*/
  
                          /*Inicio Ruc 15 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc15_4){
                            $ruc43_5=$fila_16["ruc"];
                            $ruc43_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc15_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc15_4){
                            $ruc44_5=$fila_16["ruc"];
                            $ruc44_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc15_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc15_4 && $ruc15_4_cat>=4){
                            $ruc45_5=$fila_16["ruc"];
                            $ruc45_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc15_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 15 nivel 5*/
  
                          /*Inicio Ruc 16 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc16_4){
                            $ruc46_5=$fila_16["ruc"];
                            $ruc46_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc16_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc16_4){
                            $ruc47_5=$fila_16["ruc"];
                            $ruc47_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc16_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc16_4 && $ruc16_4_cat>=4){
                            $ruc48_5=$fila_16["ruc"];
                            $ruc48_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc16_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 16 nivel 5*/
  
                          /*Inicio Ruc 17 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc17_4){
                            $ruc49_5=$fila_16["ruc"];
                            $ruc49_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc17_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc17_4){
                            $ruc50_5=$fila_16["ruc"];
                            $ruc50_5=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc17_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc17_4 && $ruc17_4_cat>=4){
                            $ruc51_5=$fila_16["ruc"];
                            $ruc51_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc17_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 17 nivel 5*/
  
                          /*Inicio Ruc 18 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc18_4){
                            $ruc52_5=$fila_16["ruc"];
                            $ruc52_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc18_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc18_4){
                            $ruc53_5=$fila_16["ruc"];
                            $ruc53_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc18_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc18_4 && $ruc18_4_cat>=4){
                            $ruc54_5=$fila_16["ruc"];
                            $ruc54_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc18_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 18 nivel 5*/
  
                          /*Inicio Ruc 19 nivel 5
                          Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc19_4){
                            $ruc55_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc19_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc19_4){
                            $ruc56_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc19_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc19_4){
                            $ruc57_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc19_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Fin Ruc 19 nivel 5
  
                          /*Inicio Ruc 20 nivel 5
                          Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc20_4){
                            $ruc58_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc20_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc20_4){
                            $ruc59_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc20_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc20_4){
                            $ruc60_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc20_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Fin Ruc 20 nivel 5
  
                          Inicio Ruc 21 nivel 5
                          Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc21_4){
                            $ruc61_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc21_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc21_4){
                            $ruc62_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc21_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc21_4){
                            $ruc63_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc21_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 21 nivel 5*/
  
                          /*Inicio Ruc 22 nivel 5
                          Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc22_4){
                            $ruc64_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc22_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc22_4){
                            $ruc65_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc22_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc22_4){
                            $ruc66_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc22_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Fin Ruc 22 nivel 5
  
                          Inicio Ruc 23 nivel 5
                          Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc23_4){
                            $ruc67_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc23_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc23_4){
                            $ruc68_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc23_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc23_4){
                            $ruc69_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc23_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Fin Ruc 23 nivel 5
  
                          Inicio Ruc 24 nivel 5
                          Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc24_4){
                            $ruc70_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc24_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc24_4){
                            $ruc71_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc24_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc24_4){
                            $ruc72_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc24_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Fin Ruc 24 nivel 5
  
                          Inicio Ruc 25 nivel 5
                          Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc25_4){
                            $ruc73_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc25_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc25_4){
                            $ruc74_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc25_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc25_4){
                            $ruc75_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc25_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Fin Ruc 25 nivel 5
  
                          Inicio Ruc 26 nivel 5
                          Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc26_4){
                            $ruc76_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc26_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc26_4){
                            $ruc77_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc26_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc26_4){
                            $ruc78_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc26_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Fin Ruc 26 nivel 5
  
                          Inicio Ruc 27 nivel 5
                          Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc27_4){
                            $ruc79_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc27_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc27_4){
                            $ruc80_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc27_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc27_4){
                            $ruc81_5=$fila_16["ruc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc27_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          Fin Ruc 27 nivel 5*/
  
  
  
                      }
                }
        }
  
    }
  
    /**Validamos campos vacios de red binaria  */
  
    if($ruc1_2==""){
      $ruc1_2="12";
      $ruc1_2_cat="1";
      $js_json_2.='{"id":"12","pid":"1","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
      
      $js_json_3.='{ "id":"4","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_3.='{ "id":"5","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"8","pid":"4", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"9","pid":"4", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"10","pid":"5", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"11","pid":"5", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      
      $js_json_5.='{ "id":"16","pid":"8", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"17","pid":"8", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"18","pid":"9", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"19","pid":"9", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
      $js_json_5.='{ "id":"20","pid":"10", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"21","pid":"10", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"22","pid":"11", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"23","pid":"11", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc2_2==""){
      $ruc2_2="22";
      $ruc2_2_cat="1";
      $js_json_2.='{"id":"22","pid":"1","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_3.='{ "id":"6","pid":"22", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_3.='{ "id":"7","pid":"22", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"12","pid":"6", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"13","pid":"6", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"14","pid":"7", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"15","pid":"7", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      
      $js_json_5.='{ "id":"24","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"25","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"26","pid":"13", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"27","pid":"13", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
      $js_json_5.='{ "id":"28","pid":"14", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"29","pid":"14", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"30","pid":"15", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"31","pid":"15", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
  
  
  
  
    /*Inicio Ruc 1 nivel 3*/
    /*Izquierda 1*/
    if($ruc1_3=="" && ($ruc1_2!="" && $ruc1_2!="12")){
      $ruc1_3="32";
      $ruc1_3_cat="1";
      $js_json_3.='{"id":"32","pid":"'.$ruc1_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"33","pid":"32", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"34","pid":"32", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"35","pid":"33", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"36","pid":"33", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"37","pid":"34", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"38","pid":"34", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
      
    }
    /*Centro 2*/
    if($ruc2_3=="" && ($ruc1_2!="" && $ruc1_2!="12")){
      $ruc2_3="39";
      $ruc2_3_cat="1";
      $js_json_3.='{"id":"39","pid":"'.$ruc1_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"40","pid":"39", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"41","pid":"39", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"42","pid":"40", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"43","pid":"40", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"44","pid":"41", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"45","pid":"41", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
    }
    /*Derecha 3*/
    if($ruc3_3=="" &&  ($ruc1_2!="" && $ruc1_2!="12") && $ruc1_2_cat>=4){
      $ruc3_3="46";
      $ruc3_3_cat="1";
      $js_json_3.='{"id":"46","pid":"'.$ruc1_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"47","pid":"46", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"48","pid":"46", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"49","pid":"47", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"50","pid":"47", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"51","pid":"48", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"52","pid":"48", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
    }
    /*Fin Ruc 1 nivel 3*/
  
    /*Inicio Ruc 2 nivel 3*/
    /*Izquierda 1*/
    if($ruc4_3=="" && ($ruc2_2!="" && $ruc2_2!="22")){
      $ruc4_3="53";
      $ruc4_3_cat="1";
      $js_json_3.='{"id":"53","pid":"'.$ruc2_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"54","pid":"53", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"55","pid":"53", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"56","pid":"54", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"57","pid":"54", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"58","pid":"55", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"59","pid":"55", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},'; 
    }
    /*Centro 2*/
    if($ruc5_3=="" && ($ruc2_2!="" && $ruc2_2!="22")){
      $ruc5_3="60";
      $ruc5_3_cat="1";
      $js_json_3.='{"id":"60","pid":"'.$ruc2_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"61","pid":"60", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"62","pid":"60", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"63","pid":"61", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"64","pid":"61", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"65","pid":"62", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"66","pid":"62", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},'; 
    }
    /*Derecha 3*/
    if($ruc6_3=="" && ($ruc2_2!="" && $ruc2_2!="22") && $ruc2_2_cat>=4){
      $ruc6_3="67";
      $ruc6_3_cat="1";
      $js_json_3.='{"id":"67","pid":"'.$ruc2_2.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"68","pid":"67", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"69","pid":"67", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"70","pid":"68", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"71","pid":"68", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"72","pid":"69", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"73","pid":"69", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},'; 
    }
    /*Fin Ruc 2 nivel 3*/
  
    /*Inicio Ruc 1 nivel 4*/
    if($ruc1_4=="" && ($ruc1_3!="" && $ruc1_3!="32")){
      $ruc1_4="74";
      $ruc1_4_cat="1";
      $js_json_4.='{"id":"74","pid":"'.$ruc1_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"75","pid":"74", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"76","pid":"74", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc2_4=="" && ($ruc1_3!="" && $ruc1_3!="32")){
      $ruc2_4="77";
      $ruc2_4_cat="1";
      $js_json_4.='{"id":"77","pid":"'.$ruc1_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"78","pid":"77", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"79","pid":"77", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc3_4=="" && ($ruc1_3!="" && $ruc1_3!="32") && $ruc1_3_cat>=4){
      $ruc3_4="80";
      $ruc3_4_cat="1";
      $js_json_4.='{"id":"80","pid":"'.$ruc1_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"81","pid":"80", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"82","pid":"80", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    // /*Fin Ruc 1 nivel 4*/
  
    /*Inicio Ruc 2 nivel 4*/
    /*Izquierda 1*/
    if($ruc4_4=="" && ($ruc2_3!="" && $ruc2_3!="39")){
      $ruc4_4="83";
      $ruc4_4_cat="1";
      $js_json_4.='{"id":"83","pid":"'.$ruc2_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"84","pid":"83", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"85","pid":"83", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc5_4=="" && ($ruc2_3!="" && $ruc2_3!="39")){
      $ruc5_4="86";
      $ruc5_4_cat="1";
      $js_json_4.='{"id":"86","pid":"'.$ruc2_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"87","pid":"86", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"88","pid":"86", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc6_4=="" && ($ruc2_3!="" && $ruc2_3!="39") && $ruc2_3_cat>=4){
      $ruc6_4="89";
      $ruc6_4_cat="1";
      $js_json_4.='{"id":"89","pid":"'.$ruc2_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"90","pid":"89", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"91","pid":"89", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 2 nivel 4*/
  
    /*Inicio Ruc 3 nivel 4*/
    /*Izquierda 1*/
    if($ruc7_4=="" && ($ruc3_3!="" && $ruc3_3!="46")){
      $ruc7_4="92";
      $ruc7_4_cat="1";
      $js_json_4.='{"id":"92","pid":"'.$ruc3_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"93","pid":"92", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"94","pid":"92", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc8_4=="" && ($ruc3_3!="" && $ruc3_3!="46")){
      $ruc8_4="95";
      $ruc8_4_cat="1";
      $js_json_4.='{"id":"95","pid":"'.$ruc3_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"96","pid":"95", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"97","pid":"95", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc9_4=="" && ($ruc3_3!="" && $ruc3_3!="46") && $ruc3_3_cat>=4){
      $ruc9_4="98";
      $ruc9_4_cat="1";
      $js_json_4.='{"id":"98","pid":"'.$ruc3_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"99","pid":"98", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"100","pid":"98", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 3 nivel 4*/
  
    /*Inicio Ruc 4 nivel 4*/
    /*Izquierda 1*/
    if($ruc10_4=="" && ($ruc4_3!="" && $ruc4_3!="53")){
      $ruc10_4="101";
      $ruc10_4_cat="1";
      $js_json_4.='{"id":"101","pid":"'.$ruc4_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"102","pid":"101", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"103","pid":"101", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc11_4=="" && ($ruc4_3!="" && $ruc4_3!="53")){
      $ruc11_4="104";
      $ruc11_4_cat="1";
      $js_json_4.='{"id":"104","pid":"'.$ruc4_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"105","pid":"104", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"106","pid":"104", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc12_4=="" && ($ruc4_3!="" && $ruc4_3!="53") && $ruc4_3_cat>=4){
      $ruc12_4="107";
      $ruc12_4_cat="1";
      $js_json_4.='{"id":"107","pid":"'.$ruc4_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"108","pid":"107", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"109","pid":"107", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 4 nivel 4*/
  
    /*Inicio Ruc 5 nivel 4*/
    /*Izquierda 1*/
    if($ruc13_4=="" && ($ruc5_3!="" && $ruc5_3!="60")){
      $ruc13_4="110";
      $ruc13_4_cat="1";
      $js_json_4.='{"id":"110","pid":"'.$ruc5_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"111","pid":"110", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"112","pid":"110", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc14_4=="" && ($ruc5_3!="" && $ruc5_3!="60")){
      $ruc14_4="113";
      $ruc14_4_cat="1";
      $js_json_4.='{"id":"113","pid":"'.$ruc5_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"114","pid":"113", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"115","pid":"113", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc15_4=="" && ($ruc5_3!="" && $ruc5_3!="60") && $ruc5_3_cat>=4){
      $ruc15_4="116";
      $ruc15_4_cat="1";
      $js_json_4.='{"id":"116","pid":"'.$ruc5_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"117","pid":"116", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"118","pid":"116", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 5 nivel 4*/
  
    /*Inicio Ruc 6 nivel 4*/
    /*Izquierda 1*/
    if($ruc16_4=="" && ($ruc6_3!="" && $ruc6_3!="67")){
      $ruc16_4="119";
      $ruc16_4_cat="1";
      $js_json_4.='{"id":"119","pid":"'.$ruc6_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"120","pid":"119", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"121","pid":"119", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc17_4=="" && ($ruc6_3!="" && $ruc6_3!="67")){
      $ruc17_4="122";
      $ruc17_4_cat="1";
      $js_json_4.='{"id":"122","pid":"'.$ruc6_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"123","pid":"122", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"124","pid":"122", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc18_4=="" && ($ruc6_3!="" && $ruc6_3!="67") && $ruc6_3_cat>=4){
      $ruc18_4="125";
      $ruc18_4_cat="1";
      $js_json_4.='{"id":"125","pid":"'.$ruc6_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"126","pid":"125", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"127","pid":"125", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
  
  
    /*Inicio Ruc 1 nivel 5*/
    /*Izquierda 1*/
    if($ruc1_5=="" && ($ruc1_4!="" && $ruc1_4!="74")){
      $ruc1_5="128";
      $ruc1_5_cat="1";
      $js_json_5.='{"id":"128","pid":"'.$ruc1_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc2_5=="" && ($ruc1_4!="" && $ruc1_4!="74")){
      $ruc2_5="129";
      $ruc2_5_cat="1";
      $js_json_5.='{"id":"129","pid":"'.$ruc1_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc3_5=="" && ($ruc1_4!="" && $ruc1_4!="74") && $ruc1_4_cat>=4){
      $ruc3_5="130";
      $ruc3_5_cat="1";
      $js_json_5.='{"id":"130","pid":"'.$ruc1_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 1 nivel 5*/
  
    /*Inicio Ruc 2 nivel 5*/
    /*Izquierda 1*/
    if($ruc4_5=="" && ($ruc2_4!="" && $ruc2_4!="77")){
      $ruc4_5="131";
      $ruc4_5_cat="1";
      $js_json_5.='{"id":"131","pid":"'.$ruc2_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc5_5=="" && ($ruc2_4!="" && $ruc2_4!="77")){
      $ruc5_5="132";
      $ruc5_5_cat="1";
      $js_json_5.='{"id":"132","pid":"'.$ruc2_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc6_5=="" && ($ruc2_4!="" && $ruc2_4!="77") && $ruc2_4_cat>=4){
      $ruc6_5="133";
      $ruc6_5_cat="1";
      $js_json_5.='{"id":"133","pid":"'.$ruc2_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 2 nivel 5*/
  
    /*Inicio Ruc 3 nivel 5*/
    /*Izquierda 1*/
    if($ruc7_5=="" && ($ruc3_4!="" && $ruc3_4!="80")){
      $ruc7_5="134";
      $ruc7_5_cat="1";
      $js_json_5.='{"id":"134","pid":"'.$ruc3_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc8_5=="" && ($ruc3_4!="" && $ruc3_4!="80")){
      $ruc8_5="135";
      $ruc8_5_cat="1";
      $js_json_5.='{"id":"135","pid":"'.$ruc3_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc9_5=="" && ($ruc3_4!="" && $ruc3_4!="80") && $ruc3_4_cat>=4){
      $ruc9_5="136";
      $ruc9_5_cat="1";
      $js_json_5.='{"id":"136","pid":"'.$ruc3_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 3 nivel 5*/
  
    /*Inicio Ruc 4 nivel 5*/
    /*Izquierda 1*/
    if($ruc10_5=="" && ($ruc4_4!="" && $ruc4_4!="83")){
      $ruc10_5="137";
      $ruc10_5_cat="1";
      $js_json_5.='{"id":"137","pid":"'.$ruc4_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc11_5=="" && ($ruc4_4!="" && $ruc4_4!="83")){
      $ruc11_5="138";
      $ruc11_5_cat="1";
      $js_json_5.='{"id":"138","pid":"'.$ruc4_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc12_5=="" && ($ruc4_4!="" && $ruc4_4!="83") && $ruc4_4_cat>=4){
      $ruc12_5="139";
      $ruc12_5_cat="1";
      $js_json_5.='{"id":"130","pid":"'.$ruc4_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 4 nivel 5*/
  
    /*Inicio Ruc 5 nivel 5*/
    /*Izquierda 1*/
    if($ruc13_5=="" && ($ruc5_4!="" && $ruc5_4!="86")){
      $ruc13_5="140";
      $ruc13_5_cat="1";
      $js_json_5.='{"id":"140","pid":"'.$ruc5_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc14_5=="" && ($ruc5_4!="" && $ruc5_4!="86")){
      $ruc14_5="141";
      $ruc14_5_cat="1";
      $js_json_5.='{"id":"141","pid":"'.$ruc5_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc15_5=="" && ($ruc5_4!="" && $ruc5_4!="86") && $ruc5_4_cat>=4){
      $ruc15_5="142";
      $ruc15_5_cat="1";
      $js_json_5.='{"id":"142","pid":"'.$ruc5_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 5 nivel 5*/
  
    /*Inicio Ruc 6 nivel 5*/
    /*Izquierda 1*/
    if($ruc16_5=="" && ($ruc6_4!="" && $ruc6_4!="89")){
      $ruc16_5="143";
      $ruc16_5_cat="1";
      $js_json_5.='{"id":"143","pid":"'.$ruc6_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc17_5=="" && ($ruc6_4!="" && $ruc6_4!="89")){
      $ruc17_5="144";
      $ruc17_5_cat="1";
      $js_json_5.='{"id":"144","pid":"'.$ruc6_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc18_5=="" && ($ruc6_4!="" && $ruc6_4!="89") && $ruc6_4_cat>=4){
      $ruc18_5="145";
      $ruc18_5_cat="1";
      $js_json_5.='{"id":"145","pid":"'.$ruc6_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 6 nivel 5*/
  
    /*Inicio Ruc 7 nivel 5*/
    /*Izquierda 1*/
    if($ruc19_5=="" && ($ruc7_4!="" && $ruc7_4!="92")){
      $ruc19_5="146";
      $ruc19_5_cat="1";
      $js_json_5.='{"id":"146","pid":"'.$ruc7_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc20_5=="" && ($ruc7_4!="" && $ruc7_4!="92")){
      $ruc20_5="147";
      $ruc20_5_cat="1";
      $js_json_5.='{"id":"147","pid":"'.$ruc7_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc21_5=="" && ($ruc7_4!="" && $ruc7_4!="92") && $ruc7_4_cat>=4){
      $ruc21_5="148";
      $ruc21_5_cat="1";
      $js_json_5.='{"id":"148","pid":"'.$ruc7_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 7 nivel 5*/
  
    /*Inicio Ruc 8 nivel 5*/
    /*Izquierda 1*/
    if($ruc22_5=="" && ($ruc8_4!="" && $ruc8_4!="95")){
      $ruc22_5="149";
      $ruc22_5_cat="1";
      $js_json_5.='{"id":"149","pid":"'.$ruc8_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc23_5=="" && ($ruc8_4!="" && $ruc8_4!="95")){
      $ruc23_5="150";
      $ruc23_5_cat="1";
      $js_json_5.='{"id":"150","pid":"'.$ruc8_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc24_5=="" && ($ruc8_4!="" && $ruc8_4!="95") && $ruc8_4_cat>=4){
      $ruc24_5="151";
      $ruc24_5_cat="1";
      $js_json_5.='{"id":"151","pid":"'.$ruc8_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 8 nivel 5*/
  
    /*Inicio Ruc 9 nivel 5*/
    /*Izquierda 1*/
    if($ruc25_5=="" && ($ruc9_4!="" && $ruc9_4!="98")){
      $ruc25_5="152";
      $ruc25_5_cat="1";
      $js_json_5.='{"id":"152","pid":"'.$ruc9_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc26_5=="" && ($ruc9_4!="" && $ruc9_4!="98")){
      $ruc26_5="153";
      $ruc26_5_cat="1";
      $js_json_5.='{"id":"153","pid":"'.$ruc9_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc27_5=="" && ($ruc9_4!="" && $ruc9_4!="98") && $ruc9_4_cat>=4){
      $ruc27_5="154";
      $ruc27_5_cat="1";
      $js_json_5.='{"id":"154","pid":"'.$ruc9_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 9 nivel 5*/
  
    /*Inicio Ruc 10 nivel 5*/
    /*Izquierda 1*/
    if($ruc28_5=="" && ($ruc10_4!="" && $ruc10_4!="101")){
      $ruc28_5="155";
      $ruc28_5_cat="1";
      $js_json_5.='{"id":"155","pid":"'.$ruc10_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc29_5=="" && ($ruc10_4!="" && $ruc10_4!="101")){
      $ruc29_5="156";
      $ruc29_5_cat="1";
      $js_json_5.='{"id":"156","pid":"'.$ruc10_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc30_5=="" && ($ruc10_4!="" && $ruc10_4!="101") && $ruc10_4_cat>=4){
      $ruc30_5="157";
      $ruc30_5_cat="1";
      $js_json_5.='{"id":"157","pid":"'.$ruc10_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 10 nivel 5*/
  
    /*Inicio Ruc 11 nivel 5*/
    /*Izquierda 1*/
    if($ruc31_5=="" && ($ruc11_4!="" && $ruc11_4!="104")){
      $ruc31_5="158";
      $ruc31_5_cat="1";
      $js_json_5.='{"id":"158","pid":"'.$ruc11_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc32_5=="" && ($ruc11_4!="" && $ruc11_4!="104")){
      $ruc32_5="159";
      $ruc32_5_cat="1";
      $js_json_5.='{"id":"159","pid":"'.$ruc11_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc33_5=="" && ($ruc11_4!="" && $ruc11_4!="104") && $ruc11_4_cat>=4){
      $ruc33_5="160";
      $ruc33_5_cat="1";
      $js_json_5.='{"id":"160","pid":"'.$ruc11_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 11 nivel 5*/
  
    /*Inicio Ruc 12 nivel 5*/
    /*Izquierda 1*/
    if($ruc34_5=="" && ($ruc12_4!="" && $ruc12_4!="107")){
      $ruc34_5="161";
      $ruc34_5_cat="1";
      $js_json_5.='{"id":"161","pid":"'.$ruc12_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc35_5=="" && ($ruc12_4!="" && $ruc12_4!="107")){
      $ruc35_5="162";
      $ruc35_5_cat="1";
      $js_json_5.='{"id":"162","pid":"'.$ruc12_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc36_5=="" && ($ruc12_4!="" && $ruc12_4!="107") && $ruc12_4_cat>=4){
      $ruc36_5="163";
      $ruc36_5_cat="1";
      $js_json_5.='{"id":"163","pid":"'.$ruc12_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 10 nivel 5*/
  
    /*Inicio Ruc 13 nivel 5*/
    /*Izquierda 1*/
    if($ruc37_5=="" && ($ruc13_4!="" && $ruc13_4!="110")){
      $ruc37_5="164";
      $ruc37_5_cat="1";
      $js_json_5.='{"id":"164","pid":"'.$ruc13_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc38_5=="" && ($ruc13_4!="" && $ruc13_4!="110")){
      $ruc38_5="165";
      $ruc38_5_cat="1";
      $js_json_5.='{"id":"165","pid":"'.$ruc13_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc39_5=="" && ($ruc13_4!="" && $ruc13_4!="110") && $ruc13_4_cat>=4){
      $ruc39_5="166";
      $ruc39_5_cat="1";
      $js_json_5.='{"id":"166","pid":"'.$ruc13_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 13 nivel 5*/
  
    /*Inicio Ruc 14 nivel 5*/
    /*Izquierda 1*/
    if($ruc40_5=="" && ($ruc14_4!="" && $ruc14_4!="113")){
      $ruc40_5="167";
      $ruc40_5_cat="1";
      $js_json_5.='{"id":"167","pid":"'.$ruc1_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc41_5=="" && ($ruc14_4!="" && $ruc14_4!="113")){
      $ruc41_5="168";
      $ruc41_5_cat="1";
      $js_json_5.='{"id":"168","pid":"'.$ruc1_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc42_5=="" && ($ruc14_4!="" && $ruc14_4!="113") && $ruc14_4_cat>=4){
      $ruc42_5="169";
      $ruc42_5_cat="1";
      $js_json_5.='{"id":"169","pid":"'.$ruc1_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 14 nivel 5*/
  
    /*Inicio Ruc 15 nivel 5*/
    /*Izquierda 1*/
    if($ruc43_5=="" && ($ruc15_4!="" && $ruc14_4!="116")){
      $ruc43_5="170";
      $ruc43_5_cat="1";
      $js_json_5.='{"id":"170","pid":"'.$ruc15_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc44_5=="" && ($ruc15_4!="" && $ruc15_4!="116")){
      $ruc44_5="171";
      $ruc44_5_cat="1";
      $js_json_5.='{"id":"171","pid":"'.$ruc1_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc45_5=="" && ($ruc15_4!="" && $ruc15_4!="116") && $ruc15_4_cat>=4){
      $ruc45_5="173";
      $ruc45_5_cat="1";
      $js_json_5.='{"id":"173","pid":"'.$ruc15_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 15 nivel 5*/
  
    /*Inicio Ruc 16 nivel 5*/
    /*Izquierda 1*/
    if($ruc46_5=="" && ($ruc16_4!="" && $ruc16_4!="119")){
      $ruc46_5="174";
      $ruc46_5_cat="1";
      $js_json_5.='{"id":"174","pid":"'.$ruc16_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc47_5=="" && ($ruc16_4!="" && $ruc16_4!="119")){
      $ruc47_5="175";
      $ruc47_5_cat="1";
      $js_json_5.='{"id":"175","pid":"'.$ruc16_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc48_5=="" && ($ruc16_4!="" && $ruc16_4!="119") && $ruc16_4_cat>=4){
      $ruc48_5="176";
      $ruc48_5_cat="1";
      $js_json_5.='{"id":"176","pid":"'.$ruc16_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 16 nivel 5*/
  
    /*Inicio Ruc 17 nivel 5*/
    /*Izquierda 1*/
    if($ruc49_5=="" && ($ruc17_4!="" && $ruc17_4!="122")){
      $ruc49_5="177";
      $ruc49_5_cat="1";
      $js_json_5.='{"id":"177","pid":"'.$ruc17_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc50_5=="" && ($ruc17_4!="" && $ruc17_4!="122")){
      $ruc50_5="178";
      $ruc50_5="1";
      $js_json_5.='{"id":"178","pid":"'.$ruc17_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc51_5=="" && ($ruc17_4!="" && $ruc17_4!="122") && $ruc17_4_cat>=4){
      $ruc51_5="179";
      $ruc51_5_cat="1";
      $js_json_5.='{"id":"179","pid":"'.$ruc17_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 17 nivel 5*/
  
    /*Inicio Ruc 18 nivel 5*/
    /*Izquierda 1*/
    if($ruc52_5=="" && ($ruc18_4!="" && $ruc18_4!="125")){
      $ruc52_5="180";
      $ruc52_5_cat="1";
      $js_json_5.='{"id":"130","pid":"'.$ruc18_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc53_5=="" && ($ruc18_4!="" && $ruc18_4!="125")){
      $ruc53_5="181";
      $ruc53_5_cat="1";
      $js_json_5.='{"id":"181","pid":"'.$ruc18_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc54_5=="" && ($ruc18_4!="" && $ruc18_4!="125") && $ruc18_4_cat>=4){
      $ruc54_5="182";
      $ruc54_5_cat="1";
      $js_json_5.='{"id":"182","pid":"'.$ruc18_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
  
  
  
}
  
  /*Si es categoria diamante y si tiene afiliados directos */
if($ruc1_cat>=4 && $rs_count_rep_x_pat_dir!="0"){
  
    $rs=$obj->listar_representantes_sponsor($patrocinador_directo);
    while($fila=mysqli_fetch_assoc($rs)){
      /*Inicio Ruc 1 nivel 2*/
      /*Izquierda 1*/
      if($fila["posicion"]==1){
        $ruc1_2=$fila["ruc"];
        $ruc1_2_cat=$fila["id_nivel_categoria"];
        $js_json_2.='{"id":"'.$fila["ruc"].'","pid":"1","Datos":"'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila["ruc"].'","email":"'.$fila["correo"].'"},';
      
      }
      /*Centro 2*/
      if($fila["posicion"]==2){
        $ruc2_2=$fila["ruc"];
        $ruc2_2_cat=$fila["id_nivel_categoria"];
        $js_json_2.='{"id":"'.$fila["ruc"].'","pid":"1","Datos":"'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila["ruc"].'","email":"'.$fila["correo"].'"},';
  
      }
      /*Derecha 3*/
      if($fila["posicion"]==3){
        $ruc3_2=$fila["ruc"];
        $ruc3_2_cat=$fila["id_nivel_categoria"];
        $js_json_2.='{"id":"'.$fila["ruc"].'","pid":"1","Datos":"'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila["ruc"].'","email":"'.$fila["correo"].'"},';
  
      }
      
  
        $rs_4=$obj->listar_representantes_sponsor($fila["ruc"]);
        while ($fila_4=mysqli_fetch_assoc($rs_4)) {
              /*Inicio Ruc 1 nivel 3*/
              /*Izquierda 1*/
              if($fila_4["posicion"]==1 && $fila["ruc"]==$ruc1_2){
                $ruc1_3=$fila_4["ruc"];
                $ruc1_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc1_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Centro 2*/
              if($fila_4["posicion"]==2 && $fila["ruc"]==$ruc1_2){
                $ruc2_3=$fila_4["ruc"];
                $ruc2_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc1_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Derecha 3*/
              if($fila_4["posicion"]==3 && $fila["ruc"]==$ruc1_2 && $ruc1_2_cat>=4){
                $ruc3_3=$fila_4["ruc"];
                $ruc3_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc1_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Fin Ruc 1 nivel 3*/
  
              /*Inicio Ruc 2 nivel 3*/
              /*Izquierda 1*/
              if($fila_4["posicion"]==1 && $fila["ruc"]==$ruc2_2){
                $ruc4_3=$fila_4["ruc"];
                $ruc4_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc2_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Centro 2*/
              if($fila_4["posicion"]==2 && $fila["ruc"]==$ruc2_2){
                $ruc5_3=$fila_4["ruc"];
                $ruc5_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc2_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Derecha 3*/
              if($fila_4["posicion"]==3 && $fila["ruc"]==$ruc2_2 && $ruc2_2_cat>=4){
                $ruc6_3=$fila_4["ruc"];
                $ruc6_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc2_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Fin Ruc 2 nivel 3*/
  
              /*Inicio Ruc 3 nivel 3*/
              //Izquierda 1
              if($fila_4["posicion"]==1 && $fila["ruc"]==$ruc3_2){
                $ruc7_3=$fila_4["ruc"];
                $ruc7_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc3_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              //Centro 2
              if($fila_4["posicion"]==2 && $fila["ruc"]==$ruc3_2){
                $ruc8_3=$fila_4["ruc"];
                $ruc8_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc3_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              //Derecha 3
              if($fila_4["posicion"]==3 && $fila["ruc"]==$ruc3_2 && $ruc3_2_cat>=4){
                $ruc9_3=$fila_4["ruc"];
                $ruc9_3_cat=$fila_4["id_nivel_categoria"];
                $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$ruc3_2.'","Datos":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","email":"'.$fila_4["correo"].'"},';
              }
              /*Fin Ruc 3 nivel 3*/
  
                $rs_8=$obj->listar_representantes_sponsor($fila_4["ruc"]);
                while ($fila_8=mysqli_fetch_assoc($rs_8)) {
                  /*Inicio Ruc 1 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc1_3){
                    $ruc1_4=$fila_8["ruc"];
                    $ruc1_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc1_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc1_3){
                    $ruc2_4=$fila_8["ruc"];
                    $ruc2_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc1_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc1_3 && $ruc1_3_cat>=4){
                    $ruc3_4=$fila_8["ruc"];
                    $ruc3_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc1_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 1 nivel 4*/
  
                  /*Inicio Ruc 2 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc2_3){
                    $ruc4_4=$fila_8["ruc"];
                    $ruc4_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc2_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc2_3){
                    $ruc5_4=$fila_8["ruc"];
                    $ruc5_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc2_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc2_3 && $ruc2_3_cat>=4){
                    $ruc6_4=$fila_8["ruc"];
                    $ruc6_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc2_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img": "imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 2 nivel 4*/
  
                  /*Inicio Ruc 3 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc3_3){
                    $ruc7_4=$fila_8["ruc"];
                    $ruc7_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc3_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc3_3){
                    $ruc8_4=$fila_8["ruc"];
                    $ruc8_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc3_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc3_3 && $ruc3_3_cat>=4){
                    $ruc9_4=$fila_8["ruc"];
                    $ruc9_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc3_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 3 nivel 4*/
  
                  /*Inicio Ruc 4 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc4_3){
                    $ruc10_4=$fila_8["ruc"];
                    $ruc10_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc4_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc4_3){
                    $ruc11_4=$fila_8["ruc"];
                    $ruc11_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc4_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc4_3 && $ruc4_3_cat>=4){
                    $ruc12_4=$fila_8["ruc"];
                    $ruc12_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc4_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 4 nivel 4*/
  
                  /*Inicio Ruc 5 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc5_3){
                    $ruc13_4=$fila_8["ruc"];
                    $ruc13_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc5_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc5_3){
                    $ruc14_4=$fila_8["ruc"];
                    $ruc14_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc5_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc5_3 && $ruc5_3_cat>=4){
                    $ruc15_4=$fila_8["ruc"];
                    $ruc15_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc5_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 5 nivel 4*/
  
                  /*Inicio Ruc 6 nivel 4*/
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc6_3){
                    $ruc16_4=$fila_8["ruc"];
                    $ruc16_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc6_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Centro 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc6_3){
                    $ruc17_4=$fila_8["ruc"];
                    $ruc17_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc6_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Derecha 3*/
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc6_3 && $ruc6_3_cat>=4){
                    $ruc18_4=$fila_8["ruc"];
                    $ruc18_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc6_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 6 nivel 4*/
  
                  /*Inicio Ruc 7 nivel 4*/
                  //Izquierda 1
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc7_3){
                    $ruc19_4=$fila_8["ruc"];
                    $ruc19_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc7_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  //Centro 2
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc7_3){
                    $ruc20_4=$fila_8["ruc"];
                    $ruc20_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc7_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  //Derecha 3
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc7_3 && $ruc7_3_cat>=4){
                    $ruc21_4=$fila_8["ruc"];
                    $ruc21_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc7_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 7 nivel 4*/
  
                  /*Inicio Ruc 8 nivel 4*/
                  //Izquierda 1
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc8_3){
                    $ruc22_4=$fila_8["ruc"];
                    $ruc22_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc8_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  //Centro 2
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc8_3){
                    $ruc23_4=$fila_8["ruc"];
                    $ruc23_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc8_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  //Derecha 3
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc8_3 && $ruc8_3_cat>=4){
                    $ruc24_4=$fila_8["ruc"];
                    $ruc24_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc8_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 8 nivel 4*/
  
                  /*Inicio Ruc 9 nivel 4*/
                  //Izquierda 1
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc9_3){
                    $ruc25_4=$fila_8["ruc"];
                    $ruc25_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc9_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  //Centro 2
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc9_3){
                    $ruc26_4=$fila_8["ruc"];
                    $ruc26_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc9_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  //Derecha 3
                  if($fila_8["posicion"]==3 && $fila_4["ruc"]==$ruc9_3 && $ruc9_3_cat>=4){
                    $ruc27_4=$fila_8["ruc"];
                    $ruc27_4_cat=$fila_8["id_nivel_categoria"];
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$ruc9_3.'","Datos":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","email":"'.$fila_8["correo"].'"},';
                  }
                  /*Fin Ruc 9 nivel 4*/
  
                      $rs_16=$obj->listar_representantes_sponsor($fila_8["ruc"]);
                      while ($fila_16=mysqli_fetch_assoc($rs_16)) {
  
                          /*Inicio Ruc 1 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc1_4){
                            $ruc1_5=$fila_16["ruc"];
                            $ruc1_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc1_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc1_4){
                            $ruc2_5=$fila_16["ruc"];
                            $ruc2_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc1_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc1_4 && $ruc1_4_cat>=4){
                            $ruc3_5=$fila_16["ruc"];
                            $ruc3_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc1_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 1 nivel 5*/
  
                          /*Inicio Ruc 2 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc2_4){
                            $ruc4_5=$fila_16["ruc"];
                            $ruc4_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc2_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc2_4){
                            $ruc5_5=$fila_16["ruc"];
                            $ruc5_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc2_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc2_4 && $ruc2_4_cat>=4){
                            $ruc6_5=$fila_16["ruc"];
                            $ruc6_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc2_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 2 nivel 5*/
  
                          /*Inicio Ruc 3 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc3_4){
                            $ruc7_5=$fila_16["ruc"];
                            $ruc7_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc3_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc3_4){
                            $ruc8_5=$fila_16["ruc"];
                            $ruc8_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc3_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc3_4 && $ruc3_4_cat>=4){
                            $ruc9_5=$fila_16["ruc"];
                            $ruc9_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc3_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 3 nivel 5*/
  
                          /*Inicio Ruc 4 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc4_4){
                            $ruc10_5=$fila_16["ruc"];
                            $ruc10_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc4_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc4_4){
                            $ruc11_5=$fila_16["ruc"];
                            $ruc11_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc4_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc4_4 && $ruc4_4_cat>=4){
                            $ruc12_5=$fila_16["ruc"];
                            $ruc12_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc4_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 4 nivel 5*/
  
                          /*Inicio Ruc 5 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc5_4){
                            $ruc13_5=$fila_16["ruc"];
                            $ruc13_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc5_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc5_4){
                            $ruc14_5=$fila_16["ruc"];
                            $ruc14_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc5_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc5_4 && $ruc5_4_cat>=4){
                            $ruc15_5=$fila_16["ruc"];
                            $ruc15_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc5_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 5 nivel 5*/
  
                          /*Inicio Ruc 6 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc6_4){
                            $ruc16_5=$fila_16["ruc"];
                            $ruc16_5_cat=$fila_16["rid_nivel_categoriauc"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc6_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc6_4){
                            $ruc17_5=$fila_16["ruc"];
                            $ruc17_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc6_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc6_4 && $ruc6_4_cat>=4){
                            $ruc18_5=$fila_16["ruc"];
                            $ruc18_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc6_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 6 nivel 5*/
  
                          /*Inicio Ruc 7 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc7_4){
                            $ruc19_5=$fila_16["ruc"];
                            $ruc19_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc7_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc7_4){
                            $ruc20_5=$fila_16["ruc"];
                            $ruc20_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc7_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc7_4 && $ruc7_4_cat>=4){
                            $ruc21_5=$fila_16["ruc"];
                            $ruc21_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc7_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 7 nivel 5*/
  
                          /*Inicio Ruc 8 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc8_4){
                            $ruc22_5=$fila_16["ruc"];
                            $ruc22_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc8_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc8_4){
                            $ruc23_5=$fila_16["ruc"];
                            $ruc23_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc8_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc8_4 && $ruc8_4_cat>=4){
                            $ruc24_5=$fila_16["ruc"];
                            $ruc24_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc8_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 8 nivel 5*/
  
                          /*Inicio Ruc 9 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc9_4){
                            $ruc25_5=$fila_16["ruc"];
                            $ruc25_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc9_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc9_4){
                            $ruc26_5=$fila_16["ruc"];
                            $ruc26_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc9_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc9_4 && $ruc9_4_cat>=4){
                            $ruc27_5=$fila_16["ruc"];
                            $ruc27_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc9_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 9 nivel 5*/
  
                          /*Inicio Ruc 10 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc10_4){
                            $ruc28_5=$fila_16["ruc"];
                            $ruc28_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc10_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc10_4){
                            $ruc29_5=$fila_16["ruc"];
                            $ruc29_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc10_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc10_4 && $ruc10_4_cat>=4){
                            $ruc30_5=$fila_16["ruc"];
                            $ruc30_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc10_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 10 nivel 5*/
  
                          /*Inicio Ruc 11 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc11_4){
                            $ruc31_5=$fila_16["ruc"];
                            $ruc31_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc11_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc11_4){
                            $ruc32_5=$fila_16["ruc"];
                            $ruc32_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc11_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc11_4 && $ruc11_4_cat>=4){
                            $ruc33_5=$fila_16["ruc"];
                            $ruc33_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc11_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 11 nivel 5*/
  
                          /*Inicio Ruc 12 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc12_4){
                            $ruc34_5=$fila_16["ruc"];
                            $ruc34_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc12_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc12_4){
                            $ruc35_5=$fila_16["ruc"];
                            $ruc35_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc12_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc12_4 && $ruc12_4_cat>=4){
                            $ruc36_5=$fila_16["ruc"];
                            $ruc36_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc12_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 10 nivel 5*/
  
                          /*Inicio Ruc 13 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc13_4){
                            $ruc37_5=$fila_16["ruc"];
                            $ruc37_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc13_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc13_4){
                            $ruc38_5=$fila_16["ruc"];
                            $ruc38_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc13_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc13_4 && $ruc13_4_cat>=4){
                            $ruc39_5=$fila_16["ruc"];
                            $ruc39_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc13_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 13 nivel 5*/
  
                          /*Inicio Ruc 14 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc14_4){
                            $ruc40_5=$fila_16["ruc"];
                            $ruc40_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc14_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc14_4){
                            $ruc41_5=$fila_16["ruc"];
                            $ruc41_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc14_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc14_4 && $ruc14_4_cat>=4){
                            $ruc42_5=$fila_16["ruc"];
                            $ruc42_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc14_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 14 nivel 5*/
  
                          /*Inicio Ruc 15 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc15_4){
                            $ruc43_5=$fila_16["ruc"];
                            $ruc43_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc15_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc15_4){
                            $ruc44_5=$fila_16["ruc"];
                            $ruc44_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc15_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc15_4 && $ruc15_4_cat>=4){
                            $ruc45_5=$fila_16["ruc"];
                            $ruc45_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc15_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 15 nivel 5*/
  
                          /*Inicio Ruc 16 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc16_4){
                            $ruc46_5=$fila_16["ruc"];
                            $ruc46_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc16_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc16_4){
                            $ruc47_5=$fila_16["ruc"];
                            $ruc47_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc16_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc16_4 && $ruc16_4_cat>=4){
                            $ruc48_5=$fila_16["ruc"];
                            $ruc48_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc16_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 16 nivel 5*/
  
                          /*Inicio Ruc 17 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc17_4){
                            $ruc49_5=$fila_16["ruc"];
                            $ruc49_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc17_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc17_4){
                            $ruc50_5=$fila_16["ruc"];
                            $ruc50_5=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc17_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc17_4 && $ruc17_4_cat>=4){
                            $ruc51_5=$fila_16["ruc"];
                            $ruc51_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc17_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 17 nivel 5*/
  
                          /*Inicio Ruc 18 nivel 5*/
                          /*Izquierda 1*/
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc18_4){
                            $ruc52_5=$fila_16["ruc"];
                            $ruc52_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc18_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Centro 2*/
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc18_4){
                            $ruc53_5=$fila_16["ruc"];
                            $ruc53_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc18_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Derecha 3*/
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc18_4 && $ruc18_4_cat>=4){
                            $ruc54_5=$fila_16["ruc"];
                            $ruc54_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc18_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 18 nivel 5*/
  
                          /*Inicio Ruc 19 nivel 5*/
                          //Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc19_4){
                            $ruc55_5=$fila_16["ruc"];
                            $ruc55_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc19_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc19_4){
                            $ruc56_5=$fila_16["ruc"];
                            $ruc56_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc19_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc19_4 && $ruc19_4_cat>=4){
                            $ruc57_5=$fila_16["ruc"];
                            $ruc57_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc19_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Fin Ruc 19 nivel 5
  
                          /*Inicio Ruc 20 nivel 5*/
                          //Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc20_4){
                            $ruc58_5=$fila_16["ruc"];
                            $ruc58_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc20_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc20_4){
                            $ruc59_5=$fila_16["ruc"];
                            $ruc59_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc20_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc20_4 && $ruc20_4_cat>=4){
                            $ruc60_5=$fila_16["ruc"];
                            $ruc60_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc20_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Fin Ruc 20 nivel 5
  
                          //Inicio Ruc 21 nivel 5
                          //Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc21_4){
                            $ruc61_5=$fila_16["ruc"];
                            $ruc61_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc21_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc21_4){
                            $ruc62_5=$fila_16["ruc"];
                            $ruc62_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc21_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc21_4 && $ruc21_4_cat>=4){
                            $ruc63_5=$fila_16["ruc"];
                            $ruc63_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc21_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          /*Fin Ruc 21 nivel 5*/
  
                          /*Inicio Ruc 22 nivel 5*/
                          //Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc22_4){
                            $ruc64_5=$fila_16["ruc"];
                            $ruc64_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc22_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc22_4){
                            $ruc65_5=$fila_16["ruc"];
                            $ruc65_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc22_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc22_4 && $ruc22_4_cat>=4){
                            $ruc66_5=$fila_16["ruc"];
                            $ruc66_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc22_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Fin Ruc 22 nivel 5
  
                          //Inicio Ruc 23 nivel 5
                          //Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc23_4){
                            $ruc67_5=$fila_16["ruc"];
                            $ruc67_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc23_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc23_4){
                            $ruc68_5=$fila_16["ruc"];
                            $ruc68_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc23_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc23_4 && $ruc23_4_cat>=4){
                            $ruc69_5=$fila_16["ruc"];
                            $ruc69_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc23_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Fin Ruc 23 nivel 5
  
                          //Inicio Ruc 24 nivel 5
                          //Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc24_4){
                            $ruc70_5=$fila_16["ruc"];
                            $ruc70_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc24_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc24_4){
                            $ruc71_5=$fila_16["ruc"];
                            $ruc71_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc24_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc24_4 && $ruc24_4_cat>=4){
                            $ruc72_5=$fila_16["ruc"];
                            $ruc72_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc24_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Fin Ruc 24 nivel 5
  
                          //Inicio Ruc 25 nivel 5
                          //Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc25_4){
                            $ruc73_5=$fila_16["ruc"];
                            $ruc73_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc25_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc25_4){
                            $ruc74_5=$fila_16["ruc"];
                            $ruc74_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc25_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc25_4 && $ruc25_4_cat>=4){
                            $ruc75_5=$fila_16["ruc"];
                            $ruc75_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc25_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Fin Ruc 25 nivel 5
  
                          //Inicio Ruc 26 nivel 5
                          //Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc26_4){
                            $ruc76_5=$fila_16["ruc"];
                            $ruc76_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc26_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc26_4){
                            $ruc77_5=$fila_16["ruc"];
                            $ruc77_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc26_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc26_4 && $ruc26_4_cat>=4){
                            $ruc78_5=$fila_16["ruc"];
                            $ruc78_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc26_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Fin Ruc 26 nivel 5
  
                          //Inicio Ruc 27 nivel 5
                          //Izquierda 1
                          if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc27_4){
                            $ruc79_5=$fila_16["ruc"];
                            $ruc79_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc27_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Centro 2
                          if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc27_4){
                            $ruc80_5=$fila_16["ruc"];
                            $ruc80_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc27_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Derecha 3
                          if($fila_16["posicion"]==3 && $fila_8["ruc"]==$ruc27_4 && $ruc27_4_cat>=4){
                            $ruc81_5=$fila_16["ruc"];
                            $ruc81_5_cat=$fila_16["id_nivel_categoria"];
                            $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$ruc27_4.'","Datos":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","email":"'.$fila_16["correo"].'"},';
                          }
                          //Fin Ruc 27 nivel 5*/
  
  
  
                      }
                }
        }
  
    }
  
    /**Validamos campos vacios de red binaria  */
  
    if($ruc1_2==""){
      $ruc1_2="12";
      $ruc1_2_cat="1";
      $js_json_2.='{"id":"12","pid":"1","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
      
      $js_json_3.='{ "id":"4","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_3.='{ "id":"5","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"8","pid":"4", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"9","pid":"4", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"10","pid":"5", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"11","pid":"5", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      
      $js_json_5.='{ "id":"16","pid":"8", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"17","pid":"8", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"18","pid":"9", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"19","pid":"9", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
      $js_json_5.='{ "id":"20","pid":"10", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"21","pid":"10", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"22","pid":"11", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"23","pid":"11", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc2_2==""){
      $ruc2_2="22";
      $ruc2_2_cat="1";
      $js_json_2.='{"id":"22","pid":"1","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_3.='{ "id":"6","pid":"22", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_3.='{ "id":"7","pid":"22", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"12","pid":"6", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"13","pid":"6", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"14","pid":"7", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"15","pid":"7", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      
      $js_json_5.='{ "id":"24","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"25","pid":"12", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"26","pid":"13", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"27","pid":"13", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
      $js_json_5.='{ "id":"28","pid":"14", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"29","pid":"14", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"30","pid":"15", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"31","pid":"15", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
  
  
     /*Derecha 3*/
     if($ruc3_2==""){
      $ruc3_2="183";
      $ruc3_2_cat="1";
      $js_json_2.='{"id":"183","pid":"1","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_3.='{ "id":"184","pid":"183", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_3.='{ "id":"185","pid":"183", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"186","pid":"184", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"187","pid":"184", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"188","pid":"185", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"189","pid":"185", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      
      $js_json_5.='{ "id":"190","pid":"186", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"191","pid":"186", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"192","pid":"187", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"193","pid":"187", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
      $js_json_5.='{ "id":"194","pid":"188", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"195","pid":"188", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"196","pid":"189", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"197","pid":"189", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
  
  
  
  
    /*Inicio Ruc 1 nivel 3*/
    /*Izquierda 1*/
    if($ruc1_3=="" && ($ruc1_2!="" && $ruc1_2!="12")){
      $ruc1_3="32";
      $ruc1_3_cat="1";
      $js_json_3.='{"id":"32","pid":"'.$ruc1_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"33","pid":"32", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"34","pid":"32", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"35","pid":"33", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"36","pid":"33", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"37","pid":"34", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"38","pid":"34", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
      
    }
    /*Centro 2*/
    if($ruc2_3=="" && ($ruc1_2!="" && $ruc1_2!="12")){
      $ruc2_3="39";
      $ruc2_3_cat="1";
      $js_json_3.='{"id":"39","pid":"'.$ruc1_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"40","pid":"39", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"41","pid":"39", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"42","pid":"40", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"43","pid":"40", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"44","pid":"41", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"45","pid":"41", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
    }
    /*Derecha 3*/
    if($ruc3_3=="" &&  ($ruc1_2!="" && $ruc1_2!="12") && $ruc1_2_cat>=4){
      $ruc3_3="46";
      $ruc3_3_cat="1";
      $js_json_3.='{"id":"46","pid":"'.$ruc1_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"47","pid":"46", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"48","pid":"46", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"49","pid":"47", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"50","pid":"47", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"51","pid":"48", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"52","pid":"48", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';  
    }
    /*Fin Ruc 1 nivel 3*/
  
    /*Inicio Ruc 2 nivel 3*/
    /*Izquierda 1*/
    if($ruc4_3=="" && ($ruc2_2!="" && $ruc2_2!="22")){
      $ruc4_3="53";
      $ruc4_3_cat="1";
      $js_json_3.='{"id":"53","pid":"'.$ruc2_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"54","pid":"53", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"55","pid":"53", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"56","pid":"54", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"57","pid":"54", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"58","pid":"55", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"59","pid":"55", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},'; 
    }
    /*Centro 2*/
    if($ruc5_3=="" && ($ruc2_2!="" && $ruc2_2!="22")){
      $ruc5_3="60";
      $ruc5_3_cat="1";
      $js_json_3.='{"id":"60","pid":"'.$ruc2_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"61","pid":"60", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"62","pid":"60", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"63","pid":"61", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"64","pid":"61", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"65","pid":"62", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"66","pid":"62", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},'; 
    }
    /*Derecha 3*/
    if($ruc6_3=="" && ($ruc2_2!="" && $ruc2_2!="22") && $ruc2_2_cat>=4){
      $ruc6_3="67";
      $ruc6_3_cat="1";
      $js_json_3.='{"id":"67","pid":"'.$ruc2_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"68","pid":"67", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"69","pid":"67", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"70","pid":"68", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"71","pid":"68", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"72","pid":"69", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"73","pid":"69", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},'; 
    }
    /*Fin Ruc 2 nivel 3*/
  
    /*Inicio Ruc 3 nivel 3*/
    //Izquierda 1
    if($ruc7_3=="" && ($ruc3_2!="" && $ruc3_2!="183")){
      $ruc7_3="198";
      $ruc7_3_cat="1";
      $js_json_3.='{"id":"198","pid":"'.$ruc3_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"199","pid":"198", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"200","pid":"198", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"201","pid":"199", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"202","pid":"199", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"203","pid":"200", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"204","pid":"200", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    //Centro 2
    if($ruc8_3=="" && ($ruc3_2!="" && $ruc3_2!="183")){
      $ruc8_3="205";
      $ruc8_3_cat="1";
      $js_json_3.='{"id":"205","pid":"'.$ruc3_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"206","pid":"205", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"207","pid":"205", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"208","pid":"206", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"209","pid":"206", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"210","pid":"207", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"211","pid":"207", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    //Derecha 3
    if($ruc9_3=="" && ($ruc3_2!="" && $ruc3_2!="183") && $ruc3_2_cat>=4){
      $ruc9_3="212";
      $ruc9_3_cat="1";
      $js_json_3.='{"id":"212","pid":"'.$ruc2_2.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_4.='{ "id":"213","pid":"212", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_4.='{ "id":"214","pid":"212", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"215","pid":"213", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"216","pid":"213", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"217","pid":"214", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"218","pid":"214", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /* Fin Ruc 3 nivel 3*/
  
    /*Inicio Ruc 1 nivel 4*/
    if($ruc1_4=="" && ($ruc1_3!="" && $ruc1_3!="32")){
      $ruc1_4="74";
      $ruc1_4_cat="1";
      $js_json_4.='{"id":"74","pid":"'.$ruc1_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"75","pid":"74", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"76","pid":"74", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc2_4=="" && ($ruc1_3!="" && $ruc1_3!="32")){
      $ruc2_4="77";
      $ruc2_4_cat="1";
      $js_json_4.='{"id":"77","pid":"'.$ruc1_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"78","pid":"77", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"79","pid":"77", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc3_4=="" && ($ruc1_3!="" && $ruc1_3!="32") && $ruc1_3_cat>=4){
      $ruc3_4="80";
      $ruc3_4_cat="1";
      $js_json_4.='{"id":"80","pid":"'.$ruc1_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"81","pid":"80", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"82","pid":"80", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    // /*Fin Ruc 1 nivel 4*/
  
    /*Inicio Ruc 2 nivel 4*/
    /*Izquierda 1*/
    if($ruc4_4=="" && ($ruc2_3!="" && $ruc2_3!="39")){
      $ruc4_4="83";
      $ruc4_4_cat="1";
      $js_json_4.='{"id":"83","pid":"'.$ruc2_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"84","pid":"83", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"85","pid":"83", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc5_4=="" && ($ruc2_3!="" && $ruc2_3!="39")){
      $ruc5_4="86";
      $ruc5_4_cat="1";
      $js_json_4.='{"id":"86","pid":"'.$ruc2_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"87","pid":"86", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"88","pid":"86", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc6_4=="" && ($ruc2_3!="" && $ruc2_3!="39") && $ruc2_3_cat>=4){
      $ruc6_4="89";
      $ruc6_4_cat="1";
      $js_json_4.='{"id":"89","pid":"'.$ruc2_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"90","pid":"89", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"91","pid":"89", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 2 nivel 4*/
  
    /*Inicio Ruc 3 nivel 4*/
    /*Izquierda 1*/
    if($ruc7_4=="" && ($ruc3_3!="" && $ruc3_3!="46")){
      $ruc7_4="92";
      $ruc7_4_cat="1";
      $js_json_4.='{"id":"92","pid":"'.$ruc3_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"93","pid":"92", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"94","pid":"92", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc8_4=="" && ($ruc3_3!="" && $ruc3_3!="46")){
      $ruc8_4="95";
      $ruc8_4_cat="1";
      $js_json_4.='{"id":"95","pid":"'.$ruc3_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"96","pid":"95", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"97","pid":"95", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc9_4=="" && ($ruc3_3!="" && $ruc3_3!="46") && $ruc3_3_cat>=4){
      $ruc9_4="98";
      $ruc9_4_cat="1";
      $js_json_4.='{"id":"98","pid":"'.$ruc3_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"99","pid":"98", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"100","pid":"98", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 3 nivel 4*/
  
    /*Inicio Ruc 4 nivel 4*/
    /*Izquierda 1*/
    if($ruc10_4=="" && ($ruc4_3!="" && $ruc4_3!="53")){
      $ruc10_4="101";
      $ruc10_4_cat="1";
      $js_json_4.='{"id":"101","pid":"'.$ruc4_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"102","pid":"101", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"103","pid":"101", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc11_4=="" && ($ruc4_3!="" && $ruc4_3!="53")){
      $ruc11_4="104";
      $ruc11_4_cat="1";
      $js_json_4.='{"id":"104","pid":"'.$ruc4_3.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"105","pid":"104", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"106","pid":"104", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc12_4=="" && ($ruc4_3!="" && $ruc4_3!="53") && $ruc4_3_cat>=4){
      $ruc12_4="107";
      $ruc12_4_cat="1";
      $js_json_4.='{"id":"107","pid":"'.$ruc4_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"108","pid":"107", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"109","pid":"107", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 4 nivel 4*/
  
    /*Inicio Ruc 5 nivel 4*/
    /*Izquierda 1*/
    if($ruc13_4=="" && ($ruc5_3!="" && $ruc5_3!="60")){
      $ruc13_4="110";
      $ruc13_4_cat="1";
      $js_json_4.='{"id":"110","pid":"'.$ruc5_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"111","pid":"110", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"112","pid":"110", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc14_4=="" && ($ruc5_3!="" && $ruc5_3!="60")){
      $ruc14_4="113";
      $ruc14_4_cat="1";
      $js_json_4.='{"id":"113","pid":"'.$ruc5_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"114","pid":"113", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"115","pid":"113", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc15_4=="" && ($ruc5_3!="" && $ruc5_3!="60") && $ruc5_3_cat>=4){
      $ruc15_4="116";
      $ruc15_4_cat="1";
      $js_json_4.='{"id":"116","pid":"'.$ruc5_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"117","pid":"116", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"118","pid":"116", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 5 nivel 4*/
  
    /*Inicio Ruc 6 nivel 4*/
    /*Izquierda 1*/
    if($ruc16_4=="" && ($ruc6_3!="" && $ruc6_3!="67")){
      $ruc16_4="119";
      $ruc16_4_cat="1";
      $js_json_4.='{"id":"119","pid":"'.$ruc6_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"120","pid":"119", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"121","pid":"119", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc17_4=="" && ($ruc6_3!="" && $ruc6_3!="67")){
      $ruc17_4="122";
      $ruc17_4_cat="1";
      $js_json_4.='{"id":"122","pid":"'.$ruc6_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"123","pid":"122", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"124","pid":"122", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc18_4=="" && ($ruc6_3!="" && $ruc6_3!="67") && $ruc6_3_cat>=4){
      $ruc18_4="125";
      $ruc18_4_cat="1";
      $js_json_4.='{"id":"125","pid":"'.$ruc6_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"126","pid":"125", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"127","pid":"125", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 6 nivel 4*/
  
    /**Inicio Ruc 7 nivel 4 */
    if($ruc19_4=="" && ($ruc7_3!="" && $ruc7_3!="198")){
      $ruc19_4="219";
      $ruc19_4_cat="1";
      $js_json_4.='{"id":"219","pid":"'.$ruc7_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"220","pid":"219", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"221","pid":"219", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    //Centro 2
    if($ruc20_4=="" && ($ruc7_3!="" && $ruc7_3!="198")){
      $ruc20_4="222";
      $ruc20_4_cat="1";
      $js_json_4.='{"id":"222","pid":"'.$ruc7_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"223","pid":"222", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"224","pid":"222", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    //Derecha 3
    if($ruc21_4=="" && ($ruc7_3!="" && $ruc7_3!="198") && $ruc7_3_cat>=4){
      $ruc21_4="225";
      $ruc21_4_cat="1";
      $js_json_4.='{"id":"225","pid":"'.$ruc7_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"226","pid":"225", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"227","pid":"225", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    //Fin Ruc 7 nivel 4
  
    //Inicio Ruc 8 nivel 4
    //Izquierda 1
    if($ruc22_4=="" && ($ruc8_3!="" && $ruc8_3!="205")){
      $ruc22_4="228";
      $ruc22_4_cat="1";
      $js_json_4.='{"id":"228","pid":"'.$ruc8_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"229","pid":"228", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"230","pid":"228", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    //Centro 2
    if($ruc23_4=="" && ($ruc8_3!="" && $ruc8_3!="205")){
      $ruc23_4="231";
      $ruc23_4_cat="1";
      $js_json_4.='{"id":"231","pid":"'.$ruc8_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"232","pid":"231", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"233","pid":"231", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    //Derecha 3
    if($ruc24_4=="" && ($ruc8_3!="" && $ruc8_3!="205") && $ruc8_3_cat>=4){
      $ruc24_4="234";
      $ruc24_4_cat="1";
      $js_json_4.='{"id":"234","pid":"'.$ruc8_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"235","pid":"234", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"236","pid":"234", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    //Fin Ruc 8 nivel 4
  
    //Inicio Ruc 9 nivel 4
    //Izquierda 1
    if($ruc25_4=="" && ($ruc9_3!="" && $ruc9_3!="212")){
      $ruc25_4="237";
      $ruc25_4_cat="1";
      $js_json_4.='{"id":"237","pid":"'.$ruc9_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"238","pid":"237", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"239","pid":"237", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    //Centro 2
    if($ruc25_4=="" && ($ruc9_3!="" && $ruc9_3!="212")){
      $ruc26_4="240";
      $ruc26_4_cat="1";
      $js_json_4.='{"id":"240","pid":"'.$ruc9_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"241","pid":"240", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"242","pid":"240", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    //Derecha 3
    if($ruc27_4=="" && ($ruc9_3!="" && $ruc9_3!="212") && $ruc9_3_cat>=4){
      $ruc27_4="243";
      $ruc27_4_cat="1";
      $js_json_4.='{"id":"243","pid":"'.$ruc9_3.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
  
      $js_json_5.='{ "id":"244","pid":"243", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
      $js_json_5.='{ "id":"245","pid":"243", "Datos": "Pendiente","img": "imas/logo/usuliderno.png", "RUC": "Pendiente","email":"Pendiente"},';
    }
    /**Fin Ruc 9 nivel 4 */
  
  
    /*Inicio Ruc 1 nivel 5*/
    /*Izquierda 1*/
    if($ruc1_5=="" && ($ruc1_4!="" && $ruc1_4!="74")){
      $ruc1_5="128";
      $ruc1_5_cat="1";
      $js_json_5.='{"id":"128","pid":"'.$ruc1_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc2_5=="" && ($ruc1_4!="" && $ruc1_4!="74")){
      $ruc2_5="129";
      $ruc2_5_cat="1";
      $js_json_5.='{"id":"129","pid":"'.$ruc1_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc3_5=="" && ($ruc1_4!="" && $ruc1_4!="74") && $ruc1_4_cat>=4){
      $ruc3_5="130";
      $ruc3_5_cat="1";
      $js_json_5.='{"id":"130","pid":"'.$ruc1_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 1 nivel 5*/
  
    /*Inicio Ruc 2 nivel 5*/
    /*Izquierda 1*/
    if($ruc4_5=="" && ($ruc2_4!="" && $ruc2_4!="77")){
      $ruc4_5="131";
      $ruc4_5_cat="1";
      $js_json_5.='{"id":"131","pid":"'.$ruc2_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc5_5=="" && ($ruc2_4!="" && $ruc2_4!="77")){
      $ruc5_5="132";
      $ruc5_5_cat="1";
      $js_json_5.='{"id":"132","pid":"'.$ruc2_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc6_5=="" && ($ruc2_4!="" && $ruc2_4!="77") && $ruc2_4_cat>=4){
      $ruc6_5="133";
      $ruc6_5_cat="1";
      $js_json_5.='{"id":"133","pid":"'.$ruc2_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 2 nivel 5*/
  
    /*Inicio Ruc 3 nivel 5*/
    /*Izquierda 1*/
    if($ruc7_5=="" && ($ruc3_4!="" && $ruc3_4!="80")){
      $ruc7_5="134";
      $ruc7_5_cat="1";
      $js_json_5.='{"id":"134","pid":"'.$ruc3_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc8_5=="" && ($ruc3_4!="" && $ruc3_4!="80")){
      $ruc8_5="135";
      $ruc8_5_cat="1";
      $js_json_5.='{"id":"135","pid":"'.$ruc3_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc9_5=="" && ($ruc3_4!="" && $ruc3_4!="80") && $ruc3_4_cat>=4){
      $ruc9_5="136";
      $ruc9_5_cat="1";
      $js_json_5.='{"id":"136","pid":"'.$ruc3_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 3 nivel 5*/
  
    /*Inicio Ruc 4 nivel 5*/
    /*Izquierda 1*/
    if($ruc10_5=="" && ($ruc4_4!="" && $ruc4_4!="83")){
      $ruc10_5="137";
      $ruc10_5_cat="1";
      $js_json_5.='{"id":"137","pid":"'.$ruc4_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc11_5=="" && ($ruc4_4!="" && $ruc4_4!="83")){
      $ruc11_5="138";
      $ruc11_5_cat="1";
      $js_json_5.='{"id":"138","pid":"'.$ruc4_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc12_5=="" && ($ruc4_4!="" && $ruc4_4!="83") && $ruc4_4_cat>=4){
      $ruc12_5="139";
      $ruc12_5_cat="1";
      $js_json_5.='{"id":"130","pid":"'.$ruc4_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 4 nivel 5*/
  
    /*Inicio Ruc 5 nivel 5*/
    /*Izquierda 1*/
    if($ruc13_5=="" && ($ruc5_4!="" && $ruc5_4!="86")){
      $ruc13_5="140";
      $ruc13_5_cat="1";
      $js_json_5.='{"id":"140","pid":"'.$ruc5_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc14_5=="" && ($ruc5_4!="" && $ruc5_4!="86")){
      $ruc14_5="141";
      $ruc14_5_cat="1";
      $js_json_5.='{"id":"141","pid":"'.$ruc5_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc15_5=="" && ($ruc5_4!="" && $ruc5_4!="86") && $ruc5_4_cat>=4){
      $ruc15_5="142";
      $ruc15_5_cat="1";
      $js_json_5.='{"id":"142","pid":"'.$ruc5_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 5 nivel 5*/
  
    /*Inicio Ruc 6 nivel 5*/
    /*Izquierda 1*/
    if($ruc16_5=="" && ($ruc6_4!="" && $ruc6_4!="89")){
      $ruc16_5="143";
      $ruc16_5_cat="1";
      $js_json_5.='{"id":"143","pid":"'.$ruc6_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc17_5=="" && ($ruc6_4!="" && $ruc6_4!="89")){
      $ruc17_5="144";
      $ruc17_5_cat="1";
      $js_json_5.='{"id":"144","pid":"'.$ruc6_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc18_5=="" && ($ruc6_4!="" && $ruc6_4!="89") && $ruc6_4_cat>=4){
      $ruc18_5="145";
      $ruc18_5_cat="1";
      $js_json_5.='{"id":"145","pid":"'.$ruc6_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 6 nivel 5*/
  
    /*Inicio Ruc 7 nivel 5*/
    /*Izquierda 1*/
    if($ruc19_5=="" && ($ruc7_4!="" && $ruc7_4!="92")){
      $ruc19_5="146";
      $ruc19_5_cat="1";
      $js_json_5.='{"id":"146","pid":"'.$ruc7_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc20_5=="" && ($ruc7_4!="" && $ruc7_4!="92")){
      $ruc20_5="147";
      $ruc20_5_cat="1";
      $js_json_5.='{"id":"147","pid":"'.$ruc7_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc21_5=="" && ($ruc7_4!="" && $ruc7_4!="92") && $ruc7_4_cat>=4){
      $ruc21_5="148";
      $ruc21_5_cat="1";
      $js_json_5.='{"id":"148","pid":"'.$ruc7_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 7 nivel 5*/
  
    /*Inicio Ruc 8 nivel 5*/
    /*Izquierda 1*/
    if($ruc22_5=="" && ($ruc8_4!="" && $ruc8_4!="95")){
      $ruc22_5="149";
      $ruc22_5_cat="1";
      $js_json_5.='{"id":"149","pid":"'.$ruc8_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc23_5=="" && ($ruc8_4!="" && $ruc8_4!="95")){
      $ruc23_5="150";
      $ruc23_5_cat="1";
      $js_json_5.='{"id":"150","pid":"'.$ruc8_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc24_5=="" && ($ruc8_4!="" && $ruc8_4!="95") && $ruc8_4_cat>=4){
      $ruc24_5="151";
      $ruc24_5_cat="1";
      $js_json_5.='{"id":"151","pid":"'.$ruc8_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 8 nivel 5*/
  
    /*Inicio Ruc 9 nivel 5*/
    /*Izquierda 1*/
    if($ruc25_5=="" && ($ruc9_4!="" && $ruc9_4!="98")){
      $ruc25_5="152";
      $ruc25_5_cat="1";
      $js_json_5.='{"id":"152","pid":"'.$ruc9_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc26_5=="" && ($ruc9_4!="" && $ruc9_4!="98")){
      $ruc26_5="153";
      $ruc26_5_cat="1";
      $js_json_5.='{"id":"153","pid":"'.$ruc9_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc27_5=="" && ($ruc9_4!="" && $ruc9_4!="98") && $ruc9_4_cat>=4){
      $ruc27_5="154";
      $ruc27_5_cat="1";
      $js_json_5.='{"id":"154","pid":"'.$ruc9_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 9 nivel 5*/
  
    /*Inicio Ruc 10 nivel 5*/
    /*Izquierda 1*/
    if($ruc28_5=="" && ($ruc10_4!="" && $ruc10_4!="101")){
      $ruc28_5="155";
      $ruc28_5_cat="1";
      $js_json_5.='{"id":"155","pid":"'.$ruc10_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc29_5=="" && ($ruc10_4!="" && $ruc10_4!="101")){
      $ruc29_5="156";
      $ruc29_5_cat="1";
      $js_json_5.='{"id":"156","pid":"'.$ruc10_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc30_5=="" && ($ruc10_4!="" && $ruc10_4!="101") && $ruc10_4_cat>=4){
      $ruc30_5="157";
      $ruc30_5_cat="1";
      $js_json_5.='{"id":"157","pid":"'.$ruc10_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 10 nivel 5*/
  
    /*Inicio Ruc 11 nivel 5*/
    /*Izquierda 1*/
    if($ruc31_5=="" && ($ruc11_4!="" && $ruc11_4!="104")){
      $ruc31_5="158";
      $ruc31_5_cat="1";
      $js_json_5.='{"id":"158","pid":"'.$ruc11_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc32_5=="" && ($ruc11_4!="" && $ruc11_4!="104")){
      $ruc32_5="159";
      $ruc32_5_cat="1";
      $js_json_5.='{"id":"159","pid":"'.$ruc11_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc33_5=="" && ($ruc11_4!="" && $ruc11_4!="104") && $ruc11_4_cat>=4){
      $ruc33_5="160";
      $ruc33_5_cat="1";
      $js_json_5.='{"id":"160","pid":"'.$ruc11_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 11 nivel 5*/
  
    /*Inicio Ruc 12 nivel 5*/
    /*Izquierda 1*/
    if($ruc34_5=="" && ($ruc12_4!="" && $ruc12_4!="107")){
      $ruc34_5="161";
      $ruc34_5_cat="1";
      $js_json_5.='{"id":"161","pid":"'.$ruc12_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc35_5=="" && ($ruc12_4!="" && $ruc12_4!="107")){
      $ruc35_5="162";
      $ruc35_5_cat="1";
      $js_json_5.='{"id":"162","pid":"'.$ruc12_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc36_5=="" && ($ruc12_4!="" && $ruc12_4!="107") && $ruc12_4_cat>=4){
      $ruc36_5="163";
      $ruc36_5_cat="1";
      $js_json_5.='{"id":"163","pid":"'.$ruc12_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 10 nivel 5*/
  
    /*Inicio Ruc 13 nivel 5*/
    /*Izquierda 1*/
    if($ruc37_5=="" && ($ruc13_4!="" && $ruc13_4!="110")){
      $ruc37_5="164";
      $ruc37_5_cat="1";
      $js_json_5.='{"id":"164","pid":"'.$ruc13_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc38_5=="" && ($ruc13_4!="" && $ruc13_4!="110")){
      $ruc38_5="165";
      $ruc38_5_cat="1";
      $js_json_5.='{"id":"165","pid":"'.$ruc13_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc39_5=="" && ($ruc13_4!="" && $ruc13_4!="110") && $ruc13_4_cat>=4){
      $ruc39_5="166";
      $ruc39_5_cat="1";
      $js_json_5.='{"id":"166","pid":"'.$ruc13_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 13 nivel 5*/
  
    /*Inicio Ruc 14 nivel 5*/
    /*Izquierda 1*/
    if($ruc40_5=="" && ($ruc14_4!="" && $ruc14_4!="113")){
      $ruc40_5="167";
      $ruc40_5_cat="1";
      $js_json_5.='{"id":"167","pid":"'.$ruc14_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc41_5=="" && ($ruc14_4!="" && $ruc14_4!="113")){
      $ruc41_5="168";
      $ruc41_5_cat="1";
      $js_json_5.='{"id":"168","pid":"'.$ruc14_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc42_5=="" && ($ruc14_4!="" && $ruc14_4!="113") && $ruc14_4_cat>=4){
      $ruc42_5="169";
      $ruc42_5_cat="1";
      $js_json_5.='{"id":"169","pid":"'.$ruc14_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 14 nivel 5*/
  
    /*Inicio Ruc 15 nivel 5*/
    /*Izquierda 1*/
    if($ruc43_5=="" && ($ruc15_4!="" && $ruc15_4!="116")){
      $ruc43_5="170";
      $ruc43_5_cat="1";
      $js_json_5.='{"id":"170","pid":"'.$ruc15_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc44_5=="" && ($ruc15_4!="" && $ruc15_4!="116")){
      $ruc44_5="171";
      $ruc44_5_cat="1";
      $js_json_5.='{"id":"171","pid":"'.$ruc15_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc45_5=="" && ($ruc15_4!="" && $ruc15_4!="116") && $ruc15_4_cat>=4){
      $ruc45_5="173";
      $ruc45_5_cat="1";
      $js_json_5.='{"id":"173","pid":"'.$ruc15_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 15 nivel 5*/
  
    /*Inicio Ruc 16 nivel 5*/
    /*Izquierda 1*/
    if($ruc46_5=="" && ($ruc16_4!="" && $ruc16_4!="119")){
      $ruc46_5="174";
      $ruc46_5_cat="1";
      $js_json_5.='{"id":"174","pid":"'.$ruc16_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc47_5=="" && ($ruc16_4!="" && $ruc16_4!="119")){
      $ruc47_5="175";
      $ruc47_5_cat="1";
      $js_json_5.='{"id":"175","pid":"'.$ruc16_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc48_5=="" && ($ruc16_4!="" && $ruc16_4!="119") && $ruc16_4_cat>=4){
      $ruc48_5="176";
      $ruc48_5_cat="1";
      $js_json_5.='{"id":"176","pid":"'.$ruc16_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 16 nivel 5*/
  
    /*Inicio Ruc 17 nivel 5*/
    /*Izquierda 1*/
    if($ruc49_5=="" && ($ruc17_4!="" && $ruc17_4!="122")){
      $ruc49_5="177";
      $ruc49_5_cat="1";
      $js_json_5.='{"id":"177","pid":"'.$ruc17_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc50_5=="" && ($ruc17_4!="" && $ruc17_4!="122")){
      $ruc50_5="178";
      $ruc50_5="1";
      $js_json_5.='{"id":"178","pid":"'.$ruc17_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc51_5=="" && ($ruc17_4!="" && $ruc17_4!="122") && $ruc17_4_cat>=4){
      $ruc51_5="179";
      $ruc51_5_cat="1";
      $js_json_5.='{"id":"179","pid":"'.$ruc17_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Fin Ruc 17 nivel 5*/
  
    /*Inicio Ruc 18 nivel 5*/
    /*Izquierda 1*/
    if($ruc52_5=="" && ($ruc18_4!="" && $ruc18_4!="125")){
      $ruc52_5="180";
      $ruc52_5_cat="1";
      $js_json_5.='{"id":"130","pid":"'.$ruc18_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Centro 2*/
    if($ruc53_5=="" && ($ruc18_4!="" && $ruc18_4!="125")){
      $ruc53_5="181";
      $ruc53_5_cat="1";
      $js_json_5.='{"id":"181","pid":"'.$ruc18_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
    /*Derecha 3*/
    if($ruc54_5=="" && ($ruc18_4!="" && $ruc18_4!="125") && $ruc18_4_cat>=4){
      $ruc54_5="182";
      $ruc54_5_cat="1";
      $js_json_5.='{"id":"182","pid":"'.$ruc18_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
    }
  
                          /*Inicio Ruc 19 nivel 5*/
                          //Izquierda 1
                          if($ruc55_5=="" && ($ruc19_4!="" && $ruc19_4!="219")){
                            $ruc55_5="247";
                            $ruc55_5_cat="1";
                            $js_json_5.='{"id":"247","pid":"'.$ruc19_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Centro 2
                          if($ruc56_5=="" && ($ruc19_4!="" && $ruc19_4!="219")){
                            $ruc56_5="248";
                            $ruc56_5_cat="1";
                            $js_json_5.='{"id":"248","pid":"'.$ruc19_4.'","Datos": "Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Derecha 3
                          if($ruc57_5=="" && ($ruc19_4!="" && $ruc19_4!="219") && $ruc19_4_cat>=4){
                            $ruc57_5="249";
                            $ruc57_5_cat="1";
                            $js_json_5.='{"id":"249","pid":"'.$ruc19_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Fin Ruc 19 nivel 5
  
                          /*Inicio Ruc 20 nivel 5*/
                          //Izquierda 1
                          if($ruc58_5=="" && ($ruc20_4!="" && $ruc20_4!="222")){
                            $ruc58_5="250";
                            $ruc58_5_cat="1";
                            $js_json_5.='{"id":"250","pid":"'.$ruc20_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Centro 2
                          if($ruc59_5=="" && ($ruc20_4!="" && $ruc20_4!="222")){
                            $ruc59_5="251";
                            $ruc59_5_cat="1";
                            $js_json_5.='{"id":"251","pid":"'.$ruc20_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Derecha 3
                          if($ruc60_5=="" && ($ruc20_4!="" && $ruc20_4!="222") && $ruc20_4_cat>=4){
                            $ruc60_5="252";
                            $ruc60_5_cat="1";
                            $js_json_5.='{"id":"252","pid":"'.$ruc20_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Fin Ruc 20 nivel 5
  
                          //Inicio Ruc 21 nivel 5
                          //Izquierda 1
                          if($ruc61_5=="" && ($ruc21_4!="" && $ruc21_4!="225")){
                            $ruc61_5="253";
                            $ruc61_5_cat="1";
                            $js_json_5.='{"id":"253","pid":"'.$ruc21_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Centro 2
                          if($ruc62_5=="" && ($ruc21_4!="" && $ruc21_4!="225")){
                            $ruc62_5="254";
                            $ruc62_5_cat="1";
                            $js_json_5.='{"id":"254","pid":"'.$ruc21_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Derecha 3
                          if($ruc63_5=="" && ($ruc21_4!="" && $ruc21_4!="225") && $ruc21_4_cat>=4){
                            $ruc63_5="255";
                            $ruc63_5_cat=1;
                            $js_json_5.='{"id":"255","pid":"'.$ruc21_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          /*Fin Ruc 21 nivel 5*/
  
                          /*Inicio Ruc 22 nivel 5*/
                          //Izquierda 1
                          if($ruc64_5=="" && ($ruc22_4!="" && $ruc22_4!="228")){
                            $ruc64_5="256";
                            $ruc64_5_cat="1";
                            $js_json_5.='{"id":"256","pid":"'.$ruc22_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Centro 2
                          if($ruc65_5=="" && ($ruc22_4!="" && $ruc22_4!="228")){
                            $ruc65_5="257";
                            $ruc65_5_cat="1";
                            $js_json_5.='{"id":"257","pid":"'.$ruc22_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Derecha 3
                          if($ruc66_5=="" && ($ruc22_4!="" && $ruc22_4!="228") && $ruc22_4_cat>=4){
                            $ruc66_5="258";
                            $ruc66_5_cat="1";
                            $js_json_5.='{"id":"258","pid":"'.$ruc22_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Fin Ruc 22 nivel 5
  
                          //Inicio Ruc 23 nivel 5
                          //Izquierda 1
                          if($ruc67_5=="" && ($ruc23_4!="" && $ruc23_4!="231")){
                            $ruc67_5="259";
                            $ruc67_5_cat="1";
                            $js_json_5.='{"id":"259","pid":"'.$ruc23_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Centro 2
                          if($ruc68_5=="" && ($ruc23_4!="" && $ruc23_4!="231")){
                            $ruc68_5="260";
                            $ruc68_5_cat="1";
                            $js_json_5.='{"id":"260","pid":"'.$ruc23_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Derecha 3
                          if($ruc69_5=="" && ($ruc23_4!="" && $ruc23_4!="231") && $ruc23_4_cat>=4){
                            $ruc69_5="261";
                            $ruc69_5_cat="1";
                            $js_json_5.='{"id":"261","pid":"'.$ruc23_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Fin Ruc 23 nivel 5
  
                          //Inicio Ruc 24 nivel 5
                          //Izquierda 1
                          if($ruc70_5=="" && ($ruc24_4!="" && $ruc24_4!="234")){
                            $ruc70_5="262";
                            $ruc70_5_cat="1";
                            $js_json_5.='{"id":"262","pid":"'.$ruc24_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Centro 2
                          if($ruc71_5=="" && ($ruc24_4!="" && $ruc24_4!="234")){
                            $ruc71_5="263";
                            $ruc71_5_cat="1";
                            $js_json_5.='{"id":"263","pid":"'.$ruc24_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Derecha 3
                          if($ruc72_5=="" && ($ruc24_4!="" && $ruc24_4!="234") && $ruc24_4_cat>=4){
                            $ruc72_5="264";
                            $ruc72_5_cat="1";
                            $js_json_5.='{"id":"264","pid":"'.$ruc24_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Fin Ruc 24 nivel 5
  
                          //Inicio Ruc 25 nivel 5
                          //Izquierda 1
                          if($ruc73_5=="" && ($ruc25_4!="" && $ruc25_4!="237")){
                            $ruc73_5="265";
                            $ruc73_5_cat="1";
                            $js_json_5.='{"id":"265","pid":"'.$ruc25_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Centro 2
                          if($ruc74_5=="" && ($ruc25_4!="" && $ruc25_4!="237")){
                            $ruc74_5="266";
                            $ruc74_5_cat="1";
                            $js_json_5.='{"id":"266","pid":"'.$ruc25_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Derecha 3
                          if($ruc75_5=="" && ($ruc25_4!="" && $ruc25_4!="237") && $ruc25_4_cat>=4){
                            $ruc75_5="267";
                            $ruc75_5_cat="1";
                            $js_json_5.='{"id":"267","pid":"'.$ruc25_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Fin Ruc 25 nivel 5
  
                          //Inicio Ruc 26 nivel 5
                          //Izquierda 1
                          if($ruc76_5=="" && ($ruc26_4!="" && $ruc26_4!="240")){
                            $ruc76_5="268";
                            $ruc76_5_cat="1";
                            $js_json_5.='{"id":"268","pid":"'.$ruc26_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Centro 2
                          if($ruc77_5=="" && ($ruc26_4!="" && $ruc26_4!="240")){
                            $ruc77_5="269";
                            $ruc77_5_cat="1";
                            $js_json_5.='{"id":"269","pid":"'.$ruc26_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Derecha 3
                          if($ruc78_5=="" && ($ruc26_4!="" && $ruc26_4!="240") && $ruc26_4_cat>=4){
                            $ruc78_5="270";
                            $ruc78_5_cat="1";
                            $js_json_5.='{"id":"270","pid":"'.$ruc26_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Fin Ruc 26 nivel 5
  
                          //Inicio Ruc 27 nivel 5
                          //Izquierda 1
                          if($ruc79_5=="" && ($ruc27_4!="" && $ruc27_4!="243")){
                            $ruc79_5="271";
                            $ruc79_5_cat="1";
                            $js_json_5.='{"id":"271","pid":"'.$ruc27_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Centro 2
                          if($ruc80_5=="" && ($ruc27_4!="" && $ruc27_4!="243")){
                            $ruc80_5="272";
                            $ruc80_5_cat="1";
                            $js_json_5.='{"id":"272","pid":"'.$ruc27_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Derecha 3
                          if($ruc81_5=="" && ($ruc27_4!="" && $ruc27_4!="243") && $ruc27_4_cat>=4){
                            $ruc81_5="273";
                            $ruc81_5_cat="1";
                            $js_json_5.='{"id":"273","pid":"'.$ruc27_4.'","Datos":"Pendiente","img":"imas/logo/usuliderno.png","RUC":"Pendiente","email":"Pendiente"},';
                          }
                          //Fin Ruc 27 nivel 5*/
  
}
  
$htmlcompleto=$js_json.$js_json_2.$js_json_3.$js_json_4.$js_json_5;
$htmlsincoma = substr($htmlcompleto, 0, -1);

$html='['.$htmlsincoma.']';
echo ($html);
exit();

?>