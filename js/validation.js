function validateRegister() {
  let name = document.forms["registerForm"]["name"].value;

  let email = document.forms["registerForm"]["email"].value;

  let phone = document.forms["registerForm"]["phone"].value;

  let password = document.forms["registerForm"]["password"].value;

  if (name == "") {
    alert("Enter Your Name");

    return false;
  }

  if (email == "") {
    alert("Enter Email");

    return false;
  }

  if (phone.length != 10) {
    alert("Phone Number Must Be 10 Digits");

    return false;
  }

  if (password.length < 6) {
    alert("Password Minimum 6 Characters");

    return false;
  }

  return true;
}
