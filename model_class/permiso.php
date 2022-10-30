<?php

include_once("cn.php");
class permiso extends cn{

    var $id_permiso;
    var $id_rol;
    var $id_modulo;    
    var $titulo;
    var $ver;
    var $crear;
    var $actualizar;
    var $eliminar;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;


    public function create()
    {
        $query="INSERT INTO permiso (id_rol,id_modulo,ver,crear,actualizar,eliminar,estado,fechaactualiza,fecharegistro,id_usuarioregistro,
        id_usuarioactualiza)VALUES ('$this->id_rol','$this->id_modulo','$this->ver','$this->crear','$this->actualizar','$this->eliminar'
        ,1,NOW(),NOW(),'1','1')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function validar_rol_modulo()
    {   
        $count=0;
        $query="SELECT COUNT(id_permiso) as contar FROM permiso WHERE id_rol='$this->id_rol' AND id_modulo='$this->id_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $count=$fila["contar"];
            if(is_null($fila["contar"])){
                $count=0;
                }
        }
        mysqli_close($this->f_cn());
        return $count;
    }

    public function consult_crud_x_rol_modulo()
    {          
        $query="SELECT * FROM permiso WHERE id_rol='$this->id_rol' AND id_modulo='$this->id_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->ver=$fila["ver"];
            $this->crear=$fila["crear"];
            $this->actualizar=$fila["actualizar"];
            $this->eliminar=$fila["eliminar"];
        }else{
            $this->ver=0;
            $this->crear=0;
            $this->actualizar=0;
            $this->eliminar=0;            
        }
        mysqli_close($this->f_cn());
    }

    public function update_ver(){
        $query="UPDATE permiso SET ver='$this->ver',fechaactualiza=now(),id_usuarioactualiza=1  WHERE 
        id_rol='$this->id_rol' AND id_modulo='$this->id_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_create(){
        $query="UPDATE permiso SET crear='$this->crear',fechaactualiza=now(),id_usuarioactualiza=1  WHERE 
        id_rol='$this->id_rol' AND id_modulo='$this->id_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_update(){
        $query="UPDATE permiso SET actualizar='$this->actualizar',fechaactualiza=now(),id_usuarioactualiza=1  WHERE 
        id_rol='$this->id_rol' AND id_modulo='$this->id_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function update_delete(){
        $query="UPDATE permiso SET eliminar='$this->eliminar',fechaactualiza=now(),id_usuarioactualiza=1  WHERE 
        id_rol='$this->id_rol' AND id_modulo='$this->id_modulo'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    

}

?>

