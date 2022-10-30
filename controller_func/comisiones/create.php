<?php

include_once("../../model_class/cabecera_comisiones.php");
include_once("../../model_class/tipo_documento.php");
$obj_com = new cab_comisiones();
$obj_td = new tipo_documento();

$obj_com->id_cabecera = $_REQUEST['id'];
$obj_com->consult();
?>
<div class="row">
    <input type="hidden" name="id" id="id" value="<?php echo $obj_com->id_cabecera; ?>">  
    <div class="col-4">
        <label for="txt_representante">Representante<i class="text-danger" title="Ingrese Nombre" req>*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" placeholder="Enter" id="txt_representante" name="txt_representante" value="<?php echo $obj_com->representante ?>">
        </div>

    </div>
    <div class="col-4">
        <label for="txt_correo">Correo<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validEmail" placeholder="Enter" id="text_correo" name="txt_correo" value="<?php echo $obj_com->correo; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="slt_dni">Tipo de documento <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_dni"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
            </div>
            <select class="form-control select_select" name="slt_dni" id="slt_dni">
                <option value="0">SELECIONAR</option>
                <?php $rs_tipo_document = $obj_td->combo();
                while ($fila_p = mysqli_fetch_assoc($rs_tipo_document)) {
                ?>
                    <option <?php if ($obj_com->id_tipo_documento == $fila_p["id_tipo_documento"]) {
                                echo "selected";
                            } ?> value="<?php echo $fila_p["id_tipo_documento"] ?>"><?php echo $fila_p["tipo_documento"] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_num_document">numero de documento <i class="text-danger" title="Ingrese numero de documento">*</i></label>
        <label class="text-danger msj_txt_num_document"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" id="txt_num_document" name="txt_num_document" value="<?php echo $obj_com->nro_doc; ?>" />
        </div>
    </div>
    <div class="col-4">
        <label for="txt_comision">Comision total<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" placeholder="Enter" id="txt_comision" name="txt_comision" value="<?php echo $obj_com->comision_total; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="txt_anio">Año<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" placeholder="Enter" id="txt_anio" name="txt_anio" value="<?php echo $obj_com->anio; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="txt_mes">Mes<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" placeholder="Enter" id="txt_mes" name="txt_mes" value="<?php echo $obj_com->mes; ?>">
        </div>

    </div>
    <div class="col-4">
        <label for="txt_sem_inicio">Semana de inicio<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="date" class="form-control valid ValidTextSpecial"  placeholder="Enter" id="txt_sem_inicio" name="txt_sem_inicio" value="<?php echo $obj_com->semana_inicio; ?>">

        </div>

    </div>
    <div class="col-4">
        <label for="txt_sem_fin">Semana de finalizacion<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="date" class="form-control valid ValidTextSpecial" placeholder="Enter" id="txt_sem_fin" name="txt_sem_fin" value="<?php echo $obj_com->semana_fin; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="txt_sem_det">Detalle de la semana<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" placeholder="Enter" id="txt_sem_det" name="txt_sem_det" value="<?php echo $obj_com->semana_detalle; ?>">
        </div>


    </div>
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    fntValidNumberDecimal();
    fntValidEmail();
</script>