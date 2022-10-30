<?php
include_once("../../model_class/beneficio_producto.php");
include_once("../../model_class/producto.php");
$obj_bp= new beneficio_producto();
$obj_prod= new producto();
$obj_bp->id_beneficio_producto=$_REQUEST["id"];
$obj_bp->consult();
if($obj_bp->estado == 1){
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
} 
?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_bp->id_beneficio_producto; ?>">
    <div class="col-4">
        <label for="txt_titulo">Titulo</label>
        <label class="text-danger msj_txt_titulo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_titulo" name="txt_titulo" value="<?php echo $obj_bp->titulo; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_descripcion">Descripcion </label>
        <label class="text-danger msj_txt_descripcion"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_descripcion" name="txt_descripcion" value="<?php echo $obj_bp->descripcion; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_producto">Producto </label>
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
    <div class="col-4">
        <label for="txt_obs">Observacion </label>
        <label class="text-danger msj_txt_obs"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_obs" name="txt_obs" value="<?php echo $obj_bp->observacion; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Estado </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><?php echo $ico; ?></span>
            </div>
             
            <input type="text" class="form-control" value="<?php echo $estado; ?>"/>
           
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Ultima actualizacion </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_bp->fechaactualiza; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Fecha creacion </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_bp->fecharegistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Creado por: </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_bp->id_usuarioregistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Atualizado por: </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_bp->id_usuarioactualiza; ?>"/>
        </div>
    </div>   
      
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();

</script>
