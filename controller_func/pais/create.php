<?php
include_once("../../model_class/pais.php");

$obj_pais = new pais();
$obj_pais->id_pais=$_REQUEST["id"];
$obj_pais->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_pais->id_pais; ?>">
                   
                   <div class="col-12">
                            <label for="txt_pais">País<i class="text-danger" title="Ingrese el país">*</i></label>
                            <label class="text-danger msj_txt_pais"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  id="txt_pais" name="txt_pais" value="<?php echo $obj_pais->pais; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>
