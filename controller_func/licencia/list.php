<?php
session_start();
include_once("../../model_class/licencia.php");
$obj_lic= new licencia();

/**cabecera */
$html='
<table id="tbl_lic" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
<thead>
<tr>  
    <th>N°</th>
    <th>ID</th>
    <th>Licencia</th>
    <th>Tipo de licencia</th>
    <th>Codigo</th>
    <th>Stock</th>
    <th>Estado</th>
    <th>Fecha de registro</th>
    <th>Opciones</th>
</tr>
</thead>
<tbody>
';

$rs_lista=$obj_lic->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
  
if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_licencia"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-lic" id="btn_lic'.$fila["id_licencia"].'">
  <i class="far fa-trash-alt" id="icon_lic'.$fila["id_licencia"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_licencia"].'"   
  title="Activar" class="btn btn-xs btn-success activar-lic" id="btn_lic'.$fila["id_licencia"].'">
  <i class="fas fa-user-check" id="icon_lic'.$fila["id_licencia"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_licencia"].'"             
  title="Modificar" class="btn btn-xs btn-warning nuevo_lic_modal"><i class="far fa-edit"></i></button>';
  }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_licencia"].'</td>
            <td>'.$fila["licencia"].'</td>
            <td>'.$fila["tipo_licencia"].'</td>
            <td>'.$fila["codigo"].'</td>
            <td>'.$fila["stock"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_licencia"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                 '.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_licencia"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_lic_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";
$html.='<script>
 $(function () {
    
    $("#tbl_lic").DataTable({
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