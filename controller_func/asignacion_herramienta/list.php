
<?php
session_start();
include_once("../../model_class/asignacion_herramienta.php");
$obj_a_h= new asignacion_herramienta();

/**cabecera */
$html='
<table id="tbl_a_h" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
                  <thead>
                    <tr>   
                        <th>N°</th>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Herramienta tecnologica</th>
                        <th>Condición de equipo</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
';

$rs_lista=$obj_a_h->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){
  
if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_asignacion_herramienta"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-a_h" id="btn_a_h'.$fila["id_asignacion_herramienta"].'">
  <i class="far fa-trash-alt" id="icon_a_h'.$fila["id_asignacion_herramienta"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_asignacion_herramienta"].'"   
  title="Activar" class="btn btn-xs btn-success activar-a_h" id="btn_a_h'.$fila["id_asignacion_herramienta"].'">
  <i class="fas fa-user-check" id="icon_a_h'.$fila["id_asignacion_herramienta"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_asignacion_herramienta"].'" data-id_h_tec="'.$fila["id_herramienta_tecnologica"].'" 
  title="Modificar" class="btn btn-xs btn-warning nuevo_a_h_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_asignacion_herramienta"].'"                   
  title="Modificar" class="btn btn-xs btn-warning nuevo_a_h_modal"><i class="far fa-edit"></i></button>';
  }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_asignacion_herramienta"].'</td>         
            <td>'.$fila["num_documento"].'</td>
            <td>'.$fila["tipo_equipo"].' '.$fila["descripcion"].'</td>            
            <td>'.$fila["condicion_equipo"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_asignacion_herramienta"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>                    
                 '.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_asignacion_herramienta"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_a_h_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_a_h").DataTable({
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