<?php 
require_once "cn.php";

class tipo_com extends cn{
    
    var $id_tipo_comision;
    var $tipocomision;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistra;
    var $id_usuarioactualiza;

    public function create(){
        $query = "INSERT INTO tipo_comision VALUES(0,'$this->tipocomision',1,now(),now(),1,1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    
    public function read(){
        
        $query = "SELECT * FROM tipo_comision";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
        
    }
    public function update(){
        $query = "UPDATE tipo_comision SET tipocomision = '$this->tipocomision', estado = '$this->estado',
        fechaactualiza=now(),id_usuarioactualiza=2 WHERE id_tipo_comision = '$this->id_tipo_comision'" ;
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function estado($valor){
        $query = "UPDATE tipo_comision SET estado = '$valor' WHERE id_tipo_comision = '$this->id_tipo_comision'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function consult(){
        $query = "SELECT * FROM tipo_comision WHERE id_tipo_comision = '$this->id_tipo_comision'";
        $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_tipo_comision = $fila['id_tipo_comision'];
            $this->tipocomision = $fila['tipocomision'];
            $this->estado = $fila['estado'];
            $this->fecharegistro = $fila['fecharegistro'];
            $this->fechaactualiza = $fila['fechaactualiza'];
            $this->id_usuarioregistra = $fila['id_usuarioregistra'];    
            $this->id_usuarioactualiza = $fila['id_usuarioactualiza'];    
        }
    }
    public function combo(){
        $query="SELECT * FROM tipo_comision WHERE estado = 1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
}

?>