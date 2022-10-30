<?php
include_once("../../model_class/web_home_pricing.php");
$obj_web_home_pricing= new web_home_pricing();
$obj_web_home_pricing->id_web_home_pricing=$_REQUEST["id"];
$obj_web_home_pricing->consult();
?>
 <div class="row"> 
            <input type="hidden" name="id" value="<?php echo $obj_web_home_pricing->id_web_home_pricing; ?>">
            <div class="col-4">
                <label for="txt_titulo_h3">Título H3<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_titulo_h3"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_titulo_h3" name="txt_titulo_h3" value="<?php echo $obj_web_home_pricing->titulo_h3; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_span">Span <i class="text-danger"></i></label>
                <label class="text-danger msj_txt_span"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_span" name="txt_span" value="<?php echo $obj_web_home_pricing->span; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_icono">Icono<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_icono"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_icono" name="txt_icono" value="<?php echo $obj_web_home_pricing->icono; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_enlace">Enlace<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_enlace"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_enlace" name="txt_enlace" value="<?php echo $obj_web_home_pricing->enlace; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                <label class="text-danger"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_web_home_pricing->observacion; ?>"/>
                </div>
            </div>                
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
</script>