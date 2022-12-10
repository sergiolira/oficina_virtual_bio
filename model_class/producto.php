<?php
include_once("cn.php");
class producto extends cn{
 

var $id_producto;
var $nombre_producto;
var $descripcion_producto;
var $stock_inicial;
var $stock_actual;
var $precio_venta_nuevo;
var $precio_venta_anterior;
var $precio_compra;
var $descuento;
var $ganancia;
var $peso;
var $codigo_barra;
var $codigo_qr;
var $puntos_x_venta;
var $comision_x_venta;
var $id_tipo_producto;
var $id_categoria_producto;
var $id_sub_categoria_producto;
var $id_marca_producto;
var $id_unidad_medida;
var $id_divisa;
var $observacion;
var $estado;
var $fecharegistro;
var $fechaactualiza;
var $id_usuarioregistro;
var $id_usuarioactualiza;
// var $userLogin;


    public function read()
    {
        $query="SELECT p.*,ium.unidad_medida,d.expresion FROM producto p
        INNER JOIN unidad_medida ium ON p.id_unidad_medida=ium.id_unidad_medida 
        INNER JOIN divisa d ON p.id_divisa=d.id_divisa ORDER BY p.id_producto DESC";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public function consult()
    {
        $query="SELECT p.*,u.correo as userregistro,ua.correo as useractualiza,d.expresion FROM producto p 
        INNER JOIN usuario u ON p.id_usuarioregistro=u.id_usuario
        INNER JOIN divisa d ON p.id_divisa=d.id_divisa
        INNER JOIN usuario ua ON p.id_usuarioactualiza=ua.id_usuario WHERE id_producto='$this->id_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_producto=$fila["id_producto"];
            $this->nombre_producto=$fila["nombre_producto"];
            $this->descripcion_producto=$fila["descripcion_producto"];
            $this->stock_inicial=$fila["stock_inicial"];
            $this->stock_actual=$fila["stock_actual"];
            $this->precio_venta_nuevo=$fila["precio_venta_nuevo"];
            $this->precio_venta_anterior=$fila["precio_venta_anterior"];
            $this->precio_compra=$fila["precio_compra"];
            $this->descuento=$fila["descuento"];
            $this->ganancia=$fila["ganancia"];
            $this->peso=$fila["peso"];
            $this->codigo_barra=$fila["codigo_barra"];
            $this->codigo_qr=$fila["codigo_qr"];
            $this->puntos_x_venta=$fila["puntos_x_venta"];
            $this->comision_x_venta=$fila["comision_x_venta"];
            $this->id_tipo_producto=$fila["id_tipo_producto"];
            $this->id_categoria_producto=$fila["id_categoria_producto"];
            $this->id_sub_categoria_producto=$fila["id_sub_categoria_producto"];
            $this->id_marca_producto=$fila["id_marca_producto"];
            $this->id_unidad_medida=$fila["id_unidad_medida"];
            $this->id_divisa=$fila["id_divisa"];
            $this->expresion=$fila["expresion"];/* Expresion monetario de tabla divisa */
            $this->observacion=$fila["observacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["userregistro"];
            $this->id_usuarioactualiza=$fila["useractualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update producto set nombre_producto='$this->nombre_producto',descripcion_producto='$this->descripcion_producto',stock_actual='$this->stock_actual',
        precio_venta_nuevo='$this->precio_venta_nuevo',precio_venta_anterior='$this->precio_venta_anterior',precio_compra='$this->precio_compra',descuento='$this->descuento',peso='$this->peso',
        codigo_barra='$this->codigo_barra',codigo_qr='$this->codigo_qr',puntos_x_venta='$this->puntos_x_venta',comision_x_venta='$this->comision_x_venta',id_tipo_producto='$this->id_tipo_producto',id_categoria_producto='$this->id_categoria_producto',
        id_sub_categoria_producto='$this->id_sub_categoria_producto',id_marca_producto='$this->id_marca_producto',id_unidad_medida='$this->id_unidad_medida',id_divisa='$this->id_divisa',
        fechaactualiza=now(),id_usuarioactualiza='$this->id_usuarioactualiza' where
        id_producto='$this->id_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO producto VALUES(0,'$this->nombre_producto','$this->descripcion_producto','$this->stock_inicial','$this->stock_actual','$this->precio_venta_nuevo'
        ,'$this->precio_venta_anterior','$this->precio_compra','$this->descuento','$this->ganancia','$this->peso','$this->codigo_barra','$this->codigo_qr'
        ,'$this->puntos_x_venta','$this->comision_x_venta','$this->id_tipo_producto','$this->id_categoria_producto','$this->id_sub_categoria_producto','$this->id_marca_producto'
        ,'$this->id_unidad_medida','$this->id_divisa','$this->observacion','1'
        ,now(), now(),'$this->id_usuarioregistro','$this->id_usuarioactualiza')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function activar()
    {
        $query="update producto set estado='1' where id_producto='$this->id_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update producto set estado='0' where id_producto='$this->id_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="select * from producto where estado='1'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update_stock()
    {
        $query="update producto set stock_inicial=stock_inicial+'$this->stock_inicial'
        ,stock_actual=stock_actual+'$this->stock_actual' where id_producto='$this->id_producto'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    
   


}

?>