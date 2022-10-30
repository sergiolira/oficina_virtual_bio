<?php
include_once("cn.php");
class estado_civil extends cn{

    var $id_estado_civil;
    var $estado_civil;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;



	public function read()
    {
        $query="SELECT * FROM estado_civil ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT * FROM estado_civil WHERE id_estado_civil='$this->id_estado_civil'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_estado_civil=$fila["id_estado_civil"];
            $this->estado_civil=$fila["estado_civil"];
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
        $query="INSERT INTO estado_civil VALUES(0,'$this->estado_civil','1'
        ,now(), now(),1,1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update estado_civil set estado_civil='$this->estado_civil',
        fechaactualiza=now(),id_usuarioactualiza=2 where
        id_estado_civil='$this->id_estado_civil'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update estado_civil set estado='1' where id_estado_civil='$this->id_estado_civil'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update estado_civil set estado='0' where id_estado_civil='$this->id_estado_civil'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo(){

        $query="SELECT * FROM estado_civil where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


}

?>