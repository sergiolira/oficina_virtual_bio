<?php
include_once("cn.php");
class web_costo_envio_desc extends cn{

    var $id_web_costo_envio_desc;
    var $web_costo_envio_desc;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;



	public function read()
    {
        $query="SELECT * FROM web_costo_envio_desc ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT w.*,u.correo as userregistro,ua.correo as useractualiza FROM web_costo_envio_desc w 
        INNER JOIN usuario u ON w.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON w.id_usuarioactualiza=ua.id_usuario WHERE id_web_costo_envio_desc='$this->id_web_costo_envio_desc'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_web_costo_envio_desc=$fila["id_web_costo_envio_desc"];
            $this->web_costo_envio_desc=$fila["web_costo_envio_desc"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["userregistro"];
            $this->id_usuarioactualiza=$fila["useractualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO web_costo_envio_desc VALUES(0,'$this->web_costo_envio_desc','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update web_costo_envio_desc set web_costo_envio_desc='$this->web_costo_envio_desc',
        fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where
        id_web_costo_envio_desc='$this->id_web_costo_envio_desc'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update web_costo_envio_desc set estado='1' where id_web_costo_envio_desc='$this->id_web_costo_envio_desc'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update web_costo_envio_desc set estado='0' where id_web_costo_envio_desc='$this->id_web_costo_envio_desc'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM web_costo_envio_desc where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>