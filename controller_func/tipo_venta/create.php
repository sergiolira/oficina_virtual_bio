<?php
include_once("../../model_class/tipo_venta.php");
$obj_tipo_venta= new tipo_venta();
$obj_tipo_venta->id_tipo_venta=$_REQUEST["id"];
$obj_tipo_venta->consult();
?>
 <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_tipo_venta->id_tipo_venta; ?>">
                   <div class="col-4">
                            <label for="txt_tipo_venta">Tipo de Venta<i class="text-danger" title="Ingrese Tipo de venta">*</i></label>
                            <label class="text-danger msj_txt_tipo_venta"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_tipo_venta" name="txt_tipo_venta" value="<?php echo $obj_tipo_venta->tipo_venta; ?>"/>
                          </div>
                   </div>   
                   <div class="col-4">
                            <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                            <label class="text-danger"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_tipo_venta->observacion; ?>"/>
                          </div>
                   </div>                    
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
</script>