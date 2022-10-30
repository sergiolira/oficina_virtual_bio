<?php
include_once("../../model_class/web_banner_static_left.php");
$obj_web_banner_static_left= new web_banner_static_left();
$obj_web_banner_static_left->id_web_banner_static_left=$_REQUEST["id"];
$obj_web_banner_static_left->consult();
if($obj_web_banner_static_left->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 
?>
<div class="row"> 
                <input type="hidden" name="id" value="<?php echo $obj_web_banner_static_left->id_web_banner_static_left; ?>">

                <div class="col-4">
                    <label for="txt_titulo_h1">Título H1<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_titulo_h1"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_titulo_h1" name="txt_titulo_h1" value="<?php echo $obj_web_banner_static_left->titulo_h1; ?>"/>
                    </div>
                </div>

                <div class="col-4">
                    <label for="txt_titulo_span">Título Span<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_titulo_span"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_titulo_span" name="txt_titulo_span" value="<?php echo $obj_web_banner_static_left->titulo_span; ?>"/>
                    </div>
                </div>

                <div class="col-4">
                    <label for="txt_parrafo_uno">Párrafo uno<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_parrafo_uno"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_parrafo_uno" name="txt_parrafo_uno" value="<?php echo $obj_web_banner_static_left->parrafo_uno; ?>"/>
                    </div>
                </div>

                <div class="col-4">
                    <label for="txt_parrafo_dos">Párrafo dos<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_parrafo_dos"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_parrafo_dos" name="txt_parrafo_dos" value="<?php echo $obj_web_banner_static_left->parrafo_dos; ?>"/>
                    </div>
                </div>

                <div class="col-4">
                    <label for="txt_parrafo_tres">Párrafo tres<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_parrafo_tres"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_parrafo_tres" name="txt_parrafo_tres" value="<?php echo $obj_web_banner_static_left->parrafo_dos; ?>"/>
                    </div>
                </div>

                <div class="col-4">
                    <label for="txt_titulo_descarga">Título Descarga<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_titulo_descarga"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_titulo_descarga" name="txt_titulo_descarga" value="<?php echo $obj_web_banner_static_left->titulo_descarga; ?>"/>
                    </div>
                </div>

                <div class="col-4">
                    <label for="txt_descrip_descarga">Descripción Boton Descarga<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_descrip_descarga"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_descrip_descarga" name="txt_descrip_descarga" value="<?php echo $obj_web_banner_static_left->descripcion_boton_descarga; ?>"/>
                    </div>
                </div>
                   <div class="col-4">
                            <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                            <label class="text-danger"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_web_banner_static_left->observacion; ?>"/>
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
                              value="<?php echo $obj_web_banner_static_left->fechaactualiza; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Fecha creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_banner_static_left->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_banner_static_left->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_banner_static_left->id_usuarioregistro; ?>"/>
                          </div>
                   </div>  
</div>