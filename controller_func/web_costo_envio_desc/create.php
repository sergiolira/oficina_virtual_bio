<?php
include_once("../../model_class/web_costo_envio_desc.php");
$obj_w= new web_costo_envio_desc();
$obj_w->id_web_costo_envio_desc=$_REQUEST["id"];
$obj_w->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_w->id_web_costo_envio_desc; ?>">
    <div class="col-4">
        <label for="txt_web_costo">web costo envio desc <i class="text-danger" title="Ingrese web costo envio desc">*</i></label>
        <label class="text-danger msj_txt_web_costo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_web_costo" name="txt_web_costo" value="<?php echo $obj_w->web_costo_envio_desc; ?>"/>
        </div>
    </div>
      
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();

</script>
