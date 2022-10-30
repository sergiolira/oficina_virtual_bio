<?php
include_once("../../model_class/ubigeo_peru_districts.php");
$obj_d= new ubigeo_peru_districts();
$obj_d->id=$_REQUEST["id"];
$obj_d->consult(); 

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_d->id; ?>">
    
    <div class="col-4">
        <label for="txt_title">Nombre <i class="text-danger" title="Ingrese nombre">*</i></label>
        <label class="text-danger msj_txt_title"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_title" name="txt_title" value="<?php echo $obj_d->name; ?>"/>
        </div>
    </div>

    <div class="col-4">
        <label for="slt_pro">Provincia <i class="text-danger" title="Seleccione departamento">*</i> </label>
        <label class="text-danger msj-slt_pro"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_g" name="slt_pro" id="slt_pro">
            <option value="0">SELECIONAR</option>
            <?php $rs_Provincia=$obj_d->combo_districts();
                while($fila=mysqli_fetch_assoc($rs_Provincia)){
            ?>
            <option <?php if($obj_d->province_id==$fila["id"]){ echo "selected";}?> value="<?php echo $fila["id"]?>"><?php echo $fila["name"]?></option>
                <?php }?>
        </select>
        </div>
    </div> 
    <div class="col-4">
        <label for="slt_dep">Departamento <i class="text-danger" title="Seleccione departamento">*</i> </label>
        <label class="text-danger msj-slt_dep"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_g" name="slt_dep" id="slt_dep">
            <option value="0">SELECIONAR</option>
            <?php $rs_combo=$obj_d->combo();
                while($fila_d=mysqli_fetch_assoc($rs_combo)){
            ?>
            <option <?php if($obj_d->department_id==$fila_d["id"]){ echo "selected";}?> value="<?php echo $fila_d["id"]?>"><?php echo $fila_d["name"]?></option>
                <?php }?>
        </select>
        </div>
    </div> 
    
</div>



