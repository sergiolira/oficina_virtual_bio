<?php
include_once("../../model_class/web_home_video.php");
$obj_web_home_video= new web_home_video();
$obj_web_home_video->id_web_home_video=$_REQUEST["id"];
$obj_web_home_video->consult();
?>
 <div class="row"> 
            <input type="hidden" name="id" value="<?php echo $obj_web_home_video->id_web_home_video; ?>">
            <div class="col-4">
                <label for="txt_titulo_h2">Título H2<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_titulo_h2"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_titulo_h2" name="txt_titulo_h2" value="<?php echo $obj_web_home_video->titulo_h2; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_parrafo">Párrafo<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_parrafo"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_parrafo" name="txt_parrafo" value="<?php echo $obj_web_home_video->parrafo; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                <label class="text-danger"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_web_home_video->observacion; ?>"/>
                </div>
            </div> 
        
            <div class="col-12">
                <br><center><div class="card card-outline card-success"><strong>Gestión  de Archivos</strong></div></center>
            </div> 

            <div class="col-4">
                    <label for="input_imagen_poster">Imagen Poster
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-input_imagen_poster"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="input_imagen_poster" name="input_imagen_poster" type="file" accept="image/*">
                        </div>
                    </div>
            </div>  
            <div class="col-4">
                    <label for="input_imagen_fondo">Imagen Fondo
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-input_imagen_fondo"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="input_imagen_fondo" name="input_imagen_fondo" type="file" accept="image/*">
                        </div>
                    </div>
            </div>    
            <div class="col-4">
                    <label for="input_video">Video (MP4)
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-input_video"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="input_video" name="input_video" type="file" accept="video/*">
                        </div>
                    </div>
            </div>                 
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    $("#input_imagen_poster").fileinput({
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
    $("#input_imagen_fondo").fileinput({
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
    $("#input_video").fileinput({
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