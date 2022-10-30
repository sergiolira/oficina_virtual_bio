<?php
include_once("../../model_class/tipo_informacion.php");
$obj_i= new tipo_informacion();
$obj_i->id_tipo_informacion=$_REQUEST["id"];
$obj_i->consult();

 if($obj_i->estado == 1){
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
} 

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_i->id_tipo_informacion; ?>">
    <div class="col-4">
        <label for="txt_inf">Tipo de informacion<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_i->tipo_informacion; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Observacion<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_i->observacion; ?>"/>
        </div>
    </div>
    
    <div class="col-4">
        <label for="txt_obs">Estado<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><?php echo $ico; ?></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $estado; ?>"/>
        </div>
    </div>
    
    <div class="col-4">
        <label for="txt_obs">Ultima Actualizacion<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_i->fechaactualiza; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Fecha regitro<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_i->fecharegistro; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Creado por:<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_i->id_usuarioregistro; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Actualizado por:<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_i->id_usuarioactualiza; ?>"/>
        </div>
    </div>
      
</div>
