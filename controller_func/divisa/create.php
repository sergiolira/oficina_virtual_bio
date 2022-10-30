<?php
include_once("../../model_class/divisa.php");
$obj_d= new divisa();
$obj_d->id_divisa=$_REQUEST["id"];
$obj_d->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_d->id_divisa; ?>">
    <div class="col-4">
        <label for="txt_divisa">Nombre de divisa <i class="text-danger" title="Ingrese Nombre de divisa">*</i></label>
        <label class="text-danger msj_txt_divisa"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_divisa" name="txt_divisa" value="<?php echo $obj_d->divisa; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_expresion">Expresion monetaria <i class="text-danger" title="Ingrese Nombre de exprecion">*</i></label>
        <label class="text-danger msj_txt_expresion"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_expresion" name="txt_expresion" value="<?php echo $obj_d->expresion; ?>"/>
        </div>
    </div>
      
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();

</script>
