<?php

include_once("../../model_class/condicion_equipo.php");
$obj_c_e= new condicion_equipo();

/**cabecera */
$html='
<table id="tbl_c_e" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Condicion de equipo</th>
                        <th>Estado</th>
                        <th>fecha Registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_c_e->read();
$c=1;
$estado= "";
$estado_style="";
$button_del="";
while($fila=mysqli_fetch_assoc($rs_lista)){

if($fila["estado"]==1){
  $estado="Activo";
  $estado_style="class='text-success'";
  $button_del='<button data-id="'.$fila["id_condicion_equipo"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-c_e" id="btn_c_e'.$fila["id_condicion_equipo"].'">
  <i class="far fa-trash-alt" id="icon_c_e'.$fila["id_condicion_equipo"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $button_del="";
  $button_del='<button data-id="'.$fila["id_condicion_equipo"].'"   
  title="Activar" class="btn btn-xs btn-success activar-c_e" id="btn_c_e'.$fila["id_condicion_equipo"].'">
  <i class="fas fa-user-check" id="icon_c_e'.$fila["id_condicion_equipo"].'"></i>
</button>';
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_condicion_equipo"].'</td>
            <td>'.$fila["condicion_equipo"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_condicion_equipo"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                    <button data-id="'.$fila["id_condicion_equipo"].'"
                    
                      title="Modificar" class="btn btn-xs btn-warning nuevo_c_e_modal"><i class="far fa-edit"></i>
                    </button>
                 '.$button_del.'
                 <button data-id="'.$fila["id_condicion_equipo"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_c_e_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_c_e").DataTable({
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
