<?php

include_once("cn.php");
class tipo_documento extends cn{

    var $id_tipo_documento;
    var $tipo_documento;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;


    public function read(){
        $query="SELECT * FROM tipo_documento";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;       
    }   

    public function create()
    {
        $query="INSERT INTO tipo_documento VALUES(0,'$this->tipo_documento','1'
        ,now(), now(),1,1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    
    public function consult()
    {
        $query="SELECT * FROM tipo_documento WHERE id_tipo_documento='$this->id_tipo_documento'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_tipo_documento=$fila["id_tipo_documento"];
            $this->tipo_documento=$fila["tipo_documento"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }
    
    public  function update()
    {
        $query="update tipo_documento set tipo_documento='$this->tipo_documento',
        fechaactualiza=now(),id_usuarioactualiza=2 where
        id_tipo_documento='$this->id_tipo_documento'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update tipo_documento set estado='1' where id_tipo_documento='$this->id_tipo_documento'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update tipo_documento set estado='0' where id_tipo_documento='$this->id_tipo_documento'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo(){
        $query="SELECT * FROM tipo_documento where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>

