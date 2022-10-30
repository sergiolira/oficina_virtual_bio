<?php
include_once("cn.php");
class web_footer_four_bottom_right extends cn{
    var $id_web_footer_four_bottom_right;
    var $web_footer_four_bottom_right;    
    var $enlace;
    var $imagen;
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO web_footer_four_bottom_right VALUES(0,'$this->web_footer_four_bottom_right','$this->enlace','$this->imagen',
        '$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="SELECT * FROM web_footer_four_bottom_right ";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update web_footer_four_bottom_right set web_footer_four_bottom_right='$this->web_footer_four_bottom_right',
        enlace='$this->enlace',imagen='$this->imagen',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_web_footer_four_bottom_right='$this->id_web_footer_four_bottom_right'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update web_footer_four_bottom_right set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_web_footer_four_bottom_right='$this->id_web_footer_four_bottom_right'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update web_footer_four_bottom_right set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_web_footer_four_bottom_right='$this->id_web_footer_four_bottom_right'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from web_footer_four_bottom_right where id_web_footer_four_bottom_right='$this->id_web_footer_four_bottom_right' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_web_footer_four_bottom_right=$fila["id_web_footer_four_bottom_right"];
            $this->web_footer_four_bottom_right=$fila["web_footer_four_bottom_right"];
            $this->enlace=$fila["enlace"];
            $this->imagen=$fila["imagen"];            
            $this->observacion=$fila["observacion"];           
            $this->estado=$fila["estado"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->fechaactualiza=$fila["fechaactualiza"];            
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        
        mysqli_close($this->f_cn());
    

    }
    public function combo()
    {
        $query="SELECT * FROM web_footer_four_bottom_right where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>