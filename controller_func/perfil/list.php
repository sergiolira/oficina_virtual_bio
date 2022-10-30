<?php
session_start();
include_once("../../model_class/perfil.php");
$obj_u= new perfil();
$obj_u->id_usuario=$_SESSION['idUser'];
?>

<?php $rs_perfilUser=$obj_u->read();
  while($fila_p=mysqli_fetch_assoc($rs_perfilUser)){
      if ($obj_u->id_usuario==$fila_p["id_usuario"]) {
    ?>
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?php echo $fila_p["foto_perfil"]; ?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $fila_p["nombre"]; ?></h3>

                <p class="text-muted text-center"><?php echo $fila_p['rol']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Correo:</b> <a class="float-right"><?php echo $fila_p["correo"]; ?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Telefono:</b> <a class="float-right"><?php echo $fila_p["telefono"]; ?></a>
                    </li>
                    <li class="list-group-item">
                    <b><?php echo $fila_p["tipo_documento"]; ?>:</b> <a class="float-right"><?php echo $fila_p["num_documento"]; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Estado civil:</b> <a class="float-right"><?php echo $fila_p["estado_civil"]; ?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Fecha de Nacimiento:</b> <a class="float-right"><?php echo $fila_p["fecha_nac"]; ?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Inicio labores:</b> <a class="float-right"><?php echo $fila_p["fecha_inicio_labores"]; ?></a>
                    </li>
                </ul>
                <button type="button" data-id="<?php echo $_SESSION['idUser'];?>" class="btn btn-primary btn-block new-modal-perfil-foto"><i class="fas fa-pencil-alt mr-1"></i><b>Editar foto</b></button>
                <a href="#" class="btn btn-primary btn-block"><i class="far fa-fw fa-file-pdf"></i> <b>Descargar CV</b></a>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- About Me Box -->
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#datos" data-toggle="tab">Datos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#herramientas" data-toggle="tab">Herramientas tecnologicas</a></li>
                   
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="datos">

                        <div class="container-perfil card-body">

                            <div class="card card-primary card-outline col-4">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Nombres:</i>
                                    <div><?php echo $fila_p["nombre"]; ?></div> 
                                    </h3>
                                </div>
                            </div>
                            <div class="card card-primary card-outline col-4">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Apellidos:</i>
                                    <div><?php echo $fila_p["apellido_paterno"]; ?> <?php echo $fila_p["apellido_materno"]; ?></div> 
                                    </h3>
                                </div>
                            </div>
                            <div class="card card-primary card-outline col-3">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Telefono:</i>
                                    <div><?php echo $fila_p["telefono"]; ?></div> 
                                    </h3>
                                </div>
                            </div>
                            <div class="card card-primary card-outline col-md-6">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Correo:</i>
                                    <div><?php echo $fila_p["correo"]; ?></div> 
                                    </h3>
                                </div>
                            </div>
                            <div class="card card-primary card-outline col-4">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Tipo de documento:</i>
                                    <div><b><?php echo $fila_p["tipo_documento"]; ?>:</b> <?php echo $fila_p["num_documento"]; ?></div> 
                                    </h3>
                                </div>
                            </div>
                            <div class="card card-primary card-outline col-3">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Genero:</i>
                                    <div><?php echo $fila_p["genero"]; ?></div> 
                                    </h3>
                                </div>
                            </div>
                            <div class="card card-primary card-outline col-8">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Direccion:</i>
                                    <div><?php echo $fila_p["direccion"]; ?>, <?php echo $fila_p["departamento"]; ?>, 
                                        <?php echo $fila_p["provincia"]; ?>, <?php echo $fila_p["distrito"]; ?>.
                                    </div> 
                                    </h3>
                                </div>
                            </div>
                            <div class="card card-primary card-outline col-3">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Fecha de nacimiento:</i>
                                    <div><?php echo $fila_p["fecha_nac"]; ?></div> 
                                    </h3>
                                </div>
                            </div>
                            <div class="card card-primary card-outline col-3">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Fecha inicio labores:</i>
                                    <div><?php echo $fila_p["fecha_inicio_labores"]; ?></div> 
                                    </h3>
                                </div>
                            </div>
                            <div class="card card-primary card-outline col-2">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Hijos:</i>
                                    <div><?php echo $fila_p["nro_hijos"]; ?></div> 
                                    </h3>
                                </div>
                            </div>
                            <div class="card card-primary card-outline col-3">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas "> Estado civil:</i>
                                    <div><?php echo $fila_p["estado_civil"]; ?></div> 
                                    </h3>
                                </div>
                            </div>
                            <button type="button" data-id="<?php echo $_SESSION['idUser'];?>" class="btn btn-success float-right new-modal-perfil"><i class="fas fa-pencil-alt mr-1"></i>Editar</button>
                        </div>
                        
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="herramientas">
                        <!-- The herramientas -->
                        <div class="card card-light card-outline">
                            
                            <?php $rs_herramienta=$obj_u->herramientas_x_usuario();
                            $c=1;
                            while($fila_h=mysqli_fetch_assoc($rs_herramienta)){
                                if ($obj_u->id_usuario==$fila_h["id_usuario"]) { ?>
                            <div class="card bg-light card-primary card-outline">
                                <div class="card-header">
                                    <h4 class="m-0 text-dark"><i class="fas "> Equipo <?php echo $c; ?></i></h4>
                                </div>
                            </div>
                            
                            <div class="container-perfil card-body">
                                <div class="card card-primary card-outline col-3">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                        <i class="fas "> Tipo de Equipo:</i>
                                        <div><?php echo $fila_h["tipo_equipo"]; ?></div> 
                                        </h3>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline col-2">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                        <i class="fas "> Marca:</i>
                                        <div><?php echo $fila_h["marca_equipo"]; ?></div> 
                                        </h3>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline col-3">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                        <i class="fas "> Modelo:</i>
                                        <div><?php echo $fila_h["modelo"]; ?></div> 
                                        </h3>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline col-3">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                        <i class="fas "> Condicion de Equipo:</i>
                                        <div><?php echo $fila_h["condicion_equipo"]; ?></div> 
                                        </h3>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline col-4">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                        <i class="fas "> Numero de serial:</i>
                                        <div><?php echo $fila_h["nro_serial"]; ?></div> 
                                        </h3>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline col-6">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                        <i class="fas "> Observacion:</i>
                                        <?php if ($fila_h["observacion"]=="") {
                                          $fila_h["observacion"]='Ninguna';
                                        }?>
                                        <div><?php echo $fila_h["observacion"]; ?></div> 
                                        </h3>
                                    </div>
                                </div>
                                
  
                            </div><!-- Cierre container perfil --> 
                            <div class="card-header">
                                <h4 class="m-0 text-dark"><i class="fas "> Licencia del equipo</i></h4>  
                            </div>
                            <?php 
                            $obj_u->id_herramienta_tecnologica=$fila_h["id_herramienta_tecnologica"];
                            $rs_licencia=$obj_u->licencia_x_usuario();
                            $c=1;
                            while($fila_l=mysqli_fetch_assoc($rs_licencia)){
                                if ($obj_u->id_usuario==$fila_h["id_usuario"]) { ?>
                            <div class="container-perfil card-body">
                                <div class="card card-primary card-outline col-3">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                        <i class="fas "> Licencia:</i>
                                        <div><?php echo $fila_l["licencia"]; ?></div> 
                                        </h3>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline col-3">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                        <i class="fas "> Tipo de licencia:</i>
                                        <div><?php echo $fila_l["tipo_licencia"]; ?></div> 
                                        </h3>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline col-4">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                        <i class="fas "> Codigo:</i>
                                        <div><?php echo $fila_l["codigo"]; ?></div> 
                                        </h3>
                                    </div>
                                </div>
                                <div class="card card-primary card-outline col-6">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                        <i class="fas "> observacion:</i>
                                        <?php if ($fila_l["observacion"]=="") {
                                          $fila_l["observacion"]='Ninguna';
                                        }?>
                                        <div><?php echo $fila_l["observacion"]; ?></div> 
                                        </h3>
                                    </div>
                                </div>
                                
  
                            </div><!-- Cierre container perfil --> 
                            <?php } } ?> 
                            <?php $c++; } } ?> 
                        </div> <!-- cierre -->
                        
                    </div>
                    <!-- /.tab-pane -->

                    
                    <!-- /.tab-pane -->
                </div>
                    <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
                <!-- /.card -->
    </div>
<?php } } ?>