<?php
include_once("../../model_class/web_banner_static_left.php");
$obj_web_banner_static_left= new web_banner_static_left();
$obj_web_banner_static_left->id_web_banner_static_left=$_REQUEST["id"];
$obj_web_banner_static_left->consult();
?>
 <div class="row"> 
            <input type="hidden" name="id" value="<?php echo $obj_web_banner_static_left->id_web_banner_static_left; ?>">
           
            <div class="col-4">
                <label for="txt_titulo_h1">Título H1<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_titulo_h1"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_titulo_h1" name="txt_titulo_h1" value="<?php echo $obj_web_banner_static_left->titulo_h1; ?>"/>
                </div>
            </div>

            <div class="col-4">
                <label for="txt_titulo_span">Título Span<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_titulo_span"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_titulo_span" name="txt_titulo_span" value="<?php echo $obj_web_banner_static_left->titulo_span; ?>"/>
                </div>
            </div>

            <div class="col-4">
                <label for="txt_parrafo_uno">Párrafo uno<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_parrafo_uno"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_parrafo_uno" name="txt_parrafo_uno" value="<?php echo $obj_web_banner_static_left->parrafo_uno; ?>"/>
                </div>
            </div>

            <div class="col-4">
                <label for="txt_parrafo_dos">Párrafo dos<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_parrafo_dos"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_parrafo_dos" name="txt_parrafo_dos" value="<?php echo $obj_web_banner_static_left->parrafo_dos; ?>"/>
                </div>
            </div>

            <div class="col-4">
                <label for="txt_parrafo_tres">Párrafo tres<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_parrafo_tres"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_parrafo_tres" name="txt_parrafo_tres" value="<?php echo $obj_web_banner_static_left->parrafo_dos; ?>"/>
                </div>
            </div>

            <div class="col-4">
                <label for="txt_titulo_descarga">Título Descarga<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_titulo_descarga"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_titulo_descarga" name="txt_titulo_descarga" value="<?php echo $obj_web_banner_static_left->titulo_descarga; ?>"/>
                </div>
            </div>

            <div class="col-4">
                <label for="txt_descrip_descarga">Descripción Boton Descarga<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_descrip_descarga"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_descrip_descarga" name="txt_descrip_descarga" value="<?php echo $obj_web_banner_static_left->descripcion_boton_descarga; ?>"/>
                </div>
            </div>

            <div class="col-4">
                <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                <label class="text-danger"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_web_banner_static_left->observacion; ?>"/>
                </div>
            </div> 
        
            <div class="col-12">
                <br><center><div class="card card-outline card-success"><strong>Gestión  de Archivos</strong></div></center>
            </div> 

            <div class="col-4">
                    <label for="file_archivo_descarga">Archivo Descarga (PDF)
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-file_archivo_descarga"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="file_archivo_descarga" name="file_archivo_descarga" type="file" accept=".pdf">
                        </div>
                    </div>
            </div>

            <div class="col-4">
                    <label for="file_hombre">Imagen Hombre
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-file_hombre"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="file_hombre" name="file_hombre" type="file" accept="image/*">
                        </div>
                    </div>
            </div>

            <div class="col-4">
                    <label for="file_producto">Imagen Producto
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-file_producto"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="file_producto" name="file_producto" type="file" accept="image/*">
                        </div>
                    </div>
            </div>
            <div class="col-4">
                    <label for="file_circulo">Imagen Circulo
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-file_circulo"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="file_circulo" name="file_circulo" type="file" accept="image/*">
                        </div>
                    </div>
            </div>    
            <div class="col-4">
                    <label for="file_fondo">Imagen Fondo
                    <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
                    <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
                    </label>
                    <label class="text-danger msj-file_fondo"></label>
                    <div class="input-group">
                        <div class="file-loading"> 
                            <input id="file_fondo" name="file_fondo" type="file" accept="image/*">
                        </div>
                    </div>
            </div>               
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    
    $("#file_fondo").fileinput({
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
    $("#file_circulo").fileinput({
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
    $("#file_producto").fileinput({
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
    $("#file_hombre").fileinput({
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
    $("#file_archivo_descarga").fileinput({
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