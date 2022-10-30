<?php
include_once("../../model_class/unidad_medida.php");
$obj_u= new unidad_medida();
$obj_u->id_unidad_medida=$_REQUEST["id"];
$obj_u->consult();

?>
<div class="row">

    <input type="hidden" name="id" value="<?php echo $obj_u->id_unidad_medida; ?>">
    <div class="col-6">
        <label for="txt_unidad">Unidad <i class="text-danger" title="Ingrese nombre categoria">*</i></label>
        <label class="text-danger msj_txt_unidad"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_unidad" name="txt_unidad" value="<?php echo $obj_u->unidad_medida; ?>"/>
        </div>
    </div>


</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>