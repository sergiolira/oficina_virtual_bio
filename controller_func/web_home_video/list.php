<?php
session_start();
include_once("../../model_class/web_home_video.php");
$obj_web_home_video= new web_home_video();

/**cabecera*/
$html='<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
<thead>
    <tr>  
        <th>N°</th>
        <th>Titulo</th>
        <th>Parrafo</th>
        <th>Imagen Poster</th>
        <th>Imagen Fondo</th>
        <th>Video</th>
        <th>Estado</th>
        <th>fecha Registro</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody>';
$rs_lista=$obj_web_home_video->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
    $estado="Activo";$estado_style="class='text-success'";
    $btn_eliminar='<button data-id="'.$fila["id_web_home_video"].'"   
    title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_marca'.$fila["id_web_home_video"].'">
    <i class="far fa-trash-alt" id="icon_marca'.$fila["id_web_home_video"].'"></i></button>';
}else{ 
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_web_home_video"].'"   
    title="Activar" class="btn btn-xs btn-success activar-item" id="btn_marca'.$fila["id_web_home_video"].'">
    <i class="fas fa-user-check" id="icon_marca'.$fila["id_web_home_video"].'"></i></button>';
}
if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_web_home_video"].'"
    title="Modificar" class="btn btn-xs btn-warning nuevo_detalle_home_video"><i class="far fa-edit"></i></button>';
    }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["titulo_h2"].'</td>
            <td>'.$fila["parrafo"].'</td>
            <td style="text-align: center;"> <img style="height: 50px;width: 50px; object-fit: cover;" src='.$fila["imagen_you_poster"].'></td>
            <td style="text-align: center;"> <img style="height: 50px;width: 50px; object-fit: cover;" src='.$fila["imagen_fondo"].'></td>
            <td style="text-align: center;">   <video class="kv-preview-data file-preview-video" controls="" style="width: 200px; height: 100px;"> <source src='.$fila["enlace_video"].' type="video/mp4"> </video> </video> </td> 
            <td '.$estado_style.' id="td_estado'.$fila["id_web_home_video"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>
                '.$btn_editar.' '.$btn_eliminar.'
                <button data-id="'.$fila["id_web_home_video"].'"title="ver mas" class="btn btn-xs btn-primary show_detalle_venta_modal"><i class="far fa-eye"></i>
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