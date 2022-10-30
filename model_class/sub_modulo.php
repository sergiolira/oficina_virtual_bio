<?php

include_once("cn.php");
class sub_modulo extends cn{

    var $id_sub_modulo;
    var $sub_modulo;
    var $id_modulo;
    var $nivel;
    var $sub_x_nivel;
    var $enlace;
    var $icono;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;


    public function read(){
        $query="SELECT s.*,m.modulo FROM sub_modulo s INNER JOIN modulo m ON s.id_modulo=m.id_modulo";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;       
    } 

    public function create()
    {
        $query="INSERT INTO sub_modulo VALUES(0,'$this->sub_modulo','$this->id_modulo','$this->nivel','$this->sub_x_nivel','$this->enlace','$this->icono','1'
        ,now(), now(),1,1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }  
    
    public function consult()
    {
        $query="SELECT * FROM sub_modulo WHERE id_sub_modulo='$this->id_sub_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_sub_modulo=$fila["id_sub_modulo"];
            $this->id_modulo=$fila["id_modulo"];
            $this->sub_modulo=$fila["sub_modulo"];
            $this->nivel=$fila["nivel"];
            $this->sub_x_nivel=$fila["sub_x_nivel"];
            $this->enlace=$fila["enlace"];
            $this->icono=$fila["icono"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }
    
    public  function update()
    {
        $query="update sub_modulo set sub_modulo='$this->sub_modulo',id_modulo='$this->id_modulo',nivel='$this->nivel',
        sub_x_nivel='$this->sub_x_nivel',enlace='$this->enlace',icono='$this->icono',
        fechaactualiza=now(),id_usuarioactualiza=2 where
        id_sub_modulo='$this->id_sub_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update sub_modulo set estado='1' where id_sub_modulo='$this->id_sub_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update sub_modulo set estado='0' where id_sub_modulo='$this->id_sub_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM modulo where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consultar_id_modulo_x_enlace()
    {
        $id_modulo=0;
        $query="SELECT id_modulo FROM sub_modulo where estado=1 and enlace='$this->enlace'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $id_modulo=$fila["id_modulo"];
            if(is_null($fila["id_modulo"])){
                $id_modulo=0;
                }
        }
        mysqli_close($this->f_cn());
        return $id_modulo;
    }


    public function sub_x_nivel()
    {
        $query="SELECT * FROM sub_modulo";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combosub_x_nivel() 
    {
        $query="SELECT * FROM sub_modulo WHERE nivel='$this->nivel' AND estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 


    public function consultar_id_sub_modulo_x_enlace()
    {
        $id_sub_modulo=0;
        $query="SELECT id_sub_modulo FROM sub_modulo where estado=1 and enlace='$this->enlace'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $id_sub_modulo=$fila["id_sub_modulo"];
            if(is_null($fila["id_sub_modulo"])){
                $id_sub_modulo=0;
                }
        }
        mysqli_close($this->f_cn());
        return $id_sub_modulo;
    }

    public function consultar_sub_x_nivel_x_enlace()
    {
        $sub_x_nivel=0;
        $query="SELECT sub_x_nivel FROM sub_modulo where estado=1 and enlace='$this->enlace'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $sub_x_nivel=$fila["sub_x_nivel"];
            if(is_null($fila["sub_x_nivel"])){
                $sub_x_nivel=0;
                }
        }
        mysqli_close($this->f_cn());
        return $sub_x_nivel;
    }


}

?>

