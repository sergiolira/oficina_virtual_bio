<?php
include_once("cn.php");
class tipo_venta extends cn{
    var $id_tipo_venta;
    var $tipo_venta;
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function combo(){
        $query="SELECT * FROM tipo_venta where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create(){
        $query="INSERT INTO tipo_venta VALUES(0,'$this->tipo_venta','$this->observacion',1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read(){
        $query="select * from tipo_venta";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update(){
        $query="update tipo_venta set tipo_venta='$this->tipo_venta',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_tipo_venta='$this->id_tipo_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar(){
        $query="update tipo_venta set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_tipo_venta='$this->id_tipo_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function desactivar(){
      $query="update tipo_venta set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_tipo_venta='$this->id_tipo_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function consult(){
        $query="select * from tipo_venta where id_tipo_venta='$this->id_tipo_venta' ";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){            
            $this->id_tipo_venta=$fila["id_tipo_venta"];
            $this->tipo_venta=$fila["tipo_venta"];
            $this->observacion=$fila["observacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());   
    }

}
?>