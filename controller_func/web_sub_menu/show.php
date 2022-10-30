<?php
include_once("../../model_class/web_menu.php");
include_once("../../model_class/web_sub_menu.php");
$obj_wm = new web_menu();
$obj_web_sm = new web_sub_menu();
$obj_web_sm->id_web_sub_menu=$_REQUEST["id"];
$obj_web_sm->consult();

if($obj_web_sm->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
                
                   <input type="hidden" name="id" value="<?php echo $obj_web_sm->id_web_sub_menu; ?>">
                   
                   <div class="col-4">
                            <label for="txt_web_sm">Web sub menu<i class="text-danger" title="Ingrese el web sub menu">*</i></label>
                            <label class="text-danger msj_txt_web_sm"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  id="txt_web_sm" name="txt_web_sm" 
                              value="<?php echo $obj_web_sm->web_sub_menu; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_enlace">Enlace<i class="text-danger" title="Ingrese el enlace">*</i></label>
                            <label class="text-danger msj_txt_enlace"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid "  id="txt_enlace" name="txt_enlace" 
                              value="<?php echo $obj_web_sm->enlace; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_wm">Web menu<i class="text-danger" title="Ingrese web menu">*</i></label>
                            <label class="text-danger msj_txt_wm"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_wm" name="slt_wm" id="slt_wm" disabled>
                              <option value="0">SELECCIONAR</option>
                              <?php $res= $obj_wm->combo();
                                    while($fila= mysqli_fetch_assoc($res)){  ?>
                                    <option <?php if($obj_web_sm->id_web_menu==$fila["id_web_menu"]){
                                        echo "selected"; }?> value="<?php echo $fila["id_web_menu"]; ?>"><?php echo $fila["web_menu"]; ?></option>
                                        <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese obs"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_obs" name="txt_obs" 
                              value="<?php echo $obj_web_sm->observacion; ?>"/>
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
                              <input type="text" class="form-control"  value="<?php echo $obj_web_sm->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha de creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_web_sm->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_web_sm->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_web_sm->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>