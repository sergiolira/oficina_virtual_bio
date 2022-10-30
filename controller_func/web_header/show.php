<?php
include_once("../../model_class/web_header.php");

$obj_w_h = new web_header();

$obj_w_h->id_web_header=$_REQUEST["id"];
$obj_w_h->consult();


if($obj_w_h->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
  <input type="hidden" name="id" value="<?php echo $obj_w_h->id_web_header; ?>">
                   
                   <div class="col-4">
                            <label for="txt_m_c">Marca comercial<i class="text-danger" title="Ingrese Marca comercial">*</i></label>
                            <label class="text-danger msj_txt_m_c"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_m_c" name="txt_m_c" 
                              value="<?php echo $obj_w_h->marca_comercial; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_l">Logo<i class="text-danger" title="Ingrese logo">*</i></label>
                            <label class="text-danger msj_txt_l"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_l" name="txt_l" 
                              value="<?php echo $obj_w_h->logo; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_l_b">Logo blanco<i class="text-danger" title="Ingrese logo blanco">*</i></label>
                            <label class="text-danger msj_txt_l_b"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_l_b" name="txt_l_b" 
                              value="<?php echo $obj_w_h->logo_blanco; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_l_f">Logo footer<i class="text-danger" title="Ingrese logo footer">*</i></label>
                            <label class="text-danger msj_txt_l_f"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_l_f" name="txt_l_f" 
                              value="<?php echo $obj_w_h->logo_footer; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_c1">Celular 1<i class="text-danger" title="Ingrese celular1">*</i></label>
                            <label class="text-danger msj_txt_c1"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_c1" name="txt_c1" 
                              value="<?php echo $obj_w_h->celular1; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_c2">Celular 2<i class="text-danger" title="Ingrese celular2">*</i></label>
                            <label class="text-danger msj_txt_c2"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_c2" name="txt_c2" 
                              value="<?php echo $obj_w_h->celular2; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_r_s">Razon social<i class="text-danger" title="Ingrese razon social">*</i></label>
                            <label class="text-danger msj_txt_r_s"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_r_s" name="txt_r_s" 
                              value="<?php echo $obj_w_h->razon_social; ?>" disabled/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_r">Ruc<i class="text-danger" title="Ingrese celular2">*</i></label>
                            <label class="text-danger msj_txt_r"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_r" name="txt_r" 
                              value="<?php echo $obj_w_h->ruc; ?>" disabled/>
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
                              value="<?php echo $obj_w_h->observacion; ?>" disabled/>
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
                              <input type="text" class="form-control"  value="<?php echo $obj_w_h->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha de creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_w_h->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_w_h->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_w_h->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>