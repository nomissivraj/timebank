<?php
    session_start();
// create datbase connection info
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "database";
$database = "timebank";

// Create connection using connection info
$connect = new mysqli($servername, $dbUsername, $dbPassword, $database);
// Check if connection has worked or failed - if failed 'die'
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);

}

$query = "UPDATE User SET User.Hours = User.Hours - 1 WHERE User.User_ID = $_SESSION[User_ID];";
$result = mysqli_query($connect, $query);

if ($result) {
    echo'Take hour success';
    header('Location: loadservices.php');
} else {
    echo'Take hour failure';
}

//$query = "UPDATE User SET User.Hours = User.Hours - 1 WHERE User.User_ID = $_SESSION[User_ID];";
//$result = mysqli_query($connect, $query);


$connect->close();
?>