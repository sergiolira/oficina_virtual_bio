<?php
include_once("../../model_class/tipo_informacion.php");
$obj_i= new tipo_informacion();
$obj_i->id_tipo_informacion=$_REQUEST["id"];
$obj_i->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_i->id_tipo_informacion; ?>">
    <div class="col-4">
        <label for="txt_inf">Tipo de informacíon <i class="text-danger" title="Ingrese tipo de informacion">*</i></label>
        <label class="text-danger msj_txt_inf"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_inf" placeholder="Tipo de informacion" name="txt_inf" value="<?php echo $obj_i->tipo_informacion; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Observacíon </label>
        <label class="text-danger msj_txt_obs"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control " id="txt_obs" name="txt_obs" placeholder="Observacion" value="<?php echo $obj_i->observacion; ?>"/>
        </div>
    </div>
    
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>
