<?php
include_once("../../model_class/sub_modulo.php");
$obj_sm= new sub_modulo();
$obj_sm->id_sub_modulo=$_REQUEST["id"];
$obj_sm->consult();

if($obj_sm->estado == 1){
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
}  

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_sm->id_sub_modulo; ?>">
    
    <div class="col-4">
        <label for="txt_title">Nombre </label>
        <label class="text-danger msj_txt_title"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_title" name="txt_title" value="<?php echo $obj_sm->sub_modulo; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_md">Modulo </label>
        <label class="text-danger msj-slt_md"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_rol" name="slt_md" id="slt_md">
            <option value="0">SELECIONAR</option>
            <?php $rs_combo=$obj_sm->combo();
                while($fila_p=mysqli_fetch_assoc($rs_combo)){
            ?>
            <option <?php if($obj_sm->id_modulo==$fila_p["id_modulo"]){ echo "selected";}?> value="<?php echo $fila_p["id_modulo"]?>"><?php echo $fila_p["modulo"]?></option>
                <?php }?>
        </select>
        </div>
    </div> 
    <div class="col-4">
        <label for="txt_enlace">Enlace </label>
        <label class="text-danger msj_txt_enlace"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid " id="txt_enlace" name="txt_enlace" value="<?php echo $obj_sm->enlace; ?>"/>
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
            <input type="text" class="form-control" value="<?php echo $obj_sm->fechaactualiza; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Fecha creacion <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_sm->fecharegistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Creado por: <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_sm->id_usuarioregistro; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_obs">Atualizado por: <label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_sm->id_usuarioactualiza; ?>"/>
        </div>
    </div>  
</div>

