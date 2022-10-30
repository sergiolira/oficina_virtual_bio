<?php 
session_start();
include_once("../../model_class/estado_civil.php");
$obj_e= new estado_civil();
/**cabecera */
$html='
<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Fecha Registro</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
';
$rs_lista=$obj_e->read();
$c=1; $c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
 /**Estado=1 ACTIVO Estado=0 Inactivo*/ 
 if($fila["estado"]==1){
   $estado="Activo";$estado_style="class='text-success'";
   $btn_eliminar='<button data-id="'.$fila["id_estado_civil"].'"     
   title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item'.$fila["id_estado_civil"].'">
   <i class="far fa-trash-alt" id="icon_item'.$fila["id_estado_civil"].'"></i></button>';
  }else{
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_estado_civil"].'"     
   title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item'.$fila["id_estado_civil"].'">
   <i class="fas fa-user-check" id="icon_item'.$fila["id_estado_civil"].'"></i></button>';
  }
  if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_estado_civil"].'"
    title="Modificar" class="btn btn-xs btn-warning new-modal-estado-civil"><i class="far fa-edit"></i></button>';
     }

  if($_SESSION['eliminar']!=1){          
    $btn_eliminar="";
    }
$html.='<tr>
            <td>'.$c.'</td>
            <td>'.$fila["id_estado_civil"].'</td>
            <td>'.$fila["estado_civil"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_estado_civil"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>
            '.$btn_editar.' '.$btn_eliminar.'

            <button data-id="'.$fila["id_estado_civil"].'"
            title="ver mas" class="btn btn-xs btn-primary new-modal-show-estado-civil"><i class="far fa-eye"></i></button>
            </td>
        </tr>';
        $c++;
}
$html.="</tbody> </table>";
$html.='<script> 
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });
</script>'
;
echo $html;
die();
?>