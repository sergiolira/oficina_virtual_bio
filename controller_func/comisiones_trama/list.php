<?php
require_once "../../model_class/trama_comisiones.php";
require_once "../../model_class/producto.php";
require_once "../../model_class/tipo_comision.php";
session_start();
$obj_tr = new trama_com();
$obj_pro = new producto();
$obj_tp_com = new tipo_com();

$rs = $obj_tr->read();
$count = 0;
?>
<table id="table_trama_comisiones" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Producto</th>
            <th>Tipo de Comision</th>
            <th>Cantidad</th>
            <th>Comision</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($rs)) {
            $count++;
            if ($fila["estado"] == 0) {
                $accion = '<button data-id="' . $fila["id_trama_comisiones_x_venta"] . '" 
                title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item' . $fila["id_trama_comisiones_x_venta"] . '">
                <i class="fas fa-user-check" id="icon_item' . $fila["id_trama_comisiones_x_venta"] . '"></i></button>';
            } else {
                $accion = '<button data-id="' . $fila["id_trama_comisiones_x_venta"] . '"     
                title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item' . $fila["id_trama_comisiones_x_venta"] . '">
                <i class="far fa-trash-alt" id="icon_item' . $fila["id_trama_comisiones_x_venta"] . '"></i></button>';
            }
            if ($_SESSION['actualizar'] == 1) {
                $btn_editar = '<button data-id="' . $fila["id_trama_comisiones_x_venta"] . '"
                 title="Modificar" class="btn btn-xs btn-warning new_trama_comision"><i class="far fa-edit"></i></button>';
            }
            if ($_SESSION['eliminar'] != 1) {
                $accion = "";
            }
        ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $fila["id_trama_comisiones_x_venta"] ?></td>
                <td><?php
                    $obj_pro->id_producto = $fila['id_producto'];
                    $obj_pro->consult();
                    echo $obj_pro->nombre_producto; ?>

                </td>
                <td>
                    <?php
                    $obj_tp_com->id_tipo_comision = $fila['tipo_comision'];
                    $obj_tp_com->consult();
                    echo $obj_tp_com->tipocomision;
                    ?>
                </td>
                <td><?php echo $fila["cantidad"] ?></td>
                <td><?php echo $fila["comision"] ?></td>
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
                <td>

                    <?php echo $btn_editar;
                    echo $accion; ?>
                    <button data-id="<?php echo $fila["id_trama_comisiones_x_venta"] ?>" title="Ver" class="btn btn-xs btn-primary new-modal-show-trama"><i class="far fa-eye"></i></button>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(function() {
        $("#table_trama_comisiones").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
        })
    })
</script>