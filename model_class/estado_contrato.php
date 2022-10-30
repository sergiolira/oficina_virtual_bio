<?php
include_once("cn.php");
class estado_contrato extends cn{
    var $id_estado_contrato;
    var $estado_contrato;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO estado_contrato VALUES(0,'$this->estado_contrato',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select * from estado_contrato";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update estado_contrato set estado_contrato='$this->estado_contrato',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_estado_contrato='$this->id_estado_contrato'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update estado_contrato set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_estado_contrato='$this->id_estado_contrato'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update estado_contrato set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_estado_contrato='$this->id_estado_contrato'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from estado_contrato where id_estado_contrato='$this->id_estado_contrato' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_estado_contrato=$fila["id_estado_contrato"];
            $this->estado_contrato=$fila["estado_contrato"];
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
        $query="SELECT * FROM estado_contrato where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

   

}

?>