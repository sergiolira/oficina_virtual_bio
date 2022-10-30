<?php
include_once("../../model_class/estado_programacion_charla.php");

$obj_e_p_c = new estado_programacion_charla();
$obj_e_p_c->id_estado_programacion_charla=$_REQUEST["id"];
$obj_e_p_c->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_e_p_c->id_estado_programacion_charla; ?>">
                   
                   <div class="col-12">
                            <label for="txt_e_p_c">Estado programacion charla<i class="text-danger" title="Ingrese estado programacion charla">*</i></label>
                            <label class="text-danger msj_txt_e_p_c"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  
                              id="txt_e_p_c" name="txt_e_p_c" value="<?php echo $obj_e_p_c->estado_programacion_charla; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>    
    fntValidText();
    fntValidTextSpecial();
</script>