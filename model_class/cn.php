<?php
class cn{


    public function f_cn()
    {
        $hostname_cn="localhost";
        $database_cn="bd_bio";
        $user_cn="user_freky";
        $pass_cn="Freky_2022";
        
        return $cn=mysqli_connect($hostname_cn,$user_cn,$pass_cn,$database_cn);
    }

}

?>