
<?php
include_once("../../model_class/estado_civil.php");
$obj_es= new estado_civil();
$obj_es->id_estado_civil=$_REQUEST["id"];
$obj_es->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_es->id_estado_civil; ?>">
    <div class="col-4">
        <label for="txt_edo_civil">Estado civil <i class="text-danger" title="Ingrese Estado civil">*</i></label>
        <label class="text-danger msj_txt_edo_civil"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_edo_civil" name="txt_edo_civil" value="<?php echo $obj_es->estado_civil; ?>"/>
        </div>
    </div>
      
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();

</script>
