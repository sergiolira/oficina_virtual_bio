<?php 
session_start();
include_once("../../model_class/sub_modulo.php");
$obj_sm= new sub_modulo();
/**cabecera */
$html='
<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Sub modulo</th>
            <th>Modulo</th>
            <th>Nivel</th>
            <th>Estado</th>
            <th>Fecha Registro</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
';
$rs_lista=$obj_sm->read();
$c=1;$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
 /**Estado=1 ACTIVO Estado=0 Inactivo*/ 
 if($fila["estado"]==1){

   $estado="Activo";$estado_style="class='text-success'";
   $btn_eliminar='<button data-id="'.$fila["id_sub_modulo"].'"     
   title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item'.$fila["id_sub_modulo"].'">
   <i class="far fa-trash-alt" id="icon_item'.$fila["id_sub_modulo"].'"></i></button>';
  }else{
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_sub_modulo"].'"     
   title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item'.$fila["id_sub_modulo"].'">
   <i class="fas fa-user-check" id="icon_item'.$fila["id_sub_modulo"].'"></i></button>';
  }
  if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_sub_modulo"].'"
    title="Modificar" class="btn btn-xs btn-warning new-modal-sub-modulos"><i class="far fa-edit"></i></button>';
     }

  if($_SESSION['eliminar']!=1){          
    $btn_eliminar="";
    }
$html.='<tr>
            <td>'.$c.'</td>
            <td>'.$fila["id_sub_modulo"].'</td>
            <td>'.$fila["sub_modulo"].'</td>
            <td>'.$fila["modulo"].'</td>
            <td>'.$fila["nivel"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_sub_modulo"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>

            '.$btn_editar.' '.$btn_eliminar.'

            <button data-id="'.$fila["id_sub_modulo"].'"
            title="ver mas" class="btn btn-xs btn-primary new-modal-show-sub-modulos"><i class="far fa-eye"></i></button>
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