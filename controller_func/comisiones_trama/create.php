<?php
require_once "../../model_class/trama_comisiones.php";
require_once "../../model_class/producto.php";
require_once "../../model_class/tipo_comision.php";
$obj_tr = new trama_com();
$obj_pro = new producto();
$obj_tp_com = new tipo_com();
$obj_tr->id_trama = $_REQUEST['id'];
$obj_tr->consult();
?>
<div class="row">
    <input type="hidden" name="id" id="id" value="<?php echo $obj_tr->id_trama; ?>">
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
                    <option <?php if ($obj_tr->id_producto == $fila["id_producto"]) {
                                echo "selected";
                            } ?> value="<?php echo $fila["id_producto"]; ?>"><?php echo $fila["nombre_producto"]; ?></option>
                <?php } ?>

            </select>
        </div>

    </div>
    <div class="col-4">
        <label for="txt_cant">Cantidad<i class="text-danger" title="Ingrese Cantidad">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_cantidad" name="txt_cantidad" value="<?php echo $obj_tr->cantidad; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="txt_tp_com">Tipo de comision<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>

            <select class="form-control select_pro" name="slt_tip" id="slt_tip">
                <option value="0">SELECCIONAR</option>
                <?php $res = $obj_tp_com->combo();
                while ($fila = mysqli_fetch_assoc($res)) {  ?>
                    <option <?php if ($obj_tr->tipo_comision == $fila["id_tipo_comision"]) {
                                echo "selected";
                            } ?> value="<?php echo $fila["id_tipo_comision"]; ?>"><?php echo $fila["tipocomision"]; ?></option>
                <?php } ?>

            </select>
        </div>


    </div>
    <div class="col-4">
        <label for="txt_comision">Comision<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumberD" placeholder="Enter" id="txt_comision" name="txt_comision" value="<?php echo $obj_tr->comision; ?>">
        </div>


    </div>
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidNumberDecimal();
    fntValidNumber();
</script>
