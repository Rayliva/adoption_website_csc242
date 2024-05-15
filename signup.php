<?php require_once ("header.html");?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Account</title>
</head>
<body>
<nav>

</nav>

<main>

<h1>Create an account</h1>
<form action="signup.php" method="post">
  <table>
    <tr>
      <td>
        <label for='user'>User Name: </label>
      </td>
      <td>
        <input id='user' type="text" name="user" required autofocus>
      </td>
    </tr>
    <tr>
      <td>
        <label for='email'>User Email: </label>
      </td>
      <td>
        <input id='email' type="email" name="email" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for='password'>Password: </label>
      </td>
      <td>
        <input id='password' type="password" name="password" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for='password2'>Retype Password: </label>
      </td>
      <td>
        <input id='password2' type="password" name="password2" required>
      </td>
    </tr>
  </table>
  <br>
  <input type="submit" value="Create Account">
</form>

</main>

<?php

// TODO
// 1. Validate that the password fields match
// 2. If the password fields match attempt to insert the data into the database
//    by calling the insertUserRecord function
// 3. If the insertion is successful, then redirect to the sign in page
// 4. If the password fields do match or the insertion fails, then print a
//    message that the input is not valid.

require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $name = $_POST['user'];
    $email = $_POST['email'];

    if($password === $password2){
        $result = insertUserRecord($name, $email, $password);
            if (!$result){
                echo "Could not create account. Please try again.";
	    } else {
		header("Location: signin.php");
		exit();
	    }
    } else {
        echo "Passwords do not match. Please try again.";
    }
}
?>

<?php require_once ("footer.html");?>
