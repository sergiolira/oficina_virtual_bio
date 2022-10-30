<?php
include_once("cn.php");
class estado_programacion_charla extends cn{
    var $id_estado_programacion_charla;
    var $estado_programacion_charla;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO estado_programacion_charla VALUES(0,'$this->estado_programacion_charla',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select * from estado_programacion_charla";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update estado_programacion_charla set estado_programacion_charla='$this->estado_programacion_charla',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_estado_programacion_charla='$this->id_estado_programacion_charla'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update estado_programacion_charla set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_estado_programacion_charla='$this->id_estado_programacion_charla'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update estado_programacion_charla set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_estado_programacion_charla='$this->id_estado_programacion_charla'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from estado_programacion_charla where id_estado_programacion_charla='$this->id_estado_programacion_charla' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_estado_programacion_charla=$fila["id_estado_programacion_charla"];
            $this->estado_programacion_charla=$fila["estado_programacion_charla"];
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
        $query="SELECT id_estado_programacion_charla,estado_programacion_charla FROM estado_programacion_charla 
        where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
}
?>