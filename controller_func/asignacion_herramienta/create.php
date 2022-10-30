<?php
include_once("../../model_class/asignacion_herramienta.php");
include_once("../../model_class/usuario.php");
include_once("../../model_class/herramienta_tecnologica.php");
$obj_a_h = new asignacion_herramienta();
$obj_usuario = new usuario();
$obj_herramienta = new herramienta_tecnologica();
$obj_a_h->id_asignacion_herramienta=$_REQUEST["id"];
session_start();
$_SESSION["id_h_tec"] = $_REQUEST["id_h_tec"]; 
$obj_a_h->consult();


?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_a_h->id_asignacion_herramienta; ?>">
                   <div class="col-4">
                            <label for="txt_usu">Usuario<i class="text-danger" title="Ingrese el usuario">*</i></label>
                            <label class="text-danger msj_txt_usu"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_usu" name="slt_usu" id="slt_usu" >
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
                              <select class="form-control select_h_tec" name="slt_h_tec" id="slt_h_tec" >
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
                            <label for="txt_f_a">Fecha de asignación<i class="text-danger" title="Ingrese una fecha de asignación">*</i></label>
                            <label class="text-danger msj_txt_f_a"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <?php if($_REQUEST["id"]>0){?>                       
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_a" name="txt_f_a" 
                              value="<?php echo  date('Y-m-d',strtotime($obj_a_h->fecha_asignacion));?>"/>                          
                              <?php }else{?>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_a" name="txt_f_a" 
                              value="<?php echo date('Y-m-d');?>"/>
                                <?php }?>
                          </div>
                   </div>
                   <?php if($_REQUEST["id"]>0){?>
                   <div class="col-4">
                            <label for="txt_f_l">Fecha de liberación<i class="text-danger" title="Ingrese una fecha de liberacion">*</i></label>
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
                              value="<?php echo  date('Y-m-d',strtotime($obj_a_h->fecha_liberacion));?>" />  
                              <?php }else{?>
                              <input type="text" class="form-control"  id="txt_f_l" name="txt_f_l" 
                              value="<?php echo date('Y-m-d');?>" disabled/>
                                <?php }?>
                          </div>
                   </div>
                   <?php }?>
                   <div class="col-8">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese una observacion"></i></label>
                            <label class="text-danger msj_txt_obs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_obs" name="txt_obs" 
                              value="<?php echo $obj_a_h->observacion; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>
  $('#check_fec_liberacion').change(function(){
  if($(this).is(':checked')) {
    $('#txt_f_l').prop('disabled', false);
  } else {    
    $('#txt_f_l').prop('disabled', true);
  }
  });
  $('#txt_f_a').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    maxDate:moment(),
    locale: {
      format: 'YYYY-MM-DD',
    }
  });
  $('#txt_f_l').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    maxDate:moment(),
    locale: {
      format: 'YYYY-MM-DD',
    }
  });
  
    $('.select_h_tec').select2({
        theme: 'bootstrap4'
    });
    $('.select_usu').select2({
        theme: 'bootstrap4'
    });
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
</script>
