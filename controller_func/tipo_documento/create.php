<?php
include_once("../../model_class/tipo_documento.php");
$obj_td= new tipo_documento();
$obj_td->id_tipo_documento=$_REQUEST["id"];
$obj_td->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_td->id_tipo_documento; ?>">
    <div class="col-4">
        <label for="txt_title">Nombre <i class="text-danger" title="Ingrese nombre">*</i></label>
        <label class="text-danger msj_txt_title"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_title" name="txt_title" value="<?php echo $obj_td->tipo_documento; ?>"/>
        </div>
    </div>
      
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>
