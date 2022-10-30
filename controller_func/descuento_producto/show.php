<?php
include_once("../../model_class/descuento_producto.php");
include_once("../../model_class/tipo_licencia.php");
include_once("../../model_class/producto.php");
$obj_d_p = new descuento_producto();
$obj_t_d= new tipo_descuento();
$obj_pro= new producto();

$obj_d_p->id_descuento_producto=$_REQUEST["id"];
$obj_d_p->consult();

if($obj_d_p->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
                          <input type="hidden" name="id" value="<?php echo $obj_d_p->id_descuento_producto; ?>">
                    <div class="col-4">
                            <label for="slt_t_d">Tipo de descuento<i class="text-danger" title="Ingrese el tipo de descuento">*</i></label>
                            <label class="text-danger msj_slt_t_d"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <select class="form-control select_t_d" name="slt_t_d" id="slt_t_d" disabled>
                              <option value="0">SELECCIONAR</option>
                                <?php $res= $obj_t_d->combo();
                                while($fila= mysqli_fetch_assoc($res)){  ?>
                                <option <?php if($obj_d_p->id_tipo_descuento==$fila["id_tipo_descuento"]){ echo "selected"; }?> 
                                value="<?php echo $fila["id_tipo_descuento"]; ?>"><?php echo $fila["tipo_descuento"]; ?></option>
                                <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_monto">Monto de descuento<i class="text-danger" title="Ingrese el monto">*</i></label>
                            <label class="text-danger msj_txt_monto"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validNumberD"  id="txt_monto" name="txt_monto" 
                              value="<?php echo $obj_d_p->monto; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_i">Fecha de inicio<i class="text-danger" title="Ingrese una fecha de inicio">*</i></label>
                            <label class="text-danger msj_txt_f_i"></label>
                           <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>      
                              <?php if($_REQUEST["id"]>0){?>                       
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_i" name="txt_f_i" 
                              value="<?php echo  date('Y-m-d',strtotime($obj_d_p->fecha_inicio));?>" disabled/>                          
                              <?php }else{?>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_i" name="txt_f_i" 
                              value="<?php echo date('Y-m-d');?>" disabled/>
                                <?php }?>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_f">Fecha final<i class="text-danger" title="Ingrese una fecha fin">*</i></label>
                            <label class="text-danger msj_txt_f_f"></label>
                           <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>      
                              <?php if($_REQUEST["id"]>0){?>                       
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_f" name="txt_f_f" 
                              value="<?php echo  date('Y-m-d',strtotime($obj_d_p->fecha_fin));?>" disabled/>                          
                              <?php }else{?>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_f" name="txt_f_f" 
                              value="<?php echo date('Y-m-d');?>" disabled/>
                                <?php }?>
                            </div>
                   </div>
                   
                   <div class="col-4">
                            <label for="slt_pro">Producto a descontar<i class="text-danger" title="Ingrese el producto">*</i></label>
                            <label class="text-danger msj_slt_pro"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <select class="form-control select_pro" name="slt_pro" id="slt_pro" disabled>
                              <option value="0">SELECCIONAR</option>
                                <?php $res= $obj_pro->combo();
                                while($fila= mysqli_fetch_assoc($res)){  ?>
                                <option <?php if($obj_d_p->id_producto==$fila["id_producto"]){ echo "selected"; }?> 
                                value="<?php echo $fila["id_producto"]; ?>"><?php echo $fila["producto"]; ?></option>
                                <?php }?>
                                        
                              </select>
                            </div>
                   </div>

                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese una observacion"></i></label>
                            <label class="text-danger msj_txt_obs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_obs" name="txt_obs" 
                              value="<?php echo $obj_d_p->observacion; ?>" disabled/>
                          </div>
                   </div>

                   <div class="col-4">
                         <label for="txt_obs">Estado<label class="text-danger msj-txt-inf"></label>  </label>
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
                              <input type="text" class="form-control"  value="<?php echo $obj_d_p->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha de creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_d_p->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_d_p->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_d_p->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>