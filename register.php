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
// function that sanitizes the data captured from the form 
if($_SERVER["REQUEST_METHOD"]== "POST"){ //checking whether the method is post before executing the script
    //capturing data from the form while passing it through the cleansing fxn
    // echo "<br/>We are now capturing data from the form...";
    $username= sanitize($_POST["username"]);
    $email= sanitize($_POST["email"]);
    $dob= sanitize($_POST["dob"]);
    $postalAddress= sanitize($_POST["p_Address"]);
    $password= sanitize($_POST["password"]);
    $c_password = sanitize($_POST["c_password"]);
    // $hashedpwd= password_hash($password,PASSWORD_DEFAULT);
    // checking whether the password and confirm password values are the same
    if($password != $c_password){ //if not the same do this......
        echo "<br/>Passwords don't match!";
        echo "<br/><a href='registration.html'>Retry </a>";
    }
    else{// the values for password and confirm password match therefore do this......
        // check whether the username already exists
        $query = "SELECT * FROM users WHERE username = '$username'";
        $reslt = mysqli_query($connect,$query);
        if($reslt){
            $numrows= mysqli_num_rows($reslt);
            if($numrows>0){//username already exists
                echo "Username  already exists";
                echo "<br/><a href='registration.html'>Retry</a>";
            }
            else{//less than 0 rows hence username doesnt exist
                $query= "INSERT INTO users(username,email,dob,p_Address,pasword) 
                VALUES ('$username','$email','$dob','$postalAddress','".md5($password)."')";
                $reslt= mysqli_query($connect,$query);
                if($reslt){
                    header("Location:login.html");
                    // echo "succesfully registerd";
                }
                else{
                    echo "Error : ".mysqli_error($connect);
                }
            }
        }
        else{
            echo "Error: ".mysqli_error($connect);
        }
    }
}
function sanitize($data){
    $data= trim($data);//removes any extra whitespaces,tabs or new lines
    $data = htmlspecialchars($data);//converts any special html characters to entities
    $data = stripslashes($data); //removes backslashes
    return $data;
}

?>