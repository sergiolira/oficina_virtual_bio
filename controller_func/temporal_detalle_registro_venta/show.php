<?php
include_once("../../model_class/tipo_venta.php");
include_once("../../model_class/temporal_detalle_registro_venta.php");
include_once("../../model_class/producto.php");
include_once("../../model_class/paquete_producto_cabecera.php");
include_once("../../model_class/descuento_producto.php");
$obj_temporal_detalle_registro_venta= new temporal_detalle_registro_venta();
$obj_tipo_venta= new tipo_venta();
$obj_producto = new producto();
$obj_descuento_producto = new descuento_producto();
$obj_paquete_producto_cabecera = new paquete_producto_cabecera();
$obj_temporal_detalle_registro_venta->id_temporal_detalle_registro_venta=$_REQUEST["id"];
$obj_temporal_detalle_registro_venta->consult();

if($obj_temporal_detalle_registro_venta->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 
?>
<div class="row"> 
                <input type="hidden" name="id" value="<?php echo $obj_temporal_detalle_registro_venta->id_temporal_detalle_registro_venta; ?>">
                    <div class="col-4">
                        <label for="slt_tipo_venta">Tipo de Venta<i class="text-danger" title="Seleccione País">*</i> </label>
                        <label class="text-danger msj-slt_tipo_venta"></label>
                        <div div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                        </div>
                        <select class="form-control" name="slt_tipo_venta" id="slt_tipo_venta">
                            <option value="0">SELECCIONAR TIPO DE VENTA</option>            
                            <?php $rs_tipo_venta=$obj_tipo_venta->combo();
                                while($fila_p=mysqli_fetch_assoc($rs_tipo_venta)){
                            ?>
                        <option <?php if($obj_temporal_detalle_registro_venta->id_tipo_venta==$fila_p["id_tipo_venta"]){ echo "selected";}?> value="<?php echo $fila_p["id_tipo_venta"]?>"><?php echo $fila_p["tipo_venta"]?></option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="slt_producto">Producto<i class="text-danger" title="Seleccione País">*</i> </label>
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
                            <option <?php if($obj_temporal_detalle_registro_venta->id_producto==$fila_p["id_producto"]){ echo "selected";}?> value="<?php echo $fila_p["id_producto"]?>"><?php echo $fila_p["nombre_producto"]?></option>
                                <?php }?>
                        </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="slt_paquete">Paquete<i class="text-danger" title="Seleccione País">*</i> </label>
                        <label class="text-danger msj-slt_paquete"></label>
                        <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                        </div>
                        <select class="form-control" name="slt_paquete" id="slt_paquete">
                            <option value="0">SELECCIONAR PAQUETE</option>            
                            <?php $rs_paquete=$obj_paquete_producto_cabecera->combo();
                                while($fila_p=mysqli_fetch_assoc($rs_paquete)){
                            ?>
                            <option <?php if($obj_temporal_detalle_registro_venta->id_paquete==$fila_p["id_paquete_producto_cabecera"]){ echo "selected";}?> value="<?php echo $fila_p["id_paquete_producto_cabecera"]?>"><?php echo $fila_p["nombre_paquete"]?></option>
                                <?php }?>
                        </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="txt_cantidad">Cantidad<i class="text-danger"></i></label>
                        <label class="text-danger msj_txt_monto"></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                            </div>
                            <input type="number" class="form-control valid validNumber"  id="txt_cantidad" name="txt_cantidad" value="<?php echo $obj_temporal_detalle_registro_venta->cantidad; ?>"/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="txt_precio_unitario">Precio Unitario<i class="text-danger"></i></label>
                        <label class="text-danger msj_txt_monto"></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                            </div>
                            <input type="number" class="form-control valid validNumber"  id="txt_precio_unitario" name="txt_precio_unitario" value="<?php echo $obj_temporal_detalle_registro_venta->precio_unitario; ?>"/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="slt_descuento">Descuento Producto<i class="text-danger" title="Seleccione País">*</i> </label>
                        <label class="text-danger msj-slt_descuento"></label>
                        <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                        </div>
                        <select class="form-control" name="slt_descuento" id="slt_descuento">
                            <option value="0">SELECCIONAR DESCUENTO</option>            
                            <?php $rs_descuento=$obj_descuento_producto->combo();
                                while($fila_p=mysqli_fetch_assoc($rs_descuento)){
                            ?>
                            <option <?php if($obj_temporal_detalle_registro_venta->id_descuento_producto==$fila_p["id_descuento_producto"]){ echo "selected";}?> value="<?php echo $fila_p["id_descuento_producto"]?>"><?php echo $fila_p["monto"]?></option>
                                <?php }?>
                        </select>
                        </div>
                    </div>     
                    <div class="col-4">
                        <label for="txt_sub_total">Sub Total<i class="text-danger"></i></label>
                        <label class="text-danger msj_txt_monto"></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                            </div>
                            <input type="number" class="form-control valid validNumber"  id="txt_sub_total" name="txt_sub_total" value="<?php echo $obj_temporal_detalle_registro_venta->sub_total; ?>"/>
                        </div>
                    </div>  
                   <div class="col-4">
                            <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                            <label class="text-danger"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_temporal_detalle_registro_venta->observacion; ?>"/>
                          </div>
                   </div>   
                   <div class="col-4">
                         <label for="txt_estado">Estado<label class="text-danger msj-txt-inf"></label>  </label>
                         <div class="input-group mb-2">
                          <div class="input-group-prepend ">
                            <span class="input-group-text"><?php echo $ico; ?></i></span>
                          </div>
                             <input type="text" class="form-control" value="<?php echo $estado; ?>"/>
                         </div>
                   </div>
                   <div class="col-4">
                            <label >Última actualización</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_temporal_detalle_registro_venta->fechaactualiza; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Fecha creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_temporal_detalle_registro_venta->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_temporal_detalle_registro_venta->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_temporal_detalle_registro_venta->id_usuarioregistro; ?>"/>
                          </div>
                   </div>  
</div>