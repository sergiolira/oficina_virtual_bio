<?php
session_start();
include_once("../../model_class/representante.php");
include_once("../../model_class/tipo_documento.php");
include_once("../../model_class/pais.php");
include_once("../../model_class/ubigeo_peru_departments.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
include_once("../../model_class/ubigeo_peru_districts.php");
$obj=new representante();
$obj_td=new tipo_documento();
$obj_pais=new pais();
$obj_dep=new ubigeo_peru_departments();
$obj_prov=new ubigeo_peru_provinces();
$obj_dist=new ubigeo_peru_districts();
$obj->id_representante=$_GET["id"];
$obj->consultar_representante();
?>
<div class="row">

            <div class="col-4">
              <label for="slt_ti_per">Tipo de persona <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_tip_per">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-crosshairs"></i></span>
                  </div>
                  <select class="form-control" style="width: 80%;" id="slt_ti_per" name="slt_ti_per">
                    <option value="0" >.::Elige::.</option>
                    <option value="PN" <?php if($obj->tipo_persona=="PN"){echo "selected";}?>>PERSONA NATURAL</option>
                    <option value="PJ" <?php if($obj->tipo_persona=="PJ"){echo "selected";}?>>PERSONA JURIDICA</option>
                  </select>
              </div>
            </div>

            <?php if($obj->tipo_persona=="PJ"){?>
            <div class="col-4 div_razon_social">
              <label for="txtrazons">Razon social <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_razons"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter razon social" id="txtrazons" name="txtrazons"   value="<?php echo $obj->razon_social;?>">
              </div>
            </div>
            <?php }else{?>
            <div class="col-4 div_razon_social" style="display: none;">
              <label for="txtrazons">Razon social <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_razons"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter razon social" id="txtrazons" name="txtrazons"   value="<?php echo $obj->razon_social;?>">
              </div>
            </div>
            <?php }?>
            
            <?php if($obj->tipo_persona=="PN" || $_GET["id"]==0){?>
            <div class="col-4 div_nombre">
              <label for="txtnombre">Nombres <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_nom">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="hidden" name="es" id="es" value="1">
                  <input type="hidden" name="tiuser" id="tiuser" value="1">
                  <input type="hidden" name="hdnid" id="hdnid" value="<?php echo $_GET["id"];?>">
                  <input type="hidden" name="txtlred" id="txtlred" value="0">
                  <input type="hidden" name="list" id="list" value="0">
                  <input type="text" class="form-control" placeholder="Enter Nombre" id="txtnombre" name="txtnombre" value="<?php echo $obj->nombre;?>">
              </div>
            </div>
            <?php }else{?>
            <div class="col-4 div_nombre" style="display: none;">
              <label for="txtnombre">Nombres <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_nom">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="hidden" name="es" id="es" value="1">
                  <input type="hidden" name="tiuser" id="tiuser" value="1">
                  <input type="hidden" name="hdnid" id="hdnid" value="<?php echo $_GET["id"];?>">
                  <input type="hidden" name="txtlred" id="txtlred" value="0">
                  <input type="hidden" name="list" id="list" value="0">
                  <input type="text" class="form-control" placeholder="Enter Nombre" id="txtnombre" name="txtnombre" value="<?php echo $obj->nombre;?>">
              </div>
            </div>
            <?php }?>
             
            <?php if($obj->tipo_persona=="PN" || $_GET["id"]==0){?>
            <div class="col-4 div_ape_pat">
              <label for="txtapep">Apellido paterno <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_apep"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Apellido paterno" id="txtapep" name="txtapep" value="<?php echo $obj->apellidopaterno;?>">
              </div>
            </div>
            <?php }else{?>
            <div class="col-4 div_ape_pat" style="display: none;">
              <label for="txtapep">Apellido paterno <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_apep"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Apellido paterno" id="txtapep" name="txtapep" value="<?php echo $obj->apellidopaterno;?>">
              </div>
            </div>
            <?php }?>

            <?php if($obj->tipo_persona=="PN" || $_GET["id"]==0){?>
            <div class="col-4 div_ape_mat">
              <label for="txtapem">Apellido materno <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_apem"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Apellido materno" id="txtapem" name="txtapem" value="<?php echo $obj->apellidomaterno;?>">
              </div>
            </div>
            <?php }else{?>
            <div class="col-4 div_ape_mat" style="display: none;">
              <label for="txtapem">Apellido materno <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_apem"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Apellido materno" id="txtapem" name="txtapem" value="<?php echo $obj->apellidomaterno;?>">
              </div>
            </div>
            <?php }?>

            <?php if($obj->tipo_persona=="PN" || $_GET["id"]==0){?>
            <div class="col-4 div_gen">
              <label for="slt_genero">Genero <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_genero">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-crosshairs"></i></span>
                  </div>
                  <select class="form-control" style="width: 80%;" id="slt_genero" name="slt_genero">
                    <option value="0" >.::Elige::.</option>
                    <option value="1" <?php if($obj->id_genero=="1"){echo "selected";}?>>Hombre</option>
                    <option value="2" <?php if($obj->id_genero=="2"){echo "selected";}?>>Mujer</option>
                  </select>
              </div>
            </div>
            <?php }else{?>
            <div class="col-4 div_gen" style="display: none;">
              <label for="slt_genero">Genero <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_genero">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-crosshairs"></i></span>
                  </div>
                  <select class="form-control" style="width: 80%;" id="slt_genero" name="slt_genero">
                    <option value="1" <?php if($obj->id_genero=="1"){echo "selected";}?>>Hombre</option>
                    <option value="2" <?php if($obj->id_genero=="2"){echo "selected";}?>>JMujer</option>
                  </select>
              </div>
            </div>
            <?php }?>            
            
            <?php if($obj->tipo_persona=="PN" || $_GET["id"]==0){?>
            <div class="col-4">
              <label for="txtfechanac" class="lbl_fec_nac">Fecha de nacimiento</label><i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_apem"></label>
              <div class="input-group mb-3">                        
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="span_rango_fecha">
                      <i class="far fa-calendar-alt text-info "></i>
                    </span>
                  </div>    
                    <?php  if($obj->fecha_nacimiento=="1900-01-01" || $obj->fecha_nacimiento==""){?>                  
                    <input type="text" class="form-control float-right" id="txtfechanac" name="txtfechanac" autocomplete="off" 
                    placeholder="00-00-0000" value="01-01-1990">          
                  <?php }else{?>
                    <input type="text" class="form-control float-right" id="txtfechanac" name="txtfechanac" 
                    autocomplete="off" placeholder="AAAA-MM-DD" value="<?php echo date('d-m-Y',strtotime($obj->fecha_nacimiento));?>"> 
                  <?php }?>  
              </div>
            </div>            
            <?php }else{?>
            <div class="col-4">
              <label for="txtfechanac" class="lbl_fec_nac">Fecha de contitución</label><i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_apem"></label>
              <div class="input-group mb-3">                        
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="span_rango_fecha">
                      <i class="far fa-calendar-alt text-info "></i>
                    </span>
                  </div>    
                    <?php  if($obj->fecha_nacimiento=="1900-01-01" || $obj->fecha_nacimiento==""){?>                  
                    <input type="text" class="form-control float-right" id="txtfechanac" name="txtfechanac" autocomplete="off" 
                    placeholder="00-00-0000" value="<?php echo date("d-m-Y");?>">          
                  <?php }else{?>
                    <input type="text" class="form-control float-right" id="txtfechanac" name="txtfechanac" 
                    autocomplete="off" placeholder="AAAA-MM-DD" value="<?php echo date('d-m-Y',strtotime($obj->fecha_nacimiento));?>"> 
                  <?php }?>  
              </div>
            </div>
            <?php }?>

            <div class="col-4">
              <label for="sltpais">Pais <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_pais">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-crosshairs"></i></span>
                  </div>
                  <select class="form-control" id="sltpais" name="sltpais" style="width: 70%;">
                    <option  value="0" >.::Elige::.</option>
                    <?php
                      $rs_d=$obj_pais->combo();
                      while($fila_d=mysqli_fetch_assoc($rs_d)){
                      ?>
                      <option  value="<?php echo $fila_d["id_pais"]?>" <?php if($obj->id_pais==$fila_d["id_pais"]){echo "selected ";}?>>
                      <?php echo $fila_d["pais"]?></option>
                    <?php }?>
                  </select>
              </div>
            </div>
            
            <?php if($obj->id_pais=="1" || $_GET["id"]==0){?>
            <div class="col-4 div_departamento">
              <label for="sltdepartamento" >Departamento<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdepartamento"></label></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
                  </div>           
                  <select class="form-control" id="sltdepartamento" name="sltdepartamento" style="width: 70%;">
                    <option  value="0" >.::Elige::.</option>
                    <?php
                      $rs_d=$obj_dep->combo();
                      while($fila_d=mysqli_fetch_assoc($rs_d)){
                      ?>
                      <option  value="<?php echo $fila_d["id"]?>" <?php if($obj->id_departamento==$fila_d["id"]){echo "selected ";}?>>
                      <?php echo $fila_d["name"]?></option>
                    <?php }?>
                  </select>
                  
              </div>
            </div>
            <?php }else{?>
            <div class="col-4 div_departamento" style="display: none;">
              <label for="sltdepartamento" >Departamento<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdepartamento"></label></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
                  </div>           
                  <select class="form-control" id="sltdepartamento" name="sltdepartamento" style="width: 70%;">
                    <option  value="0" >.::Elige::.</option>
                    <?php
                      $rs_d=$obj_dep->combo();
                      while($fila_d=mysqli_fetch_assoc($rs_d)){
                      ?>
                      <option  value="<?php echo $fila_d["id"]?>" <?php if($obj->id_departamento==$fila_d["id"]){echo "selected ";}?>>
                      <?php echo $fila_d["name"]?></option>
                    <?php }?>
                  </select>
                  
              </div>
            </div>
            <?php }?>
            
            <?php if($obj->id_pais=="1" || $_GET["id"]==0){?>
            <div class="col-4 div_provincia">
              <label for="sltprovincia" >Provincia<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltprovincia"></label></label>
              <div class="input-group mb-3">   
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
                  </div>           
                  <select class="form-control" id="sltprovincia" name="sltprovincia" style="width: 70%;">
                    <option  value="0" >.::Elige::.</option>
                      <?php
                        $obj_prov->department_id=$obj->id_dep;
                        $rs_p=$obj_prov->combo();
                        while($fila_p=mysqli_fetch_assoc($rs_p)){
                        ?>
                        <option  value="<?php echo $fila_p["id"]?>" <?php if($obj->id_provincia==$fila_p["id"]){echo "selected ";}?>>
                        <?php echo $fila_p["name"]?></option>
                      <?php }?>
                  </select>              
              </div>
            </div>
            <?php }else{?>
            <div class="col-4 div_provincia" style="display: none;">
              <label for="sltprovincia" >Provincia<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltprovincia"></label></label>
              <div class="input-group mb-3">   
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
                  </div>           
                  <select class="form-control" id="sltprovincia" name="sltprovincia" style="width: 70%;">
                    <option  value="0" >.::Elige::.</option>
                      <?php
                        $obj_prov->department_id=$obj->id_dep;
                        $rs_p=$obj_prov->combo();
                        while($fila_p=mysqli_fetch_assoc($rs_p)){
                        ?>
                        <option  value="<?php echo $fila_p["id"]?>" <?php if($obj->id_provincia==$fila_p["id"]){echo "selected ";}?>>
                        <?php echo $fila_p["name"]?></option>
                      <?php }?>
                  </select>              
              </div>
            </div>
            <?php }?>

            <?php if($obj->id_pais=="1" || $_GET["id"]==0){?>
            <div class="col-4 div_distrito">
              <label for="sltdistrito" >Distrito <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdistrito"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
                  </div>              
                  <select class="form-control" id="sltdistrito" name="sltdistrito" style="width: 70%;">
                    <option  value="0" >.::Elige::.</option>
                        <?php
                          $obj_dist->department_id=$obj->id_dep;
                          $obj_dist->province_id=$obj->id_pro;
                          $rs_dis=$obj_dist->combo();
                          while($fila_dis=mysqli_fetch_assoc($rs_dis)){
                          ?>
                          <option  value="<?php echo $fila_dis["id"]?>" <?php if($obj->id_distrito==$fila_dis["id"]){echo "selected ";}?>>
                          <?php echo $fila_dis["name"]?></option>
                        <?php }?>
                  </select>                  
              </div>
            </div>
            <?php }else{?>
            <div class="col-4 div_distrito" style="display: none;">
              <label for="sltdistrito" >Distrito <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdistrito"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
                  </div>              
                  <select class="form-control" id="sltdistrito" name="sltdistrito" style="width: 70%;">
                    <option  value="0" >.::Elige::.</option>
                        <?php
                          $obj_dist->department_id=$obj->id_dep;
                          $obj_dist->province_id=$obj->id_pro;
                          $rs_dis=$obj_dist->combo();
                          while($fila_dis=mysqli_fetch_assoc($rs_dis)){
                          ?>
                          <option  value="<?php echo $fila_dis["id"]?>" <?php if($obj->id_distrito==$fila_dis["id"]){echo "selected ";}?>>
                          <?php echo $fila_dis["name"]?></option>
                        <?php }?>
                  </select>                  
              </div>
            </div>
            <?php }?>

            <div class="col-4">
              <label for="txtdireccion">Direccion<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_dir">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter" id="txtdireccion" name="txtdireccion" value="<?php echo $obj->direccion?>">
              </div>
            </div>           
            
            <div class="col-4">
              <label for="txttelefono">Celular</label><i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_cel"></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter" id="txttelefono" name="txttelefono" maxlength="9"  
                  value="<?php echo $obj->telefono;?>">
              </div>
            </div>
            <div class="col-4">
              <label for="txtcorreo">Correo <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_correo"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                  </div>
                  <input type="email" class="form-control" placeholder="Enter Correo" id="txtcorreo" name="txtcorreo" value="<?php echo $obj->correo;?>">
              </div>
            </div>

            <?php if($obj->tipo_persona=="PN" || $_GET["id"]==0){?>
            <div class="col-4 div_tip_doc">
              <label for="slttipdoc">Tipo de documento <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_tipdoc">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-crosshairs"></i></span>
                  </div>
                  <select class="form-control" id="slttipdoc" name="slttipdoc" style="width: 70%;">
                    <option  value="0" >.::Elige::.</option>
                        <?php
                          $rstd=$obj_td->combo();
                          while($fila_td=mysqli_fetch_assoc($rstd)){
                          ?>
                          <option  value="<?php echo $fila_td["id_tipo_documento"]?>" <?php if($obj->id_tipo_documento==$fila_td["id_tipo_documento"]){echo "selected ";}?>>
                          <?php echo $fila_td["tipo_documento"]?></option>
                        <?php }?>
                  </select>   
              </div>
            </div>
            <?php }else{?>
            <div class="col-4 div_tip_doc" style="display: none;">
              <label for="slttipdoc">Tipo de documento <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_tipdoc">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-crosshairs"></i></span>
                  </div>
                  <select class="form-control" id="slttipdoc" name="slttipdoc" style="width: 70%;">
                    <option  value="0" >.::Elige::.</option>
                        <?php
                          $rstd=$obj_td->combo();
                          while($fila_td=mysqli_fetch_assoc($rstd)){
                          ?>
                          <option  value="<?php echo $fila_td["id_tipo_documento"]?>" <?php if($obj->id_tipo_documento==$fila_td["id_tipo_documento"]){echo "selected ";}?>>
                          <?php echo $fila_td["tipo_documento"]?></option>
                        <?php }?>
                  </select>  
              </div>
            </div>
            <?php }?>

            <?php if($obj->tipo_persona=="PN" || $_GET["id"]==0){?>
             <div class="col-4">
              <label for="txtruc" class="lbl_nro_doc">N° de documento</label><i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_ruc"></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter"  value="<?php echo $obj->nro_documento;?>" 
                  <?php if($_GET["id"]>0){ echo 'disabled id="txtruc" name=""';}else{ echo ' id="txtruc" name="txtruc" ';}?>>
              </div>
            </div>
            <?php }else{?>
            <div class="col-4">
              <label for="txtruc" class="lbl_nro_doc">RUC / Codigo fiscal</label><i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_ruc"></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter"  value="<?php echo $obj->nro_documento;?>" 
                  <?php if($_GET["id"]>0){ echo 'disabled id="txtruc" name=""';}else{ echo ' id="txtruc" name="txtruc" ';}?>>
              </div>
            </div>
            <?php }?>

            <div class="col-4">
              <label for="txtpass">Contraseña <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_pass"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                  <input type="password" class="form-control" placeholder="Enter contraseña" id="txtpass" name="txtpass" value="">
              </div>
            </div>

            <div class="col-4">
              <label for="txtpassr">Repita contraseña <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_passr"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                  <input type="password" class="form-control" placeholder="Enter repita contraseña" id="txtpassr" name="txtpassr" value="">
              </div>
            </div>

            <div class="col-4">
              <label for="txtsponsor">N° de documento / Sponsor <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_sponsor">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter"   value="<?php echo $obj->patrocinador_directo; ?>" 
                  <?php if($_GET["id"]>0){ echo 'disabled id="" name=""';}else{ echo ' id="txtsponsor" name="txtsponsor" ';}?>>
              </div>
            </div>

            <div class="col-4">
              <label for="lbldsponsor">Sponsor (Nombres)</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-arrow-left"></i></span>
                  </div>
                  <label  class="form-control" id="lbldsponsor"  maxlength="11"  value="" ><?php echo $obj->patrocinador_directo_datos;?></label>
              </div>
            </div>

            <div class="col-8">
              <label for="txtobser">Observación</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-eye"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Comentario" id="txtobser" name="txtobser"   value="<?php echo $obj->observacion;?>">
              </div>
            </div>
</div>
<!-- page script -->
<script>
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    });
    $('#slt_ti_per').select2({
      theme: 'bootstrap4'
    });
    $('#slt_genero').select2({
      theme: 'bootstrap4'
    });
    $('#sltpais').select2({
      theme: 'bootstrap4'
    });
    $('#sltdepartamento').select2({
      theme: 'bootstrap4'
    });
    $('#sltdistrito').select2({
      theme: 'bootstrap4'
    });
    $('#sltprovincia').select2({
      theme: 'bootstrap4'
    });
    $('#slttipdoc').select2({
      theme: 'bootstrap4'
    });



    $('#txtfechanac').daterangepicker({
      autoUpdateInput: false,
      singleDatePicker: true,
      showDropdowns: true,
      minYear: 1900,
      maxYear: parseInt(moment().format('YYYY'),10),
      maxDate :moment(),
    });

    $('#txtfechanac').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
    });
</script>