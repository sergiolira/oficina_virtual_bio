<?php

include_once("cn.php");
class banner_portadas extends cn{
 

var $id_banner_portadas;
var $url;


    public function foto_portada()
    {
        $query="update banner_portadas set id_banner_portadas='$this->id_banner_portadas',url='$this->url' where
        id_banner_portadas='$this->id_banner_portadas'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function read()
    {
        $query="SELECT * FROM banner_portadas WHERE id_banner_portadas='$this->id_banner_portadas'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }




   



    

}

?>