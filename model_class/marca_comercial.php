<?php
include_once("cn.php");
class marca_comercial extends cn{

    var $id_marca_comercial;
    var $marca_comercial;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO marca_comercial VALUES(0,'$this->marca_comercial','$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select mco.* from marca_comercial mco ";

        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update marca_comercial set marca_comercial='$this->marca_comercial',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_marca_comercial='$this->id_marca_comercial'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

   /* public function delete(){
        $query="delete from alumno  where  id_alumno='$this->id_alumno'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    } */

    public  function activar()
    {
        $query="update marca_comercial set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 where id_marca_comercial='$this->id_marca_comercial'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update marca_comercial set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 where id_marca_comercial='$this->id_marca_comercial'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }


    /** Consultar */
    public function consult(){
        $query="select * from marca_comercial where id_marca_comercial='$this->id_marca_comercial' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){
            
            $this->id_marca_comercial=$fila["id_marca_comercial"];
            $this->marca_comercial=$fila["marca_comercial"];
            $this->observacion=$fila["observacion"];
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
        $query="SELECT * FROM marca_comercial where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>