<?php
include_once("../../model_class/estado_conexion.php");

$obj_conexion = new estado_conexion();
$obj_conexion->id_estado_conexion=$_REQUEST["id"];
$obj_conexion->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_conexion->id_estado_conexion; ?>">
                   
                   <div class="col-4">
                            <label for="txt_econ">Estado conexión<i class="text-danger" title="Ingrese estado conexion">*</i></label>
                            <label class="text-danger msj_txt_econ"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validText"  id="txt_econ" name="txt_econ" value="<?php echo $obj_conexion->estado_conexion; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese una observacion"></i></label>
                            <label class="text-danger msj_txt_obs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_obs" name="txt_obs" value="<?php echo $obj_conexion->observacion; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>
    
    fntValidText();
    fntValidTextSpecial();

</script>