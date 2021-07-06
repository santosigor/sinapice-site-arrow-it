<?php
    // prod
    // $servername = "50.116.112.236";
    // $dbname = "clie6689_db_arrowit";
    // $username = "clie6689_arrowit";
    // $passworddb = "r]8Y.(MkPsy@2021";

    //local
    $servername = "localhost";
    $username = "root";
    $passworddb = "";
    $dbname = "db-arrowit";
    
    $con = mysqli_connect($servername, $username, $passworddb, $dbname);
    
    if (!$con) {
        die("Não foi possível conectar ao banco de dados" . mysqli_connect_error());
    }
?>