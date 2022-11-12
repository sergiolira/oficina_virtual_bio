<?php
session_start();
include_once("../../model_class/web_slider_carousel.php");
$obj_web_slider_carousel = new web_slider_carousel();

/**cabecera*/
$html='<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
<thead>
    <tr>  
        <th>N°</th>
        <th>Titulo H1</th>
        <th>Span</th>
        <th>Párrafo</th>
        <th>Descripcion Boton 1</th>
        <th>Descripcion Boton 2</th>
        <th>Enlace Boton 1</th>
        <th>Enalce Boton 2</th>
        <th>Imagen</th>
        <th>Estado</th>
        <th>fecha Registro</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody>';
$rs_lista=$obj_web_slider_carousel->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
    $estado="Activo";$estado_style="class='text-success'"; 
    $btn_eliminar='<button data-id="'.$fila["id_web_slider_carousel"].'"   
    title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_marca'.$fila["id_web_slider_carousel"].'">
    <i class="far fa-trash-alt" id="icon_marca'.$fila["id_web_slider_carousel"].'"></i></button>';
}else{ 
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_web_slider_carousel"].'"   
    title="Activar" class="btn btn-xs btn-success activar-item" id="btn_marca'.$fila["id_web_slider_carousel"].'">
    <i class="fas fa-user-check" id="icon_marca'.$fila["id_web_slider_carousel"].'"></i></button>';
}
if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_web_slider_carousel"].'"
    title="Modificar" class="btn btn-xs btn-warning nuevo_slider_carousel_modal"><i class="far fa-edit"></i></button>';
    }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["h1"].'</td>
            <td>'.$fila["span"].'</td>
            <td>'.$fila["parrafo"].'</td>
            <td>'.$fila["boton_1_desc"].'</td>
            <td>'.$fila["boton_2_desc"].'</td>
            <td>'.$fila["boton_1_enlace"].'</td>
            <td>'.$fila["boton_2_enlace"].'</td>
            <td style="text-align: center;"> <img style="height: 50px; width: 50px; object-fit: cover;" src='.$fila["imagen"].'></td>
            <td '.$estado_style.' id="td_estado'.$fila["id_web_slider_carousel"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>
                '.$btn_editar.' '.$btn_eliminar.'
                <button data-id="'.$fila["id_web_slider_carousel"].'"title="ver mas" class="btn btn-xs btn-primary show_slider_carousel_modal"><i class="far fa-eye"></i>
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