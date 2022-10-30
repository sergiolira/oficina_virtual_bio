<?php
include_once("cn.php");
class web_header extends cn{
    var $id_web_header;
    var $marca_comercial;
    var $logo;
    var $logo_blanco;
    var $logo_footer;    
    var $celular1;  
    var $celular2;  
    var $razon_social;  
    var $ruc;  
    var $observacion;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO web_header VALUES(0,'$this->marca_comercial','$this->logo',
        '$this->logo_blanco','$this->logo_footer','$this->celular1','$this->celular2',
        '$this->razon_social','$this->ruc','$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="SELECT * FROM web_header ";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update web_header set marca_comercial='$this->marca_comercial',logo='$this->logo',
        logo_blanco='$this->logo_blanco',logo_footer='$this->logo_footer',
        celular1='$this->celular1',celular2='$this->celular2',razon_social='$this->razon_social',
        ruc='$this->ruc',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_web_header='$this->id_web_header'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update web_header set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_web_header='$this->id_web_header'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update web_header set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_web_header='$this->id_web_header'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from web_header where id_web_header='$this->id_web_header' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_web_header=$fila["id_web_header"];
            $this->marca_comercial=$fila["marca_comercial"];
            $this->logo=$fila["logo"];
            $this->logo_blanco=$fila["logo_blanco"];
            $this->logo_footer=$fila["logo_footer"];
            $this->celular1=$fila["celular1"];
            $this->celular2=$fila["celular2"];
            $this->razon_social=$fila["razon_social"];
            $this->ruc=$fila["ruc"];                     
            $this->observacion=$fila["observacion"];           
            $this->estado=$fila["estado"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->fechaactualiza=$fila["fechaactualiza"];            
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        
        mysqli_close($this->f_cn());
    

    }
    public function combo()
    {
        $query="SELECT * FROM web_header where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    

}

?>