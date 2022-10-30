<?php
session_start();
include_once("../../model_class/web_home_offer.php");
$obj_web_home_offer= new web_home_offer();

/**cabecera*/
$html='<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
<thead>
    <tr>  
        <th>N°</th>
        <th>Titulo</th>
        <th>Parrafo</th>
        <th>Desc boton</th>
        <th>Imagen Producto</th>
        <th>Imagen Mujer</th>
        <th>Span producto</th>
        <th>Enlace</th>
        <th>Estado</th>
        <th>fecha Registro</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody>';
$rs_lista=$obj_web_home_offer->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
    $estado="Activo";$estado_style="class='text-success'";
    $btn_eliminar='<button data-id="'.$fila["id_web_home_offer"].'"   
    title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_marca'.$fila["id_web_home_offer"].'">
    <i class="far fa-trash-alt" id="icon_marca'.$fila["id_web_home_offer"].'"></i></button>';
}else{ 
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_web_home_offer"].'"   
    title="Activar" class="btn btn-xs btn-success activar-item" id="btn_marca'.$fila["id_web_home_offer"].'">
    <i class="fas fa-user-check" id="icon_marca'.$fila["id_web_home_offer"].'"></i></button>';
}
if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_web_home_offer"].'"
    title="Modificar" class="btn btn-xs btn-warning nuevo_web_offer"><i class="far fa-edit"></i></button>';
    }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["titulo_h2"].'</td>
            <td>'.$fila["parrafo"].'</td>
            <td>'.$fila["desc_boton"].'</td>
            <td style="text-align: center;"> <img style="height: 50px; width: 50px; object-fit: cover;" src='.$fila["imagen_producto"].'></td>
            <td style="text-align: center;"> <img style="height: 50px; width: 50px; object-fit: cover;" src='.$fila["imagen_mujer"].'></td>
            <td>'.$fila["span_producto"].'</td>
            <td>'.$fila["enlace"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_web_home_offer"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>
                '.$btn_editar.' '.$btn_eliminar.'
                <button data-id="'.$fila["id_web_home_offer"].'"title="ver mas" class="btn btn-xs btn-primary show_detalle_web_offer"><i class="far fa-eye"></i>
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