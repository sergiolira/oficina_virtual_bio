<?php 
    include_once "../../model_class/detalle_comisiones.php";
    include_once "../../model_class/cabecera_comisiones.php";
    include_once "../../model_class/producto.php";
    session_start();
    $obj=new det_comisiones();
    $obj_cab=new cab_comisiones();
    $obj_pro = new producto();
    $rs = $obj->read();
    $count = 0;
?>
<table id="table_cab_comisiones_list" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Representante</th>
            <th>Producto</th>
            <th>Comision</th>
            <th>Comision subtotal</th>
            <th>Estado</th>
            <th>Fecha de registro</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($rs)) {
            $count++; 
            if ($fila["estado"] == 0) {
                $accion = '<button data-id="'.$fila["id_detalle_comisiones_venta"].'" 
                title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item'.$fila["id_detalle_comisiones_venta"].'">
                <i class="fas fa-user-check" id="icon_item'.$fila["id_detalle_comisiones_venta"].'"></i></button>';
            } else {
                $accion = '<button data-id="'.$fila["id_detalle_comisiones_venta"].'"     
                title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item'.$fila["id_detalle_comisiones_venta"].'">
                <i class="far fa-trash-alt" id="icon_item'.$fila["id_detalle_comisiones_venta"].'"></i></button>';
            }
            if ($_SESSION['actualizar'] == 1) {
                $btn_editar = '<button data-id="' . $fila["id_detalle_comisiones_venta"] . '"
                 title="Modificar" class="btn btn-xs btn-warning new_detalle_comision"><i class="far fa-edit"></i></button>';
            }
            if ($_SESSION['eliminar'] != 1) {
                $accion = "";
            }?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $fila["id_detalle_comisiones_venta"] ?></td>
                <td><?php $obj_cab->id_cabecera=$fila["id_cabacera_comisiones_venta"] ;
                        $obj_cab->consult();
                        echo $obj_cab->representante;
                ?></td>
                <td><?php 
                $obj_pro->id_producto = $fila['id_producto'];
                $obj_pro->consult();
                echo $obj_pro->nombre_producto;
                ?></td>
                <td><?php echo $fila["comision"] ?></td>
                <td><?php echo $fila["comision_subtotal"] ?></td>
                <td style="color: <?php if ($fila["estado"] == 0) { 
                                        echo "red";
                                    } else {
                                        echo "green";
                                    } ?>;">
                    <?php if ($fila["estado"] == 0) {
                        echo "Inactivo";
                    } else {
                        echo "Activo";
                    } ?></td>
                <td><?php echo $fila["fecharegistro"] ?></td>
                
                <td>
                    

                    <?php
                    echo $btn_editar;
                     echo $accion; ?>

                    <button data-id="<?php echo $fila['id_detalle_comisiones_venta'] ?>" title="Modificar" class="btn btn-xs btn-primary new-modal-show-detalle"><i class="far fa-eye"></i></button>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
 $(function () {
    
    $("#table_cab_comisiones_list").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
       
  });
</script>