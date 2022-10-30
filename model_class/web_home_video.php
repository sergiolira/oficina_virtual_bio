<?php

include_once("cn.php");
class web_home_video extends cn{ 
    var $id_web_home_video;
    var $titulo_h2;
    var $parrafo;
    var $imagen_you_poster;
    var $imagen_fondo;
    var $enlace_video;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function read(){
        $query="SELECT * FROM web_home_video";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create(){
        $query="INSERT INTO web_home_video VALUES(
            0,
            '$this->titulo_h2',
            '$this->parrafo',
            '$this->imagen_you_poster',
            '$this->imagen_fondo',
            '$this->enlace_video',
            '$this->observacion',
            '1',
            now(),
            now(),
            '1',
            '1')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public function consult(){
        $query="SELECT * FROM web_home_video WHERE id_web_home_video='$this->id_web_home_video'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_web_home_video=$fila["id_web_home_video"];
            $this->titulo_h2=$fila["titulo_h2"];
            $this->parrafo=$fila["parrafo"];
            $this->imagen_you_poster=$fila["imagen_you_poster"];
            $this->imagen_fondo=$fila["imagen_fondo"];
            $this->enlace_video=$fila["enlace_video"];
            $this->observacion=$fila["observacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update(){
        $query="update web_home_video set titulo_h2='$this->titulo_h2',parrafo='$this->parrafo', observacion='$this->observacion',  fechaactualiza=now(),  id_usuarioactualiza='1' 
        where id_web_home_video='$this->id_web_home_video'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    
    public function update_imagen_poster(){
        $query="update web_home_video set 
        imagen_you_poster='$this->imagen_you_poster', fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_home_video='$this->id_web_home_video'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_imagen_fondo(){
        $query="update web_home_video set 
        imagen_fondo='$this->imagen_fondo', fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_home_video='$this->id_web_home_video'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_enlace_video(){
        $query="update web_home_video set 
        enlace_video='$this->enlace_video', fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_home_video='$this->id_web_home_video'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }




    public  function activar(){
        $query="update web_home_video set estado='1' where id_web_home_video='$this->id_web_home_video'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar(){
        $query="update web_home_video set estado='0' where id_web_home_video='$this->id_web_home_video'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo(){
        $query="SELECT * FROM web_home_video WHERE estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 
}