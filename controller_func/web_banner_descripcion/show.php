<?php
include_once("../../model_class/web_banner_descripcion.php");
$obj_wb= new web_banner_descripcion();
$obj_wb->id_web_banner_descripcion=$_REQUEST["id"];
$obj_wb->consult();

if($obj_wb->estado == 1){
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
}
?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_wb->id_web_banner_descripcion; ?>">
    <div class="col-4">
        <label for="txt_titulo">Titulo </label>
        <label class="text-danger msj_txt_titulo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_titulo" name="txt_titulo" value="<?php echo $obj_wb->titulo; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_subtitulo">Sub titulo </label>
        <label class="text-danger msj_txt_subtitulo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_subtitulo" name="txt_subtitulo" value="<?php echo $obj_wb->subtitulo; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_parrafo">Parrafo </label>
        <label class="text-danger msj_txt_parrafo"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_parrafo" name="txt_parrafo" value="<?php echo $obj_wb->parrafo; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_imagen">imagen </label>
        <label class="text-danger msj_txt_imagen"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_imagen" name="txt_imagen" value="<?php echo $obj_wb->imagen; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Estado </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><?php echo $ico; ?></span>
            </div>
             
            <input type="text" class="form-control" value="<?php echo $estado; ?>"/>
           
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Ultima actualizacion </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_wb->fechaactualiza; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Fecha creacion </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_wb->fecharegistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Creado por: </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_wb->id_usuarioregistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Atualizado por: </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_wb->id_usuarioactualiza; ?>"/>
        </div>
    </div>   
    
      
</div>
<script src="js/valid.js"></script>
<script>

    fntValidText();
    fntValidTextSpecial();

</script>
