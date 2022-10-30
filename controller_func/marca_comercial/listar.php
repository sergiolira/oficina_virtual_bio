
<?php

include_once("../../model_class/marca_comercial.php");
$obj_marca= new marca_comercial();

/**cabecera */
$html='
<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Marca comercial</th>
                        <th>Estado</th>
                        <th>fecha Registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
';

$rs_lista=$obj_marca->read();
$c=1;
$estado= "";
$estado_style="";
$button_del="";
while($fila=mysqli_fetch_assoc($rs_lista)){

if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $button_del='<button data-id="'.$fila["id_marca_comercial"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-marca" id="btn_marca'.$fila["id_marca_comercial"].'">
  <i class="far fa-trash-alt" id="icon_marca'.$fila["id_marca_comercial"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $button_del="";
  $button_del='<button data-id="'.$fila["id_marca_comercial"].'"   
  title="Activar" class="btn btn-xs btn-success activar-marca" id="btn_marca'.$fila["id_marca_comercial"].'">
  <i class="fas fa-user-check" id="icon_marca'.$fila["id_marca_comercial"].'"></i>
</button>';
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_marca_comercial"].'</td>
            <td>'.$fila["marca_comercial"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_marca_comercial"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                    <button data-id="'.$fila["id_marca_comercial"].'"
                    
                      title="Modificar" class="btn btn-xs btn-warning nuevo_marca_modal"><i class="far fa-edit"></i>
                    </button>
                 '.$button_del.'
                 <button data-id="'.$fila["id_marca_comercial"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_marca_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_marca").DataTable({
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
