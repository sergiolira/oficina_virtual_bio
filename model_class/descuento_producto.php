<?php
include_once("cn.php");
class descuento_producto extends cn{
    var $id_descuento_producto;
    var $id_tipo_descuento;
    var $monto;
    var $fecha_inicio;
    var $fecha_fin;
    var $id_producto;
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO descuento_producto VALUES(0,'$this->id_tipo_descuento',$this->monto,
        '$this->fecha_inicio','$this->fecha_fin',
        '$this->id_producto','$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select d_p.*,t_d.tipo_descuento,pro.nombre_producto from descuento_producto d_p 
        INNER JOIN tipo_descuento t_d ON d_p.id_tipo_descuento=t_d.id_tipo_descuento 
        INNER JOIN producto pro ON d_p.id_producto=pro.id_producto ORDER BY d_p.id_descuento_producto DESC";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update descuento_producto set id_tipo_descuento='$this->id_tipo_descuento',
        monto='$this->monto',fecha_inicio='$this->fecha_fin',
        id_producto='$this->id_producto',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_descuento_producto='$this->id_descuento_producto'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update descuento_producto set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_descuento_producto='$this->id_descuento_producto'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update descuento_producto set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_descuento_producto='$this->id_descuento_producto'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from descuento_producto where id_descuento_producto='$this->id_descuento_producto' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_descuento_producto=$fila["id_descuento_producto"];
            $this->id_tipo_descuento=$fila["id_tipo_descuento"];
            $this->monto=$fila["monto"];
            $this->fecha_inicio=$fila["fecha_inicio"];
            $this->fecha_fin=$fila["fecha_fin"];
            $this->id_producto=$fila["id_producto"];
            $this->observacion=$fila["observacion"];
            
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
        $query="SELECT * FROM descuento_producto where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>