<?php
session_start();
include_once("../../model_class/costo_envio.php");
$obj_costo_envio= new costo_envio();

/**cabecera*/
$html='<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
<thead>
    <tr>  
        <th>N°</th>
        <th>Pais</th>
        <th>Departamento</th>
        <th>Provincia</th>
        <th>Distrito</th>
        <th>Costo</th>
        <th>Estado</th>
        <th>fecha Registro</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody>';
$rs_lista=$obj_costo_envio->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
    $estado="Activo";$estado_style="class='text-success'";
    $btn_eliminar='<button data-id="'.$fila["id_costo_envio"].'"   
    title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_marca'.$fila["id_costo_envio"].'">
    <i class="far fa-trash-alt" id="icon_marca'.$fila["id_costo_envio"].'"></i></button>';
}else{ 
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_costo_envio"].'"   
    title="Activar" class="btn btn-xs btn-success activar-item" id="btn_marca'.$fila["id_costo_envio"].'">
    <i class="fas fa-user-check" id="icon_marca'.$fila["id_costo_envio"].'"></i></button>';
}
if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_costo_envio"].'"
    title="Modificar" class="btn btn-xs btn-warning nuevo_costo_envio_modal"><i class="far fa-edit"></i></button>';
    }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["pais"].'</td>
            <td>'.$fila["departamento"].'</td>
            <td>'.$fila["provincia"].'</td>
            <td>'.$fila["distrito"].'</td>
            <td>'.$fila["monto"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_costo_envio"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>
                '.$btn_editar.' '.$btn_eliminar.'
                <button data-id="'.$fila["id_costo_envio"].'"title="ver mas" class="btn btn-xs btn-primary show_costo_envio_modal"><i class="far fa-eye"></i>
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