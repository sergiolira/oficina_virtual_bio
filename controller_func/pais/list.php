
<?php
session_start();
include_once("../../model_class/pais.php");
$obj_pais= new pais();

/**cabecera */
$html='
<table id="tbl_pais" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
                  <thead>
                    <tr>  
                        <th>N°</th>
                        <th>ID</th>
                        <th>Marca de equipo</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
';

$rs_lista=$obj_pais->read();
$c=1;
$estado= "";
$estado_style="";
$btn_eliminar="";
$btn_editar="";
$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){

if($fila["estado"]==1){
  $estado="Activo";
  $estado_style="class='text-success'";
  $btn_eliminar='<button data-id="'.$fila["id_pais"].'"   
  title="Inactivar" class="btn btn-xs btn-danger desactivar-pais" id="btn_pais'.$fila["id_pais"].'">
  <i class="far fa-trash-alt" id="icon_pais'.$fila["id_pais"].'"></i></button>';
}
else{ 
  $estado="Inactivo";$estado_style="class='text-danger'";
  $btn_eliminar="";
  $btn_eliminar='<button data-id="'.$fila["id_pais"].'"   
  title="Activar" class="btn btn-xs btn-success activar-pais" id="btn_pais'.$fila["id_pais"].'">
  <i class="fas fa-user-check" id="icon_pais'.$fila["id_pais"].'"></i>
</button>';
}
if($_SESSION['actualizar']==1){
  $btn_editar='<button data-id="'.$fila["id_pais"].'"
   title="Modificar" class="btn btn-xs btn-warning nuevo_pais_modal"><i class="far fa-edit"></i></button>';
   }

if($_SESSION['eliminar']!=1){          
  $btn_eliminar="";
  }
$html.='<tr><td>'.$c.'</td>
            <td>'.$fila["id_pais"].'</td>
            <td>'.$fila["pais"].'</td>
            <td '.$estado_style.' id="td_estado'.$fila["id_pais"].'">'.$estado.'</td>
            <td>'.$fila["fecharegistro"].'</td>

            <td>'.$btn_editar.' '.$btn_eliminar.'
                 <button data-id="'.$fila["id_pais"].'"
                    
                      title="ver mas" class="btn btn-xs btn-primary show_pais_modal"><i class="far fa-eye"></i>
                 </button>
            </td> 

        </tr>';
        $c++;
}

$html.="</tbody> </table>";


$html.='<script>
 $(function () {
    
    $("#tbl_pais").DataTable({
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
