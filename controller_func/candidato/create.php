<?php
session_start();
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');
include_once("../../model_class/candidato.php");
include_once("../../model_class/ubigeo_peru_departments.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
include_once("../../model_class/ubigeo_peru_districts.php");
include_once("../../model_class/tipo_documento.php");
include_once("../../model_class/genero.php");
include_once("../../model_class/estado_candidato.php");
include_once("../../model_class/pais.php");
$obj_d=new ubigeo_peru_departments();
$obj_p=new ubigeo_peru_provinces();
$obj_dis=new ubigeo_peru_districts();
$obj=new candidato();
$obj_t_d=new tipo_documento();
$obj_gen= new genero();
$obj_e_c=new estado_candidato();
$obj_pais=new pais();
$obj->id_candidato=$_REQUEST["id"];
$obj->consult();
?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj->id_candidato; ?>">
  <div class="col-4">
    <label for="txtnombre">Nombres <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txtnombre"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <input type="hidden" name="es" id="es" value="1">
        <input type="hidden" name="tiuser" id="tiuser" value="1">
        <input type="hidden" name="hdnid" id="hdnid" value="<?php echo $_GET["id"];?>">
        <input type="text" class="form-control" placeholder="Enter Nombre" id="txtnombre" name="txtnombre" value="<?php echo $obj->nombre;?>">
    </div>
  </div>
  <div class="col-4">
    <label for="txtapep">Apellido paterno <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txtapep"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Enter Apellido paterno" id="txtapep" name="txtapep" 
        value="<?php echo $obj->apellidopaterno;?>">
    </div>
  </div>
  <div class="col-4">
    <label for="txtapem">Apellido materno <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txtapem"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Enter Apellido materno" id="txtapem" name="txtapem" 
        value="<?php echo $obj->apellidomaterno;?>">
    </div>
  </div>
  <div class="col-4">
        <label for="slt_t_d">Tipo de documento <i class="text-danger" title="Seleccione Tipo documento">*</i> </label>
        <label class="text-danger msj-slt_t_d"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_select" name="slt_t_d" id="slt_t_d">
            <option value="0">SELECIONAR</option>
            <?php $rs_tipo_document=$obj_t_d->combo();
                while($fila=mysqli_fetch_assoc($rs_tipo_document)){
            ?>
            <option <?php if($obj->id_tipo_documento==$fila["id_tipo_documento"]){ echo "selected";}?> value="<?php echo $fila["id_tipo_documento"]?>"><?php echo $fila["tipo_documento"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
  <div class="col-4">
    <label for="txtnro_doc">Nro documento<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txtnro_doc"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-at"></i></span>
        </div>
        <input type="number" class="form-control" placeholder="Enter Nro doc" id="txtnro_doc" name="txtnro_doc" value="<?php echo $obj->nro_documento;?>">
    </div>
  </div>

  <div class="col-4">
    <label for="txttelefono">Teléfono<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txttelefono"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-at"></i></span>
        </div>
        <input type="number" class="form-control" placeholder="Enter Telefono" id="txttelefono" name="txttelefono" value="<?php echo $obj->telefono;?>">
    </div>
  </div>

  <div class="col-4">
    <label for="txtcorreo">Correo electronico<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txtcorreo"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-at"></i></span>
        </div>
        <input type="email" class="form-control" placeholder="Enter Correo" id="txtcorreo" name="txtcorreo" value="<?php echo $obj->correo;?>">
    </div>
  </div>


  <div class="col-4">
          <label for="sltgenero">Genero<i class="text-danger" title="Ingrese el slt genero">*</i></label>
          <label class="text-danger msj_txt_sltgenero"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <select class="form-control " name="sltgenero" id="sltgenero" >
            <option value="0">SELECCIONAR</option>
            <?php $res= $obj_gen->combo();
                  while($fila= mysqli_fetch_assoc($res)){  ?>
                  <option <?php if($obj->id_genero==$fila["id_genero"]){
                      echo "selected"; }?> value="<?php echo $fila["id_genero"]; ?>"><?php echo $fila["genero"]; ?></option>
                      <?php }?>
                      
            </select>
          </div>
  </div>

  <div class="col-4">
    <label for="txtfechanac">Fecha nacimiento<i class="text-danger" title="Complete este campo">*</i>
    <label class="text-danger msj-txtfechanac"></label></label>
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


  <div class="col-4" >
      <label for="sltpais" >Pais<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltpais"></label></label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
          </div>           
          <select class="form-control select_dep" id="sltpais" name="sltpais" style="width: 70%;">
            <option  value="0" >.::Elige::.</option>
            <?php
              $rs_pais=$obj_pais->combo();
              while($fila_pais=mysqli_fetch_assoc($rs_pais)){
              ?>
              <option  value="<?php echo $fila_pais["id_pais"]?>" <?php if($obj->id_pais==$fila_pais["id_pais"]){echo "selected ";}?>>
              <?php echo $fila_pais["pais"]?></option>
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
            <select class="form-control select_dep" id="sltdepartamento" name="sltdepartamento" style="width: 70%;">
              <option  value="0" >.::Elige::.</option>
              <?php
                $rs_d=$obj_d->combo();
                while($fila_d=mysqli_fetch_assoc($rs_d)){
                ?>
                <option  value="<?php echo $fila_d["id"]?>" <?php if($obj->id_dep==$fila_d["id"]){echo "selected ";}?>><?php echo $fila_d["name"]?></option>
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
              <select class="form-control select_dep" id="sltdepartamento" name="sltdepartamento" style="width: 70%;">
                <option  value="0" >.::Elige::.</option>
                <?php
                  $rs_d=$obj_d->combo();
                  while($fila_d=mysqli_fetch_assoc($rs_d)){
                  ?>
                  <option  value="<?php echo $fila_d["id"]?>" <?php if($obj->id_dep==$fila_d["id"]){echo "selected ";}?>><?php echo $fila_d["name"]?></option>
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
            <select class="form-control select_pro" id="sltprovincia" name="sltprovincia" style="width: 70%;">
              <option  value="0" >.::Elige::.</option>
                <?php
                  $obj_p->department_id=$obj->id_dep;
                  $rs_p=$obj_p->combo();
                  while($fila_p=mysqli_fetch_assoc($rs_p)){
                  ?>
                  <option  value="<?php echo $fila_p["id"]?>" <?php if($obj->id_pro==$fila_p["id"]){echo "selected ";}?>><?php echo $fila_p["name"]?></option>
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
              <select class="form-control select_pro" id="sltprovincia" name="sltprovincia" style="width: 70%;">
                <option  value="0" >.::Elige::.</option>
                  <?php
                    $obj_p->department_id=$obj->id_dep;
                    $rs_p=$obj_p->combo();
                    while($fila_p=mysqli_fetch_assoc($rs_p)){
                    ?>
                    <option  value="<?php echo $fila_p["id"]?>" <?php if($obj->id_pro==$fila_p["id"]){echo "selected ";}?>><?php echo $fila_p["name"]?></option>
                  <?php }?>
              </select>              
          </div>
        </div>
      <?php }?>
      <?php if($obj->id_pais=="1" || $_GET["id"]==0){?>
      <div class="col-4 div_provincia">
        <label for="sltdistrito" >Distrito <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdistrito"></label></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
            </div>              
            <select class="form-control select_dis" id="sltdistrito" name="sltdistrito" style="width: 70%;">
              <option  value="0" >.::Elige::.</option>
                  <?php
                    $obj_dis->department_id=$obj->id_dep;
                    $obj_dis->province_id=$obj->id_pro;
                    $rs_dis=$obj_dis->combo();
                    while($fila_dis=mysqli_fetch_assoc($rs_dis)){
                    ?>
                    <option  value="<?php echo $fila_dis["id"]?>" <?php if($obj->id_dis==$fila_dis["id"]){echo "selected ";}?>><?php echo $fila_dis["name"]?></option>
                  <?php }?>
            </select>
            
        </div>
      </div>    
      <?php }else{?>
        <div class="col-4 div_provincia" style="display: none;">
          <label for="sltdistrito" >Distrito <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdistrito"></label></label>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <select class="form-control select_dis" id="sltdistrito" name="sltdistrito" style="width: 70%;">
                <option  value="0" >.::Elige::.</option>
                    <?php
                      $obj_dis->department_id=$obj->id_dep;
                      $obj_dis->province_id=$obj->id_pro;
                      $rs_dis=$obj_dis->combo();
                      while($fila_dis=mysqli_fetch_assoc($rs_dis)){
                      ?>
                      <option  value="<?php echo $fila_dis["id"]?>" <?php if($obj->id_dis==$fila_dis["id"]){echo "selected ";}?>><?php echo $fila_dis["name"]?></option>
                    <?php }?>
              </select>
          </div>
        </div>
      <?php }?>

    <div class="col-8">
      <label for="txtdireccion">Direccion<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_dir">   </label></label>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-user"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Enter" id="txtdireccion" name="txtdireccion" value="<?php echo $obj->direccion?>">
      </div>
    </div>   
    

    <div class="col-8">
    <label for="txtobservacion">Observación </label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-at"></i></span>
        </div>
        <input type="email" class="form-control" placeholder="Enter" id="txtobservacion" name="txtobservacion" value="<?php echo $obj->observacion;?>">
    </div>
  </div>

</div>           
<!-- page script -->
<script>
  
  $(function () {
    moment.locale('es');
    //Initialize Select2 Elements
    $('.select_dep').select2({theme: 'bootstrap4'});$('.select_pro').select2({theme: 'bootstrap4'});
    $('.select_dis').select2({theme: 'bootstrap4'});$('#sltgenero').select2({theme: 'bootstrap4'});
    $('.select_lid').select2({theme: 'bootstrap4'});$('.select_rec').select2({theme: 'bootstrap4'});
    $('.select_rel').select2({theme: 'bootstrap4'});$('#slt_e_c').select2({theme: 'bootstrap4'});
    $('.select_expcom').select2({theme: 'bootstrap4'});$('#slt_t_d').select2({theme: 'bootstrap4'});  
    
    $('#txtfechanac').daterangepicker({
      autoUpdateInput: false,
      singleDatePicker: true,
      showDropdowns: true,
      minYear: 1950,
      maxYear: 2002
    });

    $('#txtfechanac').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
    });

  });

</script>