<?php
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');
include_once("cn.php");
class candidato extends cn{

  var $id_candidato;
  var $nombre;
  var $apellidopaterno;
  var $apellidomaterno;
  var $id_tipo_documento;
  var $nro_documento;
  var $telefono;
  var $correo;
  var $clave;
  var $id_genero;
  var $fecha_nacimiento;
  var $edad;
  var $patrocinador;
  var $patrocinador_directo;
  var $id_rep_usu_registro;
  var $id_pais;
  var $id_dep;
  var $id_pro;
  var $id_dis;
  var $direccion;
  var $relacion_candidato_reclutador;
  var $motiva_negocio;
  var $experiencia_comercial;
  var $cartera_cliente_entorno;
  var $disponibilidad_gestion_negocio;
  var $horario_gestion_negocio;
  
  var $observacion;
  var $estado;
  var $fechaactualiza;
  var $fecharegistro;
  var $id_usuarioregistro;
  var $id_usuarioactualiza;
  

  var $clave_v;
  var $patrocinador_datos;
  var $patrocinador_directo_datos;
  var $usu_registro_datos;
  var $fecha_ini_semana;
  var $fecha_fin_semana;
  var $mes_anio;

  public function list() {
    $query = "SELECT can.*,gen.genero,t_d.tipo_documento FROM candidato can
    LEFT join genero gen ON can.id_genero=gen.id_genero 
    LEFT join tipo_documento t_d on can.id_tipo_documento=t_d.id_tipo_documento 
    ORDER BY can.id_candidato DESC";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }


  public  function activar()
  {
      $query="update candidato set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_candidato='$this->id_candidato'";
      $res=mysqli_query($this->f_cn(),$query);
      mysqli_close($this->f_cn());
      return $res;
  }

  public  function desactivar()
  {
    $query="update id_candidato set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
    where id_candidato='$this->id_candidato'";
      $res=mysqli_query($this->f_cn(),$query);
      mysqli_close($this->f_cn());
      return $res;
  }

  public function save() {
   $query = "insert into candidato values('0','$this->nombre','$this->apellidopaterno','$this->apellidomaterno','$this->id_tipo_documento',
   '$this->nro_documento','$this->telefono','$this->correo','$this->clave','$this->id_genero','$this->fecha_nacimiento','$this->edad','1','1',
   '1','$this->id_pais','$this->id_dep','$this->id_pro','$this->id_dis','$this->direccion','1','1','1','1','1','1','$this->observacion',
   '1',now(),now(),'$this->id_usuarioregistro','$this->id_usuarioregistro')";
   $rs= mysqli_query($this->f_cn(),$query);
   mysqli_close($this->f_cn());
   return $rs;
  }

  public function edit() {
    $query = "update candidato set nombre='$this->nombre',apellidopaterno='$this->apellidopaterno',apellidomaterno='$this->apellidomaterno',
    id_tipo_documento='$this->id_tipo_documento',nro_documento='$this->nro_documento',telefono='$this->telefono',
    correo='$this->correo',clave='$this->clave',id_genero='$this->id_genero',fecha_nacimiento='$this->fecha_nacimiento',
    edad='$this->edad',patrocinador='$this->patrocinador',patrocinador_directo='$this->patrocinador_directo',
    estado='$this->estado',id_pais='$this->id_pais',id_dep='$this->id_dep',id_pro='$this->id_pro',
    id_dis='$this->id_dis',direccion='$this->direccion',observacion='$this->observacion',fechaactualiza=now() 
    where id_candidato='$this->id_candidato'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
 }
  
  public function consult(){
    $query = "select * from candidato where id_candidato='$this->id_candidato'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->id_candidato=$fila["id_candidato"];
      $this->nombre=$fila["nombre"];
      $this->apellidopaterno=$fila["apellidopaterno"];
      $this->apellidomaterno=$fila["apellidomaterno"];
      $this->id_tipo_documento=$fila["id_tipo_documento"];
      $this->nro_documento=$fila["nro_documento"];
      $this->telefono=$fila["telefono"];
      $this->correo=$fila["correo"];
      $this->clave=$fila["clave"];
      $this->id_genero=$fila["id_genero"];
      $this->fecha_nacimiento=$fila["fecha_nacimiento"];
      $this->edad=$fila["edad"];
      $this->patrocinador=$fila["patrocinador"];
      $this->patrocinador_directo=$fila["patrocinador_directo"];
      $this->id_rep_usu_registro=$fila["id_rep_usu_registro"];
      $this->id_pais=$fila["id_pais"];
      $this->id_dep=$fila["id_dep"];
      $this->id_pro=$fila["id_pro"];
      $this->id_dis=$fila["id_dis"];
      $this->direccion=$fila["direccion"];
      $this->relacion_candidato_reclutador=$fila["relacion_candidato_reclutador"];
      $this->motiva_negocio=$fila["motiva_negocio"];
      $this->experiencia_comercial=$fila["experiencia_comercial"];
      $this->cartera_cliente_entorno=$fila["cartera_cliente_entorno"];
      $this->disponibilidad_gestion_negocio=$fila["disponibilidad_gestion_negocio"];
      $this->horario_gestion_negocio=$fila["horario_gestion_negocio"];
      $this->observacion=$fila["observacion"];
      $this->estado=$fila["estado"];
      $this->fechaactualiza=$fila["fechaactualiza"];
      $this->fecharegistro=$fila["fecharegistro"];
      $this->id_usuarioregistro=$fila["id_usuarioregistro"];
      $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];      
    }
    mysqli_close($this->f_cn());
  }


  public function busca_edad($fecha_nacimiento){
    $dia=date("d");
    $mes=date("m");
    $ano=date("Y");


    $dianaz=date("d",strtotime($fecha_nacimiento));
    $mesnaz=date("m",strtotime($fecha_nacimiento));
    $anonaz=date("Y",strtotime($fecha_nacimiento));

    //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

    if (($mesnaz == $mes) && ($dianaz > $dia)) { $ano=($ano-1); }

    //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

    if ($mesnaz > $mes) { $ano=($ano-1);}

    //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

    $edad=($ano-$anonaz);
    
    return $edad;

  }
  
  public function validar_nro_doc(){
    $count=0;
    $query = "select SUM(contar) as contar from(select count(*) as contar from candidato where nro_documento='$this->nro_documento') resul";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
        $count=$fila["contar"];
        if(is_null($fila["contar"])){
        $count=0;
        }
    }    
    mysqli_close($this->f_cn());
    return $count;
  }
  
  public function validar_nro_doc_edit(){
    $count=0;
    $query = "select SUM(contar) as contar from(select count(*) as contar from candidato where nro_documento='$this->nro_documento' 
    and id_candidato!='$this->id_candidato') resul";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
        $count=$fila["contar"];
        if(is_null($fila["contar"])){
        $count=0;
        }
    }
    mysqli_close($this->f_cn());
    return $count;
  }

  public function consultar_datos_nro_documento(){
    $query = "select nombre,apellidopaterno,apellidomaterno,nro_documento,correo,telefono from candidato 
    where nro_documento='$this->nro_documento'";
    $rs=mysqli_query($this->f_cn(),$query);
    if($fila=mysqli_fetch_array($rs)){
      $this->nombre=$fila["nombre"];
      $this->apellidopaterno=$fila["apellidopaterno"];
      $this->apellidomaterno=$fila["apellidomaterno"];
      $this->nro_documento=$fila["nro_documento"];
      $this->correo=$fila["correo"];
      $this->telefono=$fila["telefono"];      
    }

    mysqli_close($this->f_cn());
  }


	}
?>