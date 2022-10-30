<?php 
include_once "cn.php";
class trama_com extends cn{
    var $id_trama;
    var $id_producto;
    var $cantidad;
    var $tipo_comision;
    var $comision; 
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistra;
    var $id_usuarioactualiza;
    public function create(){
        $query = "INSERT INTO trama_comsiones_x_venta VALUES(0,'$this->id_producto',
        '$this->cantidad','$this->tipo_comision','$this->comision',1,now(),now(),1,1)";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function read(){
        $query = "SELECT * FROM trama_comsiones_x_venta";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function update(){
        $query = "UPDATE trama_comsiones_x_venta SET id_producto='$this->id_producto',
        cantidad='$this->cantidad',tipo_comision = '$this->tipo_comision',comision = '$this->comision',
        fechaactualiza=now()
         WHERE id_trama_comisiones_x_venta = '$this->id_trama'";
         $rs = mysqli_query($this->f_cn(), $query);
         mysqli_close($this->f_cn());
         return $rs;
    }
    public function consult(){
        $query = "SELECT * FROM trama_comsiones_x_venta WHERE id_trama_comisiones_x_venta = '$this->id_trama'";
        $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_trama = $fila['id_trama_comisiones_x_venta'];
            $this->id_producto = $fila['id_producto'];
            $this->cantidad = $fila['cantidad'];
            $this->tipo_comision = $fila['tipo_comision'];
            $this->comision = $fila['comision'];
            $this->estado = $fila['estado'];
            $this->fecharegistro = $fila['fecharegistro'];    
            $this->fechaactualiza = $fila['fechaactualiza'];
        }
    }
    public function activar(){
        $query = "UPDATE trama_comsiones_x_venta SET estado=1 WHERE id_trama_comisiones_x_venta = '$this->id_trama'";
        $rs = mysqli_query($this->f_cn(), $query);
         mysqli_close($this->f_cn());
         return $rs;
    }
    public function desactivar(){
        $query = "UPDATE trama_comsiones_x_venta SET estado = 0 WHERE id_trama_comisiones_x_venta = '$this->id_trama'";
        $rs = mysqli_query($this->f_cn(), $query);
         mysqli_close($this->f_cn());
         return $rs;
    }
} 

?>