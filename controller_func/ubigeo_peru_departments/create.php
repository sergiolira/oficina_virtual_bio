<?php
include_once("../../model_class/ubigeo_peru_departments.php");
$obj_u= new ubigeo_peru_departments();
$obj_u->id=$_REQUEST["id"];
$obj_u->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_u->id; ?>">
    
    <div class="col-4">
        <label for="txt_title">Nombre <i class="text-danger" title="Ingrese nombre">*</i></label>
        <label class="text-danger msj_txt_title"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_title" name="txt_title" value="<?php echo $obj_u->name; ?>"/>
        </div>
    </div>
    
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>
