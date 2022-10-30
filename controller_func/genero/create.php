<?php
include_once("../../model_class/genero.php");
$obj_g= new genero();
$obj_g->id_genero=$_REQUEST["id"];
$obj_g->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_g->id_genero; ?>">
    <div class="col-4">
        <label for="txt_genero">Nombre de genero <i class="text-danger" title="Ingrese Nombre de genero">*</i></label>
        <label class="text-danger msj_txt_genero"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_genero" name="txt_genero" value="<?php echo $obj_g->genero; ?>"/>
        </div>
    </div>
      
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();

</script>
