<?php
include_once("../../model_class/paquete_producto_cabecera.php");
$obj_ppc= new paquete_producto_cabecera();
$obj_ppc->id_paquete_producto_cabecera=$_REQUEST["id"];
$obj_ppc->consult();

if($obj_ppc->estado == 1){
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
} 
?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_ppc->id_paquete_producto_cabecera; ?>">
    <div class="col-4">
        <label for="txt_paquete_producto">Nombre paquete </label>
        <label class="text-danger msj_txt_paquete_producto"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_paquete_producto" name="txt_paquete_producto" value="<?php echo $obj_ppc->nombre_paquete; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_precio_venta">Precio de venta </label>
        <label class="text-danger msj_txt_precio_venta"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validNumberD" id="txt_precio_venta" name="txt_precio_venta" value="<?php echo $obj_ppc->precio_venta; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_cantidad_producto">Cantidad producto </label>
        <label class="text-danger msj_txt_cantidad_producto"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" id="txt_cantidad_producto" name="txt_cantidad_producto" value="<?php echo $obj_ppc->cantidad_productos; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_observacion">Observación</label>
        <label class="text-danger msj_txt_observacion"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid" id="txt_observacion" name="txt_observacion" value="<?php echo $obj_ppc->observacion; ?>"/>
        </div>
    </div>  
    <div class="col-4">
        <label for="txt_obs">Estado <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><?php echo $ico; ?></span>
            </div>
                
            <input type="text" class="form-control" value="<?php echo $estado; ?>"/>
            
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Ultima actualizacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_ppc->fechaactualiza; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Fecha creacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_ppc->fecharegistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Creado por: <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_ppc->id_usuarioregistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Atualizado por: <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_ppc->id_usuarioactualiza; ?>"/>
        </div>
    </div>  
</div>
<div class="row">
    <div class="col-12">
        <label for="txt_cat">Descripción</label>
        <div class="input-group">
            <textarea id="txt_desc" cols="95" rows="7" name="txt_descripcion">  
                <?php echo $obj_ppc->descripcion; ?>
            </textarea>
        </div>
    </div>
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();
    fntValidNumberDecimal();
    fntValidNumber();

</script>

