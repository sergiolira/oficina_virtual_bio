<?php
session_start();
include_once("../../model_class/web_footer_four_bottom_right.php");
$obj_wffbr= new web_footer_four_bottom_right();

/**cabecera */
$html='
<table id="tbl_wffbr" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
<thead>
<tr>  
    <th>N°</th>
    <th>ID</th>
    <th>web_footer_four_bottom_right</th>
    <th>Imagen</th>
    
    <th>Estado</th>
    <th>Fecha de registro</th>
    <th>Opciones</th>
</tr>
</thead>
<tbody>
';

$rs_lista=$obj_wffbr->read();
$c=1;
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
  
if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_web_footer_four_bottom_right"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-wffbr" id="btn_wffbr'.$fila["id_web_footer_four_bottom_right"].'">
  <i class="far fa-trash-alt" id="icon_wffbr'.$fila["id_web_footer_four_bottom_right"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_web_footer_four_bottom_right"].'"   
  title="Activar" class="btn btn-xs btn-success activar-wffbr" id="btn_wffbr'.$fila["id_web_footer_four_bottom_right"].'">
  <i class="fas fa-user-check" id="icon_wffbr'.$fila["id_web_footer_four_bottom_right"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_web_footer_four_bottom_right"].'"             
  title="Modificar" class="btn btn-xs btn-warning nuevo_wffbr_modal"><i class="far fa-edit"></i></button>';
  }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_web_footer_four_bottom_right"].'</td>
            <td>'.$fila["web_footer_four_bottom_right"].'</td>
            <td>'.$fila["imagen"].'</td>
            
            
            <td '.$estado_style.' id="td_estado'.$fila["id_web_footer_four_bottom_right"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                 '.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_web_footer_four_bottom_right"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_wffbr_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";
$html.='<script>
 $(function () {
    
    $("#tbl_wffbr").DataTable({
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