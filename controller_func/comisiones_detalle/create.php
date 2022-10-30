<?php
require_once "../../model_class/detalle_comisiones.php";
require_once "../../model_class/producto.php";
require_once "../../model_class/cabecera_comisiones.php";
$obj_pro = new producto();
$obj_det = new det_comisiones();
$obj_cab = new cab_comisiones();
$obj_det->id_detalle = $_REQUEST["id"];
$obj_det->consult();
?>
<div class="row">
    <input type="hidden" name="id" id="id" value="<?php echo $obj_det->id_detalle; ?>">
    <div class="col-4">
        <label for="">Representante<i class="text-danger" title="Ingrese el producto">*</i></label>
        <label class="text-danger msj_txt_pro"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <select class="form-control select_pro" name="slt_rep" id="slt_rep">
                <option value="0">SELECCIONAR</option>
                <?php $rep = $obj_cab->combo();
                while ($fila = mysqli_fetch_assoc($rep)) {  ?>
                    <option <?php if ($obj_det->id_cabecera == $fila["id_cabacera_comisiones_venta"]) {
                                echo "selected";
                            } ?> value="<?php echo $fila["id_cabacera_comisiones_venta"]; ?>"><?php echo $fila["representante"]; ?></option>
                <?php } ?>

            </select>
        </div>

    </div>
    <div class="col-4">
        <label for="">Producto<i class="text-danger" title="Ingrese el producto">*</i></label>
        <label class="text-danger msj_txt_pro"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <select class="form-control select_pro" name="slt_pro" id="slt_pro">
                <option value="0">SELECCIONAR</option>
                <?php $res = $obj_pro->combo();
                while ($fila = mysqli_fetch_assoc($res)) {  ?>
                    <option <?php if ($obj_det->id_producto == $fila["id_producto"]) {
                                echo "selected";
                            } ?> value="<?php echo $fila["id_producto"]; ?>"><?php echo $fila["nombre_producto"]; ?></option>
                <?php } ?>

            </select>
        </div>
    </div>
    <div class="col-4">
        <label for="">Cantidad<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_cantidad" name="txt_cantidad" value="<?php echo $obj_det->cantidad; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="">Comision<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumberD" placeholder="Enter" id="txt_comision" name="txt_comision" value="<?php echo $obj_det->comision; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="">Comision subtotal<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumberD" placeholder="Enter" id="txt_subtotal" name="txt_subtotal" value="<?php echo $obj_det->comision_subtotal; ?>">
        </div>


    </div>

</div>
<script src="js/valid.js"></script>
<script>
    $('.select_pro').select2({
        theme: 'bootstrap4'
    });
    fntValidText();
    fntValidTextSpecial();
    fntValidNumberDecimal();
    fntValidNumber();
</script>