<?php
include_once("cn.php");
class representante extends cn{

  var $id_representante;
  var $tipo_persona;
  var $tipo_compra;
  var $descuento_x_registro;
  var $nombre;
  var $apellidopaterno;
  var $apellidomaterno;
  var $id_tipo_documento;
  var $nro_documento;
  var $clave;
  var $correo;
  var $telefono;
  var $razon_social;
  var $id_genero;
  var $id_pais;
  var $id_departamento;
  var $id_provincia;
  var $id_distrito;
  var $direccion;
  var $fecha_nacimiento;
  var $edad;
  var $fecha_baja;
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
  var $nro_documento_anterior;
  
  var $fecharegistro_sem_ini;
  var $fecharegistro_sem_fin;
  var $anio_mes;
  var $patrocinador_directo_datos;
  var $patrocinador_datos;

public function list() {
    $query = "select rc.*,
    CASE  WHEN rc.patrocinador_directo='Cabeza de Red' THEN 'Cabeza de Red' WHEN rc.patrocinador_directo='unilevel' THEN 'Unilevel' 
    ELSE rc_pat_dir.razon_social END as patrocinador_directo_datos,
    CASE  WHEN rc.patrocinador='Cabeza de Red' THEN 'Cabeza de Red' WHEN rc.patrocinador='unilevel' THEN 'Unilevel' 
    ELSE rc_pat.razon_social END as patrocinador_datos,
    DATE_FORMAT(rc.fecharegistro, '%Y-%m-%d') as fechaingreso,DATE_FORMAT(rc.fecharegistro, '%Y-%m') as fechaingreso_mes from representante rc
    left join representante rc_pat_dir on rc.patrocinador_directo=rc_pat_dir.nro_documento 
    left join representante rc_pat on rc.patrocinador=rc_pat.nro_documento order by
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
    $query = "select * from representante where patrocinador_directo!='Cabeza de Red'  ORDER BY `id_representante` DESC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function list_representantes_general() {
    $query = "select * from representante ORDER BY `representante`.`patrocinador` DESC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function save_representante() {
    $query = "insert into representante values('0', '$this->tipo_persona', '0', '0', '$this->nombre', '$this->apellidopaterno', 
   '$this->apellidomaterno', '$this->id_tipo_documento', '$this->nro_documento', '$this->clave', '$this->correo', '$this->telefono', 
   '$this->razon_social', '$this->id_genero', '$this->id_pais', '$this->id_departamento', '$this->id_provincia', '$this->id_distrito', 
   '$this->direccion','$this->fecha_nacimiento','$this->edad' ,'$this->fecha_baja', '$this->patrocinador', '$this->patrocinador_directo', 
   '1', 1, 1, 1, '$this->observacion', 1, now(),now(), '$this->id_usuarioregistro', '$this->id_usuarioactualiza')";
   $rs= mysqli_query($this->f_cn(),$query);
   mysqli_close($this->f_cn());
   return $rs;
  }

  public function consultar_representante(){
    $query = "select r.*,CONCAT(u.nombre,' ',u.apellido_paterno,' ',u.apellido_materno) usuarioregistro,
    CONCAT(ua.nombre,' ',ua.apellido_paterno,' ',ua.apellido_materno) usuarioactualiza,
    CASE  WHEN r.patrocinador_directo='Cabeza de Red' THEN 'Cabeza de Red' WHEN r.patrocinador_directo='unilevel' THEN 'Unilevel' 
    ELSE concat(rc_pat_dir.nombre,' ',rc_pat_dir.apellidopaterno,' ',rc_pat_dir.apellidomaterno) END as patrocinador_directo_datos,
    CASE  WHEN r.patrocinador='Cabeza de Red' THEN 'Cabeza de Red' WHEN r.patrocinador='unilevel' THEN 'Unilevel' 
    ELSE concat(rc_pat.nombre,' ',rc_pat.apellidopaterno,' ',rc_pat.apellidomaterno) END as patrocinador_datos from representante r 
    inner join usuario u on r.id_usuarioregistro=u.id_usuario inner join usuario ua on r.id_usuarioactualiza=ua.id_usuario  
    left join representante rc_pat_dir on r.patrocinador_directo=rc_pat_dir.nro_documento 
    left join representante rc_pat on r.patrocinador=rc_pat.nro_documento 
    where r.id_representante='$this->id_representante'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->id_representante=$fila["id_representante"];
      $this->tipo_persona=$fila["tipo_persona"];
      $this->tipo_compra=$fila["tipo_compra"];
      $this->descuento_x_registro=$fila["descuento_x_registro"];
      $this->nombre=$fila["nombre"];
      $this->apellidopaterno=$fila["apellidopaterno"];
      $this->apellidomaterno=$fila["apellidomaterno"];
      $this->id_tipo_documento=$fila["id_tipo_documento"];
      $this->nro_documento=$fila["nro_documento"];
      $this->clave=$fila["clave"];
      $this->correo=$fila["correo"];
      $this->telefono=$fila["telefono"];
      $this->razon_social=$fila["razon_social"];
      $this->id_genero=$fila["id_genero"];
      $this->id_pais=$fila["id_pais"];
      $this->id_departamento=$fila["id_departamento"];
      $this->id_provincia=$fila["id_provincia"];
      $this->id_distrito=$fila["id_distrito"];
      $this->direccion=$fila["direccion"];
      $this->fecha_nacimiento=$fila["fecha_nacimiento"];
      $this->edad=$fila["edad"];
      $this->fecha_baja=$fila["fecha_baja"];
      $this->patrocinador=$fila["patrocinador"];
      $this->patrocinador_directo=$fila["patrocinador_directo"];
      $this->posicion=$fila["posicion"];
      $this->estado=$fila["estado"];
      $this->observacion=$fila["observacion"];
      $this->estado=$fila["estado"];
      $this->patrocinador_datos=$fila["patrocinador_datos"];
      $this->patrocinador_directo_datos=$fila["patrocinador_directo_datos"];
      $this->fecharegistro=$fila["fecharegistro"];
      $this->fechaactualiza=$fila["fechaactualiza"];
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
    nro_documento='$this->nro_documento',correo='$this->correo',clave='$this->clave',telefono='$this->telefono',razon_social='$this->razon_social',
    observacion='$this->observacion',fechaactualiza=now(),
    id_usuarioactualiza='$this->id_usuarioactualiza' where nro_documento='$this->nro_documento_anterior'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function edit_eje_per_rep_conec() {
    $query = "update representante set nombre='$this->nombre',apellidopaterno='$this->apellidopaterno',apellidomaterno='$this->apellidomaterno'
    ,correo='$this->correo',telefono='$this->telefono',razon_social='$this->razon_social',observacion='$this->observacion',fechaactualiza=now(),
    id_usuarioactualiza='$this->id_usuarioactualiza' where nro_documento='$this->nro_documento_anterior'";
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

  public function activate_x_nro_documento() {
    $query = "update representante set estado=1 where nro_documento='$this->nro_documento'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function validar_nro_documento_r() {
    $query = "select count(*) as contar from representante where nro_documento='$this->nro_documento'";
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

  public function consultar_datos_nro_documento(){
    $query = "select nro_documento, nombre, apellidopaterno,apellidomaterno,patrocinador_directo,patrocinador,razon_social,correo,telefono,
    descuento_x_registro from representante where nro_documento='$this->nro_documento'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->nombre=$fila["nombre"];
      $this->apellidopaterno=$fila["apellidopaterno"];
      $this->apellidomaterno=$fila["apellidomaterno"];
      $this->patrocinador_directo=$fila["patrocinador_directo"];
      $this->patrocinador=$fila["patrocinador"];
      $this->nro_documento=$fila["nro_documento"];
      $this->correo=$fila["correo"];
      $this->telefono=$fila["telefono"];
      $this->razon_social=$fila["razon_social"];
      $this->descuento_x_registro=$fila["descuento_x_registro"];
    }
    mysqli_close($this->f_cn());
  }

  public function consultar_nro_documento_lider(){
    $query = "select patrocinador,nro_documento from representante where nro_documento='$this->nro_documento'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->patrocinador=$fila["patrocinador"];
      $this->nro_documento=$fila["nro_documento"];
    }
    mysqli_close($this->f_cn());
  }

  public function consultar_datos_sponsor_padre(){
     $query = "select nombre, apellidopaterno, apellidomaterno from representante where nro_documento='$this->nro_documento'";
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
     $query = "select * from representante where estado=1 and patrocinador_directo='".$patrocinador_directo."' ORDER BY `fecharegistro` ASC";
     $rs= mysqli_query($this->f_cn(),$query);
     mysqli_close($this->f_cn());
     return $rs;
  }
  /*Multinivel*/
  public function dato_representante_nivel_uno($nro_documento){
    $query = "select * from representante where nro_documento='".$nro_documento."'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

 /*Consulta representante Session nro_documento*/
 public function list_representantes_x_nro_documento() {
     $query = "select * from representante where nro_documento='$this->nro_documento' ORDER BY `id_representante` DESC";
     $rs= mysqli_query($this->f_cn(),$query);
     mysqli_close($this->f_cn());
     return $rs;
  }

public function combo_representante_lider(){
  $query = "select * from representante where estado=1 and patrocinador_directo='Cabeza de Red' ORDER BY `representante`.`id_representante`  DESC";
  $rs= mysqli_query($this->f_cn(),$query);
  mysqli_close($this->f_cn());
  return $rs;
}

public function combo_representantes_x_liderdered()
{
  $query = "select * from representante where estado=1 and patrocinador='$this->nro_documento' ORDER BY `representante`.`id_representante`  DESC";
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
     $query = "select * from representante where patrocinador_directo='Cabeza de Red' ORDER BY id_representante ASC";
     $rs= mysqli_query($this->f_cn(),$query);
     mysqli_close($this->f_cn());
     return $rs;

  }
  

    /*Funciones Logeo de Representantes*/
public function verificar_clave_repre(){
    $query = "select clave from (select representante.clave FROM representante WHERE 
    representante.nro_documento='$this->nro_documento' and representante.estado=1) usuarios ";

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
public function verificar_corre_nro_documento_repre(){
    $count=0;
    $query = "select count(*) as nro from representante where estado=1 and (correo='$this->correo' or nro_documento='$this->nro_documento')";
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
    $query = "select nro_documento as user from ( select representante.nro_documento FROM representante 
    WHERE representante.nro_documento='$this->nro_documento' and representante.estado=1) usuarios";

    $rs=mysqli_query($this->f_cn(),$query);
      if($fila=mysqli_fetch_array($rs)){
        $this->nro_documento=$fila["user"];
      }else{
        $this->nro_documento="false";
      }
      mysqli_close($this->f_cn());
  }

  public function datos_session_representante(){
    $query = "select * from representante where nro_documento='$this->nro_documento' and estado=1";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  /*Consulta afiliados de patrocinados directo reestnro_documentoturar-red*/
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
    $query = "update representante set patrocinador='$this->patrocinador' where nro_documento='$this->nro_documento'";
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
     $query = "update representante_backup  set id_nivel_categoria='$this->id_nivel_categoria' where+
      nro_documento='$this->nro_documento' and nro_solicitud='08042021113453735';";
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
    echo $query = "update representante set patrocinador_directo='$this->patrocinador_directo',posicion='$this->posicion',fechaactualiza=now(),
    id_usuarioactualiza='$this->id_usuarioactualiza' where nro_documento='$this->nro_documento' and patrocinador='$this->patrocinador'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }


  public function remove_red_x_solicitud(){
    $query = "delete from representante  where nro_documento='$this->nro_documento' and (patrocinador='$this->patrocinador' || patrocinador='unilevel')";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }


  public function consultar_tipo_mlm(){
    $query = "select id_tipo_red_mlm from representante where nro_documento='$this->nro_documento'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->id_tipo_red_mlm=$fila["id_tipo_red_mlm"];
    }
    mysqli_close($this->f_cn());
  }

  public function obtener_email(){
    $query = "select correo,nro_documento,nombre,apellidopaterno,apellidomaterno from 
    representante where estado=1 and (correo='$this->correo' or nro_documento='$this->nro_documento')";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->correo=$fila["correo"];
      $this->nro_documento=$fila["nro_documento"];
      $this->nombre=$fila["nombre"];
      $this->apellidopaterno=$fila["apellidopaterno"];
      $this->apellidomaterno=$fila["apellidomaterno"];
    }
    mysqli_close($this->f_cn());
  }

  public function edit_password(){
    $query = "update representante set clave='$this->clave' where nro_documento='$this->nro_documento'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function total_hc_x_lider() {
    $count=0;
    $query = "select count(*) as contar from representante where estado=1 and patrocinador='$this->patrocinador' || nro_documento='$this->patrocinador'";
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
    $query = "select count(*) as contar from representante where estado=1 and (patrocinador='$this->patrocinador' || nro_documento='$this->patrocinador') 
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
    $query = "select count(*) as contar from representante where estado=1 and (patrocinador='$this->patrocinador' || nro_documento='$this->patrocinador') 
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
    $query = "select * from representante where estado=1 and (patrocinador='$this->patrocinador' || nro_documento='$this->patrocinador') 
    and DATE_FORMAT(fecharegistro, '%Y-%m-%d')<'$this->fecharegistro'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function nro_brazos_x_nro_documento_y_fecha_reg() {
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
    $query = "select count(*) as contar from representante where estado=1 and (patrocinador='$this->patrocinador' || nro_documento='$this->patrocinador') 
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
    $query = "select * from representante where estado=1 and (patrocinador='$this->patrocinador' || nro_documento='$this->patrocinador') 
    and DATE_FORMAT(fecharegistro, '%Y-%m')<'$this->anio_mes'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function nro_brazos_x_nro_documento_y_mes() {
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
    $query = "select count(*) as contar from representante where estado=1 and (patrocinador='$this->patrocinador' || nro_documento='$this->patrocinador') 
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

  public function cant_representantes_filtro($filtro){  
    $row_cnt=0;
    $query = "SELECT * FROM representante where estado=1 $filtro";
    $rs=mysqli_query($this->f_cn(),$query);  
    $row_cnt = mysqli_num_rows($rs);  
    mysqli_close($this->f_cn());
    return $row_cnt;
  }

  public function update_descuento_x_paquete(){
    $query = "UPDATE representante SET descuento_x_registro='$this->descuento_x_registro' WHERE nro_documento='$this->nro_documento'";
    $rs=mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  } 



}

?>