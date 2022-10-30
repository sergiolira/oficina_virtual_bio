<?php

include_once("cn.php");
class ubigeo_peru_provinces extends cn{

    var $id;
    var $name;
    var $department_id;



    public function read()
    {
        $query="select up.*,ud.name as departamento from ubigeo_peru_provinces up inner join ubigeo_peru_departments ud on up.department_id=ud.id ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT * FROM ubigeo_peru_provinces WHERE id='$this->id'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id=$fila["id"];
            $this->name=$fila["name"];
            $this->department_id=$fila["department_id"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO ubigeo_peru_provinces VALUES(0,'$this->name','$this->department_id')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update ubigeo_peru_provinces set name='$this->name',department_id='$this->department_id' where
        id='$this->id'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    /* public  function activar()
    {
        $query="update ubigeo_peru_provinces set estado='1' where id='$this->id'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function desactivar()
    {
        $query="update ubigeo_peru_provinces set estado='0' where id='$this->id'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }*/
    
    public function combo()
    {
        $query="SELECT * FROM ubigeo_peru_provinces";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    public function combo_x_dep()
    {
        $query="SELECT * FROM ubigeo_peru_provinces WHERE department_id='$this->department_id'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    

}

?>


