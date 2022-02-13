<?php

class database{

    public function dbconnection(){

        //conneting to database
        $connection = new mysqli('localhost','root','','students');

        //cheking connetion
        if($connection->connect_errno){
        echo "Connection fail<br>";
        echo $connection->connect_error;
        }
        
        else{
        //echo "Connection success";
        }

        return $connection;

    }
}



?>