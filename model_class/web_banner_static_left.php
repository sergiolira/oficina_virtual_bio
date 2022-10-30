<?php

include_once("cn.php");
class web_banner_static_left extends cn{ 
    var $id_web_banner_static_left;
    var $titulo_h1;
    var $titulo_span;
    var $parrafo_uno;
    var $parrafo_dos;
    var $parrafo_tres;
    var $titulo_descarga;
    var $descripcion_boton_descarga;
    var $archivo_descarga;
    var $imagen_hombre;
    var $imagen_producto;
    var $imagen_circulo;
    var $imagen_fondo;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function read(){
        $query="SELECT * FROM web_banner_static_left";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create(){
        $query="INSERT INTO web_banner_static_left VALUES(
            0,
            '$this->titulo_h1',
            '$this->titulo_span',
            '$this->parrafo_uno',
            '$this->parrafo_dos',
            '$this->parrafo_tres',
            '$this->titulo_descarga',
            '$this->descripcion_boton_descarga',
            '$this->archivo_descarga',
            '$this->imagen_hombre',
            '$this->imagen_producto',
            '$this->imagen_circulo',
            '$this->imagen_fondo',
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
        $query="SELECT * FROM web_banner_static_left WHERE id_web_banner_static_left='$this->id_web_banner_static_left'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_web_banner_static_left=$fila["id_web_banner_static_left"];
            $this->titulo_h1=$fila["titulo_h1"];
            $this->titulo_span=$fila["titulo_span"];
            $this->parrafo_uno=$fila["parrafo_uno"];
            $this->parrafo_dos=$fila["parrafo_dos"];
            $this->parrafo_tres=$fila["parrafo_tres"];
            $this->titulo_descarga=$fila["titulo_descarga"];
            $this->descripcion_boton_descarga=$fila["descripcion_boton_descarga"];
            $this->archivo_descarga=$fila["archivo_descarga"];
            $this->imagen_hombre=$fila["imagen_hombre"];
            $this->imagen_producto=$fila["imagen_producto"];
            $this->imagen_circulo=$fila["imagen_circulo"];
            $this->imagen_fondo=$fila["imagen_fondo"];
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
        $query="update web_banner_static_left set 
        titulo_h1='$this->titulo_h1',
        titulo_span='$this->titulo_span',
        parrafo_uno='$this->parrafo_uno',
        parrafo_dos='$this->parrafo_dos',
        parrafo_tres='$this->parrafo_tres',
        titulo_descarga='$this->titulo_descarga',
        descripcion_boton_descarga='$this->descripcion_boton_descarga',
        observacion='$this->observacion',
        fechaactualiza=now(),
        id_usuarioactualiza='1' 
        where id_web_banner_static_left='$this->id_web_banner_static_left'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    
    /*
     archivo_descarga='$this->archivo_descarga',
        imagen_hombre='$this->imagen_hombre',
        imagen_producto='$this->imagen_producto',
        imagen_circulo='$this->imagen_circulo',
        imagen_fondo='$this->imagen_fondo',
    */
    public function update_archivo_descarga(){
        $query="update web_banner_static_left set 
        archivo_descarga='$this->archivo_descarga',
        fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_banner_static_left='$this->id_web_banner_static_left'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_imagen_hombre(){
        $query="update web_banner_static_left set 
        imagen_hombre='$this->imagen_hombre',
        fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_banner_static_left='$this->id_web_banner_static_left'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_imagen_producto(){
        $query="update web_banner_static_left set 
        imagen_producto='$this->imagen_producto',
        fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_banner_static_left='$this->id_web_banner_static_left'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    
    public function update_imagen_circulo(){
        $query="update web_banner_static_left set 
        imagen_circulo='$this->imagen_circulo',
        fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_banner_static_left='$this->id_web_banner_static_left'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_imagen_fondo(){
        $query="update web_banner_static_left set 
        imagen_fondo='$this->imagen_fondo',
        fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_banner_static_left='$this->id_web_banner_static_left'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar(){
        $query="update web_banner_static_left set estado='1' where id_web_banner_static_left='$this->id_web_banner_static_left'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar(){
        $query="update web_banner_static_left set estado='0' where id_web_banner_static_left='$this->id_web_banner_static_left'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo(){
        $query="SELECT * FROM web_banner_static_left WHERE estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    public function preview_pdf(){
        $query = "SELECT archivo_descarga from web_banner_static_left where id_web_banner_static_left='$this->id_web_banner_static_left'";
        $rs=mysqli_query($this->f_cn(),$query);
        $reg = mysqli_fetch_assoc($rs);
        mysqli_close($this->f_cn());
        return $reg;
    }
}