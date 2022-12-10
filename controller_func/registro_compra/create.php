<?php
include_once("../../model_class/registro_compra.php");
include_once("../../model_class/divisa.php");
include_once("../../model_class/producto.php");
$obj_r_c = new registro_compra();
$obj_div= new divisa();
$obj_pro= new producto();

$obj_r_c->id_registro_compra=$_REQUEST["id"];
$obj_r_c->consult();

?>


  <div class="row"> 
                   <input type="hidden" name="id" value="<?php echo $obj_r_c->id_registro_compra; ?>">
                   
                   <div class="col-4">
                            <label for="slt_pro">Producto<i class="text-danger" title="Ingrese el producto">*</i></label>
                            <label class="text-danger msj_slt_pro"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <select class="form-control select_pro" name="slt_pro" id="slt_pro" >
                              <option value="0">SELECCIONAR</option>
                                <?php $res= $obj_pro->combo();
                                while($fila= mysqli_fetch_assoc($res)){  ?>
                                <option <?php if($obj_r_c->id_producto==$fila["id_producto"]){ echo "selected"; }?> 
                                value="<?php echo $fila["id_producto"]; ?>"><?php echo $fila["nombre_producto"]; ?></option>
                                <?php }?>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="slt_div">Divisa<i class="text-danger" title="Ingrese la divisa">*</i></label>
                            <label class="text-danger msj_slt_div"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <select class="form-control select_div" name="slt_div" id="slt_div" >
                                <option value="1">Dolares</option>
                                        
                              </select>
                            </div>
                   </div>
                   <div class="col-4">
                            <label for="txt_p_u">Precio unitario<i class="text-danger" title="Ingrese el precio unitario">*</i></label>
                            <label class="text-danger msj_txt_p_u"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" class="form-control valid validNumberD" id="txt_p_u"  min="0"
                              name="txt_p_u" value="<?php if($obj_r_c->precio_unitario==""){echo "0";}else{echo $obj_r_c->precio_unitario;}?>"/>
                          </div>
                   </div>

                   <?php if($obj_r_c->cantidad==""){ ?>
                   <div class="col-4">
                            <label for="txt_can">Cantidad<i class="text-danger" title="Ingrese la cantidad">*</i></label>
                            <label class="text-danger msj_txt_can"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="number" class="form-control valid validNumber"  id="txt_can" name="txt_can" min="1"
                              value="<?php if($obj_r_c->cantidad==""){echo "1";}else{echo $obj_r_c->cantidad;}?>"/>
                          </div>
                   </div>
                    <?php }else{ ?>
                      <div class="col-4">
                              <label for="txt_can">Cantidad<i class="text-danger" title="Ingrese la cantidad">*</i></label>
                              <label class="text-danger msj_txt_can"></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                </div>
                                <input type="number" class="form-control valid validNumber"  id="txt_can" name="txt_can" min="1" readonly
                                value="<?php if($obj_r_c->cantidad==""){echo "1";}else{echo $obj_r_c->cantidad;}?>"/>
                            </div>
                      </div>
                    <?php } ?>
                   <div class="col-4">
                            <label for="txt_s_t">Total de compra<i class="text-danger" title="Ingrese el sub total">*</i></label>
                            <label class="text-danger msj_txt_s_t"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>
                              <input type="text" readonly class="form-control" id="txt_s_t" min="0"
                              name="txt_s_t" value="<?php if($obj_r_c->sub_total==""){echo "0";}else{echo $obj_r_c->sub_total;}?>"/>
                          </div>
                   </div>

                   
                   <div class="col-4">
                            <label for="txt_f_i">Fecha ingreso<i class="text-danger" title="Ingrese una fecha ingreso">*</i></label>
                            <label class="text-danger msj_txt_f_i"></label>
                           <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                              </div>      
                              <?php if($_REQUEST["id"]>0){?>                       
                              <input type="text" class="form-control"  id="txt_f_i" name="txt_f_i" 
                              value="<?php echo  date('Y-m-d',strtotime($obj_r_c->fecha_ingreso));?>"/>                          
                              <?php }else{?>
                              <input type="text" class="form-control "  id="txt_f_i" name="txt_f_i" 
                              value="<?php echo date('Y-m-d');?>"/>
                                <?php }?>
                            </div>
                   </div>
                   

                   <div class="col-4">
                            <label for="txt_obs">Observación<i class="text-danger" title="Ingrese una observacion"></i></label>
                            <label class="text-danger msj_txt_obs"></label>
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="far fa-eye"></i></span>
                              </div>
                              <input type="text" class="form-control"  id="txt_obs" name="txt_obs" value="<?php echo $obj_r_c->observacion; ?>"/>
                          </div>
                   </div>
                    
</div>
<script src="js/valid.js"></script>
<script>

    $('.select_div').select2({
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

  
    fntValidText();
    fntValidTextSpecial();
    fntValidNumber();
    fntValidNumberDecimal();

</script>
