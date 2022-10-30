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

?>

  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_h_tec->id_herramienta_tecnologica; ?>">
                   
                   <div class="col-4">
                            <label for="txt_t_e">Tipo de equipo<i class="text-danger" title="Ingrese el tipo de equipo">*</i></label>
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
                            <label for="txt_desc">Descripción<i class="text-danger" title="Ingrese una descripción">*</i></label>
                            <label class="text-danger msj_txt_desc"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_desc" name="txt_desc" value="<?php echo $obj_h_tec->descripcion; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_m_e">Marca de equipo<i class="text-danger" title="Ingrese la marca del equipo">*</i></label>
                            <label class="text-danger msj_txt_m_e"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <select class="form-control select_m_e" name="slt_m_e" id="slt_m_e" >
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
                            <label for="txt_mod">Modelo<i class="text-danger" title="Ingrese un modelo">*</i></label>
                            <label class="text-danger msj_txt_mod"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_mod" name="txt_mod" value="<?php echo $obj_h_tec->modelo; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_n_s">Nro. de serial<i class="text-danger" title="Ingrese un Nro. de serial">*</i></label>
                            <label class="text-danger msj_txt_n_s"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_n_s" name="txt_n_s" value="<?php echo $obj_h_tec->nro_serial; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_c">Fecha de compra<i class="text-danger" title="Ingrese un fecha compra">*</i></label>
                            <label class="text-danger msj_txt_f_c"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              
                              <?php if($_REQUEST["id"]>0){?>                       
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_c" name="txt_f_c" 
                              value="<?php echo  date('Y-m-d',strtotime($obj_h_tec->fecha_compra));?>"/>                          
                              <?php }else{?>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_c" name="txt_f_c" 
                              value="<?php echo date('Y-m-d');?>"/>
                                <?php }?>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_g">Fecha de garantía<i class="text-danger" title="Ingrese un fecha de garantía">*</i></label>
                            <label class="text-danger msj_txt_f_g"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <?php if($_REQUEST["id"]>0){?>                       
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_g" name="txt_f_g" 
                              value="<?php echo  date('Y-m-d',strtotime($obj_h_tec->fecha_garantia));?>"/>                          
                              <?php }else{?>
                              <input type="text" class="form-control valid ValidTextSpecial"  id="txt_f_g" name="txt_f_g" 
                              value="<?php echo date('Y-m-d');?>"/>
                                <?php }?>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_pre">Precio de compra<i class="text-danger" title="Ingrese un Precio">*</i></label>
                            <label class="text-danger msj_txt_pre"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="number" class="form-control valid ValidTextSpecial"  id="txt_pre" name="txt_pre" value="<?php echo $obj_h_tec->precio; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_c_e">Condición del equipo<i class="text-danger" title="Ingrese la condicion dej equipo">*</i></label>
                            <label class="text-danger msj_txt_c_e"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <select class="form-control select_c_e" name="slt_c_e" id="slt_c_e" >
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
                            <label for="txt_v_a">Valor actual<i class="text-danger" title="Ingrese un Precio">*</i></label>
                            <label class="text-danger msj_txt_v_a"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="number" class="form-control valid ValidTextSpecial"  id="txt_v_a" name="txt_v_a" value="<?php echo $obj_h_tec->valor_actual; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>
    $('#txt_f_c').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    maxDate:moment(),
    locale: {
      format: 'YYYY-MM-DD',
    }
  });
  $('#txt_f_g').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'))+10,
    
    locale: {
      format: 'YYYY-MM-DD',
    }
  });

    $('.select_t_e').select2({
        theme: 'bootstrap4'
    });
    $('.select_c_e').select2({
        theme: 'bootstrap4'
    });
    $('.select_m_e').select2({
        theme: 'bootstrap4'
    });
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
</script>
