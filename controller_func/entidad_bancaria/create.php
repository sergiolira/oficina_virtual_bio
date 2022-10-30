<?php
include_once("../../model_class/entidad_bancaria.php");

$obj_e_ban = new entidad_bancaria();
$obj_e_ban->id_entidad_bancaria=$_REQUEST["id"];
$obj_e_ban->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_e_ban->id_entidad_bancaria; ?>">
                   
                   <div class="col-12">
                            <label for="txt_e_ban">Entidad bancaria<i class="text-danger" title="Ingrese entidad bancaria">*</i></label>
                            <label class="text-danger msj_txt_e_ban"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  id="txt_e_ban" name="txt_e_ban" value="<?php echo $obj_e_ban->entidad_bancaria; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>
