<?php
include_once("../../model_class/estado_contrato.php");

$obj_e_con = new estado_contrato();
$obj_e_con->id_estado_contrato=$_REQUEST["id"];
$obj_e_con->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_e_con->id_estado_contrato; ?>">
                   
                   <div class="col-12">
                            <label for="txt_e_con">Estado de contrato<i class="text-danger" title="Ingrese estado de contrato">*</i></label>
                            <label class="text-danger msj_txt_e_con"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  
                              id="txt_e_con" name="txt_e_con" value="<?php echo $obj_e_con->estado_contrato; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>