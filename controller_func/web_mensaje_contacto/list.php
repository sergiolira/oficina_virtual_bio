<?php 
require "../../model_class/web_mensaje_contacto.php";
session_start();
$obj_mensaje = new web_mensaje_contacto();
$rs=$obj_mensaje->read();
$count = 0;
?>
<table id="table_web_mensaje" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Nombre y Apellido</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Mensaje</th>
            <th>Fecha de registro</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($rs)) {
            $count++;
            if ($fila["estado"] == 0) {
                $accion = '<button data-id="' . $fila["id_web_mensaje_contacto"] . '" 
                title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item' . $fila["id_web_mensaje_contacto"] . '">
                <i class="fas fa-user-check" id="icon_item' . $fila["id_web_mensaje_contacto"] . '"></i></button>';
            } else {
                $accion = '<button data-id="' . $fila["id_web_mensaje_contacto"] . '"     
                title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item' . $fila["id_web_mensaje_contacto"] . '">
                <i class="far fa-trash-alt" id="icon_item' . $fila["id_web_mensaje_contacto"] . '"></i></button>';
            }
            if ($_SESSION['actualizar'] == 1) {
                $btn_editar = '<button data-id="' . $fila["id_web_mensaje_contacto"] . '"
                 title="Modificar" class="btn btn-xs btn-warning new_web_mensaje"><i class="far fa-edit"></i></button>';
            }
            if ($_SESSION['eliminar'] != 1) {
                $accion = "";
            } ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $fila["id_web_mensaje_contacto"] ?></td>
                <td><?php echo $fila['nombre_apellido'];?></td>
                <td><?php echo $fila['correo'];?></td>
                <td><?php echo $fila["celular"]; ?></td>
                <td><?php echo $fila["mensaje"]; ?></td>
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
                    <button data-id="<?php echo $fila['id_web_mensaje_contacto'] ?>" title="Modificar" class="btn btn-xs btn-primary new-modal-show-web_mensaje"><i class="far fa-eye"></i></button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(function() {

        $("#table_web_mensaje").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
        });

    });
</script>