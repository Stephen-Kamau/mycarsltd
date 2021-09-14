<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mycarsltd";
// creating a connection to the server
$connect =mysqli_connect($server,$username,$password,$db);

if($connect){
    echo "Connected succesfully!";
}
else{
    die("Not succesfully connected ".mysqli_connect_error());
}
// creating a database named mycarsltd
/*$query = "CREATE DATABASE mycarsltd";
$result = mysqli_query($connect,$query);
if($result){
    echo "Database created succesfully ";
}
else{
    echo " <br/>Database not created :".mysqli_error($connect);
}*/
// creating a table to store details of users
// $query= "CREATE TABLE users (
    //     id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     username VARCHAR(50) NOT NULL,
    //     email VARCHAR (50) NOT NULL,
    //     p_Address VARCHAR (50) NOT NULL,
    //     pasword VARCHAR (15) ,
    //     dob DATE NOT NULL
    // )";
    
    // $result=mysqli_query($connect,$query);
    // if($result){
        //     echo "Table created succesfully ";
        // }
        // else{
            //     echo "<br/>Table not created ".mysqli_error($connect);
            // }
            // $query = "TRUNCATE TABLE users";
            // $query = "ALTER TABLE users MODIFY pasword VARCHAR(250)";
            // $result = mysqli_query($connect,$query);
            // if($result){
            //     echo "Table modified succesfully ";
            // }
            // else{
            //     echo "<br/>Table not modified ".mysqli_error($connect);
            // }

            
?>