<?php
session_start();
include_once("../../model_class/representante.php");
$obj=new representante();

$nombre1='';$ruc1='';
$nombre2_izq='';$ruc2_izq='';
$nombre3_der='';$ruc3_der='';
$nombre4_izq='';$ruc4_izq='';
$nombre5_der='';$ruc5_der='';
$nombre6_izq='';$ruc6_izq='';
$nombre7_der='';$ruc7_der='';
$nombre8_izq='';$ruc8_izq='';
$nombre9_der='';$ruc9_der='';
$nombre10_izq='';$ruc10_izq='';
$nombre11_der='';$ruc11_der='';
$nombre12_izq='';$ruc12_izq='';
$nombre13_der='';$ruc13_der='';
$nombre14_izq='';$ruc14_izq='';
$nombre15_der='';$ruc15_der='';
$nombre16_izq='';$ruc16_izq='';
$nombre17_der='';$ruc17_der='';
$nombre18_izq='';$ruc18_izq='';
$nombre19_der='';$ruc19_der='';
$nombre20_izq='';$ruc20_izq='';
$nombre21_der='';$ruc21_der='';
$nombre22_izq='';$ruc22_izq='';
$nombre23_der='';$ruc23_der='';
$nombre24_izq='';$ruc24_izq='';
$nombre25_der='';$ruc25_der='';
$nombre26_izq='';$ruc26_izq='';
$nombre27_der='';$ruc27_der='';
$nombre28_izq='';$ruc28_izq='';
$nombre29_der='';$ruc29_der='';
$nombre30_izq='';$ruc30_izq='';
$nombre31_der='';$ruc31_der='';


$patrocinador_directo=$_SESSION["ruc"];
$rs=$obj->listar_representantes_sponsor($patrocinador_directo);

$obj->ruc=$patrocinador_directo;

$rs_n_uno=$obj->dato_representante_nivel_uno($patrocinador_directo);

if($fila_n_uno=mysqli_fetch_assoc($rs_n_uno)){

  $nombre1=$fila_n_uno["nombre"]." ".$fila_n_uno["apellidopaterno"]." ".substr($fila_n_uno["apellidomaterno"], 0, 1);
  $ruc1=$fila_n_uno["ruc"];
}

while($fila=mysqli_fetch_assoc($rs)){

    /*Izquierda 1*/
    if($fila["posicion"]==1){
      $nombre2_izq=$fila["nombre"]." ".$fila["apellidopaterno"]." ".substr($fila["apellidomaterno"], 0, 1);
      $ruc2_izq=$fila["ruc"];
    }
    /*Derecha 2*/
    if($fila["posicion"]==2){
      $nombre3_der=$fila["nombre"]." ".$fila["apellidopaterno"]." ".substr($fila["apellidomaterno"], 0, 1);
      $ruc3_der=$fila["ruc"];
    }


      $rs_4=$obj->listar_representantes_sponsor($fila["ruc"]);
      while ($fila_4=mysqli_fetch_assoc($rs_4)) {


            /*Izquierda 1*/
            if($fila_4["posicion"]==1 && $fila["ruc"]==$ruc2_izq){
              $nombre4_izq=$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".substr($fila_4["apellidomaterno"], 0, 1);
              $ruc4_izq=$fila_4["ruc"];
            }
            /*Derecha 2*/
            if($fila_4["posicion"]==2 && $fila["ruc"]==$ruc2_izq){
              $nombre5_der=$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".substr($fila_4["apellidomaterno"], 0, 1);
              $ruc5_der=$fila_4["ruc"];
            }

            /*Izquierda 1*/
            if($fila_4["posicion"]==1 && $fila["ruc"]==$ruc3_der){
              $nombre6_izq=$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".substr($fila_4["apellidomaterno"], 0, 1);
              $ruc6_izq=$fila_4["ruc"];
            }
            /*Derecha 2*/
            if($fila_4["posicion"]==2 && $fila["ruc"]==$ruc3_der){
              $nombre7_der=$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".substr($fila_4["apellidomaterno"], 0, 1);
              $ruc7_der=$fila_4["ruc"];
            }


              $rs_8=$obj->listar_representantes_sponsor($fila_4["ruc"]);
              while ($fila_8=mysqli_fetch_assoc($rs_8)) {

                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc4_izq){
                    $nombre8_izq=$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".substr($fila_8["apellidomaterno"], 0, 1);
                    $ruc8_izq=$fila_8["ruc"];
                  }
                  /*Derecha 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc4_izq){
                    $nombre9_der=$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".substr($fila_8["apellidomaterno"], 0, 1);
                    $ruc9_der=$fila_8["ruc"];
                  }
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc5_der){
                    $nombre10_izq=$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".substr($fila_8["apellidomaterno"], 0, 1);
                    $ruc10_izq=$fila_8["ruc"];
                  }
                  /*Derecha 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc5_der){
                    $nombre11_der=$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".substr($fila_8["apellidomaterno"], 0, 1);
                    $ruc11_der=$fila_8["ruc"];
                  }
                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc6_izq){
                    $nombre12_izq=$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".substr($fila_8["apellidomaterno"], 0, 1);
                    $ruc12_izq=$fila_8["ruc"];
                  }
                  /*Derecha 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc6_izq){
                    $nombre13_der=$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".substr($fila_8["apellidomaterno"], 0, 1);
                    $ruc13_der=$fila_8["ruc"];
                  }

                  /*Izquierda 1*/
                  if($fila_8["posicion"]==1 && $fila_4["ruc"]==$ruc7_der){
                    $nombre14_izq=$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".substr($fila_8["apellidomaterno"], 0, 1);
                    $ruc14_izq=$fila_8["ruc"];
                  }
                  /*Derecha 2*/
                  if($fila_8["posicion"]==2 && $fila_4["ruc"]==$ruc7_der){
                    $nombre15_der=$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".substr($fila_8["apellidomaterno"], 0, 1);
                    $ruc15_der=$fila_8["ruc"];
                  }

                    $rs_16=$obj->listar_representantes_sponsor($fila_8["ruc"]);
                    while ($fila_16=mysqli_fetch_assoc($rs_16)) {



                        /*Izquierda 1*/
                        if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc8_izq){
                          $nombre16_izq=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc16_izq=$fila_16["ruc"];
                        }
                        /*Derecha 2*/
                        if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc8_izq){
                          $nombre17_der=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc17_der=$fila_16["ruc"];
                        }
                        /*Izquierda 1*/
                        if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc9_der){
                          $nombre18_izq=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc18_izq=$fila_16["ruc"];
                        }
                        /*Derecha 2*/
                        if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc9_der){
                          $nombre19_der=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc19_der=$fila_16["ruc"];
                        }
                        /*Izquierda 1*/
                        if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc10_izq){
                          $nombre20_izq=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc20_izq=$fila_16["ruc"];
                        }
                        /*Derecha 2*/
                        if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc10_izq){
                          $nombre21_der=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc21_der=$fila_16["ruc"];
                        }
                        /*Izquierda 1*/
                        if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc11_der){
                          $nombre22_izq=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc22_izq=$fila_16["ruc"];
                        }
                        /*Derecha 2*/
                        if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc11_der){
                          $nombre23_der=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc23_der=$fila_16["ruc"];
                        }


                        /************/

                        /*Izquierda 1*/
                        if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc12_izq){
                          $nombre24_izq=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc24_izq=$fila_16["ruc"];
                        }
                        /*Derecha 2*/
                        if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc12_izq){
                          $nombre25_der=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc25_der=$fila_16["ruc"];
                        }
                        /*Izquierda 1*/
                        if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc13_der){
                          $nombre26_izq=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc26_izq=$fila_16["ruc"];
                        }
                        /*Derecha 2*/
                        if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc13_der){
                          $nombre27_der=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc27_der=$fila_16["ruc"];
                        }
                        /*Izquierda 1*/
                        if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc14_izq){
                          $nombre28_izq=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc28_izq=$fila_16["ruc"];
                        }
                        /*Derecha 2*/
                        if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc14_izq){
                          $nombre29_der=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc29_der=$fila_16["ruc"];
                        }
                        /*Izquierda 1*/
                        if($fila_16["posicion"]==1 && $fila_8["ruc"]==$ruc15_der){
                          $nombre30_izq=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc30_izq=$fila_16["ruc"];
                        }
                        /*Derecha 2*/
                        if($fila_16["posicion"]==2 && $fila_8["ruc"]==$ruc15_der){
                          $nombre31_der=$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".substr($fila_16["apellidomaterno"], 0, 1);
                          $ruc31_der=$fila_16["ruc"];
                        }

                    }

              }
      }

}

?>
<!--Arbol Inicio-->
<table id="Tabla_01" width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr><!--Espacio-->
  </tr>
  <tr>
    <td colspan="54" rowspan="4">
      <img src="images/arbolgenealogico_02.gif" width="470" height="97" alt=""></td>
    <td colspan="10" >
      <!--Usuario Nivel 1-->
      <label align="center" style="font-size: 14px"style="font-size: 14px"><?php echo $ruc1." ".$nombre1;?></label>
    </td>
    <td colspan="54" rowspan="4">
      <img src="images/arbolgenealogico_04.gif" width="465" height="97" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="23" alt=""></td>
  </tr>
  <tr>
   <!--Espacio-->
  </tr>
  <tr>
    <td colspan="3" rowspan="11">
      <img src="images/arbolgenealogico_06.gif" width="16" height="280" alt="">
    </td>
    <td colspan="5" >
      <!--Usuario Nivel 1-->
      <div class="widget-user-image" align="center" >
                  <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
            </div>
        </td>
    <td colspan="2" rowspan="11">
      <img src="images/arbolgenealogico_08.gif" width="20" height="280" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="49" alt=""></td>
  </tr>
  <tr>
    <td colspan="5" rowspan="15">
      <img src="images/arbolgenealogico_09.gif" width="53" height="338" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="22" alt=""></td>
  </tr>
  <tr>
    <td colspan="26" rowspan="4">
      <img src="images/arbolgenealogico_10.gif" width="224" height="106" alt=""></td>
    <td colspan="8">
      <!--Usuario Nivel 2.1-->
      <?php if($ruc2_izq!=""){?>
        <label align="center"  style="font-size: 14px"><?php echo $ruc2_izq." ".$nombre2_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td colspan="20" rowspan="4">
      <img src="images/arbolgenealogico_12.gif" width="168" height="106" alt=""></td>
    <td colspan="20" rowspan="4">
      <img src="images/arbolgenealogico_13.gif" width="172" height="106" alt=""></td>
    <td colspan="9">
      <!--Usuario Nivel 2.2-->
      <?php if($ruc3_der!=""){?>
        <label align="center" style="font-size: 14px"><?php echo $ruc3_der." ".$nombre3_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td colspan="25" rowspan="4">
      <img src="images/arbolgenealogico_15.gif" width="217" height="106" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="22" alt=""></td>
  </tr>
  <tr>
    <!--Espacio-->
  </tr>
  <tr>
    <td rowspan="12">
      <img src="images/arbolgenealogico_18.gif" width="12" height="290" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 2.1-->
      <?php if($ruc2_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
    </td>
    <td colspan="2" rowspan="7">
      <img src="images/arbolgenealogico_20.gif" width="13" height="183" alt=""></td>
    <td rowspan="12">
      <img src="images/arbolgenealogico_21.gif" width="12" height="290" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 2.2-->
      <?php if($ruc3_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td colspan="3" rowspan="7">
      <img src="images/arbolgenealogico_23.gif" width="11" height="183" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="49" alt=""></td>
  </tr>
  <tr>
    <td colspan="5" rowspan="11">
      <img src="images/arbolgenealogico_24.gif" width="53" height="241" alt=""></td>
    <td colspan="5" rowspan="11">
      <img src="images/arbolgenealogico_25.gif" width="53" height="241" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="31" alt=""></td>
  </tr>
  <tr>
    <td colspan="9" rowspan="5">
      <img src="images/arbolgenealogico_26.gif" width="89" height="103" alt=""></td>
    <td colspan="10" rowspan="2">
      <!--Usuario Nivel 3.1-->
      <?php if($ruc4_izq!=""){?>
        <label align="center" style="font-size: 14px" > <?php echo $ruc4_izq." ".$nombre4_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td colspan="7" rowspan="5">
      <img src="images/arbolgenealogico_28.gif" width="49" height="103" alt=""></td>
    <td colspan="5" rowspan="5">
      <img src="images/arbolgenealogico_29.gif" width="44" height="103" alt=""></td>
    <td colspan="10" rowspan="2">
      <!--Usuario Nivel 3.2-->
      <?php if($ruc5_der!=""){?>
        <label align="center" style="font-size: 14px"><?php echo $ruc5_der." ".$nombre5_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td colspan="5" rowspan="5">
      <img src="images/arbolgenealogico_31.gif" width="44" height="103" alt=""></td>
    <td colspan="6" rowspan="5">
      <img src="images/arbolgenealogico_32.gif" width="47" height="103" alt=""></td>
    <td colspan="8" rowspan="2">
      <!--Usuario Nivel 3.3-->
      <?php if($ruc6_izq!=""){?>
        <label align="center" style="font-size: 14px" ><?php echo $ruc6_izq." ".$nombre6_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td colspan="6" rowspan="5">
      <img src="images/arbolgenealogico_34.gif" width="46" height="103" alt=""></td>
    <td colspan="5" rowspan="5">
      <img src="images/arbolgenealogico_35.gif" width="47" height="103" alt=""></td>
    <td colspan="11">
      <!--Usuario Nivel 3.4-->
      <?php if($ruc7_der!=""){?>
        <label align="center" style="font-size: 14px"><?php echo $ruc7_der." ".$nombre7_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td colspan="9" rowspan="5">
      <img src="images/arbolgenealogico_37.gif" width="87" height="103" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="21" alt=""></td>
  </tr>
  <tr>
    <!--Espacio-->
  </tr>
  <tr>
    <!--Espacio-->
  </tr>
  <tr>
    <td colspan="3" rowspan="2">
      <img src="images/arbolgenealogico_42.gif" width="13" height="78" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 3.1-->
      <?php if($ruc4_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td colspan="2" rowspan="2">
      <img src="images/arbolgenealogico_44.gif" width="20" height="78" alt=""></td>
    <td colspan="2" rowspan="2">
      <img src="images/arbolgenealogico_45.gif" width="13" height="78" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 3.2-->
      <?php if($ruc5_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td colspan="3" rowspan="2">
      <img src="images/arbolgenealogico_47.gif" width="14" height="78" alt=""></td>
    <td rowspan="7">
      <img src="images/arbolgenealogico_48.gif" width="11" height="185" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 3.3-->
      <?php if($ruc6_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td colspan="2" rowspan="2">
      <img src="images/arbolgenealogico_50.gif" width="15" height="78" alt=""></td>
    <td colspan="3" rowspan="2">
      <img src="images/arbolgenealogico_51.gif" width="15" height="78" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 3.4-->
      <?php if($ruc7_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td colspan="3" rowspan="2">
      <img src="images/arbolgenealogico_53.gif" width="15" height="78" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="49" alt=""></td>
  </tr>
  <tr>
    <td colspan="5" rowspan="6">
      <img src="images/arbolgenealogico_54.gif" width="53" height="136" alt=""></td>
    <td colspan="5" rowspan="6">
      <img src="images/arbolgenealogico_55.gif" width="53" height="136" alt=""></td>
    <td colspan="5" rowspan="6">
      <img src="images/arbolgenealogico_56.gif" width="53" height="136" alt=""></td>
    <td colspan="5" rowspan="6">
      <img src="images/arbolgenealogico_57.gif" width="53" height="136" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="29" alt=""></td>
  </tr>
  <tr>
    <td colspan="3" rowspan="5">
      <img src="images/arbolgenealogico_58.gif" width="31" height="107" alt=""></td>
    <td colspan="8" rowspan="2">
      <!--Usuario Nivel 4.1-->
      <?php if($ruc8_izq!=""){?>
        <label align="center" style="font-size: 13px"><?php echo $ruc8_izq." ".$nombre8_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_60.gif" width="3" height="107" alt=""></td>
    <td colspan="8">
      <!--Usuario Nivel 4.2-->
      <?php if($ruc9_der!=""){?>
        <label align="center" style="font-size: 13px"><?php echo $ruc9_der." ".$nombre9_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_62.gif" width="2" height="107" alt=""></td>
    <td colspan="9" rowspan="2">
      <!--Usuario Nivel 4.3-->
      <?php if($ruc10_izq!=""){?>
        <label align="center" style="font-size: 13px"><?php echo $ruc10_izq." ".$nombre10_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_64.gif" width="1" height="107" alt=""></td>
    <td colspan="9" rowspan="2">
      <!--Usuario Nivel 4.4-->
      <?php if($ruc11_der!=""){?>
        <label align="center" style="font-size: 13px"><?php echo $ruc11_der." ".$nombre11_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_66.gif" width="3" height="107" alt=""></td>
    <td colspan="8" rowspan="2">
      <!--Usuario Nivel 4.5-->
      <?php if($ruc12_izq!=""){?>
        <label align="center" style="font-size: 13px"><?php echo $ruc12_izq." ".$nombre12_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td colspan="8" rowspan="2">
      <!--Usuario Nivel 4.6-->
      <?php if($ruc13_der!=""){?>
        <label align="center" style="font-size: 13px"><?php echo $ruc13_der." ".$nombre13_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_69.gif" width="1" height="107" alt="">
    </td>
    <td colspan="9" rowspan="2">
      <!--Usuario Nivel 4.7-->
      <?php if($ruc14_izq!=""){?>
        <label align="center" style="font-size: 13px"><?php echo $ruc14_izq." ".$nombre14_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_71.gif" width="4" height="107" alt=""></td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_72.gif" width="1" height="107" alt=""></td>
    <td colspan="8" rowspan="2">
      <!--Usuario Nivel 4.8-->
      <?php if($ruc15_der!=""){?>
        <label align="center" style="font-size: 13px"><?php echo $ruc15_der." ".$nombre15_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td colspan="3" rowspan="5">
      <img src="images/arbolgenealogico_74.gif" width="37" height="107" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="19" alt=""></td>
  </tr>
  <tr>
    <!--Espacio-->
  </tr>
  <tr>
    <!--Espacio-->
  </tr>
  <tr>
    <td rowspan="2">
      <img src="images/arbolgenealogico_83.gif" width="8" height="84" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 4.1-->
      <?php if($ruc8_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_85.gif" width="7" height="84" alt=""></td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_86.gif" width="9" height="84" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 4.2-->
      <?php if($ruc9_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="2">
      <!--linea --></td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_89.gif" width="7" height="84" alt=""></td>
    <td colspan="7">
      <!--Usuario Nivel 4.3-->
      <?php if($ruc10_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_91.gif" width="10" height="84" alt=""></td>
    <td rowspan="2">
      <!--linea blanca--></td>
    <td colspan="7">
      <!--Usuario Nivel 4.4-->
      <?php if($ruc11_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_94.gif" width="9" height="84" alt=""></td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_95.gif" width="8" height="84" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 4.5-->
      <?php if($ruc12_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_97.gif" width="6" height="84" alt=""></td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_98.gif" width="4" height="84" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 4.6-->
      <?php if($ruc13_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_100.gif" width="4" height="84" alt=""></td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_101.gif" width="7" height="84" alt=""></td>
    <td colspan="7">
      <!--Usuario Nivel 4.7-->
      <?php if($ruc14_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_103.gif" width="8" height="84" alt=""></td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_104.gif" width="5" height="84" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 4.8-->
      <?php if($ruc15_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="2">
      <img src="images/arbolgenealogico_106.gif" width="6" height="84" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="49" alt=""></td>
  </tr>
  <tr>
    <td colspan="6">
      <img src="images/arbolgenealogico_107.gif" width="53" height="35" alt=""></td>
    <td colspan="6">
      <img src="images/arbolgenealogico_108.gif" width="52" height="35" alt=""></td>
    <td colspan="7">
      <img src="images/arbolgenealogico_109.gif" width="53" height="35" alt=""></td>
    <td colspan="7">
      <img src="images/arbolgenealogico_110.gif" width="52" height="35" alt=""></td>
    <td colspan="6">
      <img src="images/arbolgenealogico_111.gif" width="53" height="35" alt=""></td>
    <td colspan="6">
      <img src="images/arbolgenealogico_112.gif" width="53" height="35" alt=""></td>
    <td colspan="7">
      <img src="images/arbolgenealogico_113.gif" width="53" height="35" alt=""></td>
    <td colspan="6">
      <img src="images/arbolgenealogico_114.gif" width="53" height="35" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="35" alt=""></td>
  </tr>
  <tr>
    <td rowspan="5">
      <img src="images/arbolgenealogico_115.gif" width="2" height="86" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 5.1-->
      <?php if($ruc16_izq!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc16_izq." ".$nombre16_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_117.gif" width="4" height="86" alt=""></td>
    <td colspan="7">
      <!--Usuario Nivel 5.2-->
      <?php if($ruc17_der!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc17_der." ".$nombre17_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_119.gif" width="5" height="86" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 5.3-->
      <?php if($ruc18_izq!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc18_izq." ".$nombre18_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_121.gif" width="4" height="86" alt=""></td>
    <td colspan="7">
      <!--Usuario Nivel 5.4-->
      <?php if($ruc19_der!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc19_der." ".$nombre19_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_123.gif" width="5" height="86" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 5.5-->
      <?php if($ruc20_izq!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc20_izq." ".$nombre20_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_125.gif" width="5" height="86" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 5.6-->
      <?php if($ruc21_der!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc21_der." ".$nombre21_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_127.gif" width="5" height="86" alt=""></td>
    <td colspan="7">
      <!--Usuario Nivel 5.7-->
      <?php if($ruc22_izq!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc22_izq." ".$nombre22_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_129.gif" width="4" height="86" alt=""></td>
    <td colspan="7">
      <!--Usuario Nivel 5.8-->
      <?php if($ruc23_der!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc23_der." ".$nombre23_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_131.gif" width="4" height="86" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 5.9-->
      <?php if($ruc24_izq!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc24_izq." ".$nombre24_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_133.gif" width="4" height="86" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 5.10-->
      <?php if($ruc25_der!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc25_der." ".$nombre25_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_135.gif" width="3" height="86" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 5.11-->
      <?php if($ruc26_izq!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc26_izq." ".$nombre26_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_137.gif" width="3" height="86" alt=""></td>
    <td colspan="6">
      <!--Usuario Nivel 5.12-->
      <?php if($ruc27_der!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc27_der." ".$nombre27_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_139.gif" width="3" height="86" alt=""></td>
    <td colspan="7">
      <!--Usuario Nivel 5.13-->
      <?php if($ruc28_izq!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc28_izq." ".$nombre28_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_141.gif" width="5" height="86" alt=""></td>
    <td colspan="7">
      <!--Usuario Nivel 5.14-->
      <?php if($ruc29_der!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc29_der." ".$nombre29_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_143.gif" width="4" height="86" alt=""></td>
    <td colspan="7">
      <!--Usuario Nivel 5.15-->
      <?php if($ruc30_izq!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc30_izq." ".$nombre30_izq;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    <td rowspan="5">
      <img src="images/arbolgenealogico_145.gif" width="5" height="86" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 5.16-->
      <?php if($ruc31_der!=""){?>
        <label align="center"  style="font-size: 11px"><?php echo $ruc31_der." ".$nombre31_der;?></label>
      <?php }else{?>
        <label align="center" style="font-size: 14px"></label>
      <?php }?>
    </td>
    <td rowspan="5">
      <img src="images/arbolgenealogico_147.gif" width="9" height="86" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="20" alt=""></td>
  </tr>
  <tr>
    <!--Espacio-->
  </tr>
  <tr>
    <td rowspan="3">
      <img src="images/arbolgenealogico_164.gif" width="4" height="64" alt=""></td>
    <td colspan="3">
      <!--Usuario Nivel 5.1-->
      <?php if($ruc16_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_166.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_167.gif" width="3" height="64" alt=""></td>
    <td colspan="5" >
      <!--Usuario Nivel 5.2-->
      <?php if($ruc17_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_169.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_170.gif" width="3" height="64" alt=""></td>
    <td colspan="4" >
      <!--Usuario Nivel 5.3-->
      <?php if($ruc18_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_172.gif" width="2" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_173.gif" width="4" height="64" alt=""></td>
    <td colspan="5" >
      <!--Usuario Nivel 5.4-->
      <?php if($ruc19_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <!--linea blanca--></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_176.gif" width="2" height="64" alt=""></td>
    <td colspan="4">
      <!--Usuario Nivel 5.5-->
      <?php if($ruc20_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_178.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_179.gif" width="3" height="64" alt=""></td>
    <td colspan="4">
      <!--Usuario Nivel 5.6-->
      <?php if($ruc21_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_181.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_182.gif" width="2" height="64" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 5.7-->
      <?php if($ruc22_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_184.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_185.gif" width="3" height="64" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 5.8-->
      <?php if($ruc23_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_187.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_188.gif" width="4" height="64" alt=""></td>
    <td colspan="4">
      <!--Usuario Nivel 5.9-->
      <?php if($ruc24_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_190.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_191.gif" width="3" height="64" alt=""></td>
    <td colspan="4">
      <!--Usuario Nivel 5.10-->
      <?php if($ruc25_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_193.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_194.gif" width="4" height="64" alt=""></td>
    <td colspan="4">
      <!--Usuario Nivel 5.11-->
      <?php if($ruc26_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_196.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_197.gif" width="4" height="64" alt=""></td>
    <td colspan="4">
      <!--Usuario Nivel 5.12-->
      <?php if($ruc27_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_199.gif" width="4" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_200.gif" width="4" height="64" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 5.13-->
      <?php if($ruc28_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_202.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_203.gif" width="2" height="64" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 5.14-->
      <?php if($ruc29_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_205.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_206.gif" width="3" height="64" alt=""></td>
    <td colspan="5">
      <!--Usuario Nivel 5.15-->
      <?php if($ruc30_izq!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_208.gif" width="3" height="64" alt=""></td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_209.gif" width="3" height="64" alt=""></td>
    <td colspan="3">
      <!--Usuario Nivel 5.16-->
      <?php if($ruc31_der!=""){?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usulider.png" alt="User Avatar">
        </div>
      <?php }else{?>
        <div class="widget-user-image" align="center" >
          <img class="img-circle elevation-2" src="imas/logo/usuliderno.png" alt="User Avatar">
        </div>
      <?php }?>
        </td>
    <td rowspan="3">
      <img src="images/arbolgenealogico_211.gif" width="2" height="64" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="48" alt=""></td>
  </tr>
  <tr><!--Espacio-->
  </tr>
  <tr><!--Espacio-->
  </tr>
  <tr>
   <!--Espacio-->
  </tr>
  <tr>
    <td>
      <img src="images/espacio.gif" width="2" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="25" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="8" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="20" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="20" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="7" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="20" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="5" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="22" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="9" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="11" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="11" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="2" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="20" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="6" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="2" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="12" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="12" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="5" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="2" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="30" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="7" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="6" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="10" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="5" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="23" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="10" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="17" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="5" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="2" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="26" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="9" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="13" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="21" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="9" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="16" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="26" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="8" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="12" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="7" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="8" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="20" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="6" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="11" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="16" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="27" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="11" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="11" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="21" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="12" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="16" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="26" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="7" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="16" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="5" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="2" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="21" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="8" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="17" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="4" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="26" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="1" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="5" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="9" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="12" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="5" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="3" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="21" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="6" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="26" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="2" height="1" alt=""></td>
    <td>
      <img src="images/espacio.gif" width="9" height="1" alt=""></td>
    <td></td>
  </tr>
<!--Arbol Fin-->
</table>
