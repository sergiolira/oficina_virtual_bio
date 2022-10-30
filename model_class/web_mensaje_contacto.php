<?php 
require_once "cn.php";
class web_mensaje_contacto extends cn{

    var $id_web_mensaje_contacto;
    var $nombre_apellido;
    var $correo;
    var $celular;
    var $mensaje;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function create()
    {
        $query = "INSERT INTO web_mensaje_contacto VALUES(0,'$this->nombre_apellido','$this->correo','$this->celular','$this->mensaje',1,now(),now(),1,1)";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    function read()
    {
        $query = "SELECT * FROM web_mensaje_contacto";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update()
    {
        $query = "UPDATE web_mensaje_contacto 
            SET nombre_apellido = '$this->nombre_apellido',correo = '$this->correo',
            celular = '$this->celular',mensaje = '$this->mensaje',fechaactualiza=now(),id_usuarioactualiza=2 
            WHERE id_web_mensaje_contacto = '$this->id_web_mensaje_contacto'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query = "SELECT * FROM web_mensaje_contacto WHERE id_web_mensaje_contacto ='$this->id_web_mensaje_contacto'";
        $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_web_mensaje_contacto = $fila["id_web_mensaje_contacto"];
            $this->nombre_apellido = $fila["nombre_apellido"];
            $this->correo = $fila["correo"];
            $this->celular = $fila["celular"];
            $this->mensaje = $fila["mensaje"];
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
        $query = "UPDATE web_mensaje_contacto SET estado = '$valor'
         WHERE id_web_mensaje_contacto = '$this->id_web_mensaje_contacto'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function combo(){
        $query = "SELECT * FROM web_mensaje_contacto WHERE estado = 1";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
}

?>