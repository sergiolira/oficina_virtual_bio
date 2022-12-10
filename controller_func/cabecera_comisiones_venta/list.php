<?php
include_once '../../model_class/cabecera_comisiones_venta.php';
session_start();
$objct = new cabecera_comisiones_venta();
$rs = $objct->read();
$count = 0;
$estado = '';
$estado_style = '';
$btn_eliminar = '';
$btn_editar = '';
$btn_ver = '';
?>
<table id="table_det_comisiones_list" class="table table-bordered table-striped table-sm" style="font-size: 9px;">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Representante</th>
            <th>Correo</th>
            <th>N° Documento</th>
            <th>Comision</th>
            <th>Año</th>
            <th>Mes</th>
            <th>Semana</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($rs)) {

            $count++;
            if ($fila['estado'] == 1) {
                $estado = 'Activo';
                $estado_style = "class='text-success'";
                $btn_eliminar =
                    '<button data-id="' .
                    $fila['id_cabacera_comisiones_venta'] .
                    '"   
                title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_c_c' .
                    $fila['id_cabacera_comisiones_venta'] .
                    '">
                <i class="far fa-trash-alt" id="icon_c_c' .
                    $fila['id_cabacera_comisiones_venta'] .
                    '"></i></button>';
            } else {
                $estado = 'Inactivo';
                $estado_style = "class='text-danger'";
                $btn_eliminar = '';
                $btn_eliminar =
                    '<button data-id="' .
                    $fila['id_cabacera_comisiones_venta'] .
                    '"   
                title="Activar" class="btn btn-xs btn-success activar-item" id="btn_c_c' .
                    $fila['id_cabacera_comisiones_venta'] .
                    '">
                <i class="fas fa-user-check" id="icon_c_c' .
                    $fila['id_cabacera_comisiones_venta'] .
                    '"></i>
              </button>';
            }
            if ($_SESSION['actualizar'] == 1) {
                $btn_editar =
                    '<button data-id="' .
                    $fila['id_cabacera_comisiones_venta'] .
                    '"
                 title="Modificar" class="btn btn-xs btn-warning new_cabecera_comision"><i class="far fa-edit"></i></button>';
            }
            if ($_SESSION['eliminar'] != 1) {
                $btn_eliminar = '';
            }

            /*if ($fila["estado"] == 0) {
                $accion = '<button data-id="'.$fila["id_cabacera_comisiones_venta"].'" 
                title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item'.$fila["id_cabacera_comisiones_venta"].'">
                <i class="fas fa-user-check" id="icon_item'.$fila["id_cabacera_comisiones_venta"].'"></i></button>';
            } else {
                $accion = '<button data-id="'.$fila["id_cabacera_comisiones_venta"].'"     
                title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item'.$fila["id_cabacera_comisiones_venta"].'">
                <i class="far fa-trash-alt" id="icon_item'.$fila["id_cabacera_comisiones_venta"].'"></i></button>
';
            }*/
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $fila['id_cabacera_comisiones_venta']; ?></td>
                <td><?php echo $fila['representante']; ?></td>
                <td><?php echo $fila['correo']; ?></td>
                <td><?php echo $fila['nro_documento']; ?></td>
                <td><?php echo $fila['comision_total']; ?></td>
                <td><?php echo $fila['anio']; ?></td>
                <td><?php echo $fila['mes']; ?></td>
                <td><?php echo $fila['semana_detalle']; ?></td>
                <td style="color: <?php if ($fila['estado'] == 0) {
                    echo 'red';
                } else {
                    echo 'green';
                } ?>;">
                    <?php if ($fila['estado'] == 0) {
                        echo 'Inactivo';
                    } else {
                        echo 'Activo';
                    } ?></td>
                <td>
                   
                    <button data-id="<?php echo $fila[
                        'id_cabacera_comisiones_venta'
                    ]; ?>" title="Ver" class="btn btn-xs btn-primary new-modal-show-cabecera"><i class="far fa-eye"></i></button>

                </td>
            </tr>
        <?php
        } ?>
    </tbody>
</table>
<script>
 $(function () {
    
    $("#table_det_comisiones_list").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
       
  });
</script>