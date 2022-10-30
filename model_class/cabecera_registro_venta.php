<?php
include_once("cn.php");
class cabecera_registro_venta extends cn{
    var $id_cabecera_registro_venta;
    var $nro_solicitud;
    var $fecha_pedido;
    var $fecha_entrega;
    var $correo;
    var $nro_documento;
    var $tipo_cliente;
    var $id_pais;
    var $id_departamento;
    var $id_provincia;
    var $id_distrito;
    var $direccion;
    var $referencia;
    var $enlace_ubigeo;
    var $id_estado_registro_venta;
    var $total_descuento;
    var $impuesto;
    var $costo_envio;
    var $total;
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;


    public  function update(){
        $query="update cabecera_registro_venta set 
        fecha_pedido='$this->fecha_pedido',
        fecha_entrega='$this->fecha_entrega',
        correo='$this->correo',
        nro_documento='$this->nro_documento',
        tipo_cliente='$this->tipo_cliente',
        id_pais='$this->id_pais',
        id_departamento='$this->id_departamento',
        id_provincia='$this->id_provincia',
        id_distrito='$this->id_distrito',
        direccion='$this->direccion',
        referencia='$this->referencia',
        enlace_ubigeo='$this->enlace_ubigeo',
        id_estado_registro_venta='$this->id_estado_registro_venta',
        total_descuento='$this->total_descuento',
        impuesto='$this->impuesto',
        costo_envio='$this->costo_envio',
        total='$this->total',
        observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_cabecera_registro_venta='$this->id_cabecera_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public function consult(){
        $query="select * from cabecera_registro_venta where id_cabecera_registro_venta='$this->id_cabecera_registro_venta' ";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){            
            $this->id_cabecera_registro_venta=$fila["id_cabecera_registro_venta"];
            $this->nro_solicitud=$fila["nro_solicitud"];
            $this->fecha_pedido=$fila["fecha_pedido"];
            $this->fecha_entrega=$fila["fecha_entrega"];
            $this->correo=$fila["correo"];
            $this->nro_documento=$fila["nro_documento"];
            $this->tipo_cliente=$fila["tipo_cliente"];
            $this->id_pais=$fila["id_pais"];
            $this->id_departamento=$fila["id_departamento"];
            $this->id_provincia=$fila["id_provincia"];
            $this->id_distrito=$fila["id_distrito"];
            $this->direccion=$fila["direccion"];
            $this->referencia=$fila["referencia"];
            $this->enlace_ubigeo=$fila["enlace_ubigeo"];
            $this->id_estado_registro_venta=$fila["id_estado_registro_venta"];
            $this->total_descuento=$fila["total_descuento"];
            $this->impuesto=$fila["impuesto"];
            $this->costo_envio=$fila["costo_envio"];
            $this->total=$fila["total"];
            $this->observacion=$fila["observacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());   
    }
    public function create(){
        $query="INSERT INTO cabecera_registro_venta VALUES(0,
        '$this->nro_solicitud',
        '$this->fecha_pedido',
        '$this->fecha_entrega',
        '$this->correo',
        '$this->nro_documento',
        '$this->tipo_cliente',
        '$this->id_pais',
        '$this->id_departamento',
        '$this->id_provincia',
        '$this->id_distrito',
        '$this->direccion',
        '$this->referencia',
        '$this->enlace_ubigeo',
        '$this->id_estado_registro_venta',
        '$this->total_descuento',
        '$this->impuesto',
        '$this->costo_envio',
        '$this->total',
        '$this->observacion',
        1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read(){
        $query="select * from cabecera_registro_venta";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar(){
        $query="update cabecera_registro_venta set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_cabecera_registro_venta='$this->id_cabecera_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function desactivar(){
      $query="update cabecera_registro_venta set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_cabecera_registro_venta='$this->id_cabecera_registro_venta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }


}
?>