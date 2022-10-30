<?php
include_once("../../model_class/usuario.php");
include_once("../../model_class/estado_civil.php");
include_once("../../model_class/genero.php");
include_once("../../model_class/tipo_documento.php");
include_once("../../model_class/rol.php");
include_once("../../model_class/ubigeo_peru_departments.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
include_once("../../model_class/ubigeo_peru_districts.php");
$obj_p= new usuario();
$obj_st= new estado_civil();
$obj_g= new genero();
$obj_td= new tipo_documento();
$obj_r= new rol();
$obj_dep= new ubigeo_peru_departments();
$obj_prov= new ubigeo_peru_provinces();
$obj_dist= new ubigeo_peru_districts();
$obj_p->id_usuario=$_REQUEST["id"];
$obj_p->consult();

?>
<div class="row">
    <input type="hidden" name="id" id="id" value="<?php echo $obj_p->id_usuario; ?>">
    <div class="col-4">
        <label for="txt_name">Nombres <i class="text-danger" title="Ingrese nombre">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_name" name="txt_name" value="<?php echo $obj_p->nombre; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_app">Apellido paterno <i class="text-danger" title="Ingrese apellido paterno">*</i></label>
        <label class="text-danger msj_txt_app"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_app" name="txt_app" value="<?php echo $obj_p->apellido_paterno; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_apm">Apellido materno <i class="text-danger" title="Ingrese apellido materno">*</i></label>
        <label class="text-danger msj_txt_apm"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_apm" name="txt_apm" value="<?php echo $obj_p->apellido_materno; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_tel">Telefono <i class="text-danger" title="Ingrese numero telefonico">*</i> </label>
        <label class="text-danger msj_txt_tel"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control valid validNumber" id="txt_tel" name="txt_tel" value="<?php echo $obj_p->telefono; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_email">Correo <i class="text-danger" title="Ingrese su correo electronico">*</i> </label>
        <label class="text-danger msj_txt_email"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="email" class="form-control valid validEmail" id="txt_email" name="txt_email" value="<?php echo $obj_p->correo; ?>" />
        </div>
    </div>
    <div class="col-4">
        <label for="slt_dni">Tipo de documento <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_dni"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_select" name="slt_dni" id="slt_dni">
            <option value="0">SELECIONAR</option>
            <?php $rs_tipo_document=$obj_td->combo();
                while($fila_p=mysqli_fetch_assoc($rs_tipo_document)){
            ?>
            <option <?php if($obj_p->id_tipo_documento==$fila_p["id_tipo_documento"]){ echo "selected";}?> value="<?php echo $fila_p["id_tipo_documento"]?>"><?php echo $fila_p["tipo_documento"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_num_document">numero de documento <i class="text-danger" title="Ingrese numero de documento">*</i></label>
        <label class="text-danger msj_txt_num_document"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_num_document" name="txt_num_document" value="<?php echo $obj_p->num_documento; ?>"/>
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
            <option <?php if($obj_p->id_genero==$fila_p["id_genero"]){ echo "selected";}?> value="<?php echo $fila_p["id_genero"]?>"><?php echo $fila_p["genero"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_dep">Departamento <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_dep"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_select" name="slt_dep" id="slt_dep">
            <option value="0">SELECIONAR</option>
            <?php $rs_departamento=$obj_dep->combo();
                while($fila_p=mysqli_fetch_assoc($rs_departamento)){
            ?>
            <option <?php if($obj_p->id_departamento==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
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
        <select class="form-control select_select" name="slt_prov" id="slt_prov">
            <option value="0">SELECIONAR</option>
            <?php
            if($_REQUEST["id"]>0){
                $obj_prov->department_id=$obj_p->id_departamento;
                $rs_provincia=$obj_prov->combo_x_dep();
            }
            ?>
            <?php 
                while($fila_p=mysqli_fetch_assoc($rs_provincia)){
            ?>
            <option <?php if($obj_p->id_provincia==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
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
        <select class="form-control select_select" name="slt_dist" id="slt_dist">
            <option value="0">SELECIONAR</option>
            <?php
            if($_REQUEST["id"]>0){
                $obj_dist->province_id=$obj_p->id_provincia;
                $rs_distrito=$obj_dist->combo_x_prov();
            }
            ?>
            <?php 
                while($fila_p=mysqli_fetch_assoc($rs_distrito)){
            ?>
            <option <?php if($obj_p->id_distrito==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                <?php }?>
        </select>
        </div>
    </div>       
    <div class="col-4">
        <label for="txt_direc">Direccion <i class="text-danger" title="Ingrese Direccion">*</i></label>
        <label class="text-danger msj_txt_direc"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_direc" name="txt_direc" value="<?php echo $obj_p->direccion; ?>"/>
        </div>
    </div>

    <div class="col-4">
        <label for="txt_nac">Fecha de nacimiento <i class="text-danger" title="Ingrese Fecha de nacimiento">*</i></label>
        <label class="text-danger msj_txt_nac"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <?php if($_REQUEST["id"]>0){?>                       
                <input type="text" class="form-control" id="txt_nac" name="txt_nac" 
                value="<?php echo  date('Y-m-d',strtotime($obj_p->fecha_nac));?>"/>                          
                <?php }else{?>
                <input type="text" class="form-control" id="txt_nac" name="txt_nac"
                value="<?php echo date('Y-m-d');?>"/>
            <?php }?>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_inicio">Fecha inicio de labores <i class="text-danger" title="Ingrese Fecha inicio de labores">*</i></label>
        <label class="text-danger msj_txt_inicio"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <?php if($_REQUEST["id"]>0){?>                       
                <input type="text" class="form-control" id="txt_inicio" name="txt_inicio" 
                value="<?php echo  date('Y-m-d',strtotime($obj_p->fecha_inicio_labores));?>"/>                          
                <?php }else{?>
                <input type="text" class="form-control" id="txt_inicio" name="txt_inicio"
                value="<?php echo date('Y-m-d');?>"/>
            <?php }?>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_fin">Fecha fin de labores <i class="text-danger" title="Ingrese Fecha fin de labores">*</i></label>
        <label class="text-danger msj_txt_fin"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <input type="checkbox">
                </span>
            </div>
            <?php if($_REQUEST["id"]>0){?>                       
                <input type="text" class="form-control" id="txt_fin" name="txt_fin" 
                value="<?php echo  date('Y-m-d',strtotime($obj_p->fecha_fin_labores));?>"/>                          
                <?php }else{?>
                <input type="text" class="form-control" id="txt_fin" name="txt_fin"
                value="<?php echo date('Y-m-d');?>"/>
            <?php }?>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_hijos">Numeros de hijos <i class="text-danger" title="Ingrese Numeros de hijos">*</i></label>
        <label class="text-danger msj_txt_hijos"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control ValidTextSpecial" id="txt_hijos" name="txt_hijos" value="<?php echo $obj_p->nro_hijos; ?>" />
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
            <option <?php if($obj_p->id_estado_civil==$fila_p["id_estado_civil"]){ echo "selected";}?> value="<?php echo $fila_p["id_estado_civil"]?>"><?php echo $fila_p["estado_civil"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_password">Contraseña <i class="text-danger" title="Ingrese su correo electronico">*</i> </label>
        <label class="text-danger msj_txt_password"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="password" class="form-control " id="txt_password" name="txt_password"/>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_rol">Rol <i class="text-danger" title="Seleccione Producto">*</i> </label>
        <label class="text-danger msj-slt_rol"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_select" name="slt_rol" id="slt_rol">
            <option value="0">SELECIONAR</option>
            <?php $rs_combo=$obj_r->combo_rol();
                while($fila_p=mysqli_fetch_assoc($rs_combo)){
            ?>
            <option <?php if($obj_p->id_rol==$fila_p["id_rol"]){ echo "selected";}?> value="<?php echo $fila_p["id_rol"]?>"><?php echo $fila_p["rol"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
        <div class="col-12">
            <center><div class="card card-outline card-success"><strong>Archivos de usuario</strong></div></center>
        </div> 
        <div class="col-6">
            <label for="file_cv">Importe Curriculum
            <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
            <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
            </label>
            <label class="text-danger msj-file_cv"></label>
            <div class="input-group">
                <div class="file-loading"> 
                    <input id="file_cv" name="file_cv" type="file" accept=".pdf,docx,doc">
                </div>
            </div>
        </div>
        <div class="col-6">
            <label for="file_foto_perfil">Importe una foto de perfil / Tamaño: 98px ancho por 120px altura
            <?php if($_GET["id"]==0){?><i class="text-danger" title="Complete este campo">*</i><?php }?>
            <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
            <label class="text-danger msj-file_foto_perfil"></label>
            <div class="input-group">
                <div class="file-loading"> 
                    <input id="file_foto_perfil" name="file_foto_perfil" type="file" accept="image/*">
                </div>
            </div>
        </div>
</div>

<script src="js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidEmail();
    fntValidNumber();

    $('.select_select').select2({
        theme: 'bootstrap4'
    })

    $('#txt_nac').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10),
        maxDate: moment(),
        locale: {
        format: 'YYYY-MM-DD',
        }
    });

    $('#txt_inicio').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10),
        maxDate:moment(),
        locale: {
        format: 'YYYY-MM-DD',
        }
    });

    $('#txt_fin').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10),
        maxDate:moment(),
        locale: {
        format: 'YYYY-MM-DD',
        }
    });


    //var formData= new FormData();

$("#file_cv").fileinput({
    language: 'es',
    fileType: "fas",
    showUpload: false,
    dropZoneEnabled: false, 
    showRemove: false,
    maxFileCount: 1,
    fileActionSettings: {
      showRemove: false,
      showUpload: false,
      showZoom: false,
      showDrag: false,}
});  

/**tamaño de imagen 400 x 400 */
$("#file_foto_perfil").fileinput({
    language: 'es',
    fileType: "fas",
    showUpload: false,
    dropZoneEnabled: false,
    showRemove: false,
    maxFileCount: 1,
    fileActionSettings: {
      showRemove: false,
      showUpload: false,
      showZoom: false,
      showDrag: false,}   
});  

</script>
    



