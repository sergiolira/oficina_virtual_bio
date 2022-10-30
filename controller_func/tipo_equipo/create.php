<?php
include_once("../../model_class/tipo_equipo.php");

$obj_tipo_e = new tipo_equipo();
$obj_tipo_e->id_tipo_equipo=$_REQUEST["id"];
$obj_tipo_e->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_tipo_e->id_tipo_equipo; ?>">
                   
                   <div class="col-12">
                            <label for="txt_tipo_e">Tipo de Equipo<i class="text-danger" title="Ingrese tipo de equipo">*</i></label>
                            <label class="text-danger msj_txt_tipo_e"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  
                              id="txt_tipo_e" name="txt_tipo_e" value="<?php echo $obj_tipo_e->tipo_equipo; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>