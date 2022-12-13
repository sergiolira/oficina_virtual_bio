<?php
include_once("cn.php");
class costo_envio extends cn{
    var $id_costo_envio;
    var $id_pais;
    var $id_departamento;
    var $id_provincia;
    var $id_distrito;
    var $observacion;
    var $monto;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;
    var $id_usuarioregistro;
    var $id_usuarioactualiza;

    public function create(){
        $query="INSERT INTO costo_envio VALUES(0,'$this->id_pais','$this->id_departamento','$this->id_provincia',
        '$this->id_distrito','$this->monto','$this->observacion',1,now(),now(),1,1)";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function read(){
        $query="SELECT cos.*, pa.pais as pais, dep.name as departamento ,pro.name as provincia, dis.name as distrito 
        FROM costo_envio cos 
        LEFT JOIN pais pa ON pa.id_pais=cos.id_pais
        LEFT JOIN ubigeo_peru_departments dep on dep.id = cos.id_departamento 
        LEFT JOIN ubigeo_peru_provinces pro on pro.id = cos.id_provincia 
        LEFT join ubigeo_peru_districts dis on dis.id = cos.id_distrito ORDER BY cos.id_costo_envio DESC";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }


    public  function activar(){
        $query="update costo_envio set estado='1',fechaactualiza=now(),id_usuarioactualiza=1 
        where id_costo_envio='$this->id_costo_envio'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function desactivar(){
      $query="update costo_envio set estado='0',fechaactualiza=now(),id_usuarioactualiza=1 
      where id_costo_envio='$this->id_costo_envio'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public  function update(){
        $query="update costo_envio set 
        id_pais='$this->id_pais',
        id_departamento='$this->id_departamento',
        id_provincia='$this->id_provincia',
        id_distrito='$this->id_distrito',
        observacion='$this->observacion',
        monto='$this->monto',
        fechaactualiza=now(),id_usuarioactualiza=1
        where id_costo_envio='$this->id_costo_envio'";
        $res=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $res;
    }

    public function consult(){
        $query="select * from costo_envio where id_costo_envio='$this->id_costo_envio' ";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){            
            $this->id_costo_envio=$fila["id_costo_envio"];
            $this->id_pais=$fila["id_pais"];
            $this->id_departamento=$fila["id_departamento"];
            $this->id_provincia=$fila["id_provincia"];
            $this->id_distrito=$fila["id_distrito"];
            $this->monto=$fila["monto"];
            $this->observacion=$fila["observacion"];
            $this->estado=$fila["estado"];
            $this->fechaactualiza=$fila["fechaactualiza"];
            $this->fecharegistro=$fila["fecharegistro"];
            $this->id_usuarioregistro=$fila["id_usuarioregistro"];
            $this->id_usuarioactualiza=$fila["id_usuarioactualiza"];
        }
        mysqli_close($this->f_cn());   
    }

    public function consult_monto_x_pais(){
        $query="select monto from costo_envio where id_pais='$this->id_pais' and estado=1";
        $res=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($res)){      
            $this->monto=$fila["monto"];
        }
        mysqli_close($this->f_cn());   
    }

    public function consult_monto_x_pais_dep(){
        $query="select monto from costo_envio where id_pais='$this->id_pais' and id_departamento='$this->id_departamento' 
        and id_provincia='0' and id_distrito='0' and estado=1";
        $res=mysqli_query($this->f_cn(),$query);
         if($fila=mysqli_fetch_array($res)){
            $this->monto=$fila["monto"];
            if(is_null($fila["monto"])){
            $this->monto=$fila["monto"];
          }
        }
        mysqli_close($this->f_cn());   
    }

    public function consult_monto_x_pais_dep_pro(){
        $query="select monto from costo_envio where id_pais='$this->id_pais' and id_departamento='$this->id_departamento'
        and id_provincia='$this->id_provincia' and id_distrito='0' and estado=1";
        $res=mysqli_query($this->f_cn(),$query);
         if($fila=mysqli_fetch_array($res)){
            $this->monto=$fila["monto"];
            if(is_null($fila["monto"])){
            $this->monto=$fila["monto"];
          }
        }
        mysqli_close($this->f_cn());   
    }

    public function consult_monto_x_pais_dep_pro_dis(){
        $query="select monto from costo_envio where id_pais='$this->id_pais' and id_departamento='$this->id_departamento'
        and id_provincia='$this->id_provincia' and id_distrito='$this->id_distrito' and estado=1";
        $res=mysqli_query($this->f_cn(),$query);
         if($fila=mysqli_fetch_array($res)){
            $this->monto=$fila["monto"];
            if(is_null($fila["monto"])){
            $this->monto=$fila["monto"];
          }
        }
        mysqli_close($this->f_cn());   
    }
}
?>