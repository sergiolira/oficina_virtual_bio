<?php
include_once("../../model_class/modalidad_pago.php");
$obj_m= new modalidad_pago();
$obj_m->id_modalidad_pago=$_REQUEST["id"];
$obj_m->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_m->id_modalidad_pago; ?>">
    <div class="col-4">
        <label for="txt_m">modalidad_pago <i class="text-danger" title="Ingrese la modalidad de pago">*</i></label>
        <label class="text-danger msj_txt_m"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_m" name="txt_m" value="<?php echo $obj_m->modalidad_pago; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Observacion </label>
        <label class="text-danger msj_txt_obs"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control valid " id="txt_obs" name="txt_obs" value="<?php echo $obj_m->observacion; ?>"/>
        </div>
    </div>   
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>

