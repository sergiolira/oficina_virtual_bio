<?php
include_once("../../model_class/frecuencia.php");

$obj_frecuencia = new frecuencia();
$obj_frecuencia->id_frecuencia=$_REQUEST["id"];
$obj_frecuencia->consult();

if($obj_frecuencia->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_frecuencia->id_frecuencia; ?>">
                   
                   <div class="col-4">
                            <label for="txt_frec">Frecuencia<i class="text-danger" title="Ingrese frec"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Enter" id="txt_frec" name="txt_frec" value="<?php echo $obj_frecuencia->frecuencia; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese obs"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_obs" name="txt_obs" value="<?php echo $obj_frecuencia->observacion; ?>"/>
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
                            <label >Última actualización</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_frecuencia->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_frecuencia->fecharegistro; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_frecuencia->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_frecuencia->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>