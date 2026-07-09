<?php


session_start();


include("includes/db.php");



$email = $_POST['email'];

$password = $_POST['password'];



$sql = "SELECT * FROM students 
WHERE email='$email'";



$result = mysqli_query(
    $conn,
    $sql
);



if(mysqli_num_rows($result)>0)

{


    $student = mysqli_fetch_assoc($result);



    if(password_verify(
        $password,
        $student['password']
    ))

    {


        $_SESSION['student_id'] = $student['id'];

        $_SESSION['student_name'] = $student['name'];

        $_SESSION['student_email'] = $student['email'];



        header(
        "Location: student/dashboard.php"
        );


    }


    else

    {

        echo "Wrong Password";

    }



}


else

{

    echo "Email Not Found";

}



?>