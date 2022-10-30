<?php
include_once("../../model_class/web_header.php");

$obj_w_h = new web_header();

$obj_w_h->id_web_header=$_REQUEST["id"];
$obj_w_h->consult();

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
                              value="<?php echo $obj_w_h->marca_comercial; ?>"/>
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
                              value="<?php echo $obj_w_h->logo; ?>"/>
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
                              value="<?php echo $obj_w_h->logo_blanco; ?>"/>
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
                              value="<?php echo $obj_w_h->logo_footer; ?>"/>
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
                              value="<?php echo $obj_w_h->celular1; ?>"/>
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
                              value="<?php echo $obj_w_h->celular2; ?>"/>
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
                              value="<?php echo $obj_w_h->razon_social; ?>"/>
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
                              value="<?php echo $obj_w_h->ruc; ?>"/>
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
                              value="<?php echo $obj_w_h->observacion; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>
 
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    fntValidNumberDecimal();

</script>
