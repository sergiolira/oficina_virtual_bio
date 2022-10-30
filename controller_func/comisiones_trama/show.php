<?php
require_once "../../model_class/trama_comisiones.php";
require_once "../../model_class/producto.php";
require_once "../../model_class/tipo_comision.php";
$obj_tr = new trama_com();
$obj_pro = new producto();
$obj_tp_com = new tipo_com();
$obj_tr->id_trama = $_REQUEST['id'];
$obj_tr->consult();

if($obj_tr->estado==0){
    $activo = "Inactivo";
    $color = "red";
}else{
    $activo = "Activo";
    $color = "green";
}
?>
<div class="row">
    <input type="hidden" name="id" id="id" value="<?php echo $obj_tr->id_trama; ?>">
    <div class="col-4">
        <label for="">Producto<i class="text-danger" title="Ingrese el producto">*</i></label>
        <label class="text-danger msj_txt_pro"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <?php 
            $obj_pro->id_producto = $obj_tr->id_producto;
            $obj_pro->consult();
                      ?>
            <input type="text" class="form-control" placeholder="<?php echo $obj_pro->nombre_producto; ?>" id="txt_producto" name="txt_producto" value="<?php echo $obj_pro->nombre_producto; ?>">
            
        </div>

    </div>
    <div class="col-4">
        <label for="txt_cant">Cantidad<i class="text-danger" title="Ingrese Cantidad">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="txt_cantidad" name="txt_cantidad" value="<?php echo $obj_tr->cantidad; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="txt_tp_com">Tipo de comision<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <?php 
            $obj_tp_com->id_tipo_comision = $obj_tr->tipo_comision; 
            $obj_tp_com->consult();?>
            <input type="text" class="form-control" placeholder="<?php echo $obj_tp_com->tipocomision; ?>" id="txt_producto" name="txt_producto" value="<?php echo $obj_tp_com->tipocomision; ?>">
           
        </div>


    </div>
    <div class="col-4">
        <label for="txt_comision">Comision<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="txt_comision" name="txt_comision" value="<?php echo $obj_tr->comision; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="txt_estado">Estado<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" style="color:<?php echo $color ?> ;" class="form-control" placeholder="Enter" id="txt_comision" name="txt_comision" value="<?php echo $activo; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Ultima actualizacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_tr->fechaactualiza; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Fecha creacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_tr->fecharegistro; ?>"/>
        </div>
    </div>   
</div>
