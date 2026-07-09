<?php


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
Manage Courses
</title>


</head>



<body>


<h2>
Course List
</h2>




<table border="1">


<tr>

<th>
Course ID
</th>


<th>
Course Name
</th>


<th>
Course Code
</th>


</tr>




<?php


while($row=mysqli_fetch_assoc($result)){


?>


<tr>


<td>

<?php echo $row['course_id']; ?>

</td>



<td>

<?php echo $row['course_name']; ?>

</td>



<td>

<?php echo $row['course_code']; ?>

</td>



</tr>



<?php

}

?>


</table>



</body>


</html>