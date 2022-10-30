
<?php
session_start();
include_once("../../model_class/entidad_bancaria.php");
$obj_e_ban= new entidad_bancaria();

/**cabecera */
$html='
<table id="tbl_e_ban" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Entidad bancaria</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_e_ban->read();
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
  $btn_eliminar='<button data-id="'.$fila["id_entidad_bancaria"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-e_ban" id="btn_e_ban'.$fila["id_entidad_bancaria"].'">
  <i class="far fa-trash-alt" id="icon_e_ban'.$fila["id_entidad_bancaria"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_entidad_bancaria"].'"   
  title="Activar" class="btn btn-xs btn-success activar-e_ban" id="btn_e_ban'.$fila["id_entidad_bancaria"].'">
  <i class="fas fa-user-check" id="icon_e_ban'.$fila["id_entidad_bancaria"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_entidad_bancaria"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_e_ban_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_entidad_bancaria"].'</td>
            <td>'.$fila["entidad_bancaria"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_entidad_bancaria"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_entidad_bancaria"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_e_ban_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_e_ban").DataTable({
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
