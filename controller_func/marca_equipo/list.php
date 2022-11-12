
<?php
session_start();
include_once("../../model_class/marca_equipo.php");
$obj_marca_e= new marca_equipo();

/**cabecera */
$html='
<table id="tbl_marca_e" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Marca de equipo</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_marca_e->read();
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
  $btn_eliminar='<button data-id="'.$fila["id_marca_equipo"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-marca_e" id="btn_marca_e'.$fila["id_marca_equipo"].'">
  <i class="far fa-trash-alt" id="icon_marca_e'.$fila["id_marca_equipo"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_marca_equipo"].'"   
  title="Activar" class="btn btn-xs btn-success activar-marca_e" id="btn_marca_e'.$fila["id_marca_equipo"].'">
  <i class="fas fa-user-check" id="icon_marca_e'.$fila["id_marca_equipo"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_marca_equipo"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_marca_e_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_marca_equipo"].'</td>
            <td>'.$fila["marca_equipo"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_marca_equipo"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_marca_equipo"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_marca_e_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_marca_e").DataTable({
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
