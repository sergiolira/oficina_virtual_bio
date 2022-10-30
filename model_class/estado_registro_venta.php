<?php
include_once("cn.php");
class estado_registro_venta extends cn{
    var $id_estado_registro_venta;
    var $estado_registro_venta;
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function create(){
        $query="INSERT INTO estado_registro_venta VALUES(0,'$this->estado_registro_venta','$this->observacion',1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function combo(){
        $query="SELECT * FROM estado_registro_venta where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function read(){
        $query="select * from estado_registro_venta";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update(){
        $query="update estado_registro_venta set estado_registro_venta='$this->estado_registro_venta', observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_estado_registro_venta='$this->id_estado_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar(){
        $query="update estado_registro_venta set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_estado_registro_venta='$this->id_estado_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function desactivar(){
      $query="update estado_registro_venta set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_estado_registro_venta='$this->id_estado_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function consult(){
        $query="select * from estado_registro_venta where id_estado_registro_venta='$this->id_estado_registro_venta' ";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){            
            $this->id_estado_registro_venta=$fila["id_estado_registro_venta"];
            $this->estado_registro_venta=$fila["estado_registro_venta"];
            $this->estado=$fila["estado"];
            $this->observacion=$fila["observacion"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());   
    }

}
?>