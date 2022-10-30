<?php
include_once("../../model_class/representante.php");
$obj=new representante();
$obj->id_representante=$_GET["id"];
$obj->consultar_representante();
$estado="Activo";
$styleclass="lead";
if($obj->estado=="0"){
  $estado="Inactivo";
  $styleclass="text-danger";
}
?>
<div class="row">
            <div class="col-4">
              <label for="txtnombre">Nombres</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="hidden" name="es" id="es" value="1">
                  <input type="hidden" name="tiuser" id="tiuser" value="2">
                  <input type="hidden" name="hdnid" id="hdnid" value="<?php echo $_GET["id"];?>">
                  <input type="text" class="form-control" placeholder="Enter Nombre" id="txtnombre" name="txtnombre" value="<?php echo $obj->nombre;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txtapep">Apellido paterno</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Apellido paterno" id="txtapep" name="txtapep" value="<?php echo $obj->apellidopaterno;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txtapem">Apellido materno</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Apellido materno" id="txtapem" name="txtapem" value="<?php echo $obj->apellidomaterno;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txtruc">RUC</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter RUC" id="" name="" value="<?php echo $obj->ruc;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txtrazons">Razon Social</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter razon social" id="txtrazons" name="txtrazons"   value="<?php echo $obj->razon_social;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txttelefono">Telefono</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Telefono" id="txttelefono" name="txttelefono"   value="<?php echo $obj->telefono;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txtcorreo">Correo</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                  </div>
                  <input type="email" class="form-control" placeholder="Enter Correo" id="txtcorreo" name="txtcorreo" value="<?php echo $obj->correo;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txtobser">Observación</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-eye"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Observacion" id="txtobser" name="txtobser"   value="<?php echo $obj->observacion;?>" disabled>
              </div>
            </div>
                        <div class="col-4">
              <label for="txtpat">Fecha de Creación</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Patrocinador" id="txtpat" name="txtpat" value="<?php echo $obj->fecharegistro;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txtpat">Fecha de Actualización</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Patrocinador" id="txtpat" name="txtpat" value="<?php echo $obj->fechaactualiza;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txtpat">Creado Por</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Patrocinador" id="txtpat" name="txtpat" value="<?php echo $obj->id_usuarioregistro;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txtpat">Actualizado Por</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Patrocinador" id="txtpat" name="txtpat" value="<?php echo $obj->id_usuarioactualiza;?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="txtpat">Estado</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                  </div>
                  <input type="text" class="form-control <?php echo $styleclass;?>" placeholder="Enter Patrocinador" id="txtpat" name="txtpat" value="<?php echo $estado?>" disabled>
              </div>
            </div>
          </div>
        <!-- page script -->
