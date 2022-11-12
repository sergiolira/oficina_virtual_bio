<?php
require_once "../../model_class/tipo_comision.php";
session_start();
$obj_tc = new tipo_com();
$rs = $obj_tc->read();
$count = 0;
?>
<table id="table_trama_comisiones" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Tipo de comision</th>
            <th>Fecha de registro</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($rs)) {
            $count++;
            if ($fila["estado"] == 0) {
                $accion = '<button data-id="' . $fila["id_tipo_comision"] . '" 
                title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item' . $fila["id_tipo_comision"] . '">
                <i class="fas fa-user-check" id="icon_item' . $fila["id_tipo_comision"] . '"></i></button>';
            } else {
                $accion = '<button data-id="' . $fila["id_tipo_comision"] . '"     
                title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item' . $fila["id_tipo_comision"] . '">
                <i class="far fa-trash-alt" id="icon_item' . $fila["id_tipo_comision"] . '"></i></button>';
            }
            if ($_SESSION['actualizar'] == 1) {
                $btn_editar = '<button data-id="' . $fila["id_tipo_comision"] . '"
                 title="Modificar" class="btn btn-xs btn-warning new_tipo_comision"><i class="far fa-edit"></i></button>';
            }
            if ($_SESSION['eliminar'] != 1) {
                $accion = "";
            }
        ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $fila["id_tipo_comision"] ?></td>
                <td><?php echo $fila["tipocomision"]; ?></td>
                <td><?php echo $fila["fecharegistro"] ?></td>
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
                
                    <?php 
                    echo $btn_editar;
                    echo $accion ?>
                    <button data-id="" title="Modificar" class="btn btn-xs btn-primary new-modal-show-usuario"><i class="far fa-eye"></i></button>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>