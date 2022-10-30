
<?php
session_start();
include_once("../../model_class/web_footer_widget_desc.php");
$obj_wfwd= new web_footer_widget_desc();

/**cabecera */
$html='
<table id="tbl_wfwd" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Web footer widget desc</th>
                        <th>Web footer widget</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_wfwd->read();
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
  $btn_eliminar='<button data-id="'.$fila["id_web_footer_widget_desc"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-wfwd" id="btn_wfwd'.$fila["id_web_footer_widget_desc"].'">
  <i class="far fa-trash-alt" id="icon_wfwd'.$fila["id_web_footer_widget_desc"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_web_footer_widget_desc"].'"   
  title="Activar" class="btn btn-xs btn-success activar-wfwd" id="btn_wfwd'.$fila["id_web_footer_widget_desc"].'">
  <i class="fas fa-user-check" id="icon_wfwd'.$fila["id_web_footer_widget_desc"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_web_footer_widget_desc"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_wfwd_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_web_footer_widget_desc"].'</td>
            <td>'.$fila["web_footer_widget_desc"].'</td>
            <td>'.$fila["web_footer_widget"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_web_footer_widget_desc"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_web_footer_widget_desc"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_wfwd_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_wfwd").DataTable({
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
