<?php 
session_start();
include_once("../../model_class/divisa.php");
$obj_d= new divisa();
/**cabecera */
?>
<table id="example1" class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Expresion</th>
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
  $btn_eliminar='<button data-id="'.$fila["id_divisa"].'"     
  title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item'.$fila["id_divisa"].'">
  <i class="far fa-trash-alt" id="icon_item'.$fila["id_divisa"].'"></i></button>';
 }else{
   $estado="Inactivo";$estado_style="class='text-danger'";
   $btn_eliminar='<button data-id="'.$fila["id_divisa"].'"     
  title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item'.$fila["id_divisa"].'">
  <i class="fas fa-user-check" id="icon_item'.$fila["id_divisa"].'"></i></button>';
 }
 if($_SESSION['actualizar']==1){
   $btn_editar='<button data-id="'.$fila["id_divisa"].'"
   title="Modificar" class="btn btn-xs btn-warning new-modal-divisa"><i class="far fa-edit"></i></button>';
    }

 if($_SESSION['eliminar']!=1){          
   $btn_eliminar="";
   }
?>
<tr>
            <td><?php echo $c ?></td>
            <td><?php echo $fila["id_divisa"] ?></td>
            <td><?php echo $fila["divisa"] ?></td>
            <td><?php echo $fila["expresion"] ?></td>
            <td <?php echo $estado_style ?> id="td_estado<?php echo $fila["id_divisa"] ?>"><?php echo $estado ?></td>
            <td><?php echo $fila["fecharegistro"] ?></td>
            <td>
            <?php echo $btn_editar ?>
            <?php echo $btn_eliminar ?>

            <button data-id="<?php echo $fila["id_divisa"] ?>"
            title="ver mas" class="btn btn-xs btn-primary new-modal-show-divisa"><i class="far fa-eye"></i></button>
            </td>
        </tr>
        <?php $c++; ?>
        
<?php } ?>
</tbody> </table>
<script> 
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
