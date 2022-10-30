<?php
include_once("../../model_class/tipo_descuento.php");
$obj_td= new tipo_descuento();
$obj_td->id_tipo_descuento=$_REQUEST["id"];
$obj_td->consult();

if($obj_td->estado == 1){
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
} 

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_td->id_tipo_descuento; ?>">
    <div class="col-4">
        <label for="txt_tipo_descuento">Tipo descuento</label>
        <label class="text-danger msj_txt_tipo_descuento"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_tipo_descuento" name="txt_tipo_descuento" value="<?php echo $obj_td->tipo_descuento; ?>"/>
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
            <input type="text" class="form-control" value="<?php echo $obj_td->fechaactualiza; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Fecha creacion </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_td->fecharegistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Creado por: </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_td->id_usuarioregistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Atualizado por: </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_td->id_usuarioactualiza; ?>"/>
        </div>
    </div>   
      
</div>
