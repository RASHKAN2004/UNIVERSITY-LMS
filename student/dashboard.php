<?php


session_start();



if(!isset($_SESSION['student_id']))

{

    header("Location: ../login.php");

}


?>


<!DOCTYPE html>

<html>

<head>

<title>
Student Dashboard
</title>


<link rel="stylesheet" href="../css/dashboard.css">


</head>


<body>


<h1>

Welcome 

<?php

echo $_SESSION['student_name'];

?>

</h1>



<h2>
Student Dashboard
</h2>



<div class="menu">


<a href="courses.php">
Courses
</a>


<a href="notes.php">
Notes
</a>


<a href="assignments.php">
Assignments
</a>


<a href="profile.php">
Profile
</a>


<a href="../logout.php">
Logout
</a>


</div>



</body>

</html>