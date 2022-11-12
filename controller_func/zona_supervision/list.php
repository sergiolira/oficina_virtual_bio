
<?php
session_start();
include_once("../../model_class/zona_supervision.php");
$obj_z_sup= new zona_supervision();

/**cabecera */
$html='
<table id="tbl_z_sup" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Zona de supervision</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_z_sup->read();
$c=1;
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";

while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
  $estado="Activo";
  $estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_zona_supervision"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-z_sup" id="btn_z_sup'.$fila["id_zona_supervision"].'">
  <i class="far fa-trash-alt" id="icon_z_sup'.$fila["id_zona_supervision"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_zona_supervision"].'"   
  title="Activar" class="btn btn-xs btn-success activar-z_sup" id="btn_z_sup'.$fila["id_zona_supervision"].'">
  <i class="fas fa-user-check" id="icon_z_sup'.$fila["id_zona_supervision"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_zona_supervision"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_z_sup_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_zona_supervision"].'</td>
            <td>'.$fila["zona_supervision"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_zona_supervision"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_zona_supervision"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_z_sup_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_z_sup").DataTable({
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
