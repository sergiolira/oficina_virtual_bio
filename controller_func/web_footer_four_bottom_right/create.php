<?php
include_once("../../model_class/web_footer_four_bottom_right.php");

$obj_wffbr = new web_footer_four_bottom_right();

$obj_wffbr->id_web_footer_four_bottom_right=$_REQUEST["id"];
$obj_wffbr->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_wffbr->id_web_footer_four_bottom_right; ?>">
                   
                   <div class="col-4">
                            <label for="txt_wffbr">Web footer four b.r.<i class="text-danger" title="Ingrese web red social">*</i></label>
                            <label class="text-danger msj_txt_wffbr"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_wffbr" name="txt_wffbr" 
                              value="<?php echo $obj_wffbr->web_footer_four_bottom_right; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_enlace">Enlace<i class="text-danger" title="Ingrese enlace">*</i></label>
                            <label class="text-danger msj_txt_enlace"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid " id="txt_enlace" 
                              name="txt_enlace" value="<?php echo $obj_wffbr->enlace; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_imagen">Imagen<i class="text-danger" title="Ingrese imagen">*</i></label>
                            <label class="text-danger msj_txt_imagen"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial" id="txt_imagen" 
                              name="txt_imagen" value="<?php echo $obj_wffbr->imagen; ?>"/>
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
                              value="<?php echo $obj_wffbr->observacion; ?>"/>
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
