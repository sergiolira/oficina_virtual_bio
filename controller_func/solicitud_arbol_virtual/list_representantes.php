<?php
session_start();
include_once("../../model_class/solicitud_arbol_virtual.php");
$obj=new solicitud_arbol_virtual();

$filtro="";
if($_SESSION["id_rol"]=="4" || $_SESSION["id_rol"]=="representante"){
  $filtro=" where sav.id_solicitante='".$_SESSION["ruc"]."'";
}
$rs=$obj->list_representantes($filtro);
$html='<table id="example2" class="table table-bordered table-striped table-sm " style="font-size: 9px;">
        <thead>
        <tr>
          <th>N°</th>
          <th>N° de solicitud</th>
          <th>Solicitante</th>
          <th>Consulta inicial (representante)</th>
          <th>Consulta inicial (RUC)</th>
          <th>Lider de red</th>
          <th>Lider de red (RUC)</th>
          <th>F. solicitud</th>
          <th>Total</th>
          <th>Estado</th>
          <th>.::Acciones::. </th>
        </tr>
        </thead>
        <tbody class="tbody_list">';
$c=0;
$estado_solicitud_='';
$estado_boton='';
while($fila=mysqli_fetch_assoc($rs)){
  $c++;
  switch ($fila["estado"]) {
    case '1':
      $estado_solicitud_="En proceso";
      $estado_boton="disabled";
      break;
    case '2':
      $estado_solicitud_="Pendiente";
      $estado_boton="";
      break;
    case '3':
      $estado_solicitud_="En verificación";
      $estado_boton="";
      break;
    case '4':
      $estado_solicitud_="Aceptado";
      $estado_boton="";
      break;
    case '5':
      $estado_solicitud_="Rechazado";
      $estado_boton="";
      break;   
    default:
      $estado_solicitud_="Cancelado/Eliminado";
      $estado_boton="disabled";
      break;
  }
  $html.='<tr class="item'.$fila["nro_solicitud"].'">
  <td class="itemrow_a'.$fila["nro_solicitud"].'">'.$c.'</td>
  <td class="itemrow_b'.$fila["nro_solicitud"].'">'.$fila["nro_solicitud"].'</td>
  <td class="itemrow_b'.$fila["nro_solicitud"].'">'.$fila["nombre_solicitante"].'</td>
  <td class="itemrow_b'.$fila["nro_solicitud"].'">'.$fila["nombre_ruc_inicial"].'</td>
  <td class="itemrow_b'.$fila["nro_solicitud"].'">'.$fila["ruc_inicial"].'</td>
  <td class="itemrow_b'.$fila["nro_solicitud"].'">'.$fila["nombre_lider_de_red"].'</td>
  <td class="itemrow_b'.$fila["nro_solicitud"].'">'.$fila["ruc_lider_red"].'</td>
  <td class="itemrow_b'.$fila["nro_solicitud"].'">'.$fila["fecharegistro"].'</td>
  <td class="itemrow_b'.$fila["nro_solicitud"].'">'.$fila["nro_cambios"].'</td>
  <td class="itemrow_b'.$fila["nro_solicitud"].'">'.$estado_solicitud_.'</td>
  <td class="itemrow_d'.$fila["nro_solicitud"].'">
    <center>
    <form action="show-solicitud-arbol-virtual-repre.php" method="POST" id="frmshowsoliarbolvirtual'.$fila["nro_solicitud"].'">
    <input type="hidden" value="'.$fila["nro_solicitud"].'" id="hdnnrosolicitud" name="hdnnrosolicitud">
    <input type="hidden" value="'.$fila["ruc_inicial"].'" id="txtruc_buscar" name="txtruc_buscar">
    <input type="hidden" value="'.$fila["nombre_ruc_inicial"].'" id="hnombres" name="hnombres">
    <input type="hidden" value="'.$fila["estado"].'" id="estado_solic" name="estado_solic">
    </form>
    <button class="btn btn-warning btn-xs show-solicitud-arbol-virtual-repre" '.$estado_boton.' data-id="'.$fila["nro_solicitud"].'"> Ver Solicitud <i class="far fa-eye"></i></button>
    </center>
  </td>
  </tr>';
}
$html.='</tbody>

                </table>
              ';
$html.='<!-- page script -->
  <script>
  $(function () {
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
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
