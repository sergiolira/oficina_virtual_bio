<?php
include_once("model_class/modulo.php");
include_once("model_class/sub_modulo.php");
include_once("model_class/permiso.php");
$obj_m= new modulo();
$obj_sm= new sub_modulo();
$obj_p= new permiso(); 

?>
     
  <?php 
  ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logo-228x228.png" alt="BIO Tree Life Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
      <span class="brand-text font-weight-light">Bio Tree Life</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $_SESSION['foto_perfil']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="perfil.php" class="d-block"><?php echo $_SESSION['nombre']; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php
            $rs_modulo=$obj_m->read();
            while($filaM=mysqli_fetch_assoc($rs_modulo)){
              
              if(isset($_SESSION["p_id_modulo"])){
                if($_SESSION["p_id_modulo"]==$filaM["id_modulo"])
                {
                  $class_active="active";
                  $class_m_open="menu-open";
                }else{
                  $class_active="";
                  $class_m_open="";
                }
              }else{
                $class_active="";
                $class_m_open="";
              }               
              
              $obj_p->id_rol=$_SESSION['id_rol'];
              $obj_p->id_modulo= $filaM["id_modulo"];
              $obj_p->consult_crud_x_rol_modulo();
              if ($obj_p->ver==1 || $_SESSION['id_usuario']==1) {
                if ($filaM["estado"]==1 && $filaM["nivel"]==1) {
            ?>

            <li class="nav-item">
              <a href="<?php echo $filaM["enlace"]; ?>" class="nav-link <?php echo $class_active;?>">
                <i class="<?php echo $filaM["icono"]." ".$filaM["estilocolor"];?>"></i>
                <p class="<?php echo $filaM["estilocolor"]; ?>">
                <?php echo $filaM["modulo"]; ?>
                </p>
              </a>
            </li>
            <?php } else { 
              if ($filaM["estado"]==1 && $filaM["nivel"]==2) {
              ?>
              
              <li class="nav-item <?php echo $class_m_open;?>">
                <a href="#" class="nav-link <?php echo $class_active;?>">
                  <i class="<?php echo $filaM["icono"].' '.$filaM["estilocolor"];?>"></i>
                  <p class="<?php echo $filaM["estilocolor"];?>">
                    <?php echo $filaM["modulo"]; ?>
                    <i class="right fas fa-angle-left"></i>
                  </p>

                </a>
                <ul class="nav nav-treeview" style="margin-left: 8px;">
                  <?php
                  $rs_sub_modulo=$obj_sm->read();
                  while($filaSM=mysqli_fetch_assoc($rs_sub_modulo)){
                    if(isset($_SESSION["p_id_sub_modulo"])){
                      if($_SESSION["p_id_sub_modulo"]==$filaSM["id_sub_modulo"])
                      {
                        $class_active_submod="active";
                        $class_m_open_submod="menu-open";
                      }else{
                        $class_active_submod="";
                        $class_m_open_submod="";
                      }
                    }else{
                      $class_active_submod="";
                      $class_m_open_submod="";
                    }    

                    if ($filaSM["estado"]==1 && $filaM["id_modulo"]==$filaSM["id_modulo"]) {
                    if ($filaSM["nivel"]==1) {
                  ?>
                  <li class="nav-item <?php echo $class_m_open_submod;?>">
                    <a href="<?php echo $filaSM["enlace"];?>" class="nav-link <?php echo $class_active_submod;?>">
                      <i class="<?php echo $filaSM["icono"];?> <?php echo $filaM["estilocolor"];?>"></i>
                      <p class="<?php echo $filaM["estilocolor"];?>" ><?php echo $filaSM["sub_modulo"];?></p>
                    </a>
                  </li>
                  <?php } else {
                    if ($filaSM["nivel"]==2 && $filaM["id_modulo"]==$filaSM["id_modulo"]) {
                      if(isset($_SESSION["p_id_sub_x_nivel"])){
                        if($_SESSION["p_id_sub_x_nivel"]==$filaSM["id_sub_modulo"])
                        {
                          $class_active_submod_="active";
                          $class_m_open_submod_="menu-open";
                        }else{
                          $class_active_submod_="";
                          $class_m_open_submod_="";
                        }
                      }else{
                        $class_active_submod_="";
                        $class_m_open_submod_="";
                      }                      
                    ?>
                  <li class="nav-item <?php echo $class_m_open_submod_;?>">
                    <a href="#" class="nav-link  <?php echo $class_active_submod_;?>">
                    <i class="<?php echo $filaSM["icono"] ?> <?php echo $filaM["estilocolor"];?>"></i>
                      <p class="<?php echo $filaM["estilocolor"];?>">
                      <?php echo $filaSM["sub_modulo"];?>
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="margin-left: 8px;">
                      <?php 
                        $rs_sub_moduloN3=$obj_sm->read();
                        while($filaSMN3=mysqli_fetch_assoc($rs_sub_moduloN3)){

                          if(isset($_SESSION["p_id_sub_modulo"])){
                            if($_SESSION["p_id_sub_modulo"]==$filaSMN3["id_sub_modulo"])
                            {
                              $class_active_submod_3="active";
                              $class_m_open_submod_3="menu-open";
                            }else{
                              $class_active_submod_3="";
                              $class_m_open_submod_3="";
                            }
                          }else{
                            $class_active_submod_3="";
                            $class_m_open_submod_3="";
                          }

                          if ($filaSMN3["estado"]==1 && $filaSMN3["nivel"]==3) {
                            if ($filaSM["id_sub_modulo"] == $filaSMN3["sub_x_nivel"]) {
                      ?>
                      <li class="nav-item <?php echo $class_m_open_submod_3;?>">
                        <a href="<?php echo $filaSMN3["enlace"];?>" class="nav-link <?php echo $class_active_submod_3;?>">
                          <i class="<?php echo $filaSMN3["icono"];?> <?php echo $filaM["estilocolor"];?>"></i>
                          <p class="<?php echo $filaM["estilocolor"];?>"><?php echo $filaSMN3["sub_modulo"];?></p>
                        </a>
                      </li>
                      <?php } } } ?>
                    </ul>
                  </li>


                  <?php } } } } ?>
                </ul>
              </li>
              <?php } } ?>
          <?php  } } ?>
          <li class="nav-item ">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-in-alt"></i>
             
              <p>
                Cerrar sesion
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>