<?php
include_once "cn.php";
class cab_comisiones extends cn
{
    var $id_cabecera;
    var $representante;
    var $correo;
    var $id_tipo_documento;
    var $nro_doc;
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
        $query = "SELECT * FROM cabecera_comisiones_venta";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function create()
    {
        $query = "INSERT INTO cabecera_comisiones_venta VALUES(0,'$this->representante','$this->correo','$this->id_tipo_documento','$this->nro_doc',
        '$this->comision_total','$this->anio','$this->mes','$this->semana_inicio','$this->semana_fin','$this->semana_detalle',1,now(),now(),1,1)";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function consult()
    {
        $query = "SELECT * FROM cabecera_comisiones_venta WHERE id_cabacera_comisiones_venta ='$this->id_cabecera'";
       $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_cabecera = $fila["id_cabacera_comisiones_venta"];
            $this->representante = $fila["representante"];
            $this->correo = $fila["correo"];
            $this->id_tipo_documento=$fila["id_tipo_documento"];
            $this->nro_doc = $fila["nro_documento"];
            $this->comision_total = $fila["comision_total"];
            $this->anio = $fila["anio"];
            $this->mes = $fila["mes"];
            $this->semana_inicio = $fila["semana_inicio"];
            $this->semana_fin = $fila["semana_fin"];
            $this->semana_detalle = $fila["semana_detalle"];
            $this->estado = $fila["estado"];
            $this->fechaactualiza = $fila["fechaactualiza"];
            $this->fecharegistro = $fila["fecharegistro"];
            $this->id_usuarioregistro = $fila["id_usuarioregistro"];
            $this->id_usuarioactualiza = $fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    } 
    public function update()
    {

        $query = "UPDATE cabecera_comisiones_venta 
            SET id_cabacera_comisiones_venta='$this->id_cabecera',representante='$this->representante',correo='$this->correo',
            id_tipo_documento='$this->id_tipo_documento',nro_documento='$this->nro_doc',comision_total='$this->comision_total',anio='$this->anio',mes='$this->mes',
           semana_inicio='$this->semana_inicio',semana_fin='$this->semana_fin',semana_detalle='$this->semana_detalle',
           estado='$this->estado',fechaactualiza=now(),id_usuarioactualiza=2 WHERE id_cabacera_comisiones_venta = '$this->id_cabecera'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public  function activar()
    {
        $query="UPDATE cabecera_comisiones_venta SET estado=1 WHERE id_cabacera_comisiones_venta='$this->id_cabecera'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="UPDATE cabecera_comisiones_venta SET estado=0 WHERE id_cabacera_comisiones_venta='$this->id_cabecera'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function combo(){
        $query = "SELECT * FROM cabecera_comisiones_venta WHERE estado = 1";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }


}
