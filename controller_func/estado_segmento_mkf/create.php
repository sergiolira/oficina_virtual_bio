
<?php
include_once("../../model_class/estado_segmento_mkf.php");
$obj_mkf= new estado_segmento_mkf();
$obj_mkf->id_estado_segmento_mkf=$_REQUEST["id"];
$obj_mkf->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_mkf->id_estado_segmento_mkf; ?>">
    <div class="col-4">
        <label for="txt_mkf">Estado segmento mkf <i class="text-danger" title="Ingrese estado de segmento mkf">*</i></label>
        <label class="text-danger msj_txt_mkf"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_mkf" name="txt_mkf" value="<?php echo $obj_mkf->estado_segmento_mkf; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Observacion </label>
        <label class="text-danger msj_txt_obs"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control " id="txt_obs" name="txt_obs" value="<?php echo $obj_mkf->observacion; ?>"/>
        </div>
    </div>   
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>

