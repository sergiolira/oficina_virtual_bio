<?php

include_once("cn.php");
class categoria_producto extends cn{

    var $id_categoria_producto;
    var $categoria;
    var $descripcion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;
    var $userLogin;



    public function read()
    {
        $query="SELECT * FROM categoria_producto ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO categoria_producto VALUES(0,'$this->categoria','$this->descripcion','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public function consult()
    {
        $query="SELECT cat.*,u.correo as userregistro,ua.correo as useractualiza FROM categoria_producto cat 
        INNER JOIN usuario u ON cat.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON cat.id_usuarioactualiza=ua.id_usuario WHERE id_categoria_producto='$this->id_categoria_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_categoria_producto=$fila["id_categoria_producto"];
            $this->categoria=$fila["categoria"];
            $this->descripcion=$fila["descripcion"];
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
        $query="update categoria_producto set categoria='$this->categoria',descripcion='$this->descripcion',
        fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where
        id_categoria_producto='$this->id_categoria_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar()
    {
        $query="update categoria_producto set estado='1' where id_categoria_producto='$this->id_categoria_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update categoria_producto set estado='0' where id_categoria_producto='$this->id_categoria_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM categoria_producto WHERE estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    
}

?>