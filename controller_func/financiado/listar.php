<?php

include_once("../../model_class/financiado.php");
$obj_financiado= new financiado();

/**cabecera */
$html='
<table id="tbl_financiado" class="table table-bordered table-striped table-sm" style="font-size: 20px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Financiado</th>
                        <th>Estado</th>
                        <th>Fecha Registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
';

$rs_lista=$obj_financiado->read();
$c=1;
$estado= "";
$estado_style="";
$button_del="";
while($fila=mysqli_fetch_assoc($rs_lista)){

if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $button_del='<button data-id="'.$fila["id_financiado"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-financiado" id="btn_financiado'.$fila["id_financiado"].'">
  <i class="far fa-trash-alt" id="icon_financiado'.$fila["id_financiado"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $button_del="";
  $button_del='<button data-id="'.$fila["id_financiado"].'"   
  title="Activar" class="btn btn-xs btn-success activar-financiado" id="btn_financiado'.$fila["id_financiado"].'">
  <i class="fas fa-user-check" id="icon_financiado'.$fila["id_financiado"].'"></i>
</button>';
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_financiado"].'</td>
            <td>'.$fila["financiado"].'</td>
            
            <td '.$estado_style.' id="td_estado'.$fila["id_financiado"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                    <button data-id="'.$fila["id_financiado"].'"
                    
                      title="Modificar" class="btn btn-xs btn-warning nuevo_financiado_modal"><i class="far fa-edit"></i>
                    </button>
                 '.$button_del.'
                 <button data-id="'.$fila["id_financiado"].'"
                    
                      title="Ver mas" class="btn btn-xs btn-primary show_financiado_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script> $(function () {
    
    $("#tbl_financiado").DataTable({
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