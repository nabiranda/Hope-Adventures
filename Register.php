<?php
include "db.php"; 

$fullname=$_POST["fullname"];
$email =$_POST["email"];
$telephone =$_POST["telephone"];
$destination =$_POST["destination"];
$password =$_POST["password"];
$confirmpassword =$_POST["confirmpassword"];

if ($password != $confirmpassword) {

    die("Passwords do not match!");
}

$sql ="INSERT INTO user 
(fullname,email,telephone,destination,password,confirmpassword) 
VALUES
('$fullname','$email','$telephone','$destination','$password','$confirmpassword')";
if (mysqli_query($conn,$sql))   {
    echo "Registration Successful";
    echo header('Location: Login.html');
} else {
    echo "Error:" . mysqli_error ($conn);
}

 

?>