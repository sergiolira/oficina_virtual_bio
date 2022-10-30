<?php
include_once("cn.php");
class web_banner_descripcion extends cn{

    var $id_web_banner_descripcion;
    var $titulo;
    var $imagen;
    var $subtitulo;
    var $parrafo;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;



	public function read()
    {
        $query="SELECT * FROM web_banner_descripcion ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT wb.*,u.correo as userregistro,ua.correo as useractualiza FROM web_banner_descripcion wb 
        INNER JOIN usuario u ON wb.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON wb.id_usuarioactualiza=ua.id_usuario WHERE id_web_banner_descripcion='$this->id_web_banner_descripcion'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_web_banner_descripcion=$fila["id_web_banner_descripcion"];
            $this->titulo=$fila["titulo"];
            $this->imagen=$fila["imagen"];
            $this->subtitulo=$fila["subtitulo"];
            $this->parrafo=$fila["parrafo"];
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
        $query="INSERT INTO web_banner_descripcion VALUES(0,'$this->titulo','$this->imagen','$this->subtitulo','$this->parrafo','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update web_banner_descripcion set titulo='$this->titulo',imagen='$this->imagen',subtitulo='$this->subtitulo',parrafo='$this->parrafo',
        fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where
        id_web_banner_descripcion='$this->id_web_banner_descripcion'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update web_banner_descripcion set estado='1' where id_web_banner_descripcion='$this->id_web_banner_descripcion'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update web_banner_descripcion set estado='0' where id_web_banner_descripcion='$this->id_web_banner_descripcion'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM web_banner_descripcion where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>