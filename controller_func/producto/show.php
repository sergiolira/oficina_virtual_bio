<?php
include_once("../../model_class/producto.php");
include_once("../../model_class/tipo_producto.php");
include_once("../../model_class/marca_producto.php");
include_once("../../model_class/unidad_medida.php");
include_once("../../model_class/categoria_producto.php");
include_once("../../model_class/sub_categoria_producto.php");
include_once("../../model_class/imagen_producto.php");
$obj_prod= new producto();
$obj_t= new tipo_producto();
$obj_m= new marca_producto();
$obj_tp= new unidad_medida();
$obj_cp= new categoria_producto();
$obj_scp= new sub_categoria_producto();
$obj_im= new imagen_producto();
$obj_prod->id_producto=$_REQUEST["id"];
$obj_prod->consult();

if($obj_prod->estado == 1){
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
} 
?>
<div class="row">

    <input type="hidden" id="id" name="id" value="<?php echo $obj_prod->id_producto; ?>">
    <div class="col-7">
        <div class="col-12">
            <label for="txt_Nombre_producto">Nombre producto </label>
            <label class="text-danger msj_txt_Nombre_producto"></label>  
            <div class="input-group mb-2">
                <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                </div> 
                <input type="text" class="form-control valid ValidTextSpecial" id="txt_Nombre_producto" name="txt_Nombre_producto" value="<?php echo $obj_prod->nombre_producto; ?>">
            </div>
        </div>

        <div class="col-12">
            <label for="txt_cat">Descripcion producto </label>
            <div class="input-group">

                <textarea id="txt_desc" cols="85" rows="20" name="txt_rep">  
                    <?php echo $obj_prod->descripcion_producto; ?>
                </textarea>
            </div>
        </div>
        <br>
         
    </div>
    <div class="col-5">

        <div class="col-12">
            <label for="txt_codigo_barra">Codigo producto </label>
            <label class="text-danger msj_txt_codigo_barra"></label>  
            <div class="input-group mb-2">
                <input type="text" class="form-control ValidTextSpecial valid" id="txt_codigo_barra" name="txt_codigo_barra" value="<?php echo $obj_prod->codigo_barra; ?>"/>
            </div>

            <div id="divBarcode" class="notblock textcenter">
                <div id="printCode">
                    <svg id="barcode"></svg>
                </div>                
            </div>
        </div><br>
        <div class="row">
            <div class="col-4">
                <label for="txt_precio_actual">Precio anterior</label>
                <label class="text-danger msj_txt_precio_actual"></label>  
                <div class="input-group mb-2">
                    <div class="input-group-prepend ">
                    <span class="input-group-text"><i class="fas fa-wallet"></i></span>
                    </div>
                    <input type="text" class="form-control validNumberD valid validpre" id="txt_precio_actual" name="txt_precio_actual" value="<?php echo $obj_prod->precio_venta_anterior; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_descuento">Descuento %</label>
                <label class="text-danger msj_txt_descuento"></label>  
                <div class="input-group mb-2">
                    <div class="input-group-prepend ">
                    <span class="input-group-text"><i class="fas fa-wallet"></i></span>
                    </div>
                    <input type="text" class="form-control valid" id="txt_descuento" name="txt_descuento" value="<?php echo $obj_prod->descuento; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_precio_nuevo">Precio a pagar</label>
                <label class="text-danger msj_txt_precio_nuevo"></label>  
                <div class="input-group mb-2">
                    <div class="input-group-prepend ">
                    <span class="input-group-text"><i class="fas fa-wallet"></i></span>
                    </div>
                    <input type="text" class="form-control validNumberD valid validpre"  id="txt_precio_nuevo" name="txt_precio_nuevo" value="<?php echo $obj_prod->precio_venta_nuevo; ?>"/>
                </div>

            </div>

            <div class="col-6">
                <label for="txt_stock">Stock </label>
                <label class="text-danger msj_txt_stock"></label>  
                <div class="input-group mb-2">
                    <div class="input-group-prepend ">
                    <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                    </div>
                    <input type="text" class="form-control valid validNumber" id="txt_stock" name="txt_stock" value="<?php echo $obj_prod->stock_actual; ?>"/>
                </div>
            </div>
            <div class="col-6">
                <label for="slt_tipo_producto">Tipo de producto </label>
                <label class="text-danger msj-slt_tipo_producto"></label>
                <div class="input-group mb-2">
                    
                    <select class="form-control select_select" name="slt_tipo_producto" id="slt_tipo_producto">
                        <option value="0">SELECIONAR</option>
                        <?php $rs_tipo_producto=$obj_t->combo();
                            while($fila_p=mysqli_fetch_assoc($rs_tipo_producto)){
                        ?>
                        <option <?php if($obj_prod->id_tipo_producto==$fila_p["id_tipo_producto"]){ echo "selected";}?> value="<?php echo $fila_p["id_tipo_producto"]?>"><?php echo $fila_p["tipo_producto"]?></option>
                            <?php }?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="slt_marca_producto">Marca producto  </label>
                <label class="text-danger msj-slt_marca_producto"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend ">
                    <span class="input-group-text"><i class="fas fa-wallet"></i></span>
                    </div>
                    <select class="form-control select_select" name="slt_marca_producto" id="slt_marca_producto">
                        <option value="0">SELECIONAR</option>
                        <?php $rs_marca_producto=$obj_m->combo();
                            while($fila_p=mysqli_fetch_assoc($rs_marca_producto)){
                        ?>
                        <option <?php if($obj_prod->id_marca_producto==$fila_p["id_marca_producto"]){ echo "selected";}?> value="<?php echo $fila_p["id_marca_producto"]?>"><?php echo $fila_p["marca_producto"]?></option>
                            <?php }?>
                    </select>
                </div>
            </div>

            <div class="col-6">
                <label for="txt_peso">Peso </label>
                <label class="text-danger msj_txt_peso"></label>  
                <div class="input-group mb-2">
                    <div class="input-group-prepend ">
                    <span class="input-group-text"><i class="fas fa-wallet"></i></span>
                    </div>
                    <input type="text" class="form-control validNumberD valid" id="txt_peso" name="txt_peso" value="<?php echo $obj_prod->peso; ?>"/>
                </div>
            </div>
            <div class="col-6">
                <label for="slt_tipo_peso">Tipo de peso </label>
                <label class="text-danger msj-slt_tipo_peso"></label>
                <div class="input-group mb-2">
                    
                    <select class="form-control select_select" name="slt_tipo_peso" id="slt_tipo_peso">
                        <option value="0">SELECIONAR</option>
                        <?php $rs_tipo_peso=$obj_tp->combo();
                            while($fila_p=mysqli_fetch_assoc($rs_tipo_peso)){
                        ?>
                        <option <?php if($obj_prod->id_unidad_medida==$fila_p["id_unidad_medida"]){ echo "selected";}?> value="<?php echo $fila_p["id_unidad_medida"]?>"><?php echo $fila_p["unidad_medida"]?></option>
                            <?php }?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="slt_cp">Categoria producto </label>
                <label class="text-danger msj-slt_cp"></label>
                <div class="input-group mb-2">
                    
                    <select class="form-control select_select" name="slt_cp" id="slt_cp">
                        <option value="0">SELECIONAR</option>
                        <?php $rs_categoria_producto=$obj_cp->combo();
                            while($fila_p=mysqli_fetch_assoc($rs_categoria_producto)){
                        ?>
                        <option <?php if($obj_prod->id_categoria_producto==$fila_p["id_categoria_producto"]){ echo "selected";}?> value="<?php echo $fila_p["id_categoria_producto"]?>"><?php echo $fila_p["categoria"]?></option>
                            <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <label for="slt_scp">Sub categoria </label>
                <label class="text-danger msj-slt_scp"></label>
                <div class="input-group mb-2">
                    
                    <select class="form-control select_select" name="slt_scp" id="slt_scp">
                        <option value="0">seleccione categoria</option>
                        <?php
                            if($_REQUEST["id"]>0){
                                $obj_scp->id_categoria_producto=$obj_prod->id_categoria_producto;
                                $rs_sub_categoria_producto=$obj_scp->combo_x_categoria();
                            }
                            while($fila_p=mysqli_fetch_assoc($rs_sub_categoria_producto)){
                        ?>
                        <option <?php if($obj_prod->id_sub_categoria_producto==$fila_p["id_sub_categoria_producto"]){ echo "selected";}?> value="<?php echo $fila_p["id_sub_categoria_producto"]?>"><?php echo $fila_p["sub_categoria"]?></option>
                            <?php }?>
                    </select>
                </div>
            </div>    
            <div class="col-6">
                <label for="txt_puntos_x_venta">Puntos por venta</label>
                <label class="text-danger msj_txt_puntos_x_venta"></label>  
                <div class="input-group mb-2">
                    <div class="input-group-prepend ">
                    <span class="input-group-text"><i class="fas fa-wallet"></i></span>
                    </div>
                    <input type="text" class="form-control validNumberD valid validpre" id="txt_puntos_x_venta" name="txt_puntos_x_venta" value="<?php echo $obj_prod->puntos_x_venta; ?>"/>
                </div>
            </div>
            <div class="col-6">
                <label for="txt_comision_x_venta">Comision por venta</label>
                <label class="text-danger msj_txt_comision_x_venta"></label>  
                <div class="input-group mb-2">
                    <div class="input-group-prepend ">
                    <span class="input-group-text"><i class="fas fa-wallet"></i></span>
                    </div>
                    <input type="text" class="form-control validNumberD valid validpre" id="txt_comision_x_venta" name="txt_comision_x_venta" value="<?php echo $obj_prod->comision_x_venta; ?>"/>
                </div>
            </div>
        </div>
        <hr>
    </div>
    
</div>
<div class="row">
    <div class="col-12">
        <center><div class="card card-outline card-success"><strong>Mas detalle del producto</strong></div></center>
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
            <input type="text" class="form-control" value="<?php echo $obj_prod->fechaactualiza; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Fecha creacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_prod->fecharegistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Creado por: <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_prod->id_usuarioregistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Atualizado por: <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_prod->id_usuarioactualiza; ?>"/>
        </div>
    </div>  
</div>
<hr>
<div class="row">
    <div class="tile-footer">
        <div class="form-group col-md-12">
            <?php if($_REQUEST["id"]>0){ ?>
                <div id="containerGallery">
                    <span>Galeria fotos</span>
                    <button class="btnAddImage btn btn-info btn-sm" data-id="<?php echo $obj_prod->id_producto; ?>" type="button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <hr>
                
                <div id="containerImage" class="containerImage_list">
                    <?php
                    if($_REQUEST["id"]>0){
                        $obj_im->id_producto=$obj_prod->id_producto;
                        $rs_img_producto=$obj_im->fotos_x_producto();
                        while($fila_im=mysqli_fetch_assoc($rs_img_producto)){
                    
    
                    ?>
                    <div id="<?php echo $fila_im["id_imagen_producto"]; ?>">
                        <div class="prevImage">
                            <img src="<?php echo $fila_im["url_imagen"]; ?>">
                        </div>
                        <!-- <input type="file" name="foto" id="img1" class="inputUploadfile">
                        <label for="img1" class="btnUploadfile"><i class="fas fa-upload"></i></label>
                        <button class="btnDeleteImage" type="button" onclick="fntDelItem('div24')"><i class="fas fa-trash-alt"></i></button> -->
                    </div>
                    <?php } } ?>
                    
                </div>
            <?php } ?>
        </div>
    </div>   
</div>
<script src="js/valid.js"></script>
<script>


    $('#slt_cp').select2({
        theme: 'bootstrap4'
    });

    $('#slt_scp').select2({
        theme: 'bootstrap4'
    });
    


  if (document.querySelector("#txt_codigo_barra")) {
     let inputCodigo = document.querySelector("#txt_codigo_barra");
     inputCodigo.onkeyup =function(){
         if (inputCodigo.value.length >=5) {
             document.querySelector("#divBarcode").classList.remove("notblock");
             fntBarcode();
         } else{
             document.querySelector("#divBarcode").classList.add("notblock");
         }
     };
 }


</script>