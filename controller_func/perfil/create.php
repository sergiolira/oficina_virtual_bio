<?php
include_once("../../model_class/perfil.php");
include_once("../../model_class/estado_civil.php");
include_once("../../model_class/genero.php");
include_once("../../model_class/ubigeo_peru_departments.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
include_once("../../model_class/ubigeo_peru_districts.php");
$obj_r= new perfil();
$obj_st= new estado_civil();
$obj_g= new genero();
$obj_dep= new ubigeo_peru_departments();
$obj_prov= new ubigeo_peru_provinces();
$obj_dist= new ubigeo_peru_districts();
$obj_r->id_usuario=$_REQUEST["id"];
$obj_r->consult();

?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj_r->id_usuario; ?>">
    <div class="col-4">
        <label for="txt_direccion">Direccion </label>
        <label class="text-danger msj_txt_direccion"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control " id="txt_direccion" name="txt_direccion" value="<?php echo $obj_r->direccion; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_tele">Telefono </label>
        <label class="text-danger msj_txt_tele"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control " id="txt_tele" name="txt_tele" value="<?php echo $obj_r->telefono; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_dep">Departamento <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_dep"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
            </div>
            <select class="form-control select-selec" name="slt_dep" id="slt_dep">
                <option value="0">SELECIONAR</option>
                <?php $rs_departamento=$obj_dep->combo();
                    while($fila_p=mysqli_fetch_assoc($rs_departamento)){
                ?>
                <option <?php if($obj_r->id_departamento==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"];?>"><?php echo $fila_p["name"];?></option>
                    <?php }?>
            </select>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_prov">Provincia <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_prov"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
            </div>
            <select class="form-control select-selec" name="slt_prov" id="slt_prov">
                <option value="0">SELECIONAR</option>
                <?php
                if($_REQUEST["id"]>0){
                    $obj_prov->department_id=$obj_r->id_departamento;
                    $rs_provincia=$obj_prov->combo_x_dep();
                }
                ?>
                <?php 
                    while($fila_p=mysqli_fetch_assoc($rs_provincia)){
                ?>
                <option <?php if($obj_r->id_provincia==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"];?>"><?php echo $fila_p["name"];?></option>
                    <?php }?>
            </select>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_dist">Distrito <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_dist"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
            </div>
            <select class="form-control select-dis" name="slt_dist" id="slt_dist">
                <option value="0">SELECIONAR</option>
                <?php
                if($_REQUEST["id"]>0){
                    $obj_dist->province_id=$obj_r->id_provincia;
                    $rs_distrito=$obj_dist->combo_x_prov();
                }
                ?>
                <?php 
                    while($fila_p=mysqli_fetch_assoc($rs_distrito)){
                ?>
                <option <?php if($obj_r->id_distrito==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"];?>"><?php echo $fila_p["name"];?></option>
                    <?php }?>
            </select>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_genero">Genero <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_genero"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_select" name="slt_genero" id="slt_genero">
            <option value="0">SELECIONAR</option>
            <?php $rs_genero=$obj_g->combo();
                while($fila_p=mysqli_fetch_assoc($rs_genero)){
            ?>
            <option <?php if($obj_r->id_genero==$fila_p["id_genero"]){ echo "selected";}?> value="<?php echo $fila_p["id_genero"]?>"><?php echo $fila_p["genero"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_est_civil">Estado civil <i class="text-danger" title="Seleccione estado civil">*</i> </label>
        <label class="text-danger msj-slt_est_civil"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_select" name="slt_est_civil" id="slt_est_civil">
            <option value="0">SELECIONAR</option>
            <?php $rs_estado_civil=$obj_st->combo();
                while($fila_p=mysqli_fetch_assoc($rs_estado_civil)){
            ?>
            <option <?php if($obj_r->id_estado_civil==$fila_p["id_estado_civil"]){ echo "selected";}?> value="<?php echo $fila_p["id_estado_civil"]?>"><?php echo $fila_p["estado_civil"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_hijos">Numeros de hijos <i class="text-danger" title="Ingrese Numeros de hijos">*</i></label>
        <label class="text-danger msj_txt_hijos"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control ValidTextSpecial" id="txt_hijos" name="txt_hijos" value="<?php echo $obj_r->nro_hijos; ?>" />
        </div>
    </div>
    <div class="col-4">
        <label for="txt_password">Contraseña <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?> </label>
        <label class="text-danger msj_txt_password"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="password" class="form-control " id="txt_password" name="txt_password"/>
        </div>
    </div>
</div>
    

<script src="js/valid.js"></script>
<script>
 
    
    // $('.select-dis').select2({
    // theme: 'bootstrap4'
    // });
    //  $('.select_select').select2({
    //  theme: 'bootstrap4'
    //  });

</script>
    
</div>


