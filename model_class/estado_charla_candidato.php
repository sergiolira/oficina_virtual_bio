<?php
include_once("cn.php");
class estado_charla_candidato extends cn{
    var $id_estado_charla_candidato;
    var $estado_charla_candidato;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO estado_charla_candidato VALUES(0,'$this->estado_charla_candidato',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select * from estado_charla_candidato";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update estado_charla_candidato set estado_charla_candidato='$this->estado_charla_candidato',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_estado_charla_candidato='$this->id_estado_charla_candidato'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update estado_charla_candidato set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_estado_charla_candidato='$this->id_estado_charla_candidato'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update estado_charla_candidato set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_estado_charla_candidato='$this->id_estado_charla_candidato'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from estado_charla_candidato where id_estado_charla_candidato='$this->id_estado_charla_candidato' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_estado_charla_candidato=$fila["id_estado_charla_candidato"];
            $this->estado_charla_candidato=$fila["estado_charla_candidato"];
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
        $query="SELECT id_estado_charla_candidato,estado_charla_candidato FROM estado_charla_candidato where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function buscar_id_e($estado)
    {
        $query="SELECT id_estado_charla_candidato FROM estado_charla_candidato 
        WHERE estado_charla_candidato='$estado' and estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
}
?>