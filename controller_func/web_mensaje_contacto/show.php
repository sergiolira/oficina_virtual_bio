<?php
require_once "../../model_class/web_mensaje_contacto.php";
$obj_web_mensaje = new web_mensaje_contacto();
$obj_web_mensaje->id_web_mensaje_contacto = $_REQUEST['id'];
$obj_web_mensaje->consult();
?>
<div class="row">
    <input type="hidden" name="id" id="id" value="<?php echo $obj_web_mensaje->id_web_mensaje_contaacto; ?>">
    <div class="col-4">
        <label for="">Nombres y Apellidos<i class="text-danger" title="Ingrese el producto">*</i></label>
        <label class="text-danger msj_txt_pro"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_nom" name="txt_nom" value="<?php echo $obj_web_mensaje->nombre_apellido; ?>">
        </div>

    </div>
    <div class="col-4">
        <label for="">Correo<i class="text-danger" title="Ingrese el producto">*</i></label>
        <label class="text-danger msj_txt_pro"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_correo" name="txt_correo" value="<?php echo $obj_web_mensaje->correo; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Celular<i class="text-danger" title="Ingrese el producto">*</i></label>
        <label class="text-danger msj_txt_pro"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_celular" name="txt_celular" value="<?php echo $obj_web_mensaje->celular; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Mensaje<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_mensaje" name="txt_mensaje" value="<?php echo $obj_web_mensaje->mensaje; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Fecha de registro<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_mensaje" name="txt_mensaje" value="<?php echo $obj_web_mensaje->fecharegistro; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Ultima actualizacion<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_mensaje" name="txt_mensaje" value="<?php echo $obj_web_mensaje->fechaactualiza; ?>">
        </div>
    </div>