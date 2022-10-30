<?php 
session_start();
include_once("../../model_class/ubigeo_peru_districts.php");
$obj_u= new ubigeo_peru_districts();
/**cabecera */
$html='
<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Provincia</th>
            <th>Departamento</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
';
$rs_lista=$obj_u->read();
$c=1;$btn_editar="";
while($fila=mysqli_fetch_assoc($rs_lista)){
 /**Estado=1 ACTIVO Estado=0 Inactivo*/ 
 if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id"].'"
  title="Modificar" class="btn btn-xs btn-warning new-modal-ubigeo-peru-districts"><i class="far fa-edit"></i></button>';
   }
$html.='<tr>
            <td>'.$c.'</td>
            <td>'.$fila["id"].'</td>
            <td>'.$fila["name"].'</td>
            <td>'.$fila["province"].'</td>
            <td>'.$fila["departamento"].'</td>
            <td>
            '.$btn_editar.'
            <button data-id="'.$fila["id"].'"
            title="ver mas" class="btn btn-xs btn-primary new-modal-show-ubigeo-peru-districts"><i class="far fa-eye"></i></button>
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