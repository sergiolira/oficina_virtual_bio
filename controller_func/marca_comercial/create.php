<?php
include_once("../../model_class/marca_comercial.php");

$obj_marca = new marca_comercial();
$obj_marca->id_marca_comercial=$_REQUEST["id"];
$obj_marca->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_marca->id_marca_comercial; ?>">
                   
                   <div class="col-4">
                            <label for="txt_mco">Marca comercial<i class="text-danger" title="Ingrese marca comercial">*</i></label>
                            <label class="text-danger msj_txt_mco"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  id="txt_mco" name="txt_mco" value="<?php echo $obj_marca->marca_comercial; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">


                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese una observacion">*</i></label>
                            <label class="text-danger msj_txt_obs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_obs" name="txt_obs" value="<?php echo $obj_marca->observacion; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>
