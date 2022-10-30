<?php

include_once("cn.php");
class tipo_producto extends cn{

    var $id_tipo_producto;
    var $tipo_producto;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;
    var $userLogin;



    public function read()
    {
        $query="SELECT * FROM tipo_producto ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO tipo_producto VALUES(0,'$this->tipo_producto','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public function consult()
    {
        $query="SELECT tp.*,u.correo as userregistro,ua.correo as useractualiza FROM tipo_producto tp 
        INNER JOIN usuario u ON tp.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON tp.id_usuarioactualiza=ua.id_usuario WHERE id_tipo_producto='$this->id_tipo_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_tipo_producto=$fila["id_tipo_producto"];
            $this->tipo_producto=$fila["tipo_producto"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["userregistro"];
            $this->id_usuarioactualiza=$fila["useractualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update tipo_producto set tipo_producto='$this->tipo_producto',
        fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where
        id_tipo_producto='$this->id_tipo_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar()
    {
        $query="update tipo_producto set estado='1' where id_tipo_producto='$this->id_tipo_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update tipo_producto set estado='0' where id_tipo_producto='$this->id_tipo_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM tipo_producto WHERE estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    
}

?>