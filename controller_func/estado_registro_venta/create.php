<?php
include_once("../../model_class/estado_registro_venta.php");
$obj_estado_registro_venta = new estado_registro_venta();
$obj_estado_registro_venta->id_estado_registro_venta =$_REQUEST["id"];
$obj_estado_registro_venta->consult();
?>
 <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_estado_registro_venta->id_estado_registro_venta; ?>">
                   <div class="col-4">
                            <label for="txt_estado_venta">Tipo de Venta<i class="text-danger" title="Ingrese Tipo de venta">*</i></label>
                            <label class="text-danger msj_txt_estado_venta"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_estado_venta" name="txt_estado_venta" value="<?php echo $obj_estado_registro_venta->estado_registro_venta; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                            <label class="text-danger"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_estado_registro_venta->observacion; ?>"/>
                          </div>
                   </div>                     
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
</script>