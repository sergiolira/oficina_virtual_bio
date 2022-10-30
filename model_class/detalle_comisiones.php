<?php 
include_once "cn.php";
class det_comisiones extends cn{
    var $id_detalle;
    var $id_cabecera;
    var $id_producto;
    var $cantidad;
    var $comision;
    var $comision_subtotal;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;
    function read(){
        $query = "SELECT * FROM detalle_comisiones_venta";
        $rs = mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;

    }
    public function create(){
        $query = "INSERT INTO detalle_comisiones_venta VALUES(0,'$this->id_cabecera','$this->id_producto','$this->cantidad',
        '$this->comision','$this->comision_subtotal',1,now(),now(),1,1)";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function consult()
    {
        $query = "SELECT * FROM detalle_comisiones_venta WHERE id_detalle_comisiones_venta ='$this->id_detalle'";
       $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_detalle=$fila["id_detalle_comisiones_venta"];
            $this->id_cabecera = $fila["id_cabacera_comisiones_venta"];
            $this->id_producto = $fila["id_producto"];
            $this->cantidad = $fila["cantidad"];
            $this->comision=$fila["comision"];
            $this->comision_subtotal = $fila["comision_subtotal"];
            $this->estado= $fila["estado"];
            $this->fechaactualiza = $fila["fechaactualiza"];
            $this->fecharegistro = $fila["fecharegistro"];
            $this->id_usuarioregistro = $fila["id_usuarioregistro"];
            $this->id_usuarioactualiza = $fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    } 
    public function update(){
        $query = "UPDATE detalle_comisiones_venta 
            SET id_cabacera_comisiones_venta = '$this->id_cabecera',id_producto='$this->id_producto',
            cantidad='$this->cantidad',comision='$this->comision',comision_subtotal='$this->comision_subtotal',
            fechaactualiza=now() WHERE id_detalle_comisiones_venta = '$this->id_detalle'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function activar(){
        $query = "UPDATE detalle_comisiones_venta SET estado = 0
         WHERE id_detalle_comisiones_venta = '$this->id_detalle'";
         $rs = mysqli_query($this->f_cn(),$query);
         mysqli_close($this->f_cn());
         return $rs;
    }
    public function desactivar(){
        $query = "UPDATE detalle_comisiones_venta set estado = 1
         WHERE id_detalle_comisiones_venta = '$this->id_detalle'";
         $rs = mysqli_query($this->f_cn(),$query);
         mysqli_close($this->f_cn());
         return $rs;
    }
    public function combo(){
        
    }

}
?>