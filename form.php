<?php
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$subject= filter_input(INPUT_POST, 'subject');
if (!empty($name)){
if (!empty($email)){
if (!empty($subject)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "newpassword";
$dbname = "amyk";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO amyk (name, email, subject)
values ('$name','$email','$subject')";

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // invalid emailaddress
    echo "Invalid Email Adress";
    die();
}

    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      echo "Invalid Name";
      die();
    }

if ($conn->query($sql)){
echo "Thank you for registering. We will contact you as soon as possible! :)";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo"Subject field should not be empty";
die();
}
}
else{
echo "Email Field should not be empty";
die();
}
}
else{
echo "Name field should not be empty";
die();
}
?>