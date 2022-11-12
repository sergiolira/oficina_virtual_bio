<?php
session_start();
include_once("../../model_class/web_testimonio.php");
$obj_web_testimonio= new web_testimonio();

/**cabecera*/
$html='<table id="tbl_marca" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
<thead>
    <tr>  
        <th>N°</th>
        <th>Testimonio</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Cargo</th>
        <th>Foto de perfil</th>
        <th>Imagen You Poster</th>
        <th>Video</th>
        <th>Estado</th>
        <th>fecha Registro</th>
        <th>Opciones</th>
    </tr>
</thead>
<tbody>';
$rs_lista=$obj_web_testimonio->read();
$c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
$estado= "";
$estado_style="";
while($fila=mysqli_fetch_assoc($rs_lista)){
if($fila["estado"]==1){
    $estado="Activo";$estado_style="class='text-success'";
    $btn_eliminar='<button data-id="'.$fila["id_web_testimonio"].'"   
    title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_marca'.$fila["id_web_testimonio"].'">
    <i class="far fa-trash-alt" id="icon_marca'.$fila["id_web_testimonio"].'"></i></button>';
}else{ 
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar="";
    $btn_eliminar='<button data-id="'.$fila["id_web_testimonio"].'"   
    title="Activar" class="btn btn-xs btn-success activar-item" id="btn_marca'.$fila["id_web_testimonio"].'">
    <i class="fas fa-user-check" id="icon_marca'.$fila["id_web_testimonio"].'"></i></button>';
}
if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_web_testimonio"].'"
    title="Modificar" class="btn btn-xs btn-warning nuevo_web_testimonio_modal"><i class="far fa-edit"></i></button>';
    }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["testimonio"].'</td>
            <td>'.$fila["nombre"].'</td>
            <td>'.$fila["apellido_paterno"].'</td>
            <td>'.$fila["apellido_materno"].'</td>
            <td>'.$fila["cargo"].'</td>
            <td style="text-align: center;"> <img style="height: 100px; width: 100px; object-fit: cover;" src='.$fila["foto_perfil"].'></td>
            <td style="text-align: center;"> <img style="height: 100px; width: 100px; object-fit: cover;" src='.$fila["imagen_you_poster"].'></td>
            <td style="text-align: center;">   <video class="kv-preview-data file-preview-video" controls="" style="width: 200px; height: 100px;"> <source src='.$fila["video"].' type="video/mp4"> </video> </video> </td> 
            <td '.$estado_style.' id="td_estado'.$fila["id_web_testimonio"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>
            <td>
                '.$btn_editar.' '.$btn_eliminar.'
                <button data-id="'.$fila["id_web_testimonio"].'"title="ver mas" class="btn btn-xs btn-primary show_detalle_venta_modal"><i class="far fa-eye"></i>
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