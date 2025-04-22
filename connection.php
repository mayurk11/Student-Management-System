<?php
    $server = "localhost";
    $username = "root";
    $password = "Root";
    $dbname = "studentdb";
    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error)
    {             
        die("Finished");
    }
    
?>