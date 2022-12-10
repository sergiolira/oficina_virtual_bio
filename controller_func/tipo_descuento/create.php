<?php
include_once("../../model_class/tipo_descuento.php");
$obj_td= new tipo_descuento();
$obj_td->id_tipo_descuento=$_REQUEST["id"];
$obj_td->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_td->id_tipo_descuento; ?>">
    <div class="col-4">
        <label for="txt_tipo_descuento">Tipo descuento <i class="text-danger" title="Ingrese Tipo descuento">*</i></label>
        <label class="text-danger msj_txt_tipo_descuento"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid fntValidTextSpecial" id="txt_tipo_descuento" name="txt_tipo_descuento" value="<?php echo $obj_td->tipo_descuento; ?>"/>
        </div>
    </div>
      
</div>
<script src="js/valid.js"></script>
<script>

    fntValidTextSpecial();

</script>
