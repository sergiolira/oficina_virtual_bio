<?php
session_start();
include_once("../../model_class/representante.php");
include_once("../../model_class/trama_registro_ventas.php");
include_once("../../model_class/cabecera_registro_venta.php");
include_once("../../model_class/detalle_registro_venta.php");
include_once("../../model_class/cabecera_comisiones_venta.php");
include_once("../../model_class/detalle_comisiones_venta.php");
$obj_rep=new representante();
$obj_trama=new trama_registro_ventas();
$obj_cabecera=new cabecera_registro_venta();
$obj_detalle=new detalle_registro_venta();
$obj_cabecera_comisiones=new cabecera_comisiones_venta();
$obj_detalle_comisiones=new detalle_comisiones_venta();
//$objcco=new cabecera_comisiones_oncosalud_ventas();

if(trim($_REQUEST["anio"])!="0"){
  $obj_trama->anio_detalle=$_REQUEST["anio"];
}
if(trim($_REQUEST["mes"])!="0"){
  $obj_trama->mes_detalle=$_REQUEST["mes"];
}
if(trim($_REQUEST["semana"])!="0"){
  $obj_trama->semana_detalle=$_REQUEST["semana"];
}
if(trim($_REQUEST["id"])!="0"){
  $obj_cabecera_comisiones->id_cabecera_comisiones_venta=$_REQUEST["id"];
  $obj_detalle_comisiones->id_cabacera_comisiones_venta=$_REQUEST["id"];
}
if(trim($_REQUEST["nro_doc"])!="0"){
  $nro_documento=$_REQUEST["nro_doc"];
}

/***Validar si el nro de detalle  existe***/
$obj_detalle_comisiones->id_cabacera_comisiones_venta=$_REQUEST["id"];
$rs_v_n_d=$obj_detalle_comisiones->validate_nro_detalle();
if($rs_v_n_d>0)
{

  $html='<div id="no-more-tables">
            <table id="example3" class="table table-bordered table-striped table-condensed cf" style="font-size: 9px;">
                  <thead class="cf">
                  <tr>
                    <th>N° </th>
                    <th>Asesor </th>
                    <th>N° de documento </th>
                    <th>Nivel </th>
                    <th>Tipo de venta </th>
                    <th>Cantidad </th>
                    <th>Subtotal </th>
                    <th>Comisión</th>
                    <th>Comisión total</th>
                  </tr>
                  </thead>
                  <tbody>';
  $nro=0;
  $rsdcov=$obj_detalle_comisiones->consult_x_id_cabacera_comisiones_venta();
  while ($filadcov=mysqli_fetch_assoc($rsdcov)) 
  {     
        $nro++;
        $style_button='btn-success';
    
        /*Opciones de nivel  de la red para sus estilos*/
        switch ($filadcov["nivel"]) {
            case '1':
                $style_nivel="style='color:#ffbf00;font-weight: bold;'";
                break;
            case '2':
                $style_nivel="style='color:#fc2200;font-weight: bold;'";
                break;
            case '3':
                $style_nivel="style='color:#010101;font-weight: bold;'";
                break;
            case '4':
                $style_nivel="style='color:#0000ff;font-weight: bold;'";
                break;
            default:
                $style_nivel="style='color:#87ceeb;font-weight: bold;'";
                break;
        }

        $html.='<tr class="item'.$filadcov["id_detalle_comisiones_venta"].'">
            <td class="itemrow_a'.$filadcov["id_detalle_comisiones_venta"].'">'.$nro.'</td>
            <td class="itemrow_a'.$filadcov["id_detalle_comisiones_venta"].'">'.$filadcov["razon_social"].'</td>
            <td class="itemrow_b'.$filadcov["id_detalle_comisiones_venta"].'">'.$filadcov["nro_documento"].'</td>
            <td '.$style_nivel.' class="itemrow_f'.$filadcov["id_detalle_comisiones_venta"].'">Nivel '.$filadcov["nivel"].'</td>
            <td class="itemrow_e'.$filadcov["id_detalle_comisiones_venta"].'">'.$filadcov["tipo_venta"].'</td>
            <td class="itemrow_f'.$filadcov["id_detalle_comisiones_venta"].'">'.$filadcov["cantidad"].'</td>
            <td class="itemrow_f'.$filadcov["id_detalle_comisiones_venta"].'">$ '.$filadcov["sub_total"].'</td>
            <td class="itemrow_g'.$filadcov["id_detalle_comisiones_venta"].'">$ '.$filadcov["comision"].'</td>
            <td class="itemrow_h'.$filadcov["id_detalle_comisiones_venta"].'">$ '.number_format($filadcov["comision_subtotal"],2,'.',' ').'</td>
            </tr>';       
     
      
    }

    $html.='</tbody>
                    </table></div>
                ';

    $html.='<!-- page script -->
    <script>
    $(function () {
        $("#example3").DataTable({
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

}
?>
