<?php

include_once("cn.php");
class web_home_five_service extends cn{ 
    var $id_web_home_five_service;
    var $titulo_h3;
    var $parrafo;
    var $desc_boton;
    var $enlace;
    var $tipo;
    var $imagen;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function read(){
        $query="SELECT * FROM web_home_five_service";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create(){
        $query="INSERT INTO web_home_five_service VALUES(
            0,
            '$this->titulo_h3',
            '$this->parrafo',
            '$this->desc_boton',
            '$this->enlace',
            '$this->tipo',
            '$this->imagen',
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
        $query="SELECT * FROM web_home_five_service WHERE id_web_home_five_service='$this->id_web_home_five_service'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_web_home_five_service=$fila["id_web_home_five_service"];
            $this->titulo_h3=$fila["titulo_h3"];
            $this->parrafo=$fila["parrafo"];
            $this->desc_boton=$fila["desc_boton"];
            $this->enlace=$fila["enlace"];
            $this->tipo=$fila["tipo"];
            $this->imagen=$fila["imagen"];
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
    //        imagen='$this->imagen',
    public  function update(){
        $query="update web_home_five_service set 
        titulo_h3='$this->titulo_h3',
        parrafo='$this->parrafo',
        desc_boton='$this->desc_boton',
        enlace='$this->enlace',
        tipo='$this->tipo',
        observacion='$this->observacion',
        fechaactualiza=now(),
        id_usuarioactualiza='1' 
        where id_web_home_five_service='$this->id_web_home_five_service'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_imagen(){
        $query="update web_home_five_service set 
        imagen='$this->imagen' , fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_home_five_service='$this->id_web_home_five_service'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public  function activar(){
        $query="update web_home_five_service set estado='1' where id_web_home_five_service='$this->id_web_home_five_service'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar(){
        $query="update web_home_five_service set estado='0' where id_web_home_five_service='$this->id_web_home_five_service'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo(){
        $query="SELECT * FROM web_home_five_service WHERE estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 
}