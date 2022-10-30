<?php 
require_once "cn.php";
class web_quienes_somos extends cn{
    var $id_web_quienes_somos;
    var $titulo;
    // var $imagen_principal;
    // var $imagen;
    var $subtitulo;
    var $parrafo;
    var $icono;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function create()
    {
        $query = "INSERT INTO web_quienes_somos VALUES(0,'$this->titulo','$this->subtitulo','$this->parrafo'
        ,'$this->icono',0,now(),now(),1,1)";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    function read()
    {
        $query = "SELECT * FROM web_quienes_somos";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update()
    {
        $query = "UPDATE web_quienes_somos 
            SET titulo = '$this->titulo',subtitulo='$this->subtitulo',parrafo='$this->parrafo',
            icono='$this->icono',fechaactualiza=now(),id_usuarioactualiza=2 
            WHERE id_web_quienes_somos = '$this->id_web_quienes_somos'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query = "SELECT * FROM web_quienes_somos WHERE id_web_quienes_somos ='$this->id_web_quienes_somos'";
        $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_web_quienes_somos = $fila["id_web_quienes_somos"];
            $this->titulo = $fila["titulo"];
            // $this->imagen_principal = $fila["imagen_principal"];
            // $this->imagen = $fila["imagen"];
            $this->subtitulo = $fila["subtitulo"];
            $this->parrafo = $fila["parrafo"];
            $this->icono = $fila["icono"];
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
        $query = "UPDATE web_quienes_somos SET estado = '$valor'
         WHERE id_web_quienes_somos = '$this->id_web_quienes_somos'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function combo(){
        $query = "SELECT * FROM web_quienes_somos WHERE estado = 1";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
}

?>