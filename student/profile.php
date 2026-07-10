<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

$id = $_SESSION['student_id'];

$sql = "SELECT * FROM students WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f7fc;
            padding:40px;
        }

        .container{
            max-width:700px;
            margin:auto;
            background:#fff;
            padding:35px;
            border-radius:12px;
            box-shadow:0 8px 20px rgba(0,0,0,0.1);
        }

        h1{
            text-align:center;
            color:#1e3a8a;
            margin-bottom:30px;
        }

        .profile-item{
            margin-bottom:20px;
            padding:15px;
            background:#f9fafb;
            border-left:5px solid #2563eb;
            border-radius:6px;
        }

        .profile-item strong{
            color:#1e3a8a;
        }

        .btn{
            display:inline-block;
            margin-top:20px;
            background:#2563eb;
            color:white;
            text-decoration:none;
            padding:12px 20px;
            border-radius:6px;
            transition:0.3s;
        }

        .btn:hover{
            background:#1d4ed8;
        }

        @media(max-width:768px){

            body{
                padding:20px;
            }

            .container{
                padding:20px;
            }

        }
    </style>

</head>

<body>

<div class="container">

    <h1>👤 Student Profile</h1>

    <div class="profile-item">
        <strong>Name:</strong>
        <?php echo $student['name']; ?>
    </div>

    <div class="profile-item">
        <strong>Email:</strong>
        <?php echo $student['email']; ?>
    </div>

    <div class="profile-item">
        <strong>Phone:</strong>
        <?php echo $student['phone']; ?>
    </div>

    <a href="edit_profile.php" class="btn">
        Edit Profile
    </a>

</div>

</body>
</html>