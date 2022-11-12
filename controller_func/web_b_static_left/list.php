<?php
session_start();
include_once("../../model_class/web_banner_static_left.php");
$obj_web_banner_static_left= new web_banner_static_left();

/**cabecera*/
$html='<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
<thead>
    <tr>  
        <th>N°</th>
        <th>Título</th>
        <th>Span</th>
        <th>Parrafo 1</th>
        <th>Parrafo 2</th>
        <th>Parrafo 3</th>
        <th>Título Descarga</th>
        <th>Descripción</th>
        <th>Archivo Descarga</th>
        <th>Img Hombre</th>
        <th>Img Producto</th>
        <th>Img Circulo</th>
        <th>Img Fondo</th>
        <th>Estado</th>
        <th>fecha Registro</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody>';
$rs_lista=$obj_web_banner_static_left->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
    $estado="Activo";$estado_style="class='text-success'";
    $btn_eliminar='<button data-id="'.$fila["id_web_banner_static_left"].'"   
    title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_marca'.$fila["id_web_banner_static_left"].'">
    <i class="far fa-trash-alt" id="icon_marca'.$fila["id_web_banner_static_left"].'"></i></button>';
}else{ 
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_web_banner_static_left"].'"   
    title="Activar" class="btn btn-xs btn-success activar-item" id="btn_marca'.$fila["id_web_banner_static_left"].'">
    <i class="fas fa-user-check" id="icon_marca'.$fila["id_web_banner_static_left"].'"></i></button>';
}
if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_web_banner_static_left"].'"
    title="Modificar" class="btn btn-xs btn-warning nuevo_web_testimonio_modal"><i class="far fa-edit"></i></button>';
    }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["titulo_h1"].'</td>
            <td>'.$fila["titulo_span"].'</td>
            <td>'.$fila["parrafo_uno"].'</td>
            <td>'.$fila["parrafo_dos"].'</td>
            <td>'.$fila["parrafo_tres"].'</td>
            <td>'.$fila["titulo_descarga"].'</td>
            <td>'.$fila["descripcion_boton_descarga"].'</td>
            <td style="text-align: center;"> <button data-id="'.$fila["id_web_banner_static_left"].'"title="Ver pdf" class="btn btn-success show_pdf_modal">Ver pdf</button></td>
            <td style="text-align: center;"> <img style="height: 50px; width: 50px; object-fit: cover;" src='.$fila["imagen_hombre"].'></td>
            <td style="text-align: center;"> <img style="height: 50px; width: 50px; object-fit: cover;" src='.$fila["imagen_producto"].'></td>
            <td style="text-align: center;"> <img style="height: 50px; width: 50px; object-fit: cover;" src='.$fila["imagen_circulo"].'></td>
            <td style="text-align: center;"> <img style="height: 50px; width: 50px; object-fit: cover;" src='.$fila["imagen_fondo"].'></td>
            <td '.$estado_style.' id="td_estado'.$fila["id_web_banner_static_left"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>
                '.$btn_editar.' '.$btn_eliminar.'
                <button data-id="'.$fila["id_web_banner_static_left"].'"title="ver mas" class="btn btn-xs btn-primary show_detalle_venta_modal"><i class="far fa-eye"></i>
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