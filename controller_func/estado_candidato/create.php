<?php
include_once("../../model_class/estado_candidato.php");

$obj_e_can = new estado_candidato();
$obj_e_can->id_estado_candidato=$_REQUEST["id"];
$obj_e_can->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_e_can->id_estado_candidato; ?>">
                   
                   <div class="col-12">
                            <label for="txt_e_can">Estado candidato<i class="text-danger" title="Ingrese estado candidato">*</i></label>
                            <label class="text-danger msj_txt_e_can"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  
                              id="txt_e_can" name="txt_e_can" value="<?php echo $obj_e_can->estado_candidato; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>    
    fntValidText();
    fntValidTextSpecial();
</script>