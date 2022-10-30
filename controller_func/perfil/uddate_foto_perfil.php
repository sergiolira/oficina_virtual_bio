<?php
include_once("../../model_class/perfil.php");

$obj_r= new perfil();
$obj_r->id_usuario=$_REQUEST["id"];
$obj_r->consult();

?>

<input type="hidden" name="id" value="<?php echo $obj_r->id_usuario; ?>">
<div class="col-12">
            <center><div class="card card-outline card-success"><strong>Foto de perfil</strong></div></center>
        </div> 

        <div class="col-12">
            <label for="file_foto_perfil">Importe una foto de perfil / Tamaño: 98px ancho por 120px altura
    
            <?php if($_GET["id"]>0){?><i class="text-danger" title="Complete este campo">(Opcional)</i><?php }?>
            <label class="text-danger msj-file_foto_perfil"></label>
            <div class="input-group">
                <div class="file-loading"> 
                    <input id="file_foto_perfil" name="file_foto_perfil" type="file" accept="image/*">
                </div>
            </div>
        </div>

<script>

    /**tamaño de imagen 400 x 400 */
$("#file_foto_perfil").fileinput({
language: 'es',
fileType: "fas",
showUpload: false,
dropZoneEnabled: false,
showRemove: false,
maxFileCount: 1,
fileActionSettings: {
  showRemove: false,
  showUpload: false,
  showZoom: false,
  showDrag: false,}   
}); 
</script>