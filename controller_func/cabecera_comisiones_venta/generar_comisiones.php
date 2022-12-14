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


$html="";
$obj_cabecera_comisiones->anio=$_REQUEST["slt_anio"];
$obj_cabecera_comisiones->mes=$_REQUEST["slt_mes"];
$obj_cabecera_comisiones->semana_detalle=$_REQUEST["slt_semana"];

$rs_v_c=$obj_cabecera_comisiones->validate_comisiones();
/*Si ya esta generado las comisiones solo consulta por la tabla*/

$rs_v_cd=$obj_cabecera_comisiones->validate_comisiones_detalles();

if($rs_v_cd==0 && $rs_v_c>0){
$html='<div class="float-sm-right">
<button class="btn btn-info btn-sm generar_comisiones_detalles">Generar detalles comisionales <i class="fas fa-spinner"></i></button>
</div>';
$html.='<table id="example2"  class="table table-bordered table-striped table-sm" style="font-size: 9px;">
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

        $obj_cabecera_comisiones->anio=$_REQUEST["slt_anio"];
        $obj_cabecera_comisiones->mes=$_REQUEST["slt_mes"];
        $obj_cabecera_comisiones->semana_detalle=$_REQUEST["slt_semana"];
        $rscco=$obj_cabecera_comisiones->read_x_anio_mes_semana();
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
                        <button disabled type="button" id="itemrow_h_b'.$filacco["id_cabacera_comisiones_venta"].'" class="btn btn-info
                        btn-xs"  data-id="'.$filacco["id_cabacera_comisiones_venta"].'" 
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
}

if($rs_v_cd>0 && $rs_v_c>0){       
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

        $obj_cabecera_comisiones->anio=$_REQUEST["slt_anio"];
        $obj_cabecera_comisiones->mes=$_REQUEST["slt_mes"];
        $obj_cabecera_comisiones->semana_detalle=$_REQUEST["slt_semana"];
        $rscco=$obj_cabecera_comisiones->read_x_anio_mes_semana();
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
}
//TODO: Iniciamos la generacion de comisiones cabecera
$comision_nivel_1=0.20;$comision_nivel_2=0.08;$comision_nivel_3=0.04;$comision_nivel_4=0.02;$comision_nivel_5=0.02;
//TODO: lista de representantes
$rs_representantes=$obj_rep->list_representantes_general();
while($fila=mysqli_fetch_assoc($rs_representantes))
{
        
        $total_comision_nivel_1=0;$subtotal_comision_nivel_1=0;
        $total_comision_nivel_2=0;$subtotal_comision_nivel_2=0;
        $total_comision_nivel_3=0;$subtotal_comision_nivel_3=0;
        $total_comision_nivel_4=0;$subtotal_comision_nivel_4=0;
        $total_comision_nivel_5=0;$subtotal_comision_nivel_5=0;
        $total_comision=0;

        $obj_trama->anio_detalle=$_REQUEST["slt_anio"];
        $obj_trama->mes_detalle=$_REQUEST["slt_mes"];
        $obj_trama->semana_detalle=$_REQUEST["slt_semana"];
        $obj_cabecera_comisiones->anio=$_REQUEST["slt_anio"];
        $obj_cabecera_comisiones->mes=$_REQUEST["slt_mes"];
        $obj_cabecera_comisiones->semana_detalle=$_REQUEST["slt_semana"];
        
        //TODO:Lista de representantes nivel 1
        $rs_rep_nivel_1=$obj_rep->listar_representantes_sponsor($fila["nro_documento"]);
        while($fila_rep_nivel_1=mysqli_fetch_assoc($rs_rep_nivel_1))
        {
                $obj_trama->nro_documento=$fila_rep_nivel_1["nro_documento"];
                //TODO: Consulta de ventas por representante nivel 1
                $rs_ventas_nivel_1=$obj_trama->consultar_ventas_x_nro_documento_anio_mes_semana();
                while($fila_ventas_nivel_1=mysqli_fetch_assoc($rs_ventas_nivel_1))
                {                        
                        $sub_total=$fila_ventas_nivel_1["total_sin_costo_envio"];
                        $subtotal_comision_nivel_1=$sub_total*$comision_nivel_1;
                        $total_comision_nivel_1+=$subtotal_comision_nivel_1;                        
                }

                //TODO:Lista de representantes nivel 2
                $rs_rep_nivel_2=$obj_rep->listar_representantes_sponsor($fila_rep_nivel_1["nro_documento"]);
                while($fila_rep_nivel_2=mysqli_fetch_assoc($rs_rep_nivel_2))
                {       
                        $obj_trama->nro_documento=$fila_rep_nivel_2["nro_documento"];
                        //TODO: Consulta de ventas por representante nivel 2
                        $rs_ventas_nivel_2=$obj_trama->consultar_ventas_x_nro_documento_anio_mes_semana();
                        while($fila_ventas_nivel_2=mysqli_fetch_assoc($rs_ventas_nivel_2))
                        {                        
                                $sub_total=$fila_ventas_nivel_2["total_sin_costo_envio"];
                                $subtotal_comision_nivel_2=$sub_total*$comision_nivel_2;
                                $total_comision_nivel_2+=$subtotal_comision_nivel_2;                        
                        }

                        //TODO:Lista de representantes nivel 3
                        $rs_rep_nivel_3=$obj_rep->listar_representantes_sponsor($fila_rep_nivel_2["nro_documento"]);
                        while($fila_rep_nivel_3=mysqli_fetch_assoc($rs_rep_nivel_3))
                        {       
                                $obj_trama->nro_documento=$fila_rep_nivel_3["nro_documento"];
                                //TODO: Consulta de ventas por representante nivel 3
                                $rs_ventas_nivel_3=$obj_trama->consultar_ventas_x_nro_documento_anio_mes_semana();
                                while($fila_ventas_nivel_3=mysqli_fetch_assoc($rs_ventas_nivel_3))
                                {                        
                                        $sub_total=$fila_ventas_nivel_3["total_sin_costo_envio"];
                                        $subtotal_comision_nivel_3=$sub_total*$comision_nivel_3;
                                        $total_comision_nivel_3+=$subtotal_comision_nivel_3;                        
                                }

                                //TODO:Lista de representantes nivel 4
                                $rs_rep_nivel_4=$obj_rep->listar_representantes_sponsor($fila_rep_nivel_3["nro_documento"]);
                                while($fila_rep_nivel_4=mysqli_fetch_assoc($rs_rep_nivel_4))
                                {       
                                        $obj_trama->nro_documento=$fila_rep_nivel_4["nro_documento"];
                                        //TODO: Consulta de ventas por representante nivel 4
                                        $rs_ventas_nivel_4=$obj_trama->consultar_ventas_x_nro_documento_anio_mes_semana();
                                        while($fila_ventas_nivel_4=mysqli_fetch_assoc($rs_ventas_nivel_4))
                                        {                        
                                                $sub_total=$fila_ventas_nivel_4["total_sin_costo_envio"];
                                                $subtotal_comision_nivel_4=$sub_total*$comision_nivel_4;
                                                $total_comision_nivel_4+=$subtotal_comision_nivel_4;                        
                                        }
                                        //TODO:Lista de representantes nivel 5
                                        $rs_rep_nivel_5=$obj_rep->listar_representantes_sponsor($fila_rep_nivel_4["nro_documento"]);
                                        while($fila_rep_nivel_5=mysqli_fetch_assoc($rs_rep_nivel_5))
                                        {       
                                                $obj_trama->nro_documento=$fila_rep_nivel_5["nro_documento"];
                                                //TODO: Consulta de ventas por representante nivel 5
                                                $rs_ventas_nivel_5=$obj_trama->consultar_ventas_x_nro_documento_anio_mes_semana();
                                                while($fila_ventas_nivel_5=mysqli_fetch_assoc($rs_ventas_nivel_5))
                                                {                        
                                                        $sub_total=$fila_ventas_nivel_5["total_sin_costo_envio"];
                                                        $subtotal_comision_nivel_5=$sub_total*$comision_nivel_5;
                                                        $total_comision_nivel_5+=$subtotal_comision_nivel_5;                        
                                                }
                                        }
                                }
                        }

                }       

        }
        $total_comision=$total_comision_nivel_1+$total_comision_nivel_2+$total_comision_nivel_3+$total_comision_nivel_4+$total_comision_nivel_5;
        if($total_comision!="0.00"){
      
                /*Insertamos datos en la cabecera oncosalud ventas*/
                $obj_cabecera_comisiones->representante=$fila["razon_social"];
                $obj_cabecera_comisiones->correo=$fila["correo"];
                $obj_cabecera_comisiones->id_tipo_documento=$fila["id_tipo_documento"];
                $obj_cabecera_comisiones->nro_documento=$fila["nro_documento"];
                $obj_cabecera_comisiones->patrocinador=$fila["patrocinador"];
                $obj_cabecera_comisiones->patrocinador_directo=$fila["patrocinador_directo"];
                $obj_cabecera_comisiones->comision_total=number_format($total_comision,2,'.','');
                $obj_cabecera_comisiones->anio=$_REQUEST["slt_anio"];
                $obj_cabecera_comisiones->mes=$_REQUEST["slt_mes"];
                $obj_cabecera_comisiones->semana_detalle=$_REQUEST["slt_semana"];
                $obj_cabecera_comisiones->id_usuarioregistro=$_SESSION["id_usuario"];
                $obj_cabecera_comisiones->id_usuarioactualiza=$_SESSION["id_usuario"];
                $obj_cabecera_comisiones->create();
          
        }
}

$html='<div class="float-sm-right">
<button class="btn btn-info btn-sm generar_comisiones_detalles">Generar detalles comisionales <i class="fas fa-spinner"></i></button>
</div>';
$html.='<table id="example2"  class="table table-bordered table-striped table-sm" style="font-size: 9px;">
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

      $obj_cabecera_comisiones->anio=$_REQUEST["slt_anio"];
      $obj_cabecera_comisiones->mes=$_REQUEST["slt_mes"];
      $obj_cabecera_comisiones->semana_detalle=$_REQUEST["slt_semana"];
      $rscco=$obj_cabecera_comisiones->read_x_anio_mes_semana();
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
                        <button disabled type="button" id="itemrow_h_b'.$filacco["id_cabacera_comisiones_venta"].'" class="btn btn-info
                        btn-xs"  data-id="'.$filacco["id_cabacera_comisiones_venta"].'" 
                        data-nro_doc="'.$filacco["nro_documento"].'" data-anio="'.$filacco["anio"].'"
                        data-mes="'.$filacco["mes"].'" data-semana="'.$filacco["semana_detalle"].'" data-name="'.$filacco["representante"].'" >
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