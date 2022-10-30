<?php
include_once("cn.php");
class tipo_descuento extends cn{

    var $id_tipo_descuento;
    var $tipo_descuento;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;



	public function read()
    {
        $query="SELECT * FROM tipo_descuento ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT td.*,u.correo as userregistro,ua.correo as useractualiza FROM tipo_descuento td 
        INNER JOIN usuario u ON td.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON td.id_usuarioactualiza=ua.id_usuario WHERE id_tipo_descuento='$this->id_tipo_descuento'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_tipo_descuento=$fila["id_tipo_descuento"];
            $this->tipo_descuento=$fila["tipo_descuento"];
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
        $query="INSERT INTO tipo_descuento VALUES(0,'$this->tipo_descuento','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update tipo_descuento set tipo_descuento='$this->tipo_descuento',
        fechaactualiza=now(),id_usuarioactualiza=2 where
        id_tipo_descuento='$this->id_tipo_descuento'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update tipo_descuento set estado='1' where id_tipo_descuento='$this->id_tipo_descuento'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update tipo_descuento set estado='0' where id_tipo_descuento='$this->id_tipo_descuento'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM tipo_descuento where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>