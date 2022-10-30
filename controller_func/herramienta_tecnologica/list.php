
<?php
session_start();
include_once("../../model_class/herramienta_tecnologica.php");
$obj_h_tec= new herramienta_tecnologica();

/**cabecera */
$html='
<table id="tbl_h_tec" class="table table-bordered table-striped table-sm" style="font-size: 15px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Tipo de equipo</th>                                                
                        <th>Marca de equipo</th>                       
                        <th>Fecha de garantía</th>
                        <th>Precio de compra</th>
                        <th>Condición de equipo</th>
                        <th>Status asignación</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
';

$rs_lista=$obj_h_tec->read();
$c=1;
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";
$status_asignacion="";
while($fila=mysqli_fetch_assoc($rs_lista)){
  if($fila["status_asignacion"]==0){
    $status_asignacion='libre';
  }else{
    $status_asignacion='ocupado';
  }


if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_herramienta_tecnologica"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-h_tec" id="btn_h_tec'.$fila["id_herramienta_tecnologica"].'">
  <i class="far fa-trash-alt" id="icon_h_tec'.$fila["id_herramienta_tecnologica"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_herramienta_tecnologica"].'"   
  title="Activar" class="btn btn-xs btn-success activar-h_tec" id="btn_h_tec'.$fila["id_herramienta_tecnologica"].'">
  <i class="fas fa-user-check" id="icon_h_tec'.$fila["id_herramienta_tecnologica"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_herramienta_tecnologica"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_h_tec_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_herramienta_tecnologica"].'</td>
            <td>'.$fila["descripcion"].'</td>
            <td>'.$fila["tipo_equipo"].'</td>            
            <td>'.$fila["marca_equipo"].'</td>            
            <td>'.$fila["fecha_garantia"].'</td>
            <td>'.$fila["precio"].'</td>
            <td>'.$fila["condicion_equipo"].'</td>            
            <td>'.$status_asignacion.'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_herramienta_tecnologica"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_herramienta_tecnologica"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_h_tec_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_h_tec").DataTable({
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