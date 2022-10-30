<?php
session_start();
include_once("../../model_class/representante.php");
$obj=new representante();
$obj->id_representante=$_GET["id"];
$obj->consultar_representante();
 $estado_d="";
 if($obj->ruc!=""){ $estado_d="disabled"; }

?>
<div class="row">
            <div class="col-4">
              <label for="txtnombre">Nombres <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_nom">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="hidden" name="es" id="es" value="1">
                  <input type="hidden" name="tiuser" id="tiuser" value="2">
                  <input type="hidden" name="txtsponsor" id="txtsponsor" value="Lider de Red">
                  <input type="hidden" name="sltposicion" id="sltposicion" value="0">
                  <input type="hidden" name="hdnid" id="hdnid" value="<?php echo $_GET["id"];?>">
                  <input type="hidden" name="list" id="list" value="0">
                  <input type="text" class="form-control" placeholder="Enter Nombre" id="txtnombre" name="txtnombre" value="<?php echo $obj->nombre;?>">
              </div>
            </div>
            <div class="col-4">
              <label for="txtapep">Apellido paterno  <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_apep"></label></label>
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
              <label for="txtruc">RUC / Usuario <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_ruc">   </label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter RUC" maxlength="11"  value="<?php echo $obj->ruc;?>" <?php echo $estado_d;?>   <?php if($_GET["id"]>0){ echo 'disabled id="  " name=""';}else{ echo ' id="txtruc" name="txtruc" ';}?>>
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
              <label for="txtrazons">Razon Social <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_razons"></label></label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter razon social" id="txtrazons" name="txtrazons" value="<?php echo $obj->razon_social;?>">
              </div>
            </div>
            <div class="col-4">
              <label for="txttelefono">Telefono</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Telefono" id="txttelefono" name="txttelefono"  maxlength="9" value="<?php echo $obj->telefono;?>">
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
            <div class="col-8">
              <label for="txtobser">Comentario</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-eye"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Observacion" id="txtobser" name="txtobser"   value="<?php echo $obj->observacion;?>">
              </div>
            </div>
          </div>
