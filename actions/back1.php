<?php 

include 'connect.php';

session_start();
include 'connect.php';


if($_SERVER['REQUEST_METHOD']=="POST")
{
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['password'];
$phonenumber = $_POST['phonenumber'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name']; // Corrected variable name
$std = $_POST['std'];

if ($password != $cpassword) {
    echo '<script>
    alert("Passwords do not match");
    window.location="../phpfiles/Register.php";
    </script>';
}
 else {
    move_uploaded_file($tmp_name, "../uploads/$image");
    $sql = "INSERT INTO userdata (username, password, phonenumber, photo, standard, status, votes)
     VALUES ('$username', '$password', '$phonenumber', '$image', '$std', 0, 0)";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo '<script>
    alert("Registration successful");
    window.location="../phpfiles/login.php";
    </script>';
    }
}
}
?>
