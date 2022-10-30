<?php
include_once("../../model_class/web_home_five_service.php");
$obj_web_home_five_service = new web_home_five_service();
$obj_web_home_five_service->id_web_home_five_service=$_REQUEST["id"];
$obj_web_home_five_service->consult();
if($obj_web_home_five_service->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 
?>
<div class="row"> 
                <input type="hidden" name="id" value="<?php echo $obj_web_home_five_service->id_web_home_five_service; ?>">
                <div class="col-4">
                    <label for="txt_titulo_h2">Título H3<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_titulo_h2"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_titulo_h2" name="txt_titulo_h2" value="<?php echo $obj_web_home_five_service->titulo_h3; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_parrafo">Parrafo<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_parrafo"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_parrafo" name="txt_parrafo" value="<?php echo $obj_web_home_five_service->parrafo; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_desc_boton">Desc_boton<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_desc_boton"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_desc_boton" name="txt_desc_boton" value="<?php echo $obj_web_home_five_service->desc_boton; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_desc_boton">Enlace<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_desc_boton"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_desc_boton" name="txt_desc_boton" value="<?php echo $obj_web_home_five_service->enlace; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_span_producto">Tipo<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_span_producto"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_span_producto" name="txt_span_producto" value="<?php echo $obj_web_home_five_service->tipo; ?>"/>
                    </div>
                </div>
                   <div class="col-4">
                            <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                            <label class="text-danger"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_web_home_five_service->observacion; ?>"/>
                          </div>
                   </div>   
                   <div class="col-4">
                    <label for="txt_parrafo">Ruta archivo<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_parrafo"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_parrafo" name="txt_parrafo" value="<?php echo $obj_web_home_five_service->imagen; ?>"/>
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
                              value="<?php echo $obj_web_home_five_service->fechaactualiza; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Fecha creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_home_five_service->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_home_five_service->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_home_five_service->id_usuarioregistro; ?>"/>
                          </div>
                   </div>  
</div>