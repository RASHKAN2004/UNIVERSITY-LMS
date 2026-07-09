<!DOCTYPE html>
<html>
<head>
<title>
Student Registration
</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="form-box">
<h2>
Student Registration
</h2>
<form 
name="registerForm"
action="register_process.php"
method="POST"
onsubmit="return validateRegister()">
<input 
type="text" 
name="name"
placeholder="Full Name"
required>
<input 
type="email" 
name="email"
placeholder="Email"
required>
<input 
type="text" 
name="phone"
placeholder="Phone Number"
required>
<input 
type="password" 
name="password"
placeholder="Password"
required>
<button type="submit">
Register
</button>
</form>
<p>
Already have an account?
<a href="login.php">
Login
</a>
</p>
</div>
<script src="js/validation.js"></script>
</body>
</html>