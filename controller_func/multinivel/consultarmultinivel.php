<?php
session_start();
include_once("../../model_class/representante.php");
$obj=new representante();
$_POST["sltruc_buscar"];
$_POST["txtruc_buscar"];

if(trim($_POST["sltruc_buscar"])!=0){
  $txtpatrocinador=$_POST["sltruc_buscar"];
}
if(trim($_POST["txtruc_buscar"])!=""){
  $txtpatrocinador=$_POST["txtruc_buscar"];
}
$html_2="";$html_4="";$html_8="";$html_16="";$html="";$style_sponsor_dir_uno="";$style_sponsor_dir_2="";$style_sponsor_dir_4="";$style_sponsor_dir_8="";$style_sponsor_dir_16="";
if(trim($_POST["sltruc_buscar"])==0 && trim($_POST["txtruc_buscar"])==""){
  $html='<table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombres </th>
                    <th>RUC </th>
                    <th>Sponsor </th>
                    <th>Posición </th>
                    <th>Nivel </th>
                    <th>Estado </th>
                    <th>F Creación </th>
                  </tr>
                  </thead>
                  <tbody class="tbody_list">';

  $html.=$html_2.$html_4.$html_8.$html_16.'</tbody>

                  </table>
                ';
  $html.='<!-- page script -->
    <script>
    $(function () {
      $("#example2").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "retrieve": true,
      });
    });
    </script>';
  echo $html;
  die();
}
/*LIsta de representantes lideres*/
$patrocinador_directo=$txtpatrocinador;
$obj->patrocinador=$patrocinador_directo;

$rs=$obj->listar_representantes_sponsor($patrocinador_directo);

$html='<table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombres </th>
                    <th>RUC </th>
                    <th>Sponsor </th>
                    <th>Posición </th>
                    <th>Nivel </th>
                    <th>Estado </th>
                    <th>F Creación </th>
                  </tr>
                  </thead>
                  <tbody class="tbody_list">';

/*Obtrengo los datos de representante nivel 1*/
$obj->ruc=$patrocinador_directo;
$rs_n_uno=$obj->dato_representante_nivel_uno($patrocinador_directo);

if($fila_n_uno=mysqli_fetch_assoc($rs_n_uno)){
  $estado="Activo";
  $style_lo="";
  $buttonstyle="";
    if($fila_n_uno['estado']==0){
      $estado='Inactivo';
      $style_lo="style='color:red'";
    }

    /*Opciones de posisicion de la red*/
    switch ($fila_n_uno["posicion"]) {
      case '1':
        $posicion_="1";
        break;
      case '2':
        $posicion_="2";
        break;
      case '3':
        $posicion_="3";
        break;
      case '4':
        $posicion_="4";
        break;
      default:
        $posicion_="Principal";
        break;
    }

    $style_nivel="style='color:#E20612;font-weight: bold;'";
    $style_sponsor_dir_uno="style='color:#E20612;font-weight: bold;'";

  $html.='<tr class="item'.$fila_n_uno["id_representante"].'">
  <td class="itemrow_b'.$fila_n_uno["id_representante"].'">'.$fila_n_uno["nombre"]." ".$fila_n_uno["apellidopaterno"]." ".$fila_n_uno["apellidomaterno"].'</td>
  <td class="itemrow_c'.$fila_n_uno["id_representante"].'" '.$style_sponsor_dir_uno.'>'.$fila_n_uno["ruc"].'</td>
  <td class="itemrow_d'.$fila_n_uno["id_representante"].'">'.$fila_n_uno["patrocinador_directo"].'</td>
  <td class="itemrow_f'.$fila_n_uno["id_representante"].'">'.$posicion_.'</td>
  <td '.$style_nivel.' class="itemrow_f'.$fila_n_uno["id_representante"].'">Nivel 1</td>
  <td '.$style_lo.' class="itemrow_h'.$fila_n_uno["id_representante"].'">'.$estado.'</td>
  <td class="itemrow_c'.$fila_n_uno["id_representante"].'">'.$fila_n_uno["fecharegistro"].'</td>

  </tr>';
}

while($fila=mysqli_fetch_assoc($rs)){
  /*$obj->ruc=$fila["ruc"];
  $obj->update_lider_red();*/
  $estado="Activo";
  $style_lo="";
  $buttonstyle="";
    if($fila['estado']==0){
      $estado='Inactivo';
      $style_lo="style='color:red'";
    }
    /*Opciones de posisicion de la red*/
    switch ($fila["posicion"]) {
      case '1':
        $posicion_="1";
        break;
      case '2':
        $posicion_="2";
        break;
      case '3':
        $posicion_="3";
        break;
      case '4':
        $posicion_="4";
        break;
      default:
        $posicion_="Principal";
        break;
    }
    $style_nivel="style='color:#FFA200;font-weight: bold;'";
    $style_sponsor_dir_2="style='color:#FFA200;font-weight: bold;'";

  $html_2.='<tr class="item'.$fila["id_representante"].'">
  <td class="itemrow_b'.$fila["id_representante"].'">'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'</td>
  <td class="itemrow_c'.$fila["id_representante"].'" '.$style_sponsor_dir_2.'>'.$fila["ruc"].'</td>
  <td class="itemrow_d'.$fila["id_representante"].'" '.$style_sponsor_dir_uno.'>'.$fila["patrocinador_directo"].'</td>
  <td class="itemrow_f'.$fila["id_representante"].'">'.$posicion_.'</td>
  <td '.$style_nivel.' class="itemrow_f'.$fila["id_representante"].'">Nivel 2</td>
  <td '.$style_lo.' class="itemrow_h'.$fila["id_representante"].'">'.$estado.'</td>
  <td class="itemrow_c'.$fila["id_representante"].'">'.$fila["fecharegistro"].'</td>

  </tr>';

      $rs_4=$obj->listar_representantes_sponsor($fila["ruc"]);
      while ($fila_4=mysqli_fetch_assoc($rs_4)) {
          /*$obj->ruc=$fila_4["ruc"];
          $obj->update_lider_red();*/
            $estado="Activo";
            $style_lo="";
            $buttonstyle="";
              if($fila_4['estado']==0){
                $estado='Inactivo';
                $style_lo="style='color:red'";
              }
              /*Opciones de posisicion de la red*/
              switch ($fila_4["posicion"]) {
                case '1':
                  $posicion_="1";
                  break;
                case '2':
                  $posicion_="2";
                  break;
                case '3':
                  $posicion_="3";
                  break;
                case '4':
                  $posicion_="4";
                  break;
                default:
                  $posicion_="Principal";
                  break;
              }
              $style_nivel="style='color:#D5C414;font-weight: bold;'";
              $style_sponsor_dir_4="style='color:#D5C414;font-weight: bold;'";

              $html_4.='<tr class="item'.$fila_4["id_representante"].'">
              <td class="itemrow_b'.$fila_4["id_representante"].'">'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'</td>
              <td class="itemrow_c'.$fila_4["id_representante"].'" '.$style_sponsor_dir_4.'>'.$fila_4["ruc"].'</td>
              <td class="itemrow_d'.$fila_4["id_representante"].'" '.$style_sponsor_dir_2.'>'.$fila_4["patrocinador_directo"].'</td>
              <td class="itemrow_f'.$fila_4["id_representante"].'">'.$posicion_.'</td>
              <td '.$style_nivel.' class="itemrow_f'.$fila_4["id_representante"].'">Nivel 3</td>
              <td '.$style_lo.' class="itemrow_h'.$fila_4["id_representante"].'">'.$estado.'</td>
              <td class="itemrow_c'.$fila_4["id_representante"].'">'.$fila_4["fecharegistro"].'</td>

              </tr>';

              $rs_8=$obj->listar_representantes_sponsor($fila_4["ruc"]);
              while ($fila_8=mysqli_fetch_assoc($rs_8)) {
                  /*$obj->ruc=$fila_8["ruc"];
                  $obj->update_lider_red();*/
                  $estado="Activo";
                  $style_lo="";
                  $buttonstyle="";
                    if($fila_8['estado']==0){
                      $estado='Inactivo';
                      $style_lo="style='color:red'";
                    }
                      /*Opciones de posisicion de la red*/
                      switch ($fila_8["posicion"]) {
                        case '1':
                          $posicion_="1";
                          break;
                        case '2':
                          $posicion_="2";
                          break;
                        case '3':
                          $posicion_="3";
                          break;
                        case '4':
                          $posicion_="4";
                          break;
                        default:
                          $posicion_="Principal";
                          break;
                      }
                    $style_nivel="style='color:#3CA805;font-weight: bold;'";
                    $style_sponsor_dir_8="style='color:#3CA805;font-weight: bold;'";


                    $html_8.='<tr class="item'.$fila_8["id_representante"].'">
                    <td class="itemrow_b'.$fila_8["id_representante"].'">'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'</td>
                    <td class="itemrow_c'.$fila_8["id_representante"].'" '.$style_sponsor_dir_8.'>'.$fila_8["ruc"].'</td>
                    <td class="itemrow_d'.$fila_8["id_representante"].'" '.$style_sponsor_dir_4.'>'.$fila_8["patrocinador_directo"].'</td>
                    <td class="itemrow_f'.$fila_8["id_representante"].'">'.$posicion_.'</td>
                    <td '.$style_nivel.' class="itemrow_f'.$fila_8["id_representante"].'">Nivel 4</td>
                    <td '.$style_lo.' class="itemrow_h'.$fila_8["id_representante"].'">'.$estado.'</td>
                    <td class="itemrow_c'.$fila_8["id_representante"].'">'.$fila_8["fecharegistro"].'</td>

                    </tr>';
                    $rs_16=$obj->listar_representantes_sponsor($fila_8["ruc"]);
                    while ($fila_16=mysqli_fetch_assoc($rs_16)) {
                      /*$obj->ruc=$fila_16["ruc"];
                      $obj->update_lider_red();*/
                        $estado="Activo";
                        $style_lo="";
                        $buttonstyle="";
                          if($fila_16['estado']==0){
                            $estado='Inactivo';
                            $style_lo="style='color:red'";
                          }

                            /*Opciones de posisicion de la red*/
                            switch ($fila_16["posicion"]) {
                              case '1':
                                $posicion_="1";
                                break;
                              case '2':
                                $posicion_="2";
                                break;
                              case '3':
                                $posicion_="3";
                                break;
                              case '4':
                                $posicion_="4";
                                break;
                              default:
                                $posicion_="Principal";
                                break;
                            }
                          $style_nivel="style='color:#0092D7;font-weight: bold;'";
                          $style_sponsor_dir_16="style='color:#0092D7;font-weight: bold;'";

                          $html_16.='<tr class="item'.$fila_16["id_representante"].'">
                          <td class="itemrow_b'.$fila_16["id_representante"].'">'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'</td>
                          <td class="itemrow_c'.$fila_16["id_representante"].'" '.$style_sponsor_dir_16.'>'.$fila_16["ruc"].'</td>
                          <td class="itemrow_d'.$fila_16["id_representante"].'" '.$style_sponsor_dir_8.'>'.$fila_16["patrocinador_directo"].'</td>
                          <td class="itemrow_f'.$fila_16["id_representante"].'">'.$posicion_.'</td>
                          <td '.$style_nivel.' class="itemrow_f'.$fila_16["id_representante"].'">Nivel 5</td>
                          <td '.$style_lo.' class="itemrow_h'.$fila_16["id_representante"].'">'.$estado.'</td>
                          <td class="itemrow_c'.$fila_16["id_representante"].'">'.$fila_16["fecharegistro"].'</td>

                          </tr>';

                    }

              }
      }

}




$html.=$html_2.$html_4.$html_8.$html_16.'</tbody>

                </table>
              ';
$html.='<!-- page script -->
  <script>
  $(function () {
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "retrieve": true,
    });
  });
  </script>';
echo $html;
die();
?>
