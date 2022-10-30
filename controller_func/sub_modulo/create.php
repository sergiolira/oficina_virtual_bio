<?php
include_once("../../model_class/sub_modulo.php");
include_once("../../model_class/modulo.php");
$obj_sm= new sub_modulo();
$obj_m= new modulo();
$obj_sm->id_sub_modulo=$_REQUEST["id"];
$obj_sm->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_sm->id_sub_modulo; ?>">
    
    <div class="col-4">
        <label for="txt_title">Nombre <i class="text-danger" title="Ingrese nombre">*</i></label>
        <label class="text-danger msj_txt_title"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_title" name="txt_title" value="<?php echo $obj_sm->sub_modulo; ?>"/>
        </div>
    </div>     
    <div class="col-4">
        <label for="slt_md">Modulo <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_md"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_rol" name="slt_md" id="slt_md">
            <option value="0">SELECIONAR</option>
            <?php $rs_combo=$obj_m->combo();
                while($fila_p=mysqli_fetch_assoc($rs_combo)){
            ?>
            <option <?php if($obj_sm->id_modulo==$fila_p["id_modulo"]){ echo "selected";}?> 
            value="<?php echo $fila_p["id_modulo"]?>"><?php echo $fila_p["modulo"]?></option>
                <?php }?>
        </select>
        </div>
    </div> 

    <div class="col-4">
        <label for="slt_md">Nivel <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_md"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control " name="slt_nivel" id="slt_nivel">
            <?php
            if ($obj_sm->nivel==1) { ?>
                <option value="0">SELECCIONAR</option>
                <option value="1" selected >Nivel 1</option>
                <option value="2">Nivel 2</option>
                <option value="3">Nivel 3</option>
            <?php }
            if ($obj_sm->nivel==2) { ?>
                <option value="0">SELECCIONAR</option>
                <option value="1">Nivel 1</option>
                <option value="2" selected >Nivel 2</option>
                <option value="3">Nivel 3</option>
            <?php }
            if ($obj_sm->nivel==3) { ?>
                <option value="0">SELECCIONAR</option>
                <option value="1">Nivel 1</option>
                <option value="2">Nivel 2</option>
                <option value="3" selected >Nivel 3</option>
            <?php }
            if ($obj_sm->nivel==0) { ?>
                <option value="0">SELECCIONAR</option>
                <option value="1">Nivel 1</option>
                <option value="2">Nivel 2</option>
                <option value="3">Nivel 3</option>
            <?php } ?>
        
        </select>
        </div>
    </div>  

    <div class="col-4">
        <label for="slt_md">Seleccione Sub modulo <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_md"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control slt_nivel_sub" name="slt_nivel_sub" id="slt_nivel_sub">
            <option value="0">SELECIONAR UN NIVEL</option>
            <?php 
            if($_REQUEST["id"]>0){
                if ($obj_sm->nivel==3)  {
                   
                    $obj_sm->nivel=2;
                    $rs_combo=$obj_sm->combosub_x_nivel();
                    while($fila_p=mysqli_fetch_assoc($rs_combo)){ ?>

                    <option <?php if($obj_sm->sub_x_nivel==$fila_p["id_sub_modulo"]){ echo "selected";}?>
                     value="<?php echo $fila_p["id_sub_modulo"]?>"><?php echo $fila_p["sub_modulo"]?></option>
               <?php }}
            } ?>
        </select>
        </div>
    </div> 
    <div class="col-4">
        <label id="op" for="txt_enlace">Enlace <i class="text-danger" title="Enlace">*</i></label>
        <label class="text-danger msj_txt_enlace"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid " id="txt_enlace" name="txt_enlace" value="<?php echo $obj_sm->enlace; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_icon">Icono <!-- <i class="text-danger" title="Enlace">*</i> --></label>
        <label class="text-danger msj_txt_icon"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid " id="txt_icon" name="txt_icon" value="<?php echo $obj_sm->icono; ?>"/>
        </div>
    </div>
</div>
<script src="js/valid.js"></script>
<script>

    $('#slt_md').select2({
        theme: 'bootstrap4'
    });
    $('#slt_nivel').select2({
        theme: 'bootstrap4'
    });
    $('#slt_nivel_sub').select2({
        theme: 'bootstrap4'
    });

    fntValidText();
    fntValidTextSpecial();

</script>
