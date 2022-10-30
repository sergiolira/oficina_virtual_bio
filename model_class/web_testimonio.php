<?php

include_once("cn.php");
class web_testimonio extends cn{ 
    var $id_web_testimonio;
    var $testimonio;
    var $nombre;
    var $apellido_paterno;
    var $apellido_materno;
    var $cargo;
    var $foto_perfil;
    var $imagen_you_poster;
    var $video;

    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function read(){
        $query="SELECT * FROM web_testimonio";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create(){
        $query="INSERT INTO web_testimonio VALUES(
            0,
            '$this->testimonio',
            '$this->nombre',
            '$this->apellido_paterno',
            '$this->apellido_materno',
            '$this->cargo',
            '$this->foto_perfil',
            '$this->imagen_you_poster',
            '$this->video',
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
        $query="SELECT * FROM web_testimonio WHERE id_web_testimonio='$this->id_web_testimonio'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_web_testimonio=$fila["id_web_testimonio"];
            $this->testimonio=$fila["testimonio"];
            $this->nombre=$fila["nombre"];
            $this->apellido_paterno=$fila["apellido_paterno"];
            $this->apellido_materno=$fila["apellido_materno"];
            $this->cargo=$fila["cargo"];
            $this->foto_perfil=$fila["foto_perfil"];
            $this->imagen_you_poster=$fila["imagen_you_poster"];
            $this->video=$fila["video"];
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
        $query="update web_testimonio set 
        testimonio='$this->testimonio',
        nombre='$this->nombre',
        apellido_paterno='$this->apellido_paterno',
        apellido_materno='$this->apellido_materno',
        cargo='$this->cargo',
        observacion='$this->observacion',
        fechaactualiza=now(),
        id_usuarioactualiza='1' 
        where id_web_testimonio='$this->id_web_testimonio'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    /*foto_perfil='$this->foto_perfil',
    imagen_you_poster='$this->imagen_you_poster',
    video='$this->video',*/
    public function update_foto_perfil(){
        $query="update web_testimonio set 
        foto_perfil='$this->foto_perfil',
        fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_testimonio='$this->id_web_testimonio'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_imagen_you_poster(){
        $query="update web_testimonio set 
        imagen_you_poster='$this->imagen_you_poster',
        fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_testimonio='$this->id_web_testimonio'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_video(){
        $query="update web_testimonio set 
        video='$this->video',
        fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_testimonio='$this->id_web_testimonio'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar(){
        $query="update web_testimonio set estado='1' where id_web_testimonio='$this->id_web_testimonio'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar(){
        $query="update web_testimonio set estado='0' where id_web_testimonio='$this->id_web_testimonio'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo(){
        $query="SELECT * FROM web_testimonio WHERE estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 
}