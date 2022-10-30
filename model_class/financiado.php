<?php
include_once("cn.php");
class financiado extends cn{

    var $id_financiado;
    var $financiado;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO financiado VALUES(0,'$this->financiado','$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select finan.* from financiado finan ";

        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update financiado set financiado='$this->financiado',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_financiado='$this->id_financiado'";
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
        $query="update financiado set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 where id_financiado='$this->id_financiado'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update financiado set estado='0',fechaactualiza=now(),id_usuarioactualiza=1  where id_financiado='$this->id_financiado'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }


    /** Consultar */
    public function consult(){
        $query="select * from financiado where id_financiado='$this->id_financiado' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){
            
            $this->id_financiado=$fila["id_financiado"];
            $this->financiado=$fila["financiado"];
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
        $query="SELECT * FROM financiado where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    

}

?>