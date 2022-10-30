<?php
include_once("../../model_class/web_footer_widget_desc.php");
include_once("../../model_class/web_footer_widget.php");
$obj_wfwd = new web_footer_widget_desc();
$obj_wfw = new web_footer_widget();
$obj_wfwd->id_web_footer_widget_desc=$_REQUEST["id"];
$obj_wfwd->consult();

?>


  <div class="row"> 
        <input type="hidden" name="id" value="<?php echo $obj_wfwd->id_web_footer_widget_desc; ?>">
        
        <div class="col-4">
                <label for="txt_wfwd">Web footer widget desc<i class="text-danger" title="Ingrese Web footer widget desc">*</i></label>
                <label class="text-danger msj_txt_wfwd"></label>
              <div class="input-group mb-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                  </div>
                  <input type="text" class="form-control valid validText"  id="txt_wfwd" name="txt_wfwd" 
                  value="<?php echo $obj_wfwd->web_footer_widget_desc; ?>"/>
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
                  value="<?php echo $obj_wfwd->enlace; ?>"/>
              </div>
        </div>
        <div class="col-4">
                <label for="slt_wfw">Web footer widget<i class="text-danger" title="Ingrese Web footer widget">*</i></label>
                <label class="text-danger msj_slt_wfw"></label>
              <div class="input-group mb-2">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-eye"></i></span>
                  </div>
                  <select class="form-control select_wfw" name="slt_wfw" id="slt_wfw" >
                  <option value="0">SELECCIONAR</option>
                  <?php $res= $obj_wfw->combo();
                    while($fila= mysqli_fetch_assoc($res)){  ?>
                    <option <?php if($obj_wfwd->id_web_footer_widget==$fila["id_web_footer_widget"]){ echo "selected"; }?> 
                    value="<?php echo $fila["id_web_footer_widget"]; ?>"><?php echo $fila["web_footer_widget"]; ?></option>
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
                  value="<?php echo $obj_wfwd->observacion; ?>"/>
              </div>
        </div>
</div>
<script src="js/valid.js"></script>
<script>
  $('.select_wfw').select2({
        theme: 'bootstrap4'
    });
    fntValidNumber()
    fntValidText();
    fntValidTextSpecial();

</script>
