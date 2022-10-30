<?php
include_once("../../model_class/web_testimonio.php");
$obj_web_testimonio= new web_testimonio();
$obj_web_testimonio->id_web_testimonio=$_REQUEST["id"];
$obj_web_testimonio->consult();
?>
 <div class="row"> 
            <input type="hidden" name="id" value="<?php echo $obj_web_testimonio->id_web_testimonio; ?>">
            <div class="col-4">
                <label for="txt_testimonio">Testimonio<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_testimonio"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_testimonio" name="txt_testimonio" value="<?php echo $obj_web_testimonio->testimonio; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_nombre">Nombre<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_nombre"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_nombre" name="txt_nombre" value="<?php echo $obj_web_testimonio->nombre; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_ape_paterno">Apellido paterno<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_ape_paterno"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_ape_paterno" name="txt_ape_paterno" value="<?php echo $obj_web_testimonio->apellido_paterno; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_ape_materno">Apellido materno<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_ape_materno"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_ape_materno" name="txt_ape_materno" value="<?php echo $obj_web_testimonio->apellido_materno; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_cargo">Cargo<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_cargo"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_cargo" name="txt_cargo" value="<?php echo $obj_web_testimonio->cargo; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                <label class="text-danger"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_web_testimonio->observacion; ?>"/>
                </div>
            </div> 
        
            <div class="col-12">
                <br><center><div class="card card-outline card-success"><strong>Gestión  de Archivos</strong></div></center>
            </div> 

            <div class="col-4">
                    <label for="file_perfil">Foto de perfil (Imagen)
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-file_perfil"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="file_perfil" name="file_perfil" type="file" accept="image/*">
                        </div>
                    </div>
            </div>
            <div class="col-4">
                    <label for="file_img_poster">Imagen Poster (Imagen)
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-file_img_poster"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="file_img_poster" name="file_img_poster" type="file" accept="image/*">
                        </div>
                    </div>
            </div>    
            <div class="col-4">
                    <label for="file_video">Video (MP4)
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-file_video"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="file_video" name="file_video" type="file" accept="video/*">
                        </div>
                    </div>
            </div>               
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    
    $("#file_perfil").fileinput({
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
    $("#file_img_poster").fileinput({
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
    $("#file_video").fileinput({
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