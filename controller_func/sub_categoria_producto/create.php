<?php
include_once("../../model_class/sub_categoria_producto.php");
include_once("../../model_class/categoria_producto.php");
$obj_scp= new sub_categoria_producto();
$obj_cp= new categoria_producto();
$obj_scp->id_sub_categoria_producto=$_REQUEST["id"];
$obj_scp->consult();

?>
<div class="row">

    <input type="hidden" name="id" value="<?php echo $obj_scp->id_sub_categoria_producto; ?>">
    <div class="col-6">
        <label for="txt_cat">sub categoria <i class="text-danger" title="Ingrese nombre categoria">*</i></label>
        <label class="text-danger msj_txt_cat"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_cat" name="txt_cat" value="<?php echo $obj_scp->sub_categoria; ?>"/>
        </div>
    </div>
    <div class="col-6">
        <label for="slt_cp">Categoria producto <i class="text-danger" title="Seleccione categoria">*</i> </label>
        <label class="text-danger msj-slt_cp"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_select" name="slt_cp" id="slt_cp">
            <option value="0">SELECIONAR</option>
            <?php $rs_categoria_producto=$obj_cp->combo();
                while($fila_p=mysqli_fetch_assoc($rs_categoria_producto)){
            ?>
            <option <?php if($obj_scp->id_categoria_producto==$fila_p["id_categoria_producto"]){ echo "selected";}?> value="<?php echo $fila_p["id_categoria_producto"]?>"><?php echo $fila_p["categoria"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-6">
        <label for="txt_des">Descripcion <i class="text-danger" title="Ingrese nombre categoria">*</i> </label>
        <label class="text-danger msj_txt_des"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control " id="txt_des" name="txt_des" value="<?php echo $obj_scp->descripcion; ?>"/>
        </div>
    </div>   

</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

    $('#slt_cp').select2({
        theme: 'bootstrap4'
    });

</script>