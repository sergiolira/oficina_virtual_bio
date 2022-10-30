<?php
include_once("../../model_class/asignacion_licencia.php");
include_once("../../model_class/licencia.php");
include_once("../../model_class/herramienta_tecnologica.php");
$obj_a_lic = new asignacion_licencia();
$obj_lic = new licencia();
$obj_herr = new herramienta_tecnologica();
$obj_a_lic->id_asignacion_licencia=$_REQUEST["id"];
$obj_a_lic->consult();

if($obj_a_lic->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_a_lic->id_asignacion_licencia; ?>">
                   
                   <div class="col-4">
                            <label for="txt_h_tec">Herramienta tecnologica<i class="text-danger" title="Ingrese el h_tec"></i></label>
                            <label class="text-danger msj_txt_h_tec"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_h_tec" name="slt_h_tec" id="slt_h_tec" disabled>
                              <option value="0">SELECCIONAR</option>
                              <?php $res= $obj_herr->combo();
                                    while($fila= mysqli_fetch_assoc($res)){  ?>
                                    <option <?php if($obj_a_lic->id_herramienta_tecnologica==$fila["id_herramienta_tecnologica"]){
                                        echo "selected"; }?> value="<?php echo $fila["id_herramienta_tecnologica"]; ?>"><?php echo $fila["descripcion"]; ?></option>
                                        <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_lic">Licencia<i class="text-danger" title="Ingrese la licencia"></i></label>
                            <label class="text-danger msj_txt_lic"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_lic" name="slt_lic" id="slt_lic" disabled>
                              <option value="0">SELECCIONAR</option>
                              <?php $res= $obj_lic->combo();
                                    while($fila= mysqli_fetch_assoc($res)){  ?>
                                    <option <?php if($obj_a_lic->id_licencia==$fila["id_licencia"]){
                                        echo "selected"; }?> value="<?php echo $fila["id_licencia"]; ?>"><?php echo $fila["licencia"]; ?></option>
                                        <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_a">Fecha de asignación<i class="text-danger" title="Ingrese fecha asignacion"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_f_a" name="txt_f_a" 
                              value="<?php echo $obj_a_lic->fecha_asignacion; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_v">Fecha de vencimiento<i class="text-danger" title="Ingrese fecha vencimiento"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_f_v" name="txt_f_v" 
                              value="<?php echo $obj_a_lic->fecha_vencimiento; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese obs"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_obs" name="txt_obs" 
                              value="<?php echo $obj_a_lic->observacion; ?>"/>
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
                              <input type="text" class="form-control"  value="<?php echo $obj_a_lic->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha de creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_a_lic->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_a_lic->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_a_lic->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>