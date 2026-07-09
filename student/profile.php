<?php

session_start();


if(!isset($_SESSION['student_id'])){

    header("Location: ../login.php");

}


include("../includes/db.php");



$id = $_SESSION['student_id'];



$sql = "SELECT * FROM students 
WHERE id='$id'";


$result = mysqli_query(
    $conn,
    $sql
);


$student = mysqli_fetch_assoc($result);


?>


<!DOCTYPE html>

<html>

<head>

<title>
Student Profile
</title>


<link rel="stylesheet" href="../css/dashboard.css">


</head>


<body>



<h1>
Student Profile
</h1>



<div class="card">


<h3>
Name:
<?php echo $student['name']; ?>
</h3>



<p>
Email:
<?php echo $student['email']; ?>
</p>



<p>
Phone:
<?php echo $student['phone']; ?>
</p>



<a href="edit_profile.php">

Edit Profile

</a>



</div>



</body>

</html>