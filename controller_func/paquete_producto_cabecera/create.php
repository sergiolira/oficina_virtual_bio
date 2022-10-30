<?php
include_once("../../model_class/paquete_producto_cabecera.php");
$obj_ppc= new paquete_producto_cabecera();
$obj_ppc->id_paquete_producto_cabecera=$_REQUEST["id"];
$obj_ppc->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_ppc->id_paquete_producto_cabecera; ?>">
    <div class="col-6">
        <label for="txt_paquete_producto">Nombre paquete <i class="text-danger" title="Ingrese Nombre paquete">*</i></label>
        <label class="text-danger msj_txt_paquete_producto"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_paquete_producto" name="txt_paquete_producto" value="<?php echo $obj_ppc->nombre_paquete; ?>"/>
        </div>
    </div>
    <div class="col-6">
        <label for="txt_precio_venta">Precio de venta <i class="text-danger" title="Ingrese Precio de venta">*</i></label>
        <label class="text-danger msj_txt_precio_venta"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validNumberD" id="txt_precio_venta" name="txt_precio_venta" value="<?php echo $obj_ppc->precio_venta; ?>"/>
        </div>
    </div>
    <div class="col-6">
        <label for="txt_cantidad_producto">Cantidad producto <i class="text-danger" title="Ingrese Cantidad producto">*</i></label>
        <label class="text-danger msj_txt_cantidad_producto"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" id="txt_cantidad_producto" name="txt_cantidad_producto" value="<?php echo $obj_ppc->cantidad_productos; ?>"/>
        </div>
    </div>
    <div class="col-6">
        <label for="txt_observacion">Observación <i class="text-danger" title="Ingrese Observacion">*</i></label>
        <label class="text-danger msj_txt_observacion"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid" id="txt_observacion" name="txt_observacion" value="<?php echo $obj_ppc->observacion; ?>"/>
        </div>
    </div>  
</div>
<div class="row">
    <div class="col-12">
        <label for="txt_cat">Descripción</label>
        <div class="input-group">
            <textarea id="txt_desc" cols="95" rows="7" name="txt_descripcion">  
                <?php echo $obj_ppc->descripcion; ?>
            </textarea>
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

