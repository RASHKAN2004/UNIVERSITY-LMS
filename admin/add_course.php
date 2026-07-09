<?php

include("../includes/db.php");


if(isset($_POST['add'])){


    $name = $_POST['course_name'];

    $code = $_POST['course_code'];

    $description = $_POST['description'];



    $sql = "INSERT INTO courses
    (course_name,course_code,description)

    VALUES

    ('$name','$code','$description')";



    mysqli_query($conn,$sql);


    echo "Course Added Successfully";


}


?>


<!DOCTYPE html>

<html>

<head>

<title>
Add Course
</title>

</head>


<body>


<h2>
Add New Course
</h2>



<form method="POST">


<input 
type="text"
name="course_name"
placeholder="Course Name"
required>



<br><br>



<input 
type="text"
name="course_code"
placeholder="Course Code"
required>



<br><br>



<textarea
name="description"
placeholder="Course Description">
</textarea>



<br><br>



<button name="add">

Add Course

</button>



</form>



</body>

</html>