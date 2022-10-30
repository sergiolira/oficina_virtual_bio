<?php
include_once("cn.php");
class representante extends cn{

  var $id_representante;
  var $nombre;
  var $apellidopaterno;
  var $apellidomaterno;
  var $correo;
  var $ruc;
  var $clave;
  var $telefono;
  var $razon_social;
  var $patrocinador;
  var $patrocinador_directo;
  var $posicion;
  var $id_nivel;
  var $id_nivel_categoria;
  var $id_tipo_red_mlm;
  var $observacion;
  var $estado;
  var $fechaactualiza;
  var $fecharegistro;
  var $id_usuarioregistro;
  var $id_usuarioactualiza;
  var $ruc_anterior;
  
  var $fecharegistro_sem_ini;
  var $fecharegistro_sem_fin;
  var $anio_mes;

public function list() {
    $query = "select rc.*,
    CASE  WHEN rc.patrocinador_directo='Lider de Red' THEN 'Lider de Red' WHEN rc.patrocinador_directo='unilevel' THEN 'Unilevel' 
    ELSE concat(rc_pat_dir.nombre,' ',rc_pat_dir.apellidopaterno,' ',rc_pat_dir.apellidomaterno) END as patrocinador_directo_datos,
    CASE  WHEN rc.patrocinador='0' THEN 'Lider de Red' WHEN rc.patrocinador='unilevel' THEN 'Unilevel' 
    ELSE concat(rc_pat.nombre,' ',rc_pat.apellidopaterno,' ',rc_pat.apellidomaterno) END as patrocinador_datos,
    DATE_FORMAT(rc.fecharegistro, '%Y-%m-%d') as fechaingreso,DATE_FORMAT(rc.fecharegistro, '%Y-%m') as fechaingreso_mes from representante rc
    left join representante rc_pat_dir on rc.patrocinador_directo=rc_pat_dir.ruc left join representante rc_pat on rc.patrocinador=rc_pat.ruc order by
    rc.fecharegistro desc";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

public function list_order_by_lideres_representantes() {
    $query = "select * from representante  ORDER BY `representante`.`patrocinador_directo` DESC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function list_representantes() {
    $query = "select * from representante where patrocinador_directo!='Lider de Red'  ORDER BY `id_representante` DESC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function save_representante() {
   $query = "insert into representante values('0','$this->nombre','$this->apellidopaterno','$this->apellidomaterno','$this->ruc',
   '$this->clave','$this->correo','$this->telefono','$this->razon_social','$this->patrocinador','$this->patrocinador_directo',
   '$this->posicion','1','1','3','$this->observacion','1',now(),now(),'$this->id_usuarioregistro','$this->id_usuarioregistro')";
   $rs= mysqli_query($this->f_cn(),$query);
   mysqli_close($this->f_cn());
   return $rs;
  }

  public function consultar_representante(){
    $query = "select r.*,CONCAT(u.nombre,' ',u.apellido_paterno,' ',u.apellido_materno) usuarioregistro,
    CONCAT(ua.nombre,' ',ua.apellido_paterno,' ',ua.apellido_materno) usuarioactualiza from representante r 
    inner join usuario u on r.id_usuarioregistro=u.id_usuario inner join usuario ua on r.id_usuarioactualiza=ua.id_usuario  
    where r.id_representante='$this->id_representante'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->id_representante=$fila["id_representante"];
      $this->nombre=$fila["nombre"];
      $this->apellidopaterno=$fila["apellidopaterno"];
      $this->apellidomaterno=$fila["apellidomaterno"];
      $this->correo=$fila["correo"];
      $this->clave=$fila["clave"];
      $this->telefono=$fila["telefono"];
      $this->ruc=$fila["ruc"];
      $this->razon_social=$fila["razon_social"];
      $this->patrocinador=$fila["patrocinador"];
      $this->patrocinador_directo=$fila["patrocinador_directo"];
      $this->posicion=$fila["posicion"];
      $this->id_nivel=$fila["id_nivel"];
      $this->id_nivel_categoria=$fila["id_nivel_categoria"];
      $this->id_tipo_red_mlm=$fila["id_tipo_red_mlm"];
      $this->estado=$fila["estado"];
      $this->observacion=$fila["observacion"];
      $this->fechaactualiza=$fila["fechaactualiza"];
      $this->fecharegistro=$fila["fecharegistro"];
      $this->id_usuarioregistro=$fila["usuarioregistro"];
      $this->id_usuarioactualiza=$fila["usuarioactualiza"];
    }
    mysqli_close($this->f_cn());
  }

  public function edit_representante() {
    $query = "update representante set nombre='$this->nombre',apellidopaterno='$this->apellidopaterno',apellidomaterno='$this->apellidomaterno',
    correo='$this->correo',clave='$this->clave',telefono='$this->telefono',razon_social='$this->razon_social',observacion='$this->observacion',
    fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where id_representante='$this->id_representante'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function edit_rep_conec() {
    $query = "update representante set nombre='$this->nombre',apellidopaterno='$this->apellidopaterno',apellidomaterno='$this->apellidomaterno',
    ruc='$this->ruc',correo='$this->correo',clave='$this->clave',telefono='$this->telefono',razon_social='$this->razon_social',observacion='$this->observacion',fechaactualiza=now(),
    id_usuarioactualiza='$this->id_usuarioactualiza' where ruc='$this->ruc_anterior'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function edit_eje_per_rep_conec() {
    $query = "update representante set nombre='$this->nombre',apellidopaterno='$this->apellidopaterno',apellidomaterno='$this->apellidomaterno'
    ,correo='$this->correo',telefono='$this->telefono',razon_social='$this->razon_social',observacion='$this->observacion',fechaactualiza=now(),
    id_usuarioactualiza='$this->id_usuarioactualiza' where ruc='$this->ruc_anterior'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  /*Editar representante sin clave */
  public function edit_representante_sc() {
    $query = "update representante set nombre='$this->nombre',apellidopaterno='$this->apellidopaterno',apellidomaterno='$this->apellidomaterno',correo='$this->correo',telefono='$this->telefono',razon_social='$this->razon_social',observacion='$this->observacion',fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where id_representante='$this->id_representante'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function delete() {
    $query = "update representante set estado=0 where id_representante='$this->id_representante'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function activate() {
    $query = "update representante set estado=1 where id_representante='$this->id_representante'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function validar_ruc_r() {
    $query = "select count(*) as contar from representante where ruc='$this->ruc'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){
         $count=$fila["contar"];         
      }
      mysqli_close($this->f_cn());
      return $count;
  }

   public function valida_doble_registro(){
    $query = "select * from representante where correo='$this->correo'";
    $rs = mysqli_query($this->f_cn(),$query);
    $row_cnt = mysqli_num_rows($rs);
    mysqli_close($this->f_cn());
    return $row_cnt;
  }


  public function valida_doble_actualiza(){
    $query = "select * from representante where correo='$this->correo' and id_representante!='$this->id_representante'";
    $rs = mysqli_query($this->f_cn(),$query);
    $row_cnt = mysqli_num_rows($rs);
    mysqli_close($this->f_cn());
    return $row_cnt;
  }

  public function consultar_datos_ruc(){
    $query = "select ruc, nombre, apellidopaterno, apellidomaterno,patrocinador_directo,patrocinador from representante where ruc='$this->ruc'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->nombre=$fila["nombre"];
      $this->apellidopaterno=$fila["apellidopaterno"];
      $this->apellidomaterno=$fila["apellidomaterno"];
      $this->patrocinador_directo=$fila["patrocinador_directo"];
      $this->patrocinador=$fila["patrocinador"];
      $this->ruc=$fila["ruc"];
    }
    mysqli_close($this->f_cn());
  }

  public function consultar_ruc_lider(){
    $query = "select patrocinador from representante where ruc='$this->ruc'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->patrocinador=$fila["patrocinador"];
      $this->ruc=$fila["patrocinador"];
    }
    mysqli_close($this->f_cn());
  }

  public function consultar_datos_sponsor_padre(){
     $query = "select nombre, apellidopaterno, apellidomaterno from representante where ruc='$this->ruc'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->nombre=$fila["nombre"];
      $this->apellidopaterno=$fila["apellidopaterno"];
      $this->apellidomaterno=$fila["apellidomaterno"];
    }
    mysqli_close($this->f_cn());
  }
  /*Consulta afiliados de patrocinados directo*/
  public function listar_representantes_sponsor($patrocinador_directo){
     $query = "select * from representante where estado=1 and patrocinador_directo='".$patrocinador_directo."' ORDER BY `posicion` ASC";
     $rs= mysqli_query($this->f_cn(),$query);
     mysqli_close($this->f_cn());
     return $rs;
  }
  /*Multinivel*/
  public function dato_representante_nivel_uno($ruc){
    $query = "select * from representante where ruc='".$ruc."'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

 /*Consulta representante Session RUC*/
 public function list_representantes_x_ruc() {
     $query = "select * from representante where ruc='$this->ruc' ORDER BY `id_representante` DESC";
     $rs= mysqli_query($this->f_cn(),$query);
     mysqli_close($this->f_cn());
     return $rs;
  }

public function combo_representante_lider(){
  $query = "select * from representante where estado=1 and patrocinador_directo='Lider de Red' ORDER BY `representante`.`id_representante`  DESC";
  $rs= mysqli_query($this->f_cn(),$query);
  mysqli_close($this->f_cn());
  return $rs;
}

public function combo_representantes_x_liderdered()
{
  $query = "select * from representante where estado=1 and patrocinador='$this->ruc' ORDER BY `representante`.`id_representante`  DESC";
  $rs= mysqli_query($this->f_cn(),$query);
  mysqli_close($this->f_cn());
  return $rs;
}

public function combo_representante(){
  $query = "select * from representante where estado=1 ORDER BY `representante`.`id_representante`  DESC";
  $rs= mysqli_query($this->f_cn(),$query);
  mysqli_close($this->f_cn());
  return $rs;
}

public function list_representantes_lideres(){
     $query = "select * from representante where patrocinador_directo='Lider de Red' ORDER BY id_representante ASC";
     $rs= mysqli_query($this->f_cn(),$query);
     mysqli_close($this->f_cn());
     return $rs;

  }
  

    /*Funciones Logeo de Representantes*/
public function verificar_clave_repre(){
    $query = "select clave from (select representante.clave FROM representante WHERE representante.ruc='$this->ruc' and representante.estado=1) usuarios ";

    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
         $this->clave_v=$fila["clave"];
        if(password_verify($this->clave, $this->clave_v)){
          $this->clave_v=$this->clave;
        }
        else{ $this->clave_v="false";}
      }else{
        $this->clave_v="false";
      }
      mysqli_close($this->f_cn());
      return $this->clave_v;
  }


      /*Funciones Logeo de Representantes*/
public function verificar_corre_RUC_repre(){
    $count=0;
    $query = "select count(*) as nro from representante where estado=1 and (correo='$this->correo' or ruc='$this->ruc')";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
        $count=$fila["nro"];
        if(is_null($fila["nro"])){
          $count=0;
          }
    }
    mysqli_close($this->f_cn());
    return $count;
}

  public function login_usuario_repre(){
    $query = "select ruc as user from ( select representante.ruc FROM representante WHERE representante.ruc='$this->ruc' and representante.estado=1) usuarios";

    $rs=mysqli_query($this->f_cn(),$query);
      if($fila=mysqli_fetch_array($rs)){
        $this->ruc=$fila["user"];
      }else{
        $this->ruc="false";
      }
      mysqli_close($this->f_cn());
  }

  public function datos_session_representante(){
    $query = "select * from representante where ruc='$this->ruc' and estado=1";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  /*Consulta afiliados de patrocinados directo reestructurar-red*/
  public function listar_representantes_sponsor_r($patrocinador_directo){
    $query = "select * from representante where patrocinador_directo='".$patrocinador_directo."' ORDER BY `id_representante` ASC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
 }

 /*Consulta : Validar el nro de afiliados del patrocinador*/
 public function valida_nro_afiliados($patrocinador_directo){
  $query = "select * from representante where estado=1 and patrocinador_directo='".$patrocinador_directo."' ORDER BY `id_representante` ASC";
  $rs = mysqli_query($this->f_cn(),$query);
  $row_cnt = mysqli_num_rows($rs);
  mysqli_close($this->f_cn());
  return $row_cnt;
}

  public function update_lider_red(){
    $query = "update representante set patrocinador='$this->patrocinador' where ruc='$this->ruc'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function count_representante() {
    $query = "select count(*) as contar from representante where estado=1";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){
         $count=$fila["contar"];
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function update_id_nivel_categoria(){
     $query = "update representante_backup  set id_nivel_categoria='$this->id_nivel_categoria' where ruc='$this->ruc' and nro_solicitud='08042021113453735';";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function count_rep_x_pat_dir($patrocinador_directo) {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and patrocinador_directo='$patrocinador_directo'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function update_red_x_solicitud(){
    $query = "update representante set patrocinador_directo='$this->patrocinador_directo',posicion='$this->posicion',fechaactualiza=now(),
    id_usuarioactualiza='$this->id_usuarioactualiza' where ruc='$this->ruc' and patrocinador='$this->patrocinador'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }


  public function remove_red_x_solicitud(){
    $query = "delete from representante  where ruc='$this->ruc' and (patrocinador='$this->patrocinador' || patrocinador='unilevel')";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }


  public function consultar_tipo_mlm(){
    $query = "select id_tipo_red_mlm from representante where ruc='$this->ruc'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->id_tipo_red_mlm=$fila["id_tipo_red_mlm"];
    }
    mysqli_close($this->f_cn());
  }

  public function obtener_email(){
    $query = "select correo,ruc,nombre,apellidopaterno,apellidomaterno from representante where estado=1 and (correo='$this->correo' or ruc='$this->ruc')";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->correo=$fila["correo"];
      $this->ruc=$fila["ruc"];
      $this->nombre=$fila["nombre"];
      $this->apellidopaterno=$fila["apellidopaterno"];
      $this->apellidomaterno=$fila["apellidomaterno"];
    }
    mysqli_close($this->f_cn());
  }

  public function edit_password(){
    $query = "update representante set clave='$this->clave' where ruc='$this->ruc'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function total_hc_x_lider() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and patrocinador='$this->patrocinador' || ruc='$this->patrocinador'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function total_hc_x_lider_y_fecha_reg() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and (patrocinador='$this->patrocinador' || ruc='$this->patrocinador') 
    and DATE_FORMAT(fecharegistro, '%Y-%m-%d')<'$this->fecharegistro'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function total_hc_x_lider_y_rango_semanal() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and (patrocinador='$this->patrocinador' || ruc='$this->patrocinador') 
    and DATE_FORMAT(fecharegistro, '%Y-%m-%d') between '$this->fecharegistro_sem_ini' and '$this->fecharegistro_sem_fin'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function total_hc_x_patrocinador_directo_y_fecha_registro() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and patrocinador_directo='$this->patrocinador_directo' 
    and DATE_FORMAT(fecharegistro, '%Y-%m-%d')<'$this->fecharegistro'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function total_hc_x_patrocinador_directo_y_rango_semanal() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and patrocinador_directo='$this->patrocinador_directo'
    and DATE_FORMAT(fecharegistro, '%Y-%m-%d') between '$this->fecharegistro_sem_ini' and '$this->fecharegistro_sem_fin'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function red_hc_x_lider_y_fecha_reg() {
    $query = "select * from representante where estado=1 and (patrocinador='$this->patrocinador' || ruc='$this->patrocinador') 
    and DATE_FORMAT(fecharegistro, '%Y-%m-%d')<'$this->fecharegistro'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function nro_brazos_x_ruc_y_fecha_reg() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and patrocinador_directo='$this->patrocinador_directo'
    and DATE_FORMAT(fecharegistro, '%Y-%m-%d')<'$this->fecharegistro'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }


  public function total_hc_x_lider_y_menor_al_mes() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and (patrocinador='$this->patrocinador' || ruc='$this->patrocinador') 
    and DATE_FORMAT(fecharegistro, '%Y-%m')<'$this->anio_mes'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function total_hc_x_patrocinador_directo_mensual() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and patrocinador_directo='$this->patrocinador_directo' 
    and DATE_FORMAT(fecharegistro, '%Y-%m')<'$this->anio_mes'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function red_hc_x_lider_y_menor_al_mes() {
    $query = "select * from representante where estado=1 and (patrocinador='$this->patrocinador' || ruc='$this->patrocinador') 
    and DATE_FORMAT(fecharegistro, '%Y-%m')<'$this->anio_mes'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function nro_brazos_x_ruc_y_mes() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and patrocinador_directo='$this->patrocinador_directo'
    and DATE_FORMAT(fecharegistro, '%Y-%m')='$this->anio_mes'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function total_hc_nuevos_x_lider_x_mes() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and (patrocinador='$this->patrocinador' || ruc='$this->patrocinador') 
    and DATE_FORMAT(fecharegistro, '%Y-%m')='$this->anio_mes'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }

  public function total_hc_x_patrocinador_directo_x_mes() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and patrocinador_directo='$this->patrocinador_directo'
    and DATE_FORMAT(fecharegistro, '%Y-%m') = '$this->anio_mes'";
     $rs=mysqli_query($this->f_cn(),$query);
     if($fila=mysqli_fetch_array($rs)){         
         if(is_null($fila["contar"])){
          $count=0;
          }else{
            $count=$fila["contar"];
          }
      }
      mysqli_close($this->f_cn());
      return $count;
  }



}

?>