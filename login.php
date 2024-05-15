<?php require_once ("header.html");?>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<main>
<body>
<nav>

</nav>
<h1>Sign In</h1>






<form action="login.php" method="post">
  <table>
    <tr>
      <td>
        <label for='email'>User Email: </label>
      </td>
      <td>
        <input id='email' type="email" name="email" required autofocus>
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
  </table>
  <button type="button" onclick="window.location.href='signup.php'">New User</button>
  <input type="submit" value="Sign In">
</form>


</main>



<?php
// TODO
// 1. If the form values are set, then get the user record from the database
//    by calling the getUserRecord function.
// 2. If a record is returned, then store each of the values in session
//    variable and redirect to the home page.
// 3. If a record is not returned, then print a message that the email and
//    password combination is not valid.

require_once 'functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = getUserRecord($email, $password);

	    if (!$result){
		echo "Invalid email and password combination.";
	    } else {
		$_SESSION['s_email'] = $email;
		$_SESSION['s_password'] = $password;
                header("Location: index.php");
		exit();
	    }

    } else {
        echo "Email and password are required.";
    }
}

?>
<?php require_once ("footer.html");?>


