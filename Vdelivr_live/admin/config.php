<?php
    $host="localhost";
    $dbuser="fatnejjj_vdelivr";
    $dbpsw="Vdelivr@123";
    $dbname="fatnejjj_vdelivr";    
    try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpsw);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    } 
       ?>