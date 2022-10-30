<?php
include_once("cn.php");
class beneficio_producto extends cn{

    var $id_beneficio_producto;
    var $titulo;
    var $descripcion;
    var $id_producto;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;



	public function read()
    {
        $query="SELECT b.*,p.nombre_producto FROM beneficio_producto b 
        INNER JOIN producto p ON b.id_producto=p.id_producto";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT bp.*,u.correo as userregistro,ua.correo as useractualiza FROM beneficio_producto bp 
        INNER JOIN usuario u ON bp.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON bp.id_usuarioactualiza=ua.id_usuario WHERE id_beneficio_producto='$this->id_beneficio_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_beneficio_producto=$fila["id_beneficio_producto"];
            $this->titulo=$fila["titulo"];
            $this->descripcion=$fila["descripcion"];
            $this->id_producto=$fila["id_producto"];
            $this->observacion=$fila["observacion"];
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
        $query="INSERT INTO beneficio_producto VALUES(0,'$this->titulo','$this->descripcion','$this->id_producto','$this->observacion','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update beneficio_producto set titulo='$this->titulo',descripcion='$this->descripcion',id_producto='$this->id_producto',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where
        id_beneficio_producto='$this->id_beneficio_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update beneficio_producto set estado='1' where id_beneficio_producto='$this->id_beneficio_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update beneficio_producto set estado='0' where id_beneficio_producto='$this->id_beneficio_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM beneficio_producto where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>