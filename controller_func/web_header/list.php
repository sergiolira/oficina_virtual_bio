<?php
session_start();
include_once("../../model_class/web_header.php");
$obj_w_h= new web_header();

/**cabecera */
$html='
<table id="tbl_w_h" class="table table-bordered table-striped table-sm" style="font-size: 12px;">
<thead>
<tr>  
    <th>N°</th>
    <th>ID</th>
    <th>Marca comercial</th>
    <th>Logo</th>
    <th>Logo blanco</th>
    <th>Logo footer</th>
    <th>Celular 1</th>
    <th>Celular 2</th>
    <th>Razon social</th>
    <th>Ruc</th>
    <th>Estado</th>
    <th>Fecha de registro</th>
    <th>Opciones</th>
</tr>
</thead>
<tbody>
';

$rs_lista=$obj_w_h->read();
$c=1;
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
  
if($fila["estado"]==1){
  $estado="Activo";$estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_web_header"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-w_h" id="btn_w_h'.$fila["id_web_header"].'">
  <i class="far fa-trash-alt" id="icon_w_h'.$fila["id_web_header"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_web_header"].'"   
  title="Activar" class="btn btn-xs btn-success activar-w_h" id="btn_w_h'.$fila["id_web_header"].'">
  <i class="fas fa-user-check" id="icon_w_h'.$fila["id_web_header"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_web_header"].'"             
  title="Modificar" class="btn btn-xs btn-warning nuevo_w_h_modal"><i class="far fa-edit"></i></button>';
  }
if($_SESSION['eliminar']!=1){          
$btn_eliminar="";
}
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_web_header"].'</td>
            <td>'.$fila["marca_comercial"].'</td>
            <td>'.$fila["logo"].'</td>
            <td>'.$fila["logo_blanco"].'</td>
            <td>'.$fila["logo_footer"].'</td>
            <td>'.$fila["celular1"].'</td>
            <td>'.$fila["celular2"].'</td>
            <td>'.$fila["razon_social"].'</td>
            <td>'.$fila["ruc"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_web_header"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>
                 '.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_web_header"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_w_h_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";
$html.='<script>
 $(function () {
    
    $("#tbl_w_h").DataTable({
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