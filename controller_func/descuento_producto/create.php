<?php
include_once("../../model_class/descuento_producto.php");
include_once("../../model_class/tipo_descuento.php");
include_once("../../model_class/producto.php");
$obj_d_p = new descuento_producto();
$obj_t_d= new tipo_descuento();
$obj_pro= new producto();

$obj_d_p->id_descuento_producto=$_REQUEST["id"];
$obj_d_p->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_d_p->id_descuento_producto; ?>">
                   
                   <div class="col-4">
                            <label for="slt_t_d">Tipo de descuento<i class="text-danger" title="Ingrese el tipo de descuento">*</i></label>
                            <label class="text-danger msj_slt_t_d"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <select class="form-control select_t_d" name="slt_t_d" id="slt_t_d" >
                              <option value="0">SELECCIONAR</option>
                                <?php $res= $obj_t_d->combo();
                                while($fila= mysqli_fetch_assoc($res)){  ?>
                                <option <?php if($obj_d_p->id_tipo_descuento==$fila["id_tipo_descuento"]){ echo "selected"; }?> 
                                value="<?php echo $fila["id_tipo_descuento"]; ?>"><?php echo $fila["tipo_descuento"]; ?></option>
                                <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_monto">Monto de descuento<i class="text-danger" title="Ingrese el monto">*</i></label>
                            <label class="text-danger msj_txt_monto"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validNumberD"  id="txt_monto" name="txt_monto" value="<?php echo $obj_d_p->monto; ?>"/>
                          </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_i">Fecha de inicio<i class="text-danger" title="Ingrese una fecha de inicio">*</i></label>
                            <label class="text-danger msj_txt_f_i"></label>
                           <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>      
                              <?php if($_REQUEST["id"]>0){?>                       
                              <input type="text" class="form-control"  id="txt_f_i" name="txt_f_i" 
                              value="<?php echo  date('Y-m-d',strtotime($obj_d_p->fecha_inicio));?>"/>                          
                              <?php }else{?>
                              <input type="text" class="form-control"  id="txt_f_i" name="txt_f_i" 
                              value="<?php echo date('Y-m-d');?>"/>
                                <?php }?>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_f_f">Fecha final<i class="text-danger" title="Ingrese una fecha fin">*</i></label>
                            <label class="text-danger msj_txt_f_f"></label>
                           <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>      
                              <?php if($_REQUEST["id"]>0){?>                       
                              <input type="text" class="form-control "  id="txt_f_f" name="txt_f_f" 
                              value="<?php echo  date('Y-m-d',strtotime($obj_d_p->fecha_fin));?>"/>                          
                              <?php }else{?>
                              <input type="text" class="form-control"  id="txt_f_f" name="txt_f_f" 
                              value="<?php echo date('Y-m-d');?>"/>
                                <?php }?>
                            </div>
                   </div>
                   
                   <div class="col-4">
                            <label for="slt_pro">Producto a descontar<i class="text-danger" title="Ingrese el producto">*</i></label>
                            <label class="text-danger msj_slt_pro"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <select class="form-control select_pro" name="slt_pro" id="slt_pro" >
                              <option value="0">SELECCIONAR</option>
                                <?php $res= $obj_pro->combo();
                                while($fila= mysqli_fetch_assoc($res)){  ?>
                                <option <?php if($obj_d_p->id_producto==$fila["id_producto"]){ echo "selected"; }?> 
                                value="<?php echo $fila["id_producto"]; ?>"><?php echo $fila["nombre_producto"]; ?></option>
                                <?php }?>
                                        
                              </select>
                            </div>
                   </div>

                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese una observacion"></i></label>
                            <label class="text-danger msj_txt_obs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_obs" name="txt_obs" value="<?php echo $obj_d_p->observacion; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>

    $('.select_t_d').select2({
        theme: 'bootstrap4'
    });
    $('.select_pro').select2({
        theme: 'bootstrap4'
    });
    $('#txt_f_i').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    maxDate: moment(),
    locale: {
      format: 'YYYY-MM-DD',
    }
  });

  $('#txt_f_f').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minDate: new Date(),
    
    maxYear: parseInt(moment().format('YYYY'))+10,
    locale: {
      format: 'YYYY-MM-DD',
    }
  });
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    fntValidNumberDecimal();

</script>
