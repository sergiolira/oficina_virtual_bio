<?php
session_start();
include_once "../../model_class/web_ubicacion.php";
require_once "../../model_class/pais.php";
include_once("../../model_class/ubigeo_peru_departments.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
include_once("../../model_class/ubigeo_peru_districts.php");

$obj_pais = new pais();
$obj_d = new ubigeo_peru_departments();
$obj_p = new ubigeo_peru_provinces();
$obj_ub_web = new web_ubicacion();
$obj_dis = new ubigeo_peru_districts();

$rs = $obj_ub_web->read();
$count = 0;
?>
<table id="table_cab_comisiones_list" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Pais</th>
            <th>Departamento</th>
            <th>Provincia</th>
            <th>Distrito</th>
            <th>Direccion</th>
            <th>Fecha de registro</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($rs)) {
            $count++;
            if ($fila["estado"] == 0) {
                $accion = '<button data-id="' . $fila["id_web_ubicacion"] . '" 
                title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item' . $fila["id_web_ubicacion"] . '">
                <i class="fas fa-user-check" id="icon_item' . $fila["id_web_ubicacion"] . '"></i></button>';
            } else {
                $accion = '<button data-id="' . $fila["id_web_ubicacion"] . '"     
                title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item' . $fila["id_web_ubicacion"] . '">
                <i class="far fa-trash-alt" id="icon_item' . $fila["id_web_ubicacion"] . '"></i></button>';
            }
            if ($_SESSION['actualizar'] == 1) {
                $btn_editar = '<button data-id="' . $fila["id_web_ubicacion"] . '"
                 title="Modificar" class="btn btn-xs btn-warning new_web_ubicacion"><i class="far fa-edit"></i></button>';
            }
            if ($_SESSION['eliminar'] != 1) {
                $accion = "";
            } ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $fila["id_web_ubicacion"] ?></td>
                <td>
                    <?php
                    $obj_pais->id_pais = $fila['id_pais'];
                    $obj_pais->consult();
                    echo $obj_pais->pais;
                    ?>
                </td>
                <td>
                    <?php
                    $obj_d->id = $fila['id_departamento'];
                    $obj_d->consult();
                    echo $obj_d->name;
                    ?>
                </td>
                <td><?php
                    $obj_p->id = $fila["id_provincia"];
                    $obj_p->consult();
                    echo $obj_p->name;
                    ?>
                </td>
                <td>
                    <?php
                    $obj_dis->id=$fila["id_distrito"];
                    $obj_dis->consult();
                    echo $obj_dis->name;
                    ?>
                </td>
                <td><?php echo $fila["direccion"] ?></td>
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
                    <button data-id="<?php echo $fila['id_web_ubicacion'] ?>" title="Modificar" class="btn btn-xs btn-primary new-modal-show-web_ubicacion"><i class="far fa-eye"></i></button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(function() {

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