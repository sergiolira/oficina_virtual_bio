<?php
include_once("cn.php");
class afiliado extends cn{

  var $id_afiliado;
  var $ruc_patrocinador;
  var $ruc_usuario;
  var $posicion;
  var $nropersonas;
  var $estado;
  var $fechaactualiza;
  var $fecharegistro;
  var $id_usuarioregistro;
  var $id_usuarioactualiza;

  public function save_afiliado() {
   $query = "insert into afiliado values('0','$this->ruc_patrocinador','$this->ruc_usuario','1',1,now(),now(),'$this->id_usuarioregistro','$this->id_usuarioregistro')";
   $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function consulta_posicion_afiliados_dos(){
    $query = "select posicion from afiliado where ruc_patrocinador='$this->ruc_patrocinador' and estado=1 order by posicion asc";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }


  public function contar_afiliados_dos(){
     $query = "select count(*) as contar from afiliado where ruc_patrocinador='$this->ruc_patrocinador' and estado=1";
     $rs=mysqli_query($this->f_cn(),$query);
     mysqli_close($this->f_cn());
     if($fila=mysqli_fetch_array($rs)){
         $count=$fila["contar"];
      }
      return $count;
  }

  public function delete() {
    $query = "update afiliado set estado=0 where ruc_usuario='$this->ruc_usuario'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function activate() {
    $query = "update afiliado set estado=1 where ruc_usuario='$this->ruc_usuario'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }


  public function update_red_x_solicitud(){
    echo $query = "update afiliado set ruc_patrocinador='$this->ruc_patrocinador',posicion='$this->posicion',fechaactualiza=now(),
    id_usuarioactualiza='$this->id_usuarioactualiza' where ruc_usuario='$this->ruc_usuario'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

  public function remove_red_x_solicitud(){
    $query = "delete from afiliado  where ruc_usuario='$this->ruc_usuario'";
    $rs= mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $rs;
  }

}
?>