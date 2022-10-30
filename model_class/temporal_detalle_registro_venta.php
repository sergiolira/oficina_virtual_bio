<?php
include_once("cn.php");
class temporal_detalle_registro_venta extends cn{
    var $id_temporal_detalle_registro_venta;
    var $nro_solicitud;
    var $id_tipo_venta;
    var $id_paquete;
    var $id_producto;
    var $cantidad;
    var $precio_unitario;
    var $id_descuento_producto;
    var $sub_total;
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;


    public function read(){
        $query="select tdrv.*, pro.id_producto,pro.nombre_producto,pq.id_paquete_producto_cabecera,pq.nombre_paquete,des.id_descuento_producto,des.monto,tv.id_tipo_venta,tv.tipo_venta 
        from temporal_detalle_registro_venta tdrv 
        INNER JOIN tipo_venta tv on tv.id_tipo_venta = tdrv.id_tipo_venta 
        inner JOIN producto pro on pro.id_producto = tdrv.id_producto 
        inner join paquete_producto_cabecera pq on pq.id_paquete_producto_cabecera = tdrv.id_paquete 
        INNER JOIN descuento_producto des on des.id_descuento_producto = tdrv.id_descuento_producto";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar(){
        $query="update temporal_detalle_registro_venta set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_temporal_detalle_registro_venta ='$this->id_temporal_detalle_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function desactivar(){
      $query="update temporal_detalle_registro_venta set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_temporal_detalle_registro_venta ='$this->id_temporal_detalle_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function create(){
        $query="INSERT INTO temporal_detalle_registro_venta VALUES(0,
        '$this->nro_solicitud',
        '$this->id_tipo_venta',
        '$this->id_paquete',
        '$this->id_producto',
        '$this->cantidad',
        '$this->precio_unitario',
        '$this->id_descuento_producto',
        '$this->sub_total',
        '$this->observacion',
        1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update(){
        $query="update temporal_detalle_registro_venta set 
        id_tipo_venta='$this->id_tipo_venta',
        id_paquete='$this->id_paquete',
        id_producto='$this->id_producto',
        cantidad='$this->cantidad',
        precio_unitario='$this->precio_unitario',
        id_descuento_producto='$this->id_descuento_producto',
        sub_total='$this->sub_total',
        observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_temporal_detalle_registro_venta ='$this->id_temporal_detalle_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function consult(){
        $query="select * from temporal_detalle_registro_venta where id_temporal_detalle_registro_venta ='$this->id_temporal_detalle_registro_venta' ";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){            
            $this->id_temporal_detalle_registro_venta=$fila["id_temporal_detalle_registro_venta"];
            $this->nro_solicitud=$fila["nro_solicitud"];
            $this->id_tipo_venta=$fila["id_tipo_venta"];
            $this->id_paquete=$fila["id_paquete"];
            $this->id_producto=$fila["id_producto"];
            $this->cantidad=$fila["cantidad"];
            $this->precio_unitario=$fila["precio_unitario"];
            $this->id_descuento_producto=$fila["id_descuento_producto"];
            $this->sub_total=$fila["sub_total"];
            $this->observacion=$fila["observacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());   
    }
}
?>