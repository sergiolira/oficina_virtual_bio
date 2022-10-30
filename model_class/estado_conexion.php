<?php
include_once("cn.php");
class estado_conexion extends cn{

    var $id_estado_conexion;
    var $estado_conexion;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO estado_conexion VALUES(0,'$this->estado_conexion','$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select econ.* from estado_conexion econ ";

        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update estado_conexion set estado_conexion='$this->estado_conexion',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_estado_conexion='$this->id_estado_conexion'";
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
        $query="update estado_conexion set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 where id_estado_conexion='$this->id_estado_conexion'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update estado_conexion set estado='0',fechaactualiza=now(),id_usuarioactualiza=1  where id_estado_conexion='$this->id_estado_conexion'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }


    /** Consultar */
    public function consult(){
        $query="select * from estado_conexion where id_estado_conexion='$this->id_estado_conexion' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){
            
            $this->id_estado_conexion=$fila["id_estado_conexion"];
            $this->estado_conexion=$fila["estado_conexion"];
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
        $query="SELECT * FROM estado_conexion where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    

}

?>