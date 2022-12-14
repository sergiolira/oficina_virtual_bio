<?php
include_once("cn.php");
class cabecera_registro_venta extends cn{
    var $id_cabecera_registro_venta;
    var $nro_solicitud;
    var $fecha_pedido;
    var $fecha_entrega;
    var $correo;
    var $nro_documento;
    var $patrocinador;
    var $patrocinador_directo;
    var $tipo_cliente;
    var $id_pais;
    var $id_departamento;
    var $id_provincia;
    var $id_distrito;
    var $direccion;
    var $referencia;
    var $enlace_ubigeo;
    var $celular;
    var $id_estado_registro_venta;
    var $total_descuento;
    var $impuesto;
    var $costo_envio;
    var $total;
    var $observacion;
    var $estado_enviado_comision;//TODO: 1 no enviado a comision, 2 enviado a comision , 3 comisioanado
    var $estado;//TODO:1 es activo, 0 es inactivo
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
        patrocinador='$this->patrocinador',
        patrocinador_directo='$this->patrocinador_directo',
        tipo_cliente='$this->tipo_cliente',
        id_pais='$this->id_pais',
        id_departamento='$this->id_departamento',
        id_provincia='$this->id_provincia',
        id_distrito='$this->id_distrito',
        direccion='$this->direccion',
        referencia='$this->referencia',
        celular='$this->celular',
        enlace_ubigeo='$this->enlace_ubigeo',
        id_estado_registro_venta='$this->id_estado_registro_venta',
        total_descuento='$this->total_descuento',
        impuesto='$this->impuesto',
        costo_envio='$this->costo_envio',
        total='$this->total',
        observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where nro_solicitud='$this->nro_solicitud'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public function consult(){
        $query="select * from cabecera_registro_venta where nro_solicitud='$this->nro_solicitud' ";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){            
            $this->id_cabecera_registro_venta=$fila["id_cabecera_registro_venta"];
            $this->nro_solicitud=$fila["nro_solicitud"];
            $this->fecha_pedido=$fila["fecha_pedido"];
            $this->fecha_entrega=$fila["fecha_entrega"];
            $this->correo=$fila["correo"];
            $this->nro_documento=$fila["nro_documento"];
            $this->patrocinador=$fila["patrocinador"];
            $this->patrocinador_directo=$fila["patrocinador_directo"];
            $this->tipo_cliente=$fila["tipo_cliente"];
            $this->id_pais=$fila["id_pais"];
            $this->id_departamento=$fila["id_departamento"];
            $this->id_provincia=$fila["id_provincia"];
            $this->id_distrito=$fila["id_distrito"];
            $this->direccion=$fila["direccion"];
            $this->referencia=$fila["referencia"];
            $this->enlace_ubigeo=$fila["enlace_ubigeo"];
            $this->celular=$fila["celular"];
            $this->id_estado_registro_venta=$fila["id_estado_registro_venta"];
            $this->total_descuento=$fila["total_descuento"];
            $this->impuesto=$fila["impuesto"];
            $this->costo_envio=$fila["costo_envio"];
            $this->total=$fila["total"];
            $this->observacion=$fila["observacion"];
            $this->estado_enviado_comision=$fila["estado_enviado_comision"];
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
        '$this->patrocinador',
        '$this->patrocinador_directo',
        '$this->tipo_cliente',
        '$this->id_pais',
        '$this->id_departamento',
        '$this->id_provincia',
        '$this->id_distrito',
        '$this->direccion',
        '$this->referencia',
        '$this->enlace_ubigeo',
        '$this->celular',
        '$this->id_estado_registro_venta',
        '$this->total_descuento',
        '$this->impuesto',
        '$this->costo_envio',
        '$this->total',
        '$this->observacion',
        1,1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }   

    public function read(){
        $query="SELECT crv.*,CASE  WHEN crv.tipo_cliente='ASESOR' THEN r.razon_social
        ELSE concat(c.nombre,' ',c.apellidopaterno,' ',c.apellidomaterno) END as nombre_cliente,erv.estado_registro_venta      
        FROM cabecera_registro_venta crv INNER JOIN detalle_registro_venta drv ON crv.nro_solicitud=drv.nro_solicitud
        LEFT JOIN representante r ON r.nro_documento=crv.nro_documento
        LEFT JOIN candidato c ON c.nro_documento=crv.nro_documento
        INNER JOIN tipo_venta tv ON drv.id_tipo_venta=tv.id_tipo_venta
        INNER JOIN estado_registro_venta erv ON crv.id_estado_registro_venta=erv.id_estado_registro_venta where crv.estado!=0 
        ORDER BY crv.id_cabecera_registro_venta DESC";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function consult_filtro($filtro){
        $query="SELECT crv.*,CASE  WHEN crv.tipo_cliente='ASESOR' THEN r.razon_social
        ELSE concat(c.nombre,' ',c.apellidopaterno,' ',c.apellidomaterno) END as nombre_cliente,erv.estado_registro_venta,tv.tipo_venta   
        FROM cabecera_registro_venta crv INNER JOIN detalle_registro_venta drv ON crv.nro_solicitud=drv.nro_solicitud
        LEFT JOIN representante r ON r.nro_documento=crv.nro_documento
        LEFT JOIN candidato c ON c.nro_documento=crv.nro_documento
        INNER JOIN tipo_venta tv ON drv.id_tipo_venta=tv.id_tipo_venta
        INNER JOIN estado_registro_venta erv ON crv.id_estado_registro_venta=erv.id_estado_registro_venta where crv.estado!=0 $filtro 
        ORDER BY crv.id_cabecera_registro_venta DESC";
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
  
    public function no_enviar_venta_trama()
    {
        $query = "update cabecera_registro_venta set estado_enviado_comision=1,id_usuarioactualiza='$this->id_usuarioactualiza' where 
        estado_enviado_comision=2 and nro_solicitud='$this->nro_solicitud'";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    public function update_estado_enviado_trama_ventas()
    {
        $query = "update cabecera_registro_venta as rvo  inner join trama_registro_ventas_temporal tovt on 
        rvo.id_cabecera_registro_venta=tovt.id_cabecera_registro_venta set rvo.estado_enviado_comision=2,
        rvo.id_usuarioactualiza='$this->id_usuarioactualiza',rvo.fechaactualiza=now() where rvo.estado_enviado_comision='1' and tovt.estado!='0' and 
        tovt.nro_solicitud_session='$this->nro_solicitud_session'";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
     }

     public function cant_ventas_filtro($filtro){  
        $row_cnt=0;
        $query = "SELECT * FROM cabecera_registro_venta where estado=1 $filtro";
        $rs=mysqli_query($this->f_cn(),$query);  
        $row_cnt = mysqli_num_rows($rs);  
        mysqli_close($this->f_cn());
        return $row_cnt;
    }
      


}
?>