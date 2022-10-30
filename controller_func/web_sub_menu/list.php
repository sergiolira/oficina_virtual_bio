
<?php
session_start();
include_once("../../model_class/web_sub_menu.php");
$obj_web_sm= new web_sub_menu();

/**cabecera */
$html='
<table id="tbl_web_sm" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Web sub menu</th>
                        <th>Web menu</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_web_sm->read();
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
  $btn_eliminar='<button data-id="'.$fila["id_web_sub_menu"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-web_sm" id="btn_web_sm'.$fila["id_web_sub_menu"].'">
  <i class="far fa-trash-alt" id="icon_web_sm'.$fila["id_web_sub_menu"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_web_sub_menu"].'"   
  title="Activar" class="btn btn-xs btn-success activar-web_sm" id="btn_web_sm'.$fila["id_web_sub_menu"].'">
  <i class="fas fa-user-check" id="icon_web_sm'.$fila["id_web_sub_menu"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_web_sub_menu"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_web_sm_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_web_sub_menu"].'</td>
            <td>'.$fila["web_sub_menu"].'</td>
            <td>'.$fila["web_menu"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_web_sub_menu"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_web_sub_menu"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_web_sm_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_web_sm").DataTable({
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
