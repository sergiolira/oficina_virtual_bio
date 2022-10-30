<?php
include_once("cn.php");
class herramienta_tecnologica extends cn{

    var $id_herramienta_tecnologica;
    var $id_tipo_equipo;
    var $descripcion;
    var $id_marca_equipo;
    var $modelo;
    var $nro_serial;
    var $fecha_compra;
    var $fecha_garantia;
    var $precio;
    var $id_condicion_equipo;
    var $valor_actual;
    var $status_asignacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO herramienta_tecnologica VALUES(0,$this->id_tipo_equipo,'$this->descripcion',
        $this->id_marca_equipo,'$this->modelo','$this->nro_serial','$this->fecha_compra','$this->fecha_garantia',
        $this->precio,$this->id_condicion_equipo,$this->valor_actual,0,1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="SELECT h_t.*,t_e.tipo_equipo,m_e.marca_equipo,c_e.condicion_equipo FROM herramienta_tecnologica h_t 
        INNER join tipo_equipo t_e on h_t.id_tipo_equipo=t_e.id_tipo_equipo 
        inner join marca_equipo m_e on h_t.id_marca_equipo=m_e.id_marca_equipo 
        INNER join condicion_equipo c_e on h_t.id_condicion_equipo=c_e.id_condicion_equipo";

        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update herramienta_tecnologica set id_tipo_equipo='$this->id_tipo_equipo',descripcion='$this->descripcion',
        id_marca_equipo='$this->id_marca_equipo',modelo='$this->modelo',nro_serial='$this->nro_serial',
        fecha_compra='$this->fecha_compra',fecha_garantia='$this->fecha_garantia',precio='$this->precio',
        id_condicion_equipo='$this->id_condicion_equipo',valor_actual='$this->valor_actual',
        status_asignacion='$this->status_asignacion',fechaactualiza=now(),id_usuarioactualiza=1
        where id_herramienta_tecnologica='$this->id_herramienta_tecnologica'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update herramienta_tecnologica set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_herramienta_tecnologica='$this->id_herramienta_tecnologica'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update herramienta_tecnologica set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_herramienta_tecnologica='$this->id_herramienta_tecnologica'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from herramienta_tecnologica where id_herramienta_tecnologica='$this->id_herramienta_tecnologica' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_herramienta_tecnologica=$fila["id_herramienta_tecnologica"];
            $this->id_tipo_equipo=$fila["id_tipo_equipo"];
            $this->descripcion=$fila["descripcion"];
            $this->id_marca_equipo=$fila["id_marca_equipo"];
            $this->modelo=$fila["modelo"];
            $this->nro_serial=$fila["nro_serial"];
            $this->fecha_compra=$fila["fecha_compra"];
            $this->fecha_garantia=$fila["fecha_garantia"];
            $this->precio=$fila["precio"];
            $this->id_condicion_equipo=$fila["id_condicion_equipo"];
            $this->valor_actual=$fila["valor_actual"];
            $this->status_asignacion=$fila["status_asignacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());
    }

    public function combo()
    {
        $query="SELECT ht.*,te.tipo_equipo FROM herramienta_tecnologica ht inner join tipo_equipo te on ht.id_tipo_equipo=te.id_tipo_equipo
         where ht.estado=1 and ht.status_asignacion='0'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo_herramientas_ocupadas_x_id_herramienta()
    {
        $query="SELECT  ht.*,te.tipo_equipo FROM herramienta_tecnologica ht inner join tipo_equipo te on ht.id_tipo_equipo=te.id_tipo_equipo 
        where ht.estado=1 and ht.id_herramienta_tecnologica='$this->id_herramienta_tecnologica'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_st_asig($id_h_tec)
    {
        $query="UPDATE herramienta_tecnologica set status_asignacion='1'  where id_herramienta_tecnologica='$id_h_tec'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function update_st_asig2($id_h_tec)
    {
        $query="UPDATE herramienta_tecnologica set status_asignacion='0' where id_herramienta_tecnologica='$id_h_tec'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>