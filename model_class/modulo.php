<?php
include_once("cn.php");
class modulo extends cn{

    var $id_modulo;
    var $modulo;
    var $nivel;
    var $enlace;
    var $icono;
    var $estilocolor;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;


    public function read(){
        $query="SELECT * FROM modulo";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;       
    } 

    public function create()
    {
        $query="INSERT INTO modulo VALUES(0,'$this->modulo','$this->nivel','$this->enlace','$this->icono','$this->estilocolor','$this->observacion','1'
        ,now(), now(),1,1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }  
    
    public function consult()
    {
        $query="SELECT * FROM modulo WHERE id_modulo='$this->id_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_modulo=$fila["id_modulo"];
            $this->modulo=$fila["modulo"];
            $this->nivel=$fila["nivel"];
            $this->enlace=$fila["enlace"];
            $this->icono=$fila["icono"];
            $this->estilocolor=$fila["estilocolor"];
            $this->observacion=$fila["observacion"];
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
        $query="update modulo set modulo='$this->modulo',enlace='$this->enlace',icono='$this->icono',nivel='$this->nivel',
        estilocolor='$this->estilocolor',observacion='$this->observacion',fechaactualiza=now(),id_usuarioactualiza=2 where
        id_modulo='$this->id_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

	public  function activar()
    {
        $query="update modulo set estado='1' where id_modulo='$this->id_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update modulo set estado='0' where id_modulo='$this->id_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo_x_nivel() 
    {
        $query="SELECT * FROM modulo WHERE nivel='$this->nivel'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    public function combo()
    {
        $query="SELECT * FROM modulo where nivel=2";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>

