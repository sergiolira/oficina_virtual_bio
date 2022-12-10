<?php
include_once 'cn.php';
class cabecera_comisiones_venta extends cn
{
    var $id_cabecera_comisiones_venta;
    var $representante;
    var $correo;
    var $id_tipo_documento;
    var $nro_documento;
    var $patrocinador;
    var $patrocinador_directo;
    var $comision_total;
    var $anio;
    var $mes;
    var $semana_inicio;
    var $semana_fin;
    var $semana_detalle;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    function read()
    {
        $query = 'SELECT * FROM cabecera_comisiones_venta';
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function create()
    {
        $query = "INSERT INTO cabecera_comisiones_venta VALUES(0,'$this->representante','$this->correo','$this->id_tipo_documento','$this->nro_documento',
        '$this->patrocinador','$this->patrocinador_directo','$this->comision_total','$this->anio','$this->mes',now(),now(),'$this->semana_detalle',
        1,now(),now(),1,1)";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function consult()
    {
        $query = "SELECT * FROM cabecera_comisiones_venta WHERE id_cabacera_comisiones_venta ='$this->id_cabecera'";
        $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_cabecera_comisiones_venta = $fila['id_cabecera_comisiones_venta'];
            $this->representante = $fila['representante'];
            $this->correo = $fila['correo'];
            $this->id_tipo_documento = $fila['id_tipo_documento'];
            $this->nro_documento = $fila['nro_documento'];
            $this->patrocinador = $fila['patrocinador'];    
            $this->patrocinador_directo = $fila['patrocinador_directo'];
            $this->comision_total = $fila['comision_total'];
            $this->anio = $fila['anio'];
            $this->mes = $fila['mes'];
            $this->semana_inicio = $fila['semana_inicio'];
            $this->semana_fin = $fila['semana_fin'];
            $this->semana_detalle = $fila['semana_detalle'];
            $this->estado = $fila['estado'];
            $this->fechaactualiza = $fila['fechaactualiza'];
            $this->fecharegistro = $fila['fecharegistro'];
            $this->id_usuarioregistro = $fila['id_usuarioregistro'];
            $this->id_usuarioactualiza = $fila['id_usuarioactualiza'];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function update()
    {
        $query = "UPDATE cabecera_comisiones_venta 
        representante='$this->representante',correo='$this->correo',
        id_tipo_documento='$this->id_tipo_documento',nro_documento='$this->nro_documento',patrocinador='$this->patrocinador',
        patrocinador_directo='$this->patrocinador_directo',comision_total='$this->comision_total',anio='$this->anio',mes='$this->mes',
        semana_inicio='$this->semana_inicio',semana_fin='$this->semana_fin',semana_detalle='$this->semana_detalle',
        estado='$this->estado',fechaactualiza=now(),id_usuarioactualiza=2 WHERE id_cabacera_comisiones_venta = '$this->id_cabecera_comisiones_venta'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function activar()
    {
        $query = "UPDATE cabecera_comisiones_venta SET estado=1 WHERE id_cabacera_comisiones_venta='$this->id_cabecera_comisiones_venta'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function desactivar()
    {
        $query = "UPDATE cabecera_comisiones_venta SET estado=0 WHERE id_cabecera_comisiones_venta='$this->id_cabecera_comisiones_venta'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function combo()
    {
        $query = 'SELECT * FROM cabecera_comisiones_venta WHERE estado = 1';
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo_anio_comisiones_nogenerados(){
        $query = "select t.anio_detalle from trama_registro_ventas t WHERE 
        NOT EXISTS (SELECT * FROM cabecera_comisiones_venta cc WHERE 
        cc.anio = t.anio_detalle and cc.mes=t.mes_detalle and cc.semana_detalle=t.semana_detalle) group by t.anio_detalle ORDER BY 
        t.anio_detalle asc";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo_mes_comisiones_nogenerados(){
        $query = "select t.mes_detalle from trama_registro_ventas t  WHERE t.anio_detalle='$this->anio' and  NOT EXISTS 
        (SELECT * FROM cabecera_comisiones_venta cc WHERE 
        cc.anio = t.anio_detalle and  cc.mes=t.mes_detalle and cc.semana_detalle=t.semana_detalle) 
        group by t.mes_detalle ORDER BY t.mes_detalle asc";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    
      public function combo_semana_comisiones_nogenerados(){
        $query = "select t.semana_detalle from trama_registro_ventas t  WHERE t.anio_detalle='$this->anio' and t.mes_detalle='$this->mes'  and  NOT EXISTS 
        (SELECT * FROM cabecera_comisiones_venta cc WHERE 
        cc.anio = t.anio_detalle and cc.mes=t.mes_detalle and cc.semana_detalle=t.semana_detalle) 
        group by t.semana_detalle ORDER BY t.semana_detalle asc";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function validate_comisiones(){
        $query = "select count(*) as contar from cabecera_comisiones_venta where anio='$this->anio' 
        and mes='$this->mes' and semana_detalle='$this->semana_detalle'";
        $rs=mysqli_query($this->f_cn(),$query);
            if($fila=mysqli_fetch_array($rs)){
                $count=$fila["contar"];
            }
            mysqli_close($this->f_cn());
            return $count;
    }

    public function validate_comisiones_detalles(){
        $query = "SELECT count(*) as contar FROM cabecera_comisiones_venta cc INNER JOIN detalle_comisiones_venta dc ON
        cc.id_cabacera_comisiones_venta=dc.id_cabacera_comisiones_venta WHERE 
        anio='$this->anio' and mes='$this->mes' and semana_detalle='$this->semana_detalle' and cc.estado='1'";
        $rs=mysqli_query($this->f_cn(),$query);
         if($fila=mysqli_fetch_array($rs)){
             $count=$fila["contar"];
          }
          return $count;
        }

    public function read_x_anio_mes_semana()
    {
        $query = "SELECT * FROM cabecera_comisiones_venta WHERE anio = '$this->anio' AND mes='$this->mes' 
        AND semana_detalle='$this->semana_detalle' AND estado=1 ORDER BY id_cabacera_comisiones_venta asc";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo_anio(){
        $query = "select anio from cabecera_comisiones_venta group by anio";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo_mes(){
        $query = "select mes from cabecera_comisiones_venta where anio='$this->anio' group by mes";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo_semana(){
        $query = "select semana_detalle from cabecera_comisiones_venta where anio='$this->anio' and mes='$this->mes' 
        group by semana_detalle";
        $rs= mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function read_filtro($filtro)
    {
        $query = "SELECT * FROM cabecera_comisiones_venta WHERE estado=1 $filtro ORDER BY id_cabacera_comisiones_venta asc";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function total_comisiones_filtro($filtro){
        $count=0;
        $query = "SELECT IFNULL(SUM(comision_total),0) as total FROM cabecera_comisiones_venta where estado=1 $filtro 
        GROUP BY nro_documento,comision_total";
        $rs=mysqli_query($this->f_cn(),$query);
         if($fila=mysqli_fetch_array($rs)){
             $count=$fila["total"];
          }
          return $count;
        }
    
}
