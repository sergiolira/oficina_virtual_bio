<?php
include_once("cn.php");
class asignacion_herramienta extends cn{

    var $id_asignacion_herramienta;
    var $id_usuario;
    var $id_herramienta_tecnologica;
    var $fecha_asignacion;
    var $fecha_liberacion;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO asignacion_herramienta VALUES(0,'$this->id_usuario','$this->id_herramienta_tecnologica',
        '$this->fecha_asignacion','$this->fecha_liberacion','$this->observacion',1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="SELECT a_h.*,u.num_documento,h_t.descripcion,c_e.condicion_equipo,t_e.tipo_equipo 
        from asignacion_herramienta a_h 
        inner join herramienta_tecnologica h_t on a_h.id_herramienta_tecnologica=h_t.id_herramienta_tecnologica 
        inner join usuario u on a_h.id_usuario=u.id_usuario
        inner join condicion_equipo c_e on h_t.id_condicion_equipo=c_e.id_condicion_equipo
        inner join tipo_equipo t_e on h_t.id_tipo_equipo=t_e.id_tipo_equipo";

        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update asignacion_herramienta set id_usuario='$this->id_usuario',id_herramienta_tecnologica='$this->id_herramienta_tecnologica',
        fecha_asignacion='$this->fecha_asignacion',
        fecha_liberacion='$this->fecha_liberacion',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_asignacion_herramienta='$this->id_asignacion_herramienta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update asignacion_herramienta set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_asignacion_herramienta='$this->id_asignacion_herramienta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update asignacion_herramienta set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_asignacion_herramienta='$this->id_asignacion_herramienta'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from asignacion_herramienta where id_asignacion_herramienta='$this->id_asignacion_herramienta' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_asignacion_herramienta=$fila["id_asignacion_herramienta"];
            $this->id_usuario=$fila["id_usuario"];
            $this->id_herramienta_tecnologica=$fila["id_herramienta_tecnologica"];           
            $this->fecha_asignacion=$fila["fecha_asignacion"];
            $this->fecha_liberacion=$fila["fecha_liberacion"];
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