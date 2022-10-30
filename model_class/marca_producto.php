<?php

include_once("cn.php");
class marca_producto extends cn{

    var $id_marca_producto;
    var $marca_producto;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;
    var $userLogin;



    public function read()
    {
        $query="SELECT * FROM marca_producto ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO marca_producto VALUES(0,'$this->marca_producto','1'
        ,now(), now(),'$this->userLogin','$this->userLogin')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public function consult()
    {
        $query="SELECT m.*,u.correo as userregistro,ua.correo as useractualiza FROM marca_producto m 
        INNER JOIN usuario u ON m.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON m.id_usuarioactualiza=ua.id_usuario WHERE id_marca_producto='$this->id_marca_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_marca_producto=$fila["id_marca_producto"];
            $this->marca_producto=$fila["marca_producto"];
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
        $query="update marca_producto set marca_producto='$this->marca_producto',
        fechaactualiza=now(),id_usuarioactualiza='$this->userLogin' where
        id_marca_producto='$this->id_marca_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar()
    {
        $query="update marca_producto set estado='1' where id_marca_producto='$this->id_marca_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update marca_producto set estado='0' where id_marca_producto='$this->id_marca_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM marca_producto WHERE estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    
}

?>