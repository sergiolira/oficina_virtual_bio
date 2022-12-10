<?php
include_once("cn.php");
class registro_compra extends cn{
    var $id_registro_compra;
    var $id_producto;
    var $id_divisa;
    var $cantidad;
    var $precio_unitario;
    var $sub_total;
    var $fecha_ingreso;
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO registro_compra VALUES(0,'$this->id_producto','$this->id_divisa',$this->cantidad,
        $this->precio_unitario,$this->sub_total,'$this->fecha_ingreso','$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="SELECT r_c.*,pro.nombre_producto,di.divisa,di.expresion FROM registro_compra r_c 
        INNER JOIN producto pro ON r_c.id_producto=pro.id_producto 
        INNER join divisa di ON r_c.id_divisa=di.id_divisa 
        ORDER BY r_c.id_registro_compra DESC";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update registro_compra set id_producto='$this->id_producto',
        id_divisa='$this->id_divisa',
        precio_unitario='$this->precio_unitario',sub_total='$this->sub_total',fecha_ingreso='$this->fecha_ingreso',
        observacion='$this->observacion',fechaactualiza=now(),id_usuarioactualiza=1
        where id_registro_compra='$this->id_registro_compra'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update registro_compra set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_registro_compra='$this->id_registro_compra'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update registro_compra set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_registro_compra='$this->id_registro_compra'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from registro_compra where id_registro_compra='$this->id_registro_compra' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_registro_compra=$fila["id_registro_compra"];
            $this->id_producto=$fila["id_producto"];
            $this->id_divisa=$fila["id_divisa"];
            $this->cantidad=$fila["cantidad"];
            $this->precio_unitario=$fila["precio_unitario"];
            $this->sub_total=$fila["sub_total"];
            $this->fecha_ingreso=$fila["fecha_ingreso"];
            $this->observacion=$fila["observacion"];            
            $this->estado=$fila["estado"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->fechaactualiza=$fila["fechaactualiza"];            
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        
        mysqli_close($this->f_cn());
    

    }

    public function last_insert_id(){
        $id_registro_compra=0;
        $query="SELECT id_registro_compra FROM registro_compra ORDER BY id_registro_compra DESC LIMIT 1";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){            
            $id_registro_compra=$fila["id_registro_compra"];
        }        
        mysqli_close($this->f_cn());
        return $id_registro_compra;
    }
    

}

?>