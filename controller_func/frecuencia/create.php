<?php
include_once("../../model_class/frecuencia.php");

$obj_frecuencia = new frecuencia();
$obj_frecuencia->id_frecuencia=$_REQUEST["id"];
$obj_frecuencia->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_frecuencia->id_frecuencia; ?>">
                   
                   <div class="col-4">
                            <label for="txt_frec">Frecuencia<i class="text-danger" title="Ingrese frecuencia">*</i></label>
                            <label class="text-danger msj_txt_frec"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText" id="txt_frec" name="txt_frec" value="<?php echo $obj_frecuencia->frecuencia; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese una observacion"></i></label>
                            <label class="text-danger msj_txt_obs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_obs" name="txt_obs" value="<?php echo $obj_frecuencia->observacion; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>