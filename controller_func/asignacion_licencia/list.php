
<?php
session_start();
include_once("../../model_class/asignacion_licencia.php");
$obj_a_lic= new asignacion_licencia();

/**cabecera */
$html='
<table id="tbl_a_lic" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Herramienta tecnologica</th>
                        <th>Licencia</th>
                        <th>Condición de equipo</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
';

$rs_lista=$obj_a_lic->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_asignacion_licencia"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-a_lic" id="btn_a_lic'.$fila["id_asignacion_licencia"].'">
  <i class="far fa-trash-alt" id="icon_a_lic'.$fila["id_asignacion_licencia"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_asignacion_licencia"].'"   
  title="Activar" class="btn btn-xs btn-success activar-a_lic" id="btn_a_lic'.$fila["id_asignacion_licencia"].'">
  <i class="fas fa-user-check" id="icon_a_lic'.$fila["id_asignacion_licencia"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_asignacion_licencia"].'"
  title="Modificar" class="btn btn-xs btn-warning nuevo_a_lic_modal"><i class="far fa-edit"></i></button>';
  }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_asignacion_licencia"].'" data-id_lic="'.$fila["id_licencia"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_a_lic_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_asignacion_licencia"].'</td>         
            <td>'.$fila["descripcion"].'</td>
            <td>'.$fila["licencia"].'</td>
            <td>'.$fila["condicion_equipo"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_asignacion_licencia"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_asignacion_licencia"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_a_lic_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_a_lic").DataTable({
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