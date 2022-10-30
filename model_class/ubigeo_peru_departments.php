<?php

include_once("cn.php");
class ubigeo_peru_departments extends cn{

    var $id;
    var $name;



    public function read()
    {
        $query="SELECT * FROM ubigeo_peru_departments";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consult()
    {
        $query="SELECT * FROM ubigeo_peru_departments WHERE id='$this->id'";
        $rs=mysqli_query($this->f_cn(),$query);
        if($fila=mysqli_fetch_array($rs)){
            $this->id=$fila["id"];
            $this->name=$fila["name"];
        }
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function create()
    {
        $query="INSERT INTO ubigeo_peru_departments VALUES(0,'$this->name')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public  function update()
    {
        $query="update ubigeo_peru_departments set name='$this->name' where id='$this->id'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function combo()
    {
        $query="SELECT * FROM ubigeo_peru_departments";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    


}

?>


