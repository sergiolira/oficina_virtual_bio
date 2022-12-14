<?php
session_start();
include_once("../../model_class/tipo_venta.php");
include_once("../../model_class/cabecera_registro_venta.php");
include_once("../../model_class/detalle_registro_venta.php");
include_once("../../model_class/ubigeo_peru_departments.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
include_once("../../model_class/ubigeo_peru_districts.php");
include_once("../../model_class/estado_registro_venta.php");
include_once("../../model_class/pais.php");
include_once("../../model_class/tipo_venta.php");
include_once("../../model_class/producto.php");
include_once("../../model_class/paquete_producto_cabecera.php");
include_once("../../model_class/paquete_detalle_producto.php");
include_once("../../model_class/descuento_producto.php");
$obj_cabecera_registro_venta= new cabecera_registro_venta();
$obj_detalle_registro_venta= new detalle_registro_venta();
$obj_dep= new ubigeo_peru_departments();
$obj_prov= new ubigeo_peru_provinces();
$obj_dist= new ubigeo_peru_districts();
$obj_pais = new pais();
$obj_estado_registro_venta = new estado_registro_venta();
$obj_tipo_venta= new tipo_venta();
$obj_producto = new producto();
$obj_descuento_producto = new descuento_producto();
$obj_paquete_producto_cabecera = new paquete_producto_cabecera();
$obj_paquete_detalle_producto = new paquete_detalle_producto();
$obj_cabecera_registro_venta->nro_solicitud=$_REQUEST["id"];
$obj_cabecera_registro_venta->consult();
$obj_detalle_registro_venta->nro_solicitud=$_REQUEST["id"];
$obj_detalle_registro_venta->consult();
?>
<div class="row"> 
    <div class="col-12">
        <br><center><strong>Registro de producto</strong><div class="card card-outline card-success"></div></center>
    </div> 
    <?php if($obj_detalle_registro_venta->nro_solicitud==""){?>
    <input type="hidden" name="id" value="0">
    <?php }else{?>
    <input type="hidden" name="id" value="<?php echo $obj_detalle_registro_venta->nro_solicitud;?>">
    <?php }?>

    <div class="col-4">
        <label for="slt_tipo_venta">Tipo de Venta<i class="text-danger" title="Seleccione">*</i> </label>
        <label class="text-danger msj-slt_tipo_venta"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control" name="slt_tipo_venta" id="slt_tipo_venta">          
            <?php $rs_tipo_venta=$obj_tipo_venta->combo();
                while($fila_p=mysqli_fetch_assoc($rs_tipo_venta)){
            ?>
            <option <?php if($obj_detalle_registro_venta->id_tipo_venta==$fila_p["id_tipo_venta"]){ echo "selected";}?> 
            value="<?php echo $fila_p["id_tipo_venta"]?>"><?php echo $fila_p["tipo_venta"]?></option>
                <?php }?>
        </select>
        </div>
    </div>

    <?php if($obj_detalle_registro_venta->id_tipo_venta=="1" || $_REQUEST["id"]=="" || $_REQUEST["id"]=="0"){?>
    <div class="col-8 div_producto">
        <label for="slt_producto">Producto<i class="text-danger" title="Seleccione">*</i> </label>
        <label class="text-danger msj-slt_producto"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control" name="slt_producto" id="slt_producto">        
            <?php $rs_producto=$obj_producto->combo();
                while($fila_p=mysqli_fetch_assoc($rs_producto)){
            ?>
            <option <?php if($obj_detalle_registro_venta->id_producto==$fila_p["id_producto"]){ echo "selected";}?> 
            value="<?php echo $fila_p["id_producto"]?>"><?php echo $fila_p["nombre_producto"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <?php }else{?>
        <div class="col-4 div_producto" style="display: none;">
        <label for="slt_producto">Producto<i class="text-danger" title="Seleccione">*</i> </label>
        <label class="text-danger msj-slt_producto"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control" name="slt_producto" id="slt_producto">
            <option value="0">SELECCIONAR PRODUCTO</option>            
            <?php $rs_producto=$obj_producto->combo();
                while($fila_p=mysqli_fetch_assoc($rs_producto)){
            ?>
            <option <?php if($obj_detalle_registro_venta->id_producto==$fila_p["id_producto"]){ echo "selected";}?> value="<?php echo $fila_p["id_producto"]?>"><?php echo $fila_p["nombre_producto"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <?php }?>

    <?php if($obj_detalle_registro_venta->id_tipo_venta=="2" &&  ($_REQUEST["id"]!=""  && $_REQUEST["id"]!="0")){?>
    <div class="col-4 div_paquete">
        <label for="slt_paquete">Paquete<i class="text-danger" title="Seleccione">*</i> </label>
        <label class="text-danger msj-slt_paquete"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control" name="slt_paquete" id="slt_paquete">
            <option value="0">SELECCIONAR PAQUETE</option>            
            <?php $rs_paquete=$obj_paquete_detalle_producto->combo();
                while($fila_p=mysqli_fetch_assoc($rs_paquete)){
            ?>
            <option <?php if($obj_detalle_registro_venta->id_paquete==$fila_p["id_paquete_detalle_producto"]){ echo "selected";}?> 
            value="<?php echo $fila_p["id_paquete_detalle_producto"]?>"><?php echo $fila_p["nombre_paquete"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <?php }else{?>
    <div class="col-4 div_paquete" style="display: none;">
        <label for="slt_paquete">Paquete<i class="text-danger" title="Seleccione">*</i> </label>
        <label class="text-danger msj-slt_paquete"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control" name="slt_paquete" id="slt_paquete">
            <option value="0">SELECCIONAR PAQUETE</option>            
            <?php $rs_paquete=$obj_paquete_detalle_producto->combo();
                while($fila_p=mysqli_fetch_assoc($rs_paquete)){
            ?>
            <option <?php if($obj_detalle_registro_venta->id_paquete==$fila_p["id_paquete_detalle_producto"]){ echo "selected";}?> 
            value="<?php echo $fila_p["id_paquete_detalle_producto"]?>"><?php echo $fila_p["nombre_paquete"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <?php }?>

    <div class="col-4">
        <label for="txt_precio_unitario">Precio (USD)<i class="text-danger"></i></label>
        <label class="text-danger msj_txt_monto"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="number" readonly class="form-control valid ValidTextSpecial"  id="txt_precio_unitario" 
            name="txt_precio_unitario" value="<?php echo $obj_detalle_registro_venta->precio_unitario;?>"/>
        </div>
    </div>

                    
    <div class="col-4 div_cantidad">
        <label for="txt_cantidad" class="lbl_cant">Cantidad</label><i class="text-danger"></i>
        <label class="text-danger msj_txt_monto"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <?php if($obj_detalle_registro_venta->id_tipo_venta=="1" || $_REQUEST["id"]=="0"){?>
            <input type="number" class="form-control valid validNumber"  id="txt_cantidad" name="txt_cantidad" min="1" max='1000'
            value="1"/>
            <?php }else{?>
            <input type="number" readonly class="form-control valid validNumber"  id="txt_cantidad" name="txt_cantidad" min="1" max='1000' 
            value="<?php echo $obj_detalle_registro_venta->cantidad; ?>"/>
            <?php }?>
        </div>
    </div>

    <?php if($obj_detalle_registro_venta->id_tipo_venta=="1" && $_REQUEST["id"]!="" && $_REQUEST["id"]!="0"){?>
    <div class="col-4">
        <label for="txt_sub_total">Sub Total (USD)<i class="text-danger"></i></label>
        <label class="text-danger msj_txt_monto"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="number" readonly class="form-control valid validNumber"  id="txt_sub_total" name="txt_sub_total" 
            value="<?php echo $obj_detalle_registro_venta->sub_total; ?>" style="border-color:aquamarine"/>
        </div>
    </div>     
    <?php }else{?>
        <div class="col-4">
            <label for="txt_sub_total">Sub Total (USD)<i class="text-danger"></i></label>
            <label class="text-danger msj_txt_sub_total"></label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                </div>
                <input type="number" readonly class="form-control valid ValidTextSpecial"  id="txt_sub_total" name="txt_sub_total" 
                value="0.00" style="border-color:aquamarine"/>
            </div>
        </div> 
    <?php }?>

    <div class="col-4 div_desc_x_vol">
        <label for="txt_desc_x_vol">% Descuento por volumen - Mayor a 99 uds </label><i class="text-danger"></i>
        <label class="text-danger msj_txt_desc_x_vol"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <?php if($obj_detalle_registro_venta->id_tipo_venta=="" && ($_REQUEST["id"]=="" || $_REQUEST["id"]=="0")){?>
            <input type="text" readonly class="form-control valid ValidTextSpecial"  id="txt_desc_x_vol" name="txt_desc_x_vol" 
            value="0" style="border-color:aquamarine"/>
            <?php }elseif($obj_detalle_registro_venta->id_tipo_venta=="2" && ($_REQUEST["id"]!=""  && $_REQUEST["id"]!="0")){?>
            <input type="text" readonly class="form-control valid ValidTextSpecial"  id="txt_desc_x_vol" name="txt_desc_x_vol"
            value="0" style="border-color:aquamarine"/>
            <?php }elseif($obj_detalle_registro_venta->id_tipo_venta=="1" && $obj_detalle_registro_venta->cantidad>99){?>
            <input type="text" readonly class="form-control valid ValidTextSpecial"  id="txt_desc_x_vol" name="txt_desc_x_vol"
            value="<?php echo $obj_detalle_registro_venta->descuento_por_volumen_producto; ?>" style="border-color:aquamarine"/>
            <?php }elseif($obj_detalle_registro_venta->id_tipo_venta=="1" && $obj_detalle_registro_venta->cantidad>=1){?>
            <input type="text" readonly class="form-control valid ValidTextSpecial"  id="txt_desc_x_vol" name="txt_desc_x_vol"
            value="<?php echo $obj_detalle_registro_venta->descuento_por_volumen_producto; ?>" style="border-color:aquamarine"/>
            <?php }?>
        </div>
    </div>  
    
   
    <div class="col-12">
        <br><center><strong>Datos de receptor</strong><div class="card card-outline card-success"></div></center>
    </div>   


    <div class="col-4" style="display: none;">
    <label for="slt_tipo_cliente">Tipo de cliente<i class="text-danger" title="Seleccione">*</i> </label>
        <label class="text-danger msj_slt_tipo_cliente"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control" name="slt_tipo_cliente" id="slt_tipo_cliente">        
            <option value="ASESOR" <?php if($obj_cabecera_registro_venta->tipo_cliente=="ASESOR"){ echo "selected";}?>>Asesor de venta</option>
        </select>
        </div>
    </div>

    <div class="col-4">
        <label for="txt_numero_documento">N° documento / RUC (codigo de cliente)<i class="text-danger" title="Ingrese Número de documento">*</i></label>
        <label class="text-danger msj_txt_num_documento"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="number" class="form-control" id="txt_numero_documento" name="txt_numero_documento" 
            value="<?php echo $_SESSION["nro_documento"];?>"/>
            <input type="hidden" name="txt_patrocinador" id="txt_patrocinador" value="<?php echo $_SESSION["patrocinador"];?>">
            <input type="hidden" name="txt_patrocinador_directo" id="txt_patrocinador_directo" 
            value="<?php echo $_SESSION["patrocinador_directo"];?>">
        </div>
    </div>

    <div class="col-8">
        <label for="txt_datos_cli">Datos<i class="text-danger" >*</i> </label>
        <label class="text-danger"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" readonly class="form-control valid fntValidTextSpecial" id="txt_datos_cli" name="txt_datos_cli" 
            value="<?php echo $_SESSION["razon_social"];?>"/>
        </div>
    </div>

    <div class="col-4">
        <label for="txt_correo_cli">Correo<i class="text-danger">*</i> </label>
        <label class="text-danger msj_txt_correo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="email"  class="form-control valid validEmail" id="txt_correo_cli" name="txt_correo_cli" 
            value="<?php echo $_SESSION["correo"];?>"/>
        </div>
    </div>

    <div class="col-4">
        <label for="txt_celular_cli">Celular<i class="text-danger">*</i> </label>
        <label class="text-danger"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text"  class="form-control valid fntValidTextSpecial" id="txt_celular_cli" name="txt_celular_cli" 
            value="<?php echo $_SESSION["telefono"];?>"/>
        </div>
    </div>

    <div class="col-4">
        <label for="txt_des_x_cli">% Descuento de cliente<i class="text-danger">*</i> </label>
        <label class="text-danger"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <?php if($obj_detalle_registro_venta->nro_solicitud=="0"){?>
            <input type="text" readonly class="form-control valid ValidTextSpecial" id="txt_des_x_cli" name="txt_des_x_cli" 
            value="<?php echo $_SESSION["descuento_x_registro"];?>" style="border-color:aquamarine"/>
            <?php }else{?>
            <input type="text" readonly class="form-control valid ValidTextSpecial" id="txt_des_x_cli" name="txt_des_x_cli"
            value="<?php echo $obj_detalle_registro_venta->descuento_por_nro_documento;?>" style="border-color:aquamarine"/>
            <?php }?>
        </div>
    </div>


    <div class="col-12">
        <br><center><strong>Gestion de Envio</strong><div class="card card-outline card-success"></div></center>
    </div> 
            
    <div class="col-4">
        <label for="slt_pais_seleccionado">Pais<i class="text-danger" title="Seleccione País">*</i> </label>
        <label class="text-danger msj-slt_pais_seleccionado"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_dep" name="slt_pais_seleccionado" id="slt_pais_seleccionado">
            <option value="0">SELECCIONAR PAÍS</option>            
            <?php $rs_pais=$obj_pais->combo();
                while($fila_p=mysqli_fetch_assoc($rs_pais)){
            ?>
            <option <?php if($obj_cabecera_registro_venta->id_pais==$fila_p["id_pais"]){ echo "selected";}?> value="<?php echo $fila_p["id_pais"]?>"><?php echo $fila_p["pais"]?></option>
                <?php }?>
        </select>
        </div>
    </div>


    <?php if($obj_cabecera_registro_venta->id_pais=="1" || $_GET["id"]==0){?>
    <div class="col-4 div_departamento">
        <label for="slt_departamento_seleccionado">Departamento<i class="text-danger" title="Seleccione un Departamento">*</i> </label>
        <label class="text-danger msj-slt_departamento_seleccionado"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_dep" name="slt_departamento_seleccionado" id="slt_departamento_seleccionado">
            <option value="0">SELECCIONAR DEPARTAMENTO</option>
            <?php $rs_departamento=$obj_dep->combo();
                while($fila_p=mysqli_fetch_assoc($rs_departamento)){
            ?>
            <option <?php if($obj_cabecera_registro_venta->id_departamento==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <?php }else{?>
    <div class="col-4 div_departamento" style="display:none">
        <label for="slt_departamento_seleccionado">Departamento<i class="text-danger" title="Seleccione un Departamento">*</i> </label>
        <label class="text-danger msj-slt_departamento_seleccionado"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_dep" name="slt_departamento_seleccionado" id="slt_departamento_seleccionado">
            <option value="0">SELECCIONAR DEPARTAMENTO</option>
            <?php $rs_departamento=$obj_dep->combo();
                while($fila_p=mysqli_fetch_assoc($rs_departamento)){
            ?>
            <option <?php if($obj_cabecera_registro_venta->id_departamento==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <?php }?>

    <?php if($obj_cabecera_registro_venta->id_pais=="1" || $_GET["id"]==0){?>
    <div class="col-4 div_provincia">
        <label for="slt_provincia_seleccionado">Provincia<i class="text-danger" title="Seleccione una Provincia">*</i> </label>
        <label class="text-danger msj-slt_provincia_seleccionado"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_prov" name="slt_provincia_seleccionado" id="slt_provincia_seleccionado" >
            <option value="0">SELECCIONAR PROVINCIA</option>
            <?php
            if($_REQUEST["id"]>0){
                $obj_prov->department_id=$obj_cabecera_registro_venta->id_departamento;
                $rs_provincia=$obj_prov->combo_x_dep();
            ?>
            <?php 
                while($fila_p=mysqli_fetch_assoc($rs_provincia)){
            ?>
            <option <?php if($obj_cabecera_registro_venta->id_provincia==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                <?php } }?>
        </select>
        </div>
    </div>
    <?php }else{?>
    <div class="col-4 div_provincia" style="display:none">
        <label for="slt_provincia_seleccionado">Provincia<i class="text-danger" title="Seleccione una Provincia">*</i> </label>
        <label class="text-danger msj-slt_provincia_seleccionado"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_prov" name="slt_provincia_seleccionado" id="slt_provincia_seleccionado" >
            <option value="0">SELECCIONAR PROVINCIA</option>
            <?php
            if($_REQUEST["id"]>0){
                $obj_prov->department_id=$obj_cabecera_registro_venta->id_departamento;
                $rs_provincia=$obj_prov->combo_x_dep();
            ?>
            <?php 
                while($fila_p=mysqli_fetch_assoc($rs_provincia)){
            ?>
            <option <?php if($obj_cabecera_registro_venta->id_provincia==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                <?php } }?>
        </select>
        </div>
    </div>
    <?php }?>

    <?php if($obj_cabecera_registro_venta->id_pais=="1" || $_GET["id"]==0){?>
    <div class="col-4 div_distrito">
        <label for="slt_distrito_seleccionado">Distrito<i class="text-danger" title="Seleccione un Distrito">*</i> </label>
        <label class="text-danger msj-slt_distrito_seleccionado"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_prov" name="slt_distrito_seleccionado" id="slt_distrito_seleccionado">
            <option value="0">SELECCIONAR DISTRITO</option>
            <?php
            if($_REQUEST["id"]>0){
                $obj_dist->province_id=$obj_cabecera_registro_venta->id_provincia;
                $rs_distrito=$obj_dist->combo_x_prov();
            ?>
            <?php 
                while($fila_p=mysqli_fetch_assoc($rs_distrito)){
            ?>
            <option <?php if($obj_cabecera_registro_venta->id_distrito==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                <?php } }?>
        </select>
        </div>
    </div> 
    <?php }else{?>
    <div class="col-4 div_distrito" style="display:none">
        <label for="slt_distrito_seleccionado">Distrito<i class="text-danger" title="Seleccione un Distrito">*</i> </label>
        <label class="text-danger msj-slt_distrito_seleccionado"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_prov" name="slt_distrito_seleccionado" id="slt_distrito_seleccionado">
            <option value="0">SELECCIONAR DISTRITO</option>
            <?php
            if($_REQUEST["id"]>0){
                $obj_dist->province_id=$obj_cabecera_registro_venta->id_provincia;
                $rs_distrito=$obj_dist->combo_x_prov();
            ?>
            <?php 
                while($fila_p=mysqli_fetch_assoc($rs_distrito)){
            ?>
            <option <?php if($obj_cabecera_registro_venta->id_distrito==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                <?php } }?>
        </select>
        </div>
    </div>
    <?php }?>

    <div class="col-8">
        <label for="txt_direccion">Dirección<i class="text-danger" title="Ingrese Direccion">*</i></label>
        <label class="text-danger msj_txt_direccion"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_direccion" name="txt_direccion" 
            value="<?php echo $obj_cabecera_registro_venta->direccion; ?>"/>
        </div>
    </div>

    <div class="col-8">
        <label for="txt_referencia">Referencia<i class="text-danger" title="Ingrese Referencia">*</i></label>
        <label class="text-danger msj_txt_referencia"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_referencia" name="txt_referencia" 
            value="<?php echo $obj_cabecera_registro_venta->referencia; ?>"/>
        </div>
    </div>   

    <div class="col-2">
        <label for="txt_enlace_ubigeo">Enlace de ubigeo</label>
        <label class="text-danger msj_txt_enlace_ubigeo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_enlace_ubigeo" name="txt_enlace_ubigeo" value="<?php echo $obj_cabecera_registro_venta->enlace_ubigeo; ?>"/>
        </div>
    </div>

    <div class="col-2">
        <label for="txt_costo_envio">Costo de envio (USD)<i class="text-danger" title="Ingrese Costo de Envio">*</i></label>
        <label class="text-danger msj_txt_costo_envio"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <?php if($obj_cabecera_registro_venta->costo_envio==""){?>
            <input type="text" readonly class="form-control valid ValidTextSpecial" id="txt_costo_envio" name="txt_costo_envio" 
            value="0.00" style="border-color:aquamarine"/>
            <?php }else{?>
            <input type="text" readonly class="form-control valid ValidTextSpecial" id="txt_costo_envio" name="txt_costo_envio"
            value="<?php echo $obj_cabecera_registro_venta->costo_envio;?>" style="border-color:aquamarine"/>
            <?php }?>
        </div>
    </div>

    <div class="col-12">
        <br><center><strong>Gestion de compra</strong><div class="card card-outline card-success"></div></center>
    </div>

    
    <div class="col-8">
        <label for="txt_fecha_pedido">Fecha registro<i class="text-danger" title="Ingrese Fecha Pedido">*</i></label>
        <label class="text-danger msj_txt_fecha_pedido"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <?php if($_REQUEST["id"]>0){?>                       
                <input type="hidden" class="form-control valid ValidTextSpecial"  id="txt_fecha_pedido" name="txt_fecha_pedido" 
                value="<?php echo  date('Y-m-d',strtotime($obj_cabecera_registro_venta->fecha_pedido));?>"/>  
                <input type="text" readonly class="form-control valid ValidTextSpecial"  id="" name="" 
                value="<?php echo  date('Y-m-d',strtotime($obj_cabecera_registro_venta->fecha_pedido));?>"/>                          
            <?php }else{?>
                <input type="hidden" class="form-control valid ValidTextSpecial"  id="txt_fecha_pedido" name="txt_fecha_pedido" 
                value="<?php echo date('Y-m-d');?>"/>
                <input type="text" class="form-control valid ValidTextSpecial"  id="" name="" 
                value="<?php echo date('Y-m-d');?>"/>
            <?php }?>
        </div>
    </div>

    <div class="col-4" style="display:none">
        <label for="txt_fecha_entrega">Fecha entrega<i class="text-danger" title="Ingrese Fecha Vencimiento">*</i></label>
        <label class="text-danger msj_txt_fecha_entrega"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text">
                    <input type="checkbox" id="check_fec_entrega">
                </span>
            </div>
            <?php if($_REQUEST["id"]>0){?>                       
                <input type="text" class="form-control valid ValidTextSpecial" disabled id="txt_fecha_entrega" name="txt_fecha_entrega" 
                value="<?php echo  date('Y-m-d',strtotime($obj_cabecera_registro_venta->fecha_entrega));?>"/>                          
            <?php }else{?>
                <input type="text" class="form-control valid ValidTextSpecial" disabled id="txt_fecha_entrega" name="txt_fecha_entrega" 
                value="<?php echo date('Y-m-d');?>"/>
            <?php }?>
        </div>
    </div>

    <?php if($_REQUEST["id"]=="" || $_REQUEST["id"]=="0"){?>
    <div class="col-4">
        <label for="slt_estado_registro_venta">Estado Venta<i class="text-danger" title="Seleccione un estado de venta">*</i> </label>
        <label class="text-danger msj-slt_estado_registro_venta"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_dep" name="slt_estado_registro_venta" id="slt_estado_registro_venta">
            <option value="1">Procesando</option>
        </select>
        </div>
    </div>
    <?php }else{?>
    <div class="col-4">
        <label for="slt_estado_registro_venta">Estado Venta<i class="text-danger" title="Seleccione un estado de venta">*</i> </label>
        <label class="text-danger msj-slt_estado_registro_venta"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_dep" name="slt_estado_registro_venta" id="slt_estado_registro_venta">
            <option value="0">SELECCIONAR ESTADO VENTA</option>
            <?php $rs_estado_Venta=$obj_estado_registro_venta->combo();
                while($fila_p=mysqli_fetch_assoc($rs_estado_Venta)){
            ?>
            <option <?php if($obj_cabecera_registro_venta->id_estado_registro_venta==$fila_p["id_estado_registro_venta"]){ echo "selected";}?> 
            value="<?php echo $fila_p["id_estado_registro_venta"]?>"><?php echo $fila_p["estado_registro_venta"]?></option>
                <?php }?>
        </select>
        </div>
    </div> 
    <?php }?>
    
    <div class="col-4">
        <label for="txt_total_descuento">% Descuento total<i class="text-danger" title="Ingrese un Descuento">*</i></label>
        <label class="text-danger msj_txt_total_descuento"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <?php if($obj_cabecera_registro_venta->total_descuento==""){?>
            <input type="text" readonly class="form-control valid ValidTextSpecial" id="txt_total_descuento" name="txt_total_descuento" 
            value="0.00"  style="border-color:aquamarine"/>
            <?php }else{?>
            <input type="text" readonly class="form-control valid ValidTextSpecial" id="txt_total_descuento" name="txt_total_descuento"
            value="<?php echo $obj_cabecera_registro_venta->total_descuento;?>" style="border-color:aquamarine"/>
            <?php }?>
        </div>
    </div>

    <div class="col-4">
        <label for="txt_monto_total_descuento">Monto descuento total (USD)<i class="text-danger" title="Ingrese un Descuento">*</i></label>
        <label class="text-danger msj_txt_total_descuento"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <?php if($obj_cabecera_registro_venta->total_descuento==""){?>
            <input type="text" readonly class="form-control valid ValidTextSpecial" id="txt_monto_total_descuento" name="txt_monto_total_descuento" 
            value="0.00"  style="border-color:aquamarine"/>
            <?php }else{?>
            <input type="text" readonly class="form-control valid ValidTextSpecial" id="txt_monto_total_descuento" name="txt_monto_total_descuento"
            value="<?php echo $obj_cabecera_registro_venta->total_descuento;?>" style="border-color:aquamarine"/>
            <?php }?>
        </div>
    </div>

    <div class="col-4">
        <label for="txt_total">Total (USD)<i class="text-danger" title="Ingrese un Total">*</i></label>
        <label class="text-danger msj_txt_total"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <?php if($obj_cabecera_registro_venta->total==""){?>
            <input type="text" readonly class="form-control valid ValidTextSpecial" id="txt_total" name="txt_total" 
            value="0.00"  style="border-color:aquamarine"/>
            <?php }else{?>
            <input type="text" readonly class="form-control valid ValidTextSpecial" id="txt_total" name="txt_total" 
            value="<?php echo $obj_cabecera_registro_venta->total;?>"  style="border-color:aquamarine"/>
            <?php }?>
        </div>
    </div>    

    <div class="col-12">
        <label for="txt_observacion">Observación<i class="text-danger"></i></label>
        <label class="text-danger"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_cabecera_registro_venta->observacion; ?>"/>
        </div>
    </div>                     
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    $('#slt_pais_seleccionado').select2({
    theme: 'bootstrap4'
    });
    $('#slt_departamento_seleccionado').select2({
    theme: 'bootstrap4'
    });
    $('#slt_provincia_seleccionado').select2({
    theme: 'bootstrap4'
    });
    $('#slt_distrito_seleccionado').select2({
    theme: 'bootstrap4'
    });
    $('#slt_estado_registro_venta').select2({
    theme: 'bootstrap4'
    });
    $('#txt_fecha_pedido').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxDate :moment(),
        locale: {
        format: 'YYYY-MM-DD',
        }
    });
    $('#txt_fecha_entrega').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate :moment(),
        locale: {
        format: 'YYYY-MM-DD',
        }
    });


    <?php if($_REQUEST["id"]==0){?>
    $('#slt_producto').change();
    $('#slt_tipo_venta').change();
    <?php }?>
    
    <?php if($_REQUEST["id"]!=0 && $obj_detalle_registro_venta->id_tipo_venta==2){?>
    $('#slt_paquete').change();
    $('#slt_tipo_venta').change();
    <?php }?>

    
    $('#check_fec_entrega').change(function(){
    if($(this).is(':checked')) {
        $('#txt_fecha_entrega').prop('disabled', false);
    } else {    
        $('#txt_fecha_entrega').prop('disabled', true);
    }
    });
</script>