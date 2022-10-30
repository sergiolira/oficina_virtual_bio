<?php
include_once("cn.php");
class web_sub_menu extends cn{

    var $id_web_sub_menu;
    var $web_sub_menu;
    var $enlace;
    var $id_web_menu;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    /*CRUD*/
   
    public function create()
    {
        $query="INSERT INTO web_sub_menu VALUES(0,'$this->web_sub_menu','$this->enlace',$this->id_web_menu,'$this->observacion',1,
        now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read()
    {
        $query="SELECT wsm.*,wm.web_menu from web_sub_menu wsm 
        INNER JOIN web_menu wm ON wsm.id_web_menu=wm.id_web_menu";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update()
    {
        $query="update web_sub_menu set web_sub_menu='$this->web_sub_menu',enlace='$this->enlace',
        id_web_menu='$this->id_web_menu',observacion='$this->observacion',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_web_sub_menu='$this->id_web_sub_menu'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function activar()
    {
        $query="update web_sub_menu set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_web_sub_menu='$this->id_web_sub_menu'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public  function desactivar()
    {
      $query="update web_sub_menu set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_web_sub_menu='$this->id_web_sub_menu'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    /** Consultar */
    public function consult(){
        $query="select * from web_sub_menu where id_web_sub_menu='$this->id_web_sub_menu' ";
        $res=mysqli_query($this->f_cn(),$query);

        if($fila=mysqli_fetch_array($res)){            
            $this->id_web_sub_menu=$fila["id_web_sub_menu"];
            $this->web_sub_menu=$fila["web_sub_menu"];
            $this->enlace=$fila["enlace"];
            $this->id_web_menu=$fila["id_web_menu"];
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
        $query="SELECT * FROM web_sub_menu where estado=1 ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

}

?>