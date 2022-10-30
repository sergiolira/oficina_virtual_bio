<?php
include_once("../../model_class/asignacion_licencia.php");
include_once("../../model_class/licencia.php");
include_once("../../model_class/herramienta_tecnologica.php");
$obj_a_lic = new asignacion_licencia();
$obj_lic = new licencia();
$obj_herr = new herramienta_tecnologica();
$obj_a_lic->id_asignacion_licencia=$_REQUEST["id"]; 

session_start();
$_SESSION["id_lic"] = $_REQUEST["id_lic"]; 
$obj_a_lic->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_a_lic->id_asignacion_licencia; ?>">
                   
                   
                   
                   <div class="col-4">
                            <label for="txt_h_tec">Herramienta tecnologica<i class="text-danger" title="Ingrese el herramienta tecnologica">*</i></label>
                            <label class="text-danger msj_txt_h_tec"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_h_tec" name="slt_h_tec" id="slt_h_tec" >
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
                            <label for="txt_lic">Licencia<i class="text-danger" title="Ingrese la licencia">*</i></label>
                            <label class="text-danger msj_txt_lic"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_lic" name="slt_lic" id="slt_lic" >
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
                            <label for="txt_f_a">Fecha de asignación<i class="text-danger" title="Ingrese una fecha de asignación">*</i></label>
                            <label class="text-danger msj_txt_f_a"></label>
                           <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>      
                              <?php if($_REQUEST["id"]>0){?>                       
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_a" name="txt_f_a" 
                              value="<?php echo  date('Y-m-d',strtotime($obj_a_lic->fecha_asignacion));?>"/>                          
                              <?php }else{?>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_a" name="txt_f_a" 
                              value="<?php echo date('Y-m-d');?>"/>
                                <?php }?>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_v">Fecha de vencimiento<i class="text-danger" title="Ingrese una fecha de vencimiento">*</i></label>
                            <label class="text-danger msj_txt_f_v"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <?php if($_REQUEST["id"]>0){?>   
                                <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_v" name="txt_f_v" 
                                value="<?php echo date('Y-m-d',strtotime($obj_a_lic->fecha_vencimiento)); ?>"/>
                                <?php }else{?>
                                  <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_v" name="txt_f_v" 
                                value="<?php echo date('Y-m-d'); ?>"/>
                                <?php } ?>
                              </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese una observacion"></i></label>
                            <label class="text-danger msj_txt_obs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_obs" name="txt_obs" value="<?php echo $obj_a_lic->observacion; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>
  $('#txt_f_a').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    maxDate: moment(),
    locale: {
      format: 'YYYY-MM-DD',
    }
  });

  $('#txt_f_v').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'))+10,
    locale: {
      format: 'YYYY-MM-DD',
    }
  });




  $('.select_lic').select2({
        theme: 'bootstrap4'
    });
  $('.select_h_tec').select2({
      theme: 'bootstrap4'
  });
  
  fntValidText();
  fntValidTextSpecial();
  fntValidNumber();
</script>
