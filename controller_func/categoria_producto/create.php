<?php
include_once("../../model_class/categoria_producto.php");
$obj_cp= new categoria_producto();
$obj_cp->id_categoria_producto=$_REQUEST["id"];
$obj_cp->consult();

?>
<div class="row">

    <input type="hidden" name="id" value="<?php echo $obj_cp->id_categoria_producto; ?>">
    <div class="col-6">
        <label for="txt_cat">Categoria <i class="text-danger" title="Ingrese nombre categoria">*</i></label>
        <label class="text-danger msj_txt_cat"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_cat" name="txt_cat" value="<?php echo $obj_cp->categoria; ?>"/>
        </div>
    </div>
    <div class="col-6">
        <label for="txt_des">Descripcion <i class="text-danger" title="Ingrese nombre categoria">*</i> </label>
        <label class="text-danger msj_txt_des"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control " id="txt_des" name="txt_des" value="<?php echo $obj_cp->descripcion; ?>"/>
        </div>
    </div>   

</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>