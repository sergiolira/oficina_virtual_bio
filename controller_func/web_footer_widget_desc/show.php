<?php
include_once("../../model_class/web_footer_widget.php");
include_once("../../model_class/web_footer_widget_desc.php");
$obj_wfw = new web_footer_widget();
$obj_wfwd = new web_footer_widget_desc();
$obj_wfwd->id_web_footer_widget_desc=$_REQUEST["id"];
$obj_wfwd->consult();

if($obj_wfwd->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
                
                   <input type="hidden" name="id" value="<?php echo $obj_wfwd->id_web_footer_widget_desc; ?>">
                   
                   <div class="col-4">
                            <label for="txt_wfwd">Web footer widget desc<i class="text-danger" title="Ingrese el Web footer widget desc">*</i></label>
                            <label class="text-danger msj_txt_wfwd"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  id="txt_wfwd" name="txt_wfwd" 
                              value="<?php echo $obj_wfwd->web_footer_widget_desc; ?>" disabled/>
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
                              value="<?php echo $obj_wfwd->enlace; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_wfw">Web footer widget<i class="text-danger" title="Ingrese Web footer widget">*</i></label>
                            <label class="text-danger msj_txt_wfw"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_wfw" name="slt_wfw" id="slt_wfw" disabled>
                              <option value="0">SELECCIONAR</option>
                              <?php $res= $obj_wfw->combo();
                                    while($fila= mysqli_fetch_assoc($res)){  ?>
                                    <option <?php if($obj_wfwd->id_web_footer_widget==$fila["id_web_footer_widget"]){
                                        echo "selected"; }?> value="<?php echo $fila["id_web_footer_widget"]; ?>"><?php echo $fila["web_footer_widget"]; ?></option>
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
                              value="<?php echo $obj_wfwd->observacion; ?>"/>
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
                              <input type="text" class="form-control"  value="<?php echo $obj_wfwd->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha de creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_wfwd->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_wfwd->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_wfwd->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>