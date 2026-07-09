<?php

session_start();


include("../includes/db.php");


// Count Students

$student_count = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM students"
);


$students = mysqli_fetch_assoc(
    $student_count
);


// Count Courses

$course_count = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM courses"
);


$courses = mysqli_fetch_assoc(
    $course_count
);


?>


<!DOCTYPE html>

<html>

<head>

<title>
Admin Dashboard
</title>


<link rel="stylesheet" href="../css/dashboard.css">


</head>


<body>


<h1>
Admin Dashboard
</h1>



<div class="cards">


<div class="card">

<h2>
Students
</h2>


<p>

<?php echo $students['total']; ?>

</p>


</div>



<div class="card">


<h2>
Courses
</h2>


<p>

<?php echo $courses['total']; ?>

</p>


</div>



</div>




<div class="menu">


<a href="manage_students.php">

Manage Students

</a>



<a href="manage_courses.php">

Manage Courses

</a>



<a href="upload_notes.php">

Upload Notes

</a>



<a href="upload_assignment.php">

Upload Assignment

</a>



<a href="../logout.php">

Logout

</a>


</div>



</body>

</html>