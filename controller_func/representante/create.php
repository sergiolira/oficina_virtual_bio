<?php
session_start();
include_once("../../model_class/representante.php");
$obj=new representante();
$obj->id_representante=$_GET["id"];
$obj->consultar_representante();
?>
<div class="row">
            <div class="col-4">
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
            <div class="col-4">
              <label for="txtapep">Apellido paterno <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_apep"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Apellido paterno" id="txtapep" name="txtapep" value="<?php echo $obj->apellidopaterno;?>">
              </div>
            </div>
            <div class="col-4">
              <label for="txtapem">Apellido materno <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_apem"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Apellido materno" id="txtapem" name="txtapem" value="<?php echo $obj->apellidomaterno;?>">
              </div>
            </div>
             <div class="col-4">
              <label for="txtruc">RUC/Usuario <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_ruc">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter RUC"  maxlength="11" value="<?php echo $obj->ruc;?>" <?php if($_GET["id"]>0){ echo 'disabled id="txtruc" name=""';}else{ echo ' id="txtruc" name="txtruc" ';}?>>
              </div>
            </div>
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
              <label for="txtrazons">Razon social <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_razons"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter razon social" id="txtrazons" name="txtrazons"   value="<?php echo $obj->razon_social;?>">
              </div>
            </div>
            <div class="col-4">
              <label for="txttelefono">Telefono</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Telefono" id="txttelefono" name="txttelefono" maxlength="9"  value="<?php echo $obj->telefono;?>">
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
            <div class="col-4">
              <label for="txtsponsor">RUC / Sponsor <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_sponsor">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Sponsor Ruc Enter "  maxlength="11"  value="<?php echo $obj->patrocinador_directo; ?>" <?php if($_GET["id"]>0){ echo 'disabled id="" name=""';}else{ echo ' id="txtsponsor" name="txtsponsor" ';}?>>
              </div>
            </div>
            <div class="col-4">
              <label for="lbldsponsor">Sponsor (Nombres)</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-arrow-left"></i></span>
                  </div>
                  <label  class="form-control" id="lbldsponsor"  maxlength="11"  value="" >---- ---- ----</label>
              </div>
            </div>
            <div class="col-4">
              <label for="sltposicion">Posición <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_posicion">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-crosshairs"></i></span>
                  </div>
                  <select class="form-control select2" style="width: 80%;" id="sltposicion" name="sltposicion" <?php if($_GET["id"]>0){ echo "disabled";}?>>
                    <?php if($_SESSION["id_tipo_red_mlm"]=="3"){?>
                    <option value="1" <?php if($obj->posicion=="1"){echo "selected";}?>>1 - Posición </option>
                    <option value="2" <?php if($obj->posicion=="2"){echo "selected";}?>>2 - Posición </option>
                    <?php }?>
                    <?php if($_SESSION["id_tipo_red_mlm"]=="5"){?>
                    <option value="1" <?php if($obj->posicion=="1"){echo "selected";}?>>1 - Posición </option>
                    <option value="2" <?php if($obj->posicion=="2"){echo "selected";}?>>2 - Posición </option>
                    <option value="3" <?php if($obj->posicion=="3"){echo "selected";}?>>3 - Posición </option>
                    <?php }?>
                    <?php if($_SESSION["id_tipo_red_mlm"]=="6"){?>
                    <option value="1" <?php if($obj->posicion=="1"){echo "selected";}?>>1 - Posición </option>
                    <option value="2" <?php if($obj->posicion=="2"){echo "selected";}?>>2 - Posición </option>
                    <option value="3" <?php if($obj->posicion=="3"){echo "selected";}?>>3 - Posición </option>
                    <option value="4" <?php if($obj->posicion=="4"){echo "selected";}?>>4 - Posición </option>
                    <option value="5" <?php if($obj->posicion=="5"){echo "selected";}?>>5 - Posición </option>
                    <option value="6" <?php if($obj->posicion=="6"){echo "selected";}?>>6 - Posición </option>
                    <?php }?>
                  </select>
              </div>
            </div>
            <div class="col-8">
              <label for="txtobser">Comentario</label>
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
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    });
  });
</script>