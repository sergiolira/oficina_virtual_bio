<?php
include_once("../../model_class/web_home_pricing.php");
$obj_web_home_pricing= new web_home_pricing();
$obj_web_home_pricing->id_web_home_pricing=$_REQUEST["id"];
$obj_web_home_pricing->consult();
if($obj_web_home_pricing->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 
?>
<div class="row"> 
                <input type="hidden" name="id" value="<?php echo $obj_web_home_pricing->id_web_home_offer; ?>">
                <div class="col-4">
                    <label for="txt_titulo_h3">Título H3<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_titulo_h3"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_titulo_h3" name="txt_titulo_h3" value="<?php echo $obj_web_home_pricing->titulo_h3; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_span">Span <i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_span"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_span" name="txt_span" value="<?php echo $obj_web_home_pricing->span; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_icono">Icono<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_icono"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_icono" name="txt_icono" value="<?php echo $obj_web_home_pricing->icono; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_enlace">Enlace<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_enlace"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_enlace" name="txt_enlace" value="<?php echo $obj_web_home_pricing->enlace; ?>"/>
                    </div>
                </div>
                   <div class="col-4">
                            <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                            <label class="text-danger"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_web_home_pricing->observacion; ?>"/>
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
                              value="<?php echo $obj_web_home_pricing->fechaactualiza; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Fecha creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_home_pricing->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_home_pricing->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_home_pricing->id_usuarioregistro; ?>"/>
                          </div>
                   </div>  
</div>