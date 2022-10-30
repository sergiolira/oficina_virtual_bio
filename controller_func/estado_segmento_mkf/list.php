<?php 
include_once("../../model_class/estado_segmento_mkf.php");
$obj_can= new estado_segmento_mkf();
/**cabecera */
$html='
<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Estado segmento mkf</th>
            <th>Estado</th>
            <th>Fecha Registro</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
';
$rs_lista=$obj_can->read();
$c=1;
while($fila=mysqli_fetch_assoc($rs_lista)){
 /**Estado=1 ACTIVO Estado=0 Inactivo*/ 
 if($fila["estado"]==1){

   $estado="Activo";$estado_style="class='text-success'";
   $button_del='<button data-id="'.$fila["id_estado_segmento_mkf"].'"     
   title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item'.$fila["id_estado_segmento_mkf"].'">
   <i class="far fa-trash-alt" id="icon_item'.$fila["id_estado_segmento_mkf"].'"></i></button>';

  }else{

    $estado="Inactivo";$estado_style="class='text-danger'";
    $button_del="";
    $button_del='<button data-id="'.$fila["id_estado_segmento_mkf"].'"     
   title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item'.$fila["id_estado_segmento_mkf"].'">
   <i class="fas fa-user-check" id="icon_item'.$fila["id_estado_segmento_mkf"].'"></i></button>';

  }
$html.='<tr>
            <td>'.$c.'</td>
            <td>'.$fila["id_estado_segmento_mkf"].'</td>
            <td>'.$fila["estado_segmento_mkf"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_estado_segmento_mkf"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td><button data-id="'.$fila["id_estado_segmento_mkf"].'"
            title="Modificar" class="btn btn-xs btn-warning new-modal-estado-segmento-mkf"><i class="far fa-edit"></i></button>

            '.$button_del.'

            <button data-id="'.$fila["id_estado_segmento_mkf"].'"
            title="ver mas" class="btn btn-xs btn-primary new-modal-show-estado-segmento-mkf"><i class="far fa-eye"></i></button>
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
