<?php
include_once("../../model_class/estado_contrato.php");

$obj_e_con = new estado_contrato();
$obj_e_con->id_estado_contrato=$_REQUEST["id"];
$obj_e_con->consult();

if($obj_e_con->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_e_con->id_estado_contrato; ?>">
                   
                   <div class="col-4">
                            <label for="txt_e_con">Estado de contrato<i class="text-danger" title="Ingrese estado de contrato"></i>
                            <label class="txt-danger msj-txt_nombre"></label></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_e_con" name="txt_e_con" 
                              value="<?php echo $obj_e_con->estado_contrato; ?>"/>
                          </div>
                   </div>
                   

                   <div class="col-4">
                         <label for="txt_estado">Estado<label class="text-danger msj-txt-inf"></label>  </label>
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
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_e_con->fechaactualiza; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label >Fecha de creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_e_con->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_e_con->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_e_con->id_usuarioregistro; ?>"/>
                          </div>
                   </div>
                   
                    
</div>