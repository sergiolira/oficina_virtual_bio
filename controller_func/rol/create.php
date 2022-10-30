<?php
include_once("../../model_class/rol.php");
$obj_r= new rol();
$obj_r->id_rol=$_REQUEST["id"];
$obj_r->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_r->id_rol; ?>">
    <div class="col-4">
        <label for="txt_rol">Rol<i class="text-danger" title="Ingrese tipo de archivo">*</i></label>
        <label class="text-danger msj_txt_rol"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_rol" name="txt_rol" value="<?php echo $obj_r->rol; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_descrip">Observación </label>
        <label class="text-danger msj_txt_descrip"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control " id="txt_descrip" name="txt_descrip" value="<?php echo $obj_r->observacion; ?>"/>
        </div>
    </div>
</div>

<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();

</script>
    
</div>


