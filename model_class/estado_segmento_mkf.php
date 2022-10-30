<?php
include_once("cn.php");
class estado_segmento_mkf extends cn{

    var $id_estado_segmento_mkf;
    var $estado_segmento_mkf;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;



    public function read()
    {
        $query="SELECT * FROM estado_segmento_mkf ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT * FROM estado_segmento_mkf WHERE id_estado_segmento_mkf='$this->id_estado_segmento_mkf'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_estado_segmento_mkf=$fila["id_estado_segmento_mkf"];
            $this->estado_segmento_mkf=$fila["estado_segmento_mkf"];
            $this->observacion=$fila["observacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO estado_segmento_mkf VALUES(0,'$this->estado_segmento_mkf','$this->observacion','1'
        ,now(), now(),1,1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update estado_segmento_mkf set estado_segmento_mkf='$this->estado_segmento_mkf',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=2 where
        id_estado_segmento_mkf='$this->id_estado_segmento_mkf'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar()
    {
        $query="update estado_segmento_mkf set estado='1' where id_estado_segmento_mkf='$this->id_estado_segmento_mkf'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update estado_segmento_mkf set estado='0' where id_estado_segmento_mkf='$this->id_estado_segmento_mkf'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


}

?>