<div class="col-12">
    <center><div class="card card-outline card-success"><strong>Cargar fotos</strong></div></center>
</div> 

<div class="col-12">
    <label for="file_foto_portada">Importe una foto <!--/ Tamaño: 98px ancho por 120px altura-->

    <label class="text-danger msj-file_foto_portada"></label>
    <div class="input-group">
        <div class="file-loading"> 
            <input id="file_foto_portada" name="file_foto_portada" type="file" accept="image/*">
        </div>
    </div>
</div>


<script>

    /**tamaño de imagen 400 x 400 */
$("#file_foto_portada").fileinput({
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