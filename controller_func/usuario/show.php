<?php
include_once("../../model_class/usuario.php");
$obj_p= new usuario();
$obj_p->id_usuario=$_REQUEST["id"];
$obj_p->consult();

 if($obj_p->estado == 1){
    $estado="Activo";
    $ico='<i class="fas fa-toggle-on"></i>';
} else {
    $estado="Inactivo";
    $ico='<i class="fas fa-toggle-off"></i>';
} 

?> 
<div class="row">
<input type="hidden" name="id" id="id" value="<?php echo $obj_p->id_usuario; ?>">
<div class="col-4">
        <label for="txt_name">Nombres </label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_name" name="txt_name" value="<?php echo $obj_p->nombre; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_app">Apellido paterno </label>
        <label class="text-danger msj_txt_app"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_app" name="txt_app" value="<?php echo $obj_p->apellido_paterno; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_apm">Apellido materno </label>
        <label class="text-danger msj_txt_apm"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid validText" id="txt_apm" name="txt_apm" value="<?php echo $obj_p->apellido_materno; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_tel">Telefono  </label>
        <label class="text-danger msj_txt_tel"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="text" class="form-control " id="txt_tel" name="txt_tel" value="<?php echo $obj_p->telefono; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_email">Correo  </label>
        <label class="text-danger msj_txt_email"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-eye"></i></span>
            </div>
            <input type="email" class="form-control " id="txt_email" name="txt_email" value="<?php echo $obj_p->correo; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_dni">Tipo de documento </label>
        <label class="text-danger msj-slt_dni"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_dni" name="slt_dni" id="slt_dni">
            <option value="0">SELECIONAR</option>
            <?php $rs_tipo_document=$obj_p->combo();
                while($fila_p=mysqli_fetch_assoc($rs_tipo_document)){
            ?>
            <option <?php if($obj_p->id_tipo_documento==$fila_p["id_tipo_documento"]){ echo "selected";}?> value="<?php echo $fila_p["id_tipo_documento"]?>"><?php echo $fila_p["tipo_documento"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_num_document">numero de documento </label>
        <label class="text-danger msj_txt_num_document"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_num_document" name="txt_num_document" value="<?php echo $obj_p->num_documento; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_genero">Genero  </label>
        <label class="text-danger msj-slt_genero"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_genero" name="slt_genero" id="slt_genero">
            <option value="0">SELECIONAR</option>
            <?php $rs_genero=$obj_p->combo();
                while($fila_p=mysqli_fetch_assoc($rs_genero)){
            ?>
            <option <?php if($obj_p->id_genero==$fila_p["id_genero"]){ echo "selected";}?> value="<?php echo $fila_p["id_genero"]?>"><?php echo $fila_p["genero"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_dep">Departamento  </label>
        <label class="text-danger msj-slt_dep"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_dep" name="slt_dep" id="slt_dep">
            <option value="0">SELECIONAR</option>
            <?php $rs_departamento=$obj_p->combo();
                while($fila_p=mysqli_fetch_assoc($rs_departamento)){
            ?>
            <option <?php if($obj_p->id_departamento==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_prov">Provincia  </label>
        <label class="text-danger msj-slt_prov"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_prov" name="slt_prov" id="slt_prov">
            <option value="0">SELECIONAR</option>
            <?php $rs_provincia=$obj_p->combo();
                while($fila_p=mysqli_fetch_assoc($rs_provincia)){
            ?>
            <option <?php if($obj_p->id_provincia==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_dist">Distrito  </label>
        <label class="text-danger msj-slt_dist"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_prov" name="slt_dist" id="slt_dist">
            <option value="0">SELECIONAR</option>
            <?php $rs_distrito=$obj_p->combo();
                while($fila_p=mysqli_fetch_assoc($rs_distrito)){
            ?>
            <option <?php if($obj_p->id_distrito==$fila_p["id"]){ echo "selected";}?> value="<?php echo $fila_p["id"]?>"><?php echo $fila_p["name"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_direc">Direccion </label>
        <label class="text-danger msj_txt_direc"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control valid ValidTextSpecial" id="txt_direc" name="txt_direc" value="<?php echo $obj_p->direccion; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_cv">Curriculum </label>
        <label class="text-danger msj_txt_cv"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control" id="txt_cv" name="txt_cv" value="<?php echo $obj_p->cv;?>"/>
            <a href="<?php echo $obj_p->cv; ?>" download="<?php echo $obj_p->cv; ?>" class="btn btn-success btn-sm">Descargar CV</a>
        </div>
    </div>
    
    <div class="col-4">
        <label for="txt_nac">Fecha de nacimiento </label>
        <label class="text-danger msj_txt_nac"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="date" class="form-control" id="txt_nac" name="txt_nac" value="<?php echo $obj_p->fecha_nac; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_inicio">Fecha inicio de labores </label>
        <label class="text-danger msj_txt_inicio"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="date" class="form-control" id="txt_inicio" name="txt_inicio" value="<?php echo $obj_p->fecha_inicio_labores; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_fin">Fecha fin de labores </label>
        <label class="text-danger msj_txt_fin"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="date" class="form-control" id="txt_fin" name="txt_fin" value="<?php echo $obj_p->fecha_fin_labores; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_hijos">Numeros de hijos </label>
        <label class="text-danger msj_txt_hijos"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control ValidTextSpecial" id="txt_hijos" name="txt_hijos" value="<?php echo $obj_p->nro_hijos; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_est_civil">Estado civil </label>
        <label class="text-danger msj-slt_est_civil"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_rol" name="slt_est_civil" id="slt_est_civil">
            <option value="0">SELECIONAR</option>
            <?php $rs_estado_civil=$obj_p->combo();
                while($fila_p=mysqli_fetch_assoc($rs_estado_civil)){
            ?>
            <option <?php if($obj_p->id_estado_civil==$fila_p["id_estado_civil"]){ echo "selected";}?> value="<?php echo $fila_p["id_estado_civil"]?>"><?php echo $fila_p["estado_civil"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
    <div class="col-4">
        <label for="slt_rol">Rol </label>
        <label class="text-danger msj-slt_rol"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_rol" name="slt_rol" id="slt_rol">
            <option value="0">SELECIONAR</option>
            <?php $rs_combo=$obj_p->combo();
                while($fila_p=mysqli_fetch_assoc($rs_combo)){
            ?>
            <option <?php if($obj_p->id_rol==$fila_p["id_rol"]){ echo "selected";}?> value="<?php echo $fila_p["id_rol"]?>"><?php echo $fila_p["rol"]?></option>
                <?php }?>
        </select>
        </div>
    </div>    
    <div class="col-4">
        <label for="txt_t_foto">tamaño de foto </label>
        <label class="text-danger msj_txt_t_foto"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input type="text" class="form-control" id="txt_t_foto" name="txt_t_foto" value="<?php echo $obj_p->foto_tamanio; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Estado<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><?php echo $ico; ?></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $estado; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Ultima Actualizacion<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_p->fechaactualiza; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Fecha creacion<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_p->fecharegistro; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Actualizado por:<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_p->id_usuarioregistro; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_obs">Creado por:<label class="text-danger msj-txt-inf"></label>  </label>
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" value="<?php echo $obj_p->id_usuarioactualiza; ?>"/>
        </div>
    </div>

    <div class="col-12">
            <center><div class="card card-outline card-success"><strong>Foto de perfil</strong></div></center>
        </div> 

    <div class="col-12">
        <div class="input-group mb-2">
            
            <img src="<?php echo $obj_p->foto_perfil;?>" class="img-fluid">
        </div>
    </div>
    
    

    <script>

    $('.select_gen').select2({
        theme: 'bootstrap4'
    })

</script>
</div>

