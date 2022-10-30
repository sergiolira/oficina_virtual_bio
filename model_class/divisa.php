<?php
include_once("cn.php");
class divisa extends cn{

    var $id_divisa;
    var $divisa;
    var $expresion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;



	public function read()
    {
        $query="SELECT * FROM divisa ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT uni.*,u.correo as userregistro,ua.correo as useractualiza FROM divisa uni 
        INNER JOIN usuario u ON uni.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON uni.id_usuarioactualiza=ua.id_usuario WHERE id_divisa='$this->id_divisa'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_divisa=$fila["id_divisa"];
            $this->divisa=$fila["divisa"];
            $this->expresion=$fila["expresion"];
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
        $query="INSERT INTO divisa VALUES(0,'$this->divisa','$this->expresion','1'
        ,now(), now(),1,1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update divisa set divisa='$this->divisa',expresion='$this->expresion',
        fechaactualiza=now(),id_usuarioactualiza=2 where
        id_divisa='$this->id_divisa'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update divisa set estado='1' where id_divisa='$this->id_divisa'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update divisa set estado='0' where id_divisa='$this->id_divisa'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM divisa where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>