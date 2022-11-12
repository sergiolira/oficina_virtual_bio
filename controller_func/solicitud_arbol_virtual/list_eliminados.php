<?php
session_start();
include_once("../../model_class/solicitud_arbol_virtual.php");
$obj=new solicitud_arbol_virtual();

$obj->nro_solicitud=$_REQUEST["txtnrosoli"];
$rs=$obj->list_eliminados();
$html='<table id="example2" class="table table-bordered table-striped table-sm " style="font-size: 9px;">
        <thead>
        <tr>
          <th>N° </th>
          <th>Nombres </th>
          <th>RUC </th>
          <th>Correo </th>
          <th>Celular </th>
          <th>Sponsor directo </th>
          <th>Lider de Red</th>
          <th>F. Ingreso</th>
          <!--<th>.::Acciones::. </th>-->
        </tr>
        </thead>
        <tbody class="tbody_list">';
$c=0;
while($fila=mysqli_fetch_assoc($rs)){
  $c++;
  
  $html.='<tr class="item'.$fila["id_solicitud_arbolvirtual"].'">
  <td class="itemrow_a'.$fila["id_solicitud_arbolvirtual"].'">'.$c.'</td>
  <td class="itemrow_b'.$fila["id_solicitud_arbolvirtual"].'">'.$fila["rep_nombres"].'</td>
  <td class="itemrow_b'.$fila["id_solicitud_arbolvirtual"].'">'.$fila["ruc_usuario"].'</td>
  <td class="itemrow_b'.$fila["id_solicitud_arbolvirtual"].'">'.$fila["correo"].'</td>
  <td class="itemrow_b'.$fila["id_solicitud_arbolvirtual"].'">'.$fila["telefono"].'</td>
  <td class="itemrow_b'.$fila["id_solicitud_arbolvirtual"].'">'.$fila["pat_directo_nombres"].'</td>
  <td class="itemrow_b'.$fila["id_solicitud_arbolvirtual"].'">'.$fila["lider_nombres"].'</td>
  <td class="itemrow_b'.$fila["id_solicitud_arbolvirtual"].'">'.$fila["fecha_ingreso"].'</td>
  <!--<td class="itemrow_d'.$fila["id_solicitud_arbolvirtual"].'">
    <center><h6 class="btn btn-danger btn-xs"> Removido <i class="fas fa-user-times"></i></h6>
    </center>
  </td>-->
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
      "lengthChange": false,
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
