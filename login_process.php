<?php
session_start();

include("includes/db.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM students WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $student = mysqli_fetch_assoc($result);

    if (password_verify($password, $student['password'])) {

        $_SESSION['student_id'] = $student['id'];
        $_SESSION['student_name'] = $student['name'];
        $_SESSION['student_email'] = $student['email'];

        header("Location: student/dashboard.php");
        exit();

    } else {

        $message = "Wrong Password!";
    }

} else {

    $message = "Email Not Found!";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Error</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f7fc;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .card{
            background:#fff;
            padding:40px;
            border-radius:12px;
            box-shadow:0 8px 20px rgba(0,0,0,0.1);
            text-align:center;
            width:400px;
        }

        h2{
            color:#dc2626;
            margin-bottom:20px;
        }

        p{
            font-size:18px;
            margin-bottom:25px;
        }

        a{
            display:inline-block;
            text-decoration:none;
            background:#2563eb;
            color:#fff;
            padding:12px 20px;
            border-radius:6px;
        }

        a:hover{
            background:#1d4ed8;
        }
    </style>
</head>

<body>

<div class="card">

    <h2>Login Failed</h2>

    <p><?php echo $message; ?></p>

    <a href="login.php">Back to Login</a>

</div>

</body>

</html>