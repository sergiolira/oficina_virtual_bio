<?php
include_once("../../model_class/costo_envio.php");
include_once("../../model_class/ubigeo_peru_departments.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
include_once("../../model_class/ubigeo_peru_districts.php");
include_once("../../model_class/pais.php");
$obj_costo_envio= new costo_envio();
$obj_dep= new ubigeo_peru_departments();
$obj_prov= new ubigeo_peru_provinces();
$obj_dist= new ubigeo_peru_districts();
$obj_pais = new pais();
$obj_costo_envio->id_costo_envio=$_REQUEST["id"];
$obj_costo_envio->consult();

?>
 <div class="row"> 
            <input type="hidden" name="id" value="<?php echo $obj_costo_envio->id_costo_envio; ?>">
            <div class="col-4">
                <label for="slt_pais_seleccionado">Pais<i class="text-danger" title="Seleccione País">*</i> </label>
                <label class="text-danger msj-slt_pais_seleccionado"></label>
                <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                </div>
                <select class="form-control select_dep" name="slt_pais_seleccionado" id="slt_pais_seleccionado">
                    <option value="0">SELECCIONAR PAÍS</option>            
                    <?php $rs_pais=$obj_pais->combo();
                        while($fila_p=mysqli_fetch_assoc($rs_pais)){
                    ?>
                    <option <?php if($obj_costo_envio->id_pais==$fila_p["id_pais"]){ echo "selected";}?> value="<?php echo $fila_p["id_pais"]?>"><?php echo $fila_p["pais"]?></option>
                        <?php }?>
                </select>
                </div>
            </div>
            <div class="col-4">
                <label for="slt_departamendto_seleccionado">Departamento<i class="text-danger" title="Seleccione Producto">*</i> </label>
                <label class="text-danger msj-slt_dep"></label>
                <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                </div>
                <select class="form-control select_dep" name="slt_departamendto_seleccionado" id="slt_departamendto_seleccionado">
                    <option value="0">SELECCIONAR DEPARTAMENTO</option>            
                    <?php $rs_departamento=$obj_dep->combo();
                        while($fila_p=mysqli_fetch_assoc($rs_departamento)){
                    ?>
                    <option <?php if($obj_costo_envio->id_departamento==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                        <?php }?>
                </select>
                </div>
            </div>
            <div class="col-4">
                <label for="slt_provincia_seleccionado">Provincia<i class="text-danger" title="Seleccione Producto">*</i> </label>
                <label class="text-danger msj-slt_prov"></label>
                <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                </div>
                <select class="form-control select_prov" name="slt_provincia_seleccionado" id="slt_provincia_seleccionado" >
                    <option value="0">SELECCIONAR PROVINCIA</option>
                    <?php
                    if($_REQUEST["id"]>0){
                        $obj_prov->department_id=$obj_costo_envio->id_departamento;
                        $rs_provincia=$obj_prov->combo_x_dep();
                    ?>
                    <?php 
                        while($fila_p=mysqli_fetch_assoc($rs_provincia)){
                    ?>
                    <option <?php if($obj_costo_envio->id_provincia==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                        <?php } }?>
                </select>
                </div>
            </div>
            <div class="col-4">
                <label for="slt_distrito_seleccionado">Distrito<i class="text-danger" title="Seleccione Producto">*</i> </label>
                <label class="text-danger msj-slt_dist"></label>
                <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                </div>
                <select class="form-control select_prov" name="slt_distrito_seleccionado" id="slt_distrito_seleccionado">
                    <option value="0">SELECCIONAR DISTRITO</option>
                    <?php
                    if($_REQUEST["id"]>0){
                        $obj_dist->province_id=$obj_costo_envio->id_provincia;
                        $rs_distrito=$obj_dist->combo_x_prov();
                    ?>
                    <?php 
                        while($fila_p=mysqli_fetch_assoc($rs_distrito)){
                    ?>
                    <option <?php if($obj_costo_envio->id_distrito==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                        <?php } }?>
                </select>
                </div>
            </div>
            <div class="col-4">
                <label for="txt_monto">Monto<i class="text-danger"></i></label>
                <label class="text-danger msj_txt_monto"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="number" class="form-control valid validNumber"  id="txt_monto" name="txt_monto" value="<?php echo $obj_costo_envio->monto; ?>"/>
                </div>
            </div>    
            <div class="col-4">
                <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                <label class="text-danger"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    </div>
                    <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_costo_envio->observacion; ?>"/>
                </div>
            </div>                     
</div>
<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    $('#slt_departamendto_seleccionado').select2({
    theme: 'bootstrap4'
    });
    $('#slt_pais_seleccionado').select2({
    theme: 'bootstrap4'
    });
    $('#slt_provincia_seleccionado').select2({
    theme: 'bootstrap4'
    });
    $('#slt_distrito_seleccionado').select2({
    theme: 'bootstrap4'
    });
</script>