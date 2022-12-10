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


$html=""; $filtro="";
$slt_anio=$_REQUEST["slt_anio"];
$slt_mes=$_REQUEST["slt_mes"];
$slt_semana=$_REQUEST["slt_semana"];
 
if($slt_anio!=0 && $slt_anio!=""){
    $filtro.=" AND anio='".$slt_anio."' ";
}

if($slt_mes!=0 && $slt_mes!=""){
    $filtro.=" AND mes='".$slt_mes."' ";
}

if($slt_semana!=0 && $slt_semana!=""){
    $filtro.=" AND semana_detalle='".$slt_semana."' ";
}

if($_SESSION["id_rol"]=="3"){
    $filtro.=" AND nro_documento='".$_SESSION["nro_documento"]."' ";   
}


$html='<table id="example2"  class="table table-bordered table-striped table-sm" style="font-size: 9px;">
        <thead>
        <tr>
        <th>N° </th>
        <th>N° de solicitud </th>
        <th>Asesor </th>
        <th>N° documento </th>
        <th>Correo </th>
        <th>Cod de Sponsor </th>
        <th>Comisión total</th>
        <th>Año</th>
        <th>Mes</th>
        <th>Semanal</th>
        <th>.::.</th>
        </tr>
        </thead>
        <tbody class="tbody_list">';

        
        $rscco=$obj_cabecera_comisiones->read_filtro($filtro);
        $nro=0;
        while($filacco=mysqli_fetch_assoc($rscco))
        {
        $nro++;
        $html.='<tr class="item'.$filacco["id_cabacera_comisiones_venta"].'">
                        <td class="itemrow_b'.$filacco["id_cabacera_comisiones_venta"].'">'.$nro.'</td>
                        <td class="itemrow_b'.$filacco["id_cabacera_comisiones_venta"].'">'.$filacco["id_cabacera_comisiones_venta"].'</td>
                        <td class="itemrow_b'.$filacco["id_cabacera_comisiones_venta"].'">'.$filacco["representante"].'</td>
                        <td class="itemrow_c'.$filacco["id_cabacera_comisiones_venta"].'">'.$filacco["nro_documento"].'</td>
                        <td class="itemrow_c'.$filacco["id_cabacera_comisiones_venta"].'">'.$filacco["correo"].'</td>
                        <td class="itemrow_d'.$filacco["id_cabacera_comisiones_venta"].'">'.$filacco["patrocinador_directo"].'</td>
                        <td class="itemrow_g'.$filacco["id_cabacera_comisiones_venta"].'">$ '.number_format($filacco["comision_total"],2,'.',' ').'</td>                
                        <td class="itemrow_g'.$filacco["id_cabacera_comisiones_venta"].'">'.$filacco["semana_detalle"].'</td>
                        <td class="itemrow_i'.$filacco["id_cabacera_comisiones_venta"].'">'.$filacco["mes"].'</td>
                        <td class="itemrow_j'.$filacco["id_cabacera_comisiones_venta"].'">'.$filacco["anio"].'</td>
                        <td class="itemrow_h'.$filacco["id_cabacera_comisiones_venta"].'">
                        <button type="button" id="itemrow_h_b'.$filacco["id_cabacera_comisiones_venta"].'" class="btn btn-info
                        btn-xs show-modal-detalles-comisiones-x-nivel"  data-id="'.$filacco["id_cabacera_comisiones_venta"].'" 
                        data-nro_doc="'.$filacco["nro_documento"].'" data-anio="'.$filacco["anio"].'"
                        data-mes="'.$filacco["mes"].'" data-semana="'.$filacco["semana_detalle"].'" data-name="'.$filacco["representante"].'">
                        Ver detalles<i class="far fa-eye"></i></button>
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