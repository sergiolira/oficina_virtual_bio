<?php
include_once("../../model_class/producto.php");
$obj_prod= new producto();
$obj_prod->id_producto=$_REQUEST["id"];
$obj_prod->consult();

?>

<input type="hidden" name="id" id="id" value="<?php echo $obj_prod->id_producto; ?>">
<div class="col-12">
    <center><div class="card card-outline card-success"><strong>Cargar fotos</strong></div></center>
</div> 

<div class="col-12">
    <label for="file_fotos_producto">Importe una foto / Tamaño: 98px ancho por 120px altura

    <label class="text-danger msj-file_fotos_producto"></label>
    <div class="input-group">
        <div class="file-loading"> 
            <input id="file_fotos_producto" name="file_fotos_producto" type="file" accept="image/*">
        </div>
    </div>
</div>


<script>

    /**tamaño de imagen 400 x 400 */
$("#file_fotos_producto").fileinput({
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