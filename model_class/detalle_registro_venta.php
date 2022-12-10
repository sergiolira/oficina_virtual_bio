<?php
include_once("cn.php");
class detalle_registro_venta extends cn{
    var $id_detalle_registro_venta;
    var $nro_solicitud;
    var $id_tipo_venta;
    var $id_paquete;
    var $id_producto;
    var $cantidad;
    var $precio_unitario;
    var $id_descuento_producto;
    var $descuento_por_volumen_producto;
    var $descuento_por_nro_documento;
    var $sub_total;
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    var $des_monto;


    public function read(){
        $query="select drv.*, pro.id_producto,pro.nombre_producto,pq.id_paquete_producto_cabecera,pq.nombre_paquete,des.id_descuento_producto,des.monto,tv.id_tipo_venta,tv.tipo_venta
        from detalle_registro_venta drv  
        INNER JOIN tipo_venta tv on tv.id_tipo_venta = drv.id_tipo_venta 
        inner JOIN producto pro on pro.id_producto = drv.id_producto
        inner join paquete_producto_cabecera pq on pq.id_paquete_producto_cabecera = drv.id_paquete
        INNER JOIN descuento_producto des on des.id_descuento_producto = drv.id_descuento_producto";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar(){
        $query="update detalle_registro_venta set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_detalle_registro_venta='$this->id_detalle_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function desactivar(){
      $query="update detalle_registro_venta set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_detalle_registro_venta='$this->id_detalle_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function create(){
        $query="INSERT INTO detalle_registro_venta VALUES(0,
        '$this->nro_solicitud',
        '$this->id_tipo_venta',
        '$this->id_paquete',
        '$this->id_producto',
        '$this->cantidad',
        '$this->precio_unitario',
        '$this->id_descuento_producto',
        '$this->descuento_por_volumen_producto',
        '$this->descuento_por_nro_documento',
        '$this->sub_total',
        '$this->observacion',
        1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update(){
        $query="update detalle_registro_venta set 
        id_tipo_venta='$this->id_tipo_venta',
        id_paquete='$this->id_paquete',
        id_producto='$this->id_producto',
        cantidad='$this->cantidad',
        precio_unitario='$this->precio_unitario',
        id_descuento_producto='$this->id_descuento_producto',
        descuento_por_volumen_producto='$this->descuento_por_volumen_producto',
        descuento_por_nro_documento='$this->descuento_por_nro_documento',
        sub_total='$this->sub_total',
        observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where nro_solicitud='$this->nro_solicitud'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function consult(){
        $query="SELECT drv.*,dp.monto FROM detalle_registro_venta drv INNER JOIN
        descuento_producto dp ON drv.id_descuento_producto=dp.id_descuento_producto WHERE drv.nro_solicitud='$this->nro_solicitud' ";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){            
            $this->id_detalle_registro_venta=$fila["id_detalle_registro_venta"];
            $this->nro_solicitud=$fila["nro_solicitud"];
            $this->id_tipo_venta=$fila["id_tipo_venta"];
            $this->id_paquete=$fila["id_paquete"];
            $this->id_producto=$fila["id_producto"];
            $this->cantidad=$fila["cantidad"];
            $this->precio_unitario=$fila["precio_unitario"];
            $this->id_descuento_producto=$fila["id_descuento_producto"];
            $this->descuento_por_volumen_producto=$fila["descuento_por_volumen_producto"];
            $this->descuento_por_nro_documento=$fila["descuento_por_nro_documento"];
            $this->sub_total=$fila["sub_total"];
            $this->observacion=$fila["observacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
            $this->des_monto=$fila["monto"];
        }
        mysqli_close($this->f_cn());   
    }
}
?>