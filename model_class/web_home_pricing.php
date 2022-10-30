<?php

include_once("cn.php");
class web_home_pricing extends cn{ 
    var $id_web_home_pricing;
    var $titulo_h3;
    var $span;
    var $icono;
    var $enlace;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function read(){
        $query="SELECT * FROM web_home_pricing";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create(){
        $query="INSERT INTO web_home_pricing VALUES(
            0,
            '$this->titulo_h3',
            '$this->span',
            '$this->icono',
            '$this->enlace',
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
        $query="SELECT * FROM web_home_pricing WHERE id_web_home_pricing='$this->id_web_home_pricing'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_web_home_pricing=$fila["id_web_home_pricing"];
            $this->titulo_h3=$fila["titulo_h3"];
            $this->span=$fila["span"];
            $this->icono=$fila["icono"];
            $this->enlace=$fila["enlace"];
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
        $query="update web_home_pricing set 
        titulo_h3='$this->titulo_h3',
        span='$this->span',
        icono='$this->icono',
        enlace='$this->enlace',
        observacion='$this->observacion',
        fechaactualiza=now(),
        id_usuarioactualiza='1' 
        where id_web_home_pricing='$this->id_web_home_pricing'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar(){
        $query="update web_home_pricing set estado='1' where id_web_home_pricing='$this->id_web_home_pricing'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar(){
        $query="update web_home_pricing set estado='0' where id_web_home_pricing='$this->id_web_home_pricing'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo(){
        $query="SELECT * FROM web_home_pricing WHERE estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 
}