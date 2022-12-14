<?php
include_once("../../model_class/paquete_detalle_producto.php");
include_once("../../model_class/paquete_producto_cabecera.php");
include_once("../../model_class/producto.php");
$obj_pd= new paquete_detalle_producto();
$obj_ppc= new paquete_producto_cabecera();
$obj_prod= new producto();
$obj_pd->id_paquete_detalle_producto=$_REQUEST["id"];
$obj_pd->consult();

if($obj_pd->estado == 1){
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
}

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_pd->id_paquete_detalle_producto; ?>">
    <div class="col-4">
        <label for="slt_paquete_producto">Paquete producto cabecera </label>
        <label class="text-danger msj-slt_paquete_producto"></label>
        <div class="input-group mb-2">
            <select class="form-control select_select" name="slt_paquete_producto" id="slt_paquete_producto">
                <option value="0">SELECIONAR</option>
                <?php $rs_paquete_producto=$obj_ppc->combo();
                    while($fila_p=mysqli_fetch_assoc($rs_paquete_producto)){
                ?>
                <option <?php if($obj_pd->id_paquete_cabecera_producto==$fila_p["id_paquete_producto_cabecera"]){ echo "selected";}?> value="<?php echo $fila_p["id_paquete_producto_cabecera"]?>"><?php echo $fila_p["nombre_paquete"]?></option>
                    <?php }?>
            </select>
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
                <option <?php if($obj_pd->id_producto==$fila_p["id_producto"]){ echo "selected";}?> value="<?php echo $fila_p["id_producto"]?>"><?php echo $fila_p["nombre_producto"]?></option>
                    <?php }?>
            </select>
        </div>
    </div>
    
    <div class="col-4">
        <label for="txt_cantidad">Cantidad </label>
        <label class="text-danger msj_txt_cantidad"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" id="txt_cantidad" name="txt_cantidad" value="<?php echo $obj_pd->cantidad; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_precio_venta">Precio venta unitario </label>
        <label class="text-danger msj_txt_precio_venta"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validNumberD" id="txt_precio_venta" name="txt_precio_venta" value="<?php echo $obj_pd->precio_venta_unitario; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_observacion">Observaci??n </label>
        <label class="text-danger msj_txt_observacion"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid" id="txt_observacion" name="txt_observacion" value="<?php echo $obj_pd->observacion; ?>"/>
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
            <input type="text" class="form-control" value="<?php echo $obj_pd->fechaactualiza; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Fecha creacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_pd->fecharegistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Creado por: <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_pd->id_usuarioregistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Atualizado por: <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_pd->id_usuarioactualiza; ?>"/>
        </div>
    </div> 

    <div class="col-12">
                <br><center><div class="card card-outline card-success"><strong>IMAGEN</strong></div></center>
    </div>    
    <div class="col-12 px-0">
        <center> <img class="img-fluid" src="<?php echo $obj_pd->imagen;?>"></center>
    </div>

</div>

<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();
    fntValidNumberDecimal();
    fntValidNumber();

</script>

