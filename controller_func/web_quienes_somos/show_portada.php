<?php
require_once "../../model_class/banner_portadas.php";
$obj_pt = new banner_portadas();

?>

<div>

    <button type="button" class="btn btn-success cargar_img_portada" >Cambiar</button>
    
    <div class="contenedor-imagen">
        <?php 
            $obj_pt->id_banner_portadas = 1;
            $rs_foto_portada=$obj_pt->read();
            while($fila=mysqli_fetch_assoc($rs_foto_portada)){ 
        ?>
            <img src="<?php echo $fila["url"]; ?>" alt="">
        <?php } ?>
    </div>
</div>
