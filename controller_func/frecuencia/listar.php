<?php

include_once("../../model_class/frecuencia.php");
$obj_frecuencia= new frecuencia();

/**cabecera */
$html='
<table id="tbl_frecuencia" class="table table-bordered table-striped table-sm" style="font-size: 20px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Frecuencia</th>
                        <th>Estado</th>
                        <th>fecha Registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
';

$rs_lista=$obj_frecuencia->read();
$c=1;
$estado= "";
$estado_style="";
$button_del="";
while($fila=mysqli_fetch_assoc($rs_lista)){

if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $button_del='<button data-id="'.$fila["id_frecuencia"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-frecuencia" id="btn_frecuencia'.$fila["id_frecuencia"].'">
  <i class="far fa-trash-alt" id="icon_frecuencia'.$fila["id_frecuencia"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $button_del="";
  $button_del='<button data-id="'.$fila["id_frecuencia"].'"   
  title="Activar" class="btn btn-xs btn-success activar-frecuencia" id="btn_frecuencia'.$fila["id_frecuencia"].'">
  <i class="fas fa-user-check" id="icon_frecuencia'.$fila["id_frecuencia"].'"></i>
</button>';
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_frecuencia"].'</td>
            <td>'.$fila["frecuencia"].'</td>
            
            <td '.$estado_style.' id="td_estado'.$fila["id_frecuencia"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                    <button data-id="'.$fila["id_frecuencia"].'"
                    
                      title="Modificar" class="btn btn-xs btn-warning nuevo_frecuencia_modal"><i class="far fa-edit"></i>
                    </button>
                 '.$button_del.'
                 <button data-id="'.$fila["id_frecuencia"].'"
                    
                      title="Ver mas" class="btn btn-xs btn-primary show_frecuencia_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script> $(function () {
    
    $("#tbl_frecuencia").DataTable({
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