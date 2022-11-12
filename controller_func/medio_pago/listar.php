<?php

include_once("../../model_class/medio_pago.php");
$obj_medio= new medio_pago();

/**cabecera */
$html='
<table id="tbl_medio" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Medio de pago</th>
                        <th>Estado</th>
                        <th>Fecha Registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
';

$rs_lista=$obj_medio->read();
$c=1;
$estado= "";
$estado_style="";
$button_del="";
while($fila=mysqli_fetch_assoc($rs_lista)){

if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $button_del='<button data-id="'.$fila["id_medio_pago"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-medio" id="btn_medio'.$fila["id_medio_pago"].'">
  <i class="far fa-trash-alt" id="icon_medio'.$fila["id_medio_pago"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $button_del="";
  $button_del='<button data-id="'.$fila["id_medio_pago"].'"   
  title="Activar" class="btn btn-xs btn-success activar-medio" id="btn_medio'.$fila["id_medio_pago"].'">
  <i class="fas fa-user-check" id="icon_medio'.$fila["id_medio_pago"].'"></i>
</button>';
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_medio_pago"].'</td>
            <td>'.$fila["medio_pago"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_medio_pago"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                    <button data-id="'.$fila["id_medio_pago"].'"
                    
                      title="Modificar" class="btn btn-xs btn-warning nuevo_medio_modal"><i class="far fa-edit"></i>
                    </button>
                 '.$button_del.'
                 <button data-id="'.$fila["id_medio_pago"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_medio_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_medio").DataTable({
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