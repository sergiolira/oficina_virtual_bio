<?php

include_once("cn.php");
class web_call_action_gray extends cn{ 
    var $id_web_call_action_gray;
    var $titulo_h2;
    var $parrafo;
    var $desc_boton;
    var $enlace;
    var $imagen;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function read(){
        $query="SELECT * FROM web_call_action_gray";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create(){
        $query="INSERT INTO web_call_action_gray VALUES(
            0,
            '$this->titulo_h2',
            '$this->parrafo',
            '$this->desc_boton',
            '$this->enlace',
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
        $query="SELECT * FROM web_call_action_gray WHERE id_web_call_action_gray='$this->id_web_call_action_gray'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_web_call_action_gray=$fila["id_web_call_action_gray"];
            $this->titulo_h2=$fila["titulo_h2"];
            $this->parrafo=$fila["parrafo"];
            $this->desc_boton=$fila["desc_boton"];
            $this->enlace=$fila["enlace"];
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
    //id_web_call_action_gray
    public  function update(){
        $query="update web_call_action_gray set  titulo_h2='$this->titulo_h2', parrafo='$this->parrafo',desc_boton='$this->desc_boton', enlace='$this->enlace',
        observacion='$this->observacion', fechaactualiza=now(), id_usuarioactualiza='1' 
        where id_web_call_action_gray='$this->id_web_call_action_gray'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_imagen(){
        $query="update web_call_action_gray set 
        imagen='$this->imagen' , fechaactualiza=now(),  id_usuarioactualiza='1'  where id_web_call_action_gray='$this->id_web_call_action_gray'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar(){
        $query="update web_call_action_gray set estado='1' where id_web_call_action_gray='$this->id_web_call_action_gray'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar(){
        $query="update web_call_action_gray set estado='0' where id_web_call_action_gray='$this->id_web_call_action_gray'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo(){
        $query="SELECT * FROM web_call_action_gray WHERE estado='1' ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 
}