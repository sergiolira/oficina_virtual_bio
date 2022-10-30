<?php
include_once("cn.php");
class modalidad_pago extends cn{

    var $id_modalidad_pago;
    var $modalidad_pago;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;


	public function read()
    {
        $query="SELECT * FROM modalidad_pago ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT * FROM modalidad_pago WHERE id_modalidad_pago='$this->id_modalidad_pago'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_modalidad_pago=$fila["id_modalidad_pago"];
            $this->modalidad_pago=$fila["modalidad_pago"];
            $this->observacion=$fila["observacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO modalidad_pago VALUES(0,'$this->modalidad_pago','$this->observacion','1'
        ,now(), now(),1,1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update modalidad_pago set modalidad_pago='$this->modalidad_pago',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=2 where
        id_modalidad_pago='$this->id_modalidad_pago'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar()
    {
        $query="update modalidad_pago set estado='1' where id_modalidad_pago='$this->id_modalidad_pago'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update modalidad_pago set estado='0' where id_modalidad_pago='$this->id_modalidad_pago'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }



}

?>
