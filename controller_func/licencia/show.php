<?php
include_once("../../model_class/licencia.php");
include_once("../../model_class/tipo_licencia.php");
$obj_tlic= new tipo_licencia();
$obj_lic = new licencia();
$obj_lic->id_licencia=$_REQUEST["id"];
$obj_lic->consult();

if($obj_lic->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_lic->id_licencia; ?>">
                   
                   <div class="col-4">
                            <label for="txt_lic">Licencia<i class="text-danger" title="Ingrese la licencia"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_lic" name="txt_lic" 
                              value="<?php echo $obj_lic->licencia; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_t_lic">Tipo de licencia<i class="text-danger" title="Ingrese el tipo de licencia"></i></label>
                            <label class="text-danger msj_txt_t_lic"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <select class="form-control select_t_lic" name="slt_t_lic" id="slt_t_lic" disabled>
                              <option value="0">SELECCIONAR</option>
                                <?php $res= $obj_tlic->combo();
                                while($fila= mysqli_fetch_assoc($res)){  ?>
                                <option <?php if($obj_lic->id_tipo_licencia==$fila["id_tipo_licencia"]){ echo "selected"; }?> 
                                value="<?php echo $fila["id_tipo_licencia"]; ?>"><?php echo $fila["tipo_licencia"]; ?></option>
                                <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_cod">Codigo<i class="text-danger" title="Ingrese cod"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_cod" name="txt_cod" 
                              value="<?php echo $obj_lic->codigo; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_stock">Stock<i class="text-danger" title="Ingrese stock"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_stock" name="txt_stock" 
                              value="<?php echo $obj_lic->stock; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese obs"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_obs" name="txt_obs" value="<?php echo $obj_lic->observacion; ?>"/>
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
                              <input type="text" class="form-control"  value="<?php echo $obj_lic->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha de creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_lic->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_lic->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_lic->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>