<?php

include_once("cn.php");
class ubigeo_peru_districts extends cn{

    var $id;
    var $name;
    var $province_id;
    var $department_id;



    public function read()
    {
        $query="select dis.*,pro.name as province, dep.name as departamento from ubigeo_peru_districts dis 
        inner join ubigeo_peru_provinces pro on dis.province_id=pro.id
        inner join ubigeo_peru_departments dep on dis.department_id=dep.id ";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT * FROM ubigeo_peru_districts WHERE id='$this->id'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id=$fila["id"];
            $this->name=$fila["name"];
            $this->province_id=$fila["province_id"];
            $this->department_id=$fila["department_id"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }


    public  function update()
    {
        $query="update ubigeo_peru_districts set name='$this->name',province_id='$this->province_id',department_id='$this->department_id' where
        id='$this->id'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM ubigeo_peru_districts";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    public function combo_x_prov()
    {
        $query="SELECT * FROM ubigeo_peru_districts WHERE province_id='$this->province_id'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    } 

    

}

?>


