<?php

include_once("cn.php");
class perfil extends cn{

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
    var $id_herramienta_tecnologica;



    public function read()
    {
        $query="select u.*,r.rol,td.tipo_documento,dep.name as departamento, pro.name as provincia, dis.name as distrito, 
        ed.estado_civil,g.genero from usuario u 
        inner join rol r on u.id_rol=r.id_rol 
        inner join estado_civil ed on u.id_estado_civil=ed.id_estado_civil 
        inner join tipo_documento td on u.id_tipo_documento=td.id_tipo_documento
        inner join ubigeo_peru_departments dep on u.id_departamento=dep.id
        inner join ubigeo_peru_provinces pro on u.id_provincia=pro.id
        inner join ubigeo_peru_districts dis on u.id_distrito=dis.id
        inner join genero g on u.id_genero=g.id_genero 
        where u.id_usuario='$this->id_usuario'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function herramientas_x_usuario()
    {
        $query="select asig.*,ht.descripcion,ht.id_tipo_equipo,te.tipo_equipo,ht.id_marca_equipo,m_e.marca_equipo,ht.modelo,
        ht.nro_serial,ht.id_condicion_equipo,ce.condicion_equipo FROM asignacion_herramienta asig 
        INNER JOIN herramienta_tecnologica ht ON asig.id_herramienta_tecnologica=ht.id_herramienta_tecnologica 
        INNER JOIN tipo_equipo te ON ht.id_tipo_equipo=te.id_tipo_equipo 
        INNER JOIN marca_equipo m_e ON ht.id_marca_equipo=m_e.id_marca_equipo 
        INNER JOIN condicion_equipo ce ON ht.id_condicion_equipo=ce.id_condicion_equipo
        WHERE id_usuario='$this->id_usuario'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }
    public function licencia_x_usuario()
    {
        $query="select asig.*,lic.licencia,lic.id_tipo_licencia,lic.codigo,tl.tipo_licencia from asignacion_licencia asig 
        inner join licencia lic on asig.id_licencia=lic.id_licencia 
        inner join tipo_licencia tl on lic.id_tipo_licencia=tl.id_tipo_licencia 
        where id_herramienta_tecnologica='$this->id_herramienta_tecnologica'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
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

    

    public  function update_perfil()
{
    if ($this->clave == '') {
        $query="update usuario set telefono='$this->telefono',
        id_genero='$this->id_genero',id_departamento='$this->id_departamento',id_provincia='$this->id_provincia',
        id_distrito='$this->id_distrito',direccion='$this->direccion'
        ,nro_hijos='$this->nro_hijos',id_estado_civil='$this->id_estado_civil' where id_usuario='$this->id_usuario'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs; 
    } else {
        $query="update usuario set clave='$this->clave',telefono='$this->telefono',
        id_genero='$this->id_genero',id_departamento='$this->id_departamento',id_provincia='$this->id_provincia',
        id_distrito='$this->id_distrito',direccion='$this->direccion'
        ,nro_hijos='$this->nro_hijos',id_estado_civil='$this->id_estado_civil' where id_usuario='$this->id_usuario'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs; 
    } 
        
    }

    public  function update_foto()
    {
      
         $query="update usuario set foto_perfil='$this->foto_perfil',foto_tamanio='$this->foto_tamanio' where id_usuario='$this->id_usuario'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;  

    }



}

?>


