<?php
include_once("../../model_class/financiado.php");

$obj_financiado = new financiado();
$obj_financiado->id_financiado=$_REQUEST["id"];
$obj_financiado->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_financiado->id_financiado; ?>">
                   
                   <div class="col-4">
                            <label for="txt_finan">Financiado<i class="text-danger" title="Ingrese financiado">*</i></label>
                            <label class="text-danger msj_txt_finan"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText" id="txt_finan" name="txt_finan" value="<?php echo $obj_financiado->financiado; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese una observacion"></i></label>
                            <label class="text-danger msj_txt_obs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_obs" name="txt_obs" value="<?php echo $obj_financiado->observacion; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>