
<?php
include_once("../../model_class/estado_civil.php");
$obj_es= new estado_civil();
$obj_es->id_estado_civil=$_REQUEST["id"];
$obj_es->consult();

if($obj_es->estado == 1){
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
} 

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_es->id_estado_civil; ?>">
    <div class="col-4">
        <label for="txt_edo_civil">Estado civil </label>
        <label class="text-danger msj_txt_edo_civil"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_edo_civil" name="txt_edo_civil" value="<?php echo $obj_es->estado_civil; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Estado <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><?php echo $ico; ?></span>
            </div>
             
            <input type="text" class="form-control" value="<?php echo $estado; ?>"/>
           
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Ultima actualizacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_es->fechaactualiza; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Fecha creacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_es->fecharegistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Creado por: <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_es->id_usuarioregistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Atualizado por: <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_es->id_usuarioactualiza; ?>"/>
        </div>
    </div>
      
</div>