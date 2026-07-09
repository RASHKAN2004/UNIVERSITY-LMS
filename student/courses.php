<?php


session_start();


if(!isset($_SESSION['student_id'])){

    header("Location: ../login.php");

}


include("../includes/db.php");



$sql = "SELECT * FROM courses";


$result = mysqli_query(
    $conn,
    $sql
);


?>


<!DOCTYPE html>

<html>


<head>

<title>
Courses
</title>


<link rel="stylesheet" href="../css/dashboard.css">


</head>


<body>


<h1>
Available Courses
</h1>



<div class="cards">



<?php


while($row=mysqli_fetch_assoc($result)){


?>


<div class="card">


<h2>

<?php echo $row['course_name']; ?>

</h2>



<h4>

Code:
<?php echo $row['course_code']; ?>

</h4>



<p>

<?php echo $row['description']; ?>

</p>



</div>



<?php

}

?>


</div>



</body>


</html>