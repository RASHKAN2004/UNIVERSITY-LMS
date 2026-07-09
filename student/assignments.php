<?php


session_start();



if(!isset($_SESSION['student_id'])){


header("Location: ../login.php");


}



include("../includes/db.php");



$sql = "SELECT * FROM assignments";


$result = mysqli_query(
$conn,
$sql
);



?>


<!DOCTYPE html>

<html>

<head>

<title>
Assignments
</title>

</head>


<body>



<h1>
Available Assignments
</h1>



<table border="1">


<tr>

<th>
Title
</th>


<th>
Description
</th>


<th>
Due Date
</th>


<th>
Download
</th>


</tr>




<?php


while($row=mysqli_fetch_assoc($result)){


?>


<tr>


<td>

<?php echo $row['title']; ?>

</td>



<td>

<?php echo $row['description']; ?>

</td>



<td>

<?php echo $row['due_date']; ?>

</td>



<td>


<a href="../uploads/assignments/<?php echo $row['file_name']; ?>"
download>


Download


</a>


</td>


</tr>



<?php

}

?>


</table>


</body>

</html>