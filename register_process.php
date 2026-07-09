<?php


include("includes/db.php");



$name = $_POST['name'];

$email = $_POST['email'];

$phone = $_POST['phone'];

$password = $_POST['password'];



$hash_password = password_hash(
    $password,
    PASSWORD_DEFAULT
);



$sql = "INSERT INTO students
(name,email,phone,password)

VALUES

('$name',
'$email',
'$phone',
'$hash_password')";



$result = mysqli_query(
    $conn,
    $sql
);



if($result)

{

    echo "

    Registration Successful

    <br>

    <a href='login.php'>
    Login Now
    </a>

    ";

}

else

{

    echo "Registration Failed";

}



?>