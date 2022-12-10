<?php
include_once("../../model_class/modulo.php");
$obj_m= new modulo();
$obj_m->id_modulo=$_REQUEST["id"];
$obj_m->consult();

if ($obj_m->nivel==2) { 
    $opcion='<i class="text-danger" title="Complete este campo">(Opcional para nivel 2)</i>';
} else {
    $opcion='';
}

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_m->id_modulo; ?>">
    <div class="col-4">
        <label for="txt_title">Nombre <i class="text-danger" title="Ingrese nombre">*</i></label>
        <label class="text-danger msj_txt_title"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_title" name="txt_title" value="<?php echo $obj_m->modulo;?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_md">Nivel <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_md"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control slt_nivel" name="slt_nivel" id="slt_nivel">
            <?php
            if ($obj_m->nivel==1) { ?>
                <option value="0">SELECCIONAR</option>
                <option value="1" selected >Nivel 1</option>
                <option value="2">Nivel 2</option>
            <?php }
            if ($obj_m->nivel==2) { ?>
                <option value="0">SELECCIONAR</option>
                <option value="1">Nivel 1</option>
                <option value="2" selected >Nivel 2</option>
            <?php }
            if ($obj_m->nivel==0) { ?>
                <option value="0">SELECCIONAR</option>
                <option value="1">Nivel 1</option>
                <option value="2">Nivel 2</option>
            <?php } ?>
        
        </select>
        </div>
    </div> 
    
    <div class="col-4">
        <label id="op" for="txt_enlace">Enlace <i class="text-danger" title="Seleccione Producto">*</i></label>
        <label class="text-danger msj_txt_enlace"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validTextSpecial" id="txt_enlace" name="txt_enlace" value="<?php echo $obj_m->enlace; ?>"/>
        </div>
    </div>   
    <div class="col-4">
        <label for="txt_icon">Icono </label>
        <label class="text-danger msj_txt_icon"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control valid validTextSpecial" id="txt_icon" name="txt_icon" value="<?php echo $obj_m->icono; ?>"/>
        </div>
    </div>


    <div class="col-4">
        <label for="slt_md">Estilo de color <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_md"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control slt_estcol" name="slt_estcol" id="slt_estcol">
            <option <?php if($obj_m->estilocolor=="text-primary"){ echo "selected";}?> value="text-primary" class="text-primary font-weight-bold">Azul</option>
            <option <?php if($obj_m->estilocolor=="text-secondary"){ echo "selected";}?> value="text-secondary" class="text-secondary font-weight-bold">Plomo</option>
            <option <?php if($obj_m->estilocolor=="text-success"){ echo "selected";}?> value="text-success" class="text-success font-weight-bold">Verde</option>
            <option <?php if($obj_m->estilocolor=="text-danger"){ echo "selected";}?> value="text-danger" class="text-danger font-weight-bold">Rojo</option>
            <option <?php if($obj_m->estilocolor=="text-warning"){ echo "selected";}?> value="text-warning" class="text-warning font-weight-bold">Naranja</option>
            <option <?php if($obj_m->estilocolor=="text-info"){ echo "selected";}?> value="text-info" class="text-info font-weight-bold">Celeste</option>
            <option <?php if($obj_m->estilocolor=="text-dark"){ echo "selected";}?> value="text-dark" class="text-dark font-weight-bold">Oscuro</option>
        </select>
        </div>
    </div> 

    <div class="col-4">
        <label for="txt_dcrip">Observación </label>
        <label class="text-danger msj_txt_dcrip"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control valid validTextSpecial" id="txt_dcrip" name="txt_dcrip" value="<?php echo $obj_m->observacion; ?>"/>
        </div>
    </div>   
</div>
<script src="js/valid.js"></script>
<script>

$('#slt_nivel').select2({
    theme: 'bootstrap4'
});


fntValidText();
fntValidTextSpecial();

</script>
