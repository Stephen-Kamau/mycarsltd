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
    $username= sanitize($_POST["username"]);
    $password= sanitize($_POST["password"]);
    // $hashedpwd = password_hash($password,PASSWORD_DEFAULT);//hashing the password
    //checking whether the username exists
    $query = "SELECT * FROM users WHERE username='$username'";
    $reslt = mysqli_query($connect,$query);
    if(!$reslt){//query not succesful
        echo"<br/>Error : ".mysqli_error($connect);
    }
    else{//query succesful
        $num_rows=mysqli_num_rows($reslt);
        if($num_rows<1){//zero rows hence no such user
            echo "<br/>User does not exist!";
            echo "<br/><a href='login.html'>Retry</a>";
        }
        else{// 1 row hence user exists. proceed to check the password is correct
            $query = "SELECT * FROM users WHERE username = '$username' AND pasword = '".md5($password)."'";
            $reslt = mysqli_query($connect,$query);
            if(!$reslt){//query failure
                echo "<br/>Error ! :".mysqli_error($connect);
            }
            else{//query succesful. 
                //no of rows of records with the submitted username and password
                $num_rows = mysqli_num_rows($reslt);
                if($num_rows==1){//password is correct since we have one row returned
                    //redirect the user to the catalog
                    header("Location: catalog.html");
                }
                else{
                    echo "<br/>The password is incorrect ";
                    echo "<br/><a href='login.html'>Retry</a>";
                }
            }
        }
    }
}
function sanitize($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}
?>