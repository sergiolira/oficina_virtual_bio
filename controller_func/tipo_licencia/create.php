<?php
include_once("../../model_class/tipo_licencia.php");
$obj_tipo_lic = new tipo_licencia();
$obj_tipo_lic->id_tipo_licencia=$_REQUEST["id"];
$obj_tipo_lic->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_tipo_lic->id_tipo_licencia; ?>">
                   
                   <div class="col-12">
                            <label for="txt_m_e">Tipo de Licencia<i class="text-danger" title="Ingrese tipo de licencia">*</i></label>
                            <label class="text-danger msj_txt_tipo_lic"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  
                              id="txt_tipo_lic" name="txt_tipo_lic" value="<?php echo $obj_tipo_lic->tipo_licencia; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>