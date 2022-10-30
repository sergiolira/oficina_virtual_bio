<?php
include_once("../../model_class/tipo_archivo.php");
$obj_a= new tipo_archivo();
$obj_a->id_tipo_archivo=$_REQUEST["id"];
$obj_a->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_a->id_tipo_archivo; ?>">
    <div class="col-4">

        <label for="txt_arch">Tipo de archivo <i class="text-danger" title="Ingrese tipo de archivo">*</i></label>
         <label class="text-danger msj_txt_arch"> </label>


        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_arch" name="txt_arch" value="<?php echo $obj_a->tipo_archivo; ?>"/>
        </div>
    </div>
    <div class="col-4">

        <label for="txt_obs">Observacion </label>

        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>

            <input type="text" class="form-control" id="txt_obs" name="txt_obs" value="<?php echo $obj_a->observacion; ?>"/>

        </div>
    </div>
    
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();
</script>


