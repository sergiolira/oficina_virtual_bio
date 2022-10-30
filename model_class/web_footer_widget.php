<?php
include_once("cn.php");
class web_footer_widget extends cn{
    var $id_web_footer_widget;
    var $web_footer_widget;    
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO web_footer_widget VALUES(0,'$this->web_footer_widget',
        '$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="SELECT * FROM web_footer_widget ";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update web_footer_widget set web_footer_widget='$this->web_footer_widget',
        observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_web_footer_widget='$this->id_web_footer_widget'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update web_footer_widget set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_web_footer_widget='$this->id_web_footer_widget'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update web_footer_widget set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_web_footer_widget='$this->id_web_footer_widget'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from web_footer_widget where id_web_footer_widget='$this->id_web_footer_widget' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_web_footer_widget=$fila["id_web_footer_widget"];
            $this->web_footer_widget=$fila["web_footer_widget"];
                      
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
        $query="SELECT * FROM web_footer_widget where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    

}

?>