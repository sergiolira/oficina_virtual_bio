<?php
include_once("cn.php");
class trama_registro_ventas extends cn{
    var $id_trama_registro_ventas;
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
    var $fecha;
    var $anio_detalle;
    var $mes_detalle;
    var $semana_detalle;
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;


    public  function update(){
        $query="update trama_registro_ventas set 
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
        fecha='$this->fecha',
        anio_detalle='$this->anio_detalle',
        mes_detalle='$this->mes_detalle',
        semana_detalle='$this->semana_detalle',
        observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where nro_solicitud='$this->nro_solicitud'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public function consult(){
        $query="select * from trama_registro_ventas where nro_solicitud='$this->nro_solicitud' ";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){            
            $this->id_trama_registro_ventas=$fila["id_trama_registro_ventas"];
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
            $this->fecha=$fila["fecha"];
            $this->anio_detalle=$fila["anio_detalle"];
            $this->mes_detalle=$fila["mes_detalle"];
            $this->semana_detalle=$fila["semana_detalle"];
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
        $query="INSERT INTO trama_registro_ventas VALUES(0,
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
        '$this->fecha',
        '$this->anio_detalle',
        '$this->mes_detalle',
        '$this->semana_detalle',
        '$this->observacion',
        1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }   

    public function read(){
        $query="SELECT crv.*,CASE  WHEN crv.tipo_cliente='ASESOR' THEN r.razon_social
         ELSE concat(c.nombre,' ',c.apellidopaterno,' ',c.apellidomaterno) END as nombre_cliente,erv.estado_registro_venta      
        FROM trama_registro_ventas crv INNER JOIN detalle_registro_venta drv ON crv.nro_solicitud=drv.nro_solicitud
        LEFT JOIN representante r ON r.nro_documento=crv.nro_documento
        LEFT JOIN candidato c ON c.nro_documento=crv.nro_documento
        INNER JOIN tipo_venta tv ON drv.id_tipo_venta=tv.id_tipo_venta
        INNER JOIN estado_registro_venta erv ON crv.id_estado_registro_venta=erv.id_estado_registro_venta where crv.estado=1";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function conult_filtro($filtro){
         $query="SELECT crv.*,CASE  WHEN crv.tipo_cliente='ASESOR' THEN r.razon_social
         ELSE concat(c.nombre,' ',c.apellidopaterno,' ',c.apellidomaterno) END as nombre_cliente,erv.estado_registro_venta      
        FROM trama_registro_ventas crv INNER JOIN detalle_registro_venta drv ON crv.nro_solicitud=drv.nro_solicitud
        LEFT JOIN representante r ON r.nro_documento=crv.nro_documento
        LEFT JOIN candidato c ON c.nro_documento=crv.nro_documento
        INNER JOIN tipo_venta tv ON drv.id_tipo_venta=tv.id_tipo_venta
        INNER JOIN estado_registro_venta erv ON crv.id_estado_registro_venta=erv.id_estado_registro_venta where crv.estado=1 $filtro";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }


    public  function activar(){
        $query="update trama_registro_ventas set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_trama_registro_ventas='$this->id_trama_registro_ventas'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function desactivar(){
      $query="update trama_registro_ventas set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_trama_registro_ventas='$this->id_trama_registro_ventas'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function validar_list_ventas_x_fecha() {   
        $query = "select count(*) as contar from trama_registro_ventas where semana_detalle='$this->semana_detalle' and mes_detalle='$this->mes_detalle' 
        and anio_detalle='$this->anio_detalle'";    
         $rs=mysqli_query($this->f_cn(),$query);
         if($fila=mysqli_fetch_array($rs)){
             $count=$fila["contar"];
          }
          mysqli_close($this->f_cn());
          return $count;
    }  


    public function delete_list_x_fecha() {   
        $query = "delete from trama_registro_ventas where semana_detalle='$this->semana_detalle' and mes_detalle='$this->mes_detalle' and 
        anio_detalle='$this->anio_detalle'";    
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
      }

    public function combo_anio(){
        $query = "select anio_detalle from trama_registro_ventas group by anio_detalle";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo_mes(){
        $query = "select mes_detalle from trama_registro_ventas where anio_detalle='$this->anio_detalle' group by mes_detalle";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo_semana(){
        $query = "select semana_detalle from trama_registro_ventas where anio_detalle='$this->anio_detalle' and mes_detalle='$this->mes_detalle' 
        group by semana_detalle";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    

    public function consult_filtro($filtro){
        $query="SELECT crv.*,CASE  WHEN crv.tipo_cliente='ASESOR' THEN r.razon_social
        ELSE concat(c.nombre,' ',c.apellidopaterno,' ',c.apellidomaterno) END as nombre_cliente,erv.estado_registro_venta,tv.tipo_venta   
       FROM trama_registro_ventas crv INNER JOIN detalle_registro_venta drv ON crv.nro_solicitud=drv.nro_solicitud
       LEFT JOIN representante r ON r.nro_documento=crv.nro_documento
       LEFT JOIN candidato c ON c.nro_documento=crv.nro_documento
       INNER JOIN tipo_venta tv ON drv.id_tipo_venta=tv.id_tipo_venta
       INNER JOIN estado_registro_venta erv ON crv.id_estado_registro_venta=erv.id_estado_registro_venta where crv.estado!=0 $filtro";
       $res=mysqli_query($this->f_cn(),$query);
       mysqli_close($this->f_cn());
       return $res;
   }

   public function consultar_ventas_x_nro_documento_anio_mes_semana(){
    $query="SELECT crv.*,r.razon_social,erv.estado_registro_venta,tv.tipo_venta,crv.total-crv.costo_envio as total_sin_costo_envio,drv.id_tipo_venta,
    drv.id_paquete,drv.id_producto,drv.precio_unitario,drv.cantidad
    FROM trama_registro_ventas crv INNER JOIN detalle_registro_venta drv ON crv.nro_solicitud=drv.nro_solicitud
    INNER JOIN representante r ON r.nro_documento=crv.nro_documento
    INNER JOIN tipo_venta tv ON drv.id_tipo_venta=tv.id_tipo_venta
    INNER JOIN estado_registro_venta erv ON crv.id_estado_registro_venta=erv.id_estado_registro_venta where crv.estado!=0 and
    crv.nro_documento='$this->nro_documento' and crv.anio_detalle='$this->anio_detalle' and crv.mes_detalle='$this->mes_detalle' 
    and crv.semana_detalle='$this->semana_detalle'";
    $res=mysqli_query($this->f_cn(),$query);
    mysqli_close($this->f_cn());
    return $res;
   }
}
?>