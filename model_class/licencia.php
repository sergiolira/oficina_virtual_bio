<?php
include_once("cn.php");
class licencia extends cn{

    var $id_licencia;
    var $licencia;
    var $id_tipo_licencia;
    var $codigo;
    var $stock;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO licencia VALUES(0,'$this->licencia','$this->id_tipo_licencia','$this->codigo',$this->stock,'$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="select l.*,tl.tipo_licencia from licencia l inner join tipo_licencia tl on l.id_tipo_licencia=tl.id_tipo_licencia";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update licencia set licencia='$this->licencia',id_tipo_licencia='$this->id_tipo_licencia',
        codigo='$this->codigo',stock='$this->stock',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_licencia='$this->id_licencia'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update licencia set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_licencia='$this->id_licencia'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update licencia set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_licencia='$this->id_licencia'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from licencia where id_licencia='$this->id_licencia'";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_licencia=$fila["id_licencia"];
            $this->licencia=$fila["licencia"];
            $this->id_tipo_licencia=$fila["id_tipo_licencia"];
            $this->codigo=$fila["codigo"];
            $this->stock=$fila["stock"];
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
        $query="SELECT * FROM licencia WHERE estado=1 AND stock > 0";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public function consult_stock($id_lic)
    {
        $query="SELECT stock from licencia  WHERE id_licencia= '$id_lic'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    
    public function update_stock($id_lic,$stock)
    {
        $query="UPDATE licencia set stock='$stock' where id_licencia='$id_lic'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_stock_x_fecha_venc($id_lic,$stock,$fecha_ven)
    {
        $query="UPDATE licencia set stock='$stock' where id_licencia='$id_lic' and '$fecha_ven'>DATE_FORMAT(NOW(),'%Y-%m-%d')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }



}
?>