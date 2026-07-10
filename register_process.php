<?php
include("includes/db.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// Check if email already exists
$check = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");

if(mysqli_num_rows($check) > 0)
{
    $status = "error";
    $title = "Registration Failed";
    $message = "This email is already registered. Please use another email or login.";
}
else
{
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO students(name,email,phone,password)
            VALUES('$name','$email','$phone','$hash_password')";

    if(mysqli_query($conn,$sql))
    {
        $status = "success";
        $title = "Registration Successful";
        $message = "Your account has been created successfully.";
    }
    else
    {
        $status = "error";
        $title = "Database Error";
        $message = mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>

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
    background:white;
    padding:40px;
    border-radius:12px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,.15);
}

h1{
    color:#1e3a8a;
    margin-bottom:20px;
}

.success{
    color:#16a34a;
    font-size:18px;
    margin-bottom:25px;
}

.error{
    color:#dc2626;
    font-size:18px;
    margin-bottom:25px;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:12px 22px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    border-radius:6px;
    transition:.3s;
}

.btn:hover{
    background:#1d4ed8;
}

.debug{
    margin-top:20px;
    background:#fff3cd;
    border:1px solid #ffeeba;
    color:#856404;
    padding:10px;
    border-radius:5px;
    font-size:14px;
}

</style>

</head>

<body>

<div class="container">

<?php if($status=="success"){ ?>

<h1>✅ <?php echo $title; ?></h1>

<p class="success">
<?php echo $message; ?>
</p>

<a href="login.php" class="btn">
Login Now
</a>

<?php } else { ?>

<h1>❌ <?php echo $title; ?></h1>

<p class="error">
<?php echo $message; ?>
</p>

<a href="register.php" class="btn">
Back to Register
</a>

<div class="debug">
<b>Debug Information</b><br><br>

Possible Reasons:
<br><br>

• Email already exists in the database.<br>
• Database connection failed.<br>
• SQL query error.<br>
• Missing required fields.<br>

</div>

<?php } ?>

</div>

</body>
</html>