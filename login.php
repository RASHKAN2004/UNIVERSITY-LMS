<!DOCTYPE html>

<html>

<head>

<title>
Student Login
</title>

<link rel="stylesheet" href="css/login.css">

</head>


<body>


<div class="form-box">


<h2>
Student Login
</h2>



<form action="login_process.php" method="POST">


<input 
type="email"
name="email"
placeholder="Enter Email"
required>



<input 
type="password"
name="password"
placeholder="Enter Password"
required>



<button type="submit">

Login

</button>



</form>



<p>

Don't have an account?

<a href="register.php">
Register
</a>

</p>


</div>


</body>

</html>