<?php

include_once("cn.php");
class login extends cn{

    var $id_usuario;
    var $correo;
    var $clave;
    


    public function loginUser()
    {
        $query="SELECT id_usuario,estado FROM usuario WHERE 
        correo = '$this->correo' and 
        clave = '$this->clave' /* and 
        estado != 0 */ ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function sesionLogin($iduser)
    {
        $this->id_usuario = $iduser;
        $query="SELECT p.id_usuario,
        p.nombre,
        p.apellido_paterno,
        p.apellido_materno,
        p.telefono,
        p.correo,
        p.foto_perfil,
        p.estado,
        p.fecharegistro,
        p.fechaactualiza,
        p.id_usuarioregistro,
        p.id_usuarioactualiza,
        r.id_rol,r.rol
        FROM usuario p
        INNER JOIN rol r
        ON p.id_rol = r.id_rol
        WHERE p.id_usuario = $this->id_usuario";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }



}

?>


