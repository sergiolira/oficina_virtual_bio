<?php

include_once("cn.php");
class unidad_medida extends cn{

    var $id_unidad_medida;
    var $unidad_medida;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;
    var $userLogin;



    public function read()
    {
        $query="SELECT * FROM unidad_medida ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO unidad_medida VALUES(0,'$this->unidad_medida','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public function consult()
    {
        $query="SELECT uni.*,u.correo as userregistro,ua.correo as useractualiza FROM unidad_medida uni 
        INNER JOIN usuario u ON uni.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON uni.id_usuarioactualiza=ua.id_usuario WHERE id_unidad_medida='$this->id_unidad_medida'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_unidad_medida=$fila["id_unidad_medida"];
            $this->unidad_medida=$fila["unidad_medida"];
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
        $query="update unidad_medida set unidad_medida='$this->unidad_medida',
        fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where
        id_unidad_medida='$this->id_unidad_medida'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar()
    {
        $query="update unidad_medida set estado='1' where id_unidad_medida='$this->id_unidad_medida'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update unidad_medida set estado='0' where id_unidad_medida='$this->id_unidad_medida'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM unidad_medida WHERE estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    
}

?>