<?php
include_once("../../model_class/web_slider_carousel.php");
$obj_web_slider_carousel = new web_slider_carousel();
$obj_web_slider_carousel->id_web_slider_carousel=$_REQUEST["id"];
$obj_web_slider_carousel->consult();
?>
 <div class="row"> 
            <input type="hidden" name="id" value="<?php echo $obj_web_slider_carousel->id_web_slider_carousel; ?>">
            <div class="col-4">
                <label for="slt_posicion_imagen">Posición Imagen<i class="text-danger" title="Seleccione Posición Imagen">*</i> </label>
                <label class="text-danger msj-slt_posicion_imagen"></label>
                <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                </div>
                <select class="form-control" name="slt_posicion_imagen" id="slt_posicion_imagen">
                    <option value="0">SELECCIONAR POSICIÓN IMAGEN</option> 
                    <option <?php if ($obj_web_slider_carousel->posicion_imagen==1){ echo "selected"; }?> value="1">Izquierda</option>
                    <option <?php if ($obj_web_slider_carousel->posicion_imagen==2){ echo "selected"; }?> value="2">Derecha</option>
                </select>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_titulo_h1">Título H1<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_titulo_h1"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_titulo_h1" name="txt_titulo_h1" value="<?php echo $obj_web_slider_carousel->h1; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_span">Span<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_span"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_span" name="txt_span" value="<?php echo $obj_web_slider_carousel->span; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_parrafo">Párrafo<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_parrafo"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_parrafo" name="txt_parrafo" value="<?php echo $obj_web_slider_carousel->parrafo; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_desc_boton_1">Descripción del boton 1<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_desc_boton_1"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_desc_boton_1" name="txt_desc_boton_1" value="<?php echo $obj_web_slider_carousel->boton_1_desc; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_desc_boton_2">Descripción del boton 2<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_desc_boton_2"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_desc_boton_2" name="txt_desc_boton_2" value="<?php echo $obj_web_slider_carousel->boton_2_desc; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_enlace_boton_1">Enlace Boton 1<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_enlace_boton_1"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_enlace_boton_1" name="txt_enlace_boton_1" value="<?php echo $obj_web_slider_carousel->boton_1_enlace; ?>"/>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_enlace_boton_2">Enlace Boton 2<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_enlace_boton_2"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_enlace_boton_2" name="txt_enlace_boton_2" value="<?php echo $obj_web_slider_carousel->boton_2_enlace; ?>"/>
                </div>
            </div>
            <div class="col-12">
                <br><center><div class="card card-outline card-success"><strong>Gestión de Archivos</strong></div></center>
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

    $('#slt_posicion_imagen').select2({
    theme: 'bootstrap4'
    });
</script>