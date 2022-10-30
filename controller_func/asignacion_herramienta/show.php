<?php
include_once("../../model_class/asignacion_herramienta.php");
include_once("../../model_class/usuarios.php");
include_once("../../model_class/herramienta_tecnologica.php");
$obj_a_h = new asignacion_herramienta();
$obj_usuario = new usuario();
$obj_herramienta = new herramienta_tecnologica();
$obj_a_h->id_asignacion_herramienta=$_REQUEST["id"];
$obj_a_h->consult();

if($obj_a_h->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_a_h->id_asignacion_herramienta; ?>">
                   <div class="col-4">
                            <label for="txt_usu">Usuario<i class="text-danger" title="Ingrese el usuario"></i></label>
                            <label class="text-danger msj_txt_usu"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_usu" name="slt_usu" id="slt_usu" disabled>
                              <option value="0">SELECCIONAR</option>
                              <?php $res= $obj_usuario->combo();
                                    while($fila= mysqli_fetch_assoc($res)){  ?>
                                    <option <?php if($obj_a_h->id_usuario=$fila["id_usuario"]){
                                        echo "selected"; }?> value="<?php echo $fila["id_usuario"]; ?>">
                                        <?php echo $fila["num_documento"].' '.$fila["datos_usuario"]; ?></option>
                                        <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_h_tec">Herramienta tecnologica<i class="text-danger" title="Ingrese la herramienta tecnologica">*</i></label>
                            <label class="text-danger msj_txt_h_tec"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_h_tec" name="slt_h_tec" id="slt_h_tec" disabled>
                              <option value="0">SELECCIONAR</option>
                              <?php if($_REQUEST["id"]>0){
                                    $obj_herramienta->id_herramienta_tecnologica=$obj_a_h->id_herramienta_tecnologica;
                                    $res= $obj_herramienta->combo_herramientas_ocupadas_x_id_herramienta();
                                    }else{
                                    $res= $obj_herramienta->combo();
                                    }
                                    while($fila= mysqli_fetch_assoc($res)){  ?>
                                    <option <?php if($obj_a_h->id_herramienta_tecnologica=$fila["id_herramienta_tecnologica"]){
                                        echo "selected"; }?> value="<?php echo $fila["id_herramienta_tecnologica"]; ?>">
                                        <?php echo $fila["tipo_equipo"].' '.$fila["descripcion"]; ?></option>
                                        <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_a">Fecha de asignación<i class="text-danger" title="Ingrese la fecha de asignación"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_f_a" name="txt_f_a" 
                              value="<?php echo $obj_a_h->fecha_asignacion; ?>"/>
                          </div>
                   </div>
                   <?php if($_REQUEST["id"]>0){?>
                   <div class="col-4">
                            <label for="txt_f_l">Fecha de liberación<i class="text-danger" title="Ingrese una fecha de liberación">*</i></label>
                            <label class="text-danger msj_txt_f_l"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                              <span class="input-group-text"><i>
                                <?php if($_REQUEST["id"]>0 &&  date('Y-m-d',strtotime($obj_a_h->fecha_liberacion))!='1900-01-01'){?>
                                    <input id="check_fec_liberacion" type="checkbox" checked/>
                                  <?php }else{?>
                                    <input id="check_fec_liberacion" type="checkbox" />
                                  <?php }?>
                              </i>
                                  </span>
                              </div>
                              <?php if($_REQUEST["id"]>0 &&  date('Y-m-d',strtotime($obj_a_h->fecha_liberacion))=='1900-01-01'){?>                       
                              <input type="text" class="form-control"  id="txt_f_l" name="txt_f_l" 
                              value="<?php echo date('Y-m-d');?>" disabled/>                          
                              <?php }else if($_REQUEST["id"]>0 &&  date('Y-m-d',strtotime($obj_a_h->fecha_liberacion))!='1900-01-01'){?>
                                <input type="text" class="form-control"  id="txt_f_l" name="txt_f_l" 
                              value="<?php echo  date('Y-m-d',strtotime($obj_a_h->fecha_liberacion));?>" disabled/>  
                              <?php }else{?>
                              <input type="text" class="form-control"  id="txt_f_l" name="txt_f_l" 
                              value="<?php echo date('Y-m-d');?>" disabled/>
                                <?php }?>
                          </div>
                   </div>
                   <?php }?>
                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese obs"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_obs" name="txt_obs" 
                              value="<?php echo $obj_a_h->observacion; ?>"/>
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
                              <input type="text" class="form-control"  value="<?php echo $obj_a_h->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha de creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_a_h->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_a_h->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_a_h->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>