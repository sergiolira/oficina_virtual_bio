<?php
session_start();
include_once("../../model_class/representante.php");
include_once("../../model_class/afiliado.php");
$obj=new representante();
$obja=new afiliado();
$rs=$obj->list();
$posicion_="";
$patrocinador_directo="Lider de Red";
$html='<table id="example2" class="table table-bordered table-striped table-sm" style="font-size: 9px;" style="font-size: 9px;">
                  <thead>
                  <tr>
                    <th>N° </th>
                    <th>N° Documento</th>
                    <th>Datos</th>
                    <th>Codigo Sponsor</th>
                    <th>Sponsor </th>
                    <th title="Numero de brazos directos">N° Brazos directos</th>
                    <th>Cabeza de Red</th>
                    <th>Estado </th>
                    <th>Fecha registro</th>
                    <th>.::Acciones::. </th>
                  </tr>
                  </thead>
                  <tbody class="tbody_list">';
$c=0;
$lider_red=0;
while($fila=mysqli_fetch_assoc($rs)){
  $c++;
  $estado="Activo";
  $style_lo="";
  $buttonstyle="";
  $buttonedit="";
  $buttonshow="";

  if($_SESSION["id_rol"]=="1"){
      $buttonstyle='<button type="button" class="btn btn-danger btn-xs itemrow_jbtn'.$fila["id_representante"].'" title="Eliminar" 
      id="delete-representante" data-id="'.$fila["id_representante"].'" data-title="'.$fila["nro_documento"].'" 
      data-content="'.$fila["nro_documento"].'"><i id="itemrow_jbtn'.$fila["id_representante"].'" class="far fa-trash-alt"></i></button>';

       /*Boton Editar y Ver */
      $buttonedit='<button type="button" class="btn btn-info btn-xs add-modal-representante" title="Editar" id="edit-representante" 
      data-id="'.$fila["id_representante"].'" data-title="'.$fila["nro_documento"].'" data-content="'.$fila["nro_documento"].'">
      <i class="far fa-edit"></i></button>';
      $buttonshow='<button type="button" class="btn btn-success btn-xs show-modal-representante" title="Ver Detalles" 
      id="show-representante" data-id="'.$fila["id_representante"].'" data-title="'.$fila["nro_documento"].'" data-content="'.$fila["nro_documento"].'">
      <i class="far fa-eye"></i></button>';

      if($fila["posicion"]=="0"){
        $buttonedit='<button type="button" class="btn btn-info btn-xs add-modal-representante-lider" title="Editar" 
        id="edit-representante" data-id="'.$fila["id_representante"].'" data-title="'.$fila["nro_documento"].'" data-content="'.$fila["nro_documento"].'">
        <i class="far fa-edit"></i></button>';
      }

      if($fila['estado']==0){
        $estado='Inactivo';
        $style_lo="style='color:red'";
        $buttonstyle='<button type="button" class="btn btn-success btn-xs itemrow_jbtn'.$fila["id_representante"].'" title="Activar" 
        id="activate-representante" data-id="'.$fila["id_representante"].'" data-title="'.$fila["nro_documento"].'" data-content="'.$fila["nro_documento"].'">
        <i id="itemrow_jbtn'.$fila["id_representante"].'" class="fas fa-user-check"></i></button>';
      }

  }elseif($_SESSION["id_rol"]=="2"){
   
      /*Boton Editar y Ver */
    $buttonedit='<button type="button" class="btn btn-info btn-xs add-modal-representante" title="Editar" id="edit-representante" 
    data-id="'.$fila["id_representante"].'" data-title="'.$fila["nro_documento"].'" data-content="'.$fila["nro_documento"].'">
    <i class="far fa-edit"></i></button>';
    $buttonshow='<button type="button" class="btn btn-success btn-xs show-modal-representante" title="Ver Detalles" id="show-representante" 
    data-id="'.$fila["id_representante"].'" data-title="'.$fila["nro_documento"].'" data-content="'.$fila["nro_documento"].'">
    <i class="far fa-eye"></i></button>';

    if($fila["posicion"]=="0"){
      $buttonedit='<button type="button" class="btn btn-info btn-xs add-modal-representante-lider" title="Editar" id="edit-representante"
       data-id="'.$fila["id_representante"].'" data-title="'.$fila["nro_documento"].'" data-content="'.$fila["nro_documento"].'">
       <i class="far fa-edit"></i></button>';
      
      
    }

    if($fila['estado']==0){
      $estado='Inactivo';
      $style_lo="style='color:red'";     
    }
    
  }else{
        if($fila['estado']==0){
          $estado='Inactivo';
          $style_lo="style='color:red'";
        }
        $buttonshow='<button type="button" class="btn btn-success btn-xs show-modal-representante" title="Ver Detalles" 
        id="show-representante" data-id="'.$fila["id_representante"].'" data-title="'.$fila["nro_documento"].'" data-content="'.$fila["nro_documento"].'">
        <i class="far fa-eye"></i></button>';
        if($fila["posicion"]=="0"){
          $buttonshow='<button type="button" class="btn btn-success btn-xs show-modal-representante-lider" 
          title="Ver Detalles" id="show-representante" data-id="'.$fila["id_representante"].'" data-title="'.$fila["nro_documento"].'" 
          data-content="'.$fila["nro_documento"].'"><i class="far fa-eye"></i></button>';
        }
    }

  $obja->ruc_patrocinador=$fila["nro_documento"];
  $rs_nro_afiliados=$obja->contar_afiliados_dos();

  $html.='<tr class="item'.$fila["id_representante"].'">
  <td class="itemrow_a'.$fila["id_representante"].'">'.$c.'</td>  
  <td class="itemrow_c'.$fila["id_representante"].'">'.$fila["nro_documento"].'</td>  
  <td class="itemrow_c'.$fila["id_representante"].'">'.$fila["razon_social"].'</td>
  <td class="itemrow_c'.$fila["id_representante"].'">'.$fila["patrocinador_directo"].'</td>
  <td class="itemrow_d'.$fila["id_representante"].'">'.$fila["patrocinador_directo_datos"].'</td>
  <td class="itemrow_g'.$fila["id_representante"].'">'.$rs_nro_afiliados.'</td>
  <td class="itemrow_g'.$fila["id_representante"].'">'.$fila["patrocinador_datos"].'</td>
  <td '.$style_lo.' class="itemrow_h'.$fila["id_representante"].'">'.$estado.'</td>
  <td class="itemrow_c'.$fila["id_representante"].'">'.$fila["fecharegistro"].'</td>
  <td class="itemrow_d'.$fila["id_representante"].'">
    '.$buttonedit.' '.$buttonstyle.' '.$buttonshow.'
  </td>
  </tr>';
}
$html.='</tbody>

                </table>
              ';
$html.='<!-- page script -->
  <script>
  $(function () {
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "retrieve": true,
    });
  });
  </script>';
echo $html;
die();
?>
