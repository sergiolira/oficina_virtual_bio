<?php 
session_start();
include_once("../../model_class/tipo_descuento.php");
$obj_d= new tipo_descuento();
/**cabecera */
?>
<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Fecha Registro</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
<?php
$rs_lista=$obj_d->read();
$c=1; $c=1;$btn_eliminar="";$btn_editar="";$btn_ver="";
while($fila=mysqli_fetch_assoc($rs_lista)){
 /**Estado=1 ACTIVO Estado=0 Inactivo*/ 
 if($fila["estado"]==1){
   $estado="Activo";$estado_style="class='text-success'";
   $btn_eliminar='<button data-id="'.$fila["id_tipo_descuento"].'"     
   title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item'.$fila["id_tipo_descuento"].'">
   <i class="far fa-trash-alt" id="icon_item'.$fila["id_tipo_descuento"].'"></i></button>';
  }else{
    $estado="Inactivo";$estado_style="class='text-danger'";
    $btn_eliminar='<button data-id="'.$fila["id_tipo_descuento"].'"     
   title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item'.$fila["id_tipo_descuento"].'">
   <i class="fas fa-user-check" id="icon_item'.$fila["id_tipo_descuento"].'"></i></button>';
  }
  if($_SESSION['actualizar']==1){
    $btn_editar='<button data-id="'.$fila["id_tipo_descuento"].'"
    title="Modificar" class="btn btn-xs btn-warning new-modal-tipo_descuento"><i class="far fa-edit"></i></button>';
     }

  if($_SESSION['eliminar']!=1){          
    $btn_eliminar="";
    }
?>
<tr>
            <td><?php echo $c ?></td>
            <td><?php echo $fila["id_tipo_descuento"] ?></td>
            <td><?php echo $fila["tipo_descuento"] ?></td>
            <td <?php echo $estado_style ?> id="td_estado<?php echo $fila["id_tipo_descuento"] ?>"><?php echo $estado ?></td>
            <td><?php echo $fila["fecharegistro"] ?></td>
            <td>
            <?php echo $btn_editar ?>
            <?php echo $btn_eliminar ?>

            <button data-id="<?php echo $fila["id_tipo_descuento"] ?>"
            title="ver mas" class="btn btn-xs btn-primary new-modal-show-tipo_descuento"><i class="far fa-eye"></i></button>
            </td>
        </tr>
        <?php $c++; ?>
        
<?php } ?>
</tbody> </table>
<script> 
  $(function () {
    $("#example1").DataTable({
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            }
            <?php if ($_SESSION['crear']==1) { ?>
              ,{                
                "text": "<i class='fas fa-plus-circle'></i> Nuevo Tipo de descuento",
                "titleAttr":"Nuevo Tipo Descuento",
                "className": "btn btn-info new-modal-tipo_descuento"
            }
            <?php }?>
        ],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
