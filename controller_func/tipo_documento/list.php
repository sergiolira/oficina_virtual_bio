<?php 
session_start();
include_once("../../model_class/tipo_documento.php");
include_once("../../model_class/permiso.php");
$obj_td= new tipo_documento(); 
$obj_p= new permiso();
$obj_p->id_rol=$_SESSION['id_rol'];
$obj_p->id_modulo= 1;
$obj_p->consult_crud_x_rol_modulo();

$ver = $obj_p->ver;
$crear = $obj_p->crear;
$actualizar = $obj_p->actualizar;
$eliminar = $obj_p->eliminar;
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
$rs_lista=$obj_td->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
 /**Estado=1 ACTIVO Estado=0 Inactivo*/ 
 if($fila["estado"]==1){

   $estado="Activo";$estado_style="class='text-success'";
   $btn_eliminar='<button data-id="'.$fila["id_tipo_documento"].'"     
   title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item'.$fila["id_tipo_documento"].'">
   <i class="far fa-trash-alt" id="icon_item'.$fila["id_tipo_documento"].'"></i></button>';

  }else{

    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_tipo_documento"].'"     
   title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item'.$fila["id_tipo_documento"].'">
   <i class="fas fa-user-check" id="icon_item'.$fila["id_tipo_documento"].'"></i></button>';

  }
  if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_tipo_documento"].'"
    title="Modificar" class="btn btn-xs btn-warning new-modal-tipo-documento"><i class="far fa-edit"></i></button>';
     }

  if($_SESSION['eliminar']!=1){          
    $btn_eliminar="";
    }
$html.='<tr>
            <td>'.$c.'</td>
            <td>'.$fila["id_tipo_documento"].'</td>
            <td>'.$fila["tipo_documento"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_tipo_documento"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>

            '.$btn_editar.' '.$btn_eliminar.'

            <button data-id="'.$fila["id_tipo_documento"].'"
            title="ver mas" class="btn btn-xs btn-primary new-modal-show-tipo-documento"><i class="far fa-eye"></i></button>
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