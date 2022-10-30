<?php
session_start();
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');

require_once "../../model_class/web_ubicacion.php";
require_once "../../model_class/pais.php";
include_once("../../model_class/ubigeo_peru_departments.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
include_once("../../model_class/ubigeo_peru_districts.php");

$obj_pais = new pais();
$obj_d=new ubigeo_peru_departments();
$obj_p=new ubigeo_peru_provinces();
$obj_dis=new ubigeo_peru_districts();
$obj_web_ub = new web_ubicacion();

$obj_web_ub->id_web_ubicacion = $_REQUEST['id'];
$obj_web_ub->consult();
?>
<div class="row">
    <input type="hidden" name="id" id="id" value="<?php echo $obj_web_ub->id_web_ubicacion; ?>">
    <div class="col-4">
        <label for="sltdepartamento" >Pais<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdepartamento"></label></label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
          </div>           
          <select class="form-control select_pais" id="sltpais" name="sltpais" style="width: 70%;">
            <option  value="0" >.::Elige::.</option>
            <?php
              $rs_d=$obj_pais->combo();
              while($fila_p=mysqli_fetch_assoc($rs_d)){
              ?>
              <option  value="<?php echo $fila_p["id_pais"]?>" <?php if($obj_web_ub->id_pais==$fila_p["id_pais"]){echo "selected ";}?>><?php echo $fila_p["pais"]?></option>
            <?php }?>
          </select>
          
      </div>
    </div>
    <div class="col-4" >
      <label for="sltdepartamento" >Departamento<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdepartamento"></label></label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
          </div>           
          <select class="form-control select_dep" id="sltdepartamento" name="sltdepartamento" style="width: 70%;">
            <option  value="0" >.::Elige::.</option>
            <?php
              $rs_d=$obj_d->combo();
              while($fila_d=mysqli_fetch_assoc($rs_d)){
              ?>
              <option  value="<?php echo $fila_d["id"]?>" <?php if($obj_web_ub->id_departamento==$fila_d["id"]){echo "selected ";}?>><?php echo $fila_d["name"]?></option>
            <?php }?>
          </select>
          
      </div>
    </div>

    <div class="col-4">
      <label for="sltprovincia" >Provincia<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltprovincia"></label></label>
      <div class="input-group mb-3">   
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
          </div>           
          <select class="form-control select_pro" id="sltprovincia" name="sltprovincia" style="width: 70%;">
            <option  value="0" >.::Elige::.</option>
              <?php
                $obj_p->department_id=$obj_web_ub->id_dep;
                $rs_p=$obj_p->combo();
                while($fila_p=mysqli_fetch_assoc($rs_p)){
                ?>
                <option  value="<?php echo $fila_p["id"]?>" <?php if($obj_web_ub->id_provincia==$fila_p["id"]){echo "selected ";}?>><?php echo $fila_p["name"]?></option>
              <?php }?>
          </select>              
      </div>
    </div>

    <div class="col-4" >
      <label for="sltdistrito" >Distrito <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdistrito"></label></label>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
          </div>              
          <select class="form-control select_dis" id="sltdistrito" name="sltdistrito" style="width: 70%;">
            <option  value="0" >.::Elige::.</option>
                <?php
                  $obj_dis->department_id=$obj_web_ub->id_departamento;
                  $obj_dis->province_id=$obj_web_ub->id_provincia;
                  $rs_dis=$obj_dis->combo();
                  while($fila_dis=mysqli_fetch_assoc($rs_dis)){
                  ?>
                  <option  value="<?php echo $fila_dis["id"]?>" <?php if($obj_web_ub->id_distrito==$fila_dis["id"]){echo "selected ";}?>><?php echo $fila_dis["name"]?></option>
                <?php }?>
          </select>
          
      </div>
    </div>    
    <div class="col-4">
        <label for="">Direccion<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control " placeholder="Enter" id="txt_direccion" name="txt_direccion" value="<?php echo $obj_web_ub->direccion; ?>">
        </div>


    </div>
    <div class="col-4">
        <label for="">Latitud<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="txt_latitud" name="txt_latitud" value="<?php echo $obj_web_ub->latitud; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Longitud<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="txt_longitud" name="txt_longitud" value="<?php echo $obj_web_ub->longitud; ?>">
        </div>
    </div>
    <div class="col-4">
        <label for="">Imagen<i class="text-danger" title="Ingrese Nombre">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">

                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="txt_img" name="txt_img" value="<?php echo $obj_web_ub->imagen; ?>">
        </div>
    </div>
</div>