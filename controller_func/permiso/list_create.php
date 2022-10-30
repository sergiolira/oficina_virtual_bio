<?php
include_once("../../model_class/permiso.php");
include_once("../../model_class/modulo.php");
$obj_p= new permiso();
$obj_m= new modulo();
$obj_p->id_rol=$_REQUEST["id"];
?>
<div class="col-md-12">
    <div class="tile">
        <div class="table-responsive">
            <table class="table">
                <input type="hidden" name="id" value="<?php echo $obj_p->id_rol; ?>">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Modulo</th>
                    <th>Ver</th>
                    <th>Crear</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                    </tr>
                </thead>
            <tbody>
            <?php 
            $rs_lista=$obj_m->read();
            $c=1;
            while($fila=mysqli_fetch_assoc($rs_lista)){  

                $obj_p->id_modulo=$fila["id_modulo"];
                $obj_p->id_rol=$_REQUEST["id"];
                $obj_p->consult_crud_x_rol_modulo();
            ?>
                <tr>
                <td><?php echo $c++?></td>
                <!--<td><?php echo $fila["id_modulo"];?></td>-->
                <td><?php echo $fila["modulo"];?></td>
                <td>
                    <div class="form-group">
                        <div class="custom-control custom-switch">                            
                            <input type="checkbox" class="custom-control-input switch_permiso"  <?php if($obj_p->ver==1){echo "checked";}?> 
                           name="customSwitch1<?php echo $fila["id_modulo"];?>" 
                            id="customSwitch1<?php echo $fila["id_modulo"];?>"
                            data-id="<?php echo $fila["id_modulo"];?>" data-desc="ver" data-idrol="<?php echo $_REQUEST["id"];?>">


                            <label class="custom-control-label" for="customSwitch1<?php echo $fila["id_modulo"];?>"></label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch_permiso" <?php if($obj_p->crear==1){echo "checked";}?>
                            name="customSwitch2<?php echo $fila["id_modulo"];?>"
                            id="customSwitch2<?php echo $fila["id_modulo"];?>" 
                            data-id="<?php echo $fila["id_modulo"];?>" data-desc="crear" data-idrol="<?php echo $_REQUEST["id"];?>">
                            <label class="custom-control-label" for="customSwitch2<?php echo $fila["id_modulo"];?>"></label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch_permiso" <?php if($obj_p->actualizar==1){echo "checked";}?> 
                            name="customSwitch3<?php echo $fila["id_modulo"];?>"
                            id="customSwitch3<?php echo $fila["id_modulo"];?>"
                            data-id="<?php echo $fila["id_modulo"];?>" data-desc="actualizar" data-idrol="<?php echo $_REQUEST["id"];?>">
                            <label class="custom-control-label" for="customSwitch3<?php echo $fila["id_modulo"];?>"></label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input switch_permiso" <?php if($obj_p->eliminar==1){echo "checked";}?> 
                            name="customSwitch4<?php echo $fila["id_modulo"];?>"
                            id="customSwitch4<?php echo $fila["id_modulo"];?>"
                            data-id="<?php echo $fila["id_modulo"];?>" data-desc="eliminar" data-idrol="<?php echo $_REQUEST["id"];?>">
                            <label class="custom-control-label" for="customSwitch4<?php echo $fila["id_modulo"];?>"></label>
                        </div>
                    </div>
                </td>
                </tr>
                <?php 
                 }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

