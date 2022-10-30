<?php

include_once("cn.php");
class paquete_producto_cabecera extends cn{

var $id_paquete_producto_cabecera;
var $nombre_paquete;
var $precio_venta;
var $cantidad_productos;
var $descripcion;
var $observacion;
var $estado;
var $fechaactualiza;
var $fecharegistro;
var $id_usuarioregistro;
var $id_usuarioactualiza;


    public function read()
    {
        $query="SELECT * FROM paquete_producto_cabecera ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }



    public function consult()
    {
        $query="SELECT pp.*,u.correo as userregistro,ua.correo as useractualiza FROM paquete_producto_cabecera pp 
        INNER JOIN usuario u ON pp.id_usuarioregistro=u.id_usuario
        INNER JOIN usuario ua ON pp.id_usuarioactualiza=ua.id_usuario WHERE id_paquete_producto_cabecera='$this->id_paquete_producto_cabecera'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_paquete_producto_cabecera=$fila["id_paquete_producto_cabecera"];
            $this->nombre_paquete=$fila["nombre_paquete"];
            $this->precio_venta=$fila["precio_venta"];
            $this->cantidad_productos=$fila["cantidad_productos"];
            $this->descripcion=$fila["descripcion"];
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
        $query="INSERT INTO paquete_producto_cabecera VALUES(0,'$this->nombre_paquete','$this->precio_venta','$this->cantidad_productos',
        '$this->descripcion','$this->observacion','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update paquete_producto_cabecera set nombre_paquete='$this->nombre_paquete',precio_venta='$this->precio_venta',cantidad_productos='$this->cantidad_productos'
        ,descripcion='$this->descripcion',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where
        id_paquete_producto_cabecera='$this->id_paquete_producto_cabecera'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update paquete_producto_cabecera set estado='1' where id_paquete_producto_cabecera='$this->id_paquete_producto_cabecera'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update paquete_producto_cabecera set estado='0' where id_paquete_producto_cabecera='$this->id_paquete_producto_cabecera'";
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