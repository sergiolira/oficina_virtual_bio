<?php
include_once("../../model_class/web_footer_widget.php");

$obj_wfw = new web_footer_widget();

$obj_wfw->id_web_footer_widget=$_REQUEST["id"];
$obj_wfw->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_wfw->id_web_footer_widget; ?>">
                   
                   <div class="col-4">
                            <label for="txt_wfw">Web footer widget<i class="text-danger" title="Ingrese web footer widget">*</i></label>
                            <label class="text-danger msj_txt_wfw"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_wfw" name="txt_wfw" 
                              value="<?php echo $obj_wfw->web_footer_widget; ?>"/>
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
                              value="<?php echo $obj_wfw->observacion; ?>"/>
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
