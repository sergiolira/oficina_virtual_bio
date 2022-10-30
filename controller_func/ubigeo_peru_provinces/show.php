<?php
include_once("../../model_class/ubigeo_peru_provinces.php");
$obj_u= new ubigeo_peru_provinces();
$obj_u->id=$_REQUEST["id"];
$obj_u->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_u->id; ?>">
    
    <div class="col-4">
        <label for="txt_title">Nombre </label>
        <label class="text-danger msj_txt_title"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_title" name="txt_title" value="<?php echo $obj_u->name; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_dep">Departamento</label>
        <label class="text-danger msj-slt_dep"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_rol" name="slt_dep" id="slt_dep">
            <option value="0">SELECIONAR</option>
            <?php $rs_combo=$obj_u->combo();
                while($fila=mysqli_fetch_assoc($rs_combo)){
            ?>
            <option <?php if($obj_u->department_id==$fila["id"]){ echo "selected";}?> value="<?php echo $fila["id"]?>"><?php echo $fila["name"]?></option>
                <?php }?>
        </select>
        </div>
    </div> 
    
</div>

