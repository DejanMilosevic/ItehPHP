<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "sportska_oprema";
    
    $conn = new mysqli($hostname,$username,$password,$database);

    if($conn->connect_errno){
        exit("Neuspesna konekcija sa bazom podataka - greska: " . $conn->connect_error . ", err kod: " . $conn->connect_errno);
    }


?>