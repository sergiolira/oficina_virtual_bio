<?php
include_once("../../model_class/tipo_venta.php");
include_once("../../model_class/cabecera_registro_venta.php");
include_once("../../model_class/ubigeo_peru_departments.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
include_once("../../model_class/ubigeo_peru_districts.php");
include_once("../../model_class/estado_registro_venta.php");
include_once("../../model_class/pais.php");
$obj_cabecera_registro_venta= new cabecera_registro_venta();
$obj_dep= new ubigeo_peru_departments();
$obj_prov= new ubigeo_peru_provinces();
$obj_dist= new ubigeo_peru_districts();
$obj_tipo_venta= new tipo_venta();
$obj_pais = new pais();
$obj_estado_registro_venta = new estado_registro_venta();
$obj_cabecera_registro_venta->id_cabecera_registro_venta=$_REQUEST["id"];
$obj_cabecera_registro_venta->consult();
if($obj_cabecera_registro_venta->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 
?>
<div class="row"> 
                <input type="hidden" name="id" value="<?php echo $obj_cabecera_registro_venta->id_estado_registro_venta; ?>">
                <div class="col-4">
                    <label for="txt_fecha_pedido">Fecha Pedido<i class="text-danger" title="Ingrese Fecha Pedido">*</i></label>
                    <label class="text-danger msj_txt_fecha_pedido"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <?php if($_REQUEST["id"]>0){?>                       
                            <input type="text" class="form-control valid ValidTextSpecial"  id="txt_fecha_pedido" name="txt_fecha_pedido" 
                            value="<?php echo  date('Y-m-d',strtotime($obj_cabecera_registro_venta->fecha_pedido));?>"/>                          
                        <?php }else{?>
                            <input type="text" class="form-control valid validNumber"  id="txt_fecha_pedido" name="txt_fecha_pedido" 
                            value="<?php echo date('Y-m-d');?>"/>
                        <?php }?>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_fecha_entrega">Fecha Entrega<i class="text-danger" title="Ingrese Fecha Vencimiento">*</i></label>
                    <label class="text-danger msj_txt_fecha_entrega"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <?php if($_REQUEST["id"]>0){?>                       
                            <input type="text" class="form-control valid ValidTextSpecial"  id="txt_fecha_entrega" name="txt_fecha_entrega" 
                            value="<?php echo  date('Y-m-d',strtotime($obj_cabecera_registro_venta->fecha_entrega));?>"/>                          
                        <?php }else{?>
                            <input type="text" class="form-control valid validNumber"  id="txt_fecha_entrega" name="txt_fecha_entrega" 
                            value="<?php echo date('Y-m-d');?>"/>
                        <?php }?>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_correo">Correo<i class="text-danger" title="Ingrese su correo electrónico">*</i> </label>
                    <label class="text-danger msj_txt_correo"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                        <span class="input-group-text"><i class="far fa-eye"></i></span>
                        </div>
                        <input type="email" class="form-control valid validEmail" id="txt_correo" name="txt_correo" value="<?php echo $obj_cabecera_registro_venta->correo;?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_numero_documento">Número de documento<i class="text-danger" title="Ingrese Número de documento">*</i></label>
                    <label class="text-danger msj_txt_num_document"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="number" class="form-control valid validNumber" id="txt_numero_documento" name="txt_numero_documento" value="<?php echo $obj_cabecera_registro_venta->nro_documento;?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_tipo_cliente">Tipo Cliente<i class="text-danger" title="Ingrese Tipo de Cliente">*</i></label>
                    <label class="text-danger msj_txt_tipo_cliente"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText" id="txt_tipo_cliente" name="txt_tipo_cliente" value="<?php echo $obj_cabecera_registro_venta->tipo_cliente;?>"/>
                    </div>
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
                <div class="col-4">
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
                <div class="col-4">
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
                <div class="col-4">
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
                <div class="col-4">
                    <label for="txt_direccion">Dirección<i class="text-danger" title="Ingrese Direccion">*</i></label>
                    <label class="text-danger msj_txt_direccion"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid ValidTextSpecial" id="txt_direccion" name="txt_direccion" value="<?php echo $obj_cabecera_registro_venta->direccion; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_referencia">Referencia<i class="text-danger" title="Ingrese Referencia">*</i></label>
                    <label class="text-danger msj_txt_referencia"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid ValidTextSpecial" id="txt_referencia" name="txt_referencia" value="<?php echo $obj_cabecera_registro_venta->referencia; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_enlace_ubigeo">Enlace Ubigeo<i class="text-danger" title="Ingrese Enlace Ubigeo">*</i></label>
                    <label class="text-danger msj_txt_enlace_ubigeo"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid ValidTextSpecial" id="txt_enlace_ubigeo" name="txt_enlace_ubigeo" value="<?php echo $obj_cabecera_registro_venta->enlace_ubigeo; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="slt_estado_registro_venta">Estado Registro Venta<i class="text-danger" title="Seleccione un estado de venta">*</i> </label>
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
                        <option <?php if($obj_cabecera_registro_venta->id_estado_registro_venta==$fila_p["id_estado_registro_venta"]){ echo "selected";}?> value="<?php echo $fila_p["id_estado_registro_venta"]?>"><?php echo $fila_p["estado_registro_venta"]?></option>
                            <?php }?>
                    </select>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_total_descuento">Total Descuento<i class="text-danger" title="Ingrese un Descuento">*</i></label>
                    <label class="text-danger msj_txt_total_descuento"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="number" class="form-control valid validNumber" id="txt_total_descuento" name="txt_total_descuento" value="<?php echo $obj_cabecera_registro_venta->total_descuento;?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_impuesto">Impuesto<i class="text-danger" title="Ingrese Impuestos">*</i></label>
                    <label class="text-danger msj_txt_impuesto"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="number" class="form-control valid validNumber" id="txt_impuesto" name="txt_impuesto" value="<?php echo $obj_cabecera_registro_venta->impuesto;?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_costo_envio">Costo Envio<i class="text-danger" title="Ingrese Costo de Envio">*</i></label>
                    <label class="text-danger msj_txt_costo_envio"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="number" class="form-control valid validNumber" id="txt_costo_envio" name="txt_costo_envio" value="<?php echo $obj_cabecera_registro_venta->costo_envio;?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_total">Total<i class="text-danger" title="Ingrese un Total">*</i></label>
                    <label class="text-danger msj_txt_total"></label>  
                    <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="number" class="form-control valid validNumber" id="txt_total" name="txt_total" value="<?php echo $obj_cabecera_registro_venta->total;?>"/>
                    </div>
                </div>
                   <div class="col-4">
                            <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                            <label class="text-danger"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_cabecera_registro_venta->observacion; ?>"/>
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
                              value="<?php echo $obj_cabecera_registro_venta->fechaactualiza; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Fecha creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_cabecera_registro_venta->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_cabecera_registro_venta->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_cabecera_registro_venta->id_usuarioregistro; ?>"/>
                          </div>
                   </div>  
</div>