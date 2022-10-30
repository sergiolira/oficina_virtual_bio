<?php
include_once("cn.php");
class marca_equipo extends cn{

    var $id_marca_equipo;
    var $marca_equipo;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO marca_equipo VALUES(0,'$this->marca_equipo',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select * from marca_equipo";

        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update marca_equipo set marca_equipo='$this->marca_equipo',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_marca_equipo='$this->id_marca_equipo'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update marca_equipo set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 where id_marca_equipo='$this->id_marca_equipo'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update marca_equipo set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 where id_marca_equipo='$this->id_marca_equipo'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from marca_equipo where id_marca_equipo='$this->id_marca_equipo' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_marca_equipo=$fila["id_marca_equipo"];
            $this->marca_equipo=$fila["marca_equipo"];
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
        $query="SELECT * FROM marca_equipo where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>