<?php
include_once("../../model_class/zona_supervision.php");

$obj_z_sup = new zona_supervision();
$obj_z_sup->id_zona_supervision=$_REQUEST["id"];
$obj_z_sup->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_z_sup->id_zona_supervision; ?>">
                   
                   <div class="col-12">
                            <label for="txt_z_sup">Zona de supervision<i class="text-danger" title="Ingrese zona de supervision">*</i></label>
                            <label class="text-danger msj_txt_z_sup"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  id="txt_z_sup" name="txt_z_sup" value="<?php echo $obj_z_sup->zona_supervision; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>
