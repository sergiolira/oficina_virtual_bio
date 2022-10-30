<?php
session_start();
include_once("../../model_class/candidato.php");
$obj=new candidato();
$rs=$obj->list();
$html='<table id="example2" class="table table-bordered table-striped table-sm " style="font-size: 12px;">
                  <thead>
                  <tr>
                    <th>N° </th>
                    <th>Nombres </th>
                    <th>Nro documento </th>
                    <th>Correo electronico </th>
                    <th>Teléfono </th>
                    <th>Edad </th>
                    
                    <th>Estado  </th>                    
                    <th>F. de registro</th>               
                    <th>.::Acciones::. </th>
                  </tr>
                  </thead>
                  <tbody>';

$c=0;
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";
while($fila=mysqli_fetch_assoc($rs)){
  $c++;
  $desc_btn="";
  $btn_disabled="";

  if($fila["estado"]==1){
    $estado="Activo";
    $estado_style="class='text-success'";
    $btn_eliminar='<button data-id="'.$fila["id_candidato"].'"   
    title="Inactivar" class="btn btn-xs btn-danger desactivar-can" id="btn_can'.$fila["id_candidato"].'">
    <i class="far fa-trash-alt" id="icon_can'.$fila["id_candidato"].'"></i></button>';
  }
  else{ 
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_candidato"].'"   
    title="Activar" class="btn btn-xs btn-success activar-can" id="btn_can'.$fila["id_candidato"].'">
    <i class="fas fa-user-check" id="icon_can'.$fila["id_candidato"].'"></i>
  </button>';
  }
  if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_candidato"].'"
     title="Modificar" class="btn btn-xs btn-warning add-modal-candidato"><i class="far fa-edit"></i></button>';
     }
  
  if($_SESSION['eliminar']!=1){          
    $btn_eliminar="";
    }

  
  $html.='<tr class="item'.$fila["id_candidato"].'">
  <td class="itemrow_a'.$fila["id_candidato"].'">'.$c.'</td>
  <td class="itemrow_b'.$fila["id_candidato"].'">'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'</td>
  <td class="itemrow_c'.$fila["id_candidato"].'">'.$fila["nro_documento"].'</td>
  <td class="itemrow_d'.$fila["id_candidato"].'">'.$fila["correo"].'</td>
  <td class="itemrow_d'.$fila["id_candidato"].'">'.$fila["telefono"].'</td>
  <td class="itemrow_d'.$fila["id_candidato"].'">'.$fila["edad"].'</td> 
  <td '.$estado_style.' id="td_estado'.$fila["id_candidato"].'">'.$estado.'</td>
  <td class="itemrow_i'.$fila["id_candidato"].'">'.$fila["fecharegistro"].'</td>
  
  
  <td>'.$btn_editar.' '.$btn_eliminar.'
  <button data-id="'.$fila["id_candidato"].'"
     
       title="ver mas" class="btn btn-xs btn-primary show-modal-candidato"><i class="far fa-eye"></i>
  </button>

  </td>
  </tr>
  ';
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
      "autoWidth": true,
      "retrieve": true,
      "scrollY": "75vh",
      "scrollY": "75vh",
      "scrollCollapse": true,
    });
  });
  </script>';
echo ($html);
die();
?>
