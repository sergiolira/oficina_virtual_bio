<?php
include_once("cn.php");
class trama_registro_ventas_temporal extends cn{

var $id_trama_registro_ventas_temporal;
var $nro_solicitud_session;
var $id_cabecera_registro_venta;
var $nro_solicitud;
var $fecha;
var $anio_detalle;
var $mes_detalle;
var $semana_detalle;
var $estado;//TODO:1 es activo, 0 es inactivo, 2 es en trama de pago, 3 es comisionado
var $fechaactualiza;
var $fecharegistro;
var $id_usuarioregistro;
var $id_usuarioactualiza;
var $fecha_inicio;
var $fecha_fin;


public function list_x_session() {
    $query = "SELECT crv.*,CASE  WHEN crv.tipo_cliente='ASESOR' THEN r.razon_social
    ELSE concat(c.nombre,' ',c.apellidopaterno,' ',c.apellidomaterno) END AS nombre_cliente,erv.estado_registro_venta,tt.estado AS estado_temporal,
    tt.id_trama_registro_ventas_temporal      
    FROM trama_registro_ventas_temporal tt  INNER JOIN cabecera_registro_venta crv ON tt.nro_solicitud=crv.nro_solicitud
    INNER JOIN detalle_registro_venta drv ON crv.nro_solicitud=drv.nro_solicitud
    LEFT JOIN representante r ON r.nro_documento=crv.nro_documento
    LEFT JOIN candidato c ON c.nro_documento=crv.nro_documento
    INNER JOIN tipo_venta tv ON drv.id_tipo_venta=tv.id_tipo_venta
    INNER JOIN estado_registro_venta erv ON crv.id_estado_registro_venta=erv.id_estado_registro_venta
    WHERE tt.estado=1  AND tt.nro_solicitud_session='$this->nro_solicitud_session' ORDER BY  id_trama_registro_ventas_temporal DESC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function save() {
   $query = "insert into trama_registro_ventas_temporal values('0','$this->nro_solicitud_session','$this->id_cabecera_registro_venta',
   '$this->nro_solicitud',now(),'','','','1',now(),now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
   $rs= mysqli_query($this->f_cn(),$query);
   mysqli_close($this->f_cn());
   return $rs;
  }

  public function delete() {
     $query = "update trama_registro_ventas_temporal set estado=0,id_usuarioactualiza='$this->id_usuarioactualiza',fechaactualiza=now() where 
    estado='1' and nro_solicitud='$this->nro_solicitud' and nro_solicitud_session='$this->nro_solicitud_session'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function activate() {
     $query = "update trama_registro_ventas_temporal set estado=1,id_usuarioactualiza='$this->id_usuarioactualiza',fechaactualiza=now() where 
     estado='0' and nro_solicitud='$this->nro_solicitud' and nro_solicitud_session='$this->nro_solicitud_session'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function consultar_nro_solicitud_session(){
    $nro_solicitud_session="";
     $query = "select nro_solicitud_session from trama_registro_ventas_temporal where DATE_FORMAT(fecha,'%Y-%m-%d') 
     BETWEEN '$this->fecha_inicio' and '$this->fecha_fin' limit 1";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $nro_solicitud_session=$fila["nro_solicitud_session"];
    }    
    mysqli_close($this->f_cn());
    return $nro_solicitud_session;
  }

  public function consultar_nro_solicitud_fecha(){
     $query = "select nro_solicitud_session,anio_detalle,mes_detalle,semana_detalle from trama_registro_ventas_temporal where 
     DATE_FORMAT(fecha,'%Y-%m-%d')  BETWEEN '$this->fecha_inicio' and '$this->fecha_fin' limit 1";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->anio_detalle=$fila["anio_detalle"];
      $this->mes_detalle=$fila["mes_detalle"];
      $this->semana_detalle=$fila["semana_detalle"];
      $this->nro_solicitud_session=$fila["nro_solicitud_session"];
    }    
    mysqli_close($this->f_cn());
  }

  public function validar_nro_solicitud() {
     $query = "select count(*) as contar from trama_registro_ventas_temporal where estado!='0' and nro_solicitud='$this->nro_solicitud' and 
     nro_solicitud_session='$this->nro_solicitud_session'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){
         $count=$fila["contar"];
      }
      mysqli_close($this->f_cn());
      return $count;
  }


  public function validar_nro_solicitud_eliminado() {
    $query = "select count(*) as contar from trama_registro_ventas_temporal where estado='0'  and nro_solicitud='$this->nro_solicitud' and 
    nro_solicitud_session='$this->nro_solicitud_session'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){
         $count=$fila["contar"];
      }
      mysqli_close($this->f_cn());
      return $count;
  }



  public function save_list_temporal_a_trama_ventas(){
    $query = "insert into trama_registro_ventas (nro_solicitud, fecha_pedido, fecha_entrega, correo, nro_documento, 
    patrocinador, patrocinador_directo, tipo_cliente, id_pais, id_departamento, id_provincia, id_distrito, direccion, referencia, 
    enlace_ubigeo, celular, id_estado_registro_venta, total_descuento, impuesto, costo_envio, total, fecha, anio_detalle, mes_detalle, 
    semana_detalle, observacion, estado, fecharegistro, fechaactualiza, id_usuarioregistro, id_usuarioactualiza) 
    select  rvo.nro_solicitud, rvo.fecha_pedido, rvo.fecha_entrega, rvo.correo, rvo.nro_documento, rvo.patrocinador, 
    rvo.patrocinador_directo, rvo.tipo_cliente, rvo.id_pais, rvo.id_departamento, rvo.id_provincia, rvo.id_distrito, rvo.direccion, rvo.referencia, 
    rvo.enlace_ubigeo, rvo.celular, rvo.id_estado_registro_venta, rvo.total_descuento, rvo.impuesto, rvo.costo_envio, rvo.total, 
    tt.fecha,'$this->anio_detalle','$this->mes_detalle','$this->semana_detalle',rvo.observacion, rvo.estado, rvo.fecharegistro, rvo.fechaactualiza, 
    rvo.id_usuarioregistro, rvo.id_usuarioactualiza from trama_registro_ventas_temporal tt inner join cabecera_registro_venta rvo on 
    tt.id_cabecera_registro_venta=rvo.id_cabecera_registro_venta where tt.nro_solicitud_session='$this->nro_solicitud_session' and tt.estado!='0'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function update_estado_enviado_trama_ventas() {
   $query = "update trama_registro_ventas_temporal set estado=2,id_usuarioactualiza='$this->id_usuarioactualiza',fechaactualiza=now(),
   semana_detalle='$this->semana_detalle',mes_detalle='$this->mes_detalle',anio_detalle='$this->anio_detalle' where 
    estado!='0' and nro_solicitud_session='$this->nro_solicitud_session'";
   $rs= mysqli_query($this->f_cn(),$query);
   mysqli_close($this->f_cn());
   return $rs;
 }


 
  

 }

?>