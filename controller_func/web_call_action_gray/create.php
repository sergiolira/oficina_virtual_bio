<?php
include_once("../../model_class/web_call_action_gray.php");
$obj_web_call_action_gray = new web_call_action_gray();
$obj_web_call_action_gray->id_web_call_action_gray=$_REQUEST["id"];
$obj_web_call_action_gray->consult();
?>
 <div class="row"> 
            <input type="hidden" name="id" value="<?php echo $obj_web_call_action_gray->id_web_call_action_gray; ?>">
            <div class="col-4">
                <label for="txt_titulo_h2">Título H2<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_titulo_h2"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_titulo_h2" name="txt_titulo_h2" value="<?php echo $obj_web_call_action_gray->titulo_h2; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_parrafo">Parrafo<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_parrafo"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_parrafo" name="txt_parrafo" value="<?php echo $obj_web_call_action_gray->parrafo; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_desc_boton">Desc_boton<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_desc_boton"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_desc_boton" name="txt_desc_boton" value="<?php echo $obj_web_call_action_gray->desc_boton; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_enlace">Enlace<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_enlace"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_enlace" name="txt_enlace" value="<?php echo $obj_web_call_action_gray->enlace; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                <label class="text-danger"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_web_call_action_gray->observacion; ?>"/>
                </div>
            </div> 
        
            <div class="col-12">
                <br><center><div class="card card-outline card-success"><strong>Gestión  de Archivos</strong></div></center>
            </div> 
            <div class="col-6">
                    <label for="input_archivo">Imagen
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-input_archivo"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="input_archivo" name="input_archivo" type="file" accept="image/*">
                        </div>
                    </div>
            </div>                 
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    $("#input_archivo").fileinput({
    language: 'es',
    fileType: "fas",
    showUpload: false,
    dropZoneEnabled: false,
    showRemove: false,
    maxFileCount: 1,
    fileActionSettings: {
      showRemove: false,
      showUpload: false,
      showZoom: false,
      showDrag: false,}
    });
</script>