<?php
include_once("../../model_class/herramienta_tecnologica.php");
include_once("../../model_class/tipo_equipo.php");
include_once("../../model_class/marca_equipo.php");
include_once("../../model_class/condicion_equipo.php");
$obj_h_tec = new herramienta_tecnologica();
$obj_t_e = new tipo_equipo();
$obj_m_e = new marca_equipo();
$obj_c_e = new condicion_equipo();
$obj_h_tec->id_herramienta_tecnologica=$_REQUEST["id"];
$obj_h_tec->consult();

if($obj_h_tec->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_h_tec->id_herramienta_tecnologica; ?>">
                   <div class="col-4">
                            <label for="txt_t_e">Tipo de equipo<i class="text-danger" title="Ingrese herramienta tecnologica"></i></label>
                            <label class="text-danger msj_txt_t_e"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_t_e" name="slt_t_e" id="slt_t_e" >
                              <option value="0">SELECCIONAR</option>
                              <?php $res= $obj_t_e->combo();
                                    while($fila= mysqli_fetch_assoc($res)){  ?>
                                    <option <?php if($obj_h_tec->id_tipo_equipo==$fila["id_tipo_equipo"]){
                                        echo "selected"; }?> value="<?php echo $fila["id_tipo_equipo"]; ?>"><?php echo $fila["tipo_equipo"]; ?></option>
                                        <?php }?>
                                        
                              </select>
                              </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_desc">Descripción<i class="text-danger" title="Ingrese desc"></i>
                            <label class="txt-danger msj-txt_desc"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_desc" name="txt_desc" 
                              value="<?php echo $obj_h_tec->descripcion; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_m_e">Marca de equipo<i class="text-danger" title="Ingrese la marca del equipo"></i></label>
                            <label class="text-danger msj_txt_m_e"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <select class="form-control select_m_e" name="slt_m_e" id="slt_m_e" disabled>
                              <option value="0">SELECCIONAR</option>
                              <?php $res= $obj_m_e->combo();
                                    while($fila= mysqli_fetch_assoc($res)){  ?>
                                    <option <?php if($obj_h_tec->id_marca_equipo==$fila["id_marca_equipo"]){
                                        echo "selected"; }?> value="<?php echo $fila["id_marca_equipo"]; ?>"><?php echo $fila["marca_equipo"]; ?></option>
                                        <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_mod">Modelo<i class="text-danger" title="Ingrese mod"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_mod" name="txt_mod" 
                              value="<?php echo $obj_h_tec->modelo; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_n_s">Nro. de serial<i class="text-danger" title="Ingrese el Nro. de serial"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_n_s" name="txt_n_s" 
                              value="<?php echo $obj_h_tec->nro_serial; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_c">Fecha de compra<i class="text-danger" title="Ingrese fecha compra"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_f_c" name="txt_f_c" 
                              value="<?php echo $obj_h_tec->fecha_compra; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_g">Fecha de garantía<i class="text-danger" title="Ingrese fecha garantia"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_f_g" name="txt_f_g" 
                              value="<?php echo $obj_h_tec->fecha_garantia; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_pre">Precio de compra<i class="text-danger" title="Ingrese precio"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_pre" name="txt_pre" 
                              value="<?php echo $obj_h_tec->precio; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_c_e">Condición de equipo<i class="text-danger" title="Ingrese la condicion equipo"></i></label>
                            <label class="text-danger msj_txt_c_e"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_c_e" name="slt_c_e" id="slt_c_e" disabled>
                              <option value="0">SELECCIONAR</option>
                              <?php $res= $obj_c_e->combo();
                                    while($fila= mysqli_fetch_assoc($res)){  ?>
                                    <option <?php if($obj_h_tec->id_condicion_equipo==$fila["id_condicion_equipo"]){
                                        echo "selected"; }?> value="<?php echo $fila["id_condicion_equipo"]; ?>"><?php echo $fila["condicion_equipo"]; ?></option>
                                        <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_v_a">Valor actual<i class="text-danger" title="Ingrese valor actual"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_v_a" name="txt_v_a" 
                              value="<?php echo $obj_h_tec->valor_actual; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <?php 
                            $status_asig="";
                            if($obj_h_tec->status_asignacion == 0){
                              $status_asig='libre';
                            }else{
                              $status_asig='ocupado';
                            }
                               
                              ?>
                            <label for="txt_s_a">Status asignación<i class="text-danger" title="Ingrese status asignacion"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_s_a" name="txt_s_a" 
                              value="<?php echo $status_asig; ?>"/>
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
                              <input type="text" class="form-control"  value="<?php echo $obj_h_tec->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha de creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_h_tec->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_h_tec->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  value="<?php echo $obj_h_tec->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>