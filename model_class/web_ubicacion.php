<?php
require_once "cn.php";
class web_ubicacion extends cn
{
    var $id_web_ubicacion;
    var $id_pais;
    var $id_departamento;
    var $id_provincia;
    var $id_distrito;
    var $direccion;
    var $telefono_1;
    var $telefono_2;
    var $latitud;
    var $longitud;
    var $imagen;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function create()
    {

        $query = "INSERT INTO web_ubicacion VALUES(0,'$this->id_pais','$this->id_departamento','$this->id_provincia','$this->id_distrito','$this->direccion','$this->telefono_1','$this->telefono_2','$this->latitud',
        '$this->longitud','$this->imagen',0,now(),now(),1,1)";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    function read()
    {
        $query = "SELECT * FROM web_ubicacion";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update()
    {
        $query = "UPDATE web_ubicacion 
            SET id_pais = '$this->id_pais',id_departamento='$this->id_departamento',
            id_provincia='$this->id_provincia',id_distrito='$this->id_distrito',direccion='$this->direccion',telefono_1='$this->telefono_1',telefono_2='$this->telefono_2',
            latitud='$this->latitud',longitud='$this->longitud',fechaactualiza=now(),id_usuarioactualiza=2 
            WHERE id_web_ubicacion = '$this->id_web_ubicacion'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update_foto()
    {
      
         $query="update web_ubicacion set imagen='$this->imagen' where id_web_ubicacion='$this->id_web_ubicacion'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;  

    }

    public function consult()
    {
        $query = "SELECT * FROM web_ubicacion WHERE id_web_ubicacion ='$this->id_web_ubicacion'";
        $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_web_ubicacion = $fila["id_web_ubicacion"];
            $this->id_pais = $fila["id_pais"];
            $this->id_departamento = $fila["id_departamento"];
            $this->id_provincia = $fila["id_provincia"];
            $this->id_distrito = $fila["id_distrito"];
            $this->direccion = $fila["direccion"];
            $this->telefono_1=$fila["telefono_1"];
            $this->telefono_2=$fila["telefono_2"];
            $this->latitud = $fila["latitud"];
            $this->longitud = $fila["longitud"];
            $this->imagen = $fila["imagen"];
            $this->estado = $fila["estado"];
            $this->fecharegistro = $fila["fecharegistro"];
            $this->fechaactualiza = $fila["fechaactualiza"];
            $this->id_usuarioregistro = $fila["id_usuarioregistro"];
            $this->id_usuarioactualiza = $fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function estado($valor){
        $query = "UPDATE web_ubicacion SET estado = '$valor'
         WHERE id_web_ubicacion = '$this->id_web_ubicacion'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function combo(){
        $query = "SELECT * FROM web_ubicacion WHERE estado = 1";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
}
