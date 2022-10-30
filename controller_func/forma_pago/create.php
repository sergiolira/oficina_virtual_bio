<?php
include_once("../../model_class/forma_pago.php");
$obj_f= new forma_pago();
$obj_f->id_forma_pago=$_REQUEST["id"];
$obj_f->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_f->id_forma_pago; ?>">
    <div class="col-4">
        <label for="txt_style">forma de pago <i class="text-danger" title="Ingrese forma de pago">*</i></label>
        <label class="text-danger msj_txt_fp"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_fp" name="txt_fp" value="<?php echo $obj_f->forma_pago; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Observacion </label>
        <label class="text-danger msj_txt_obs"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control " id="txt_obs" name="txt_obs" value="<?php echo $obj_f->observacion; ?>"/>
        </div>
    </div>   
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>
