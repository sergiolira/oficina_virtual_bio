<?php

include_once("cn.php");
class paquete_detalle_producto extends cn{

var $id_paquete_detalle_producto;
var $id_paquete_cabecera_producto;
var $id_producto;
var $cantidad;
var $precio_venta_unitario;
var $observacion;
var $estado;
var $fechaactualiza;
var $fecharegistro;
var $id_usuarioregistro;
var $id_usuarioactualiza;


    public function read()
    {
        $query="SELECT pdp.*,ppc.nombre_paquete,prod.nombre_producto FROM paquete_detalle_producto pdp 
        INNER JOIN paquete_producto_cabecera ppc ON pdp.id_paquete_cabecera_producto=ppc.id_paquete_producto_cabecera 
        INNER JOIN producto prod ON pdp.id_producto=prod.id_producto";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }



    public function consult()
    {
        $query="SELECT pp.*,u.correo as userregistro,ua.correo as useractualiza FROM paquete_detalle_producto pp 
        INNER JOIN usuario u ON pp.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON pp.id_usuarioactualiza=ua.id_usuario WHERE id_paquete_detalle_producto='$this->id_paquete_detalle_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_paquete_detalle_producto=$fila["id_paquete_detalle_producto"];
            $this->id_paquete_cabecera_producto=$fila["id_paquete_cabecera_producto"];
            $this->id_producto=$fila["id_producto"];
            $this->cantidad=$fila["cantidad"];
            $this->precio_venta_unitario=$fila["precio_venta_unitario"];
            $this->observacion=$fila["observacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["userregistro"];
            $this->id_usuarioactualiza=$fila["useractualiza"];
        }
        mysqli_close($this->f_cn());
    }

    public function create()
    {
        $query="INSERT INTO paquete_detalle_producto VALUES(0,'$this->id_paquete_cabecera_producto','$this->id_producto','$this->cantidad',
        '$this->precio_venta_unitario','$this->observacion','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update paquete_detalle_producto set id_paquete_cabecera_producto='$this->id_paquete_cabecera_producto',id_producto='$this->id_producto',cantidad='$this->cantidad'
        ,precio_venta_unitario='$this->precio_venta_unitario',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where
        id_paquete_detalle_producto='$this->id_paquete_detalle_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update paquete_detalle_producto set estado='1' where id_paquete_detalle_producto='$this->id_paquete_detalle_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update paquete_detalle_producto set estado='0' where id_paquete_detalle_producto='$this->id_paquete_detalle_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM paquete_producto_cabecera where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


}