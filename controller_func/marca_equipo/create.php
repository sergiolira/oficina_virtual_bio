<?php
include_once("../../model_class/marca_equipo.php");

$obj_marca_e = new marca_equipo();
$obj_marca_e->id_marca_equipo=$_REQUEST["id"];
$obj_marca_e->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_marca_e->id_marca_equipo; ?>">
                   
                   <div class="col-12">
                            <label for="txt_m_e">Marca de equipo<i class="text-danger" title="Ingrese marca de equipo">*</i></label>
                            <label class="text-danger msj_txt_m_e"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  id="txt_m_e" name="txt_m_e" value="<?php echo $obj_marca_e->marca_equipo; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>
