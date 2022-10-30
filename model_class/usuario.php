<?php

include_once("cn.php");
class usuario extends cn{

    var $id_usuario;
    var $nombre;
    var $apellido_paterno;
    var $apellido_materno;
    var $correo;
    var $clave;
    var $telefono;
    var $id_tipo_documento;
    var $num_documento;
    var $id_rol;
    var $foto_perfil;
    var $foto_tamanio;
    var $id_genero;
    var $id_departamento;
    var $id_provincia;
    var $id_distrito;
    var $direccion;
    var $cv;
    var $fecha_nac;
    var $fecha_inicio_labores;
    var $fecha_fin_labores;
    var $nro_hijos;
    var $id_estado_civil;
    var $observacion;
    var $estado;
    var $fechaactualiza;
    var $fecharegistro;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;



    public function read()
    {
        $whereAdmin = "";
			if($_SESSION['idUser'] != 1 ){
				$whereAdmin = " where p.id_usuario != 1 ";
			}
        $query="select p.*,r.rol,p.id_usuario from usuario p inner join rol r on p.id_rol=r.id_rol
        ".$whereAdmin;
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


    public function create()
    {
        $query="INSERT INTO usuario VALUES(0,'$this->nombre','$this->apellido_paterno','$this->apellido_materno','$this->correo','$this->clave',
        '$this->telefono','$this->id_tipo_documento','$this->num_documento','$this->id_rol','$this->foto_perfil','$this->foto_tamanio',
        '$this->id_genero','$this->id_departamento','$this->id_provincia','$this->id_distrito','$this->direccion','$this->cv','$this->fecha_nac',
        '$this->fecha_inicio_labores','$this->fecha_fin_labores','$this->nro_hijos','$this->id_estado_civil','$this->observacion','1',now(), now(),1,1)";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT * FROM usuario WHERE id_usuario='$this->id_usuario'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id_usuario=$fila["id_usuario"];
            $this->nombre=$fila["nombre"];
            $this->apellido_paterno=$fila["apellido_paterno"];
            $this->apellido_materno=$fila["apellido_materno"];
            $this->correo=$fila["correo"];
            $this->clave=$fila["clave"];
            $this->telefono=$fila["telefono"];
            $this->id_tipo_documento=$fila["id_tipo_documento"];
            $this->num_documento=$fila["num_documento"];
            $this->id_rol=$fila["id_rol"];
            $this->foto_perfil=$fila["foto_perfil"];
            $this->foto_tamanio=$fila["foto_tamanio"];
            $this->id_genero=$fila["id_genero"];
            $this->id_departamento=$fila["id_departamento"];
            $this->id_provincia=$fila["id_provincia"];
            $this->id_distrito=$fila["id_distrito"];
            $this->direccion=$fila["direccion"];
            $this->cv=$fila["cv"];
            $this->fecha_nac=$fila["fecha_nac"];
            $this->fecha_inicio_labores=$fila["fecha_inicio_labores"];
            $this->fecha_fin_labores=$fila["fecha_fin_labores"];
            $this->nro_hijos=$fila["nro_hijos"];
            $this->id_estado_civil=$fila["id_estado_civil"];
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
        if ($this->clave == '') {
           $query="update usuario set id_rol='$this->id_rol',nombre='$this->nombre',apellido_paterno='$this->apellido_paterno',
           apellido_materno='$this->apellido_materno',telefono='$this->telefono',correo='$this->correo',id_tipo_documento='$this->id_tipo_documento',
           num_documento='$this->num_documento',id_genero='$this->id_genero',id_departamento='$this->id_departamento',id_provincia='$this->id_provincia',
           id_distrito='$this->id_distrito',direccion='$this->direccion',fecha_nac='$this->fecha_nac',
           fecha_inicio_labores='$this->fecha_inicio_labores',fecha_fin_labores='$this->fecha_fin_labores',nro_hijos='$this->nro_hijos',
           id_estado_civil='$this->id_estado_civil',observacion='$this->observacion',fechaactualiza=now(),id_usuarioactualiza=2 
           where id_usuario='$this->id_usuario'";
            $rs=mysqli_query($this->f_cn(),$query);
            mysqli_close($this->f_cn());
            return $rs; 
        } else {
          $query="update usuario set id_rol='$this->id_rol',nombre='$this->nombre',apellido_paterno='$this->apellido_paterno',
          apellido_materno='$this->apellido_materno',telefono='$this->telefono',correo='$this->correo',clave='$this->clave',
          id_tipo_documento='$this->id_tipo_documento',num_documento='$this->num_documento',id_genero='$this->id_genero',
          id_departamento='$this->id_departamento',id_provincia='$this->id_provincia',id_distrito='$this->id_distrito',
          direccion='$this->direccion',fecha_nac='$this->fecha_nac',fecha_inicio_labores='$this->fecha_inicio_labores',
          fecha_fin_labores='$this->fecha_fin_labores',nro_hijos='$this->nro_hijos',id_estado_civil='$this->id_estado_civil',
          observacion='$this->observacion',fechaactualiza=now(),id_usuarioactualiza=2 where id_usuario='$this->id_usuario'";
            $rs=mysqli_query($this->f_cn(),$query);
            mysqli_close($this->f_cn());
            return $rs;  
        }
        
    }

    public function combo()
    {
        $query="SELECT id_usuario,CONCAT(nombre,' ',apellido_paterno,' ',apellido_materno) as datos_usuario,num_documento FROM usuario where estado=1";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update_foto_perfil()
    {
      
         $query="update usuario set foto_perfil='$this->foto_perfil',foto_tamanio='$this->foto_tamanio' where id_usuario='$this->id_usuario'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;  

    }

    public  function update_cv()
    {
      
        $query="update usuario set cv='$this->cv' where id_usuario='$this->id_usuario'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;  

    }

    public  function activar()
    {
        $query="update usuario set estado='1' where id_usuario='$this->id_usuario'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update usuario set estado='0' where id_usuario='$this->id_usuario'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }


}

?>


