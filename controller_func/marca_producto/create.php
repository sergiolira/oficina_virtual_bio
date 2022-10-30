<?php
include_once("../../model_class/marca_producto.php");
$obj_m= new marca_producto();
$obj_m->id_marca_producto=$_REQUEST["id"];
$obj_m->consult();

?>
<div class="row">

    <input type="hidden" name="id" value="<?php echo $obj_m->id_marca_producto; ?>">
    <div class="col-6">
        <label for="txt_marca">Marca <i class="text-danger" title="Ingrese nombre de marca">*</i></label>
        <label class="text-danger msj_txt_marca"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_marca" name="txt_marca" value="<?php echo $obj_m->marca_producto; ?>"/>
        </div>
    </div>
  

</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>