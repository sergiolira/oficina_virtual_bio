<?php
session_start();
include_once("../../model_class/representante_conectado.php");
$obj=new representante_conectado();
$_POST["sltruc_buscar_i"];

if(trim($_POST["sltruc_buscar_i"])!=0){
  $txtpatrocinador=$_POST["sltruc_buscar_i"];
}

$html="";$html_2="";$html_4="";$html_8="";$html_16="";$html_32="";
$html_64="";$html_128="";$html_256="";$html_512="";$html_1024="";
$html_2048="";$html_4096="";$html_8192="";$html_16384="";


$style_sponsor_dir_uno="";$style_sponsor_dir_2="";
$style_sponsor_dir_4="";$style_sponsor_dir_8="";$style_sponsor_dir_16="";
$style_sponsor_dir_32="";$style_sponsor_dir_64="";$style_sponsor_dir_128="";
$style_sponsor_dir_256="";$style_sponsor_dir_512="";$style_sponsor_dir_1024="";
$style_sponsor_dir_2048="";$style_sponsor_dir_4096="";$style_sponsor_dir_8192="";$style_sponsor_dir_16384="";


$html='<table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombres </th>
                    <th>RUC </th>
                    <th>Sponsor </th>
                    <th>Nivel </th>
                    <th>Lider de Red(RUC) </th>
                    <th>Lider de Red </th>
                    <th>Estado </th>
                    <th>Fecha  Registro </th>
                  </tr>
                  </thead>
                  <tbody class="tbody_list">';
if(trim($_POST["sltruc_buscar_i"])==0 || trim($_POST["sltruc_buscar_i"])=="General"){
$rs_r_l=$obj->list_representantes_lideres();
}else{
$obj->ruc=$_POST["sltruc_buscar_i"];
$rs_r_l=$obj->list_representantes_x_ruc();
}


while($fila_r_l=mysqli_fetch_assoc($rs_r_l)){
  $fila_r_l["ruc"];

/*LIsta de representantes lideres*/
$patrocinador_directo=$fila_r_l["ruc"];
$obj->patrocinador=$patrocinador_directo;

$rs=$obj->listar_representantes_sponsor($patrocinador_directo);



/*Obtrengo los datos de representante nivel 1*/
$obj->ruc=$fila_r_l["ruc"];
$rs_n_uno=$obj->dato_representante_nivel_uno($patrocinador_directo);

if($fila_n_uno=mysqli_fetch_assoc($rs_n_uno)){
  $estado="Activo";
  $style_lo="";
  $buttonstyle="";
    if($fila_n_uno['estado']==0){
      $estado='Inactivo';
      $style_lo="style='color:red'";
    }

    $style_nivel="style='color:#E20612;font-weight: bold;'";
    $style_sponsor_dir_uno="style='color:#E20612;font-weight: bold;'";

    $lider_red="Lider de Red";
    if($fila_n_uno["patrocinador"]!="Lider de Red"){
        $obj->ruc=$fila_n_uno["patrocinador"];
        $obj->consultar_datos_ruc_x_nivel();
        $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
    }

    $lider_directo="Lider de Red";
    if($fila_n_uno["patrocinador_directo"]!="0"){
        $obj->ruc=$fila_n_uno["patrocinador_directo"];
        $obj->consultar_datos_ruc_x_nivel();
        $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
    }

  $html.='<tr class="item'.$fila_n_uno["id_representante_conectado"].'">
  <td class="itemrow_b'.$fila_n_uno["id_representante_conectado"].'">'.$fila_n_uno["nombre"]." ".$fila_n_uno["apellidopaterno"]." ".$fila_n_uno["apellidomaterno"].'</td>
  <td class="itemrow_c'.$fila_n_uno["id_representante_conectado"].'" '.$style_sponsor_dir_uno.'>'.$fila_n_uno["ruc"].'</td>
  <td class="itemrow_d'.$fila_n_uno["id_representante_conectado"].'">'.$lider_directo.'</td>
  <td '.$style_nivel.' class="itemrow_f'.$fila_n_uno["id_representante_conectado"].'">Nivel 1</td>
  <td class="itemrow_g'.$fila_n_uno["id_representante_conectado"].'">'.$fila_n_uno["patrocinador"].'</td>
  <td class="itemrow_g'.$fila_n_uno["id_representante_conectado"].'">'.$lider_red.'</td>
  <td '.$style_lo.' class="itemrow_h'.$fila_n_uno["id_representante_conectado"].'">'.$estado.'</td>
  <td class="itemrow_c'.$fila_n_uno["id_representante_conectado"].'">'.$fila_n_uno["fecharegistro_"].'</td>

  </tr>';
}

while($fila=mysqli_fetch_assoc($rs)){
   
    if($fila["estado"]==3){
      $estado="Activo";
      $style_lo="";
      $buttonstyle="";
        if($fila['estado']==0){
          $estado='Inactivo';
          $style_lo="style='color:red'";
        }
      

        $style_nivel="style='color:#FFA200;font-weight: bold;'";
        $style_sponsor_dir_2="style='color:#FFA200;font-weight: bold;'";
        $lider_red="Lider de Red";
        if($fila["patrocinador"]!="Lider de Red"){
            $obj->ruc=$fila["patrocinador"];
            $obj->consultar_datos_ruc_x_nivel();
            $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
        }

        $lider_directo="Lider de Red";
        if($fila["patrocinador_directo"]!="0"){
            $obj->ruc=$fila["patrocinador_directo"];
            $obj->consultar_datos_ruc_x_nivel();
            $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
        }

        $html_2.='<tr class="item'.$fila["id_representante_conectado"].'">
        <td class="itemrow_b'.$fila["id_representante_conectado"].'">'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'</td>
        <td class="itemrow_c'.$fila["id_representante_conectado"].'" '.$style_sponsor_dir_2.'>'.$fila["ruc"].'</td>
        <td class="itemrow_d'.$fila["id_representante_conectado"].'" '.$style_sponsor_dir_uno.'>'.$lider_directo.'</td>
        <td '.$style_nivel.' class="itemrow_f'.$fila["id_representante_conectado"].'">Nivel 2</td>
        <td class="itemrow_g'.$fila["id_representante_conectado"].'">'.$fila["patrocinador"].'</td>
        <td class="itemrow_g'.$fila["id_representante_conectado"].'">'.$lider_red.'</td>
        <td '.$style_lo.' class="itemrow_h'.$fila["id_representante_conectado"].'">'.$estado.'</td>
        <td class="itemrow_c'.$fila["id_representante_conectado"].'">'.$fila["fecharegistro_"].'</td>
      
        </tr>';
    }  

      $rs_4=$obj->listar_representantes_sponsor($fila["ruc"]);
      while ($fila_4=mysqli_fetch_assoc($rs_4)) {
            if($fila_4["estado"]==3){
              $estado="Activo";
              $style_lo="";
              $buttonstyle="";
                if($fila_4['estado']==0){
                  $estado='Inactivo';
                  $style_lo="style='color:red'";
                }
              
                $style_nivel="style='color:#D5C414;font-weight: bold;'";
                $style_sponsor_dir_4="style='color:#D5C414;font-weight: bold;'";
                $lider_red="Lider de Red";
                if($fila_4["patrocinador"]!="Lider de Red"){
                    $obj->ruc=$fila_4["patrocinador"];
                    $obj->consultar_datos_ruc_x_nivel();
                    $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                }

                $lider_directo="Lider de Red";
                  if($fila_4["patrocinador_directo"]!="0"){
                      $obj->ruc=$fila_4["patrocinador_directo"];
                      $obj->consultar_datos_ruc_x_nivel();
                      $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                  }
                $html_4.='<tr class="item'.$fila_4["id_representante_conectado"].'">
                <td class="itemrow_b'.$fila_4["id_representante_conectado"].'">'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'</td>
                <td class="itemrow_c'.$fila_4["id_representante_conectado"].'" '.$style_sponsor_dir_4.'>'.$fila_4["ruc"].'</td>
                <td class="itemrow_d'.$fila_4["id_representante_conectado"].'" '.$style_sponsor_dir_2.'>'.$lider_directo.'</td>
                <td '.$style_nivel.' class="itemrow_f'.$fila_4["id_representante_conectado"].'">Nivel 3</td>
                <td class="itemrow_g'.$fila_4["id_representante_conectado"].'">'.$fila_4["patrocinador"].'</td>
                <td class="itemrow_g'.$fila_4["id_representante_conectado"].'">'.$lider_red.'</td>
                <td '.$style_lo.' class="itemrow_h'.$fila_4["id_representante_conectado"].'">'.$estado.'</td>
                <td class="itemrow_c'.$fila_4["id_representante_conectado"].'">'.$fila_4["fecharegistro_"].'</td>

                </tr>';
            }

              $rs_8=$obj->listar_representantes_sponsor($fila_4["ruc"]);
              while ($fila_8=mysqli_fetch_assoc($rs_8)) {
                if($fila_8["estado"]==3){
                    $estado="Activo";
                    $style_lo="";
                    $buttonstyle="";
                      if($fila_8['estado']==0){
                        $estado='Inactivo';
                        $style_lo="style='color:red'";
                      }
                        
                      $style_nivel="style='color:#3CA805;font-weight: bold;'";
                      $style_sponsor_dir_8="style='color:#3CA805;font-weight: bold;'";
                      $lider_red="Lider de Red";
                      if($fila_8["patrocinador"]!="Lider de Red"){
                          $obj->ruc=$fila_8["patrocinador"];
                          $obj->consultar_datos_ruc_x_nivel();
                          $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                      }

                      $lider_directo="Lider de Red";
                      if($fila_8["patrocinador_directo"]!="0"){
                          $obj->ruc=$fila_8["patrocinador_directo"];
                          $obj->consultar_datos_ruc_x_nivel();
                          $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                      }

                      $html_8.='<tr class="item'.$fila_8["id_representante_conectado"].'">
                      <td class="itemrow_b'.$fila_8["id_representante_conectado"].'">'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'</td>
                      <td class="itemrow_c'.$fila_8["id_representante_conectado"].'" '.$style_sponsor_dir_8.'>'.$fila_8["ruc"].'</td>
                      <td class="itemrow_d'.$fila_8["id_representante_conectado"].'" '.$style_sponsor_dir_4.'>'.$lider_directo.'</td>
                      <td '.$style_nivel.' class="itemrow_f'.$fila_8["id_representante_conectado"].'">Nivel 4</td>
                      <td class="itemrow_g'.$fila_8["id_representante_conectado"].'">'.$fila_8["patrocinador"].'</td>
                      <td class="itemrow_g'.$fila_8["id_representante_conectado"].'">'.$lider_red.'</td>
                      <td '.$style_lo.' class="itemrow_h'.$fila_8["id_representante_conectado"].'">'.$estado.'</td>
                      <td class="itemrow_c'.$fila_8["id_representante_conectado"].'">'.$fila_8["fecharegistro_"].'</td>

                      </tr>';
                }
                    $rs_16=$obj->listar_representantes_sponsor($fila_8["ruc"]);
                    while ($fila_16=mysqli_fetch_assoc($rs_16)) {
                          if($fila_16["estado"]==3){
                            $estado="Activo";
                            $style_lo="";
                            $buttonstyle="";
                              if($fila_16['estado']==0){
                                $estado='Inactivo';
                                $style_lo="style='color:red'";
                              }

                                
                              $style_nivel="style='color:#0092D7;font-weight: bold;'";
                              $style_sponsor_dir_16="style='color:#0092D7;font-weight: bold;'";
                              $lider_red="Lider de Red";
                              if($fila_16["patrocinador"]!="Lider de Red"){
                                  $obj->ruc=$fila_16["patrocinador"];
                                  $obj->consultar_datos_ruc_x_nivel();
                                  $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                              }

                              $lider_directo="Lider de Red";
                                if($fila_16["patrocinador_directo"]!="0"){
                                    $obj->ruc=$fila_16["patrocinador_directo"];
                                    $obj->consultar_datos_ruc_x_nivel();
                                    $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                }

                              $html_16.='<tr class="item'.$fila_16["id_representante_conectado"].'">
                              <td class="itemrow_b'.$fila_16["id_representante_conectado"].'">'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'</td>
                              <td class="itemrow_c'.$fila_16["id_representante_conectado"].'" '.$style_sponsor_dir_16.'>'.$fila_16["ruc"].'</td>
                              <td class="itemrow_d'.$fila_16["id_representante_conectado"].'" '.$style_sponsor_dir_8.'>'.$lider_directo.'</td>
                              <td '.$style_nivel.' class="itemrow_f'.$fila_16["id_representante_conectado"].'">Nivel 5</td>
                              <td class="itemrow_g'.$fila_16["id_representante_conectado"].'">'.$fila_16["patrocinador"].'</td>
                              <td class="itemrow_g'.$fila_16["id_representante_conectado"].'">'.$lider_red.'</td>
                              <td '.$style_lo.' class="itemrow_h'.$fila_16["id_representante_conectado"].'">'.$estado.'</td>
                              <td class="itemrow_c'.$fila_16["id_representante_conectado"].'">'.$fila_16["fecharegistro_"].'</td>

                              </tr>';
                          }
                          $rs_32=$obj->listar_representantes_sponsor($fila_16["ruc"]);
                          while ($fila_32=mysqli_fetch_assoc($rs_32)) {
                          if($fila_32["estado"]==3){
                              $estado="Activo";
                              $style_lo="";
                              $buttonstyle="";
                                if($fila_32['estado']==0){
                                  $estado='Inactivo';
                                  $style_lo="style='color:red'";
                                }
                          

                              $style_nivel="style='color:#6BD425;font-weight: bold;'";
                              $style_sponsor_dir_32="style='color:#6BD425;font-weight: bold;'";
                              $lider_red="Lider de Red";
                              if($fila_32["patrocinador"]!="Lider de Red"){
                                  $obj->ruc=$fila_32["patrocinador"];
                                  $obj->consultar_datos_ruc_x_nivel();
                                  $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                              }

                              $lider_directo="Lider de Red";
                              if($fila_32["patrocinador_directo"]!="0"){
                                  $obj->ruc=$fila_32["patrocinador_directo"];
                                  $obj->consultar_datos_ruc_x_nivel();
                                  $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                              }

                              $html_32.='<tr class="item'.$fila_32["id_representante_conectado"].'">
                              <td class="itemrow_b'.$fila_32["id_representante_conectado"].'">'.$fila_32["nombre"]." ".$fila_32["apellidopaterno"]." ".$fila_32["apellidomaterno"].'</td>
                              <td class="itemrow_c'.$fila_32["id_representante_conectado"].'" '.$style_sponsor_dir_32.'>'.$fila_32["ruc"].'</td>
                              <td class="itemrow_d'.$fila_32["id_representante_conectado"].'" '.$style_sponsor_dir_16.'>'.$lider_directo.'</td>
                              <td '.$style_nivel.' class="itemrow_f'.$fila_32["id_representante_conectado"].'">Nivel 6</td>
                              <td class="itemrow_g'.$fila_32["id_representante_conectado"].'">'.$fila_32["patrocinador"].'</td>
                              <td class="itemrow_g'.$fila_32["id_representante_conectado"].'">'.$lider_red.'</td>
                              <td '.$style_lo.' class="itemrow_h'.$fila_32["id_representante_conectado"].'">'.$estado.'</td>
                              <td class="itemrow_c'.$fila_32["id_representante_conectado"].'">'.$fila_32["fecharegistro_"].'</td>

                              </tr>';
                            }
                            $rs_64=$obj->listar_representantes_sponsor($fila_32["ruc"]);
                            while ($fila_64=mysqli_fetch_assoc($rs_64)) {
                              if($fila_64["estado"]==3){
                                $estado="Activo";
                                $style_lo="";
                                $buttonstyle="";
                                  if($fila_64['estado']==0){
                                    $estado='Inactivo';
                                    $style_lo="style='color:red'";
                                  }
                              
                                $style_nivel="style='color:#00afb9;font-weight: bold;'";
                                $style_sponsor_dir_64="style='color:#00afb9;font-weight: bold;'";
                                $lider_red="Lider de Red";
                                if($fila_64["patrocinador"]!="Lider de Red"){
                                    $obj->ruc=$fila_64["patrocinador"];
                                    $obj->consultar_datos_ruc_x_nivel();
                                    $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                }

                                $lider_directo="Lider de Red";
                                  if($fila_64["patrocinador_directo"]!="0"){
                                      $obj->ruc=$fila_64["patrocinador_directo"];
                                      $obj->consultar_datos_ruc_x_nivel();
                                      $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                  }

                                $html_64.='<tr class="item'.$fila_64["id_representante_conectado"].'">
                                <td class="itemrow_b'.$fila_64["id_representante_conectado"].'">'.$fila_64["nombre"]." ".$fila_64["apellidopaterno"]." ".$fila_64["apellidomaterno"].'</td>
                                <td class="itemrow_c'.$fila_64["id_representante_conectado"].'" '.$style_sponsor_dir_64.'>'.$fila_64["ruc"].'</td>
                                <td class="itemrow_d'.$fila_64["id_representante_conectado"].'" '.$style_sponsor_dir_32.'>'.$lider_directo.'</td>
                                <td '.$style_nivel.' class="itemrow_f'.$fila_64["id_representante_conectado"].'">Nivel 7</td>
                                <td class="itemrow_g'.$fila_64["id_representante_conectado"].'">'.$fila_64["patrocinador"].'</td>
                                <td class="itemrow_g'.$fila_64["id_representante_conectado"].'">'.$lider_red.'</td>
                                <td '.$style_lo.' class="itemrow_h'.$fila_64["id_representante_conectado"].'">'.$estado.'</td>
                                <td class="itemrow_c'.$fila_64["id_representante_conectado"].'">'.$fila_64["fecharegistro_"].'</td>

                                </tr>';
                              }
                              $rs_128=$obj->listar_representantes_sponsor($fila_64["ruc"]);
                              while ($fila_128=mysqli_fetch_assoc($rs_128)) {
                              if($fila_128["estado"]==3){
                                  $estado="Activo";
                                  $style_lo="";
                                  $buttonstyle="";
                                  if($fila_128['estado']==0){
                                      $estado='Inactivo';
                                      $style_lo="style='color:red'";
                                    }
                                
                                  $style_nivel="style='color:#00f5d4;font-weight: bold;'";
                                  $style_sponsor_dir_128="style='color:#00f5d4;font-weight: bold;'";
                                  $lider_red="Lider de Red";
                                  if($fila_128["patrocinador"]!="Lider de Red"){
                                      $obj->ruc=$fila_128["patrocinador"];
                                      $obj->consultar_datos_ruc_x_nivel();
                                      $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                  }

                                  $lider_directo="Lider de Red";
                                  if($fila_128["patrocinador_directo"]!="0"){
                                      $obj->ruc=$fila_128["patrocinador_directo"];
                                      $obj->consultar_datos_ruc_x_nivel();
                                      $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                  }

                                  $html_128.='<tr class="item'.$fila_128["id_representante_conectado"].'">
                                  <td class="itemrow_b'.$fila_128["id_representante_conectado"].'">'.$fila_128["nombre"]." ".$fila_128["apellidopaterno"]." ".$fila_128["apellidomaterno"].'</td>
                                  <td class="itemrow_c'.$fila_128["id_representante_conectado"].'" '.$style_sponsor_dir_128.'>'.$fila_128["ruc"].'</td>
                                  <td class="itemrow_d'.$fila_128["id_representante_conectado"].'" '.$style_sponsor_dir_64.'>'.$lider_directo.'</td>
                                  <td '.$style_nivel.' class="itemrow_f'.$fila_128["id_representante_conectado"].'">Nivel 8</td>
                                  <td class="itemrow_g'.$fila_128["id_representante_conectado"].'">'.$fila_128["patrocinador"].'</td>
                                  <td class="itemrow_g'.$fila_128["id_representante_conectado"].'">'.$lider_red.'</td>
                                  <td '.$style_lo.' class="itemrow_h'.$fila_128["id_representante_conectado"].'">'.$estado.'</td>
                                  <td class="itemrow_c'.$fila_128["id_representante_conectado"].'">'.$fila_128["fecharegistro_"].'</td>

                                  </tr>';
                                }
                                $rs_256=$obj->listar_representantes_sponsor($fila_128["ruc"]);
                                while ($fila_256=mysqli_fetch_assoc($rs_256)) {
                                  if($fila_256["estado"]==3){
                                    $estado="Activo";
                                    $style_lo="";
                                    $buttonstyle="";
                                    if($fila_256['estado']==0){
                                        $estado='Inactivo';
                                        $style_lo="style='color:red'";
                                      }
                                  
                                    $style_nivel="style='color:#f6aa1c;font-weight: bold;'";
                                    $style_sponsor_dir_256="style='color:#f6aa1c;font-weight: bold;'";
                                    $lider_red="Lider de Red";
                                    if($fila_256["patrocinador"]!="Lider de Red"){
                                        $obj->ruc=$fila_256["patrocinador"];
                                        $obj->consultar_datos_ruc_x_nivel();
                                        $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                    }

                                    $lider_directo="Lider de Red";
                                      if($fila_256["patrocinador_directo"]!="0"){
                                          $obj->ruc=$fila_256["patrocinador_directo"];
                                          $obj->consultar_datos_ruc_x_nivel();
                                          $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                      }

                                    $html_256.='<tr class="item'.$fila_256["id_representante_conectado"].'">
                                    <td class="itemrow_b'.$fila_256["id_representante_conectado"].'">'.$fila_256["nombre"]." ".$fila_256["apellidopaterno"]." ".$fila_256["apellidomaterno"].'</td>
                                    <td class="itemrow_c'.$fila_256["id_representante_conectado"].'" '.$style_sponsor_dir_256.'>'.$fila_256["ruc"].'</td>
                                    <td class="itemrow_d'.$fila_256["id_representante_conectado"].'" '.$style_sponsor_dir_128.'>'.$lider_directo.'</td>
                                    <td '.$style_nivel.' class="itemrow_f'.$fila_256["id_representante_conectado"].'">Nivel 9</td>
                                    <td class="itemrow_g'.$fila_256["id_representante_conectado"].'">'.$fila_256["patrocinador"].'</td>
                                    <td class="itemrow_g'.$fila_256["id_representante_conectado"].'">'.$lider_red.'</td>
                                    <td '.$style_lo.' class="itemrow_h'.$fila_256["id_representante_conectado"].'">'.$estado.'</td>
                                    <td class="itemrow_c'.$fila_256["id_representante_conectado"].'">'.$fila_256["fecharegistro_"].'</td>

                                    </tr>';
                                  }
                                  $rs_512=$obj->listar_representantes_sponsor($fila_256["ruc"]);
                                  while ($fila_512=mysqli_fetch_assoc($rs_512)) {
                                    if($fila_512["estado"]==3){
                                      $estado="Activo";
                                      $style_lo="";
                                      $buttonstyle="";
                                      if($fila_512['estado']==0){
                                          $estado='Inactivo';
                                          $style_lo="style='color:red'";
                                        }
                                      
                                      $style_nivel="style='color:#09bc8a;font-weight: bold;'";
                                      $style_sponsor_dir_512="style='color:#09bc8a;font-weight: bold;'";
                                      $lider_red="Lider de Red";
                                      if($fila_512["patrocinador"]!="Lider de Red"){
                                          $obj->ruc=$fila_512["patrocinador"];
                                          $obj->consultar_datos_ruc_x_nivel();
                                          $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                      }

                                      $lider_directo="Lider de Red";
                                      if($fila_512["patrocinador_directo"]!="0"){
                                          $obj->ruc=$fila_512["patrocinador_directo"];
                                          $obj->consultar_datos_ruc_x_nivel();
                                          $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                      }

                                      $html_512.='<tr class="item'.$fila_512["id_representante_conectado"].'">
                                      <td class="itemrow_b'.$fila_512["id_representante_conectado"].'">'.$fila_512["nombre"]." ".$fila_512["apellidopaterno"]." ".$fila_512["apellidomaterno"].'</td>
                                      <td class="itemrow_c'.$fila_512["id_representante_conectado"].'" '.$style_sponsor_dir_512.'>'.$fila_512["ruc"].'</td>
                                      <td class="itemrow_d'.$fila_512["id_representante_conectado"].'" '.$style_sponsor_dir_256.'>'.$lider_directo.'</td>
                                      <td '.$style_nivel.' class="itemrow_f'.$fila_512["id_representante_conectado"].'">Nivel 10</td>
                                      <td class="itemrow_g'.$fila_512["id_representante_conectado"].'">'.$fila_512["patrocinador"].'</td>
                                      <td class="itemrow_g'.$fila_512["id_representante_conectado"].'">'.$lider_red.'</td>
                                      <td '.$style_lo.' class="itemrow_h'.$fila_512["id_representante_conectado"].'">'.$estado.'</td>
                                      <td class="itemrow_c'.$fila_512["id_representante_conectado"].'">'.$fila_512["fecharegistro_"].'</td>

                                      </tr>';
                                      }
                                    $rs_1024=$obj->listar_representantes_sponsor($fila_512["ruc"]);
                                    while ($fila_1024=mysqli_fetch_assoc($rs_1024)) {
                                      if($fila_1024["estado"]==3){
                                        $estado="Activo";
                                        $style_lo="";
                                        $buttonstyle="";
                                        if($fila_1024['estado']==0){
                                            $estado='Inactivo';
                                            $style_lo="style='color:red'";
                                          }
                                      
                                        $style_nivel="style='color:#5465ff;font-weight: bold;'";
                                        $style_sponsor_dir_1024="style='color:#5465ff;font-weight: bold;'";
                                        $lider_red="Lider de Red";
                                        if($fila_1024["patrocinador"]!="Lider de Red"){
                                            $obj->ruc=$fila_1024["patrocinador"];
                                            $obj->consultar_datos_ruc_x_nivel();
                                            $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                        }

                                        $lider_directo="Lider de Red";
                                          if($fila_1024["patrocinador_directo"]!="0"){
                                              $obj->ruc=$fila_1024["patrocinador_directo"];
                                              $obj->consultar_datos_ruc_x_nivel();
                                              $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                          }

                                        $html_1024.='<tr class="item'.$fila_1024["id_representante_conectado"].'">
                                        <td class="itemrow_b'.$fila_1024["id_representante_conectado"].'">'.$fila_1024["nombre"]." ".$fila_1024["apellidopaterno"]." ".$fila_1024["apellidomaterno"].'</td>
                                        <td class="itemrow_c'.$fila_1024["id_representante_conectado"].'" '.$style_sponsor_dir_1024.'>'.$fila_1024["ruc"].'</td>
                                        <td class="itemrow_d'.$fila_1024["id_representante_conectado"].'" '.$style_sponsor_dir_512.'>'.$lider_directo.'</td>
                                        <td '.$style_nivel.' class="itemrow_f'.$fila_1024["id_representante_conectado"].'">Nivel 10</td>
                                        <td class="itemrow_g'.$fila_1024["id_representante_conectado"].'">'.$fila_1024["patrocinador"].'</td>
                                        <td class="itemrow_g'.$fila_1024["id_representante_conectado"].'">'.$lider_red.'</td>
                                        <td '.$style_lo.' class="itemrow_h'.$fila_1024["id_representante_conectado"].'">'.$estado.'</td>
                                        <td class="itemrow_c'.$fila_1024["id_representante_conectado"].'">'.$fila_1024["fecharegistro_"].'</td>

                                        </tr>';
                                      }
                                      $rs_2048=$obj->listar_representantes_sponsor($fila_1024["ruc"]);
                                      while ($fila_2048=mysqli_fetch_assoc($rs_2048)) {
                                        if($fila_2048["estado"]==3){
                                          $estado="Activo";
                                          $style_lo="";
                                          $buttonstyle="";
                                          if($fila_2048['estado']==0){
                                              $estado='Inactivo';
                                              $style_lo="style='color:red'";
                                            }
                                      
                                          $style_nivel="style='color:#5465ff;font-weight: bold;'";
                                          $style_sponsor_dir_2048="style='color:#5465ff;font-weight: bold;'";
                                          $lider_red="Lider de Red";
                                          if($fila_2048["patrocinador"]!="Lider de Red"){
                                              $obj->ruc=$fila_2048["patrocinador"];
                                              $obj->consultar_datos_ruc_x_nivel();
                                              $lider_red=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                          }

                                          $lider_directo="Lider de Red";
                                          if($fila_2048["patrocinador_directo"]!="0"){
                                              $obj->ruc=$fila_2048["patrocinador_directo"];
                                              $obj->consultar_datos_ruc_x_nivel();
                                              $lider_directo=$obj->nombre.' '.$obj->apellidopaterno.' '.$obj->apellidomaterno;
                                          }

                                          $html_2048.='<tr class="item'.$fila_2048["id_representante_conectado"].'">
                                          <td class="itemrow_b'.$fila_2048["id_representante_conectado"].'">'.$fila_2048["nombre"]." ".$fila_2048["apellidopaterno"]." ".$fila_2048["apellidomaterno"].'</td>
                                          <td class="itemrow_c'.$fila_2048["id_representante_conectado"].'" '.$style_sponsor_dir_2048.'>'.$fila_2048["ruc"].'</td>
                                          <td class="itemrow_d'.$fila_2048["id_representante_conectado"].'" '.$style_sponsor_dir_1024.'>'.$lider_directo.'</td>
                                          <td '.$style_nivel.' class="itemrow_f'.$fila_2048["id_representante_conectado"].'">Nivel 11</td>
                                          <td class="itemrow_g'.$fila_2048["id_representante_conectado"].'">'.$fila_2048["patrocinador"].'</td>
                                          <td class="itemrow_g'.$fila_2048["id_representante_conectado"].'">'.$lider_red.'</td>
                                          <td '.$style_lo.' class="itemrow_h'.$fila_2048["id_representante_conectado"].'">'.$estado.'</td>
                                          <td class="itemrow_c'.$fila_2048["id_representante_conectado"].'">'.$fila_2048["fecharegistro_"].'</td>  
                                          </tr>';
                                        }
  
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }
                    }
              }
      }

}


}


$html.=$html_2.$html_4.$html_8.$html_16.$html_32.$html_64.$html_128.$html_256.$html_512.$html_1024.$html_2048.'</tbody>

                </table>
              ';
$html.='<!-- page script -->
  <script>
  $(function () {
    $("#example2").DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "retrieve": true,
    });

$("#exporttable").click(function(e){
var table = $("#example2");
var f=new Date();
  if(table && table.length){
          $(table).table2excel({
          exclude: ".noExl",
          name: "Excel Document Name",
          filename: "HC_Oncosalud_Rep_x_niveles" + f.getDate() + f.getMonth() + f.getFullYear() + ".xls",
          fileext: ".xls",
          exclude_img: false,
          exclude_links: false,
          exclude_inputs: false,
          preserveColors: false
          });
    }

});
  });
  </script>';


echo $html;
die();
?>
