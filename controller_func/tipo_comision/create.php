<?php 
require_once "../../model_class/tipo_comision.php";
$obj_tc = new tipo_com();
$obj_tc->id_tipo_comision = $_REQUEST['id'];
$obj_tc->consult();
?>
<div class="row">
    <input type="hidden" name="id" id="id" value="<?php echo $obj_tc->id_tipo_comision; ?>">  
   
      
    <div class="col-4">
        <label for="txt_cant">Tipo de comision<i class="text-danger" title="Ingrese Cantidad">*</i>
            <label class="text-danger msj-txt_genero"></label></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter" id="txt_tipocomision" name="txt_tipocomision" value="<?php echo $obj_tc->tipocomision; ?>">
        </div>
    </div>
    
</div>