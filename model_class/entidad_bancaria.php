<?php
include_once("cn.php");
class entidad_bancaria extends cn{

    var $id_entidad_bancaria;
    var $entidad_bancaria;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO entidad_bancaria VALUES(0,'$this->entidad_bancaria',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select * from entidad_bancaria";

        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update entidad_bancaria set entidad_bancaria='$this->entidad_bancaria',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_entidad_bancaria='$this->id_entidad_bancaria'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update entidad_bancaria set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_entidad_bancaria='$this->id_entidad_bancaria'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update entidad_bancaria set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_entidad_bancaria='$this->id_entidad_bancaria'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from entidad_bancaria where id_entidad_bancaria='$this->id_entidad_bancaria' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_entidad_bancaria=$fila["id_entidad_bancaria"];
            $this->entidad_bancaria=$fila["entidad_bancaria"];
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
        $query="SELECT * FROM entidad_bancaria where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>