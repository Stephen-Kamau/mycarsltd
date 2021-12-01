<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User details</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="landing.css">
<link rel="stylesheet" href="catalog.css">
</head>
<body>
<div style="margin:auto; width:30%;">
</form><br>
<form action="" method= "POST">
<label for="">Current Email: </label> <br>
<input type="text" name= "username"> <br>
<label for="">New Email: </label> <br>
<input type="text" name= "password"> <br> <br>
<label for="">Current Postal Address: </label> <br>
<input type="text" name= "username"> <br>
<label for="">New Postal Address: </label> <br>
<input type="text" name= "password"> <br> <br>
<label for="">Current Date of Birth: </label> <br>
<input type="text" name= "username"> <br>
<label for="">New Date of Birth: </label> <br>
<input type="text" name= "password"> <br> <br>
<label for="">Password: </label> <br>
<input type="password" name= "password"> <br> <br>
<button type="submit">Submit</button>
<a href="catalog.html"><button type="button">Back</button></a>
</form><br>
<a href="landing.html">Home</a>


<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mycarsltd";
// creating a connection to the server
$connect =mysqli_connect($server,$username,$password,$db);

if($connect){
    // echo "Connected succesfully!";
}
else{
    die("Not succesfully connected ".mysqli_connect_error());
}
if(isset($_REQUEST["username"])){
    $username = sanitize($_POST["username"]);
    $password = sanitize($_POST["password"]);
    $query = "SELECT * FROM users WHERE username = '$username' AND pasword = '".md5($password)."'";
    $reslt = mysqli_query($connect,$query);
    if($reslt){
        $rows=mysqli_num_rows($reslt);
        if($rows == 1){
            $query="SELECT username,email,p_Address,dob FROM users WHERE username = '$username'";
            $reslt=mysqli_query($connect,$query);
            if($reslt){
                echo"<h4>Your details</h4>";
                while($data=mysqli_fetch_assoc($reslt)){
                    // echo"<div style='margin:auto; width:30%;'>";
                    echo "<b>Username : </b>". $data ['username'];
                    echo "<br/><b>Email : </b>". $data ['email'];
                    echo "<br/><b>Postal Address : </b>". $data ['p_Address'];
                    echo "<br/><b>Date of Birth : </b>". $data ['dob'];
                    // echo"</div>";
                }
            }
            else{
                echo"<br/>Error ".mysqli_error($connect);
            }

        }
        else{
            echo "<center><br/>Incorrect username or password </center>";
            echo "<center><br/><a href='userdetails.php'>Retry</a></center>";
        }
    }
    else{
        echo"<br/>Error :".mysqli_error($connect);
    }
}
if(isset($_REQUEST["email"])){

}
function sanitize($data){
    $data= trim($data);//removes any extra whitespaces,tabs or new lines
    $data = htmlspecialchars($data);//converts any special html characters to entities
    $data = stripslashes($data); //removes backslashes
    return $data;
}
?>
<p> </p>
</div>
</body>
</html>