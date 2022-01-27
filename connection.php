<?php   
    // define("HOST","localhost");  
    try{
    $servername="localhost";
    $uname="root";
    $password="";
    $conn=new PDO("mysql:host=$servername;dbname=projectpdo", $uname,$password );    
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Sucsess";
    }
    catch(PDOException $ee){
        echo $ee;
    }
?>

