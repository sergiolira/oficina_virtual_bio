<?php
include_once("cn.php");
class solicitud_arbol_virtual extends cn{

  var $id_solicitud_arbolvirtual;
  var $nro_solicitud;
  /*Prolife / Representante / Lider*/
  var $tipo_solicitante;
  var $id_solicitante;
  /*Edit / Remove*/
  var $proceso;
  var $ruc_lider_red;
  var $ruc_inicial;
  var $ruc_patrocinador;
  var $ruc_usuario;
  var $posicion;
  /*1.En proceso/2.Pendiente (fue enviado guardado por el usuario)/3.En verificacion/4.Aceptado/5.Rechazado /*0 eliminado*/
  var $estado;
  var $fechaactualiza;
  var $fecharegistro;
  var $id_usuarioregistro;
  var $id_usuarioactualiza;


  public function list_eliminados() {
    $query = "select sav.*,CONCAT(r.nombre,' ',r.apellidopaterno,' ',r.apellidomaterno) rep_nombres,
    CONCAT(rpatr.nombre,' ',rpatr.apellidopaterno,' ',rpatr.apellidomaterno) pat_directo_nombres,
    CONCAT(rl.nombre,' ',rl.apellidopaterno,' ',rl.apellidomaterno) lider_nombres,r.correo,r.telefono,r.fecharegistro as fecha_ingreso from 
    solicitud_arbol_virtual sav inner join representante_conectado r on sav.ruc_usuario=r.ruc inner join  representante_conectado rpatr 
    on sav.ruc_patrocinador=rpatr.ruc inner join representante_conectado rl on rl.ruc=sav.ruc_lider_red where sav.estado!=0 and 
    sav.nro_solicitud='$this->nro_solicitud' and proceso='remove' ORDER BY sav.id_solicitud_arbolvirtual DESC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function save() {
     $query = "insert into solicitud_arbol_virtual values('0','$this->nro_solicitud','$this->tipo_solicitante','$this->id_solicitante','$this->proceso',
    '$this->ruc_lider_red','$this->ruc_inicial','$this->ruc_patrocinador','$this->ruc_usuario','$this->posicion','$this->estado',now(),now(),
    '$this->id_usuarioregistro','$this->id_usuarioactualiza')";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function delete_save_back() {
    $query = "update solicitud_arbol_virtual_back set estado='0' where estado=1 and ruc_inicial='$this->ruc_inicial'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function save_back() {
    $query = "insert into  solicitud_arbol_virtual_back values('0','$this->nro_solicitud','$this->tipo_solicitante','$this->id_solicitante','$this->proceso',
   '$this->ruc_lider_red','$this->ruc_inicial','$this->ruc_patrocinador','$this->ruc_usuario','$this->posicion','$this->estado',now(),now(),
   '$this->id_usuarioregistro','$this->id_usuarioactualiza')";
   $rs= mysqli_query($this->f_cn(),$query);
   mysqli_close($this->f_cn());
   return $rs;
  }

  public function validar_back_mes_actual($mes,$anio) {
    $query = "select count(*) as contar from solicitud_arbol_virtual_back where ruc_inicial='$this->ruc_inicial' and 
    DATE_FORMAT(fecharegistro, '%m')='$mes' and DATE_FORMAT(fecharegistro, '%Y')='$anio'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){
         $count=$fila["contar"];
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function list_administrativos() {
    $query = "select count(sav.nro_solicitud) as nro_cambios,sav.nro_solicitud,sav.tipo_solicitante,sav.id_solicitante,
    CONCAT(u.nombre,' ',u.apellido_paterno,' ',u.apellido_materno) nombre_solicitante,sav.ruc_lider_red,
    CONCAT(rlr.nombre,' ',rlr.apellidopaterno,' ',rlr.apellidomaterno) nombre_lider_de_red,sav.ruc_inicial,
    CONCAT(ri.nombre,' ',ri.apellidopaterno,' ',ri.apellidomaterno) nombre_ruc_inicial,sav.estado,
    date_format(sav.fecharegistro,'%Y/%m/%d') as fecharegistro,
    date_format(sav.fechaactualiza,'%Y/%m/%d') as fechaactualiza,
    sav.id_usuarioregistro,sav.id_usuarioactualiza from solicitud_arbol_virtual sav inner join 
    usuario u on sav.id_solicitante=u.id_usuario  inner join representante_conectado rlr on sav.ruc_lider_red=rlr.ruc 
    inner join representante_conectado ri on sav.ruc_inicial=ri.ruc  group by sav.nro_solicitud,sav.tipo_solicitante,sav.id_solicitante,sav.ruc_lider_red,sav.ruc_inicial,
    sav.estado,fechaactualiza,fecharegistro,sav.id_usuarioregistro,sav.id_usuarioactualiza,
    ri.nombre,ri.apellidopaterno,ri.apellidomaterno,rlr.nombre,rlr.apellidopaterno,rlr.apellidomaterno,
    u.nombre,u.apellido_paterno,u.apellido_materno ORDER BY fecharegistro DESC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function list_representantes($filtro) {
   $query = "select count(sav.nro_solicitud) as nro_cambios,sav.nro_solicitud,sav.tipo_solicitante,sav.id_solicitante,
   CONCAT(u.nombre,' ',u.apellidopaterno,' ',u.apellidomaterno) nombre_solicitante,sav.ruc_lider_red,
   CONCAT(rlr.nombre,' ',rlr.apellidopaterno,' ',rlr.apellidomaterno) nombre_lider_de_red,sav.ruc_inicial,
   CONCAT(ri.nombre,' ',ri.apellidopaterno,' ',ri.apellidomaterno) nombre_ruc_inicial,sav.estado,
   date_format(sav.fecharegistro,'%Y/%m/%d') as fecharegistro, date_format(sav.fechaactualiza,'%Y/%m/%d') as fechaactualiza,
   sav.id_usuarioregistro,sav.id_usuarioactualiza from  solicitud_arbol_virtual sav inner join representante u on sav.id_solicitante=u.ruc  inner 
   join representante rlr on sav.ruc_lider_red=rlr.ruc inner join representante ri on sav.ruc_inicial=ri.ruc  $filtro  
   group by sav.nro_solicitud,sav.tipo_solicitante,sav.id_solicitante,sav.ruc_lider_red,sav.ruc_inicial,sav.estado,fechaactualiza,fecharegistro,
   sav.id_usuarioregistro,sav.id_usuarioactualiza,ri.nombre,ri.apellidopaterno,ri.apellidomaterno,rlr.nombre,rlr.apellidopaterno,rlr.apellidomaterno,
    u.nombre,u.apellidopaterno,u.apellidomaterno ORDER BY fecharegistro DESC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  /*public function validar_nro_solicitud(){
    $query = "select * from solicitud_arbol_virtual where estado=1 and nro_solicitud='$this->nro_solicitud' and ruc_inicial='$this->ruc_inicial'";
    $rs = mysqli_query($this->f_cn(),$query);
    $row_cnt = mysqli_num_rows($rs);
    mysqli_close($this->f_cn());
    return $row_cnt;
  }

  public function delete_nro_solicitud() {
  $query = "update solicitud_arbol_virtual set estado='0' where estado=1 and nro_solicitud='$this->nro_solicitud' and ruc_inicial='$this->ruc_inicial'";
  $rs= mysqli_query($this->f_cn(),$query);
  mysqli_close($this->f_cn());
  return $rs;
  } */

  public function update_estado_pendiente() {
    $query = "update solicitud_arbol_virtual set estado='2' where estado=1 and nro_solicitud='$this->nro_solicitud' and ruc_inicial='$this->ruc_inicial'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  } 

  public function update_estado_en_verificacion() {
    $query = "update solicitud_arbol_virtual set estado='3' where nro_solicitud='$this->nro_solicitud' and ruc_inicial='$this->ruc_inicial'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  } 

  public function count_rep_x_pat_dir_solicitud($patrocinador_directo) {
    $query = "select count(*) as contar from solicitud_arbol_virtual where ruc_patrocinador='$patrocinador_directo' and 
    nro_solicitud='$this->nro_solicitud'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){
         $count=$fila["contar"];
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  /*Consulta afiliados de patrocinados directo*/
  public function listar_representantes_sponsor_solicitud($patrocinador_directo){
    $query = "select r.nombre,r.apellidopaterno,r.apellidomaterno,s.ruc_usuario as ruc,r.correo,r.telefono,s.posicion,r.id_nivel_categoria 
    from solicitud_arbol_virtual s inner join representante r on s.ruc_usuario=r.ruc where r.estado=1 and s.proceso='edit' and 
    s.ruc_patrocinador='".$patrocinador_directo."' and  s.nro_solicitud='$this->nro_solicitud' ORDER BY s.posicion ASC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
 }

 public function obtener_nro_solicitud_estado(){
   $query = "select estado from solicitud_arbol_virtual where nro_solicitud='$this->nro_solicitud' and ruc_inicial='$this->ruc_inicial' limit 1";
  $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){
         $estado=$fila["estado"];
      }
      mysqli_close($this->f_cn());
  return $estado;
}

public function list_solicitud_aceptada(){
$query = "select * from solicitud_arbol_virtual where estado=3 and nro_solicitud='$this->nro_solicitud' and ruc_inicial='$this->ruc_inicial' ORDER BY  ruc_patrocinador ASC";
$rs= mysqli_query($this->f_cn(),$query);
mysqli_close($this->f_cn());
return $rs;
}


public function update_estado_aceptada_x_id(){
  $query = "update solicitud_arbol_virtual set estado='4',fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where estado=3 and 
  nro_solicitud='$this->nro_solicitud' and ruc_inicial='$this->ruc_inicial' and id_solicitud_arbolvirtual='$this->id_solicitud_arbolvirtual' and 
  ruc_usuario='$this->ruc_usuario' and ruc_patrocinador='$this->ruc_patrocinador'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
}

public function validar_exite_lider_solicitud()
{
  $query = "select count(*) as contar from solicitud_arbol_virtual where ruc_usuario='$this->ruc_usuario' and 
    nro_solicitud='$this->nro_solicitud'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){
         $count=$fila["contar"];
      }
      mysqli_close($this->f_cn());
      return $count;
}


}
?>