<?php
require_once "../../model_class/web_quienes_somos.php";
$obj_quienes_somos = new web_quienes_somos();
$obj_quienes_somos->id_web_quienes_somos = $_REQUEST['id'];
$obj_quienes_somos->consult();
?>
<div class="row">
    <input type="hidden" name="id" id="id" value="<?php echo $obj_quienes_somos->id_web_quienes_somos; ?>">
    <div class="col-4">
        <label for="">Titulo<i class="text-danger" title="Ingrese el producto">*</i></label>
        <label class="text-danger msj_txt_pro"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_titulo" name="txt_titulo" value="<?php echo $obj_quienes_somos->titulo; ?>">
        </div>

    </div>
    <div class="col-4">
        <label for="">Imagen Principal<i class="text-danger" title="Ingrese el producto">*</i></label>
        <label class="text-danger msj_txt_pro"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_imagen_p" name="txt_imagen_p" value="<?php echo $obj_quienes_somos->imagen_principal; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Imagen<i class="text-danger" title="Ingrese el producto">*</i></label>
        <label class="text-danger msj_txt_pro"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_imagen" name="txt_imagen" value="<?php echo $obj_quienes_somos->imagen; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Subtitulo<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_subtitulo" name="txt_subtitulo" value="<?php echo $obj_quienes_somos->subtitulo; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Parrafo<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_parrafo" name="txt_parrafo" value="<?php echo $obj_quienes_somos->parrafo; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Icono<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_icono" name="txt_icono" value="<?php echo $obj_quienes_somos->icono; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Ultima Actualizacion<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_icono" name="txt_icono" value="<?php echo $obj_quienes_somos->fechaactualiza; ?>">
        </div>
    </div>