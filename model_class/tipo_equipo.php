<?php
include_once("cn.php");
class tipo_equipo extends cn{
    var $id_tipo_equipo;
    var $tipo_equipo;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO tipo_equipo VALUES(0,'$this->tipo_equipo',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select * from tipo_equipo";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update tipo_equipo set tipo_equipo='$this->tipo_equipo',fechaactualiza=now(),id_usuarioactualiza=1
        where id_tipo_equipo='$this->id_tipo_equipo'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update tipo_equipo set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_tipo_equipo='$this->id_tipo_equipo'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update tipo_equipo set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_tipo_equipo='$this->id_tipo_equipo'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from tipo_equipo where id_tipo_equipo='$this->id_tipo_equipo' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_tipo_equipo=$fila["id_tipo_equipo"];
            $this->tipo_equipo=$fila["tipo_equipo"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        
        mysqli_close($this->f_cn());
    

    }
    public function combo()
    {
        $query="SELECT * FROM tipo_equipo where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>