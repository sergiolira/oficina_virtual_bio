<?php
include_once("cn.php");
class medio_pago extends cn{

    var $id_medio_pago;
    var $medio_pago;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO medio_pago VALUES(0,'$this->medio_pago','$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select mpago.* from medio_pago mpago ";

        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update medio_pago set medio_pago='$this->medio_pago',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_medio_pago='$this->id_medio_pago'";
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
        $query="update medio_pago set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 where id_medio_pago='$this->id_medio_pago'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update medio_pago set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 where id_medio_pago='$this->id_medio_pago'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }


    /** Consultar */
    public function consult(){
        $query="select * from medio_pago where id_medio_pago='$this->id_medio_pago' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){
            
            $this->id_medio_pago=$fila["id_medio_pago"];
            $this->medio_pago=$fila["medio_pago"];
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
        $query="SELECT * FROM medio_pago where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>