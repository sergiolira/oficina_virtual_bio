<?php

include_once("cn.php");
class tipo_informacion extends cn{

    var $id_tipo_informacion;
    var $tipo_informacion;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;



    public function read()
    {
        $query="SELECT * FROM tipo_informacion ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT * FROM tipo_informacion WHERE id_tipo_informacion='$this->id_tipo_informacion'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_tipo_informacion=$fila["id_tipo_informacion"];
            $this->tipo_informacion=$fila["tipo_informacion"];
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
        $query="INSERT INTO tipo_informacion VALUES(0,'$this->tipo_informacion','$this->observacion','1'
        ,now(), now(),1,1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update tipo_informacion set tipo_informacion='$this->tipo_informacion',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=2 where
        id_tipo_informacion='$this->id_tipo_informacion'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar()
    {
        $query="update tipo_informacion set estado='1' where id_tipo_informacion='$this->id_tipo_informacion'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update tipo_informacion set estado='0' where id_tipo_informacion='$this->id_tipo_informacion'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM tipo_informacion where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    

    

}

?>


