<?php
include_once("../../model_class/web_footer_widget.php");

$obj_wfw = new web_footer_widget();

$obj_wfw->id_web_footer_widget=$_REQUEST["id"];
$obj_wfw->consult();


if($obj_wfw->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
  <input type="hidden" name="id" value="<?php echo $obj_wfw->id_web_footer_widget; ?>">
                   
                   <div class="col-4">
                            <label for="txt_wfw">Web red social<i class="text-danger" title="Ingrese web red social">*</i></label>
                            <label class="text-danger msj_txt_wfw"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_wfw" name="txt_wfw" 
                              value="<?php echo $obj_wfw->web_footer_widget; ?>" disabled/>
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
                              value="<?php echo $obj_wfw->observacion; ?>" disabled/>
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
                              <input type="text" class="form-control"  value="<?php echo $obj_wfw->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha de creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_wfw->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_wfw->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_wfw->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>