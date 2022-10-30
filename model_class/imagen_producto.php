<?php

include_once("cn.php");
class imagen_producto extends cn{
 

var $id_producto;
var $id_imagen_producto;
var $url_imagen;
var $tamanio_imagen;
var $estado;
var $fecharegistro;
var $fechaactualiza;
var $id_usuarioregistro;
var $id_usuarioactualiza;

    //  public function consult()
    //  {
    //      $query="SELECT * FROM imagen_producto WHERE id_imagen_producto='$this->id_imagen_producto'";
    //      $rs=mysqli_query($this->f_cn(),$query);
    //      if($fila=mysqli_fetch_array($rs)){
    //          $this->id_imagen_producto=$fila["id_imagen_producto"];

    //      }
    //      mysqli_close($this->f_cn());
    //      return $rs;
    //  }


    public function foto_producto()
    {
        $query="INSERT INTO imagen_producto VALUES(0,'$this->id_producto','$this->url_imagen','$this->tamanio_imagen','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    

    public function fotos_x_producto()
    {
        $query="SELECT * FROM imagen_producto WHERE estado='1' and id_producto='$this->id_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    public  function desactivar_foto()
    {
        $query="update imagen_producto set estado='0' where id_imagen_producto='$this->id_imagen_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
   



    

}

?>