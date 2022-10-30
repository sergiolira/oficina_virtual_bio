<?php
session_start();
include_once("../../model_class/tipo_equipo.php");
$obj_tipo_e= new tipo_equipo();

/**cabecera */
$html='
<table id="tbl_tipo_e" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Tipo de equipo</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_tipo_e->read();
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
  $btn_eliminar='<button data-id="'.$fila["id_tipo_equipo"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-tipo_e" id="btn_tipo_e'.$fila["id_tipo_equipo"].'">
  <i class="far fa-trash-alt" id="icon_tipo_e'.$fila["id_tipo_equipo"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_tipo_equipo"].'"   
  title="Activar" class="btn btn-xs btn-success activar-tipo_e" id="btn_tipo_e'.$fila["id_tipo_equipo"].'">
  <i class="fas fa-user-check" id="icon_tipo_e'.$fila["id_tipo_equipo"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_tipo_equipo"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_tipo_e_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_tipo_equipo"].'</td>
            <td>'.$fila["tipo_equipo"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_tipo_equipo"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 
                 <button data-id="'.$fila["id_tipo_equipo"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_tipo_e_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";

$html.='<script>
 $(function () {
    
    $("#tbl_tipo_e").DataTable({
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