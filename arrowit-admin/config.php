<?php
    $servername = "localhost";
    $username = "root";
    $passworddb = "";
    $dbname = "db-arrowit";
    
    $con = mysqli_connect($servername, $username, $passworddb, $dbname);
    
    if (!$con) {
        die("Não foi possível conectar ao banco de dados" . mysqli_connect_error());
    }
?>