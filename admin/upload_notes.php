<?php

include("../includes/db.php");


if(isset($_POST['upload'])){


    $title = $_POST['title'];


    $file = $_FILES['note_file']['name'];


    $temp = $_FILES['note_file']['tmp_name'];



    $folder = "../uploads/notes/".$file;



    move_uploaded_file(
        $temp,
        $folder
    );



    $sql = "INSERT INTO notes
    (title,file_name)

    VALUES

    ('$title','$file')";



    mysqli_query($conn,$sql);



    echo "Notes Uploaded Successfully";


}


?>



<!DOCTYPE html>

<html>

<head>

<title>
Upload Notes
</title>

</head>


<body>



<h2>
Upload Lecture Notes
</h2>



<form method="POST"
enctype="multipart/form-data">



<input 
type="text"
name="title"
placeholder="Note Title"
required>



<br><br>



<input 
type="file"
name="note_file"
required>



<br><br>



<button name="upload">

Upload

</button>



</form>



</body>

</html>