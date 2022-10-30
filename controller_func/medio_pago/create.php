<?php
include_once("../../model_class/medio_pago.php");

$obj_medio = new medio_pago();
$obj_medio->id_medio_pago=$_REQUEST["id"];
$obj_medio->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_medio->id_medio_pago; ?>">
                   
                   <div class="col-4">
                            <label for="txt_mpago">Medio de pago<i class="text-danger" title="Ingrese medio pago">*</i></label>
                            <label class="text-danger msj_txt_mpago"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  id="txt_mpago" name="txt_mpago" value="<?php echo $obj_medio->medio_pago; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">

                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese una observacion"></i></label>
                            <label class="text-danger msj_txt_obs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_obs" name="txt_obs" value="<?php echo $obj_medio->observacion; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>