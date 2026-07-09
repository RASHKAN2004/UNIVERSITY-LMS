<?php


session_start();



if(!isset($_SESSION['student_id'])){


header("Location: ../login.php");


}



include("../includes/db.php");



$sql = "SELECT * FROM notes";


$result = mysqli_query(
$conn,
$sql
);



?>


<!DOCTYPE html>

<html>

<head>

<title>
Lecture Notes
</title>


</head>


<body>



<h1>
Available Lecture Notes
</h1>




<table border="1">


<tr>

<th>
Title
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


<a href="../uploads/notes/<?php echo $row['file_name']; ?>"
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