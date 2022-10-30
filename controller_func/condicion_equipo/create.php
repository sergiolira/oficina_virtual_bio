<?php
include_once("../../model_class/condicion_equipo.php");

$obj_c_e = new condicion_equipo();
$obj_c_e->id_condicion_equipo=$_REQUEST["id"];
$obj_c_e->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_c_e->id_condicion_equipo; ?>">
                   
                   <div class="col-12">
                            <label for="txt_m_e">Condición de Equipo<i class="text-danger" title="Ingrese condición de equipo">*</i></label>
                            <label class="text-danger msj_txt_c_e"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  
                              id="txt_c_e" name="txt_c_e" value="<?php echo $obj_c_e->condicion_equipo; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>