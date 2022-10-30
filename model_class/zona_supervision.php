<?php
include_once("cn.php");
class zona_supervision extends cn{

    var $id_zona_supervision;
    var $zona_supervision;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO zona_supervision VALUES(0,'$this->zona_supervision',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select * from zona_supervision";

        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update zona_supervision set zona_supervision='$this->zona_supervision',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_zona_supervision='$this->id_zona_supervision'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update zona_supervision set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_zona_supervision='$this->id_zona_supervision'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update zona_supervision set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_zona_supervision='$this->id_zona_supervision'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from zona_supervision where id_zona_supervision='$this->id_zona_supervision' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_zona_supervision=$fila["id_zona_supervision"];
            $this->zona_supervision=$fila["zona_supervision"];
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
        $query="SELECT * FROM zona_supervision where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>