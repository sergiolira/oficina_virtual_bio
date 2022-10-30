<?php
include_once("../../model_class/tipo_capacitacion.php");

$obj_t_c = new tipo_capacitacion();
$obj_t_c->id_tipo_capacitacion=$_REQUEST["id"];
$obj_t_c->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_t_c->id_tipo_capacitacion; ?>">
                   
                   <div class="col-12">
                            <label for="txt_t_c">Tipo de capacitacion<i class="text-danger" title="Ingrese tipo de capacitacion">*</i></label>
                            <label class="text-danger msj_txt_t_c"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  
                              id="txt_t_c" name="txt_t_c" value="<?php echo $obj_t_c->tipo_capacitacion; ?>"/>
                          </div>
                   </div>
                   
                   
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>