<?php
session_start();
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');
include_once("../../model_class/trama_registro_ventas_temporal.php");
$obj=new trama_registro_ventas_temporal();



$fechainicio=new DateTime(); 
$fechafin=new DateTime(); 
$dia = new DateTime(); 
$dia=$dia->format('Y-m-d');
$nombre_dia=strftime("%A",strtotime($dia));


if($nombre_dia=="lunes"){
  $fechainicio=$fechainicio->format('Y-m-d');
  $fechafin=$fechafin->format('Y-m-d');
  
}elseif($nombre_dia=="martes"){
  $fechafin=$fechafin->format('Y-m-d');
  //$fechafin=$fechafin->format('Y-m-d');
  $fechainicio=date("Y-m-d",strtotime($fechafin."- 1 day")); 
}elseif ($nombre_dia=="miércoles" || utf8_encode($nombre_dia)=="miércoles" || $nombre_dia=="miercoles") {
  $fechafin=$fechafin->format('Y-m-d');
  //$fechafin=$fechafin->format('Y-m-d');
  $fechainicio=date("Y-m-d",strtotime($fechafin."- 2 day"));    
}elseif ($nombre_dia=="jueves") {
  $fechafin=$fechafin->format('Y-m-d');
  $fechainicio=date("Y-m-d",strtotime($fechafin."- 3 day"));    
}elseif ($nombre_dia=="viernes") {
  $fechafin=$fechafin->format('Y-m-d');
  //$fechafin=$fechafin->format('Y-m-d');
  $fechainicio=date("Y-m-d",strtotime($fechafin."- 4 day"));    
}elseif ($nombre_dia=="sábado" || utf8_encode($nombre_dia)=="sábado" || $nombre_dia=="sabado") {
  $fechafin=$fechafin->format('Y-m-d');
  $fechainicio=date("Y-m-d",strtotime($fechafin."- 5 day"));    
}elseif ($nombre_dia=="domingo") {
  $fechafin=$fechafin->format('Y-m-d');
  $fechainicio=date("Y-m-d",strtotime($fechafin."- 6 day"));    
}else{
echo "dia_incorrecto";
die();
}

  /**Conlas fechas buscamos una solicitud de trama ya registrama */
  $obj->fecha_inicio=$fechainicio;
  $obj->fecha_fin=$fechafin;
  $ses_res=$obj->consultar_nro_solicitud_session();
  if($ses_res==""){
      $nro_sol_temp="ts_tem_".date('dmy')."_".date('Hs')."_".rand(10, 99); 
      $_SESSION["nro_solicitud_tem_trama_ventas"]=$nro_sol_temp;
  }else{
      $_SESSION["nro_solicitud_tem_trama_ventas"]=$ses_res;
  }

/**Conlas fechas buscamos una solicitud de trama ya registrama */
$obj->fecha_inicio=$fechainicio;
$obj->fecha_fin=$fechafin;
$obj->consultar_nro_solicitud_fecha();
$htmlfecha="";
if($obj->anio_detalle!="" && $obj->anio_detalle!="0"){
  $año=$obj->anio_detalle;
  $mes=$obj->mes_detalle;
  $semana=$obj->semana_detalle;
  $htmlfecha='<div class="col-4">
  <!-- Date range -->
  <div class="form-group">
    <label>Rango de fechas<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_rango_fecha"></label></label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text text-info">
          <i class="far fa-calendar-alt"></i>
        </span>
      </div>
      <input type="hidden" id="hdn_fecha_rango" name="hdn_fecha_rango" value="1">
      <input type="hidden" id="anio_detalle" value="'.$año.'">
      <input type="hidden" id="mes_detalle" value="'.$mes.'">
      <input type="hidden" id="semana_detalle" value="'.$semana.'">
      <input type="text" class="form-control float-right" value="'.$semana.'" autocomplete="off" disabled>
    </div>
    <!-- /.input group -->
  </div>
  <!-- /.form group -->
</div>';
}else{

  $htmlfecha='<div class="col-4">
  <!-- Date range -->
  <div class="form-group">
    <label>Rango de fechas<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj_rango_fecha"></label></label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text text-info" id="span_rango_fecha">
          <i class="far fa-calendar-alt"></i>
        </span>
      </div>
      <input type="hidden" id="hdn_fecha_rango" name="hdn_fecha_rango" value="0">
      <input type="hidden" id="anio_detalle" value="0">
      <input type="hidden" id="mes_detalle" value="0">
      <input type="hidden" id="semana_detalle" value="0">
      <input type="text" class="form-control float-right" id="rango_fecha" autocomplete="off">
    </div>
    <!-- /.input group -->
  </div>
  <!-- /.form group -->
</div>';
}


$obj->nro_solicitud_session=$_SESSION["nro_solicitud_tem_trama_ventas"];
$rs=$obj->list_x_session();
$html='<table id="example3" class="table table-bordered table-striped table-sm " style="font-size: 9px;">
                  <thead>
                  <tr>
                    <th>N° </th>
                    <th>Nº Solicitud</th>
                    <th>Cliente</th>
                    <th>N° de doc</th>
                    <th>Fecha Pedido</th>
                    <th>Fecha Entrega</th>
                    <th>Total Dsct</th>
                    <th>Costo Envio</th>
                    <th>Total</th>
                    <th>Estado de venta</th>
                    <th>Enviado Trama</th>
                    <th>.::Acciones::.</th>
                  </tr>
                  </thead>
                  <tbody>';
$c=0;
while($fila=mysqli_fetch_assoc($rs)){
$c++;

if($fila["estado_temporal"]=="2"){
  $estado_trama_comision="Enviado";
}else{
  $estado_trama_comision="No Enviado";
}

if($fila["fecha_entrega"]!="1900-01-01"){
    $fecha_entrega=$fila["fecha_entrega"];
}else{
    $fecha_entrega="0000-00-00";
}
$html.='<tr class="item'.$fila["id_trama_registro_ventas_temporal"].'">
<td class="itemrow_a'.$fila["id_trama_registro_ventas_temporal"].'">'.$c.'</td>
<td>'.$fila["nro_solicitud"].'</td>
<td>'.ucwords(strtolower($fila["nombre_cliente"])).'</td>
<td>'.$fila["nro_documento"].'</td>
<td>'.$fila["fecha_pedido"].'</td>
<td>'.$fecha_entrega.'</td>
<td>'.$fila["total_descuento"].' %</td>
<td>$ '.$fila["costo_envio"].'</td>
<td>$ '.$fila["total"].'</td>
<td>'.$fila["estado_registro_venta"].'</td>
<td>'.$estado_trama_comision.'</td>
<td class="itemrow_d'.$fila["id_trama_registro_ventas_temporal"].'">
    <button type="button" class="btn btn-danger btn-xs delete-solicitud-item-trama" title="Eliminar item" 
    data-solicitud="'.$fila["nro_solicitud"].'" 
    data-id="'.$fila["id_trama_registro_ventas_temporal"].'"><i class="fas fa-times"></i> Elim.</button>      
  
</td>
</tr>';
}
$html.='</tbody>

                </table>
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
    "autoWidth": true,
    "retrieve": true,
    "scrollY": "75vh",
    "scrollCollapse": true,
  });
});
</script>';
echo '<div class="row">

<div class="col-12">
    <div class="card card-outline card-success">
      <div class="card-header">
        <div class="col-sm-12 d-flex justify-content-center">
          <h4><u>Trama de Ventas para generar comisiones</u></h4>
        </div>
        <div class="row" style="font-size: 12px;">
          <div class="card-body">
                '.$html.'
          </div>
            '.$htmlfecha.'
            <div class="col-5">
              <label for="txtobser">Comentario</label>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-eye"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter Comentario" id="txtobser" name="txtobser" >
              </div>
            </div>
            <div class="col-3">
              <label for="">&nbsp;</label>
              <div class="input-group mb-3">
                  
                  <button type="button" class="btn btn-block btn-outline-success generar_trama_ventas_comisiones" 
                  data-solicitud="'.$_SESSION["nro_solicitud_tem_trama_ventas"].'" title="Agregar lista a trama">
                  <i class="fas fa-list-ol"></i> Enviar Trama de ventas</button>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
</div>
<script>
//Date range picker
$("#rango_fecha").daterangepicker(

 {
    maxDate: moment().add(1, "month"),
    changeMonth: false,
    changeYear: false,
    stepMonths: 0,
    autoUpdateInput: false,
    autoApply: true,
    
 },
);

$("#rango_fecha").on("apply.daterangepicker", function(ev, picker) {
    $(this).val(picker.startDate.format("DD/MM/YYYY") + " al " + picker.endDate.format("DD/MM/YYYY"));
});
</script>
';
die();
?>


