<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "mycarsltd";

$con = mysqli_connect($server,$user,$pass,$db);

if($con){
    echo "connected succefully <br>";
}
else{
    die("not connected succesfully ".mysqli_connect_error)+ "<br>";
}
//create a database
/*$query= "CREATE DATABASE mycarsltd";
$result = mysqli_query($con,$query);
if ($result){
    echo "Database created succesfully";
}
else{
    echo "DB not created ".mysqli_error($con);
}*/
// creating a tables
$query = "CREATE TABLE feedback (
    -- productId INT (4) AUTO_INCREMENT PRIMARY KEY,
    -- email VARCHAR (250) NOT NULL,
    -- feedbackMsg VARCHAR (250)) ;
    -- username VARCHAR (50) NOT NULL,
    -- email VARCHAR (50) NOT NULL,
    -- p_address VARCHAR (50) NOT NULL,
    -- pasword VARCHAR (20),
    -- dob DATE NOT NULL)";

    $result= mysqli_query($con,$query);
    if ($result){
        echo "Table created succesfully <br>";
    }
    else{
        echo "Table not created ".mysqli_error($con);
    }
?>