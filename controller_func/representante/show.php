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
                  <input type="hidden" name="tiuser" id="tiuser" value="1">
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
              <label for="">Sponsor RUC</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                  </div>
                  <input type="text" class="form-control"  id="" name="" value="<?php echo $obj->patrocinador_directo; ?>" disabled>
              </div>
            </div>
            <div class="col-4">
              <label for="sltposicion">Posición </label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                  </div>
                  <select class="form-control select2" style="width: 80%;" id="sltposicion" name="sltposicion" disabled>
                    <option value="1" <?php if($obj->posicion=="1"){echo "selected";}?> >1 - Posición </option>
                    <option value="2" <?php if($obj->posicion=="2"){echo "selected";}?> >2 - Posición </option> 
                    <option value="3" <?php if($obj->posicion=="3"){echo "selected";}?> >3 - Posición </option> 
                    <option value="4" <?php if($obj->posicion=="4"){echo "selected";}?> >4 - Posición </option> 
                    <option value="5" <?php if($obj->posicion=="5"){echo "selected";}?> >5 - Posición </option> 
                    <option value="6" <?php if($obj->posicion=="6"){echo "selected";}?> >6 - Posición </option> 
                  </select>
              </div>
            </div>
            <div class="col-4">
              <label for="txtobser">Comentario</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-eye"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Comentario" id="txtobser" name="txtobser"   value="<?php echo $obj->observacion;?>" disabled>
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
              <label for="txtusucre">Creado Por</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" class="form-control"  id="txtusucre" name="txtusucre" value="<?php echo $obj->id_usuarioregistro;?>" disabled>
              </div> 
            </div>
            <div class="col-4">
              <label for="txtusuact">Actualizado Por</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" id="txtusuact" name="txtusuact" value="<?php echo $obj->id_usuarioactualiza;?>" disabled>
              </div> 
            </div>
            <div class="col-4">
              <label for="txtestado">Estado</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                  </div>
                  <input type="text" class="form-control <?php echo $styleclass;?>" placeholder="Enter Patrocinador" id="txtestado" name="txtestado" value="<?php echo $estado?>" disabled>
              </div> 
            </div>
</div> 

       