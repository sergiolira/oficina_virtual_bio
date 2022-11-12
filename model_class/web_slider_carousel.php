<?php
include_once("cn.php");
class web_slider_carousel extends cn{

    var $id_web_slider_carousel;
    var $posicion_imagen;
    var $imagen;
    var $h1;
    var $span;
    var $parrafo;
    var $boton_1_desc;
    var $boton_2_desc;
    var $boton_1_enlace;
    var $boton_2_enlace;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function create(){
        $query="INSERT INTO web_slider_carousel VALUES(0,
        '$this->posicion_imagen',
        '$this->imagen',
        '$this->h1',
        '$this->span',
        '$this->parrafo',
        '$this->boton_1_desc',
        '$this->boton_2_desc',
        '$this->boton_1_enlace',
        '$this->boton_2_enlace',
        1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function consult(){
        $query="select * from web_slider_carousel where id_web_slider_carousel='$this->id_web_slider_carousel' ";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){            
            $this->id_web_slider_carousel=$fila["id_web_slider_carousel"];
            $this->posicion_imagen=$fila["posicion_imagen"];
            $this->imagen=$fila["imagen"];
            $this->h1=$fila["h1"];
            $this->span=$fila["span"];
            $this->parrafo=$fila["parrafo"];
            $this->boton_1_desc=$fila["boton_1_desc"];
            $this->boton_2_desc=$fila["boton_2_desc"];
            $this->boton_1_enlace=$fila["boton_1_enlace"];
            $this->boton_2_enlace=$fila["boton_2_enlace"];
            $this->estado=$fila["estado"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());
    }

    public  function update(){
        $query="update web_slider_carousel set 
        posicion_imagen='$this->posicion_imagen',
        h1='$this->h1',
        span='$this->span',
        parrafo='$this->parrafo',
        boton_1_desc='$this->boton_1_desc',
        boton_2_desc='$this->boton_2_desc',
        boton_1_enlace='$this->boton_1_enlace',
        boton_2_enlace='$this->boton_2_enlace',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_web_slider_carousel='$this->id_web_slider_carousel'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function update_imagen(){
        $query="update web_slider_carousel set 
        imagen='$this->imagen', fechaactualiza=now(), id_usuarioactualiza='1' where id_web_slider_carousel='$this->id_web_slider_carousel'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar(){
        $query="update web_slider_carousel set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_web_slider_carousel='$this->id_web_slider_carousel'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read(){
        $query="SELECT * FROM web_slider_carousel";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function desactivar(){
      $query="update web_slider_carousel set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_web_slider_carousel='$this->id_web_slider_carousel'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function combo(){
        $query="SELECT * FROM web_slider_carousel where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
}