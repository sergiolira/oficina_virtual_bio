<?php

include_once("../../model_class/estado_conexion.php");
$obj_conexion= new estado_conexion();

/**cabecera */
$html='
<table id="tbl_conexion" class="table table-bordered table-striped table-sm" style="font-size: 20px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Estado de conexion</th>
                        <th>Estado</th>
                        <th>fecha Registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
';

$rs_lista=$obj_conexion->read();
$c=1;
$estado= "";
$estado_style="";
$button_del="";
while($fila=mysqli_fetch_assoc($rs_lista)){

if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $button_del='<button data-id="'.$fila["id_estado_conexion"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-conexion" id="btn_conexion'.$fila["id_estado_conexion"].'">
  <i class="far fa-trash-alt" id="icon_conexion'.$fila["id_estado_conexion"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $button_del="";
  $button_del='<button data-id="'.$fila["id_estado_conexion"].'"   
  title="Activar" class="btn btn-xs btn-success activar-conexion" id="btn_conexion'.$fila["id_estado_conexion"].'">
  <i class="fas fa-user-check" id="icon_conexion'.$fila["id_estado_conexion"].'"></i>
</button>';
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_estado_conexion"].'</td>
            <td>'.$fila["estado_conexion"].'</td>
            
            <td '.$estado_style.' id="td_estado'.$fila["id_estado_conexion"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                    <button data-id="'.$fila["id_estado_conexion"].'"
                    
                      title="Modificar" class="btn btn-xs btn-warning nuevo_conexion_modal"><i class="far fa-edit"></i>
                    </button>
                 '.$button_del.'
                 <button data-id="'.$fila["id_estado_conexion"].'"
                    
                      title="Ver mas" class="btn btn-xs btn-primary show_conexion_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script> $(function () {
    
    $("#tbl_conexion").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "retrieve": true,
      "scrollY":  "75vh",
      "scrollCollapse": true
    });
       
  });
</script>'
;

echo $html;
die();
?>