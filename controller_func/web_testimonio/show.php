<?php
include_once("../../model_class/web_testimonio.php");
$obj_web_testimonio= new web_testimonio();
$obj_web_testimonio->id_web_testimonio=$_REQUEST["id"];
$obj_web_testimonio->consult();
if($obj_web_testimonio->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 
?>
<div class="row"> 
                <input type="hidden" name="id" value="<?php echo $obj_web_testimonio->id_web_testimonio; ?>">
                <div class="col-4">
                    <label for="txt_testimonio">Testimonio<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_testimonio"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_testimonio" name="txt_testimonio" value="<?php echo $obj_web_testimonio->testimonio; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_nombre">Nombre<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_nombre"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_nombre" name="txt_nombre" value="<?php echo $obj_web_testimonio->nombre; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_ape_paterno">Apellido paterno<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_ape_paterno"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_ape_paterno" name="txt_ape_paterno" value="<?php echo $obj_web_testimonio->apellido_paterno; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_ape_materno">Apellido materno<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_ape_materno"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_ape_materno" name="txt_ape_materno" value="<?php echo $obj_web_testimonio->apellido_materno; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_cargo">Cargo<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_cargo"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid validText"  id="txt_cargo" name="txt_cargo" value="<?php echo $obj_web_testimonio->cargo; ?>"/>
                    </div>
                </div>
                   <div class="col-4">
                            <label for="txt_observacion">Observación<i class="text-danger"></i></label>
                            <label class="text-danger"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_observacion" name="txt_observacion" value="<?php echo $obj_web_testimonio->observacion; ?>"/>
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
                              value="<?php echo $obj_web_testimonio->fechaactualiza; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Fecha creación</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_testimonio->fecharegistro; ?>"/>
                          </div>
                   </div>

                   <div class="col-4">
                            <label >Actualizado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_testimonio->id_usuarioactualiza; ?>"/>
                          </div>
                   </div>
                   
                   <div class="col-4">
                            <label >Creado por</label>
                            
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-user"></i></span>
                              </div>
                              <input type="text" class="form-control"  
                              value="<?php echo $obj_web_testimonio->id_usuarioregistro; ?>"/>
                          </div>
                   </div>  
</div>