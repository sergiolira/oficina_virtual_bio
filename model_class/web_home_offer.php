<?php
include_once("cn.php");
//primero
class web_home_offer extends cn{ 
    var $id_web_home_offer;
    var $titulo_h2;
    var $parrafo;
    var $desc_boton;
    var $imagen_producto;
    var $imagen_mujer;
    var $span_producto;
    var $enlace;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function read(){
        $query="SELECT * FROM web_home_offer";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create(){
        $query="INSERT INTO web_home_offer VALUES(
            0,
            '$this->titulo_h2',
            '$this->parrafo',
            '$this->desc_boton',
            '$this->imagen_producto',
            '$this->imagen_mujer',
            '$this->span_producto',
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
        $query="SELECT * FROM web_home_offer WHERE id_web_home_offer='$this->id_web_home_offer'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_web_home_offer=$fila["id_web_home_offer"];
            $this->titulo_h2=$fila["titulo_h2"];
            $this->parrafo=$fila["parrafo"];
            $this->desc_boton=$fila["desc_boton"];
            $this->imagen_producto=$fila["imagen_producto"];
            $this->imagen_mujer=$fila["imagen_mujer"];
            $this->span_producto=$fila["span_producto"];
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
        $query="update web_home_offer set titulo_h2='$this->titulo_h2',parrafo='$this->parrafo',desc_boton='$this->desc_boton', span_producto='$this->span_producto',  
        enlace='$this->enlace',  observacion='$this->observacion',  fechaactualiza=now(),  id_usuarioactualiza='1' where id_web_home_offer='$this->id_web_home_offer'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    
    public function update_imagen_producto(){
            $query="update web_home_offer set 
            imagen_producto='$this->imagen_producto', fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_home_offer='$this->id_web_home_offer'";
            $rs=mysqli_query($this->f_cn(),$query);
            mysqli_close($this->f_cn());
            return $rs;
    }
    public function update_imagen_mujer(){
        $query="update web_home_offer set 
        imagen_mujer='$this->imagen_mujer', fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_home_offer='$this->id_web_home_offer'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar(){
        $query="update web_home_offer set estado='1' where id_web_home_offer='$this->id_web_home_offer'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar(){
        $query="update web_home_offer set estado='0' where id_web_home_offer='$this->id_web_home_offer'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo(){
        $query="SELECT * FROM web_home_offer WHERE estado='1'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 
}