<?php

include("../includes/db.php");


if(isset($_POST['upload'])){


    $title = $_POST['title'];

    $description = $_POST['description'];

    $due_date = $_POST['due_date'];



    $file = $_FILES['assignment_file']['name'];

    $temp = $_FILES['assignment_file']['tmp_name'];



    $folder = "../uploads/assignments/".$file;



    move_uploaded_file(
        $temp,
        $folder
    );



    $sql = "INSERT INTO assignments

    (title,description,file_name,due_date)

    VALUES

    ('$title',
     '$description',
     '$file',
     '$due_date')";



    mysqli_query(
        $conn,
        $sql
    );


    echo "Assignment Uploaded Successfully";


}


?>


<!DOCTYPE html>

<html>

<head>

<title>
Upload Assignment
</title>

</head>


<body>


<h2>
Upload Assignment
</h2>



<form method="POST" 
enctype="multipart/form-data">



<input 
type="text"
name="title"
placeholder="Assignment Title"
required>


<br><br>



<textarea 
name="description"
placeholder="Assignment Description">

</textarea>


<br><br>



<input 
type="date"
name="due_date"
required>


<br><br>



<input 
type="file"
name="assignment_file"
required>


<br><br>



<button name="upload">

Upload Assignment

</button>



</form>


</body>

</html>