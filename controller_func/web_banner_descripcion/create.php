<?php
include_once("../../model_class/web_banner_descripcion.php");
$obj_wb= new web_banner_descripcion();
$obj_wb->id_web_banner_descripcion=$_REQUEST["id"];
$obj_wb->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_wb->id_web_banner_descripcion; ?>">
    <div class="col-6">
        <label for="txt_titulo">Titulo <i class="text-danger" title="Ingrese Titulo">*</i></label>
        <label class="text-danger msj_txt_titulo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_titulo" name="txt_titulo" value="<?php echo $obj_wb->titulo; ?>"/>
        </div>
    </div>
    <div class="col-6">
        <label for="txt_subtitulo">Sub titulo <i class="text-danger" title="Ingrese Sub titulo">*</i></label>
        <label class="text-danger msj_txt_subtitulo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_subtitulo" name="txt_subtitulo" value="<?php echo $obj_wb->subtitulo; ?>"/>
        </div>
    </div>
    <div class="col-6">
        <label for="txt_parrafo">Parrafo <i class="text-danger" title="Ingrese Sub titulo">*</i></label>
        <label class="text-danger msj_txt_parrafo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_parrafo" name="txt_parrafo" value="<?php echo $obj_wb->parrafo; ?>"/>
        </div>
    </div>
    <div class="col-6">
        <label for="txt_imagen">imagen <i class="text-danger" title="Ingrese imagen">*</i></label>
        <label class="text-danger msj_txt_imagen"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_imagen" name="txt_imagen" value="<?php echo $obj_wb->imagen; ?>"/>
        </div>
    </div>
    
      
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>
