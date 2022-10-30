<?php
include_once("../../model_class/web_home_offer.php");
$obj_web_home_offer= new web_home_offer();
$obj_web_home_offer->id_web_home_offer=$_REQUEST["id"];
$obj_web_home_offer->consult();
?>
 <div class="row"> 
            <input type="hidden" name="id" value="<?php echo $obj_web_home_offer->id_web_home_offer; ?>">
            <div class="col-4">
                <label for="txt_titulo_h2">Título H2<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_titulo_h2"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_titulo_h2" name="txt_titulo_h2" value="<?php echo $obj_web_home_offer->titulo_h2; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_parrafo">Párrafo<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_parrafo"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_parrafo" name="txt_parrafo" value="<?php echo $obj_web_home_offer->parrafo; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_desc_boton">Desc_boton<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_desc_boton"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_desc_boton" name="txt_desc_boton" value="<?php echo $obj_web_home_offer->desc_boton; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_span_producto">Span producto<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_span_producto"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_span_producto" name="txt_span_producto" value="<?php echo $obj_web_home_offer->span_producto; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_enlace">Enlace<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_enlace"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_enlace" name="txt_enlace" value="<?php echo $obj_web_home_offer->enlace; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                <label class="text-danger"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_web_home_offer->observacion; ?>"/>
                </div>
            </div> 
        
            <div class="col-12">
                <br><center><div class="card card-outline card-success"><strong>Gestión  de Archivos</strong></div></center>
            </div> 

            <div class="col-6">
                    <label for="input_imagen_producto">Imagen Producto
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-input_imagen_producto"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="input_imagen_producto" name="input_imagen_producto" type="file" accept="image/*">
                        </div>
                    </div>
            </div>  
            <div class="col-6">
                    <label for="input_imagen_mujer">Imagen Mujer
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-input_imagen_mujer"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="input_imagen_mujer" name="input_imagen_mujer" type="file" accept="image/*">
                        </div>
                    </div>
            </div>               
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    $("#input_imagen_producto").fileinput({
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
    $("#input_imagen_mujer").fileinput({
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