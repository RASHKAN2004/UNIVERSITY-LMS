<?php


include("../includes/db.php");



$sql = "SELECT * FROM students";


$result = mysqli_query(
$conn,
$sql
);


?>


<!DOCTYPE html>

<html>

<head>

<title>
Manage Students
</title>

</head>


<body>



<h2>
Student List
</h2>



<table border="1">


<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

</tr>



<?php


while($row=mysqli_fetch_assoc($result)){


?>


<tr>


<td>

<?php echo $row['id']; ?>

</td>



<td>

<?php echo $row['name']; ?>

</td>



<td>

<?php echo $row['email']; ?>

</td>



<td>

<?php echo $row['phone']; ?>

</td>



</tr>



<?php

}

?>


</table>


</body>

</html>