<?php

include_once("cn.php");
class sub_categoria_producto extends cn{

    var $id_sub_categoria_producto;
    var $sub_categoria;
    var $id_categoria_producto;
    var $descripcion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;



    public function read()
    {
        $query="SELECT * FROM sub_categoria_producto ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO sub_categoria_producto VALUES(0,'$this->sub_categoria','$this->id_categoria_producto','$this->descripcion','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public function consult()
    {
        $query="SELECT cat.*,u.correo as userregistro,ua.correo as useractualiza FROM sub_categoria_producto cat 
        INNER JOIN usuario u ON cat.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON cat.id_usuarioactualiza=ua.id_usuario WHERE id_sub_categoria_producto='$this->id_sub_categoria_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_sub_categoria_producto=$fila["id_sub_categoria_producto"];
            $this->sub_categoria=$fila["sub_categoria"];
            $this->id_categoria_producto=$fila["id_categoria_producto"];
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
        $query="update sub_categoria_producto set sub_categoria='$this->sub_categoria',id_categoria_producto='$this->id_categoria_producto',descripcion='$this->descripcion',
        fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where
        id_sub_categoria_producto='$this->id_sub_categoria_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar()
    {
        $query="update sub_categoria_producto set estado='1' where id_sub_categoria_producto='$this->id_sub_categoria_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update sub_categoria_producto set estado='0' where id_sub_categoria_producto='$this->id_sub_categoria_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public function combo_x_categoria()
    {
        $query="SELECT * FROM sub_categoria_producto WHERE id_categoria_producto='$this->id_categoria_producto' and estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    
}

?>