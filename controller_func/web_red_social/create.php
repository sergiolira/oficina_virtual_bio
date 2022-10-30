<?php
include_once("../../model_class/web_red_social.php");

$obj_wrs = new web_red_social();

$obj_wrs->id_web_red_social=$_REQUEST["id"];
$obj_wrs->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_wrs->id_web_red_social; ?>">
                   
                   <div class="col-4">
                            <label for="txt_wrs">Web red social<i class="text-danger" title="Ingrese web red social">*</i></label>
                            <label class="text-danger msj_txt_wrs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_wrs" name="txt_wrs" 
                              value="<?php echo $obj_wrs->web_red_social; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_icono">Icono<i class="text-danger" title="Ingrese icono">*</i></label>
                            <label class="text-danger msj_txt_icono"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial" id="txt_icono" 
                              name="txt_icono" value="<?php echo $obj_wrs->icono; ?>"/>
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
                              name="txt_enlace" value="<?php echo $obj_wrs->enlace; ?>"/>
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
                              value="<?php echo $obj_wrs->observacion; ?>"/>
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
