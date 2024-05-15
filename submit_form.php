<?php require_once ("header.html");?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    echo "Submitted Name: " . $name . "<br>";
    echo "Submitted Email: " . $email;
}
?>


<?php require_once ("footer.html");?>
