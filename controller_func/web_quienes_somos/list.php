<?php 
require "../../model_class/web_quienes_somos.php";
session_start();
$obj_quienes_somos = new web_quienes_somos();
$rs=$obj_quienes_somos->read();
$count = 0;
?>
<table id="table_web_quienes_somos" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Titulo</th>
            <th>Subtitulo</th>
            <th>Fecha de registro</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($rs)) {
            $count++;
            if ($fila["estado"] == 0) {
                $accion = '<button data-id="' . $fila["id_web_quienes_somos"] . '" 
                title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item' . $fila["id_web_quienes_somos"] . '">
                <i class="fas fa-user-check" id="icon_item' . $fila["id_web_quienes_somos"] . '"></i></button>';
            } else {
                $accion = '<button data-id="' . $fila["id_web_quienes_somos"] . '"     
                title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item' . $fila["id_web_quienes_somos"] . '">
                <i class="far fa-trash-alt" id="icon_item' . $fila["id_web_quienes_somos"] . '"></i></button>';
            }
            if ($_SESSION['actualizar'] == 1) {
                $btn_editar = '<button data-id="' . $fila["id_web_quienes_somos"] . '"
                 title="Modificar" class="btn btn-xs btn-warning new_web_quienes_somos"><i class="far fa-edit"></i></button>';
            }
            if ($_SESSION['eliminar'] != 1) {
                $accion = "";
            } ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $fila["id_web_quienes_somos"] ?></td>
                <td><?php echo $fila['titulo'];?></td>
                <td><?php echo $fila['subtitulo'];?></td>
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
                    } ?>
                </td>
                <td>
                    <?php
                    echo $btn_editar;
                    echo $accion; ?>
                    <button data-id="<?php echo $fila['id_web_quienes_somos'] ?>" title="Modificar" class="btn btn-xs btn-primary new-modal-show-web_quienes_somos"><i class="far fa-eye"></i></button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(function() {

        $("#table_web_quienes_somos").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
        });

    });
</script>