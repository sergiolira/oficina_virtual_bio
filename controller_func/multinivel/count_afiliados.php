<?php
session_start();
include_once("../../model_class/representante.php");
$obj=new representante();

$total=0;

if($_SESSION["id_rol"]!="7"){
$total=$obj->count_representante();
echo $total;
die();
  }

$patrocinador_directo=$_SESSION["ruc"];
$rs=$obj->listar_representantes_sponsor($patrocinador_directo);



while($fila=mysqli_fetch_assoc($rs)){
      $total++;
      $rs_4=$obj->listar_representantes_sponsor($fila["ruc"]);
      while ($fila_4=mysqli_fetch_assoc($rs_4)) {

              $total++;
              $rs_8=$obj->listar_representantes_sponsor($fila_4["ruc"]);
              while ($fila_8=mysqli_fetch_assoc($rs_8)) {

                  $total++;

                    $rs_16=$obj->listar_representantes_sponsor($fila_8["ruc"]);
                    while ($fila_16=mysqli_fetch_assoc($rs_16)) {

                        $total++;

                        $rs_32=$obj->listar_representantes_sponsor($fila_16["ruc"]);
                        while($fila_32=mysqli_fetch_assoc($rs_32)){

                          $total++;

                          $rs_64=$obj->listar_representantes_sponsor($fila_32["ruc"]);
                          while ($fila_64=mysqli_fetch_assoc($rs_64)) {

                            $total++;

                            $rs_128=$obj->listar_representantes_sponsor($fila_64["ruc"]);
                            while ($fila_128=mysqli_fetch_assoc($rs_128)) {
                              $total++;

                              $rs_256=$obj->listar_representantes_sponsor($fila_128["ruc"]);
                              while ($fila_256=mysqli_fetch_assoc($rs_256)) {
                                $total++;

                                $rs_512=$obj->listar_representantes_sponsor($fila_256["ruc"]);
                                while($fila_256=mysqli_fetch_assoc($rs_512)){
                                  $total++;
                                }
                              }

                            }

                          }

                        }
                    }

              }
      }

}




echo $total;
die();
?>
