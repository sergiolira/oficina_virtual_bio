<?php

include_once("../../model_class/cabecera_comisiones_venta.php");
include_once("../../model_class/tipo_documento.php");
$obj_com = new cabecera_comisiones_venta();
$obj_td = new tipo_documento();

$obj_com->id_cabecera = $_REQUEST['id'];
$obj_com->consult();

if($obj_com->estado==0){
    $activo = "Inactivo";
    $color = "red";
}else{
    $activo = "Activo";
    $color = "green";
}
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
            <input type="text" class="form-control" placeholder="Enter" id="txt_representante" name="txt_representante" value="<?php echo $obj_com->representante ?>">
        </div>

    </div>
    <div class="col-4">
        <label for="txt_correo">Correo<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="text_correo" name="txt_correo" value="<?php echo $obj_com->correo; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="txt_num_document">numero de documento <i class="text-danger" title="Ingrese numero de documento">*</i></label>
        <label class="text-danger msj_txt_num_document"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_num_document" name="txt_num_document" value="<?php echo $obj_com->nro_documento; ?>" />
        </div>
    </div>
    <div class="col-4">
        <label for="txt_comision">Comision total<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="txt_comision" name="txt_comision" value="<?php echo $obj_com->comision_total; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="txt_anio">Año<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="txt_anio" name="txt_anio" value="<?php echo $obj_com->anio; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="txt_mes">Mes<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="txt_mes" name="txt_mes" value="<?php echo $obj_com->mes; ?>">
        </div>

    </div>
    <div class="col-4">
        <label for="txt_sem_inicio">Semana de inicio<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="date" class="form-control" placeholder="Enter" id="txt_sem_inicio" name="txt_sem_inicio" value="<?php echo $obj_com->semana_inicio; ?>">

        </div>

    </div>
    <div class="col-4">
        <label for="txt_sem_fin">Semana de finalizacion<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="date" class="form-control" placeholder="Enter" id="txt_sem_fin" name="txt_sem_fin" value="<?php echo $obj_com->semana_fin; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="txt_sem_det">Detalle de la semana<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="txt_sem_det" name="txt_sem_det" value="<?php echo $obj_com->semana_detalle; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="txt_estado">Estado<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" style="color:<?php echo $color ?> ;" class="form-control" placeholder="Enter" id="txt_comision" name="txt_comision" value="<?php echo $activo; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Ultima actualizacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_com->fechaactualiza; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Fecha creacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_com->fecharegistro; ?>"/>
        </div>
    </div>   
</div>