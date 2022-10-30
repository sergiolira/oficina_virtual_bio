<?php
include_once("../../model_class/rol.php");
$obj_r= new rol();
$obj_r->id_rol=$_REQUEST["id"];
$obj_r->consult();

 if($obj_r->estado == 1){ 
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
} 

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_r->id_rol; ?>">
    <div class="col-4">
        <label for="txt_arch">Titulo</label> <label class="text-danger msj-txt-inf"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_r->rol; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Descripción<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_r->observacion; ?>"/>
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
        <label for="txt_obs">Ultima Actualización<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_r->fechaactualiza; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Fecha creacion<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_r->fecharegistro; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Actualizado por:<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_r->id_usuarioregistro; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Creado por:<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_r->id_usuarioactualiza; ?>"/>
        </div>
    </div>
    
    
</div>

