
<?php
session_start();
include_once("../../model_class/web_menu.php");
$obj_web_menu= new web_menu();

/**cabecera */
$html='
<table id="tbl_web_menu" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Web del menu</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_web_menu->read();
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
  $btn_eliminar='<button data-id="'.$fila["id_web_menu"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-web_menu" id="btn_web_menu'.$fila["id_web_menu"].'">
  <i class="far fa-trash-alt" id="icon_web_menu'.$fila["id_web_menu"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_web_menu"].'"   
  title="Activar" class="btn btn-xs btn-success activar-web_menu" id="btn_web_menu'.$fila["id_web_menu"].'">
  <i class="fas fa-user-check" id="icon_web_menu'.$fila["id_web_menu"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_web_menu"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_web_menu_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_web_menu"].'</td>
            <td>'.$fila["web_menu"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_web_menu"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_web_menu"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_web_menu_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_web_menu").DataTable({
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
