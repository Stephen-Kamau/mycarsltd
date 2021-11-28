<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mycarsltd";

$connect = mysqli_connect($server,$username,$password,$db);//connection variable
if($connect){
    // echo "Connected succesfully";
}
else{
    die ("Not connected ".mysqli_connect_error());
}
//capturing data from form
if($_SERVER["REQUEST_METHOD"]== "POST"){ //checking whether the method is post before executing the script
    // getting values from the form
    $email= sanitize($_POST["email"]);
    $name= sanitize($_POST["name"]);
    $number= sanitize($_POST["number"]);
    $message= sanitize($_POST["message"]);

    $query= "INSERT INTO contactus (email,userName,userPhoneNumber,contactMessage)
            VALUES ('$email','$name','$number','$message')";

    $result = mysqli_query($connect,$query);
    if($result){
        echo "Thank you for your feedback <br>";
        echo "<a href='landing.html'>Home</a>";
    }else{
        echo "".mysqli_error($connect);
    }
}
function sanitize($data){
    $data = trim($data); 
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
?>