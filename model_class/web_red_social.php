<?php
include_once("cn.php");
class web_red_social extends cn{
    var $id_web_red_social;
    var $web_red_social;    
    var $icono;
    var $enlace;
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO web_red_social VALUES(0,'$this->web_red_social','$this->icono','$this->enlace',
        '$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="SELECT * FROM web_red_social ";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update web_red_social set web_red_social='$this->web_red_social',
        icono='$this->icono',enlace='$this->enlace',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_web_red_social='$this->id_web_red_social'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update web_red_social set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_web_red_social='$this->id_web_red_social'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update web_red_social set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_web_red_social='$this->id_web_red_social'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from web_red_social where id_web_red_social='$this->id_web_red_social' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_web_red_social=$fila["id_web_red_social"];
            $this->web_red_social=$fila["web_red_social"];
            $this->icono=$fila["icono"];
            $this->enlace=$fila["enlace"];            
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
        $query="SELECT * FROM web_red_social where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>