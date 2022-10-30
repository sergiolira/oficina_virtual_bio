<?php
include_once("../../model_class/beneficio_producto.php");
include_once("../../model_class/producto.php");
$obj_bp= new beneficio_producto();
$obj_prod= new producto();
$obj_bp->id_beneficio_producto=$_REQUEST["id"];
$obj_bp->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_bp->id_beneficio_producto; ?>">
    <div class="col-6">
        <label for="txt_titulo">Titulo <i class="text-danger" title="Ingrese Titulo">*</i></label>
        <label class="text-danger msj_txt_titulo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_titulo" name="txt_titulo" value="<?php echo $obj_bp->titulo; ?>"/>
        </div>
    </div>
    <div class="col-6">
        <label for="txt_descripcion">Descripcion <i class="text-danger" title="Ingrese Descripcion">*</i></label>
        <label class="text-danger msj_txt_descripcion"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_descripcion" name="txt_descripcion" value="<?php echo $obj_bp->descripcion; ?>"/>
        </div>
    </div>
    <div class="col-6">
        <label for="slt_producto">Producto <i class="text-danger" title="Seleccione categoria">*</i> </label>
        <label class="text-danger msj-slt_producto"></label>
        <div class="input-group mb-2">
            <select class="form-control select_select" name="slt_producto" id="slt_producto">
                <option value="0">SELECIONAR</option>
                <?php $rs_producto=$obj_prod->combo();
                    while($fila_p=mysqli_fetch_assoc($rs_producto)){
                ?>
                <option <?php if($obj_bp->id_producto==$fila_p["id_producto"]){ echo "selected";}?> value="<?php echo $fila_p["id_producto"]?>"><?php echo $fila_p["nombre_producto"]?></option>
                    <?php }?>
            </select>
        </div>
    </div>
    <div class="col-6">
        <label for="txt_obs">Observacion </label>
        <label class="text-danger msj_txt_obs"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_obs" name="txt_obs" value="<?php echo $obj_bp->observacion; ?>"/>
        </div>
    </div>
    
      
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>
