<?php

session_start();



if(!isset($_SESSION['student_id'])){

    header("Location: ../login.php");

}



include("../includes/db.php");



$id = $_SESSION['student_id'];



if(isset($_POST['update'])){


    $name = $_POST['name'];

    $phone = $_POST['phone'];



    $sql = "UPDATE students

    SET

    name='$name',

    phone='$phone'

    WHERE id='$id'";



    mysqli_query(
        $conn,
        $sql
    );


    echo "Profile Updated";


}



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
Edit Profile
</title>

</head>


<body>



<h2>
Edit Profile
</h2>



<form method="POST">



<label>
Name
</label>


<br>


<input 
type="text"
name="name"
value="<?php echo $student['name']; ?>">


<br><br>



<label>
Phone
</label>


<br>


<input 
type="text"
name="phone"
value="<?php echo $student['phone']; ?>">


<br><br>



<button name="update">

Update

</button>



</form>



</body>


</html>