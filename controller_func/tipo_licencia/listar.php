<?php
session_start();
include_once("../../model_class/tipo_licencia.php");
$obj_tipo_lic= new tipo_licencia();

/**cabecera */
$html='
<table id="tbl_tipo_lic" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
<thead>
  <tr>  
      <th>N°</th>
      <th>ID</th>
      <th>Tipo licencia</th>
      <th>Estado</th>
      <th>fecha Registro</th>
      <th>Opciones</th>
  </tr>
</thead>
<tbody>
                  
';

$rs_lista=$obj_tipo_lic->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){

if($fila["estado"]==1){
  $estado="Activo";
  $estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_tipo_licencia"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-tipo_lic" id="btn_tipo_lic'.$fila["id_tipo_licencia"].'">
  <i class="far fa-trash-alt" id="icon_tipo_lic'.$fila["id_tipo_licencia"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_tipo_licencia"].'"   
  title="Activar" class="btn btn-xs btn-success activar-tipo_lic" id="btn_tipo_lic'.$fila["id_tipo_licencia"].'">
  <i class="fas fa-user-check" id="icon_tipo_lic'.$fila["id_tipo_licencia"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_tipo_licencia"].'"title="Modificar" class="btn btn-xs btn-warning 
  nuevo_tipo_lic_modal"><i class="far fa-edit"></i></button>';
  }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_tipo_licencia"].'</td>
            <td>'.$fila["tipo_licencia"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_tipo_licencia"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                    
                 '.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_tipo_licencia"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_tipo_lic_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_tipo_lic").DataTable({
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
