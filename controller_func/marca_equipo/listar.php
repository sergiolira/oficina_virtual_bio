
<?php

include_once("../../model_class/marca_equipo.php");
$obj_marca_e= new marca_equipo();

/**cabecera */
$html='
<table id="tbl_marca_e" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Marca equipo</th>
                        <th>Estado</th>
                        <th>fecha Registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_marca_e->read();
$c=1;
$estado= "";
$estado_style="";
$button_del="";
while($fila=mysqli_fetch_assoc($rs_lista)){

if($fila["estado"]==1){
  $estado="Activo";
  $estado_style="class='text-success'";
  $button_del='<button data-id="'.$fila["id_marca_equipo"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-marca_e" id="btn_marca_e'.$fila["id_marca_equipo"].'">
  <i class="far fa-trash-alt" id="icon_marca_e'.$fila["id_marca_equipo"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $button_del="";
  $button_del='<button data-id="'.$fila["id_marca_equipo"].'"   
  title="Activar" class="btn btn-xs btn-success activar-marca_e" id="btn_marca_e'.$fila["id_marca_equipo"].'">
  <i class="fas fa-user-check" id="icon_marca_e'.$fila["id_marca_equipo"].'"></i>
</button>';
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_marca_equipo"].'</td>
            <td>'.$fila["marca_equipo"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_marca_equipo"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                    <button data-id="'.$fila["id_marca_equipo"].'"
                    
                      title="Modificar" class="btn btn-xs btn-warning nuevo_marca_e_modal"><i class="far fa-edit"></i>
                    </button>
                 '.$button_del.'
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
