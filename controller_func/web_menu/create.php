<?php
include_once("../../model_class/web_menu.php");

$obj_web_menu = new web_menu();
$obj_web_menu->id_web_menu=$_REQUEST["id"];
$obj_web_menu->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_web_menu->id_web_menu; ?>">
                   
                   <div class="col-4">
                            <label for="txt_web_menu">Web del menu<i class="text-danger" title="Ingrese la web del menu">*</i></label>
                            <label class="text-danger msj_txt_web_menu"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  id="txt_web_menu" name="txt_web_menu" value="<?php echo $obj_web_menu->web_menu; ?>"/>
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
                              value="<?php echo $obj_web_menu->enlace; ?>"/>
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
                              value="<?php echo $obj_web_menu->observacion; ?>"/>
                          </div>
                   </div>
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>
