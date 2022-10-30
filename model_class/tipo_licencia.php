<?php
include_once("cn.php");
class tipo_licencia extends cn{
    var $id_tipo_licencia;
    var $tipo_licencia;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO tipo_licencia VALUES(0,'$this->tipo_licencia',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select * from tipo_licencia";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update tipo_licencia set tipo_licencia='$this->tipo_licencia',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_tipo_licencia='$this->id_tipo_licencia'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update tipo_licencia set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_tipo_licencia='$this->id_tipo_licencia'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update tipo_licencia set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_tipo_licencia='$this->id_tipo_licencia'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from tipo_licencia where id_tipo_licencia='$this->id_tipo_licencia' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_tipo_licencia=$fila["id_tipo_licencia"];
            $this->tipo_licencia=$fila["tipo_licencia"];
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
        $query="SELECT * FROM tipo_licencia where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    
}

?>