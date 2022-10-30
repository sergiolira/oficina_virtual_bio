<?php
include_once("../../model_class/tipo_producto.php");
$obj_tp= new tipo_producto();
$obj_tp->id_tipo_producto=$_REQUEST["id"];
$obj_tp->consult();

?>
<div class="row">

    <input type="hidden" name="id" value="<?php echo $obj_tp->id_tipo_producto; ?>">
    <div class="col-6">
        <label for="txt_tipo">Tipo producto <i class="text-danger" title="Ingrese nombre tipo producto">*</i></label>
        <label class="text-danger msj_txt_tipo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_tipo" name="txt_tipo" value="<?php echo $obj_tp->tipo_producto; ?>"/>
        </div>
    </div>
  

</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>