<?php
include_once("cn.php");
class asignacion_licencia extends cn{

    var $id_asignacion_licencia;
    var $id_herramienta_tecnologica;
    var $id_licencia;
    
    var $fecha_asignacion;
    var $fecha_vencimiento;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO asignacion_licencia VALUES(0,'$this->id_herramienta_tecnologica','$this->id_licencia',
        '$this->fecha_asignacion','$this->fecha_vencimiento','$this->observacion',1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="SELECT a_l.*,h_t.descripcion,l.licencia,c_e.condicion_equipo from asignacion_licencia a_l 
        inner join herramienta_tecnologica h_t on a_l.id_herramienta_tecnologica=h_t.id_herramienta_tecnologica 
        inner join licencia l on a_l.id_licencia=l.id_licencia 
        inner join condicion_equipo c_e on h_t.id_condicion_equipo=c_e.id_condicion_equipo";

        
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update asignacion_licencia set id_herramienta_tecnologica='$this->id_herramienta_tecnologica',
        id_licencia='$this->id_licencia',fecha_asignacion='$this->fecha_asignacion',
        fecha_vencimiento='$this->fecha_vencimiento',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_asignacion_licencia='$this->id_asignacion_licencia'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update asignacion_licencia set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_asignacion_licencia='$this->id_asignacion_licencia'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update asignacion_licencia set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_asignacion_licencia='$this->id_asignacion_licencia'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from asignacion_licencia where id_asignacion_licencia='$this->id_asignacion_licencia' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_asignacion_licencia=$fila["id_asignacion_licencia"];
            $this->id_herramienta_tecnologica=$fila["id_herramienta_tecnologica"];
            $this->id_licencia=$fila["id_licencia"];
            $this->fecha_asignacion=$fila["fecha_asignacion"];
            $this->fecha_vencimiento=$fila["fecha_vencimiento"];
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