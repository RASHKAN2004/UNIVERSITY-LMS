<?php

session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

$id = $_SESSION['student_id'];
$message = "";

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $sql = "UPDATE students
            SET
            name='$name',
            phone='$phone'
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        $message = "✅ Profile Updated Successfully!";
    } else {
        $message = "❌ Failed to Update Profile!";
    }
}

$sql = "SELECT * FROM students WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$student = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Profile</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f4f7fc;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.container{
    width:450px;
    background:#fff;
    padding:35px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    color:#1e3a8a;
    margin-bottom:25px;
}

.success{
    background:#dcfce7;
    color:#166534;
    padding:12px;
    border-radius:6px;
    margin-bottom:20px;
    text-align:center;
}

.error{
    background:#fee2e2;
    color:#991b1b;
    padding:12px;
    border-radius:6px;
    margin-bottom:20px;
    text-align:center;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:bold;
    color:#333;
}

input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:6px;
    margin-bottom:20px;
    font-size:16px;
}

input:focus{
    outline:none;
    border-color:#2563eb;
    box-shadow:0 0 5px rgba(37,99,235,.3);
}

button{
    width:100%;
    padding:12px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:6px;
    font-size:16px;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    background:#1d4ed8;
}

.back{
    display:block;
    margin-top:15px;
    text-align:center;
    text-decoration:none;
    color:#2563eb;
}

.back:hover{
    text-decoration:underline;
}

</style>

</head>

<body>

<div class="container">

<h2>✏️ Edit Profile</h2>

<?php
if($message!=""){
    if(strpos($message,"✅")!==false){
        echo "<div class='success'>$message</div>";
    }else{
        echo "<div class='error'>$message</div>";
    }
}
?>

<form method="POST">

<label>Name</label>

<input
type="text"
name="name"
value="<?php echo $student['name']; ?>"
required>

<label>Phone</label>

<input
type="text"
name="phone"
value="<?php echo $student['phone']; ?>"
required>

<button type="submit" name="update">
Update Profile
</button>

</form>

<a href="profile.php" class="back">
← Back to Profile
</a>

</div>

</body>

</html>