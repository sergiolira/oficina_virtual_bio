<?php
include_once("../../model_class/web_sub_menu.php");
include_once("../../model_class/web_menu.php");
$obj_web_sm = new web_sub_menu();
$obj_web_menu = new web_menu();
$obj_web_sm->id_web_sub_menu=$_REQUEST["id"];
$obj_web_sm->consult();

?>


  <div class="row"> 
        <input type="hidden" name="id" value="<?php echo $obj_web_sm->id_web_sub_menu; ?>">
        
        <div class="col-4">
                <label for="txt_web_sm">Web sub menu<i class="text-danger" title="Ingrese el web sub menu">*</i></label>
                <label class="text-danger msj_txt_web_sm"></label>
              <div class="input-group mb-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                  </div>
                  <input type="text" class="form-control valid validText"  id="txt_web_sm" name="txt_web_sm" 
                  value="<?php echo $obj_web_sm->web_sub_menu; ?>"/>
              </div>
        </div>
        <div class="col-4">
                <label for="txt_enlace">Enlace<i class="text-danger" title="Ingrese el enlace">*</i></label>
                <label class="text-danger msj_txt_enlace"></label>
              <div class="input-group mb-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                  </div>
                  <input type="text" class="form-control valid "  id="txt_enlace" name="txt_enlace" 
                  value="<?php echo $obj_web_sm->enlace; ?>"/>
              </div>
        </div>
        <div class="col-4">
                <label for="slt_wm">Web menu<i class="text-danger" title="Ingrese web menu">*</i></label>
                <label class="text-danger msj_slt_wm"></label>
              <div class="input-group mb-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-eye"></i></span>
                  </div>
                  <select class="form-control select_wm" name="slt_wm" id="slt_wm" >
                  <option value="0">SELECCIONAR</option>
                  <?php $res= $obj_web_menu->combo();
                    while($fila= mysqli_fetch_assoc($res)){  ?>
                    <option <?php if($obj_web_sm->id_web_menu==$fila["id_web_menu"]){ echo "selected"; }?> 
                    value="<?php echo $fila["id_web_menu"]; ?>"><?php echo $fila["web_menu"]; ?></option>
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
                  <input type="text" class="form-control"  id="txt_obs" name="txt_obs" 
                  value="<?php echo $obj_web_sm->observacion; ?>"/>
              </div>
        </div>
</div>
<script src="js/valid.js"></script>
<script>
  $('.select_wm').select2({
        theme: 'bootstrap4'
    });
    fntValidNumber()
    fntValidText();
    fntValidTextSpecial();

</script>
