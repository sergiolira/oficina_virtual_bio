<?php
session_start();
include_once("../../model_class/web_red_social.php");
$obj_wrs= new web_red_social();

/**cabecera */
$html='
<table id="tbl_wrs" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
<thead>
<tr>  
    <th>N°</th>
    <th>ID</th>
    <th>Web_red_social</th>
    <th>Icono</th>
    
    <th>Estado</th>
    <th>Fecha de registro</th>
    <th>Opciones</th>
</tr>
</thead>
<tbody>
';

$rs_lista=$obj_wrs->read();
$c=1;
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
  
if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_web_red_social"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-wrs" id="btn_wrs'.$fila["id_web_red_social"].'">
  <i class="far fa-trash-alt" id="icon_wrs'.$fila["id_web_red_social"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_web_red_social"].'"   
  title="Activar" class="btn btn-xs btn-success activar-wrs" id="btn_wrs'.$fila["id_web_red_social"].'">
  <i class="fas fa-user-check" id="icon_wrs'.$fila["id_web_red_social"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_web_red_social"].'"             
  title="Modificar" class="btn btn-xs btn-warning nuevo_wrs_modal"><i class="far fa-edit"></i></button>';
  }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_web_red_social"].'</td>
            <td>'.$fila["web_red_social"].'</td>
            <td>'.$fila["icono"].'</td>
            
            
            <td '.$estado_style.' id="td_estado'.$fila["id_web_red_social"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                 '.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_web_red_social"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_wrs_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";
$html.='<script>
 $(function () {
    
    $("#tbl_wrs").DataTable({
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