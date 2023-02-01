<?php
    class conectar{
        public static function conexion(){
            $con=new mysqli('localhost','root','','centro');
            $con->set_charset('utf8');
            return $con;
        }
    }
?>