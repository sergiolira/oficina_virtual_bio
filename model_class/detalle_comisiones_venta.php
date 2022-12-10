<?php 
include_once "cn.php";
class detalle_comisiones_venta extends cn{

    var $id_detalle_comisiones_venta;
    var $id_cabacera_comisiones_venta;
    var $nro_documento;
    var $patrocinador;
    var $patrocinador_directo;
    var $nivel;
    var $id_tipo_venta;
    var $id_paquete;    
    var $id_producto;
    var $precio_unitario;
    var $cantidad;
    var $sub_total;
    var $comision;
    var $comision_subtotal;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function read(){
        $query = "SELECT * FROM detalle_comisiones_venta";
        $rs = mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function create(){
        $query = "INSERT INTO detalle_comisiones_venta VALUES(0,'$this->id_cabacera_comisiones_venta','$this->nro_documento','$this->patrocinador',
        '$this->patrocinador_directo','$this->nivel','$this->id_tipo_venta','$this->id_paquete','$this->id_producto','$this->precio_unitario',
        '$this->cantidad','$this->sub_total','$this->comision','$this->comision_subtotal','1',now(),now(),1,1)";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function consult()
    {
        $query = "SELECT * FROM detalle_comisiones_venta WHERE id_detalle_comisiones_venta ='$this->id_detalle_comisiones_venta'";
       $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_detalle_comisiones_venta=$fila["id_detalle_comisiones_venta"];
            $this->id_cabacera_comisiones_venta=$fila["id_cabacera_comisiones_venta"];
            $this->nro_documento=$fila["nro_documento"];
            $this->patrocinador=$fila["patrocinador"];
            $this->patrocinador_directo=$fila["patrocinador_directo"];
            $this->nivel=$fila["nivel"];
            $this->id_tipo_venta=$fila["id_tipo_venta"];
            $this->id_paquete=$fila["id_paquete"];
            $this->id_producto= $fila["id_producto"];
            $this->precio_unitario= $fila["precio_unitario"];
            $this->cantidad= $fila["cantidad"];
            $this->sub_total= $fila["sub_total"];
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
        $query = "UPDATE detalle_comisiones_venta SET 
        id_cabacera_comisiones_venta = '$this->id_cabacera_comisiones_venta',
        nro_documento='$this->nro_documento',
        patrocinador='$this->patrocinador',
        patrocinador_directo='$this->patrocinador_directo',
        nivel='$this->nivel',
        id_tipo_venta='$this->id_tipo_venta',
        id_paquete='$this->id_paquete',
        id_producto='$this->id_producto',
        precio_unitario='$this->precio_unitario',
        cantidad='$this->cantidad',
        sub_total='$this->sub_total',
        comision='$this->comision',
        comision_subtotal='$this->comision_subtotal',
        fechaactualiza=now() WHERE id_detalle_comisiones_venta = '$this->id_detalle_comisiones_venta'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function activar(){
        $query = "UPDATE detalle_comisiones_venta SET estado = 0
         WHERE id_detalle_comisiones_venta = '$this->id_detalle_comisiones_venta'";
         $rs = mysqli_query($this->f_cn(),$query);
         mysqli_close($this->f_cn());
         return $rs;
    }
    public function desactivar(){
        $query = "UPDATE detalle_comisiones_venta set estado = 1
         WHERE id_detalle_comisiones_venta = '$this->id_detalle_comisiones_venta'";
         $rs = mysqli_query($this->f_cn(),$query);
         mysqli_close($this->f_cn());
         return $rs;
    }
    public function validate_nro_detalle(){
        $query = "SELECT COUNT(*) AS contar FROM detalle_comisiones_venta WHERE id_cabacera_comisiones_venta='$this->id_cabacera_comisiones_venta'";
        $rs=mysqli_query($this->f_cn(),$query);
         if($fila=mysqli_fetch_array($rs)){
             $count=$fila["contar"];
          }
          mysqli_close($this->f_cn());
          return $count;
    }

    public function consult_x_id_cabacera_comisiones_venta(){
        $query = "SELECT dc.*,tv.tipo_venta,r.razon_social FROM detalle_comisiones_venta dc 
        INNER JOIN representante r ON dc.nro_documento=r.nro_documento 
        INNER JOIN tipo_venta tv ON dc.id_tipo_venta=tv.id_tipo_venta
        WHERE dc.id_cabacera_comisiones_venta='$this->id_cabacera_comisiones_venta'";
        $rs = mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    

}
?>