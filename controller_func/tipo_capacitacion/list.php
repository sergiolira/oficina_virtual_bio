<?php
session_start();
include_once("../../model_class/tipo_capacitacion.php");
$obj_t_c= new tipo_capacitacion();

/**cabecera */
$html='
<table id="tbl_t_c" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Tipo capacitacion</th>
                        <th>Estado</th>
                        <th>fecha Registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_t_c->read();
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
  $btn_eliminar='<button data-id="'.$fila["id_tipo_capacitacion"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-t_c" id="btn_t_c'.$fila["id_tipo_capacitacion"].'">
  <i class="far fa-trash-alt" id="icon_t_c'.$fila["id_tipo_capacitacion"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_tipo_capacitacion"].'"   
  title="Activar" class="btn btn-xs btn-success activar-t_c" id="btn_t_c'.$fila["id_tipo_capacitacion"].'">
  <i class="fas fa-user-check" id="icon_t_c'.$fila["id_tipo_capacitacion"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_tipo_capacitacion"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_t_c_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_tipo_capacitacion"].'</td>
            <td>'.$fila["tipo_capacitacion"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_tipo_capacitacion"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 
                 <button data-id="'.$fila["id_tipo_capacitacion"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_t_c_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";

$html.='<script>
 $(function () {
    
    $("#tbl_t_c").DataTable({
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